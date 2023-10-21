<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($companies as $company)
        <url>
            <loc>{{url("empresa/{$company->city}/{$company->slug}")}}</loc>
            <lastmod>{{ gmdate('Y-m-d',strtotime($company->updated_at)) }}</lastmod>
        </url>
    @endforeach
</urlset>
