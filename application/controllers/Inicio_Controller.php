<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_Controller extends CI_Controller {

    public function Index()
    {
        $this->load->view('inicio');
    }
}
