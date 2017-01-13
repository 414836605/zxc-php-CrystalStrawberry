<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller{
	public function index(){
		$this->load->view('index.html');
		$this->load->view('footer.inc.html');
	}
	public function manage(){
		$this->load->view('header.inc.html');
		$this->load->view('manage.html');
		$this->load->view('footer.inc.html');
	}
	public function help(){
		$this->load->view('header.inc.html');
		$this->load->view('help.html');
		$this->load->view('footer.inc.html');
	}
	public function call_us(){
		$this->load->view('header.inc.html');
		$this->load->view('call_us.html');
		$this->load->view('footer.inc.html');
	}
	public function regist(){
		$this->load->view('header.inc.html');
		$this->load->view('regist.html');
		$this->load->view('footer.inc.html');
	}
	public function login(){
		$this->load->view('header.inc.html');
		$this->load->view('login.html');
		$this->load->view('footer.inc.html');
	}
	public function product(){
		$this->load->view('header.inc.html');
		$this->load->view('product.html');
		$this->load->view('footer.inc.html');
	}
	public function cases(){
		$this->load->view('header.inc.html');
		$this->load->view('cases.html');
		$this->load->view('footer.inc.html');
	}
	public function news(){
		$this->load->view('header.inc.html');
		$this->load->view('news.html');
		$this->load->view('footer.inc.html');
	}
	public function joinus(){
		$this->load->view('header.inc.html');
		$this->load->view('joinus.html');
		$this->load->view('footer.inc.html');
	}
	public function community(){
		$this->load->view('header.inc.html');
		$this->load->view('community.html');
		$this->load->view('footer.inc.html');
	}
	public function about(){
		$this->load->view('header.inc.html');
		$this->load->view('about.html');
		$this->load->view('footer.inc.html');
	}
}
