<?php

if ( ! defined('ABSPATH') ) {
    /** Set up WordPress environment */
    require_once( '../../../../wp-load.php' ); 
    // ^ That is a terrible way to do this, but I couldn't think of another way
    require_once( 'lib/class-mapsvg-customizer-article.php' );
    require_once( 'lib/class-mapsvg-customizer-finder.php' );
    require_once( 'lib/class-mapsvg-customizer-data.php' );
} 

class MapSVG_Customizer_API {

    /**
     * Constructor Function
     * @access public
     * @since 1.1.0
     * @return void
     */
    public function __construct( $t ) {
        $this->county = $t;
        $this->get_json();
    }

    /**
     * get_json function
     * @access public
     * @since 1.1.0
     * @return string JSON
     */
    public function get_json() {
        $data_obj = new MapSVG_Customizer_Data( $this->county );
        $data = $data_obj->export_data();

        header('Content-Type: application/json');
        echo $data;

    }

}

if( isset( $_GET['t'] ) ) {
    new MapSVG_Customizer_API( filter_var($_GET['t'], FILTER_SANITIZE_STRING ) );
} else {
    print "You need to make a valid request";
}