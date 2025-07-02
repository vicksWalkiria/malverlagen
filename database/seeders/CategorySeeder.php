<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Tiere',
                'slug' => 'tiere',
                'description' => 'Kostenlose Tier-Malvorlagen zum Ausdrucken – Hasen, Katzen, Hunde und mehr.',
            ],
            [
                'name' => 'Fahrzeuge',
                'slug' => 'fahrzeuge',
                'description' => 'Malvorlagen mit Autos, Traktoren, Bussen und anderen Fahrzeugen für Kinder.',
            ],
            [
                'name' => 'Anime & Manga',
                'slug' => 'anime-manga',
                'description' => 'Ausmalbilder inspiriert von Anime wie Naruto, Dragon Ball und mehr.',
            ],
            [
                'name' => 'Weihnachten',
                'slug' => 'weihnachten',
                'description' => 'Weihnachtliche Ausmalbilder: Tannenbäume, Geschenke, Rentiere u.v.m.',
            ],
            [
                'name' => 'Ostern',
                'slug' => 'ostern',
                'description' => 'Oster-Malvorlagen mit Eiern, Hasen und frühlingshaften Motiven.',
            ],
            [
                'name' => 'Kostenlose Malvorlagen',
                'slug' => 'kostenlos',
                'description' => 'Eine Sammlung aller gratis Malvorlagen, thematisch sortiert.',
            ],
            [
                'name' => 'Sonstige',
                'slug' => 'sonstige',
                'description' => 'Verschiedene Ausmalbilder, die keiner spezifischen Kategorie zugeordnet sind.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
