<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Admin_model extends CI_Model{

	const TBL_ADMIN = 'admin';

	public function is_admin($admin_name, $password){
		$query = $this->db->where(array('admin_name'=>$admin_name,'password'=>md5($password)))->get(self::TBL_ADMIN);
		return $query->num_rows() > 0 ? true : false;
	}
}