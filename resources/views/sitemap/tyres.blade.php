<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://k700.asia/tyres</loc>
        <lastmod>{{ (Carbon\Carbon::now()->subDays(15))->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @foreach ($tyres as $tyre)
        <url>
            <loc>https://k700.asia/tyres/{{ $tyre->additional }}</loc>
            <lastmod>{{ (Carbon\Carbon::now()->subDays(15))->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
        </url>

    @endforeach
</urlset>
