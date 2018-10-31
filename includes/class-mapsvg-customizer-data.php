<?php

if ( ! defined('ABSPATH') ) {
    /** Set up WordPress environment */
    require_once( '../../../../wp-load.php' ); 
    // ^ That is a terrible way to do this, but I couldn't think of another way
} 

class MapSVG_Customizer_Data {

    /**
	 * Constructor function.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
    public function __construct ( $tax ) {
        $this->taxonomy = $tax;
    }

    public function getData () {
        
    }

}

if( isset( $_GET ) ) {
    $t = filter_var($_GET['t'], FILTER_SANITIZE_STRING);
    $map_svg = new MapSVG_Customizer_Data( $t );
    var_dump($map_svg);
} else {
    print "You need to make a valid request";
}