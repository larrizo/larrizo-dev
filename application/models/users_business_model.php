<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Tata
 * Date: 3/15/14
 * Time: 1:46 PM
 * To change this template use File | Settings | File Templates.
 */
class Users_business_model extends Users_model {
    function get( $id ) {
        $this->db->where( 'id', $id );
        $subscriber = $this->db->get( 'users_business' );

        if ( $subscriber->num_rows() > 0 )
            return $subscriber->row();

        return FALSE;
    }

    function insert( $data ) {
        $this->db->insert( 'users_business', $data );
        return $this->db->insert_id();
    }

    function update( $condition, $data ) {
        $this->db->update( 'users_business', $data, $condition );
    }

    function delete( $condition ) {
        $this->db->delete( 'users_business', $condition );
    }

    function getBusinessByUser($uid) {
        $this->db->where('owner', $uid);
        $business = $this->db->get('users_business');

        if ( $business->num_rows() > 0 )
            return $business->row();

        return FALSE;
    }

    function getBusinessByAlias( $alias ) {
        $this->db->where( 'alias', $alias );
        $subscriber = $this->db->get( 'users_business' );

        if ( $subscriber->num_rows() > 0 )
            return $subscriber->row();

        return FALSE;
    }

    function insertUserBusinessPayment($data, $method) {
        $this->db->insert( "users_business_payment_$method", $data );
        return $this->db->insert_id();
    }

    function updateUserBusinessPayment( $condition, $data, $method ) {
        $this->db->update( "users_business_payment_$method", $data, $condition );
    }

    function deleteUserBusinessPayment($condition, $method) {
        $this->db->delete( "users_business_payment_$method", $condition );
    }

    function getUserBusinessPaymentByBusiness($business_id, $method) {
        $this->db->where('refbusiness', $business_id);
        $business = $this->db->get("users_business_payment_$method");

        if ( $business->num_rows() > 0 )
            return $business->row();

        return FALSE;
    }
}