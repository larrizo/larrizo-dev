<?php if ( !defined( 'BASEPATH' ) )
    exit( 'No direct script access allowed' );

class Main extends MY_cms {

    public function index() {

        $dataHeader = array(
            'title' => 'Admin panel | Larrizo',
            'current_menu' => 'home'
        );

        $dataHeader[ 'page' ] = 'home';
        $this->data_array[ '_header' ] = $this->load->view( 'cms/_header', $dataHeader, TRUE );
        $this->load->view( 'cms/homepage', $this->data_array );
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */