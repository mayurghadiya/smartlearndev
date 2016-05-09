<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends Professor_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        echo 'from professor controller';
    }

}
