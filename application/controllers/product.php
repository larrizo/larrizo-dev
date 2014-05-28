<?php if ( !defined( 'BASEPATH' ) )
    exit( 'No direct script access allowed' );

class Product extends MY_General {

    function __construct() {
        // this is your constructor
        parent::__construct();
    }

    public function index($alias) {
        $this->data_header['title'] = 'Webshops product | Larrizo';
        $this->data_header[ 'page' ] = 'product';
        $this->data_header['currentCategory'] = $this->categories_model->getCategoryByAlias('fashion');;
        $this->data_content[ '_header' ] = $this->load->view( '_header', $this->data_header, TRUE );

//        $this->data_content['currentProductCategory'] = $categoryName;
//        $this->data_content['subpage'] = $page;

//        if ($page == 'stores')
//            $this->stores($categoryName);

        $this->data_content['_blocks'] = initBlocks(array('share', 'newsletter', 'facebook', 'banner'));
        $this->load->view( 'pages/product', $this->data_content );
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */