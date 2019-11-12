<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Errors extends CI_Controller {

    public function index()
    {
        # code...
        $this->load->view('page-not-found');
    }
}
