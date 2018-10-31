<?php

if ( ! defined('ABSPATH') ) {
    /** Set up WordPress environment */
    require_once( '../../../../wp-load.php' ); 
    // ^ That is a terrible way to do this, but I couldn't think of another way
    require_once('class-mapsvg-customizer-article.php');
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
                    'terms'     =>  $this->taxonomy,
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
        $results = Array();
        
        foreach( $posts as $post ) {
            $result = new MapSVG_Customizer_Article;
            $result->title = $post->post_title;
            $result->link = get_permalink( $post->ID );
            array_push( $results, $result );
        }
        $encoded = json_encode($results);
        
        header('Content-Type: application/json');
        echo $encoded;
    }

}

if( isset( $_GET ) ) {
    $t = filter_var($_GET['t'], FILTER_SANITIZE_STRING);
    $map_svg = new MapSVG_Customizer_Data( $t );
} else {
    print "You need to make a valid request";
}