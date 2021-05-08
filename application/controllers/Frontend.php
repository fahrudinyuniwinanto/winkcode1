<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        if ($this->session->userdata('is_logged') == true) {
            redirect('Backend', 'refresh');
        }
    }
    public function index() {
        $data = array(
            'content' => 'frontend/login.php',
        );
        $this->load->view('layout_frontend.php', $data);
    }

}
