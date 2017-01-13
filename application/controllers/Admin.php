<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Admin extends Admin_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('product_model');
		$this->load->model('news_model');
		$this->load->library('form_validation');
	}
	public function index(){
		$data['admin'] = $this->session->userdata['admin'];
		$data['selected'] = 'none';
		$data['s_frist'] = '首页';
		$data['s_secend'] = '首页';
		$this->load->view('header.inc.html',$data);
		$this->load->view('index.html');
		$this->load->view('footer.inc.html');
	}
	public function user(){
		$data['admin'] = $this->session->userdata['admin'];
		$data['selected'] = 'user';
		$data['s_frist'] = '用户管理';
		$data['s_secend'] = '用户列表';
		$data['users'] = $this->user_model->all_user();
		$this->load->view('header.inc.html',$data);
		$this->load->view('user.html');
		$this->load->view('footer.inc.html');
	}
	public function product($category = 1){
		$data['admin'] = $this->session->userdata['admin'];
		$data['selected'] = 'product';
		$data['s_frist'] = '产品管理';
		$data['s_secend'] = '产品列表';
		$data['category'] = $category;
		$data['cates'] = $this->product_model->list_category();
		$data['products'] = $this->product_model->get_product($category);
		$this->load->view('header.inc.html',$data);
		$this->load->view('product.html');
		$this->load->view('footer.inc.html');
	}
	public function cases($category = 1){
		$data['admin'] = $this->session->userdata['admin'];
		$data['selected'] = 'cases';
		$data['s_frist'] = '案例管理';
		$data['s_secend'] = '案例列表';
		$data['category'] = $category;
		$data['cates'] = $this->product_model->list_category();
		$data['cases'] = $this->product_model->get_cases($category);
		$this->load->view('header.inc.html',$data);
		$this->load->view('cases.html');
		$this->load->view('footer.inc.html');
	}
	public function news(){
		$data['admin'] = $this->session->userdata['admin'];
		$data['selected'] = 'news';
		$data['s_frist'] = '新闻管理';
		$data['s_secend'] = '新闻列表';
		$data['news'] = 
		var_dump($data);
		$this->load->view('header.inc.html',$data);
		$this->load->view('news.html');
		$this->load->view('footer.inc.html');
	}
	public function download(){
		$data['admin'] = $this->session->userdata['admin'];
		$data['selected'] = 'download';
		$data['s_frist'] = '下载管理';
		$data['s_secend'] = '下载列表';
		var_dump($data);
		$this->load->view('header.inc.html',$data);
		$this->load->view('download.html');
		$this->load->view('footer.inc.html');
	}
	public function video(){
		$data['admin'] = $this->session->userdata['admin'];
		$data['selected'] = 'video';
		$data['s_frist'] = '视频管理';
		$data['s_secend'] = '视频列表';
		var_dump($data);
		$this->load->view('header.inc.html',$data);
		$this->load->view('video.html');
		$this->load->view('footer.inc.html');
	}
	public function message(){
		$data['admin'] = $this->session->userdata['admin'];
		$data['selected'] = 'message';
		$data['s_frist'] = '消息管理';
		$data['s_secend'] = '消息列表';
		var_dump($data);
		$this->load->view('header.inc.html',$data);
		$this->load->view('message.html');
		$this->load->view('footer.inc.html');
	}
	public function order(){
		$data['admin'] = $this->session->userdata['admin'];
		$data['selected'] = 'order';
		$data['s_frist'] = '订单管理';
		$data['s_secend'] = '订单列表';
		var_dump($data);
		$this->load->view('header.inc.html',$data);
		$this->load->view('order.html');
		$this->load->view('footer.inc.html');
	}

/*-------------用户-------------*/
	public function add_user(){
		$this->form_validation->set_rules('username', '用户名', 'required');
		$this->form_validation->set_rules('password', '密码', 'required');
		#验证表单输入
		if($this->form_validation->run() == false){
			echo validation_errors();
			return;
		}
		#获取表单输入
		$data['user_name'] = $this->input->post('username', true);
		$data['password'] = $this->input->post('password', true);
		if($this->input->post('email', true) === null){
			$data['email'] = 0;
		}else{
			$data['email'] = $this->input->post('email', true);
		}
		if($this->input->post('phone', true) === null){
			$data['phone'] = 0;
		}else{
			$data['phone'] = $this->input->post('phone', true);
		}
		if($this->input->post('realname', true) === null){
			$data['realname'] = 0;
		}else{
			$data['realname'] = $this->input->post('realname', true);
		}
		if($this->input->post('work', true) === null){
			$data['works'] = 0;
		}else{
			$data['works'] = $this->input->post('work', true);
		}
		#全部通过写入数据库
		$this->user_model->add_user($data);
		echo '添加成功';
	}
	public function edit_user(){
		$this->form_validation->set_rules('username', '用户名', 'required');
		$this->form_validation->set_rules('password', '密码', 'required');
		#验证表单输入
		if($this->form_validation->run() == false){
			echo validation_errors();
			return;
		}
		#获取表单输入
		$userid = $this->input->post('userid', true);
		$data['user_name'] = $this->input->post('username', true);
		$data['password'] = $this->input->post('password', true);
		if($this->input->post('email', true) === null){
			$data['email'] = 0;
		}else{
			$data['email'] = $this->input->post('email', true);
		}
		if($this->input->post('phone', true) === null){
			$data['phone'] = 0;
		}else{
			$data['phone'] = $this->input->post('phone', true);
		}
		if($this->input->post('realname', true) === null){
			$data['realname'] = 0;
		}else{
			$data['realname'] = $this->input->post('realname', true);
		}
		if($this->input->post('work', true) === null){
			$data['works'] = 0;
		}else{
			$data['works'] = $this->input->post('work', true);
		}
		#全部通过写入数据库
		$this->user_model->edit_user($data, $userid);
		echo '编辑成功';
	}
	public function delete_user(){
		$userid = $this->input->post('userid', true);
		if($this->user_model->delete_user($userid)) echo '删除成功';
	}

/*-------------产品-------------*/
//category
	public function add_category(){
		$this->form_validation->set_rules('name', '产品类别名', 'required');
		#验证表单输入
		if($this->form_validation->run() == false){
			echo validation_errors();
			return;
		}
		#获取表单输入
		$data['cate_name'] = $this->input->post('name', true);
		$data['parent_id'] = $this->input->post('fcate', true);
		#全部通过写入数据库
		$this->product_model->add_category($data);
		echo '添加成功';
	}
