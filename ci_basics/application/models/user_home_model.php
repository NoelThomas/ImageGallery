<?php

class User_home_model extends CI_Model {

public function __construct()
{
$this->load->database();// loading the databse
}

public function get_image()
{

$this->db->select('*');
$this->db->from('image_tb');
$this->db->join('category_tb', 'category_tb.category_id = image_tb.category_id');
$this->db->join('user_tb', 'user_tb.user_id = image_tb.user_id');
$this->db->order_by('image_id', 'desc');

$query = $this->db->get();

return $query->result_array();
}

}
