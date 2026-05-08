<?php
function get_cache_path() {
 	return store_dir() . '/cache';
}

function get_playlist_path() {
 	return store_dir() . '/playlists';
}

function get_page_path() {
 	return store_dir() . '/pages';
}

function set_cache( $file, $content ) {
  $cache_path = dirname( $file );
  if ( ! is_dir( $cache_path ) ) {
    if ( ! @mkdir( $cache_path, 0755, true ) ) {
      exit( 'Can\'t create cache directory. Please check your folder permission.' );
    }
  }

  if ( false !== ( $f = fopen( $file, 'w' ) ) ) {
    fwrite( $f, json_encode( $content ) );
    fclose( $f );
  }
}

function create_cache( $file, $content ) {
  if ( ! get_option( 'enable_cache' ) ) {
    return;
  }

  $cache_path = dirname( $file );
  if ( ! is_dir( $cache_path ) ) {
    if ( ! @mkdir( $cache_path, 0755, true ) ) {
      exit( 'Can\'t create cache directory. Please check your folder permission.' );
    }
  }

  if ( false !== ( $f = fopen( $file, 'w' ) ) ) {
    fwrite( $f, json_encode( $content ) );
    fclose( $f );
  }
}

function download_cache( $file, $content ) {
  if ( ! get_option( 'enable_cache_download' ) ) {
    return;
  }

  $cache_path = dirname( $file );
  if ( ! is_dir( $cache_path ) ) {
    if ( ! @mkdir( $cache_path, 0755, true ) ) {
      exit( 'Can\'t create cache directory. Please check your folder permission.' );
    }
  }

  if ( false !== ( $f = fopen( $file, 'w' ) ) ) {
    fwrite( $f, json_encode( $content ) );
    fclose( $f );
  }
}

function unique_cache( $file, $content ) {
  if ( ! get_option( 'enable_cache_unique' ) ) {
    return;
  }

  $cache_path = dirname( $file );
  if ( ! is_dir( $cache_path ) ) {
    if ( ! @mkdir( $cache_path, 0755, true ) ) {
      exit( 'Can\'t create cache directory. Please check your folder permission.' );
    }
  }

  if ( false !== ( $f = fopen( $file, 'w' ) ) ) {
    fwrite( $f, json_encode( $content ) );
    fclose( $f );
  }
}

function get_cache( $file ) {
  $cache_file = file_get_contents( $file );
  return json_decode( $cache_file, true );
}

function delete_cache( $path, $time = 3600 ) {
  $i = 0;
  $cache_folder = $path;

  if ( file_exists( $cache_folder ) ) {
    $it = new RecursiveDirectoryIterator( $cache_folder, RecursiveDirectoryIterator::SKIP_DOTS );
    $files = new RecursiveIteratorIterator( $it, RecursiveIteratorIterator::CHILD_FIRST );
    foreach( $files as $file ) {
      if ( time() - $file->getCTime() >= $time && ! $file->isDir() ) {
        unlink( $file->getRealPath() );
        $i++;
      }
    }
  }
}
