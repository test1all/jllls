<?php

function register_stylesheet( $file ) {
  echo '<link rel="stylesheet" type="text/css" media="screen" href="' . $file . '" />' . "\n";
}

function register_script( $file ) {
  echo '<script type="text/javascript" src="' . $file . '"></script>' . "\n";
}

function register_localize_script( $key, $args ) {
  $output = '<script type="text/javascript">' . "\n";
	$output.= '/* <![CDATA[ */' . "\n";
	$output.= 'var ' . $key . ' = ' . json_encode( $args ) . ';' . "\n";
	$output.= '/* ]]> */' . "\n";
	$output.= '</script>' . "\n";

  echo $output;
}
