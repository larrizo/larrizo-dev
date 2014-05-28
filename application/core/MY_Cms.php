<?php if ( !defined( 'BASEPATH' ) )
    exit( 'No direct script access allowed' );

class MY_Cms extends CI_Controller {

    protected $data_array;

    function __construct() {
        // this is your constructor
        parent::__construct();

        $user = $this->session->userdata('user');

        if (empty($user) OR ($user['role'] != 'administrator' AND $user['role'] != 'manager'))
            redirect('/cms/login');

        $this->data_array[ '_footer' ] = $this->load->view( 'cms/_footer', '', TRUE );
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */