<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Drawing;

class SitemapController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $drawings = Drawing::with('category')->get();

        $content = view('sitemap', compact('categories', 'drawings'))->render();

        return response($content, 200)->header('Content-Type', 'application/xml');
    }
}
