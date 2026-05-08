<?php
require 'config/init.php';

require 'libraries/ua.class.php';
require 'libraries/simple_html_dom.php';

require 'core/functions/options.php';
require 'core/functions/cache.php';
require 'core/functions/permalinks.php';
require 'core/functions/common.php';
require 'core/functions/site.php';

require 'core/classes/agc.php';
require 'core/classes/Youtube.php';

$id = $route['vars'][0];
$this_url = 'https://www.youtube.com/watch?v='.$id;


dmca_redirect();

delete_cache( get_cache_path() . '/downloads', get_option( 'cache_time' ) );

$result1 = new Youtube();



$result1 = $result1->search($this_url);

$result = json_decode($result1,true);

$result = $result['items'];

if( isset($result[0]) )
{
    $result = $result[0];
}

 

$genius = agc()->lyric($result['title']); 
$searches = get_recent_user_access( get_option( 'recent_searches_count' ) );

if ( $result ) {
  $site_title = str_replace( [ '%title%', '%duration%', '%site_name%', '%domain%' ], [ $result['title'], $result['duration'], get_option( 'site_name' ), $_SERVER['HTTP_HOST'] ], get_option( 'download_title' ) );
  $meta_description = str_replace( [ '%title%', '%duration%', '%site_name%', '%domain%' ], [ $result['title'], $result['duration'], get_option( 'site_name' ), $_SERVER['HTTP_HOST'] ], get_option( 'download_description' ) );
  $meta_robots = get_option( 'download_robots' );
} else {
  redirect( site_url() );
}

require 'themes/' . get_option( 'theme' ) . '/header.php';
require 'themes/' . get_option( 'theme' ) . '/download.php';
require 'themes/' . get_option( 'theme' ) . '/footer.php';
?>
