<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layout {

    var $obj;
    var $layout;
    var $title;

    function __construct() {
        $this->obj = & get_instance();
    }

    function setLayout($layout) {
        $this->layout = $layout;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function view($view, $data = null, $return = false) {
        $loadedData = array();
        $loadedData['content_for_layout'] = $this->obj->load->view($view, $data, true);

        $loadedData['title'] = $this->title;


        if ($return) {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        } else {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }

}

?> 