<?php
$found = false;

foreach ( $routes as $route => $args ) {
  if ( $args['name'] == 'search' ) {
    $route = str_replace( '%query%', '([^/!#$&*()+={}\[\]|;,]+)', $config['search_permalink'] );
  } if ( $args['name'] == 'download' ) {
    $route = str_replace( '%id%', '([^/!#$&*()+={}\[\]|;,]+)', $config['download_permalink'] );
  } if ( $args['name'] == 'playlist' ) {
    $route = str_replace( '%slug%', '([^/!#$&*()+={}\[\]|;,]+)', $config['playlist_permalink'] );
  } if ( $args['name'] == 'pages' ) {
    $route = str_replace( '%slug%', '([^/!#$&*()+={}\[\]|;,]+)', $config['page_permalink'] );
  } if ( $args['name'] == 'sitemap-searches' ) {
    $route = $config['sitemap_searches_permalink'];
  } if ( $args['name'] == 'sitemap-keywords' ) {
    $route = str_replace( '%num%', '([0-9-]+)', $config['sitemap_keywords_permalink'] );
  } if ( $args['name'] == 'sitemap-index' ) {
    $route = $config['sitemap_index_permalink'];
  }

  $pattern = '/^' . str_replace( '/', '\/', $route ) . '$/';
  if ( preg_match( $pattern, $uri['path'], $vars ) ) {
    array_shift( $vars );

    $args['name'] = ( isset( $args['name'] ) ) ? $args['name'] : null;
    $args['vars'] = ( isset( $vars ) ) ? $vars : [];
    $args['file'] = ( isset( $args['file'] ) ) ? $args['file'] : null;

    $found = true;

    break;
  }
}

if ( ! $found ) {
  $args['name'] = 'error404';
  $args['vars'] = [];
}

$route = $args;
