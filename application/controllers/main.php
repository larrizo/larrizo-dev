<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main extends MY_General
{
    function __construct()
    {
        // this is your constructor
        parent::__construct();
    }

    public function index()
    {

        $this->data_header['title'] = 'Feel your best shopping experience with us | Larrizo';

        $this->data_header['page'] = 'home';
        $this->data_header['script'] = addScript(array('/media/js/custom/homepage.js'));
        $this->data_content['_header'] = $this->load->view('_header', $this->data_header, TRUE);
        $this->data_content['_blocks'] = initBlocks(array('todays-deal', 'newsletter', 'facebook'));

        $this->load->view('homepage', $this->data_content);
    }

    public function upload()
    {
        $this->load->model('assets_model', '', TRUE);

        $size = $this->input->post('size');

        if (!empty($size)) {
        }

        $config['upload_path'] = FCPATH . '/uploads/users/user_' . $this->session->userdata('userid');
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = ALLOWED_IMAGE_SIZE;

        if (!file_exists($config['upload_path']))
            mkdir($config['upload_path'], 0777, TRUE);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload())
            print json_encode(array('error' => strip_tags($this->upload->display_errors())));
        else {
            $uploadedData = $this->upload->data();

            if ($uploadedData['is_image']) {
                $this->upload->strip_image($uploadedData['full_path']);
                $uploadedData = $this->upload->data();

                if (!file_exists($config['upload_path'].'/thumbs'))
                    mkdir($config['upload_path'].'/thumbs', 0777, TRUE);

                $this->upload->thumbnail($uploadedData['full_path'],
                    $uploadedData['file_path'] . 'thumbs/' . $uploadedData['raw_name'] . '_big' . $uploadedData['file_ext'],
                    200, 200);
                $this->upload->thumbnail($uploadedData['full_path'],
                    $uploadedData['file_path'] . 'thumbs/' . $uploadedData['raw_name'] . '_medium' . $uploadedData['file_ext'],
                    100, 100);
                $this->upload->thumbnail($uploadedData['full_path'],
                    $uploadedData['file_path'] . 'thumbs/' . $uploadedData['raw_name'] . '_small' . $uploadedData['file_ext'],
                    50, 50);
            }

            if (!empty($uploadedData['image_width']) && !empty($uploadedData['image_height']) && $uploadedData['image_height'] / $uploadedData['image_width'] >= 1)
                $orientation = 'portrait';
            else
                $orientation = 'landscape';

            $imageData = array(
                'uploader' => $this->session->userdata('userid'),
                'filepath' => '/uploads/users/user_' . $this->session->userdata('userid') . '/' . $uploadedData['orig_name'],
                'thumbpath' => '/uploads/users/user_' . $this->session->userdata('userid') . '/thumbs/',
                'dirpath' => '/uploads/users/user_' . $this->session->userdata('userid').'/',
                'rawname' => $uploadedData['raw_name'],
                'extension' => $uploadedData['file_ext'],
                'oriname' => $uploadedData['orig_name'],
                'width' => $uploadedData['image_width'],
                'height' => $uploadedData['image_height'],
                'orientation' => $orientation,
                'mime' => $uploadedData['file_type'],
                'type' => 'user',
                'timestamp' => time(),
                'ip' => $this->input->ip_address()
            );

            $imageData['id'] = $this->assets_model->insert($imageData);
        }

        print json_encode($imageData);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */