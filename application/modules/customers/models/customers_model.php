<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customers_model extends My_Model {

    public function __construct() {
        parent::__construct();
    }

    protected $primary_key = "id";
    protected $_table = "customers";

    public function customers_count() {
        return $this->db->count_all("customers");
    }

    public function fetch_customers($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
        $query = $this->db->get("customers");

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function getCustomerNames($term) {
        $this->db->select('name');
        $this->db->like('name', $term, 'both');
        $q = $this->db->get('customers');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

}
