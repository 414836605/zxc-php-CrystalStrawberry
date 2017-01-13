<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Product_Model extends CI_Model{
	const TBL_CATEGORY = 'category';
	const TBL_PRODUCT = 'product';
	const TBL_CASE = 'case';
//  category
	public function list_category(){
		$cates = $this->db->get(self::TBL_CATEGORY)->result_array();
		return $this->_tree($cates);
	}
	public function add_category($data){
		return $this->db->insert(self::TBL_CATEGORY, $data);
	}

//  product
	public function get_product($category = 0){
		return $this->db->where('cate_id', $category)->get(self::TBL_PRODUCT)->result_array();
	}
	public function add_product($data){
		return $this->db->insert(self::TBL_PRODUCT, $data);
	}
	public function edit_product($data, $prodid){
		return $this->db->where('prod_id', $prodid)->update(self::TBL_PRODUCT, $data);
	}
	public function delete_product($prodid){
		$query = $this->db->where('prod_id', $prodid)->delete(self::TBL_PRODUCT);
		if($query && $this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

//  case
	public function get_cases($category = 0){
		return $this->db->where('cate_id', $category)->get(self::TBL_CASE)->result_array();
	}

	public function add_cases($data){
		return $this->db->insert(self::TBL_CASE, $data);
	}
	public function edit_cases($data, $caseid){
		return $this->db->where('case_id', $caseid)->update(self::TBL_CASE, $data);
	}
	public function delete_cases($caseid){
		$query = $this->db->where('case_id', $caseid)->delete(self::TBL_CASE);
		if($query && $this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	private function _tree($cates, $pid = 0, $level = 0){
		#保存结果用静态变量
		static $tree = array();
		foreach ($cates as $cate) {
			if($cate['parent_id'] == $pid){
				$cate['level'] = $level;
				$tree[] = $cate;
				$this->_tree($cates, $cate['cate_id'], $level+1);
			}
		}
		return $tree;
	}
}