<?php
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
$this->load->database();// loading the databse
    }
    
    public function validate(){
        // grab user input
        $user_name = $this->security->xss_clean($this->input->post('user_name'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Prep the query
        $this->db->where('user_name', $user_name);
        $this->db->where('user_password', $password);
        
        // Run the query
        $query = $this->db->get('user_tb');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'user_id' => $row->user_id,
                    'first_name' => $row->first_name,
                    'last_name' => $row->last_name,
                    'user_name' => $row->user_name,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}
?>
