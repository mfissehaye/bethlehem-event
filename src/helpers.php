<?php

function make_seed() {
	list( $usec, $sec ) = explode( ' ', microtime() );
	return $sec + $usec * 1000000;
}

function rand_str( $length ) {
	$random_string = '';
	$s             = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*()';
	foreach ( range( 0, $length ) as $index ) {
		srand( make_seed());
		$random_string .= $s[ rand( 0, strlen( $s ) - 1 ) ];
	}
	return $random_string;
}