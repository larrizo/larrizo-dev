<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Tata
 * Date: 3/15/14
 * Time: 1:46 PM
 * To change this template use File | Settings | File Templates.
 */
class Assets_model extends CI_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get( $id ) {
        $this->db->where( 'id', $id );
        $query = $this->db->get( 'categories' );

        if ( $query->num_rows() > 0 )
            return $query->row();

        return FALSE;
    }

    function insert( $data ) {
        $this->db->insert( 'assets', $data );
        return $this->db->insert_id();
    }

    function update( $condition, $data ) {
        $this->db->update( 'categories', $data, $condition );
    }

    function delete( $condition ) {
        $this->db->delete( 'categories', $condition );
    }

    function getCategoryByAlias($alias, $parentID = null, $id = null) {
        if (!empty($parentID))
            $this->db->where('refparent', $parentID);

        if (!empty($id))
            $this->db->where('id !=', $id);

        $this->db->where('alias', $alias);
        $query = $this->db->get('categories');

        if ($query->num_rows() > 0)
            return $query->row();

        return FALSE;
    }

    function getCategories($published = TRUE) {
        if (!empty($published))
            $this->db->where('published' , 1);

        $this->db->where('refparent IS NULL');
        $this->db->order_by('order, name');
        $query = $this->db->get('categories');

        if ($query->num_rows() > 0)
            return $query->result();

        return FALSE;
    }

    function getSubcategories($parentID, $published = TRUE) {
        if (!empty($published))
            $this->db->where('published' , 1);

        $this->db->where('refparent', $parentID);
        $this->db->order_by('order, name');
        $query = $this->db->get('categories');

        if ($query->num_rows() > 0)
            return $query->result();

        return FALSE;
    }
}