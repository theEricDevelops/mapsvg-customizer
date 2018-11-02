<?php

if ( ! defined('ABSPATH') ) {
    /** Set up WordPress environment */
    require_once( '../../../../wp-load.php' ); 
    // ^ That is a terrible way to do this, but I couldn't think of another way
    require_once('class-mapsvg-customizer-article.php');
    require_once( 'lib/class-mapsvg-customizer-finder.php' );
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
     * print_data function
     * @access public
     * @since 1.0.0
     * @return string JSON
     */
    public function print_data () {
        $finder = new MapSVG_Customizer_Finder( $this->taxonomy );
        $posts = $finder->find_posts();
        
        if ( count($posts) > 0 ) {
            $results = Array();
            var_dump($posts);
            foreach( $posts as $post ) {
                $result = new MapSVG_Customizer_Article;
                $result->title = $post->post_title;
                $result->link = get_permalink( $post->ID );
                array_push( $results, $result );
            }
        } else {
            $resulsts = "No data found.";
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