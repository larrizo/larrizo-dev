<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landingpage extends CI_Controller {

    function __construct()
    {
        // this is your constructor
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('landingpage');
	}

    function subscribe() {
        $email = $this->input->post('email');

        if (!empty($email)) {
            $this->load->model('subscribers_model', '', TRUE);

            $subscriber = $this->subscribers_model->getSusbcriberByEmail($email);

            if (empty($subscriber))
                $this->subscribers_model->insert(array('email' => $email, 'timestamp' => time(), 'ip' => $this->input->ip_address()));
            else
                $this->subscribers_model->update(array('id' => $subscriber->id), array('timestamp' => time(), 'ip' => $this->input->ip_address()));

        }

        redirect('/');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */