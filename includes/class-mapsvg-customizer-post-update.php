<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class MapSVG_Customizer_Post_Update {

    /**
     * When a post is created, updated, or deleted, we will check for all
     * posts with the custom taxonomy of 'county.' At that time, we will 
     * create a JSON file in the assets folder which holds the county,
     * title, and permalink to each post that matches criteria. This way
     * we're not doing ajax calls every time someone clicks a new region.
     */

    /**
     * Constructor Function
     * @access public
     * @since 1.1.0
     * @return void
     */
    public function __construct( ) {
        add_action( 'save_post', array( $this, 'update_json' ), 10, 1 );
        add_action( 'after_delete_post', array( $this, 'update_json' ), 10, 1);
    }

    /**
     * find_posts function.
     * @access  public
     * @since   1.0.0
     * @return  object
     */
    public function find_posts () {

        $args = array (
            'tax_query' => array (
                array (
                    'taxonomy'  => 'county',
                ),
            ),
        );

        $query = get_posts ( $args );
 
        return $query;
    }

}