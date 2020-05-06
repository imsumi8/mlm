<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
      
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if($this->session->userdata('userid')==''){
			if(base_url().'admin'!= $actual_link){
				redirect('admin');
			}
		}
		to_renew_perform_bonus();
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	public function registration()
	{
		$this->load->view('site/registration');
	}
	public function logout()
	{
		insert_activity($this->session->userdata('userid'),'User logged out');
		$this->session->sess_destroy();
		redirect('admin');
	}
	public function dashboard()
	{
		$data=array();
		$data['title']='Dashboard';
		$data['subpage']='';
		
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		$this->load->view('admin/header',$data);
		if($this->session->userdata('hrmtype') == 'admin') { 
		    $this->load->view('admin/dashboard');
		}else{
		     $this->load->view('admin/member_dashboard');
		}
		$this->load->view('admin/footer');
	}
	public function memdashboard()
	{
		if($this->session->userdata('hrmtype') == 'admin') { 
    		$data=array();
    		$data['title']='Member Dashboard';
    		$data['subpage']='';
    		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
    		$this->load->view('admin/header',$data);
    		$this->load->view('admin/admin_member_dashboard');
    		$this->load->view('admin/footer');
		}else{
	        redirect('admin/dashboard');
	    }
	}
	public function epin()
	{
		$data=array();
		$data['title']='Epin';
		$data['subpage']='';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		$data['epimamts']=get_all_epinamts();
		if($this->session->userdata('hrmtype') == 'admin') { 
			if($this->uri->segment(3)=="generate"){
				$data['subpage']='generate';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinadmin/generateepin');
				
			}else if($this->uri->segment(3)=="request"){
				$data['epinreq']=get_all_epireq();
				$data['subpage']='request';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinadmin/requestadmin');
				
			}else if($this->uri->segment(3)=="deletereq"){
				deleteepinreq($this->uri->segment(4));
				redirect('admin/epin/request');
			}else if($this->uri->segment(3)=="unused"){
				$data['epinunused']=get_all_epin(0);/* 0 for unused */
				$data['subpage']='unused';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinadmin/unusedadmin');
			}
			else if($this->uri->segment(3)=="requestrecord"){
				$data['epinrecord']=get_all_epireq_all();/* 0 for unused */
				$data['subpage']='requestrecord';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinadmin/requestrecord');
			}
			else if($this->uri->segment(3)=="sendrecord"){
				$data['epinrecord']=get_generated_epin();
				$data['subpage']='sendrecord';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinadmin/sendrecord');
			}
			else if($this->uri->segment(3)=="deletepinunused"){
				deleteepin($this->uri->segment(4));
				redirect('admin/epin/unused');
			}else if($this->uri->segment(3)=="used"){
				$data['epinunused']=get_all_epin(1);/* 1 for used */
				$data['subpage']='used';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinadmin/usedadmin');
			}else if($this->uri->segment(3)=="deletepinused"){
				deleteepin($this->uri->segment(4));
				redirect('admin/epin/used');
			}
		}else{
			if($this->uri->segment(3)=="usedmember"){
				$data['subpage']='usedmember';
				$data['epinunused']=get_all_epin(1);/* 1 for used */
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinuser/usedmember');
			}else if($this->uri->segment(3)=="unusedmember"){
				$data['subpage']='unusedmember';
				$data['epinunused']=get_all_epin(0);/* 1 for used */
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinuser/unusedmember');
			}else if($this->uri->segment(3)=="requestmember"){
				$data['subpage']='requestmember';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinuser/reqmemberpin');
			}else if($this->uri->segment(3)=="transferepin"){
			    $data['epinunused']=get_all_epin(0);/* 0 for unused */
				$data['subpage']='transferepin';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinuser/transferepin');
			}else if($this->uri->segment(3)=="transferhistory"){
			    $data['subpage']='transferhistory';
			    $data['transferpin']=get_transferred_epin();
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinuser/transferhistory');
			}else if($this->uri->segment(3)=="recievehistory"){
			    $data['receivepin']=get_rec_epin();
				$data['subpage']='recievehistory';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinuser/recievehistory');
			}else if($this->uri->segment(3)=="generateepinwallet"){
				$data['subpage']='generateepinwallet';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/epinuser/generateepinwallet');
			}
		}
		$this->load->view('admin/footer');
	}
	public function register()
	{
		$data=array();
		$data['title']='Registration';
		$data['subpage']='';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		$data['states']=get_all_states();
		$data['banks']=get_all_banks();
		$data['packs']=get_all_packs();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/registration');
		$this->load->view('admin/footer');
	}

	public function new_package()
	{
		$data=array();
		$data['title']='New Package';
		$data['subpage']='new_package';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
	
		$data['packs']=get_all_packs();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/package/new_package');
		$this->load->view('admin/footer');
	}
	public function view_tree(){
    	$data['title']='Tree View';
	    $data['subpage']='member_tree';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/tree/view_tree');
		$this->load->view('admin/footer');
	}
	public function autopool(){
    	$data['title']='AUTO POOL VIEW';
	    $data['subpage']='';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
	
		if($this->uri->segment('3')!=''){
		    $data['subpage']='Auto Pool '.$this->uri->segment('3');
    	    $this->load->view('admin/header',$data);
    		$this->load->view('admin/tree/autopooltree');
    		$this->load->view('admin/footer');
		}else{
		    redirect('admin/view_tree');
		}
	}
	public function single_tree(){
    	$data['title']='Single View';
	    $data['subpage']='';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/tree/single_tree');
		$this->load->view('admin/footer');
	}
	public function free_single_tree(){
    	$data['title']='Free Single Geneology';
	    $data['subpage']='';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/tree/free_single_tree');
		$this->load->view('admin/footer');
	}
	public function myplan(){
    	$data['title']='My Plan';
	    $data['subpage']='';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/myplan');
		$this->load->view('admin/footer');
	}
	public function myachievelevel(){
    	$data['title']='My Achieve Level';
	    $data['subpage']='';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/myachievelevel');
		$this->load->view('admin/footer');
	}
	public function downlist_member(){
    	$data['title']='Total Member List';
	    $data['subpage']='';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/totaldownlinelist');
		$this->load->view('admin/footer');
	}
	public function downlist_member_matrix(){
    	$data['title']='Total Matrix Member List';
	    $data['subpage']='';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/totaldownlinematrix');
		$this->load->view('admin/footer');
	}
	public function directmemberlist(){
    	$data['title']='Direct Member List';
	    $data['subpage']='';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		$data['result']=direct_member_list($this->session->userdata('userid'),3);
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/direct_downline_list');
		$this->load->view('admin/footer');
	}

	public function star(){
    	$data['title']='STAR VIEW';
	    $data['subpage']='star';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		$data['result']=star_member_list($this->session->userdata('userid'),3);
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/star_member_list');
		$this->load->view('admin/footer');
	}

	public function double_star(){
    	$data['title']='STAR VIEW';
	    $data['subpage']='double_star';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		$data['result']=double_member_list($this->session->userdata('userid'),3);
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/double_member_list');
		$this->load->view('admin/footer');
	}
	public function members(){
    	$data['title']='Profile Management';
	    $data['subpage']='member_view';
	    $data['states']=get_all_states();
		$data['banks']=get_all_banks();
		$data['packs']=get_all_packs();
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		if($this->session->userdata('hrmtype') == 'admin') { 
		    if($this->uri->segment(3)=="member_view"){
				$data['subpage']='member_view';
				$this->load->view('admin/header',$data);
		        $this->load->view('admin/members/member_view');
				
			}else if($this->uri->segment(3)=="search_member"){
				$data['subpage']='search_member';
				$this->load->view('admin/header',$data);
		        $this->load->view('admin/members/search_member');
				
			}else if($this->uri->segment(3)=="member_registered"){
				$data['subpage']='member_registered';
				$this->load->view('admin/header',$data);
		        $this->load->view('admin/members/registered_member');
				
			}else if($this->uri->segment(3)=="change_cred"){
			    $data['subpage']='change_cred';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/members/change_cred');
				
			}else if($this->uri->segment(3)=="act_deact"){
			    $data['subpage']='act_deact';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/members/act_deact');
			}
		    else if($this->uri->segment(3)=="kyc_dt"){
			    $data['subpage']='kyc_dt';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/members/kyc_dt');
			}
		}else{
		     if($this->uri->segment(3)=="member_view"){
				$data['subpage']='member_view';
				$this->load->view('admin/header',$data);
		        $this->load->view('admin/members/member_view');
			}else if($this->uri->segment(3)=="member_registered"){
				$data['subpage']='member_registered';
				$this->load->view('admin/header',$data);
		        $this->load->view('admin/members/registered_member');
				
			}
			else if($this->uri->segment(3)=="change_cred"){
			    $data['subpage']='change_cred';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/members/change_cred');
			}
			else if($this->uri->segment(3)=="kyc_update"){
			    $data['kyc_type']=get_kyc_type();
			    $data['document']=get_kyc_doc($this->session->userdata('userid'));
			    $data['subpage']='kyc_update';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/members/kyc_update');
			}
			else if($this->uri->segment(3)=="delete_kyc"){
			    update_status_kyc_delete($this->uri->segment(4));
			    redirect('admin/members/kyc_update');
			}
		}
	   
		$this->load->view('admin/footer');
	}
	public function teambusiness()
	{
	    if($this->session->userdata('hrmtype') == 'admin') { 
    		$data=array();
    		$data['title']='All Team Business | RMGM';
    		$data['subpage']='';
    		$this->load->view('admin/header',$data);
    		$this->load->view('admin/business/allteambusiness');
    		$this->load->view('admin/footer');
		}else{
	        redirect('admin/dashboard');
	    }
	}
	public function bankdetail(){
	    if($this->session->userdata('hrmtype') == 'admin') { 
        	$data['title']='Member Bank Detail | RMGM';
    	    $data['subpage']='';
    		$this->load->view('admin/header',$data);
    		$this->load->view('admin/business/bankdetail');
    		$this->load->view('admin/footer');
	    }else{
	        redirect('admin/dashboard');
	    }
	}
	public function manualpayout(){
	    if($this->session->userdata('hrmtype') == 'admin') { 
        	$data['title']='Manual Payout | RMGM';
    	    $data['subpage']='';
    		
    	    $this->load->view('admin/header',$data);
    		$this->load->view('admin/payout/manualpayout');
    		$this->load->view('admin/footer');
	    }else{
	        redirect('admin/dashboard');
	    }
	}
	public function package(){
	    if($this->session->userdata('hrmtype') == 'admin') { 
        	$data['title']='Package | RMGM';
    	    $data['subpage']='';
    		
    	    $this->load->view('admin/header',$data);
    		$this->load->view('admin/package');
    		$this->load->view('admin/footer');
	    }else{
	        redirect('admin/dashboard');
	    }
	}


	public function add_category(){
	    if($this->session->userdata('hrmtype') == 'admin') { 
        	$data['title']='Category | RMGM';
    	    $data['subpage']='add_category';
    		
    	    $this->load->view('admin/header',$data);
    		$this->load->view('admin/product/category');
    		$this->load->view('admin/footer');
	    }else{
	        redirect('admin/dashboard');
	    }
	}

	public function add_subcategory(){
	    if($this->session->userdata('hrmtype') == 'admin') { 
        	$data['title']='Sub-Category | RMGM';
    	    $data['subpage']='add_subcategory';
    		
    	    $this->load->view('admin/header',$data);
    		$this->load->view('admin/product/subcategory');
    		$this->load->view('admin/footer');
	    }else{
	        redirect('admin/dashboard');
	    }
	}


	public function add_product(){
	    if($this->session->userdata('hrmtype') == 'admin') { 
        	$data['title']='Product | RMGM';
    	    $data['subpage']='add_product';
    		
    	    $this->load->view('admin/header',$data);
    		$this->load->view('admin/product/product');
    		$this->load->view('admin/footer');
	    }else{
	        redirect('admin/dashboard');
	    }
	}

	public function settings(){
	   
    	$data['title']='Settings';
    	$data['subpage']='';
	    $data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
	    if($this->uri->segment(3)=="content_management"){ 
	        $data['subpage']='Content Management';
	        $this->load->view('admin/header',$data);
		    $this->load->view('admin/settings/content_mngmt');
	    } 
	    else if($this->uri->segment(3)=="comp_profile"){
	        $data['subpage']='Company Profile';
	        $this->load->view('admin/header',$data);
	        $this->load->view('admin/settings/comp_profile');
	    }
		$this->load->view('admin/footer');
	}
	public function activity_history(){
	   
    	$data['title']='Activity History';
	    $data['subpage']='';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/activity_history');
		$this->load->view('admin/footer');
	}
	public function topup(){
	   
    	$data['title']='Topup';
	    $data['subpage']='';
	    $data['packs']=get_all_packs();
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/topup');
		$this->load->view('admin/footer');
	}

	public function tripleStar_list(){
	   
		$data['title']='STAR VIEW';
	    $data['subpage']='triple_star';
		
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		$data['result']=direct_member_list($this->session->userdata('userid'),3);
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/tree/autopooltree');
		$this->load->view('admin/footer');
	   
	
	}

	public function autopool_list(){
	   
		$data['title']='STAR VIEW';
	    $data['subpage']='autopool';
		
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		$data['result']=direct_member_list($this->session->userdata('userid'),3);
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/tree/autopool');
		$this->load->view('admin/footer');
	   
	
	}

	public function withdrawlreq(){
	   
    	$data['title']='Withdrawl Request';
	    $data['subpage']='';
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		 $data['activereq']=admin_get_withdrawreq_by_stat(0);
	    $data['apppendreq']=admin_get_withdrawreq_by_stat(1);
	    $data['apppaidreq']=admin_get_withdrawreq_by_stat(2);
	    $data['cancelreq']=admin_get_withdrawreq_by_stat(3);
	    $this->load->view('admin/header',$data);
		$this->load->view('admin/adminwithdrawlreq');
		$this->load->view('admin/footer');
	}
	public function report(){
	   
        $data=array();
		$data['title']='Reports';
		$data['subpage']='';
		$data['result']=get_hrms_all();
		$data['sales']=get_sales_all();
		$data['income_type']=get_all_income_type();
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		$data['packs']=get_all_packs();
		if($this->session->userdata('hrmtype') == 'admin') { 
		    if(isset($_POST['searchjoining'])){
		        $from=$_POST['from'];
		        $to=$_POST['to'];
		        $data['result']=get_hrm_by_date($from,$to);
		    }
		    if(isset($_POST['searchsales'])){
		        $from=$_POST['from'];
		        $to=$_POST['to'];
		        $pack=$_POST['pack'];
		        $data['sales']=get_sales_by_date($from,$to,$pack);
		    }
		    if(isset($_POST['searchcomission'])){
		        $from=$_POST['from'];
		        $to=$_POST['to'];
		        $income=$_POST['income'];
		        $userid=$_POST['userid'];
		        $data['commission']=get_comission_by_date($from,$to,$income,$userid);
		    }
		    if(isset($_POST['searchcommisionrelease_month'])){
		        $from=$_POST['from1'];
		        $to=$_POST['to1'];
		        $income=$_POST['income'];
		        $data['commission']=get_comission_by_date_all($from,$to,$income);
		    }
		    if(isset($_POST['searchpayoutrelease_user'])){
		        $from=$_POST['from'];
		        $to=$_POST['to'];
		        $userid=$_POST['userid'];
		        $data['payout']=get_withdrawl_amt_list('2018-01-01',date('Y-m-d'),$userid);
		    }
		    if(isset($_POST['searchpayoutrelease_month'])){
		        $from=$_POST['from1'];
		        $to=$_POST['to1'];
		        $data['payout']=get_withdrawl_amt_list_by_date($from,$to);
		    }
		    if(isset($_POST['searchdownline_user'])){
		        $from=$_POST['from'];
		        $to=$_POST['to'];
		        $users=$_POST['userid'];
		        $data['downlinelist']=allposts_by_user_report(3,$users,$from,$to);
		    }
		    if(isset($_POST['searchdownline_month'])){
		        $from=$_POST['from1'];
		        $to=$_POST['to1'];
		        $data['downlinelist']=allposts_by_user_report(3,'5000',$from,$to);
		    }
		    if($this->uri->segment(3)=="commission"){
				$data['subpage']='commission';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/report/commissionreport');
				
			}else if($this->uri->segment(3)=="joining"){
			    $data['subpage']='joining';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/report/joiningreport');
				
			}else if($this->uri->segment(3)=="payout_release"){
			    $data['subpage']='payout_release';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/report/payout_release');
				
			}else if($this->uri->segment(3)=="sales_report"){
			    $data['subpage']='sales';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/report/salesreport');
			}
		    else if($this->uri->segment(3)=="profile"){
			    $data['subpage']='profile';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/report/profilereports');
			}
			else if($this->uri->segment(3)=="downlinereport"){
				 $data['subpage']='downlinereport';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/report/downlinereport');
			}
		}else{
		    if($this->uri->segment(3)=="earned_income"){
				$data['subpage']='eincmome';
				$data['commission']=get_comission_by_date('2017-01-01',date('Y-m-d'),'1,2,3,4,5,6',$this->session->userdata('userid'));
				$this->load->view('admin/header',$data);
				$this->load->view('admin/income/earned_income');
			}elseif($this->uri->segment(3)=="released_income"){
			    $data['apppaidreq']=get_withdrawl_amt_list('2017-01-01',date('Y-m-d'),$this->session->userdata('userid'));
			    $data['subpage']='rincome';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/income/released_income');
			}
		}
		$this->load->view('admin/footer');
	}
	public function memberwallet(){
	   
        $data=array();
		$data['title']='E-Wallet';
		$data['subpage']='';
	    $data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
	   
		if($this->uri->segment(3)=="ewalletsummary"){
			$data['subpage']='ewalletsummary';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/memberwallet/ewalletsummary');
		}else if($this->uri->segment(3)=="transaction"){
		    $data['subpage']='transaction';
		    $data['result']=get_transactions($this->session->userdata('userid'));
		    $data['ledgerid']=get_ledger_id($this->session->userdata('userid'));
			$this->load->view('admin/header',$data);
			$this->load->view('admin/memberwallet/transaction');
			
		}else if($this->uri->segment(3)=="ewalletcredit"){
		    $data['subpage']='ewalletcredit';
		    $data['result']=get_transactions($this->session->userdata('userid'));
		    $data['ledgerid']=get_ledger_id($this->session->userdata('userid'));
			$this->load->view('admin/header',$data);
			$this->load->view('admin/memberwallet/ewalletcredit');
			
		}else if($this->uri->segment(3)=="ewalletdebit"){
		    $data['subpage']='ewalletdebit';
		    $data['result']=get_transactions($this->session->userdata('userid'));
		    $data['ledgerid']=get_ledger_id($this->session->userdata('userid'));
			$this->load->view('admin/header',$data);
			$this->load->view('admin/memberwallet/ewalletdebit');
		}
	    else if($this->uri->segment(3)=="withdrawfund"){
		    $data['subpage']='withdrawfund';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/memberwallet/withdrawfund');
		}
		else if($this->uri->segment(3)=="depositfund"){
		    $data['subpage']='depositfund';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/memberwallet/depositfund');
		}
		else if($this->uri->segment(3)=="withdrawlreq"){
		    $data['activereq']=get_withdrawreq_by_stat($this->session->userdata('userid'),0);
		    $data['apppendreq']=get_withdrawreq_by_stat($this->session->userdata('userid'),1);
		    $data['apppaidreq']=get_withdrawreq_by_stat($this->session->userdata('userid'),2);
		    $data['cancelreq']=get_withdrawreq_by_stat($this->session->userdata('userid'),3);
		    $data['subpage']='withdrawlreq';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/memberwallet/withdrawlreq');
		}
		$this->load->view('admin/footer');
	}
	public function payout(){
	   
        $data=array();
		$data['title']='Payout';
		$data['subpage']='';
		$data['result']=get_hrms_all();
		$data['sales']=get_sales_all();
		$data['pend_pay']=get_all_pending_payments();
		$data['income_type']=get_all_income_type();
		$data['hrm_data']=get_hrm_post($this->session->userdata('userid'));
		$data['packs']=get_all_packs();
		if($this->session->userdata('hrmtype') == 'admin') { 
		    if(isset($_POST['searchconfirm'])){
		        $from=$_POST['from'];
		        $to=$_POST['to'];
		        $data['pend_pay']=get_pend_pay_by_date($from,$to);
		    }
		    if($this->uri->segment(3)=="release"){
				$data['subpage']='release';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/payout/release');
				
			}else if($this->uri->segment(3)=="cnfrm_transfer"){
			    $data['subpage']='cnfrm_transfer';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/payout/cnfrm_transfer');
				
			}
		}
		$this->load->view('admin/footer');
	}
	public function posts()
    {
    
    		$columns = array( 
                                0 =>'HRM_ID', 
                                1=> 'HRM_NAME',
                                2=> 'HRM_DATE',
                                3=> 'HRM_DATE',
                                4=> 'HRM_DATE',
                                5=> 'HRM_DATE',
                                6=> 'HRM_STATUS',
                                7=> 'HRM_ADDED_TIME',
                            );
    
    		$limit = $this->input->post('length');
            $start = $this->input->post('start');
            $order = $columns[$this->input->post('order')[0]['column']];
            $dir = $this->input->post('order')[0]['dir'];
            $user=$this->input->post('userid');
            $totalData =allposts_count_user(3,$user);
                
            $totalFiltered = $totalData; 
                
            if(empty($this->input->post('search')['value']))
            {            
                $posts = allposts_user($limit,$start,$order,$dir,3,$user);
            }
            else {
                $search = $this->input->post('search')['value']; 
    
                $posts =  posts_search_user($limit,$start,$search,$order,$dir,3,$user);
    
                $totalFiltered = posts_search_count_user($search,3,$user);
            }
    
            $data = array();
            if(!empty($posts))
            {
                $i=1;
                foreach ($posts as $post)
                {
    
                   
                    $nestedData['HRM_ID'] = $post->HRM_ID;
                    $nestedData['HRM_NAME'] = $post->HRM_NAME;
                    $nestedData['HRM_DATE'] =  date('j M Y',strtotime($post->HRM_DATE));
                    $nestedData['PACKAGE'] = get_all_packs_by_id_full(get_hrm_postmeta($post->HRM_ID,'package'));
                    $postionid=get_reverse_parent_hrms_lev_0($post->HRM_ID,3);
                    $nestedData['INTRODUCER']=$postionid." [".get_hrm_postmeta($postionid,'first_name')." ".get_hrm_postmeta($postionid,'last_name')."]";
                    $nestedData['CONTACT'] = get_hrm_postmeta($post->HRM_ID,'contact');
                    
                    if($this->session->userdata('hrmtype') == 'admin') { 
                       if($post->HRM_STATUS==1){
    						$dt= "<button class='btn btn-danger actdeactuser btn-block' attr-stat='0' attr-userid='".$post->HRM_ID."'><span class='btn-text'>DEACTIVATE USER</span></button>";
    					 } else if($post->HRM_STATUS==0){ 
    					    $dt= "<button class='btn btn-success actdeactuser btn-block' attr-stat='1' attr-userid='".$post->HRM_ID."'><span class='btn-text'>ACTIVATE USER</span></button>";
    					}
                    }
                    $nestedData['HRM_STATUS'] = $dt;
                    $nestedData['HRM_ADDED_TIME'] = "<i class='fa fa-eye view_dt' attr-name='".$post->HRM_NAME."' attr-id='".$post->HRM_ID."' attr-dob='".get_hrm_postmeta($post->HRM_ID,'dob')."' attr-address='".get_hrm_postmeta($post->HRM_ID,'address')."' attr-pincode='".get_hrm_postmeta($post->HRM_ID,'pin_code')."' attr-pan='".get_hrm_postmeta($post->HRM_ID,'pancard')."' attr-email='".get_hrm_postmeta($post->HRM_ID,'email')."' attr-mob='".get_hrm_postmeta($post->HRM_ID,'contact')."' attr-bank='".get_hrm_postmeta($post->HRM_ID,'ac_no')."' attr-bnk_nm='".get_banks_by_id(get_hrm_postmeta($post->HRM_ID,'bank_id'))."' attr-branchname='".get_hrm_postmeta($post->HRM_ID,'branch_name')."'></i>&nbsp;&nbsp;<i class='fa fa-edit edit_dt' attr-id='".$post->HRM_ID."' attr-contact='".get_hrm_postmeta($post->HRM_ID,'contact')."'></i>";
                    $i++;
                    $data[] = $nestedData;
    
                }
            }
              
            $json_data = array(
                        "draw"            => intval($this->input->post('draw')),  
                        "recordsTotal"    => intval($totalData),  
                        "recordsFiltered" => intval($totalFiltered), 
                        "data"            => $data   
                        );
                
            echo json_encode($json_data); 
    }
    public function memberposts()
    {
    
    		$columns = array( 
                                0 =>'HRM_ID', 
                                1=> 'HRM_NAME',
                                2=> 'HRM_DATE',
                                3=> 'HRM_DATE',
                                4=> 'HRM_DATE',
                                5=> 'HRM_DATE',
                               6=> 'HRM_ADDED_TIME',
                            );
    
    		$limit = $this->input->post('length');
            $start = $this->input->post('start');
            $order = $columns[$this->input->post('order')[0]['column']];
            $dir = $this->input->post('order')[0]['dir'];
      
            $totalData =allposts_count(3);
                
            $totalFiltered = $totalData; 
                
            if(empty($this->input->post('search')['value']))
            {            
                $posts = allposts($limit,$start,$order,$dir,3);
            }
            else {
                $search = $this->input->post('search')['value']; 
    
                $posts =  posts_search($limit,$start,$search,$order,$dir,3);
    
                $totalFiltered = posts_search_count($search,3);
            }
    
            $data = array();
            if(!empty($posts))
            {
                $i=1;
                foreach ($posts as $post)
                {
    
                   
                    $nestedData['HRM_ID'] = $post->HRM_ID;
                    $nestedData['HRM_NAME'] = $post->HRM_NAME;
                    $nestedData['HRM_DATE'] =  date('j M Y',strtotime($post->HRM_DATE));
                    $nestedData['PACKAGE'] = get_all_packs_by_id_full(get_hrm_postmeta($post->HRM_ID,'package'));
                    $postionid=get_reverse_parent_hrms_lev_0($post->HRM_ID,3);
                    $nestedData['INTRODUCER']=$postionid." [".get_hrm_postmeta($postionid,'first_name')." ".get_hrm_postmeta($postionid,'last_name')."]";
                    $nestedData['CONTACT'] = get_hrm_postmeta($post->HRM_ID,'contact');
                   $nestedData['HRM_ADDED_TIME'] = "<i class='fa fa-eye view_dt' attr-name='".$post->HRM_NAME."' attr-id='".$post->HRM_ID."' attr-dob='".get_hrm_postmeta($post->HRM_ID,'dob')."' attr-address='".get_hrm_postmeta($post->HRM_ID,'address')."' attr-pincode='".get_hrm_postmeta($post->HRM_ID,'pin_code')."' attr-pan='".get_hrm_postmeta($post->HRM_ID,'pancard')."' attr-email='".get_hrm_postmeta($post->HRM_ID,'email')."' attr-mob='".get_hrm_postmeta($post->HRM_ID,'contact')."' attr-bank='".get_hrm_postmeta($post->HRM_ID,'ac_no')."' attr-bnk_nm='".get_banks_by_id(get_hrm_postmeta($post->HRM_ID,'bank_id'))."' attr-branchname='".get_hrm_postmeta($post->HRM_ID,'branch_name')."'></i>";
                    $i++;
                    $data[] = $nestedData;
    
                }
            }
              
            $json_data = array(
                        "draw"            => intval($this->input->post('draw')),  
                        "recordsTotal"    => intval($totalData),  
                        "recordsFiltered" => intval($totalFiltered), 
                        "data"            => $data   
                        );
                
            echo json_encode($json_data); 
    }
    public function teambusinessposts()
    {
    
    		$columns = array( 
                                0 =>'HRM_ID', 
                                1=> 'HRM_NAME',
                                2=> 'HRM_DATE',
                                3=> 'HRM_DATE',
                                4=> 'HRM_STATUS',
                                5=> 'HRM_ADDED_TIME',
                                6 =>'HRM_ID', 
                                7=> 'HRM_NAME',
                                8=> 'HRM_DATE',
                                9=> 'HRM_DATE',
                                10=> 'HRM_STATUS',
                                11=> 'HRM_ADDED_TIME',
                                12 =>'HRM_ID', 
                                13 => 'HRM_NAME',
                                14 => 'HRM_DATE',
                                15 => 'HRM_DATE',
                                16 => 'HRM_STATUS',
                                17 => 'HRM_ADDED_TIME',
                            );
    
    		$limit = $this->input->post('length');
            $start = $this->input->post('start');
            $order = $columns[$this->input->post('order')[0]['column']];
            $dir = $this->input->post('order')[0]['dir'];
      
            $totalData =allposts_count(3);
                
            $totalFiltered = $totalData; 
                
            if(empty($this->input->post('search')['value']))
            {            
                $posts = allposts($limit,$start,$order,$dir,3);
            }
            else {
                $search = $this->input->post('search')['value']; 
    
                $posts =  posts_search($limit,$start,$search,$order,$dir,3);
    
                $totalFiltered = posts_search_count($search,3);
            }
    
            $data = array();
            if(!empty($posts))
            {
                $i=$start+1;
                foreach ($posts as $post)
                {
    
                    $nestedData['SR_NO'] = $i;
                    $nestedData['HRM_ID'] = "<a target='_blank' href='".base_url()."admin/view_tree/".$post->HRM_ID."'>".$post->HRM_ID."</a>";
                    $nestedData['HRM_PASS'] = get_hrm_postmeta($post->HRM_ID,'password');
                    $nestedData['HRM_DATE'] =  date('j M Y',strtotime($post->HRM_DATE));
                    if($post->HRM_PAID_DATE=="0000-00-00 00:00:00") {  
                        $nestedData['HRM_TP_DATE'] =  date('j M Y',strtotime($post->HRM_DATE));
                    } else { 
                        $nestedData['HRM_TP_DATE'] =  date('j M Y',strtotime($post->HRM_PAID_DATE));
                    }
                    $nestedData['HRM_TP_DATE'] =  date('j M Y',strtotime($post->HRM_DATE));
                    $nestedData['HRM_NAME'] = "<a target='_blank' href='".base_url()."admin/view_tree/".$post->HRM_ID."'>".$post->HRM_NAME."</a>";
                    $nestedData['FATHER'] = get_hrm_postmeta($post->HRM_ID,'father_name');
                    $nestedData['DOB'] = get_hrm_postmeta($post->HRM_ID,'dob');
                    $nestedData['PAN'] =get_hrm_postmeta($post->HRM_ID,'pancard');
                    $nestedData['AADHAR'] = get_hrm_postmeta($post->HRM_ID,'aadhar');
                    $nestedData['ADDRESS'] = get_hrm_postmeta($post->HRM_ID,'address').",".get_hrm_postmeta($post->HRM_ID,'city').",".get_state_by_id(get_hrm_postmeta($post->HRM_ID,'state'));
                    $nestedData['CONTACT'] = get_hrm_postmeta($post->HRM_ID,'contact');
                    $nestedData['WALLET'] = get_wallet_balance($post->HRM_ID);
                    $nestedData['WITHDRAWL'] = get_sum_withdrawl_amt('2018-01-01',date('Y-m-d'),$post->HRM_ID);
                    $i++;
                    $data[] = $nestedData;
            
                }
            }
              
            $json_data = array(
                        "draw"            => intval($this->input->post('draw')),  
                        "recordsTotal"    => intval($totalData),  
                        "recordsFiltered" => intval($totalFiltered), 
                        "data"            => $data   
                        );
                
            echo json_encode($json_data); 
    }
    public function bankposts()
    {
    
    		$columns = array( 
                                0 =>'HRM_ID', 
                                1=> 'HRM_NAME',
                                2=> 'HRM_DATE',
                                3=> 'HRM_DATE',
                                4=> 'HRM_STATUS',
                                5=> 'HRM_ADDED_TIME',
                                6 =>'HRM_ID', 
                                7=> 'HRM_NAME',
                                8=> 'HRM_DATE',
                                9=> 'HRM_DATE',
                            );
    
    		$limit = $this->input->post('length');
            $start = $this->input->post('start');
            $order = $columns[$this->input->post('order')[0]['column']];
            $dir = $this->input->post('order')[0]['dir'];
      
            $totalData =allposts_count(3);
                
            $totalFiltered = $totalData; 
                
            if(empty($this->input->post('search')['value']))
            {            
                $posts = allposts($limit,$start,$order,$dir,3);
            }
            else {
                $search = $this->input->post('search')['value']; 
    
                $posts =  posts_search($limit,$start,$search,$order,$dir,3);
    
                $totalFiltered = posts_search_count($search,3);
            }
    
            $data = array();
            if(!empty($posts))
            {
                $i=$start+1;
                foreach ($posts as $post)
                {
    
                    $nestedData['SR_NO'] = $i;
                    $nestedData['HRM_ID'] = $post->HRM_ID;
                    $nestedData['HRM_NAME'] = $post->HRM_NAME;
                    $nestedData['FATHER'] = get_hrm_postmeta($post->HRM_ID,'father_name');
                    $nestedData['BANK'] =  get_hrm_postmeta($post->HRM_ID,'ac_no');
                    $nestedData['HOLDER'] = get_hrm_postmeta($post->HRM_ID,'ac_holder_name');
                    $nestedData['BANK_NAME'] = get_banks_by_id(get_hrm_postmeta($post->HRM_ID,'bank_id'));
                    $nestedData['BRANCH'] = get_hrm_postmeta($post->HRM_ID,'branch_name');
                    $nestedData['IFSC_CODE'] = get_hrm_postmeta($post->HRM_ID,'ifsc');
                    $nestedData['BRANCH_ADDRESS'] = get_hrm_postmeta($post->HRM_ID,'brnch_address');
                    
                    $i++;
                    $data[] = $nestedData;
            
                }
            }
              
            $json_data = array(
                        "draw"            => intval($this->input->post('draw')),  
                        "recordsTotal"    => intval($totalData),  
                        "recordsFiltered" => intval($totalFiltered), 
                        "data"            => $data   
                        );
                
            echo json_encode($json_data); 
    }
}

