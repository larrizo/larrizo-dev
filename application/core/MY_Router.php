<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Router extends CI_Router
{

    function MY_Router()
    {
        parent::__construct();
    }

    public function _set_request($segments)
    {
        foreach($segments as $i => $segment) {
            $segments[$i] = str_replace('-', '_', $segment);
        }

// Run the original _set_request method, passing it our updated segments.
        parent::_set_request($segments);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */