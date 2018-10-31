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
        /*$args = array(
            'name' =>  'hennepin-county	    ',
        );
        
        $query = new WP_Query( $args );*/

        //$query = get_term_by ( 'slug', 'hennepin-county', 'county');

        $args = array (
            'tax_query' => array (
                array (
                    'taxonomy'  => 'county',
                    'field'     =>  'slug',
                    'terms'     =>  'hennepin-county',
                ),
            ),
        );

        $query = get_posts ( $args );
 
        return $query;
    }

    /**
     * print_data function
     * @access public
     * @since 1.0.0
     * @return string JSON
     */
    public function print_data () {
        $posts = $this->get_data();
        echo '<ul>';
        foreach( $posts as $post ) {
            echo '<li>' . $post->post_title . '</li>';
        }
        echo '</ul>';
    }

}

if( isset( $_GET ) ) {
    $t = filter_var($_GET['t'], FILTER_SANITIZE_STRING);
    $map_svg = new MapSVG_Customizer_Data( $t );
} else {
    print "You need to make a valid request";
}