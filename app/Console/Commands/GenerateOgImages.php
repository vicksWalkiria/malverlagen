<?php

namespace App\Console\Commands;

use App\Models\Drawing;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateOgImages extends Command
{
    protected $signature = 'og:generate {slug?}';

    protected $description = 'Genera imágenes OpenGraph y miniaturas desde los SVGs de los dibujos'; // Updated description

    public function handle()
    {
        $slugArg = $this->argument('slug');

        $drawings = $slugArg
            ? Drawing::where('slug', $slugArg)->get()
            : Drawing::all();

        if ($drawings->isEmpty()) {
            $this->warn('No se encontraron dibujos para generar imágenes.');

            return 1; // Indicate a non-zero exit code for failure/no-op
        }

        // Ensure directories exist
        File::ensureDirectoryExists(public_path('og-images'));
        File::ensureDirectoryExists(public_path('thumbs'));

        foreach ($drawings as $drawing) {
            $slug = $drawing->slug;
            $svgContent = $drawing->svg_content;

            if (empty($svgContent)) {
                $this->error("🚫 El dibujo '{$slug}' no tiene contenido SVG. Saltando...");

                continue;
            }

            $jpgPath = public_path("og-images/{$slug}.jpg");
            $thumbPath = public_path("thumbs/{$slug}.jpg");
            $svgTempPath = storage_path("app/public/temp/{$slug}.svg"); // Use a temp folder for SVGs

            // Flag to check if OG image was newly created/updated
            $ogImageUpdated = false;

            // Generate/Regenerate OG image from SVG
            // We'll always generate the OG image to ensure it's up-to-date with potential SVG content changes
            $this->info("🔄 Generando/Actualizando OG image para: {$slug}.svg");
            try {
                // Save SVG content to a temporary file
                File::put($svgTempPath, $svgContent);

                // Command to convert SVG to JPG for OG image
                $cmd = "convert -background white -density 300 {$svgTempPath} -quality 90 {$jpgPath}";
                exec($cmd, $output, $returnVar);

                if ($returnVar === 0) {
                    $this->info("✅ OG image creada/actualizada: {$jpgPath}");
                    $ogImageUpdated = true;
                } else {
                    $this->error("❌ Error al crear OG image para '{$slug}'. Salida: ".implode("\n", $output));
                }
            } catch (\Exception $e) {
                $this->error("❌ Excepción al procesar OG image para '{$slug}': ".$e->getMessage());
            } finally {
                // Clean up the temporary SVG file
                if (File::exists($svgTempPath)) {
                    File::delete($svgTempPath);
                }
            }

            // Generate/Regenerate thumbnail if OG image was created/updated, or if thumbnail is missing
            if ($ogImageUpdated || ! File::exists($thumbPath)) {
                if (File::exists($jpgPath)) {
                    $this->info("🖼️  Generando/Actualizando thumbnail para: {$slug}.jpg");
                    try {
                        $cmdThumb = "convert {$jpgPath} -resize 400x400 {$thumbPath}";
                        exec($cmdThumb, $outputThumb, $returnVarThumb);

                        if ($returnVarThumb === 0) {
                            $this->info("✅ Thumbnail creada/actualizada: {$thumbPath}");
                        } else {
                            $this->error("❌ Error al crear thumbnail para '{$slug}'. Salida: ".implode("\n", $outputThumb));
                        }
                    } catch (\Exception $e) {
                        $this->error("❌ Excepción al procesar thumbnail para '{$slug}': ".$e->getMessage());
                    }
                } else {
                    $this->warn("⚠️  No se pudo crear el thumbnail para '{$slug}' porque la imagen OG no existe.");
                }
            } else {
                $this->info("✔️  Thumbnail ya existe y no necesita actualización: {$thumbPath}");
            }
        }

        $this->info('Proceso de generación de imágenes OpenGraph y miniaturas completado.');

        return 0;
    }
}
