<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_General extends CI_Controller
{

    protected $data_content;
    protected $data_header;

    function __construct()
    {
        // this is your constructor
        parent::__construct();

        $this->load->model('categories_model', '', TRUE);
        $this->load->model('data_model', '', TRUE);

        $this->data_header = array();
        $this->data_content['_footer'] = $this->load->view('_footer', '', TRUE);
        $this->getMainNavigation();
        $this->breadcrumbs();
    }

    function getMainNavigation()
    {
        $categories = $this->categories_model->getCategories();

        $this->data_header['parent_categories'] = $categories;

        $subcategories = array();

        foreach ($categories as $category) {
            $subcategories[$category->id] = $this->categories_model->getSubcategories($category->id);

            if (!empty($subcategories[$category->id])) {
                foreach ($subcategories[$category->id] as $subcategoryChild)
                    $subcategoriesChild[$subcategoryChild->id] = $this->categories_model->getSubcategories($subcategoryChild->id);
            }
        }

        $this->data_header['subcategories'] = $subcategories;

        $this->data_header['subcategoriesChild'] = $subcategoriesChild;
    }

    function breadcrumbs()
    {
        $this->data_header['breadcrumbs'] = array('home' => '/');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */