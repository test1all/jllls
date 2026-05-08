<?php
function search_permalink( $query ) {
  $query = permalink( urldecode( $query ) );
  $slug = str_replace( '%query%', $query, get_option( 'search_permalink' ) );
  return site_url() . '/' . $slug;
}

function download_permalink( $id ) {
  $full_slug = str_replace( '%id%', $id, get_option( 'download_permalink' ) );
  return site_url() . '/' . $full_slug;
}

function playlist_permalink( $slug ) {
  $full_slug = str_replace( '%slug%', $slug, get_option( 'playlist_permalink' ) );
  return site_url() . '/' . $full_slug;
}

function page_permalink( $slug ) {
  $full_slug = str_replace( '%slug%', $slug, get_option( 'page_permalink' ) );
  return site_url() . '/' . $full_slug;
}

function sitemap_searches_permalink() {
  return site_url() . '/' . get_option( 'sitemap_searches_permalink' );
}

function sitemap_keywords_permalink( $num ) {
  $slug = str_replace( '%num%', $num, get_option( 'sitemap_keywords_permalink' ) );
  return site_url() . '/' . $slug;
}

function sitemap_permalink() {
  return site_url() . '/' . get_option( 'sitemap_permalink' );
}
