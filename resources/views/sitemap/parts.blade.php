<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://k700.asia/parts</loc>
        <lastmod>{{ (Carbon\Carbon::now()->subDays(15))->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach ($types as $type)
        <url>
            <loc>https://k700.asia/parts/{{ $type->additional }}</loc>
            <lastmod>2018-10-01T18:23:17+00:00</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
        @foreach ($type->parts as $part)
        <url>
            <loc>https://k700.asia/parts/{{$type->additional}}/{{ $part->additional }}</loc>
            <lastmod>2018-10-01T18:23:17+00:00</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
        </url>
            @foreach ($type->brands as $brand)
                <url>
                    <loc>https://k700.asia/parts/{{$type->additional}}/{{ $part->additional }}/{{$brand->additional}}</loc>
                    <lastmod>2018-10-01T18:23:17+00:00</lastmod>
                    <changefreq>monthly</changefreq>
                    <priority>0.5</priority>
                </url>
            @endforeach
        @endforeach
    @endforeach
</urlset>
