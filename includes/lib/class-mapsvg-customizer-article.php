<?php

//if ( ! defined( 'ABSPATH' ) ) exit;

class MapSVG_Customizer_Article {

    /**
     * constructor function
     * @access public
     * @since 1.0.0
     * @param string $title, $permalink, $region
     */
    public function __construct ( $title = null, $permalink = null, $region = null ) {
        $this->title    = $title;
        $this->link     = $permalink;
        $this->region   = $region;
    }
}