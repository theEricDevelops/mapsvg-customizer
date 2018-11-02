<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class MapSVG_Customizer_Finder {

    /**
     * constructor function
     * @access public
     * @since 1.1.0
     * @return void
     */
    public function __construct( $slug ) {
        $this->terms = $slug;
    }

    /**
     * find_posts function.
     * @access  public
     * @since   1.1.0
     * @return  object
     */
    public function find_posts () {

        if ( $this->terms != null ) {
            $args = array (
                'tax_query' => array (
                    array (
                        'taxonomy'  => 'county',
                        'field'     =>  'slug',
                        'terms'     =>  $this->terms,
                    ),
                ),
            );
        } else {
            $args = array (
                'tax_query' => array (
                    array (
                        'taxonomy'  => 'county',
                    ),
                ),
            );
        }
        

        $query = get_posts ( $args );

        return $query;
    }

}