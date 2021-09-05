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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	    	$this->load->helper('common_helper');
		
		// Your own constructor code
	}
	public function index()
	{
		$data['products']=get_all_products();
		$this->load->view('site/head');
		$this->load->view('site/home',$data);
		$this->load->view('site/foot');
		
	}
	public function about()
	{
		//$data['packs']=get_all_packs();
		$this->load->view('site/head');
		$this->load->view('site/about');
		$this->load->view('site/foot');
		
	}

	public function leagle()
	{
		//$data['packs']=get_all_packs();
		$this->load->view('site/head');
		$this->load->view('site/leagle');
		$this->load->view('site/foot');
		
	}
	public function contact()
	{
		//$data['packs']=get_all_packs();
		$this->load->view('site/head');
		$this->load->view('site/contact');
		$this->load->view('site/foot');
		
	}
	public function product($id)
	{
	
		$data['data']=get_all_packs_by_id_full_data($this->uri->segment('3'));
		if(!empty($data['data'])){
			$this->load->view('site/header',$data);
			$this->load->view('site/product');
			$this->load->view('site/footer');
		}else{
			redirect('index');
		}
		
	}
	public function error()
	{
		$data = array();
		$this->load->view('site/header');
		$this->load->view('site/error');
		$this->load->view('site/footer');
	}
	
}
