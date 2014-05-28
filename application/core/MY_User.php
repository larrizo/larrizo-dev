<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_User extends MY_General
{

    function __construct()
    {
        // this is your constructor
        parent::__construct();

        $this->load->model('users_model', '', TRUE);
        $this->load->model('users_business_model', '', TRUE);
    }

    function saveBusinessDetail()
    {
        $business_detail = array();

        $post_data = $this->input->post();
        $required_fields = array('address', 'city', 'province');

        if (!empty($post_data['payment_method'])) {
            switch ($post_data['payment_method']) {
                case "bank":
                    $required_fields[] = 'bank_name';
                    $required_fields[] = 'bank_number';
                    $required_fields[] = 'bank_bic';
                    break;
                case "credit_card":
                    $required_fields[] = 'cc_number';
                    $required_fields[] = 'cc_cvv';
                    $required_fields[] = 'cc_name';
                    $expiration_date = mktime(0, 0, 0, $this->input->post('cc_expiration_date')['month'] + 1, 1, $this->input->post('cc_expiration_date')['year']);
                    $now = mktime(0, 0, 0, date('m', time()), 1, date('Y', time()));

                    if ($expiration_date <= $now) {
                        print json_encode(array('alert' => 'Your credit card seems to be expired.'));
                        exit;
                    }

                    break;
                case "paypal":
                    $required_fields[] = 'paypal_email';
                    break;
            }
        }

        foreach ($post_data as $field => $data) {
            if (in_array($field, $required_fields) && empty($data)) {
                print json_encode(array('alert' => 'Please check all the required fields.'));
                exit;
            }
        }

        $old_business_data = $this->users_business_model->getBusinessByUser($this->session->userdata('userid'));

        $business_detail['address'] = $this->input->post('address');
        $business_detail['postcode'] = $this->input->post('postcode');
        $business_detail['city'] = $this->input->post('city');
        $business_detail['province'] = $this->input->post('province');
        $business_detail['payment_method'] = $this->input->post('payment_method');
        $business_detail['last_update'] = time();

        if ($this->input->post('business_id') == FALSE) {
            $business_detail['owner'] = $this->session->userdata('userid');
            $business_detail['name'] = $this->input->post('name');
            $business_detail['ip'] = $this->input->ip_address();
            $business_detail['created'] = time();

            $count = 1;
            do {
                if ($count > 1)
                    $business_detail['alias'] = url_title($business_detail['name'] . '-' . $count, '-', TRUE);
                else
                    $business_detail['alias'] = url_title($business_detail['name'], '-', TRUE);
                $count++;
            } while ($this->users_business_model->getBusinessByAlias($business_detail['alias']) !== FALSE);

            $id = $this->users_business_model->insert($business_detail);
        } else {
            $this->users_business_model->update(array('id' => $this->input->post('business_id')), $business_detail);
        }

        if (!empty($old_business_data) && $old_business_data->payment_method != $post_data['payment_method'])
            $this->users_business_model->deleteUserBusinessPayment(array('refbusiness' => $old_business_data->id), $old_business_data->payment_method);

        if (!empty($old_business_data))
            $old_payment = $this->users_business_model->getUserBusinessPaymentByBusiness($old_business_data->id, $old_business_data->payment_method);

        if (!empty($post_data['payment_method'])) {
            switch ($post_data['payment_method']) {
                case "bank":
                    $payment_data['refbusiness'] = !empty($old_business_data) !== FALSE ? $old_business_data->id : $id;
                    $payment_data['refbank'] = $this->input->post('bank_company');
                    $payment_data['bic'] = $this->input->post('bank_bic');
                    $payment_data['account_number'] = $this->input->post('bank_number');
                    $payment_data['account_name'] = $this->input->post('bank_name');

                    if (empty($old_payment))
                        $this->users_business_model->insertUserBusinessPayment($payment_data, 'bank');
                    else
                        $this->users_business_model->updateUserBusinessPayment(array('refbusiness' => $old_business_data->id), $payment_data, 'bank');

                    break;
                case "credit_card":
                    $result = $this->creditcard_validation();

                    if (!empty($result['error'])) {
                        print json_encode(array('alert' => 'Your credit card number is invalid.'));
                        exit;
                    }

                    $payment_data['refbusiness'] = !empty($old_business_data) !== FALSE ? $old_business_data->id : $id;
                    $payment_data['card_number'] = $this->input->post('cc_number');
                    $payment_data['cvv'] = $this->input->post('cc_cvv');
                    $payment_data['card_name'] = $this->input->post('cc_name');
                    $payment_data['expiration_date_month'] = $this->input->post('cc_expiration_date')['month'] + 1;
                    $payment_data['expiration_date_year'] = $this->input->post('cc_expiration_date')['year'];
                    $payment_data['type'] = $result['matched'];

                    if (empty($old_payment))
                        $this->users_business_model->insertUserBusinessPayment($payment_data, 'credit_card');
                    else
                        $this->users_business_model->updateUserBusinessPayment(array('refbusiness' => $old_business_data->id), $payment_data, 'credit_card');

                    break;
                case "paypal":
                    $payment_data['refbusiness'] = !empty($old_business_data) !== FALSE ? $old_business_data->id : $id;
                    $payment_data['email'] = $this->input->post('paypal_email');

                    if (empty($old_payment))
                        $this->users_business_model->insertUserBusinessPayment($payment_data, 'paypal');
                    else
                        $this->users_business_model->updateUserBusinessPayment(array('refbusiness' => $old_business_data->id), $payment_data, 'paypal');

                    break;
            }
        }

        return TRUE;
    }

    public function creditcard_validation($number = '')
    {
        if ($this->input->post('cc_number') !== FALSE)
            $number = $this->input->post('cc_number');

        $print = $this->input->post('print');

        $response = array('error' => TRUE);

        if (preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $number))
            $response = array('matched' => 'visa');

        if (preg_match('/^5[1-5][0-9]{14}$/', $number))
            $response = array('matched' => 'mastercard');

        if (preg_match('/^3[47][0-9]{13}$/', $number))
            $response = array('matched' => 'american_express');

        if (preg_match('/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/', $number))
            $response = array('matched' => 'diners_club');

        if (preg_match('/^6(?:011|5[0-9]{2})[0-9]{12}$/', $number))
            $response = array('matched' => 'discover');

        if (preg_match('/^(?:2131|1800|35\d{3})\d{11}$/', $number))
            $response = array('matched' => 'jcb');

        if (!$print)
            return $response;

        print json_encode($response);
        exit;
    }

    public function usernameValidation($print = TRUE)
    {
        $username = $this->input->post('username');

        $ignoredUsername = array('admin', 'administrator', 'editor', 'member');

        $username = trim($username);

        $response = array('success' => '');

        if (strlen($username) < 4)
            $response = array('error' => "<span class='error'>Username must be at least 4 characters.</span>");
        elseif (in_array($username, $ignoredUsername))
            $response = array('error' => "<span class='error'>This username is not allowed.</span>");
        elseif ($this->users_model->getUserByUsername($username) !== FALSE)
            $response = array('error' => '<span class="error">Username exists. Please choose another username.</span>');

        if (!$print)
            return $response;
        else {
            print json_encode($response);
            exit;
        }
    }

    public function emailValidation($print = TRUE)
    {
        $email = $this->input->post('email');

        $email = trim($email);

        $response = array('success' => '');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $response = array('error' => "<span class='error'>Your email address is not valid.</span>");
        elseif ($this->users_model->getUserByEmail($email) !== FALSE)
            $response = array('error' => '<span class="error">Email exists. Please choose another email.</span>');

        if (!$print)
            return $response;
        else {
            print json_encode($response);
            exit;
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */