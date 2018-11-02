<?php

//if ( ! defined( 'ABSPATH' ) ) exit;

class MapSVG_Customizer_Article {

    /**
     * constructor function
     * @access public
     * @since 1.0.0
     * @param string $title, $permalink, $county
     */
    public function __construct ( $id , $title = null, $permalink = null, $county = null ) {
        $this->ID       = $id;
        $this->title    = $title;
        $this->link     = $permalink;
        $this->county   = $county;
    }
}