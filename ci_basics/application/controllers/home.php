<?php

class Home extends CI_Controller {


public function __construct()// constuctor
{
parent::__construct();
$this->load->helper("url");
$this->load->model('home_model');// load news_model at startup
$this->load->library('pagination'); //call pagination library
$this->load->library('session');
}

public function index($msg = NULL)
{
$data['msg'] = $msg;

$config = array();
$config["base_url"] = base_url() ."index.php/home";
$config["total_rows"] = $this->home_model->record_count();
$config["per_page"] = 8;
$config["uri_segment"] = 3;
$this->pagination->initialize($config);
$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
echo $page.'xccxv';

$data['image_tb'] = $this->home_model->get_images($config['per_page'], $page);// function writen in model

$data["links"] = $this->pagination->create_links();

$this->load->view('includes/header', $data);
 if(! $this->session->userdata('validated')){
$this->load->view('login_view', $data['msg']);
}
else{
echo 'Congratulations, you are logged in.';
        // Add a link to logout
echo '<br /><a href="index.php/home/do_logout">Logout Fool!</a>';
echo '<br /><a href="index.php/user_home">inbox!</a>';
}

$this->load->view('home_view', $data);

$this->load->view('includes/footer', $data);

}
 public function process(){
        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            // If user did validate, 
            // Send them to members area
$this->index();
        }        
    }

 public function do_logout(){
        $this->session->sess_destroy();
$this->index();
    }
}
?>
