<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Category::all();

    return view('home', compact('categories'));
});
use App\Http\Controllers\DrawingController;
use App\Http\Controllers\SitemapController;

Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::view('/impressum', 'impressum');
Route::view('/datenschutz', 'datenschutz');
Route::view('/ueber-mich', 'ueber-mich');

// Página por categoría
Route::get('/{category:slug}', [DrawingController::class, 'index'])->name('category.drawings');

// Página individual del dibujo
Route::get('/{category:slug}/{drawing:slug}', [DrawingController::class, 'show'])->name('drawing.show');

// Descargar SVG
Route::get('/download/svg/{drawing:slug}', [DrawingController::class, 'downloadSvg'])->name('drawing.download.svg');

// Descargar PDF
Route::get('/download/pdf/{drawing:slug}', [DrawingController::class, 'downloadPdf'])->name('drawing.download.pdf');
