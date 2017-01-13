<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Adminlogin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('captcha');
		$this->load->library('form_validation');
		$this->load->model('admin_model');
	}
	public function login(){
		$this->load->view('login.html');
	}
	public function do_adminlogin(){
		$this->form_validation->set_rules('username', '用户名', 'required');
		$this->form_validation->set_rules('password', '密码', 'required');
		$code = strtolower($this->input->post('code'));
		$captcha = strtolower($this->session->userdata('captcha'));
		#验证验证码
		if($code!=$captcha){
			echo '验证码错误';
			return;
		}
		#验证表单输入
		if($this->form_validation->run() == false){
			echo validation_errors();
			return;
		}
		#验证用户名密码
		$admin_name = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		if(!$this->admin_model->is_admin($admin_name, $password)){
			echo '用户名或密码错误';
			return;
		}
		#全部通过写入session
		$this->session->set_userdata('admin', $admin_name);
		echo 'ok';
	}
	public function create_code(){
		$vals = array(
		    'img_path'  => './data/captcha/',
		    'img_url'   => base_url('data/captcha'),
		    'img_width' => '120',
		    'img_height'    => 34,
		    'expiration'    => 7200,
		    'word_length'   => 4,
		    'font_size' => 16,
		    'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
		);
		$cap = create_captcha($vals);
		var_dump($cap);
		$this->session->set_userdata('captcha', $cap['word']);
	}
}