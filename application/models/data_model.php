<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Tata
 * Date: 3/15/14
 * Time: 1:46 PM
 * To change this template use File | Settings | File Templates.
 */
class Data_model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getBanks($displayed) {
        if ($displayed)
            $this->db->where( 'display', 1 );

        $query = $this->db->get( 'banks' );

        if ( $query->num_rows() > 0 )
            return $query->result();

        return FALSE;
    }

}