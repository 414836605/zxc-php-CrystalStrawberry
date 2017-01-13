<?php
defined('BASEPATH') OR exit('No direct script access allowed');

#前台父控制器
class Home_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->change_home();
	}
}

#后台父控制器
class Admin_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->change_admin();
		#权限验证
		if(! $this->session->userdata('admin')){
			redirect(site_url('adminlogin/login'));
		}
	}
}
