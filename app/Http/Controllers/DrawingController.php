<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drawing;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File; // Add this line
use Illuminate\Support\Facades\Response; // Make sure to include this for file existence checks

class DrawingController extends Controller
{
    // Mostrar todos los dibujos de una categoría
    public function index(Category $category)
    {
        $drawings = $category->drawings()->latest()->get();

        return view('drawings.index', compact('category', 'drawings'));
    }

    // Mostrar un dibujo individual
    public function show($categorySlug, $drawingSlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        $drawing = Drawing::where('slug', $drawingSlug)->firstOrFail();

        // Fetch other drawings from the same category, excluding the current one
        $otherDrawings = Drawing::where('category_id', $category->id)
            ->where('id', '!=', $drawing->id) // Exclude the current drawing
            ->inRandomOrder() // Optional: Show random related drawings
            ->limit(6) // Optional: Limit to a certain number of related drawings
            ->get();

        return view('drawings.show', compact('drawing', 'category', 'otherDrawings'));
    }

    // Descargar SVG
    public function downloadSvg(Drawing $drawing)
    {
        return Response::make($drawing->svg_content, 200, [
            'Content-Type' => 'image/svg+xml',
            'Content-Disposition' => 'attachment; filename="'.$drawing->slug.'.svg"',
        ]);
    }

    // Descargar como PDF usando DomPDF
    public function downloadPdf(Drawing $drawing)
    {
        // Define the path to your JPG image
        $imagePath = public_path('og-images/'.$drawing->slug.'.jpg');

        // Check if the image actually exists
        if (! File::exists($imagePath)) {
            // Handle cases where the JPG doesn't exist for a drawing
            // You might want to:
            // 1. Fallback to a generic placeholder image
            // 2. Try to render the SVG (if you still want that as a fallback)
            // 3. Return an error message
            // For now, we'll return a simple error for demonstration.
            return redirect()->back()->with('error', 'The image for this drawing was not found to generate the PDF.');
        }

        // Get the image data and encode it in base64
        // This is crucial for embedding images directly into the HTML for DomPDF
        $imageData = base64_encode(File::get($imagePath));
        $imageMime = 'image/jpeg'; // Since it's a JPG

        // Create simple HTML content with the embedded image
        $htmlContent = '
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>'.$drawing->title.'</title>
                <style>
                    body {
                        font-family: sans-serif;
                        margin: 0;
                        padding: 0;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh; /* Make body at least viewport height */
                        box-sizing: border-box;
                    }
                    .pdf-container {
                        text-align: center;
                        padding: 20px;
                        max-width: 100%;
                    }
                    img {
                        max-width: 100%;
                        height: auto; /* Maintain aspect ratio */
                        display: block; /* Remove extra space below image */
                        margin: 0 auto; /* Center the image */
                    }
                    h1 {
                        color: #333;
                        font-size: 24px;
                        margin-top: 20px;
                        margin-bottom: 10px;
                    }
                    p {
                        color: #666;
                        font-size: 14px;
                    }
                </style>
            </head>
            <body>
                <div class="pdf-container">
                    <h1>'.$drawing->title.'</h1>
                    <img src="data:'.$imageMime.';base64,'.$imageData.'" alt="'.$drawing->title.'">
                    <p>Ausmalbild von Malspass Schweiz</p>
                </div>
            </body>
            </html>
        ';

        $pdf = Pdf::loadHTML($htmlContent)->setPaper('a4');

        return $pdf->download($drawing->slug.'.pdf');
    }
}
