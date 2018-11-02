<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class MapSVG_Customizer_Finder {

    /**
     * constructor function
     * @access public
     * @since 1.1.0
     * @return void
     */
    public function __construct( $slug = '' ) {
        if ( $slug != '' ) {
            $this->terms = array ( $slug );
        } else {
            $this->terms = $this->get_counties();
        }
    }

    /**
     * find_posts function.
     * @access  public
     * @since   1.1.0
     * @return  object
     */
    public function find_posts () {

        $args = array(
            'post_status'   => 'publish',
            'numberposts'  => '-1',
            'tax_query' => array(
                array(
                    'taxonomy'         => 'county',
                    'terms'            => $this->terms,
                    'field'            => 'slug',
                    'operator'         => 'IN',
                    'include_children' => true,
                ),
            ),
        );

        $query = get_posts ( $args );

        return $query;
    }

    /**
     * get_counties function
     * @access public
     * @since 1.1.0
     * @return array of counties to use in search
     */
    public function get_counties () {
        $tax_list = array();
        foreach( get_terms('county') as $county ) {
            array_push($tax_list, $county->slug);
        }
        return $tax_list;
    }

}