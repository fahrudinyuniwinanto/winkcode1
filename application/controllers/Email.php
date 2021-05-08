<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
       $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 587,
    'smtp_user' => 'fahrudinyewe@gmail.com',
    'smtp_pass' => 'Jupit3rku',
    'mailtype'  => 'html', 
    'smtp_crypto' => 'security', //can be 'ssl' or 'tls' for example
    'charset'   => 'iso-8859-1',
    'newline'   =>  "\r\n"
);
        $this->load->library('email', $config);

        $this->email->from('fahrudinyewe@gmail.com', 'Fahrudin Yuniwinanto');
        $this->email->to('ahmad.wandi2011@gmail.com'); 

        $this->email->subject('Email Test');
        $this->email->message('Email test daari fahrudin.');  

        $this->email->send();

        echo $this->email->print_debugger();

        // $this->load->view('email_view');
    }
}