<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class auth extends CI_Model {

//     function __construct() {
//        parent::__construct();
//        }
    function isallowed($controller, $action) {

        $this->load->config('config');

        if (array_key_exists($controller, $this->config->config['permission'][$this->session->userdata('role_name')])) {

            if (in_array($action, $this->config->config['permission'][$this->session->userdata('role_name')][$controller])) {

                return 1;
            }
        }
        else
            return 0;
    }

}

?>
