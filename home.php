<?php
require 'libraries/ua.class.php';

require 'core/functions/options.php';
require 'core/functions/cache.php';
require 'core/functions/permalinks.php';
require 'core/functions/common.php';
require 'core/functions/site.php';

require 'core/classes/agc.php';

if ( isset( $_GET['search'] ) ) {
  if ( $_GET['search'] ) {
    redirect( search_permalink( $_GET['search'] ) );
  } else {
    redirect( site_url() );
  }
}

delete_cache( get_cache_path() . '/home', get_option( 'cache_time' ) );

$site_title = get_option( 'home_title' );
$meta_description = str_replace( [ '%site_name%', '%domain%' ], [ get_option( 'site_name' ), $_SERVER['HTTP_HOST'] ], get_option( 'home_description' ) );
$meta_robots = get_option( 'home_robots' );

$top_songs = agc()->get_itunes_top_songs();
$new_releases = agc()->get_itunes_new_releases();
$top_videos = agc()->get_youtube_top_videos();
$playlist = agc()->get_youtube_playlist();
$searches = get_recent_user_access( get_option( 'recent_searches_count' ) );

require 'themes/' . get_option( 'theme' ) . '/header.php';
require 'themes/' . get_option( 'theme' ) . '/home.php';
require 'themes/' . get_option( 'theme' ) . '/footer.php';
?>