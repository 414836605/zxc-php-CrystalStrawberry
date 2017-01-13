<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class User_Model extends CI_Model{
	const TBL_USER = 'user';
	public function all_user(){
		$query = $this->db->get(self::TBL_USER);
		return $query->result_array();
	}
	public function add_user($data){
		return $this->db->insert(self::TBL_USER, $data);
	}
	public function edit_user($data, $userid){
		return $this->db->where('user_id', $userid)->update(self::TBL_USER, $data);
	}
	public function delete_user($userid){
		$query = $this->db->where('user_id', $userid)->delete(self::TBL_USER);
		if($query && $this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}