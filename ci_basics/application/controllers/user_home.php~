<?php

class User_home extends CI_Controller {


public function __construct()// constuctor
{
parent::__construct();
$this->load->helper("url");
$this->load->model('user_home_model');// load news_model at startup
$this->load->library('pagination'); //call pagination library
$this->load->library('session');
}

public function index()
{
if(! $this->session->userdata('validated')){
redirect('index.php/home');
}
$data['image_tb'] = $this->user_home_model->get_image();// function writen in model
$this->load->view('includes/header', $data);
$this->load->view('home_view', $data);

$this->load->view('includes/footer', $data);
}
}
}
