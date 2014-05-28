<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_User
{
    public function index()
    {
        if ($this->session->userdata('loggedin'))
            redirect('/user');

        $this->data_header['title'] = 'Feel your best shopping experience with us | Larrizo';
        $this->data_header['page'] = 'register';
        $this->data_header['script'] = addScript(array('/media/js/custom/register.js'));
        $this->data_content['_header'] = $this->load->view('_header', $this->data_header, TRUE);
        $this->load->view('pages/register', $this->data_content);
    }

    public function submit($business = FALSE)
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirmPassword = $this->input->post('confirm_password');

        if (empty($password) || empty($confirmPassword) || empty($email) || empty($username)) {
            print json_encode(array('notif' => "<span class='error'>Please check all the required fields.</span>"));
            exit;
        }

        if ($password != $confirmPassword) {
            print json_encode(array('notif' => "<span class='error'>Password doesn't match.</span>"));
            exit;
        } else {
            $passwordPattern = validatePassword($password);

            if (empty($passwordPattern)) {
                print json_encode(array('notif' => "<span class='error'>Please check the password requirements.</span>"));
                exit;
            }
        }

        $response = $this->usernameValidation(FALSE);

        if (!empty($response['error'])) {
            print json_encode(array('notif' => $response['error']));
            exit;
        }

        $response = $this->emailValidation(FALSE);

        if (!empty($response['error'])) {
            print json_encode(array('notif' => $response['error']));
            exit;
        }

        $userdata = array(
            'refrole' => 3, //3 is member
            'username' => $username,
            'email' => $email,
            'ip' => $this->input->ip_address(),
            'timestamp' => time()
        );

        if ($business)
            $userdata['business_owned'] = 1;

        $uid = $this->users_model->insert($userdata);

        $this->users_model->update(array('id' => $uid), array('password' => encodePassword($uid, $password)));

        $userdata = array(
            'userid' => $uid,
            'user' => array(
                'username' => $username,
                'email' => $email,
                'role' => 'member',
            ),
            'loggedin' => TRUE
        );

        $this->session->set_userdata($userdata);

        if (!$business) {
            print json_encode(array('url' => '/user?userStatus=1'));
            exit;
        }
    }

    public function business()
    {
        if ($this->session->userdata('loggedin'))
            redirect('/user');

        $this->data_header['title'] = 'Seller registration | Larrizo';
        $this->data_header['page'] = 'register';
        $this->data_header['script'] = addScript(array('/media/js/custom/register.js'));
        $this->data_content['_header'] = $this->load->view('_header', $this->data_header, TRUE);
        $this->load->view('pages/register-business', $this->data_content);
    }

    public function submit_business_account()
    {
        $this->submit(TRUE);
        $this->saveBusinessDetail();
        print json_encode(array('url' => '/user/my-business?userStatus=1#payment-method'));
        exit;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */