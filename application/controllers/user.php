<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_User
{

    function __construct()
    {
        // this is your constructor
        parent::__construct();

        if (!$this->session->userdata('loggedin'))
            redirect('/login?referer=' . urlencode($this->input->server('REQUEST_URI')));
    }

    public function index()
    {
        $this->data_header['title'] = 'Feel your best shopping experience with us | Larrizo';
        $this->data_header['page'] = 'user';
        $this->data_content['_header'] = $this->load->view('_header', $this->data_header, TRUE);

        $udata = $this->users_model->get($this->session->userdata('userid'));

        $this->data_content['sidebar'] = $this->load->view('pages/user-sidebar', array('tabActive' => 'profile', 'business_owned' => $udata->business_owned), TRUE);
        $this->data_content['user_profile'] = $udata;
        $this->load->view('pages/user-account', $this->data_content);
    }

    public function edit()
    {
        $userdata = $this->input->post('user');
        $birthday = $this->input->post('birthday');

        if ((!empty($userdata['phone1']) && !validatePhone(trim($userdata['phone1'])))
            || (!empty($userdata['phone2']) && !validatePhone(trim($userdata['phone2'])))
        ) {
            print json_encode(array('notif' => '<span class="error">Wrong phone format.</span>'));
            exit;
        }

        if (!filter_var($userdata['email'], FILTER_VALIDATE_EMAIL)) {
            print json_encode(array('notif' => "<span class='error'>Your email address is not valid.</span>"));
            exit;
        }

        if (!empty($birthday)) {
            $birthtimestamp = mktime(0, 0, 0, $birthday['month'] + 1, $birthday['day'] + 1, $birthday['year']);
            $userdata['birthday'] = $birthtimestamp;
        }

        if (empty($userdata['phone1']))
            $userdata['phone1'] = NULL;
        if (empty($userdata['phone2']))
            $userdata['phone2'] = NULL;
        if (empty($userdata['thumbnail']))
            $userdata['thumbnail'] = NULL;

        $this->users_model->update(array('id' => $this->session->userdata('userid')), $userdata);
        print json_encode(array('alert' => 'Your profile is saved!'));
        exit;
    }

    public function change_password()
    {
        $oldPassword = $this->input->post('old_password');
        $newPassword = $this->input->post('new_password');
        $confirmPassword = $this->input->post('confirm_new_password');

        if (!empty($oldPassword) && !empty($newPassword) && !empty($confirmPassword)) {
            $user = $this->users_model->getUserByUsernamePassword($this->session->userdata('user')['username'], encodePassword($this->session->userdata('userid'), $oldPassword));

            if (empty($user)) {
                print json_encode(array('notif' => "<span class='error'>Old password is wrong.</span>"));
                exit;
            }

            if ($newPassword != $confirmPassword) {
                print json_encode(array('notif' => "<span class='error'>Password doesn't match.</span>"));
                exit;
            } else {
                $passwordPattern = validatePassword($newPassword);

                if (empty($passwordPattern)) {
                    print json_encode(array('notif' => "<span class='error'>Please check the password requirements.</span>"));
                    exit;
                }
            }

            $this->users_model->update(array('id' => $this->session->userdata('userid')), array('password' => encodePassword($this->session->userdata('userid'), $newPassword)));
            print json_encode(array('alert' => 'Your password is successfully changed.'));
            exit;
        }

        $this->data_header['title'] = 'Feel your best shopping experience with us | Larrizo';
        $this->data_header['page'] = 'user';
        $this->data_header['script'] = addScript(array('/media/js/custom/register.js'));
        $this->data_content['_header'] = $this->load->view('_header', $this->data_header, TRUE);
        $this->data_content['sidebar'] = $this->load->view('pages/user-sidebar', array('tabActive' => 'change-password'), TRUE);
        $this->data_content['user_profile'] = $this->users_model->get($this->session->userdata('userid'));
        $this->load->view('pages/user-change-password', $this->data_content);
    }

    public function my_business()
    {
        if ($this->input->post() !== FALSE) {
            $this->saveBusinessDetail();
            print json_encode(array('alert' => 'Your business detail is saved'));
            exit;
        }

        $this->data_header['breadcrumbs']['business detail'] = '';
        $this->data_header['title'] = 'Feel your best shopping experience with us | Larrizo';
        $this->data_header['page'] = 'user';
        $this->data_header['script'] = addScript(array('/media/js/custom/user.js'));
        $this->data_content['_header'] = $this->load->view('_header', $this->data_header, TRUE);
        $this->data_content['sidebar'] = $this->load->view('pages/user-sidebar', array('tabActive' => 'my-business'), TRUE);

        $tempBanks = $this->data_model->getBanks(TRUE);
        $banks = array();
        foreach ($tempBanks as $bank)
            $banks[$bank->id] = $bank->bank;
        $this->data_content['banks'] = $banks;

        $business = $this->users_business_model->getBusinessByUser($this->session->userdata('userid'));

        $this->data_content['user_business'] = $business;

        if (!empty($business) && !empty($business->payment_method)) {
            $payment_method = $this->users_business_model->getUserBusinessPaymentByBusiness($business->id, $business->payment_method);
            $this->data_content['payment_method'] = $payment_method;
        }

        $this->load->view('pages/user-business', $this->data_content);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */