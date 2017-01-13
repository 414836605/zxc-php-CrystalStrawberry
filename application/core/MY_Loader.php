<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class MY_Loader extends CI_Loader{
	#更换主页路径
	public function change_home(){
		$this->_ci_view_paths = array(FCPATH . HOME_DIR => TRUE);
	}
	#更换后台管理页面路径
	public function change_admin(){
		$this->_ci_view_paths = array(FCPATH . ADMIN_DIR => TRUE);
	}
}