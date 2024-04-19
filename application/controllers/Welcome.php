<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function validation(){
		
		$this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
		
		
		if ($this->form_validation->run() == false) {
			$email_error = $this->form_validation->error('email');
			$password_error = $this->form_validation->error('password');
		
			$response = array(
				'status' => 'error',
				'message' => array(
					'email' => $email_error,
					'password' => $password_error
				)
			);
		
			echo json_encode($response);
		}
		else{
			$response = array(
				'status' => 'success',
				'redirect' => base_url('welcome/output') // Specify the URL where you want to redirect
			);
			echo json_encode($response);
	

		}

	}
	public function output(){
		$this->load->view("output");
	}
	
}
