<?php

if ( ! defined('ABSPATH') ) {
    /** Set up WordPress environment */
    require_once( '../../../../wp-load.php' ); 
    // ^ That is a terrible way to do this, but I couldn't think of another way
    require_once('class-mapsvg-customizer-article.php');
    require_once( 'lib/class-mapsvg-customizer-finder.php' );
} 

class MapSVG_Customizer_API {

    

}

if( isset( $_GET ) ) {
    $t = filter_var($_GET['t'], FILTER_SANITIZE_STRING);
    $map_svg = new MapSVG_Customizer_Data( $t );
} else {
    print "You need to make a valid request";
}