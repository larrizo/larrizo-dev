<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Tata
 * Date: 3/15/14
 * Time: 1:46 PM
 * To change this template use File | Settings | File Templates.
 */

class Subscribers_model extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get($id) {
        $this->db->where('id', $id);
        $subscriber = $this->db->get('subscribers');

        if ($subscriber->num_rows() > 0)
            return $subscriber->row();

        return FALSE;
    }

    function insert($data) {
        return $this->db->insert('subscribers', $data);
    }

    function update($condition, $data) {
        $this->db->update('subscribers', $condition, $data);
    }

    function delete($condition) {
        $this->db->delete('subscribers', $condition);
    }

    function getSusbcriberByEmail($email) {
        $this->db->where('email', $email);
        $subscriber = $this->db->get('subscribers');

        if ($subscriber->num_rows() > 0)
            return $subscriber->row();

        return FALSE;
    }
}