<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Tata
 * Date: 3/15/14
 * Time: 1:46 PM
 * To change this template use File | Settings | File Templates.
 */
class Users_model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get( $id ) {
        $this->db->where( 'users.id', $id );
        $this->db->join( 'assets', 'thumbnail = assets.id' );
        $subscriber = $this->db->get( 'users' );

        if ( $subscriber->num_rows() > 0 )
            return $subscriber->row();

        return FALSE;
    }

    function insert( $data ) {
        $this->db->insert( 'users', $data );
        return $this->db->insert_id();
    }

    function update( $condition, $data ) {
        $this->db->update( 'users', $data, $condition );
    }

    function delete( $condition ) {
        $this->db->delete( 'users', $condition );
    }

    function getUserByUsername( $username ) {
        $this->db->where( 'username', $username );
        $user = $this->db->get( 'users' );

        if ( $user->num_rows() > 0 )
            return $user->row();

        return FALSE;
    }

    function getUserByEmail( $email ) {
        $this->db->where( 'email', $email );
        $user = $this->db->get( 'users' );

        if ( $user->num_rows() > 0 )
            return $user->row();

        return FALSE;
    }

    function getUserByUsernamePassword( $username, $password ) {
        $this->db->select( 'users.*, roles.name as role' );
        $this->db->where( 'username', $username );
        $this->db->where( 'password', $password );
        $this->db->join( 'roles', 'refrole=roles.id' );
        $user = $this->db->get( 'users' );

        if ( $user->num_rows() > 0 )
            return $user->row();

        return FALSE;
    }
}