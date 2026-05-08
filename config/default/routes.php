<?php
return [
  '/' => [ 'name' => 'home', 'file' => 'home.php' ],
  'search/([^/!#$&*()+={}\[\]|;,]+)' => [ 'name' => 'search', 'file' => 'search.php' ],
  'download/([^/!#$&*()+={}\[\]|;,]+)' => [ 'name' => 'download', 'file' => 'download.php' ],
  'playlist/([^/!#$&*()+={}\[\]|;,]+)' => [ 'name' => 'playlist', 'file' => 'playlist.php' ],
  'page/([^/!#$&*()+={}\[\]|;,]+)' => [ 'name' => 'pages', 'file' => 'pages.php' ],
  'sitemap/searches.xml' => [ 'name' => 'sitemap-searches', 'file' => 'sitemap.php' ],
  'sitemap/([0-9-]+).xml' => [ 'name' => 'sitemap-keywords', 'file' => 'sitemap.php' ],
  'sitemap.xml' => [ 'name' => 'sitemap-index', 'file' => 'sitemap.php' ]
];
