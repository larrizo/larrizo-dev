<?php if ( !defined( 'BASEPATH' ) )
    exit( 'No direct script access allowed' );

class Login extends CI_Controller {

    function __construct()
    {
        // this is your constructor
        parent::__construct();

        $user = $this->session->userdata('user');

        if (!empty($user) AND ($user['role'] == 'administrator' OR $user['role'] == 'manager'))
            redirect('/cms');
    }

    public function index() {
        $dataHeader = array( 'title' => 'Admin panel | Larrizo' );
        $dataHeader[ 'page' ] = 'login';
        $this->data_array[ '_footer' ] = $this->load->view( 'cms/_footer', '', TRUE );
        $this->data_array[ '_header' ] = $this->load->view( 'cms/_header', $dataHeader, TRUE );
        $this->load->view( 'cms/login', $this->data_array );
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */