<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

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
		$this->load->library('session');
		$this->load->library('email');
        	$this->load->helper('common_helper'); 
   		$this->load->database('default'); 
		
	}
	public function index()
	{
		$data['states']=get_all_states();
		$data['banks']=get_all_banks();
		$data['packs']=get_all_packs();
		$data['sponsorid']=base64_decode($this->input->get('sponsor'));
		$this->load->view('site/head');
		$this->load->view('site/register',$data);
		
	}

	public function register()
	{
		$data['states']=get_all_states();
		$data['banks']=get_all_banks();
		$data['packs']=get_all_packs();
		
		
		$this->load->view('site/registration',$data);
		
	}

	
}

