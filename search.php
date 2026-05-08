<?php
require 'libraries/ua.class.php';
require 'libraries/simple_html_dom.php';

require 'core/functions/options.php';
require 'core/functions/cache.php';
require 'core/functions/permalinks.php';
require 'core/functions/common.php';
require 'core/functions/site.php';

require 'core/classes/agc.php';
require 'core/classes/Youtube.php';


if ( $redirect = badword_redirect() ) {
  redirect( $redirect );
}

dmca_redirect();
set_recent_user_access( [ 'title' => get_search_query() ], 'title', get_option( 'recent_searches_limit', 25000 ) );

$result1 = new Youtube();

$result = $result1->search(get_search_query());

$result = json_decode($result,true);

$result = @$result['items'];

$playlist = agc()->get_youtube_playlist();
$searches = get_recent_user_access( get_option( 'recent_searches_count' ) );

$site_title = unique(str_replace( [ '%query%', '%size%', '%site_name%', '%domain%' ], [ get_search_query(), $result[0]['size'], get_option( 'site_name' ), $_SERVER['HTTP_HOST'] ], get_option( 'search_title' ) ));
$meta_description = unique(str_replace( [ '%query%', '%size%', '%site_name%', '%domain%' ], [ get_search_query(), $result[0]['size'], get_option( 'site_name' ), $_SERVER['HTTP_HOST'] ], get_option( 'search_description' ) ));
$meta_robots = get_option( 'search_robots' );

require 'themes/' . get_option( 'theme' ) . '/header.php';
require 'themes/' . get_option( 'theme' ) . '/search.php';
require 'themes/' . get_option( 'theme' ) . '/footer.php';
?>