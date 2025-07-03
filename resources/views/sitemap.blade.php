<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Homepage -->
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
    </url>

    <!-- Categorías -->
    @foreach ($categories as $category)
        <url>
            <loc>{{ url('/' . $category->slug) }}</loc>
            <priority>0.8</priority>
        </url>
    @endforeach

    <!-- Dibujos -->
    @foreach ($drawings as $drawing)
        <url>
            <loc>{{ url('/' . $drawing->category->slug . '/' . $drawing->slug) }}</loc>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>
