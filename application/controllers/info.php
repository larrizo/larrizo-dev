<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Info extends MY_General
{
    function __construct()
    {
        // this is your constructor
        parent::__construct();
    }

    public function index()
    {
        phpinfo();
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */