<?php


/**
 * 
 * @package DIGIGATE
 */

namespace DIGIGATE_THEME\Inc;

use DIGIGATE_THEME;

class DG_THEME {
    use DIGIGATE_THEME\Inc\Traits\Singleton;
    protected function __construct(){
        // load class
        $this->set_hooks();
    }

    protected function set_hooks(){

        // action and filters
    }
}