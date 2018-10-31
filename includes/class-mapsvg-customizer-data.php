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
        $this->print_data();
    }

    /**
     * getData function.
     * @access  public
     * @since   1.0.0
     * @return  object
     */
    public function get_data () {
        // Setup the query
        $args = array (
            'post_type' => 'post',
            'tax_query' => array (
                array (
                    'taxonomy' => 'county',
                ),
            ),
        );
        
        $query = new WP_Query( $args );

        return $query;
    }

    /**
     * print_data function
     * @access public
     * @since 1.0.0
     * @return string JSON
     */
    public function print_data () {
        $data = $this->get_data();
        var_dump($data);
    }

}

if( isset( $_GET ) ) {
    $t = filter_var($_GET['t'], FILTER_SANITIZE_STRING);
    $map_svg = new MapSVG_Customizer_Data( $t );
} else {
    print "You need to make a valid request";
}