//product
	public function add_product(){
		$this->form_validation->set_rules('name', '产品名', 'required');
		#验证表单输入
		if($this->form_validation->run() == false){
			echo validation_errors();
			return;
		}
		#获取表单输入
		$data['prod_name'] = $this->input->post('name', true);
		$data['cate_id'] = $this->input->post('cate', true);
		if($this->input->post('describe', true) === null){
			$data['description_url'] = 0;
		}else{
			$data['description_url'] = $this->input->post('describe', true);
		}
		if($this->input->post('image', true) === null){
			$data['image_url'] = 0;
		}else{
			$data['image_url'] = $this->input->post('image', true);
		}
		if($this->input->post('download', true) === null){
			$data['download_url'] = 0;
		}else{
			$data['download_url'] = $this->input->post('download', true);
		}
		if($this->input->post('detail', true) === null){
			$data['detail_url'] = 0;
		}else{
			$data['detail_url'] = $this->input->post('detail', true);
		}
		if($this->input->post('price', true) === null){
			$data['price'] = 0;
		}else{
			$data['price'] = $this->input->post('price', true);
		}
		#全部通过写入数据库
		$this->product_model->add_product($data);
		echo '添加成功';
	}
	public function edit_product(){
		$this->form_validation->set_rules('name', '产品名', 'required');
		#验证表单输入
		if($this->form_validation->run() == false){
			echo validation_errors();
			return;
		}
		#获取表单输入
		$prodid = $this->input->post('prodid', true);
		$data['prod_name'] = $this->input->post('name', true);
		if($this->input->post('describe', true) === null){
			$data['description_url'] = 0;
		}else{
			$data['description_url'] = $this->input->post('describe', true);
		}
		if($this->input->post('image', true) === null){
			$data['image_url'] = 0;
		}else{
			$data['image_url'] = $this->input->post('image', true);
		}
		if($this->input->post('download', true) === null){
			$data['download_url'] = 0;
		}else{
			$data['download_url'] = $this->input->post('download', true);
		}
		if($this->input->post('detail', true) === null){
			$data['detail_url'] = 0;
		}else{
			$data['detail_url'] = $this->input->post('detail', true);
		}
		if($this->input->post('price', true) === null){
			$data['price'] = 0;
		}else{
			$data['price'] = $this->input->post('price', true);
		}
		#全部通过写入数据库
		$this->product_model->edit_product($data, $prodid);
		echo '编辑成功';
	}
	public function delete_product(){
		$prodid = $this->input->post('prodid', true);
		if($this->product_model->delete_product($prodid)) echo '删除成功';
	}
//cases
	public function add_cases(){
		$this->form_validation->set_rules('name', '案例名', 'required');
		#验证表单输入
		if($this->form_validation->run() == false){
			echo validation_errors();
			return;
		}
		#获取表单输入
		$data['case_name'] = $this->input->post('name', true);
		$data['cate_id'] = $this->input->post('cateid', true);
		if($this->input->post('describe', true) === null){
			$data['description_url'] = 0;
		}else{
			$data['description_url'] = $this->input->post('describe', true);
		}
		if($this->input->post('image', true) === null){
			$data['image_url'] = 0;
		}else{
			$data['image_url'] = $this->input->post('image', true);
		}
		if($this->input->post('download', true) === null){
			$data['download_url'] = 0;
		}else{
			$data['download_url'] = $this->input->post('download', true);
		}
		if($this->input->post('detail', true) === null){
			$data['detail_url'] = 0;
		}else{
			$data['detail_url'] = $this->input->post('detail', true);
		}
		#全部通过写入数据库
		$this->product_model->add_cases($data);
		echo '添加成功';
	}
	public function edit_cases(){
		$this->form_validation->set_rules('name', '案例名', 'required');
		#验证表单输入
		if($this->form_validation->run() == false){
			echo validation_errors();
			return;
		}
		#获取表单输入
		$caseid = $this->input->post('caseid', true);
		$data['case_name'] = $this->input->post('name', true);
		if($this->input->post('describe', true) === null){
			$data['description_url'] = 0;
		}else{
			$data['description_url'] = $this->input->post('describe', true);
		}
		if($this->input->post('image', true) === null){
			$data['image_url'] = 0;
		}else{
			$data['image_url'] = $this->input->post('image', true);
		}
		if($this->input->post('download', true) === null){
			$data['download_url'] = 0;
		}else{
			$data['download_url'] = $this->input->post('download', true);
		}
		if($this->input->post('detail', true) === null){
			$data['detail_url'] = 0;
		}else{
			$data['detail_url'] = $this->input->post('detail', true);
		}
		#全部通过写入数据库
		$this->product_model->edit_cases($data, $caseid);
		echo '编辑成功';
	}
	public function delete_cases(){
		$caseid = $this->input->post('caseid', true);
		if($this->product_model->delete_cases($caseid)) echo '删除成功';
	}



	public function logout(){
		$this->session->unset_userdata('admin');
		$this->session->sess_destroy();
		redirect('adminlogin/login');
	}
	public function test(){
		var_dump($this->product_model->list_category(18));
	}
}