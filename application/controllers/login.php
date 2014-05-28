<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_General {

    function __construct()
    {
        // this is your constructor
        parent::__construct();

        $this->load->model('users_model', '', TRUE);
    }

    public function index() {
        if ($this->session->userdata('loggedin'))
            redirect('/user');

        $this->data_header['title'] = 'Login | Larrizo';
        $this->data_header[ 'page' ] = 'login';
        $this->data_content[ '_header' ] = $this->load->view( '_header', $this->data_header, TRUE );
        $this->load->view( 'pages/login', $this->data_content );
    }

	public function submit()
	{
		$username = $this->input->post('username');
        $password = $this->input->post('password');
        $remember = $this->input->post('remember');

        $user = $this->users_model->getUserByUsername($username);

        if ($user === FALSE) {
            print json_encode(array('notif' => '<span class="error">Username doesn\'t exist. Try again.</span>'));
        } else {
            $user = $this->users_model->getUserByUsernamePassword($username, encodePassword($user->id, $password));

            if ($user === FALSE)
                print json_encode(array('notif' => '<span class="error">Wrong password. Try again.</span>'));
            else {
                $userdata = array(
                    'userid' => $user->id,
                    'user' => array(
                        'username'  => $user->username,
                        'email'     => $user->email,
                        'role'  => $user->role,
                    ),
                    'loggedin' => TRUE
                );

                $this->session->set_userdata($userdata);

                if ($this->input->get('referer') == FALSE)
                    print json_encode(array('reload' => 'true'));
                else
                    print json_encode(array('url' => $this->input->get('referer')));
            }
        }

        exit;
	}

    public function logout() {
        $this->session->sess_destroy();
        redirect($this->input->server('HTTP_REFERER'), 'refresh');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */