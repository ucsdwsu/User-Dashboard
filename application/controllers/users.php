<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}

	public function signin()
	{
		$this->load->view('signin');
	}

	public function signin_action(){
		$user = $this->User->get_user($this->input->post());
		if($user){
			$this->session->set_userdata('user_level', $user['user_level']);
			$this->session->set_userdata('LoggedIn', true);
			$this->session->set_userdata('current_user_id', $user['id']);
			$success[] = 'Login successful!';
			$this->session->set_userdata('success', $success);
			$this->show_users();
		}
		else{
			$error[] = 'No matching record found!';
			$this->session->set_userdata('errors', $error);
			$this->signin();
		}
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function register_action()
	{
		$result = $this->User->validate($this->input->post());
		if($result == "valid") {
			$success[] = 'Registration successful!';
			$this->session->set_userdata('success', $success);
			$this->User->add_user($this->input->post());
			$this->signin();
		} 
		else {
			$errors = array(validation_errors());
			$this->session->set_userdata('errors', $errors);
			$this->register();
		}
	}

	public function show_users()
	{
		$users = array("users" => $this->User->get_all_users());
		$id = array();
		$first_name = array();
		$last_name = array();
		$email = array();
		$created_at = array();
		$user_level = array();
		$description = array();
		foreach($users as $key => $value){
			foreach($value as $v){
				array_push($id, $v['id']);
				array_push($first_name, $v['first_name']);
				array_push($last_name, $v['last_name']);
				array_push($email, $v['email']);
				array_push($created_at, $v['created_at']);
				array_push($user_level, $v['user_level']);
				array_push($description, $v['description']);
			}
		}
		$u = array(
			"id" => $id,
			"first_name" => $first_name,
			"last_name" => $last_name,
			"email" => $email,
			"created_at" => $created_at,
			"user_level" => $user_level,
			"description" => $description
			);
		$this->load->view('show_users', $u);
	}

	public function add_user()
	{
		$this->load->view('register');
	}

	public function add_user_action()
	{
		$result = $this->User->validate($this->input->post());
		if($result == "valid") {
			$success[] = 'User was added successfully!';
			$this->session->set_userdata('success', $success);
			$this->User->add_user($this->input->post());
			$this->show_users();
		} else {
			$errors = array(validation_errors());
			$this->session->set_userdata('errors', $errors);
			$this->add_user();
		}
	}

	public function edit_user($user_id)
	{
		$user = $this->User->get_user_by_id($user_id);
		$this->load->view('edit_user', $user);
	}

	public function edit_user_action($user_id)
	{
		$action = $this->input->post('action');
		if($action == 'basic'){
			$result = $this->User->validate_basic($this->input->post());
		}
		if($action == 'password'){
			$result = $this->User->validate_password($this->input->post());
		}
		if($action == 'description'){
			$result = $this->User->validate_description($this->input->post());
		}
		if($result == "valid") {
			$success[] = 'Changes saved!';
			$this->session->set_userdata('success', $success);
			$this->User->update_user($user_id, $this->input->post());
			$this->show_users();
		} else {
			$errors = array(validation_errors());
			$this->session->set_userdata('errors', $errors);
			$this->edit_user($user_id);
		}
	}

	public function remove_user_action($user_id)
	{
		$this->User->delete_user_by_id($user_id);
		$this->show_users();
	}

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}