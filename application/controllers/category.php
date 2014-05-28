<?php if ( !defined( 'BASEPATH' ) )
    exit( 'No direct script access allowed' );

class Category extends MY_General {

    function __construct() {
        // this is your constructor
        parent::__construct();
    }

    public function index($categoryName, $page = 'product') {
        $this->data_header['title'] = 'Feel your best shopping experience with us | Larrizo';
        $this->data_header[ 'page' ] = 'category';
        $this->data_header['currentCategory'] = $this->categories_model->getCategoryByAlias($categoryName);;
        $this->data_header['script'] = addScript(array('/media/js/custom/category.js'));
        $this->data_content[ '_header' ] = $this->load->view( '_header', $this->data_header, TRUE );

        $this->data_content['currentProductCategory'] = $categoryName;
        $this->data_content['subpage'] = $page;

        if ($page == 'stores')
            $this->stores($categoryName);

        $this->load->view( 'pages/category', $this->data_content );
    }

    private function stores() {
        $this->load->view( 'pages/category-store', $this->data_content );
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */