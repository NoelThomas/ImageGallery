
<?php
class Home_model extends CI_Model {

public function __construct()
{
$this->load->database();// loading the databse

}

public function record_count() {
return $this->db->count_all("image_tb");
}

public function get_images($limit, $start)
{

$this->db->limit($limit, $start);
$this->db->select('*');
$this->db->from('image_tb');
$this->db->join('category_tb', 'category_tb.category_id = image_tb.category_id');
$this->db->join('user_tb', 'user_tb.user_id = image_tb.user_id');
$this->db->order_by('image_id', 'desc');

$query = $this->db->get();

return $query->result_array();// returing array of data

//$query = $this->db->get_where('image_tb', array('title' => $title));// getting news with conditions
//return $query->row_array();// returing array of data
}

}
?>

