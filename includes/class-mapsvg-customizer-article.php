<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class MapSVG_Customizer_Article {

    public function __construct ( $title = null, $permalink = null ) {
        $this->title    = $title;
        $this->link     = $permalink;
    }
}