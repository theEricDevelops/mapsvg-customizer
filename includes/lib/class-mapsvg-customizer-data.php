<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class MapSVG_Customizer_Data {

    /**
	 * Constructor function.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
     * @param   string $tax The taxonomy used to search for data.
	 */
    public function __construct ( $tax = null ) {
        $this->taxonomy = $tax;
    }

    /**
     * export_data function
     * @access public
     * @since 1.0.0
     * @return string JSON
     */
    public function export_data () {
        $finder = new MapSVG_Customizer_Finder( $this->taxonomy );
        $posts = $finder->find_posts();
        
        if ( count($posts) > 0 ) {
            $results = Array();
            $i = 1;
            foreach( $posts as $post ) {
                $county = wp_get_post_terms( $post->ID, 'county' );

                $result = new MapSVG_Customizer_Article( $i );
                $result->title = $post->post_title;
                $result->link = get_permalink( $post->ID );
                $result->county = $county[0]->slug;
                array_push( $results, $result );
                $i++;
            }
        } else {
            $results = "No data found.";
        }
        $encoded = json_encode($results);
        
        return $encoded;
    }

}

