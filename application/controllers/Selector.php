<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Selector extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
	parent::__construct();
	}
	
	public function index()
	{	
		$this->load->view('header');
		$this->load->view('teachers');
		$this->load->view('footer');
	}

	public function verify()
	{
		$data = array(
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password')
		);
		$result=$this->login_model->login($data);

		if( is_array($result) ){
			$data = array('id' => $result[0]->id);
			$this->session->set_userdata('username', $result[0]->username);
			$this->session->set_userdata('userid', $result[0]->id);
			$this->session->set_userdata('password', $result[0]->pass);
			$result=$this->login_model->sessionData($data);
			$this->session->set_userdata('user', $result[0]->name);
			$this->load->view('teachers');
		}
		else{
			$this->index();
		}
	}
}