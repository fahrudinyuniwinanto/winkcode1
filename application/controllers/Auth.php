<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        if ($this->session->userdata('is_logged') == true) {
            redirect('Backend', 'refresh');
        }
    }
    public function index($error = NULL) {
        redirect(base_url(), 'refresh');
    }

    public function login() {
        //CAPTCHA================================//
        $cpt    = $this->input->post("cpt", TRUE);
        $rescpt = $this->input->post("rescpt", TRUE);
        if ($cpt != $rescpt) {
            $this->session->set_flashdata('msgcaptcha', '<i class="fa fa-warning"></i> Captcha belum tepat, silakan ulangi lagi');
            redirect(site_url(''));
        }

        //ENDOFCAPTCHA=========================//
        //sebut nama tabel yg akan dicek login
        $data_tbl = array('users');
        foreach ($data_tbl as $key => $vtbl) {
            $login = $this->Auth_model->login_multitable($this->input->post('username'), md5($this->input->post('password')), $vtbl);
            if ($login == 1) {
                // die($value."=".$login);
                //          ambil detail data
                $row = $this->Auth_model->data_login_multitable($this->input->post('username'), md5($this->input->post('password')), $vtbl);
                switch ($vtbl) {
                //sesuai id di tabel user_group
                case 'users':
                    $grup = 1;
                    break;

                }
                // die($grup."dfdf");
                //          daftarkan session
                $data = array(
                    'logged'   => TRUE,
                    'id_user'  => $row->id_user,
                    'username' => $row->username,
                    'fullname' => $row->fullname,
                    'telp'     => $row->telp,
                    'email'    => $row->email,
                    'foto'     => $row->foto,
                    'level'    => $grup,
                );
                $this->session->set_userdata($data);

//            redirect ke halaman sukses
                redirect(site_url('backend'));
            }
        }
//            tampilkan pesan error
        $error = 'username / password salah';
        $this->index($error);

    }

    function logout() {
//        destroy session
        $this->session->sess_destroy();

//        redirect ke halaman login
        redirect(site_url('auth'));
    }

}
