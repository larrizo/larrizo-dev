<?php if ( !defined( 'BASEPATH' ) )
    exit( 'No direct script access allowed' );

class Categories extends MY_cms {

    function __construct() {
        // this is your constructor
        parent::__construct();

        $this->load->model( 'categories_model', '', TRUE );
    }

    public function index() {

        $dataHeader = array( 'title' => 'Admin panel | Larrizo', 'page' => 'categories' );
        $dataHeader[ 'script' ] = addScript( array( '/media/js/cms/categories.js' ) );

        $this->data_array[ '_header' ] = $this->load->view( 'cms/_header', $dataHeader, TRUE );
        $categories = $this->categories_model->getCategories( FALSE );

        $this->data_array[ 'categories' ] = $categories;

        $this->load->view( 'cms/categories', $this->data_array );
    }

    public function add() {
        $data = $this->input->post( 'data', TRUE );

        if ( !empty( $data ) )
            $this->saveData( $data, null );

        $dataHeader = array( 'title' => 'Admin panel | Larrizo', 'page' => 'categories' );

        $this->data_array[ '_header' ] = $this->load->view( 'cms/_header', $dataHeader, TRUE );

        $categories = $this->categories_model->getCategories( FALSE );

        $this->data_array[ 'parent_categories' ] = $categories;

        $subcategories = array();

        foreach ( $categories as $category )
            $subcategories[ $category->id ] = $this->categories_model->getSubcategories( $category->id, FALSE );

        $this->data_array[ 'subcategories' ] = $subcategories;

        $this->load->view( 'cms/categories_addedit', $this->data_array );
    }

    public function edit() {
        $id = $this->input->get_post( 'id', TRUE );

        if ( empty( $id ) )
            show_404();

        $data = $this->input->post( 'data', TRUE );

        if ( !empty( $data ) )
            $this->saveData( $data, $id );

        $dataHeader = array( 'title' => 'Admin panel | Larrizo', 'page' => 'categories' );

        $this->data_array[ '_header' ] = $this->load->view( 'cms/_header', $dataHeader, TRUE );
        $this->data_array[ 'data' ] = $this->categories_model->get( $id );

        $categories = $this->categories_model->getCategories( FALSE );

        $this->data_array[ 'parent_categories' ] = $categories;

        $subcategories = array();

        foreach ( $categories as $category )
            $subcategories[ $category->id ] = $this->categories_model->getSubcategories( $category->id, FALSE );
        $this->data_array[ 'subcategories' ] = $subcategories;

        $this->load->view( 'cms/categories_addedit', $this->data_array );
    }

    private function saveData( $data, $id ) {
        $data[ 'alias' ] = preg_replace( "/[^A-Za-z0-9]/", '-', strtolower( $data[ 'alias' ] ) );

        $ifUrlExists = $this->categories_model->getCategoryByAlias( $data[ 'alias' ], !empty( $data[ 'refparent' ] ) ? $data[ 'refparent' ] : null, $id );

        if ( !empty( $ifUrlExists ) ) {
            print json_encode( array( 'notif' => '<span class="error">Url exists. Please choose another one.</span>' ) );
            exit;
        }

        if ( empty( $data[ 'refparent' ] ) )
            $data[ 'refparent' ] = null;

        $data[ 'timestamp' ] = time();

        if ( !empty( $id ) )
            $this->categories_model->update( array( 'id' => $id ), $data );
        else
            $id = $this->categories_model->insert( $data );

        if ( !empty( $id ) )
            print json_encode( array( 'url' => '/cms/categories' ) );
        else
            print json_encode( array( 'notif' => '<span class="error">Saving failed! Please try again.</span>' ) );
        exit;
    }

    public function delete() {
        $id = $this->input->get_post( 'id', TRUE );

        if ( empty( $id ) )
            show_404();

        $this->categories_model->update( array( 'id' => $id ), array( 'deleted' => 1 ) );
        redirect( '/cms/categories' );
    }

    public function getSubcategories() {
        $id = $this->input->get_post( 'id', TRUE );

        $subcategories = $this->categories_model->getSubcategories( $id, FALSE );

        $this->data_array[ 'subcategories' ] = $subcategories;
        $this->load->view( 'cms/categories_subcategories', $this->data_array );
    }

    public function updateFlag() {
        $id = $this->input->post('id');
        $flag = $this->input->post('flag');
        $value = $this->input->post('value');

        $this->categories_model->update( array( 'id' => $id ), array($flag => $value) );
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */