<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ajax extends CI_Controller {

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
		header("Access-Control-Allow-Origin: *");
		$this->load->helper('url');
		$this->load->helper('common_helper');
		$this->load->library('session');
		$this->load->database();
		date_default_timezone_set('Asia/Calcutta'); 
		// Your own constructor code
	}
	public function approve_kyc(){
	      $id=$_POST['id'];
	      update_kyc_details($id,2,'APPROVED_DATE');
	      echo 'ok';
	      die();
	}
	public function reject_kyc(){
	      $id=$_POST['kyc_id'];
	      $reason=$_POST['reason'];
	      update_kyc_details($id,3,'REJECTED_DATE');
	      update_cancel_reason_kyc($id,$reason);
	      echo 'ok';
	      die();
	}
	public function check_downs()
	{
		$userid=$_POST['user'];
		echo get_member_three($userid);
		die();
	}
	public function kycupdate(){
	     if(check_already_approve($_POST['kyc_category'])!=1){
    	     $msg='';
    	     if(isset($_FILES['fileToUpload'])){
            	
            	$banner=$_FILES['fileToUpload']['name']; 
            	if($banner!=''){
                	$file_size = $_FILES['fileToUpload']['size'];
                	
                	$expbanner=explode('.',$banner);
            		$allowed_format = array('jpg','jpeg','png');	
            		if(in_array(strtolower(end($expbanner)),$allowed_format)){	
            			$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/mlm/assets/uploads_assets/';	
            			$full_file_name = uniqid().".".end($expbanner);		
            			$uploadfile = $uploaddir.$full_file_name;
            		
            			$upload_nm=$full_file_name;
        				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"] , $uploadfile);	//for moving image 		
        				$kyc_type_id=$_POST['kyc_category'];
        			    insert_kyc($kyc_type_id,$full_file_name);
        			    $msg ='ok'; 
        			}else{		
            			$msg= "Unsupported file type";
            		}
            	}
           }
    	   if($msg=="Unsupported file type"){
    	       echo $msg;
    	   }else{
    	       echo 'ok';
    	   }
	    }else{
	        echo 'Already Approved';
	    }
	   die();
	}
	public function addpackform(){
	    
    	     $msg='';
    	     if(isset($_FILES['fileToUpload'])){
            	
            	$banner=$_FILES['fileToUpload']['name']; 
            	if($banner!=''){
                	$file_size = $_FILES['fileToUpload']['size'];
                	
                	$expbanner=explode('.',$banner);
            		$allowed_format = array('jpg','jpeg','png');	
            		if(in_array(strtolower(end($expbanner)),$allowed_format)){	
            			$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/mlm/assets/uploads_assets/';	
            			$full_file_name = uniqid().".".end($expbanner);		
            			$uploadfile = $uploaddir.$full_file_name;
            		
            			$upload_nm=$full_file_name;
        				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"] , $uploadfile);	//for moving image 		
        				$packname=$_POST['pack_name'];
        				$amts=get_epin_amt_by_id($_POST['amtid']);
        			     $data = array(
                            'PACKAGE_NAME'=>$packname,
                            'PACKAGE_PRICE'=>$amts,
                            'PACKAGE_INCOME'=>1,
                            'CAPPING_LIMIT'=>'999999999999999999999',
                            'PACKAGE_DESC'=>$_POST['pack_desc'],
                            'PACKAGE_PV'=>'',
                            'PACKAGE_IMG'=>$upload_nm,
                        );
                        $this->db->insert('matc_packages',$data);
                        $packid=$this->db->insert_id();
                        if($_POST['totalrow']>0){
                            for($i=1;$i<=$_POST['totalrow'];$i++){
                                update_pack_meta($packid,$_POST['categ_'.$i],$_POST['attr_name_'.$i],$_POST['attr_value_'.$i]);
                            }
                        }
                        $data = array(
                            'EPIN_AMT_ID'=>$packid,
                            'EPIN_AMT'=>$amts,
                        );
                        $this->db->insert('epinamount',$data);
                        $msg ='ok'; 
        			}else{		
            			$msg= "Unsupported file type";
            		}
            	}else{
            	    $packname=$_POST['pack_name'];
					// $amts=get_epin_amt_by_id($_POST['amtid']);
					$amts=$_POST['amtid'];
    			     $data = array(
                        'PACKAGE_NAME'=>$packname,
                        'PACKAGE_PRICE'=>$amts,
                        'PACKAGE_INCOME'=>1,
                        'CAPPING_LIMIT'=>'999999999999999999999',
                        'PACKAGE_DESC'=>$_POST['pack_desc'],
                        'PACKAGE_PV'=>'',
                        'PACKAGE_IMG'=>'default.jpg',
					);
				
                
                    $this->db->insert('matc_packages',$data);
					$packid=$this->db->insert_id();
					
                    if($_POST['totalrow']>0){
                        for($i=1;$i<=$_POST['totalrow'];$i++){
                            update_pack_meta($packid,$_POST['categ_'.$i],$_POST['attr_name_'.$i],$_POST['attr_value_'.$i]);
                        }
                    }
                    $data = array(
                        'EPIN_AMT_ID'=>$packid,
                        'EPIN_AMT'=>$amts,
                        
                    );
                    $this->db->insert('epinamount',$data);
            	}
           }
    	   if($msg=="Unsupported file type"){
    	       echo $msg;
    	   }else{
    	       echo 'ok';
    	   }
	    
	   die();
	}
	public function editpackform(){
	    
    	     $msg='';
    	     if(isset($_FILES['fileToUpload'])){
            	
            	$banner=$_FILES['fileToUpload']['name']; 
            	if($banner!=''){
                	$file_size = $_FILES['fileToUpload']['size'];
                	
                	$expbanner=explode('.',$banner);
            		$allowed_format = array('jpg','jpeg','png');	
            		if(in_array(strtolower(end($expbanner)),$allowed_format)){	
            			$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/mlm/assets/uploads_assets/';	
            			$full_file_name = uniqid().".".end($expbanner);		
            			$uploadfile = $uploaddir.$full_file_name;
            		
            			$upload_nm=$full_file_name;
        				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"] , $uploadfile);	//for moving image 		
        				$packname=$_POST['pack_name'];
        			     $data = array(
                            'PACKAGE_NAME'=>$packname,
                            'PACKAGE_INCOME'=>1,
                            'CAPPING_LIMIT'=>'999999999999999999999',
                            'PACKAGE_DESC'=>$_POST['pack_desc'],
                            'PACKAGE_PV'=>'',
                            'PACKAGE_IMG'=>$upload_nm,
                        );
                        $this->db->where('PACKAGE_ID',$_POST['pack_id']);
                        $this->db->update('matc_packages',$data);
                        $this->db->where('PACKAGE_ID',$_POST['pack_id']);
                        $this->db->delete('package_meta');
                        if($_POST['totalrow']>0){
                            for($i=1;$i<=$_POST['totalrow'];$i++){
                                update_pack_meta($_POST['pack_id'],$_POST['categ_'.$i],$_POST['attr_name_'.$i],$_POST['attr_value_'.$i]);
                            }
                        }
        			    $msg ='ok'; 
        			}else{		
            			$msg= "Unsupported file type";
            		}
            	}else{
            	    $packname=$_POST['pack_name'];
    			     $data = array(
                        'PACKAGE_NAME'=>$packname,
                        'PACKAGE_INCOME'=>1,
                        'CAPPING_LIMIT'=>'999999999999999999999',
                        'PACKAGE_DESC'=>$_POST['pack_desc'],
                        'PACKAGE_PV'=>'',
                        'PACKAGE_IMG'=>$_POST['filename'],
                    );
                    $this->db->where('PACKAGE_ID',$_POST['pack_id']);
                    $this->db->update('matc_packages',$data);
                    $this->db->where('PACKAGE_ID',$_POST['pack_id']);
                    $this->db->delete('package_meta');
                    if($_POST['totalrow']>0){
                        
                        for($i=1;$i<=$_POST['totalrow'];$i++){
                            update_pack_meta($_POST['pack_id'],$_POST['categ_'.$i],$_POST['attr_name_'.$i],$_POST['attr_value_'.$i]);
                        }
                    }
            	}
           }
    	   if($msg=="Unsupported file type"){
    	       echo $msg;
    	   }else{
    	       echo 'ok';
    	   }
	    
	   die();
	}
	public function get_pack_meta(){
	    
        $arr=get_packmeta($_POST['id']);	    
	    echo json_encode($arr);
	    die();
	}
	public function login()
	{
		$userid=$_POST['username'];
		$userpass=md5($_POST['password']);
		if($userid=='' || $userpass==''){
			echo 'User id or Password should not be blank';
		}else{
		    
			$query=$this->db->query("Select * from hrm_post where HRM_ID='".$userid."' and HRM_PASSWORD='".$userpass."' and HRM_STATUS=1 OR HRM_STATUS=2");
			$result=$query->num_rows();
			if($result>0){
				echo 'ok';
				$this->session->set_userdata('hrmtype', get_hrm_type(get_hrm_postmeta($userid,'hrm_type'))); /*for to get hrmtype*/
				$this->session->set_userdata('userid',strtoupper($userid));
				insert_activity($userid,'User logged in');
			}else{
				echo 'Invalid login credentials';
			}
		}	
		die();
	}
	
	public function pay_commission()
	{
		$sponserid=$_POST['user_id'];
		$amt=$_POST['amount'];
		$name_user=$_POST['name_user'];
		if($amt<=0){
			echo 'Invalid amount entered';
		}else{
		     $dt=Date('Y-m-d');
		     $spnoser_ledger=get_ledger_name("ledger_".$sponserid);
			 $spnoser_ledgerid=$spnoser_ledger[0]->ID; /*for sponsor account */
		     $drid=$spnoser_ledgerid;
		     $sum_charge=0;
	         $drid=9; /*for comission account */
			 $crid=3;/*for cash account */
		 	 update_amount_ledger(3,(-1)*$amt);
		 	 update_amount_ledger(9,$amt);
		     $particular='Being cash paid to commision for '.get_hrm_postmeta($sponserid,'first_name'). ' '.get_hrm_postmeta($sponserid,'last_name').' of '.$amt;
			 insert_record_transaction($drid,$crid,$this->session->userdata('userid'),$particular,$amt,$dt);
			 $mlm_charges_aray=get_charges_mlm_type('1,2');
		     if(!empty($mlm_charges_aray)){
			     foreach($mlm_charges_aray as $charges){
			        $drid=$spnoser_ledgerid;
		            $ledger_id_charge=$charges->LEDGER_ID;
		            $charge_name=$charges->CHARGE_TYPE_NAME;
		            if($charges->CHARGE_MODE==1){
		                /* for percentage charges */
		                $amt_charge=($amt*$charges->CHARGES_AMOUNT)/100;
		                $amt_charge=round(number_format((float)$amt_charge, 2, '.', ''));
		            }else{
		                /* for flat charges */
		                $amt_charge=$charges->CHARGES_AMOUNT;
		            }
			        $sum_charge+=$amt_charge;
		            $cr_id=$ledger_id_charge;
	                update_amount_ledger($drid,(-1)*$amt_charge);
			 	    update_amount_ledger($cr_id,$amt_charge);
			        $particular='Being '.$charge_name.' deduct for '.get_hrm_postmeta($sponserid,'first_name'). ' '.get_hrm_postmeta($sponserid,'last_name').' of '.$amt_charge;
				    insert_record_transaction($drid,$cr_id,$this->session->userdata('userid'),$particular,$amt_charge,$dt);
	             }
		    }
		     $drid=$spnoser_ledgerid; /*for sponsor account */
			 $crid=9;/*for comission account */
		 	 update_amount_ledger($drid,$amt);
		 	 update_amount_ledger(9,(-1)*($amt));
		 	 $newamt=$amt-$sum_charge;
		     $particular='Being comssion paid to '.get_hrm_postmeta($sponserid,'first_name'). ' '.get_hrm_postmeta($sponserid,'last_name').' of '.$newamt;
		    $id=insert_record_transaction($drid,$crid,$this->session->userdata('userid'),$particular,$newamt,$dt);
		    if(get_option('autorelease')==0){
		         insert_pending_payment($id,0);
		    }else{
		         $msg='Dear '.get_hrm_postmeta($sponserid,'first_name'). ' '.get_hrm_postmeta($sponserid,'last_name').'\n Your comission has been released for rs. '.$amt;
		         $mobileno=get_hrm_postmeta($sponserid,'contact');
		         send_sms($mobileno,$msg,$sponserid);
		    }
		    
		     echo 'ok';
		}	
		die();
	}
	public function cnfrm_commission()
	{
		$sponserid=$_POST['user_id'];
		$amt=$_POST['amt'];
        $pendid=$_POST['pendid'];
        $msg='Dear '.get_hrm_postmeta($sponserid,'first_name'). ' '.get_hrm_postmeta($sponserid,'last_name').'\n Your comission has been released for rs. '.$amt;
        $mobileno=get_hrm_postmeta($sponserid,'contact');
        send_sms($mobileno,$msg,$sponserid);
        update_pend_pay_status($pendid);
        echo 'ok';
		
		die();
	}
	public function sendwithdrawreq()
	{
		$userid=$_POST['userid'];
		$amt=$_POST['amt'];
		if($amt>0){
            $noteswithdraw=$_POST['noteswithdraw'];
            if(liable_amount_to_pay($this->session->userdata('userid'))>=$amt){
                insert_withdrawreq($userid,$amt,0,$noteswithdraw);
                echo 'ok';
            }else{
                echo 'Invalid Amount Entered!';
            }
		}else{
		    echo 'Invalid Amount Entered!';
		}
        die();
	}
	public function wlcmfrm(){
	     $wlcmtext=$_POST['wlcmtext'];
	     update_hrmpost_meta(5000,'wlcm_letter',$wlcmtext);
	    echo 'ok';   
	      die();
	}
	public function submit_comp_profile(){
	     
	     $msg='';
	     if(isset($_FILES['fileToUpload'])){
        	
        	$banner=$_FILES['fileToUpload']['name']; 
        	if($banner!=''){
            	$file_size = $_FILES['fileToUpload']['size'];
            	
            	$expbanner=explode('.',$banner);
        		$allowed_format = array('jpg','jpeg','png');	
        		if(in_array(strtolower(end($expbanner)),$allowed_format)){	
        			$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/mlm/assets/uploads_assets/';	
        			$full_file_name = uniqid().".".end($expbanner);		
        			$uploadfile = $uploaddir.$full_file_name;
        		
        			$upload_nm=$full_file_name;
    				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"] , $uploadfile);	//for moving image 		
    				
    			    $comp_name=$_POST['comp_name'];
            	    update_mlm_option('comp_name',$comp_name);
            	    $comp_email=$_POST['comp_email'];
            	    update_mlm_option('comp_email',$comp_email);
            	    $comp_phone=$_POST['comp_phone'];
            	    update_mlm_option('comp_phone',$comp_phone);
            	    $comp_addr=$_POST['comp_addr'];
            	    update_mlm_option('comp_addr',$comp_addr);
            	    update_mlm_option('logo',$full_file_name);
    			    $msg ='ok'; 
    			}else{		
        			$msg= "Unsupported file type";
        		}
        	}else{
                 $comp_name=$_POST['comp_name'];
        	     update_mlm_option('comp_name',$comp_name);
        	     $comp_email=$_POST['comp_email'];
        	     update_mlm_option('comp_email',$comp_email);
        	     $comp_phone=$_POST['comp_phone'];
        	     update_mlm_option('comp_phone',$comp_phone);
        	     $comp_addr=$_POST['comp_addr'];
        	     update_mlm_option('comp_addr',$comp_addr);
        	     
        	     $msg= 'ok'; 
            }
        }
	   if($msg=="Unsupported file type"){
	       echo $msg;
	   }else{
	       echo 'ok';
	   }
	   
	     die();
	}
	public function update_profile_user(){
	     
	    $msg='';
	    $hrm_id=$_POST['userid'];
	    $firstname=ucwords($_POST['firstname']);
		$lastname=ucwords($_POST['lastname']);
		$fathername=ucwords($_POST['fathername']);
	    if(isset($_FILES['fileToUpload'])){
        	
        	$banner=$_FILES['fileToUpload']['name']; 
        	if($banner!=''){
            	$file_size = $_FILES['fileToUpload']['size'];
            	
            	$expbanner=explode('.',$banner);
        		$allowed_format = array('jpg','jpeg','png');	
        		if(in_array(strtolower(end($expbanner)),$allowed_format)){	
        			$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/mlm/assets/uploads_assets/';	
        			$full_file_name = uniqid().".".end($expbanner);		
        			$uploadfile = $uploaddir.$full_file_name;
        		
        			$upload_nm=$full_file_name;
    				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"] , $uploadfile);	//for moving image 		
    				update_hrmpost_meta($hrm_id,'img',$full_file_name);
    			   	update_hrmpost_meta($hrm_id,'first_name',$firstname);
    				update_pass_hrms($hrm_id,'HRM_NAME',$firstname);
    				update_hrmpost_meta($hrm_id,'father_name',$fathername);
    				update_hrmpost_meta($hrm_id,'mother_name',ucwords($_POST['mothername']));
    				update_hrmpost_meta($hrm_id,'email',$_POST['email']);
    				update_hrmpost_meta($hrm_id,'gender',$_POST['gender']);
    				update_hrmpost_meta($hrm_id,'contact',$_POST['phone']);
    				update_hrmpost_meta($hrm_id,'whatsap_contact',$_POST['wphone']);
    				update_hrmpost_meta($hrm_id,'state',$_POST['state']);
    				update_hrmpost_meta($hrm_id,'city',$_POST['city']);
    				update_hrmpost_meta($hrm_id,'pin_code',$_POST['pincode']);
    				update_hrmpost_meta($hrm_id,'dob',$_POST['dob']);
    				update_hrmpost_meta($hrm_id,'pancard',$_POST['pancard']);
    				update_hrmpost_meta($hrm_id,'aadhar',$_POST['aadhar']);
    				update_hrmpost_meta($hrm_id,'address',$_POST['address']);
    				
    				update_hrmpost_meta($hrm_id,'ac_no',$_POST['acno']);
    				update_hrmpost_meta($hrm_id,'ac_holder_name',$_POST['holdername']);
    				update_hrmpost_meta($hrm_id,'bank_id',$_POST['bank']);
    				update_hrmpost_meta($hrm_id,'ifsc',$_POST['ifsc']);
    				update_hrmpost_meta($hrm_id,'branch_name',$_POST['branch']);
    				update_hrmpost_meta($hrm_id,'brnch_address',$_POST['brnch_address']);
    				
    				update_hrmpost_meta($hrm_id,'nmaddress',$_POST['nmaddress']);
				    update_hrmpost_meta($hrm_id,'nmfirstname',$_POST['nmfirstname']);
					update_hrmpost_meta($hrm_id,'nmlastname',$_POST['nmlastname']);
					update_hrmpost_meta($hrm_id,'nmfathername',$_POST['nmfathername']);
					update_hrmpost_meta($hrm_id,'nmmothername',$_POST['nmmothername']);
					update_hrmpost_meta($hrm_id,'nmdob',$_POST['nmdob']);
					update_hrmpost_meta($hrm_id,'nmmob',$_POST['nmmob']);
					update_hrmpost_meta($hrm_id,'nmrelation',$_POST['nmrelation']);
    			    $msg ='ok'; 
    			}else{		
        			$msg= "Unsupported file type";
        		}
        	}else{
                    update_hrmpost_meta($hrm_id,'first_name',$firstname);
    				update_pass_hrms($hrm_id,'HRM_NAME',$firstname);
    				update_hrmpost_meta($hrm_id,'father_name',$fathername);
    				update_hrmpost_meta($hrm_id,'mother_name',ucwords($_POST['mothername']));
    				update_hrmpost_meta($hrm_id,'email',$_POST['email']);
    				update_hrmpost_meta($hrm_id,'gender',$_POST['gender']);
    				update_hrmpost_meta($hrm_id,'contact',$_POST['phone']);
    				update_hrmpost_meta($hrm_id,'whatsap_contact',$_POST['wphone']);
    				update_hrmpost_meta($hrm_id,'state',$_POST['state']);
    				update_hrmpost_meta($hrm_id,'city',$_POST['city']);
    				update_hrmpost_meta($hrm_id,'pin_code',$_POST['pincode']);
    				update_hrmpost_meta($hrm_id,'dob',$_POST['dob']);
    				update_hrmpost_meta($hrm_id,'pancard',$_POST['pancard']);
    				update_hrmpost_meta($hrm_id,'aadhar',$_POST['aadhar']);
    				update_hrmpost_meta($hrm_id,'address',$_POST['address']);
    				
    				update_hrmpost_meta($hrm_id,'ac_no',$_POST['acno']);
    				update_hrmpost_meta($hrm_id,'ac_holder_name',$_POST['holdername']);
    				update_hrmpost_meta($hrm_id,'bank_id',$_POST['bank']);
    				update_hrmpost_meta($hrm_id,'ifsc',$_POST['ifsc']);
    				update_hrmpost_meta($hrm_id,'branch_name',$_POST['branch']);
    				update_hrmpost_meta($hrm_id,'brnch_address',$_POST['brnch_address']);
    				
    				update_hrmpost_meta($hrm_id,'nmaddress',$_POST['nmaddress']);
				    update_hrmpost_meta($hrm_id,'nmfirstname',$_POST['nmfirstname']);
					update_hrmpost_meta($hrm_id,'nmlastname',$_POST['nmlastname']);
					update_hrmpost_meta($hrm_id,'nmfathername',$_POST['nmfathername']);
					update_hrmpost_meta($hrm_id,'nmmothername',$_POST['nmmothername']);
					update_hrmpost_meta($hrm_id,'nmdob',$_POST['nmdob']);
					update_hrmpost_meta($hrm_id,'nmmob',$_POST['nmmob']);
					update_hrmpost_meta($hrm_id,'nmrelation',$_POST['nmrelation']);
        	     $msg= 'ok'; 
            }
        }
	   if($msg=="Unsupported file type"){
	       echo $msg;
	   }else{
	       echo 'ok';
	   }
	   
	     die();
	}
	public function submit_soc_profile(){
	     
	     $facebook_url=$_POST['facebook_url'];
         update_mlm_option('facebook_url',$facebook_url);
         $twitter_url=$_POST['twitter_url'];
         update_mlm_option('twitter_url',$twitter_url);
         $insta_url=$_POST['insta_url'];
         update_mlm_option('insta_url',$insta_url);
         $google_plus=$_POST['google_plus'];
         update_mlm_option('google_plus',$google_plus);
        echo 'ok';     
         die();
	}
	public function update_pass(){
	     $hrm_id=$_POST['userid'];
	     $pass=md5($_POST['pass']);
	     update_pass_hrms($hrm_id,'HRM_PASSWORD',$pass);
	     $msg='Dear '.get_hrm_postmeta($hrm_id,'first_name').'\nYour password has been changed.\nNew Password is :'.$_POST['pass'];
	     $mob=get_hrm_postmeta($hrm_id,'contact');
	     update_hrmpost_meta($hrm_id,'password',$_POST['pass']);
         send_sms($mob,$msg,$hrm_id);
	     update_pass_hrms($hrm_id,'HRM_DATE_MODIFIED',date('Y-m-d h:i:s'));
         echo 'ok';     
         die();
	}
	public function update_stat(){
	     $hrm_id=$_POST['userid'];
	     $stat=$_POST['status'];
	     update_pass_hrms($hrm_id,'HRM_STATUS',$stat);
	     update_pass_hrms($hrm_id,'HRM_DATE_MODIFIED',date('Y-m-d h:i:s'));
         echo 'ok';     
         die();
	}
	public function check_sposonrs_id_single(){
	      $sponserid=$_POST['check_id'];
	      
	      echo check_sponsor($sponserid);
	       
	      die();
	}

	public function check_sposonrs_id(){
	      $sponserid=$_POST['check_id'];
	      $stage=$_POST['mlmdesc'];
	      echo check_sponsor_by_level($sponserid,$stage);
	       
	      die();
	}
	
	public function get_name(){
	      $id=$_POST['id'];
	      if(check_sponsor($id)==1){
	        $arr=get_hrm_post($id);
	        echo trim($arr[0]->HRM_NAME," ");
	      }else{
	          echo '';
	      }
	      die();
	}
	public function get_positionid(){
	      $sponsorid=strtoupper($_POST['sponsorid']);
		 // $position=$_POST['position'];
		$sponsor= check_sponsor_get_name($sponsorid);
	      if($sponsor != 0){
			  $data = array('hrm_id'=>$sponsorid,'hrm_name'=>$sponsor[0]['HRM_NAME'],'msg'=>'ok');
	           echo json_encode($data);
	      }else{
			  $data =array('msg'=>'Invalid Sponsor id');
	          echo json_encode($data);
	      }
	      die();
	}

	public function get_sponsor(){
		$userid=strtoupper($_POST['id']);
	   // $position=$_POST['position'];
	  $sponsor= get_hrm_postmeta($userid,'sponsorid');
		if($sponsor){
			$sponsorname= check_sponsor_get_name($sponsor);
			 echo $sponsor;
		}else{
		
			echo 'Invalid Sponsor id';
		}
		die();
  }


	public function get_phone(){
		$phone=strtoupper($_POST['phone']);
	   // $position=$_POST['position'];
	  $cphone= check_duplicate_detail('contact',$phone);
		if($cphone != 0){
			$data = array('msg'=>'ok');
			 echo json_encode($data);
		}else{
			$data =array('msg'=>'Mobile No. already taken');
			echo json_encode($data);
		}
		die();
  }


  public function get_email(){
	$email=$_POST['email'];
   // $position=$_POST['position'];
  $cemail= check_duplicate_detail('email',$email);
	if($cemail != 0){
		$data = array('msg'=>'ok');
		 echo json_encode($data);
	}else{
		$data =array('msg'=>'Email already taken');
		echo json_encode($data);
	}
	die();
}


public function get_aadhar(){
	$aadhar=$_POST['aadhar'];
   // $position=$_POST['position'];
  $caadhar= check_duplicate_detail('aadhar',$aadhar);
	if($caadhar != 0){
		$data = array('msg'=>'ok');
		 echo json_encode($data);
	}else{
		$data =array('msg'=>'Aadhar No already taken');
		echo json_encode($data);
	}
	die();
}

public function get_pancard(){
	$pancard=$_POST['pancard'];
   // $position=$_POST['position'];
  $cpan= check_duplicate_detail('pancard',$pancard);
	if($cpan != 0){
		$data = array('msg'=>'ok');
		 echo json_encode($data);
	}else{
		$data =array('msg'=>'Pan No already taken');
		echo json_encode($data);
	}
	die();
}

	public function get_epin_sponsor(){
	      $id=$_POST['id'];
	      $pack=$_POST['pack'];
	      $price=$_POST['price'];
	      if(check_sponsor($id)==1){
	           $row=get_all_epin_sponsor($id,0,$pack,$price);
	           echo json_encode($row);
	      }else{
	          echo json_encode('');
	      }
	      die();
	}
	
	public function approve_income(){
	      $id=$_POST['id'];
	      update_withdrawlreq($id,1,'APPROVED_DATE');
	      echo 'ok';
	      die();
	}
	public function cancel_income(){
	      $id=$_POST['id'];
	      update_withdrawlreq($id,3,'CANCELLED_DATE');
	      echo 'ok';
	      die();
	}
	public function get_district(){
	      $stateid=$_POST['stateid'];
	      $arr=get_district($stateid);
	      
	      //update_withdrawlreq($id,3,'CANCELLED_DATE');
	      echo json_encode($arr);
	      die();
	}
	public function manual_payout(){
	      $total=$_POST['total'];
	      for($i=1;$i<=$total;$i++){
	          $userid=$_POST['hrm_'.$i];
    	      $amt=$_POST['amt_'.$i];
    	      $dt=date('Y-m-d');
    	      $ledgerid=get_ledger_id($userid);
    	      update_amount_ledger($ledgerid,(-1)*$amt);
    	      update_amount_ledger(11,$amt);/* for withdrawl ledger*/
    	      $firstname=get_hrm_postmeta($userid,"first_name");
    	      $lastname=get_hrm_postmeta($userid,"last_name");
    	      $mob=get_hrm_postmeta($userid,"contact");
    	      $drid=11;/*for withdrawl account */
    	   	  $crid=$ledgerid;
    	      $particular='being amount withdrawl of '.$firstname. ' '.$lastname.' of '.$amt;
    	      insert_record_transaction($drid,$crid,$this->session->userdata('userid'),$particular,$amt,$dt);
    	      $msg='Dear '.$firstname.'\nYour Payment has been released successfully of amount '.$amt;
    	      send_sms($mob,$msg,$userid);
	      }
	      echo 'ok';
	      die();
	}
	public function approve_paid_income(){
	      $id=$_POST['id'];
	      $userid=$_POST['userid'];
	      $amt=$_POST['amt'];
	      $dt=date('Y-m-d');
	      update_withdrawlreq($id,2,'RELEASED_DATE');
	      $ledgerid=get_ledger_id($userid);
	      update_amount_ledger($ledgerid,(-1)*$amt);
	      update_amount_ledger(11,$amt);/* for withdrawl ledger*/
	      $firstname=get_hrm_postmeta($userid,"first_name");
	      $lastname=get_hrm_postmeta($userid,"last_name");
	      $mob=get_hrm_postmeta($userid,"contact");
	      $drid=11;/*for withdrawl account */
	   	  $crid=$ledgerid;
	      $particular='being amount withdrawl of '.$firstname. ' '.$lastname.' of '.$amt;
	      insert_record_transaction($drid,$crid,$this->session->userdata('userid'),$particular,$amt,$dt);
	      $msg='Dear '.$firstname.'\nYour Payment has been released successfully of amount '.$amt;
	      send_sms($mob,$msg,$userid);
	      echo 'ok';
	      die();
	}
	public function epingeneratefront()
	{
		$this->db->trans_start();
		$result=0;
		$amtid=$_POST['amtid'];
		$epinqty=$_POST['epinqty'];
		$userid='0';
		$reqid=$_POST['epinreqid'];
		$pin='';
		$amts=get_epin_amt_by_id($amtid);
		$sum_amt=0;
		if($amtid=='' || $epinqty=='' || $userid==''){
			echo $msg= 'Star fields should not be blank';
			die();
		}else{
		    $status=0;
			for($i=1;$i<=$epinqty;$i++){
				$pin=create_pinno();
				$epin_id=insertepin($pin,$userid,$amtid,$status);
				$mob=get_epin_req_by_id($reqid);
    		    $hrm_id=5000;
    		    $msg='Dear user your request for epin is granted.\nEpin no:'.$pin;
                send_sms($mob,$msg,$hrm_id);
				if($epin_id>0){
						$result=1;
						$sum_amt+=$amts;
				}else{
					$result=0;
					break;
				}
			}
		   
		}	
		if($result>0){
		    update_epin_req($reqid);
		    $amt_pack=$amts*$epinqty;
		    
		    $dt=date('Y-m-d');
		    update_amount_ledger(8,$amt_pack);
            $ledger_id=0;            				
			$drid=$ledger_id;
			$crid=8;/*for plan account */
		    $particular='being epin sold to front site user of '.$amt_pack;
		
			insert_record_transaction($drid,$crid,5000,$particular,$amt_pack,$dt);
			
			$drid=3;/*for cash account */
			$crid=$ledger_id;
			update_amount_ledger(3,$amt_pack);
		    $particular='A payment has been received by cash through front site of '.$amt_pack;
		    insert_record_transaction($drid,$crid,5000,$particular,$amt_pack,$dt);
		    
		    echo 'ok';
		}
		$this->db->trans_complete();
		die();
	}

	public function get_epin_amount()
	{
	
		$amtid=$_POST['type_id'];
	
		echo get_epin_amt_by_id($amtid);
		
		
	}
	
	public function epingenerate()
	{
		$this->db->trans_start();
		$result=0;
		$amtid=$_POST['amtid'];
		$epinqty=$_POST['epinqty'];
		$userid=strtoupper($_POST['userid']);
		$reqid=$_POST['epinreqid'];
		
		$amts=get_epin_amt_by_id($amtid);
		$sum_amt=0;
		if($amtid=='' || $epinqty=='' || $userid==''){
			echo $msg= 'Star fields should not be blank';
			die();
		}else{
		    if(check_sponsor($userid)==1){
    			$status=0;
    			for($i=1;$i<=$epinqty;$i++){
    				$pin=create_pinno();
    				$epin_id=insertepin($pin,$userid,$amtid,$status);
    				if($epin_id>0){
    						$result=1;
    						$sum_amt+=$amts;
    				}else{
    					$result=0;
    					break;
    				}
    			}
		    }else{
		        echo 'User Id does not exist';
		    }
		}	
		if($result>0){
		    update_epin_req($reqid);
		    $amt_pack=$amts*$epinqty;
		    $firstname=get_hrm_postmeta($userid,'first_name');
		    $lastname=get_hrm_postmeta($userid,'last_name');
		    $dt=date('Y-m-d');
		    update_amount_ledger(8,$amt_pack);
            $ledger_id=get_ledger_id($userid);            				
			$drid=$ledger_id;
			$crid=8;/*for plan account */
		    $particular='being epin sold to '.$firstname. ' '.$lastname.' of '.$amt_pack;
		
			insert_record_transaction($drid,$crid,$this->session->userdata('userid'),$particular,$amt_pack,$dt);
			
			$drid=3;/*for cash account */
			$crid=$ledger_id;
			update_amount_ledger(3,$amt_pack);
		    $particular='A payment has been received by cash through '.$firstname. ' '.$lastname.' of '.$amt_pack;
		    insert_record_transaction($drid,$crid,$this->session->userdata('userid'),$particular,$amt_pack,$dt);
		    echo 'ok';
		}
		$this->db->trans_complete();
		die();
	}

	public function add_category()
	{
		$this->db->trans_start();
		$result=0;
		$category=$_POST['category'];

	
		if($category==''){
			echo $msg= 'Star fields should not be blank';
			die();
		}else{
		   
    				$category_id=insertcategory($category);
		}
		  
			
		if($category_id){
		    echo 'ok';
		}
		$this->db->trans_complete();
		die();
	}



	public function edit_category()
	{
		
		$category=$_POST['category'];
		$category_id=$_POST['category_id'];

	
		if($category=='' || $category_id==''){
			echo $msg= 'Star fields should not be blank';
			die();
		}else{
		   
    				$id=updatecategory($category,$category_id);
		}
		  
			
		if($id){
		    echo 'ok';
		}
	
		die();
	}

	public function delete_Category(){

		$id = $_GET['id'];
         $del = deletecategory($id);
		 if($del){
		    echo 'ok';
		}
	
		die();

	}

	public function get_category(){
		$offset = 0;$limit = 10;
		$sort = 'id'; $order = 'ASC';
		$where = '';
		$table = $_GET['table'];
		
		if(isset($_POST['id']))
			$id = $_POST['id'];
		if(isset($_GET['offset']))
			$offset = $_GET['offset'];
		if(isset($_GET['limit']))
			$limit = $_GET['limit'];
		if(isset($_GET['order']))
			$order = $_GET['order'];
		if(isset($_GET['search'])){
			$search = $_GET['search'];
			$where = " where (`id` like '%".$search."%' OR `name` like '%".$search."%' )";
		}
		
		$res=get_count_category($where);
	
		foreach($res as $row){
			$total = $row['total'];
		}
		
		$res = get_category($where,$sort,$order,$offset,$limit);
		
		$bulkData = array();
		$bulkData['total'] = $total;
		$rows = array();
		$tempRow = array();
		$i=1;
		foreach($res as $row){
			
			$operate = "<a class='btn btn-xs btn-primary edit-category' data-id='".$row['id']."' data-toggle='modal' data-target='#editcategory' style='background:#fb6752;border-color:#fb6752' title='Edit'><i class='fa fa-edit'></i></a>";
			$operate .= " <a class='btn btn-xs btn-danger delete-category' style='background:#52a2b2;border-color:#52a2b2' data-id='".$row['id']."'  title='Delete'><i class='fa fa-trash'></i></a>";
			
			$tempRow['id'] = $row['id'];
			$tempRow['sno'] = $i;
			$tempRow['name'] = $row['name'];
			$tempRow['operate'] = $operate;
			$rows[] = $tempRow;
			$i++;
		}
		
		$bulkData['rows'] = $rows;
		print_r(json_encode($bulkData));

	}

	public function add_subcategory()
	{
		$this->db->trans_start();
		$result=0;
		$category=$_POST['category_id'];
		$subcategory=$_POST['subcategory'];

	
		if($category=='' || $subcategory==''){
			echo $msg= 'Star fields should not be blank';
			die();
		}else{
		   
    				$subcategory_id=insertsubcategory($category,$subcategory);
		}
		  
			
		if($subcategory_id){
		    echo 'ok';
		}
		$this->db->trans_complete();
		die();
	}

	public function edit_subcategory()
	{
		
		$category=$_POST['category'];
		$subcategory=$_POST['subcategory'];
		$subcategory_id=$_POST['subcategory_id'];

	
		if($category=='' || $subcategory_id=='' || $subcategory==''){
			echo $msg= 'Star fields should not be blank';
			die();
		}else{
		   
    				$id=updatesubcategory($category,$subcategory,$subcategory_id);
		}
		  
			
		if($id){
		    echo 'ok';
		}
	
		die();
	}

	public function delete_subCategory(){

		$id = $_GET['id'];
         $del = deletesubcategory($id);
		 if($del){
		    echo 'ok';
		}
	
		die();

	}


	public function get_subcategory(){
		$offset = 0;$limit = 10;
		$sort = 'id'; $order = 'ASC';
		$where = '';
		$table = $_GET['table'];
		
		if(isset($_POST['id']))
			$id = $_POST['id'];
		if(isset($_GET['offset']))
			$offset = $_GET['offset'];
		if(isset($_GET['limit']))
			$limit = $_GET['limit'];
		if(isset($_GET['order']))
			$order = $_GET['order'];
		if(isset($_GET['search'])){
			$search = $_GET['search'];
			$where = " where (`id` like '%".$search."%' OR `name` like '%".$search."%' )";
		}
		
		$res=get_count_subcategory($where);
	
		foreach($res as $row){
			$total = $row['total'];
		}
		
		$res = get_subcategory($where,$sort,$order,$offset,$limit);
		
		$bulkData = array();
		$bulkData['total'] = $total;
		$rows = array();
		$tempRow = array();
		$i=1;
		foreach($res as $row){
			$operate ='';
			$operate = "<a class='btn btn-xs btn-primary edit-subcategory' data-id='".$row['id']."' data-toggle='modal' data-target='#editsubcategory' style='background:#fb6752;border-color:#fb6752' title='Edit'><i class='fa fa-edit'></i></a>";
			$operate .= " <a class='btn btn-xs btn-danger delete-subcategory' style='background:#52a2b2;border-color:#52a2b2' data-id='".$row['id']."'  title='Delete'><i class='fa fa-trash'></i></a>";
			
			$tempRow['id'] = $row['id'];
			$tempRow['sno'] = $i;
			$tempRow['category'] = get_category_name_by_id($row['category_id']);
			$tempRow['category_id'] = $row['category_id'];
			$tempRow['subcategory'] = $row['name'];
			$tempRow['operate'] = $operate;
			$rows[] = $tempRow;
			$i++;
		}
		
		$bulkData['rows'] = $rows;
		print_r(json_encode($bulkData));

	}

	public function get_subcategory_by_cat()
	{
		$category = $_POST['category_id'];
		if(empty($category)){
			echo '<option value="">Select Sub Category</option>';
			return false;
		}
		
		$subcategories = get_subcategory_by_cat($category);
		$options = '<option value="">Select Sub Category</option>';
	foreach($subcategories as $option){
		$options .="<option value='".$option['id']."'>".$option['name']."</option>";
	}
	echo $options;

	}


	public function add_product()
	{
	
	    $msg='';
		$category=$_POST['category_id'];
		$subcategory=$_POST['subcategory'];
		$name=$_POST['name'];
		$desc=$_POST['desc'];
		$size=$_POST['size'];
		$type=$_POST['type'];
		$mrp=$_POST['mrp'];
		$dp=$_POST['dp'];
		$bv=$_POST['bv'];
		$gst=$_POST['gst'];
		$hsn=$_POST['hsn'];
     

	
		if($category=='' || $subcategory=='' || $name=='' || $mrp=='' || $dp=='' || $bv=='' || $gst==''){
			echo $msg= 'Star fields should not be blank';
			die();
		}else{

			if(isset($_FILES['image'])){
            	
            	$banner=$_FILES['image']['name']; 
            	if($banner!=''){
                	$file_size = $_FILES['image']['size'];
                	
                	$expbanner=explode('.',$banner);
            		$allowed_format = array('jpg','jpeg','png');	
            		if(in_array(strtolower(end($expbanner)),$allowed_format)){	
            			$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/mlm/assets/uploads_assets/products/';	
            			$full_file_name = uniqid().".".end($expbanner);		
            			$uploadfile = $uploaddir.$full_file_name;
            		
            			$upload_nm=$full_file_name;
        				move_uploaded_file($_FILES["image"]["tmp_name"] , $uploadfile);	//for moving image 		
        	
        			     $data = array(
                            'category_id'=>$category,
							'subcategory_id'=>$subcategory,
							'name'=>$name,
							'description'=>$desc,
							'size_value'=>$size,
							'size_type'=>$type,
							'mrp'=>$mrp,
							'dp'=>$dp,
							'bv'=>$bv,
							'gst'=>$gst,
							'hsn'=>$hsn,
							 'image'=>$upload_nm,
							 'product_code'=>create_productid(),
                        );
                        $this->db->insert('products',$data);
                        $productid=$this->db->insert_id();
                  if($productid)
						$msg ='ok'; 

						echo $msg;
						die();
						
        			}else{		
            			$msg= "Unsupported file type";
            		}
            	}else{
				  
					$data = array(
						'category_id'=>$category,
						'subcategory_id'=>$subcategory,
						'name'=>$name,
						'description'=>$desc,
						'size_value'=>$size,
						'size_type'=>$type,
						'mrp'=>$mrp,
						'dp'=>$dp,
						'bv'=>$bv,
						'gst'=>$gst,
						'hsn'=>$hsn,
						 'image'=>'default.jpg',
						 'product_code'=>create_productid(),
					);
					$this->db->insert('products',$data);
					$productid=$this->db->insert_id();
			  if($productid)
					$msg ='ok'; 

					echo $msg;
					die();
            	}
           }
		   
    			
		}
		  

		
	}

	public function get_products(){
		$offset = 0;$limit = 10;
		$sort = 'id'; $order = 'ASC';
		$where = '';
		$table = $_GET['table'];
		
		if(isset($_POST['id']))
			$id = $_POST['id'];
		if(isset($_GET['offset']))
			$offset = $_GET['offset'];
		if(isset($_GET['limit']))
			$limit = $_GET['limit'];
		if(isset($_GET['order']))
			$order = $_GET['order'];
		if(isset($_GET['search'])){
			$search = $_GET['search'];
			$where = " where (`id` like '%".$search."%' OR `name` like '%".$search."%' )";
		}
		
		$res=get_count_product($where);
	
		foreach($res as $row){
			$total = $row['total'];
		}
		
		$res = get_product($where,$sort,$order,$offset,$limit);
		
		$bulkData = array();
		$bulkData['total'] = $total;
		$rows = array();
		$tempRow = array();
		$i=1;
		foreach($res as $row){
			$operate ='';
			$operate = "<a class='btn btn-xs btn-primary edit-product' data-id='".$row['id']."' data-toggle='modal' data-target='#editproduct' style='background:#fb6752;border-color:#fb6752' title='Edit'><i class='fa fa-edit'></i></a>";
			$operate .= " <a class='btn btn-xs btn-danger delete-product' style='background:#52a2b2;border-color:#52a2b2' data-id='".$row['id']."'  title='Delete'><i class='fa fa-trash'></i></a>";
			
			$dp_value = $row['mrp'] - get_perc_value($row['mrp'],$row['dp']);
             $bv_val = get_perc_value($dp_value,$row['bv']);
			$name = " <a class='btn btn-xs btn-primary view-product' data-toggle='modal' data-target='#viewproduct' style='background:#fff;color:#333;border-color:#52a2b2' data-id='".$row['id']."'  title='View'>".$row['name']."</a>";
			
			$gst_val = round($dp_value-($dp_value*100)/($row['gst'] +100),2);
			$image = " <a class='btn btn-xs btn-primary' href='".base_url().'assets/uploads_assets/products/'.$row['image']."' target='_blank' style='background:#65cea7;border-color:#65cea7' data-id='".$row['id']."'  title='View'>View Picture</a>";


			$tempRow['id'] = $row['id'];
			$tempRow['product_code'] = $row['product_code'];
			$tempRow['sno'] = $i;
			$tempRow['category'] = get_category_name_by_id($row['category_id']);
			$tempRow['category_id'] = $row['category_id'];
			$tempRow['desc'] = $row['description'];
			$tempRow['subcategory'] =get_subcategory_name_by_id($row['subcategory_id']);
			$tempRow['subcategory_id'] = $row['subcategory_id'];
			$tempRow['name'] = $row['name'];
			$tempRow['pro_name'] = $name;
			$tempRow['size_type'] = $row['size_type'];
			$tempRow['size_value'] = $row['size_value'];
			$tempRow['dp_o'] = $row['dp'];
			$tempRow['gst_o'] = $row['gst'];
			$tempRow['size'] = $row['size_value'].' '.get_size_type($row['size_type']);
			$tempRow['mrp'] = $row['mrp'];
			$tempRow['dp'] = $dp_value;
			$tempRow['bv'] = $bv_val;
			$tempRow['bv_o'] = $row['bv'];
			$tempRow['gst'] = $gst_val;
			$tempRow['image'] = $image;
			$tempRow['image_url']=(!empty($row['image']) && $row['image']!='default.jpg')?'<a data-fancybox="Question-Image" href="images/questions/'.$row['image'].'" ><img src="../assets/upload_assets/products/'.$row['image'].'" height=30 ></a>':'No image';
			$tempRow['hsn'] = $row['hsn'];
			
			$tempRow['operate'] = $operate;
			$rows[] = $tempRow;
			$i++;
		}
		
		$bulkData['rows'] = $rows;
		print_r(json_encode($bulkData));

	}

	public function get_register_members(){
		$offset = 0;$limit = 10;
		$sort = 'HRM_DATE'; $order = 'ASC';
		$where = '';
		$table = $_GET['table'];
		
		if(isset($_POST['id']))
			$id = $_POST['id'];
		if(isset($_GET['offset']))
			$offset = $_GET['offset'];
		if(isset($_GET['limit']))
			$limit = $_GET['limit'];
		if(isset($_GET['order']))
			$order = $_GET['order'];
		if(isset($_GET['search'])){
			$search = $_GET['search'];
			$where = " where (`HRM_ID` like '%".$search."%' OR `HRM_NAME` like '%".$search."%' )";
		}
		
		$res=get_count_member($where);
	
		foreach($res as $row){
			$total = $row['total'];
		}
		
		$res = get_register_member($where,$sort,$order,$offset,$limit);
		
		$bulkData = array();
		$bulkData['total'] = $total;
		$rows = array();
		$tempRow = array();
		$i=1;
		foreach($res as $row){
			// $operate ='';
			// $operate = "<a class='btn btn-xs btn-primary edit-product' data-id='".$row['id']."' data-toggle='modal' data-target='#editproduct' style='background:#fb6752;border-color:#fb6752' title='Edit'><i class='fa fa-edit'></i></a>";
			// $operate .= " <a class='btn btn-xs btn-danger delete-product' style='background:#52a2b2;border-color:#52a2b2' data-id='".$row['id']."'  title='Delete'><i class='fa fa-trash'></i></a>";
			
			// $dp_value = $row['mrp'] - get_perc_value($row['mrp'],$row['dp']);
            //  $bv_val = get_perc_value($dp_value,$row['bv']);
			// $name = " <a class='btn btn-xs btn-primary view-product' data-toggle='modal' data-target='#viewproduct' style='background:#fff;color:#333;border-color:#52a2b2' data-id='".$row['id']."'  title='View'>".$row['name']."</a>";
			
			// $gst_val = round($dp_value-($dp_value*100)/($row['gst'] +100),2);
	    if($row['PAY_STATUS']==1)
		$status = " <span class='btn btn-xs btn-success' title='Payment Status'>Paid</span>";
		else
		$status = " <span class='btn btn-xs btn-danger' title='Payment Status'>Unpaid</span>";

			$mobile=get_hrm_postmeta($row['HRM_ID'],'contact');
			$email=get_hrm_postmeta($row['HRM_ID'],'email');
			$sponsorid=get_hrm_postmeta($row['HRM_ID'],'sponsorid');
			if($sponsorid){
				$sponsor_name = check_sponsor_get_name($sponsorid)[0]['HRM_NAME'];
			}else{
				$sponsorid='';
				$sponsor_name='';
			}
			
			if($row['HRM_ID'] == 5000)
			$status = '';
              
			

			$tempRow['userid'] = $row['HRM_ID'];
			$tempRow['username'] = $row['HRM_NAME'];
			$tempRow['sno'] = $i;
			$tempRow['mobile'] = $mobile;
			$tempRow['email'] = $email;
			$tempRow['sponsorid'] = $sponsorid;
			$tempRow['sponsorname'] =$sponsor_name;
			$tempRow['pay_status'] = $status;
		
			
			
			// $tempRow['operate'] = $operate;
			$rows[] = $tempRow;
			$i++;
		}
		
		$bulkData['rows'] = $rows;
		print_r(json_encode($bulkData));

	}


	public function edit_product()
	{
	
		$msg='';
		$id=$_POST['product_id'];
		$category=$_POST['category_id'];
		$subcategory=$_POST['subcategory'];
		$name=$_POST['name'];
		$desc=$_POST['desc'];
		$size=$_POST['size'];
		$type=$_POST['type'];
		$mrp=$_POST['mrp'];
		$dp=$_POST['dp'];
		$bv=$_POST['bv'];
		$gst=$_POST['gst'];
		$hsn=$_POST['hsn'];
     

	
		if($category=='' || $subcategory=='' || $name=='' || $mrp=='' || $dp=='' || $bv=='' || $gst==''){
			echo $msg= 'Star fields should not be blank';
			die();
		}else{

			if(isset($_FILES['image'])){
            	
            	$banner=$_FILES['image']['name']; 
            	if($banner!=''){
                	$file_size = $_FILES['image']['size'];
                	
                	$expbanner=explode('.',$banner);
            		$allowed_format = array('jpg','jpeg','png');	
            		if(in_array(strtolower(end($expbanner)),$allowed_format)){	
            			$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/mlm/assets/uploads_assets/products/';	
            			$full_file_name = uniqid().".".end($expbanner);		
            			$uploadfile = $uploaddir.$full_file_name;
            		
            			$upload_nm=$full_file_name;
        				move_uploaded_file($_FILES["image"]["tmp_name"] , $uploadfile);	//for moving image 		
        	
        			     $data = array(
                            'category_id'=>$category,
							'subcategory_id'=>$subcategory,
							'name'=>$name,
							'description'=>$desc,
							'size_value'=>$size,
							'size_type'=>$type,
							'mrp'=>$mrp,
							'dp'=>$dp,
							'bv'=>$bv,
							'gst'=>$gst,
							'hsn'=>$hsn,
                             'image'=>$upload_nm,
						);
						$this->db->where('id',$id);
                        $this->db->update('products',$data);
                       // $productid=$this->db->insert_id();
                //  if($productid)
						$msg ='ok'; 

						echo $msg;
						die();
						
        			}else{		
            			$msg= "Unsupported file type";
            		}
            	}else{
				  
					$data = array(
						'category_id'=>$category,
						'subcategory_id'=>$subcategory,
						'name'=>$name,
						'description'=>$desc,
						'size_value'=>$size,
						'size_type'=>$type,
						'mrp'=>$mrp,
						'dp'=>$dp,
						'bv'=>$bv,
						'gst'=>$gst,
						'hsn'=>$hsn,
						 'image'=>'default.jpg',
					);
					$this->db->where('id',$id);
					$this->db->update('products',$data);

					$msg ='ok'; 

					echo $msg;
					die();
            	}
           }
		   
    			
		}
		  

		
	}

	public function delete_product(){

		$id = $_GET['id'];
         $del = deleteproduct($id);
		 if($del){
		    echo 'ok';
		}
	
		die();

	}

	
	public function epingenerate_franchisee()
	{
		$this->db->trans_start();
		$result=0;
		$amtid=1;
		$epinqty=$_POST['frenchisee_epin'];
		$userid=strtoupper($_POST['userid']);
		$reqid=$_POST['epinreqid'];
		
		$amts=get_epin_amt_by_id($amtid);
		$sum_amt=0;
		if($amtid=='' || $epinqty=='' || $userid==''){
			echo $msg= 'Star fields should not be blank';
			die();
		}else{
		    if(check_sponsor($userid)==1){
    			$status=0;
    			for($i=1;$i<=$epinqty;$i++){
    				$pin=create_pinno();
    				$epin_id=insertepin($pin,$userid,$amtid,$status);
    				if($epin_id>0){
    						$result=1;
    						$sum_amt+=$amts;
    				}else{
    					$result=0;
    					break;
    				}
    			}
		    }else{
		        echo 'User Id does not exist';
		    }
		}	
		if($result>0){
		    update_epin_req($reqid);
		    $amt_pack=$amts*$epinqty;
		    $firstname=get_hrm_postmeta($userid,'first_name');
		    $lastname=get_hrm_postmeta($userid,'last_name');
		    $dt=date('Y-m-d');
		    update_amount_ledger(8,$amt_pack);
            $ledger_id=get_ledger_id($userid);            				
			$drid=$ledger_id;
			$crid=8;/*for plan account */
		    $particular='being epin sold to '.$firstname. ' '.$lastname.' of '.$amt_pack;
		
			insert_record_transaction($drid,$crid,$this->session->userdata('userid'),$particular,$amt_pack,$dt);
			
			$drid=3;/*for cash account */
			$crid=$ledger_id;
			update_amount_ledger(3,$amt_pack);
		    $particular='A payment has been received by cash through '.$firstname. ' '.$lastname.' of '.$amt_pack;
		    insert_record_transaction($drid,$crid,$this->session->userdata('userid'),$particular,$amt_pack,$dt);
		    
			echo 'ok';
		    //insert_wallet_balance($userid,$_POST['frandis'],3);
		    pay_commission_to_customer($userid,$_POST['frandis'],3,'1,2');
		}
		$this->db->trans_complete();
		die();
	}
	public function epingeneratewallet()
	{
		$this->db->trans_start();
		$result=0;
		$amtid=$_POST['amtid'];
		$epinqty=$_POST['epinqty'];
		$userid=strtoupper($_POST['userid']);
		$amts=get_epin_amt_by_id($amtid);
		$sum_amt=0;
		if($amtid=='' || $epinqty=='' || $userid==''){
			echo $msg= 'Star fields should not be blank';
			die();
		}else{
		    if(liable_amount_to_pay($this->session->userdata('userid'))>($amts*$epinqty)){
    		    if(check_sponsor($userid)==1){
        			$status=0;
        			for($i=1;$i<=$epinqty;$i++){
        				$pin=create_pinno();
        				$epin_id=insertepin($pin,$userid,$amtid,$status,1);
        				if($epin_id>0){
        						$result=1;
        						$sum_amt+=$amts;
        				}else{
        					$result=0;
        					break;
        				}
        			}
    		    }else{
    		        echo 'User Id does not exist';
    		    }
		    }else{
		        echo 'Insufficient wallet balance';
		    }
		}	
		if($result>0){
		    $amt_pack=$amts*$epinqty;
		    $firstname=get_hrm_postmeta($userid,'first_name');
		    $lastname=get_hrm_postmeta($userid,'last_name');
		    $dt=date('Y-m-d');
		    update_amount_ledger(8,$amt_pack);
            $ledger_id=get_ledger_id($userid);            				
			$drid=$ledger_id;
			$crid=8;/*for plan account */
		    $particular='being epin sold to '.$firstname. ' '.$lastname.' of '.$amt_pack;
		
			insert_record_transaction($drid,$crid,$this->session->userdata('userid'),$particular,$amt_pack,$dt);
			
			$drid=3;/*for cash account */
			$crid=$ledger_id;
			update_amount_ledger(3,$amt_pack);
		    $particular='A payment has been received by cash through '.$firstname. ' '.$lastname.' of '.$amt_pack;
		    insert_record_transaction($drid,$crid,$this->session->userdata('userid'),$particular,$amt_pack,$dt);
		    
    	    $amt=$amt_pack;
    	    $dt=date('Y-m-d');
    	    $ledgerid=get_ledger_id($userid);
    	    update_amount_ledger($ledgerid,(-1)*$amt);
    	    update_amount_ledger(11,$amt);/* for withdrawl ledger*/
    	    $firstname=get_hrm_postmeta($userid,"first_name");
    	    $lastname=get_hrm_postmeta($userid,"last_name");
    	    $mob=get_hrm_postmeta($userid,"contact");
    	    $drid=11;/*for withdrawl account */
    	   	$crid=$ledgerid;
    	    $particular='being amount withdrawl of '.$firstname. ' '.$lastname.' of '.$amt;
    	    insert_record_transaction($drid,$crid,$this->session->userdata('userid'),$particular,$amt,$dt);
    	    $hrm_id=$userid;
    	    $msg='Dear '.$firstname.' '.$lastname.' your epin request from wallet balance is completed for rs.'.$amt;
            send_sms($mob,$msg,$hrm_id);
            echo 'ok';
		}
		$this->db->trans_complete();
		die();
	}
	public function epintransfer()
	{
		$this->db->trans_start();
		$result=0;
		$epinno=$_POST['epinno'];
		$userid=$_POST['userid'];
		$desc_epin_trans=$_POST['desc_epin_trans'];
		$count=count($epinno);
		if($epinno=='' || $userid=='' || $desc_epin_trans==''){
			echo $msg= 'Star fields should not be blank';
			die();
		}else{
		    if(check_sponsor($userid)==1){
    		    for($i=0;$i<$count;$i++){
        		    update_epin_transfer($epinno[$i],$userid,$desc_epin_trans);
            		$result=1;
        	    }
        	}else{
    		        echo 'User Id does not exist';
    		        return;
    		}
		}	
		if($result>0){
		    $this->db->trans_complete();
		    
		    $mob=get_hrm_postmeta($userid,'contact');
		    $firstname=get_hrm_postmeta($userid,'first_name');
    		$msg='Dear '.$firstname.'\nEpin received successfully\nPlease check your unused epin and Follow this link to login\n'.base_url();
            send_sms($mob,$msg,$userid);
		    
		    echo 'ok';
		}
		
		die();
	}
	public function check_place()
	{
		$result=0;
		$arr=array();
		$positionid=$_POST['positionid'];
		if(check_sponsor($positionid)==1){
		      $positionid_level=1;
		           if( $positionid_level<2){
        		       $arr['pos']=check_available_position($positionid_level,$positionid);
        		        if(count($arr)==2){
        		            $arr['message']='No more position is left';
        		       }else{
        		           $arr['message']='';
        		       }
        	           $result=1;
    		       }else{
    		            $arr['POSITION']='no';
    		            $arr['message']='You cannot add the member under the You';
    		            $result=1;
    		       }
		      
		}
		if($result==1){
			echo json_encode($arr);
		}else{
		    $arr['POSITION']='no';
		     $arr['message']='';
		    echo json_encode($arr);
		}
	
		die();
	}
	public function reqpin()
	{
		$this->db->trans_start();
		$result=0;
		$reqmsg=$_POST['reqmsg'];
		$amtid=$_POST['amtid'];
		$quant=$_POST['quant'];
		
		if(isset($_FILES['fileToUpload'])){
        	$banner=$_FILES['fileToUpload']['name']; 
        	if($banner!=''){
            	$file_size = $_FILES['fileToUpload']['size'];
            	$expbanner=explode('.',$banner);
        		$allowed_format = array('jpg','jpeg','png');	
        		if(in_array(strtolower(end($expbanner)),$allowed_format)){	
        			$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/mlm/assets/uploads_assets/';	
        			$full_file_name = uniqid().".".end($expbanner);		
        			$uploadfile = $uploaddir.$full_file_name;
        		    $upload_nm=$full_file_name;
    				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"] , $uploadfile);	//for moving image 		
    				$status=1;
        			$req_id=insertereq($reqmsg,$status,$full_file_name,0,$quant,$amtid);
        			if($req_id>0){
        				  $msg= 'ok';
        			}
    			}else{		
        			$msg= "Unsupported file type";
        		}
        	}else{
                $msg= 'Please upload receipt image';
    		}
        }
	    echo $msg;
	    $this->db->trans_complete();
		die();
	}
	public function getepinfront()
	{
		$this->db->trans_start();
		$mobileno=$_POST['mobileno'];
		$message=$_POST['message'];
		$req_id=insertereq($message,1,'',1,$mobileno);
		if($req_id>0){
			  echo $msg= 'ok';
			  $phone='9696006233';
			  $hrm_id=5000;
			  $msg='Dear admin a request has been made for epin from Website.\nMobile No:'.$mobileno;
              send_sms($phone,$msg,$hrm_id);
		}else{
		    echo 'Something wents wrong!';
		}
	    $this->db->trans_complete();
		die();
	}
	public function epinrequest_franchisee()
	{
		$this->db->trans_start();
		$result=0;
		$reqmsg=$_POST['reqmsg'];
		$franchisee=$_POST['frenchisee_epin'];
		
		if(isset($_FILES['fileToUpload'])){
        	$banner=$_FILES['fileToUpload']['name']; 
        	if($banner!=''){
            	$file_size = $_FILES['fileToUpload']['size'];
            	$expbanner=explode('.',$banner);
        		$allowed_format = array('jpg','jpeg','png');	
        		if(in_array(strtolower(end($expbanner)),$allowed_format)){	
        			$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/mlm/assets/uploads_assets/';	
        			$full_file_name = uniqid().".".end($expbanner);		
        			$uploadfile = $uploaddir.$full_file_name;
        		    $upload_nm=$full_file_name;
    				move_uploaded_file($_FILES["fileToUpload"]["tmp_name"] , $uploadfile);	//for moving image 		
    				$status=1;
        			$req_id=insertereq($reqmsg,$status,$full_file_name,$franchisee);
        			if($req_id>0){
        				  $msg= 'ok';
        			}
    			}else{		
        			$msg= "Unsupported file type";
        		}
        	}else{
                $status=1;
    			$req_id=insertereq($reqmsg,$status,'',$franchisee);
    			if($req_id>0){
    				  $msg= 'ok';
    			}
            }
        }
	    echo $msg;
	    $this->db->trans_complete();
		die();
	}
	public function free_single_tree()
	{
		$hrm_id=$_POST['user_id'];
		?>
		<div class="col-md-12 text-center">
			<ul id="tree_view" style="display:none">
			    
		       <li>
					<div>
					    <?php if($hrm_id==get_option('last_paid')){ ?>
						<a href="javascript:void(0)" id="level-0" data-html="true"  data-toggle="tooltip" data-placement="bottom" title="User id :<?php echo $hrm_id; ?> <br> Name : <?php echo get_hrm_postmeta($hrm_id,'first_name'); ?> <br> Sponsor Id : <?php echo get_added_by($hrm_id); ?>" class="red-tooltip">
							<?php if($hrm_id!=get_option('last_paid')){ ?>
							<img class="tree_up_icon" src="<?php echo base_url(); ?>assets/img/up.png" alt="<?php echo get_reverse_parent_hrms_lev_0($hrm_id,1); ?>" onclick='getGenologyTree("<?php echo get_reverse_parent_hrms_lev_0($hrm_id,1); ?>",event);'/>
							<?php } $arr=get_hrm_post($hrm_id); 
							    if($arr[0]->HRM_STATUS==1){
							        $stat='active.png';
							    }else{
							        $stat='inactive.png';
							    }
							    
							?>
							<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stat; ?>" alt="<?php echo get_reverse_parent_hrms_lev_0($hrm_id,1); ?>" id="<?php echo $hrm_id; ?>"> 
							<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;"><i class="fa fa-user"></i> User id :<?php echo $hrm_id; ?><br><i class="fa fa-user"></i> Name : <?php echo get_hrm_postmeta($hrm_id,'first_name'); ?><br> </div>
						</a>
						<?php } else { ?>
						<a href="javascript:void(0)" id="level-0" data-html="true"  data-toggle="tooltip" data-placement="bottom" title="User id :<?php echo $hrm_id; ?> <br> Name : <?php echo get_hrm_postmeta($hrm_id,'first_name'); ?> <br> Sponsor Id : <?php echo get_added_by_free($hrm_id); ?>" class="red-tooltip">
							<?php if($hrm_id!=get_option('last_paid')){ ?>
							<img class="tree_up_icon" src="<?php echo base_url(); ?>assets/img/up.png" alt="<?php echo get_reverse_parent_hrms_lev_0_free($hrm_id,1); ?>" onclick='getGenologyTree("<?php echo get_reverse_parent_hrms_lev_0_free($hrm_id,1); ?>",event);'/>
							<?php } $arr=get_hrm_post($hrm_id); 
							    if($arr[0]->HRM_STATUS==1){
							        $stat='active.png';
							    }else{
							        $stat='active.png';
							    }
							    
							?>
							<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stat; ?>" alt="<?php echo get_reverse_parent_hrms_lev_0_free($hrm_id,1); ?>" id="<?php echo $hrm_id; ?>"> 
							<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;"><i class="fa fa-user"></i> User id :<?php echo $hrm_id; ?><br><i class="fa fa-user"></i> Name : <?php echo get_hrm_postmeta($hrm_id,'first_name'); ?><br> </div>
						</a>
						<?php } ?>
					</div>
				    <ul>
				        <?php
        					$nodes=get_free_nodes_geneology_pos($hrm_id,5,1);
        					
        					if(!empty($nodes)){
						?>
					    <li>
					        <div>
								<a href="javascript:void(0)" id="level-1" data-html="true"  data-toggle="tooltip" data-placement="bottom" title="User Id : <?php echo $nodes[0]->HRM_ID; ?> <br> Name : <?php echo get_hrm_postmeta($nodes[0]->HRM_ID,'first_name'); ?> <br> Sponsor Id : <?php echo get_added_by_free($nodes[0]->HRM_ID); ?>"  class="red-tooltip">
									<?php $arr=get_hrm_post($nodes[0]->HRM_ID); 
    							    if($arr[0]->HRM_STATUS==1){
    							        $stats='active.png';
    							    }else{
    							        $stats='active.png';
    							    } ?>
									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $hrm_id; ?>" id= "<?php echo $hrm_id; ?>" onclick='getGenologyTree("<?php echo $hrm_id; ?>",event);' > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;"><i class="fa fa-user"></i> User Id : <?php echo $nodes[0]->HRM_ID; ?><br><i class="fa fa-user"></i> Name : <?php echo get_hrm_postmeta($nodes[0]->HRM_ID,'first_name'); ?><br></div>
								</a>
							</div>
        					<ul>
        					    <?php
                					$nodess=get_free_nodes_geneology_pos($nodes[0]->HRM_ID,5,1);
                					
                					if(!empty($nodess)){
        						?>
        					    <li>
        					        <div>
        								<a href="javascript:void(0)" id="level-1" data-html="true"  data-toggle="tooltip" data-placement="bottom" title="User Id : <?php echo $nodess[0]->HRM_ID; ?> <br> Name : <?php echo get_hrm_postmeta($nodess[0]->HRM_ID,'first_name'); ?> <br> Sponsor Id : <?php echo get_added_by_free($nodess[0]->HRM_ID); ?>"  class="red-tooltip">
        									<?php $arr=get_hrm_post($nodess[0]->HRM_ID); 
            							    if($arr[0]->HRM_STATUS==1){
            							        $stats='active.png';
            							    }else{
            							        $stats='active.png';
            							    } ?>
        									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $nodes[0]->HRM_ID; ?>" id= "<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);' > 
        									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;"><i class="fa fa-user"></i> User Id : <?php echo $nodess[0]->HRM_ID; ?><br><i class="fa fa-user"></i> Name : <?php echo get_hrm_postmeta($nodess[0]->HRM_ID,'first_name'); ?><br></div>
        								</a>
        							</div>
                					<ul>
                					    <?php
                        					$nodesss=get_free_nodes_geneology_pos($nodess[0]->HRM_ID,5,1);
                        					
                        					if(!empty($nodesss)){
                						?>
                					    <li>
                					        <div>
                								<a href="javascript:void(0)" id="level-1" data-html="true"  data-toggle="tooltip" data-placement="bottom" title="User Id : <?php echo $nodesss[0]->HRM_ID; ?> <br> Name : <?php echo get_hrm_postmeta($nodesss[0]->HRM_ID,'first_name'); ?> <br> Sponsor Id : <?php echo get_added_by_free($nodesss[0]->HRM_ID); ?>"  class="red-tooltip">
                									<?php $arr=get_hrm_post($nodesss[0]->HRM_ID); 
                    							    if($arr[0]->HRM_STATUS==1){
                    							        $stats='active.png';
                    							    }else{
                    							        $stats='active.png';
                    							    } ?>
                									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $nodess[0]->HRM_ID; ?>" id= "<?php echo $nodess[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodess[0]->HRM_ID; ?>",event);' > 
                									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;"><i class="fa fa-user"></i> User Id : <?php echo $nodesss[0]->HRM_ID; ?><br><i class="fa fa-user"></i> Name : <?php echo get_hrm_postmeta($nodesss[0]->HRM_ID,'first_name'); ?><br></div>
                								</a>
                							</div>
                        					<ul>
                        					    <?php
                                					$nodessss=get_free_nodes_geneology_pos($nodesss[0]->HRM_ID,5,1);
                                					
                                					if(!empty($nodessss)){
                        						?>
                        					    <li>
                        					        <div>
                        								<a href="javascript:void(0)" id="level-1" data-html="true"  data-toggle="tooltip" data-placement="bottom" title="User Id : <?php echo $nodessss[0]->HRM_ID; ?> <br> Name : <?php echo get_hrm_postmeta($nodessss[0]->HRM_ID,'first_name'); ?> <br> Sponsor Id : <?php echo get_added_by_free($nodessss[0]->HRM_ID); ?>"  class="red-tooltip">
                        									<?php $arr=get_hrm_post($nodessss[0]->HRM_ID); 
                            							    if($arr[0]->HRM_STATUS==1){
                            							        $stats='active.png';
                            							    }else{
                            							        $stats='active.png';
                            							    } ?>
                        									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $nodesss[0]->HRM_ID; ?>" id= "<?php echo $nodesss[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodesss[0]->HRM_ID; ?>",event);' > 
                        									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;"><i class="fa fa-user"></i> User Id : <?php echo $nodessss[0]->HRM_ID; ?><br><i class="fa fa-user"></i> Name : <?php echo get_hrm_postmeta($nodessss[0]->HRM_ID,'first_name'); ?><br></div>
                        								    <div class="tree_downline_arrow" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodessss[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodessss[0]->HRM_ID; ?>",event);'/></a></div>
                        								</a>
                        							</div>
                        					    </li>
                        					    <?php } else { ?>
                        					    <li>
                        							<div>
                        								<a href="<?php echo base_url(); ?>admin/register" target="_blank">
                        								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
                        									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">No Member</div>
                        								</a>
                        							</div>
                        						</li>
                        					    <?php } ?>
                        					</ul>
                					    </li>
                					    <?php } else { ?>
                					    <li>
                							<div>
                								<a href="<?php echo base_url(); ?>admin/register" target="_blank">
                								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
                									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">No Member</div>
                								</a>
                							</div>
                						</li>
                					    <?php } ?>
                					</ul>
        					    </li>
        					     <?php } else { ?>
        					    <li>
        							<div>
        								<a href="<?php echo base_url(); ?>admin/register" target="_blank">
        								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
        									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">No Member</div>
        								</a>
        							</div>
        						</li>
        					    <?php } ?>
        					 </ul>
					    </li>
					    <?php } else { ?>
					    <li>
							<div>
								<a href="<?php echo base_url(); ?>admin/register" target="_blank">
								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">No Member</div>
								</a>
							</div>
						</li>
					    <?php } ?>
					</ul>
				</li>
			</ul>
			<div id="tree" class="orgChart"></div>
		</div>
		<?php
		die();
	}
	public function single_tree()
	{
		$hrm_id=$_POST['user_id'];
		?>
		<div class="col-md-12 text-center">
			<ul id="tree_view" style="display:none">
			    
		       <li>
					<div>
						<a href="javascript:void(0)" id="level-0" data-html="true"  data-toggle="tooltip" data-placement="bottom" title="User id :<?php echo $hrm_id; ?> <br> Name : <?php echo get_hrm_postmeta($hrm_id,'first_name'); ?> <br> Sponsor Id : <?php echo get_added_by($hrm_id); ?>" class="red-tooltip">
							<?php if($hrm_id!=$this->session->userdata('userid')){ ?>
							<img class="tree_up_icon" src="<?php echo base_url(); ?>assets/img/up.png" alt="<?php echo get_reverse_parent_hrms_lev_0($hrm_id,1); ?>" onclick='getGenologyTree("<?php echo get_reverse_parent_hrms_lev_0($hrm_id,1); ?>",event);'/>
							<?php } $arr=get_hrm_post($hrm_id); 
							    if($arr[0]->HRM_STATUS==1){
							        $stat='active.png';
							    }else{
							        $stat='inactive.png';
							    }
							    
							?>
							<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stat; ?>" alt="<?php echo get_reverse_parent_hrms_lev_0($hrm_id,1); ?>" id="<?php echo $hrm_id; ?>"> 
							<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;"><i class="fa fa-user"></i> User id :<?php echo $hrm_id; ?><br><i class="fa fa-user"></i> Name : <?php echo get_hrm_postmeta($hrm_id,'first_name'); ?><br><i class="fa fa-user"></i> Total Members : <?php echo $count_nodes=get_member_nodes($hrm_id,1); ?></div>
						</a>
					</div>
				    <ul>
				        <?php
        					$nodes=get_nodes_geneology_pos($hrm_id,5,1);
        					
        					if(!empty($nodes)){
						?>
					    <li>
					        <div>
								<a href="javascript:void(0)" id="level-1" data-html="true"  data-toggle="tooltip" data-placement="bottom" title="User Id : <?php echo $nodes[0]->HRM_ID; ?> <br> Name : <?php echo get_hrm_postmeta($nodes[0]->HRM_ID,'first_name'); ?> <br> Sponsor Id : <?php echo get_added_by($nodes[0]->HRM_ID); ?>"  class="red-tooltip">
									<?php $arr=get_hrm_post($nodes[0]->HRM_ID); 
    							    if($arr[0]->HRM_STATUS==1){
    							        $stats='active.png';
    							    }else{
    							        $stats='inactive.png';
    							    } ?>
									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $hrm_id; ?>" id= "<?php echo $hrm_id; ?>" onclick='getGenologyTree("<?php echo $hrm_id; ?>",event);' > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;"><i class="fa fa-user"></i> User Id : <?php echo $nodes[0]->HRM_ID; ?><br><i class="fa fa-user"></i> Name : <?php echo get_hrm_postmeta($nodes[0]->HRM_ID,'first_name'); ?><br><i class="fa fa-user"></i> Total Members : <?php echo $count_nodes=get_member_nodes($nodes[0]->HRM_ID,1); ?></div>
								</a>
							</div>
        					<ul>
        					    <?php
                					$nodess=get_nodes_geneology_pos($nodes[0]->HRM_ID,5,1);
                					
                					if(!empty($nodess)){
        						?>
        					    <li>
        					        <div>
        								<a href="javascript:void(0)" id="level-1" data-html="true"  data-toggle="tooltip" data-placement="bottom" title="User Id : <?php echo $nodess[0]->HRM_ID; ?> <br> Name : <?php echo get_hrm_postmeta($nodess[0]->HRM_ID,'first_name'); ?> <br> Sponsor Id : <?php echo get_added_by($nodess[0]->HRM_ID); ?>"  class="red-tooltip">
        									<?php $arr=get_hrm_post($nodess[0]->HRM_ID); 
            							    if($arr[0]->HRM_STATUS==1){
            							        $stats='active.png';
            							    }else{
            							        $stats='inactive.png';
            							    } ?>
        									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $nodes[0]->HRM_ID; ?>" id= "<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);' > 
        									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;"><i class="fa fa-user"></i> User Id : <?php echo $nodess[0]->HRM_ID; ?><br><i class="fa fa-user"></i> Name : <?php echo get_hrm_postmeta($nodess[0]->HRM_ID,'first_name'); ?><br><i class="fa fa-user"></i> Total Members : <?php echo $count_nodes=get_member_nodes($nodess[0]->HRM_ID,1); ?></div>
        								</a>
        							</div>
                					<ul>
                					    <?php
                        					$nodesss=get_nodes_geneology_pos($nodess[0]->HRM_ID,5,1);
                        					
                        					if(!empty($nodesss)){
                						?>
                					    <li>
                					        <div>
                								<a href="javascript:void(0)" id="level-1" data-html="true"  data-toggle="tooltip" data-placement="bottom" title="User Id : <?php echo $nodesss[0]->HRM_ID; ?> <br> Name : <?php echo get_hrm_postmeta($nodesss[0]->HRM_ID,'first_name'); ?> <br> Sponsor Id : <?php echo get_added_by($nodesss[0]->HRM_ID); ?>"  class="red-tooltip">
                									<?php $arr=get_hrm_post($nodesss[0]->HRM_ID); 
                    							    if($arr[0]->HRM_STATUS==1){
                    							        $stats='active.png';
                    							    }else{
                    							        $stats='inactive.png';
                    							    } ?>
                									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $nodess[0]->HRM_ID; ?>" id= "<?php echo $nodess[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodess[0]->HRM_ID; ?>",event);' > 
                									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;"><i class="fa fa-user"></i> User Id : <?php echo $nodesss[0]->HRM_ID; ?><br><i class="fa fa-user"></i> Name : <?php echo get_hrm_postmeta($nodesss[0]->HRM_ID,'first_name'); ?><br><i class="fa fa-user"></i> Total Members : <?php echo $count_nodes=get_member_nodes($nodesss[0]->HRM_ID,1); ?></div>
                								</a>
                							</div>
                        					<ul>
                        					    <?php
                                					$nodessss=get_nodes_geneology_pos($nodesss[0]->HRM_ID,5,1);
                                					
                                					if(!empty($nodessss)){
                        						?>
                        					    <li>
                        					        <div>
                        								<a href="javascript:void(0)" id="level-1" data-html="true"  data-toggle="tooltip" data-placement="bottom" title="User Id : <?php echo $nodessss[0]->HRM_ID; ?> <br> Name : <?php echo get_hrm_postmeta($nodessss[0]->HRM_ID,'first_name'); ?> <br> Sponsor Id : <?php echo get_added_by($nodessss[0]->HRM_ID); ?>"  class="red-tooltip">
                        									<?php $arr=get_hrm_post($nodessss[0]->HRM_ID); 
                            							    if($arr[0]->HRM_STATUS==1){
                            							        $stats='active.png';
                            							    }else{
                            							        $stats='inactive.png';
                            							    } ?>
                        									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $nodesss[0]->HRM_ID; ?>" id= "<?php echo $nodesss[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodesss[0]->HRM_ID; ?>",event);' > 
                        									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;"><i class="fa fa-user"></i> User Id : <?php echo $nodessss[0]->HRM_ID; ?><br><i class="fa fa-user"></i> Name : <?php echo get_hrm_postmeta($nodessss[0]->HRM_ID,'first_name'); ?><br><i class="fa fa-user"></i> Total Members : <?php echo $count_nodes=get_member_nodes($nodessss[0]->HRM_ID,1); ?></div>
                        								    <div class="tree_downline_arrow" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodessss[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodessss[0]->HRM_ID; ?>",event);'/></a></div>
                        								</a>
                        							</div>
                        					    </li>
                        					    <?php } else { ?>
                        					    <li>
                        							<div>
                        								<a href="<?php echo base_url(); ?>admin/register" target="_blank">
                        								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
                        									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">No Member</div>
                        								</a>
                        							</div>
                        						</li>
                        					    <?php } ?>
                        					</ul>
                					    </li>
                					    <?php } else { ?>
                					    <li>
                							<div>
                								<a href="<?php echo base_url(); ?>admin/register" target="_blank">
                								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
                									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">No Member</div>
                								</a>
                							</div>
                						</li>
                					    <?php } ?>
                					</ul>
        					    </li>
        					     <?php } else { ?>
        					    <li>
        							<div>
        								<a href="<?php echo base_url(); ?>admin/register" target="_blank">
        								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
        									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">No Member</div>
        								</a>
        							</div>
        						</li>
        					    <?php } ?>
        					 </ul>
					    </li>
					    <?php } else { ?>
					    <li>
							<div>
								<a href="<?php echo base_url(); ?>admin/register" target="_blank">
								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">No Member</div>
								</a>
							</div>
						</li>
					    <?php } ?>
					</ul>
				</li>
			</ul>
			<div id="tree" class="orgChart"></div>
		</div>
		<?php
		die();
	}
	public function autopool()
	{
		$hrm_id=$_POST['user_id'];
		if($_POST['mlmdesc']==3){
	        $levelstr='level';
	    }else{
	        $levelstr='autopoollevel';
	    }
		?>
		
		<div class="col-md-12 text-center">
			<ul id="tree_view" style="display:none">
			    
				<li>
					<div>
						<a href="javascript:void(0)" id="level-0" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($hrm_id!=5000 && $_POST['mlmdesc']==3) { $ar=get_member_three($hrm_id); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($hrm_id,1,$_POST['mlmdesc']); } ?>">
							<?php if($hrm_id!=$this->session->userdata('userid')){ ?>
							<img class="tree_up_icon" src="<?php echo base_url(); ?>assets/img/up.png" alt="<?php echo get_reverse_parent_hrms_lev_0($hrm_id,$_POST['mlmdesc']); ?>" onclick='getGenologyTree("<?php echo get_reverse_parent_hrms_lev_0($hrm_id,$_POST['mlmdesc']); ?>",event);'/>
							<?php } $arr=get_hrm_post($hrm_id); 
							    if($arr[0]->HRM_STATUS==1){
							        $stat='active.png';
							    }else{
							        $stat='inactive.png';
							    }
							    
							?>
							<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stat; ?>" alt="<?php echo get_reverse_parent_hrms_lev_0($hrm_id,$_POST['mlmdesc']); ?>" id="<?php echo $hrm_id; ?>"> 
							<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User id :<?php echo $hrm_id; ?><br>Name : <?php echo get_hrm_postmeta($hrm_id,'first_name'); ?><?php if($hrm_id!=5000){ ?><br> Sponsor Id : <?php echo get_added_by($hrm_id); ?><?php } ?></div>
						</a>
					</div>
					
					<ul>
					<?php
					$nodes=get_nodes_geneology_pos($hrm_id,1,$_POST['mlmdesc']);
					
					if(!empty($nodes)){
						?>
						<li>
							<div>
								<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==5) { $ar=get_member_three($nodes[0]->HRM_ID); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodes[0]->HRM_ID,1,$_POST['mlmdesc']); } ?>">
									<?php $arr=get_hrm_post($nodes[0]->HRM_ID); 
    							    if($arr[0]->HRM_STATUS==1){
    							        $stats='active.png';
    							    }else{
    							        $stats='inactive.png';
    							    } ?>
									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $hrm_id; ?>" id= "<?php echo $hrm_id; ?>" onclick='getGenologyTree("<?php echo $hrm_id; ?>",event);' > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodes[0]->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodes[0]->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodes[0]->HRM_ID); ?></div>
								</a>
							</div>
							<ul>
								<?php
									$nodess=get_nodes_geneology_pos($nodes[0]->HRM_ID,1,$_POST['mlmdesc']);
									if(!empty($nodess)){
										?>
										<li>
											<div>
												<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==3) { $ar=get_member_three($nodess[0]->HRM_ID); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodess[0]->HRM_ID,1,$_POST['mlmdesc']); } ?>">
														<?php $arr=get_hrm_post($nodess[0]->HRM_ID); 
                            							    if($arr[0]->HRM_STATUS==1){
                            							        $statss='active.png';
                            							    }else{
                            							        $statss='inactive.png';
                            							    } 
                            							 ?>
													<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $statss; ?>" alt="<?php echo $nodes[0]->HRM_ID; ?>" id= "<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);' > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodess[0]->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodess[0]->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodess[0]->HRM_ID); ?></div>
													<div class="tree_downline_arrow" style="  width: 100px;" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);'/></a></div>
												</a>
											</div>
										</li>
										<?php
									}else{
										?>
										<li>
											<div>
												<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $nodes[0]->HRM_ID; ?>/<?php echo '1'; ?>" target="_blank">
												<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
												</a>
											</div>
										</li>
										<?php
									}
									$nodess=get_nodes_geneology_pos($nodes[0]->HRM_ID,2,$_POST['mlmdesc']);
									if(!empty($nodess)){
										?>
										<li>
											<div>
												<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==5) { $ar=get_member_three($nodess[0]->HRM_ID); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodess[0]->HRM_ID,1,$_POST['mlmdesc']); } ?>">
													<?php $arr=get_hrm_post($nodess[0]->HRM_ID); 
                            							    if($arr[0]->HRM_STATUS==1){
                            							        $statss='active.png';
                            							    }else{
                            							        $statss='inactive.png';
                            							    } 
                            						?>
													<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $statss; ?>" alt="<?php echo $nodes[0]->HRM_ID; ?>" id= "<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);' > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodess[0]->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodess[0]->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodess[0]->HRM_ID); ?></div>
													<div class="tree_downline_arrow" style="  width: 100px;" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);'/></a></div>
												</a>
											</div>
										</li>
										<?php
									}else{
										?>
										<li>
											<div>
												<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $nodes[0]->HRM_ID; ?>/<?php echo '2'; ?>" target="_blank">
												<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
												</a>
											</div>
										</li>
										<?php
									}
								?>
							</ul>
						</li>
						<?php
					}else{
						?>
						<li>
							<div>
								<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $hrm_id; ?>/<?php echo '1'; ?>" target="_blank">
								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
									
								</a>
							</div>
						</li>
						<?php						
					}
					if($hrm_id!=5000){
					$nodes=get_nodes_geneology_pos($hrm_id,2,$_POST['mlmdesc']);
					if(!empty($nodes)){
						?>
						<li>
							<div>
								<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==5) { $ar=get_member_three($nodes[0]->HRM_ID); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodes[0]->HRM_ID,1,$_POST['mlmdesc']); } ?>">
									<?php $arr=get_hrm_post($nodes[0]->HRM_ID); 
    							    if($arr[0]->HRM_STATUS==1){
    							        $stats='active.png';
    							    }else{
    							        $stats='inactive.png';
    							    } ?>
									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $hrm_id; ?>" id= "<?php echo $hrm_id; ?>" onclick='getGenologyTree("<?php echo $hrm_id; ?>",event);' > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodes[0]->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodes[0]->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodes[0]->HRM_ID); ?></div>
								</a>
							</div>
							<ul>
								<?php
									$nodess=get_nodes_geneology_pos($nodes[0]->HRM_ID,1,$_POST['mlmdesc']);
									if(!empty($nodess)){
										?>
										<li>
											<div>
												<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php $ar=get_member_three($nodess[0]->HRM_ID); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodess[0]->HRM_ID,1,$_POST['mlmdesc']); ?>">
													<?php $arr=get_hrm_post($nodess[0]->HRM_ID); 
                            							    if($arr[0]->HRM_STATUS==1){
                            							        $statss='active.png';
                            							    }else{
                            							        $statss='inactive.png';
                            							    } 
                            						?>
													<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $statss; ?>" alt="<?php echo $nodes[0]->HRM_ID; ?>" id= "<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);' > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodess[0]->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodess[0]->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodess[0]->HRM_ID); ?></div>
													<div class="tree_downline_arrow" style="  width: 100px;" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);'/></a></div>
												</a>
											</div>
										</li>
										<?php
									}else{
										?>
										<li>
											<div>
												<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $nodes[0]->HRM_ID; ?>/<?php echo '1'; ?>" target="_blank">
												<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
												</a>
											</div>
										</li>
										<?php
									}
									$nodess=get_nodes_geneology_pos($nodes[0]->HRM_ID,2,$_POST['mlmdesc']);
									if(!empty($nodess)){
										?>
										<li>
											<div>
												<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==5) { $ar=get_member_three($nodess[0]->HRM_ID); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodess[0]->HRM_ID,1,$_POST['mlmdesc']); } ?>">
													<?php $arr=get_hrm_post($nodess[0]->HRM_ID); 
                            							    if($arr[0]->HRM_STATUS==1){
                            							        $statss='active.png';
                            							    }else{
                            							        $statss='inactive.png';
                            							    } 
                            						?>
													<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $statss; ?>" alt="<?php echo $nodes[0]->HRM_ID; ?>" id= "<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);' > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodess[0]->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodess[0]->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodess[0]->HRM_ID); ?></div>
													<div class="tree_downline_arrow" style="  width: 100px;" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);'/></a></div>
												</a>
											</div>
										</li>
										<?php
									}else{
										?>
										<li>
											<div>
												<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $nodes[0]->HRM_ID; ?>/<?php echo '2'; ?>" target="_blank">
												<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
												</a>
											</div>
										</li>
										<?php
									}
									
								?>
							</ul>
						</li>
						<?php
					}else{
						?>
						<li>
							<div>
								<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $hrm_id; ?>/<?php echo '2'; ?>" target="_blank">
								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
								</a>
							</div>
						</li>
						<?php	
					}
				
					}
					?>
					</ul>
				</li>
			</ul>
			<div id="tree" class="orgChart"></div>
		</div>
		<?php
		die();
	}
	public function tree()
	{
		$hrm_id=$_POST['user_id'];
		if($_POST['mlmdesc']==3){
	        $levelstr='level';
	    }else{
	        $levelstr='autopoollevel';
	    }
		?>
		<div class="col-md-12 text-center">
			<ul id="tree_view" style="display:none">
			    
				<li>
					<div>
						<a href="javascript:void(0)" id="level-0" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($hrm_id!=5000 && $_POST['mlmdesc']==3) { $ar=get_member_three($hrm_id); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($hrm_id,1,$_POST['mlmdesc']); } ?>">
							<?php if($hrm_id!=$this->session->userdata('userid')){ ?>
							<img class="tree_up_icon" src="<?php echo base_url(); ?>assets/img/up.png" alt="<?php echo get_reverse_parent_hrms_lev_0($hrm_id,$_POST['mlmdesc']); ?>" onclick='getGenologyTree("<?php echo get_reverse_parent_hrms_lev_0($hrm_id,$_POST['mlmdesc']); ?>",event);'/>
							<?php } $arr=get_hrm_post($hrm_id); 
							    if($arr[0]->HRM_STATUS==1){
							        $stat='active.png';
							    }else{
							        $stat='inactive.png';
							    }
							    
							?>
							<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stat; ?>" alt="<?php echo get_reverse_parent_hrms_lev_0($hrm_id,$_POST['mlmdesc']); ?>" id="<?php echo $hrm_id; ?>"> 
							<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User id :<?php echo $hrm_id; ?><br>Name : <?php echo get_hrm_postmeta($hrm_id,'first_name'); ?><?php if($hrm_id!=5000){ ?><br> Sponsor Id : <?php echo get_added_by($hrm_id); ?><?php } ?></div>
						</a>
					</div>
					<?php if($hrm_id!=5000) { ?>
					<ul>
					<?php
					$nodes=get_nodes_geneology_pos($hrm_id,1,$_POST['mlmdesc']);
					
					if(!empty($nodes)){
						?>
						<li>
							<div>
								<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==3) { $ar=get_member_three($nodes[0]->HRM_ID); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodes[0]->HRM_ID,1,$_POST['mlmdesc']); } ?>">
									<?php $arr=get_hrm_post($nodes[0]->HRM_ID); 
    							    if($arr[0]->HRM_STATUS==1){
    							        $stats='active.png';
    							    }else{
    							        $stats='inactive.png';
    							    } ?>
									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $hrm_id; ?>" id= "<?php echo $hrm_id; ?>" onclick='getGenologyTree("<?php echo $hrm_id; ?>",event);' > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodes[0]->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodes[0]->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodes[0]->HRM_ID); ?></div>
								</a>
							</div>
							<ul>
								<?php
									$nodess=get_nodes_geneology_pos($nodes[0]->HRM_ID,1,$_POST['mlmdesc']);
									if(!empty($nodess)){
										?>
										<li>
											<div>
												<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==3) { $ar=get_member_three($nodess[0]->HRM_ID); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodess[0]->HRM_ID,1,$_POST['mlmdesc']); } ?>">
														<?php $arr=get_hrm_post($nodess[0]->HRM_ID); 
                            							    if($arr[0]->HRM_STATUS==1){
                            							        $statss='active.png';
                            							    }else{
                            							        $statss='inactive.png';
                            							    } 
                            							 ?>
													<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $statss; ?>" alt="<?php echo $nodes[0]->HRM_ID; ?>" id= "<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);' > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodess[0]->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodess[0]->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodess[0]->HRM_ID); ?></div>
													<div class="tree_downline_arrow" style="  width: 100px;" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);'/></a></div>
												</a>
											</div>
										</li>
										<?php
									}else{
										?>
										<li>
											<div>
												<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $nodes[0]->HRM_ID; ?>/<?php echo '1'; ?>" target="_blank">
												<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
												</a>
											</div>
										</li>
										<?php
									}
									$nodess=get_nodes_geneology_pos($nodes[0]->HRM_ID,2,$_POST['mlmdesc']);
									if(!empty($nodess)){
										?>
										<li>
											<div>
												<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==3) { $ar=get_member_three($nodess[0]->HRM_ID); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodess[0]->HRM_ID,1,$_POST['mlmdesc']); } ?>">
													<?php $arr=get_hrm_post($nodess[0]->HRM_ID); 
                            							    if($arr[0]->HRM_STATUS==1){
                            							        $statss='active.png';
                            							    }else{
                            							        $statss='inactive.png';
                            							    } 
                            						?>
													<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $statss; ?>" alt="<?php echo $nodes[0]->HRM_ID; ?>" id= "<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);' > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodess[0]->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodess[0]->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodess[0]->HRM_ID); ?></div>
													<div class="tree_downline_arrow" style="  width: 100px;" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);'/></a></div>
												</a>
											</div>
										</li>
										<?php
									}else{
										?>
										<li>
											<div>
												<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $nodes[0]->HRM_ID; ?>/<?php echo '2'; ?>" target="_blank">
												<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
												</a>
											</div>
										</li>
										<?php
									}
								?>
							</ul>
						</li>
						<?php
					}else{
						?>
						<li>
							<div>
								<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $hrm_id; ?>/<?php echo '1'; ?>" target="_blank">
								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
									
								</a>
							</div>
						</li>
						<?php						
					}
					if($hrm_id!=5000){
					$nodes=get_nodes_geneology_pos($hrm_id,2,$_POST['mlmdesc']);
					if(!empty($nodes)){
						?>
						<li>
							<div>
								<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==3) { $ar=get_member_three($nodes[0]->HRM_ID); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodes[0]->HRM_ID,1,$_POST['mlmdesc']); } ?>">
									<?php $arr=get_hrm_post($nodes[0]->HRM_ID); 
    							    if($arr[0]->HRM_STATUS==1){
    							        $stats='active.png';
    							    }else{
    							        $stats='inactive.png';
    							    } ?>
									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $hrm_id; ?>" id= "<?php echo $hrm_id; ?>" onclick='getGenologyTree("<?php echo $hrm_id; ?>",event);' > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodes[0]->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodes[0]->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodes[0]->HRM_ID); ?></div>
								</a>
							</div>
							<ul>
								<?php
									$nodess=get_nodes_geneology_pos($nodes[0]->HRM_ID,1,$_POST['mlmdesc']);
									if(!empty($nodess)){
										?>
										<li>
											<div>
												<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php $ar=get_member_three($nodess[0]->HRM_ID); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodess[0]->HRM_ID,1,$_POST['mlmdesc']); ?>">
													<?php $arr=get_hrm_post($nodess[0]->HRM_ID); 
                            							    if($arr[0]->HRM_STATUS==1){
                            							        $statss='active.png';
                            							    }else{
                            							        $statss='inactive.png';
                            							    } 
                            						?>
													<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $statss; ?>" alt="<?php echo $nodes[0]->HRM_ID; ?>" id= "<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);' > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodess[0]->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodess[0]->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodess[0]->HRM_ID); ?></div>
													<div class="tree_downline_arrow" style="  width: 100px;" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);'/></a></div>
												</a>
											</div>
										</li>
										<?php
									}else{
										?>
										<li>
											<div>
												<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $nodes[0]->HRM_ID; ?>/<?php echo '1'; ?>" target="_blank">
												<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
												</a>
											</div>
										</li>
										<?php
									}
									$nodess=get_nodes_geneology_pos($nodes[0]->HRM_ID,2,$_POST['mlmdesc']);
									if(!empty($nodess)){
										?>
										<li>
											<div>
												<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==3) { $ar=get_member_three($nodess[0]->HRM_ID); 
        				    $ar=json_decode($ar); ?>
        				    LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodess[0]->HRM_ID,1,$_POST['mlmdesc']); } ?>">
													<?php $arr=get_hrm_post($nodess[0]->HRM_ID); 
                            							    if($arr[0]->HRM_STATUS==1){
                            							        $statss='active.png';
                            							    }else{
                            							        $statss='inactive.png';
                            							    } 
                            						?>
													<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $statss; ?>" alt="<?php echo $nodes[0]->HRM_ID; ?>" id= "<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);' > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodess[0]->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodess[0]->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodess[0]->HRM_ID); ?></div>
													<div class="tree_downline_arrow" style="  width: 100px;" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodes[0]->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes[0]->HRM_ID; ?>",event);'/></a></div>
												</a>
											</div>
										</li>
										<?php
									}else{
										?>
										<li>
											<div>
												<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $nodes[0]->HRM_ID; ?>/<?php echo '2'; ?>" target="_blank">
												<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
													<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
												</a>
											</div>
										</li>
										<?php
									}
									
								?>
							</ul>
						</li>
						<?php
					}else{
						?>
						<li>
							<div>
								<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $hrm_id; ?>/<?php echo '2'; ?>" target="_blank">
								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
								</a>
							</div>
						</li>
						<?php	
					}
				
					}
					?>
					</ul>
					<?php } else { ?>
					<ul>
					    <?php $allnodes=get_all_nodes_by_admin(); 
					        if(!empty($allnodes)){ 
					            foreach($allnodes as $nodess){
					    ?>
					    <li>
						
							<div>
								<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==3) { $ar=get_member_three($nodess->HRM_ID); 
		                                $ar=json_decode($ar); ?>
		                        LEFT : <?php echo $ar[0]; ?><br>RIGHT : <?php echo $ar[1]; ?><br>TOTAL : <?php echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodess->HRM_ID,1,$_POST['mlmdesc']); } ?>">
									<?php $arr=get_hrm_post($nodess->HRM_ID); 
            							    if($arr[0]->HRM_STATUS==1){
            							        $statss='active.png';
            							    }else{
            							        $statss='inactive.png';
            							    } 
            						?>
									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $statss; ?>" alt="<?php echo $hrm_id; ?>" id= "<?php echo $hrm_id; ?>" onclick='getGenologyTree("<?php echo $hrm_id; ?>",event);' > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">User Id : <?php echo $nodess->HRM_ID; ?><br>Name : <?php echo get_hrm_postmeta($nodess->HRM_ID,'first_name'); ?><br> Sponsor Id : <?php echo get_added_by($nodess->HRM_ID); ?></div>
									<div class="tree_downline_arrow" style="  width: 100px;" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodess->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodess->HRM_ID; ?>",event);'/></a></div>
								</a>
							</div>
						
						</li>
						<?php } } ?>
					</ul>
					<?php } ?>
				</li>
			</ul>
			<div id="tree" class="orgChart"></div>
		</div>
		<?php
		die();
	}


	public function tree_nth()
	{
		$hrm_id=$_POST['user_id'];
		if($_POST['mlmdesc']==3){
	        $levelstr='level';
	    }else{
	        $levelstr='autopoollevel';
	    }
		?>
		<div class="col-md-12 text-center">
			<ul id="tree_view" style="display:none">
			    
				<li>
					<div>
						<a href="javascript:void(0)" id="level-0" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($hrm_id!=5000 && $_POST['mlmdesc']==3) { //$ar=get_member_three($hrm_id); 
        				  //  $ar=json_decode($ar); ?>
							TOTAL : <?php //echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($hrm_id,1,$_POST['mlmdesc']); ?><br>Star Members: <?php echo get_count_star($hrm_id); ?><br>Double Star: <?php echo get_count_double_star($hrm_id);} ?>" class="blue-tooltip">
							<?php if($hrm_id!=$this->session->userdata('userid')){ ?>
							<img class="tree_up_icon" src="<?php echo base_url(); ?>assets/img/up.png" alt="<?php echo get_reverse_parent_hrms_lev_0($hrm_id,$_POST['mlmdesc']); ?>" onclick='getGenologyTree("<?php echo get_reverse_parent_hrms_lev_0($hrm_id,$_POST['mlmdesc']); ?>",event);'/>
							<?php } $arr=get_hrm_post($hrm_id); 
							    if($arr[0]->HRM_STATUS==1){
							        $stat='active.png';
							    }else{
							        $stat='inactive.png';
								}
								
								if(get_hrm_postmeta($hrm_id,'star')==1){
									$stat='star.png';
								}
								if(get_hrm_postmeta($hrm_id,'double_star')==1){
									$stat='double.png';
								}
							    
							?>
							<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stat; ?>" alt="<?php echo get_reverse_parent_hrms_lev_0($hrm_id,$_POST['mlmdesc']); ?>" id="<?php echo $hrm_id; ?>"> 
							<div class="username" title=" "  data-placement="bottom" > <?php echo get_hrm_postmeta($hrm_id,'first_name'); ?><br>(<?php echo $hrm_id; ?>)</div>

						</a>
					</div>
					<?php if($hrm_id!=5000) { ?>
					<ul>
					<?php
					$nodess=get_nodes_geneology_pos($hrm_id,1,$_POST['mlmdesc']);
					
					if(!empty($nodess)){
						foreach($nodess as $nodes){
						?>
						<li>
							<div>
								<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==3) { //$ar=get_member_three($nodes->HRM_ID); 
        				    //$ar=json_decode($ar); ?>
							TOTAL : <?php //echo $ar[0]+$ar[1]; ?><br>DIRECT : <?php echo get_own_count_nodes($nodes->HRM_ID,1,$_POST['mlmdesc']); ?><br>Star Members : <?php echo get_count_star($nodes->HRM_ID);?><br>Double Star : <?php echo get_count_double_star($nodes->HRM_ID);} ?>" class="blue-tooltip">
									<?php $arr=get_hrm_post($nodes->HRM_ID); 
    							    if($arr[0]->HRM_STATUS==1){
    							        $stats='active.png';
    							    }else{
    							        $stats='inactive.png';
									} 
									
									if(get_hrm_postmeta($nodes->HRM_ID,'star')==1){
										$stats='star.png';
									}
									if(get_hrm_postmeta($nodes->HRM_ID,'double_star')==1){
										$stats='double.png';
									}
									
									?>
									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $stats; ?>" alt="<?php echo $hrm_id; ?>" id= "<?php echo $hrm_id; ?>" onclick='getGenologyTree("<?php echo $hrm_id; ?>",event);' > 
									<div class="username" title=" "  data-placement="bottom" > <?php echo get_hrm_postmeta($nodes->HRM_ID,'first_name'); ?><br>(<?php echo $nodes->HRM_ID; ?>)</div>

									<div class="tree_downline_arrow" style="  width: 100px;" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodes->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodes->HRM_ID; ?>",event);'/></a></div>

								</a>
							</div>
					
						</li>
						<?php
					}
					
				}else{
					?>
					<li>
						<div>
							<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $hrm_id; ?>/<?php echo '1'; ?>" target="_blank">
							<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
								<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
							</a>
						</div>
					</li>
					<?php
				}
		
					?>

			
					</ul>
					<?php } else { ?>
					<ul>
					    <?php 
					    $allnodes=get_all_nodes_by_admin(); 
					        if(!empty($allnodes)){ 
					            foreach($allnodes as $nodess){
					    ?>
					    <li>
					
							<div>
								<a href="javascript:void(0)" id="level-1" data-toggle="tooltip" data-placement="left"  data-html="true" data-title="<?php if($_POST['mlmdesc']==3) { //$ar=get_member_three($nodess->HRM_ID); 
										//$ar=json_decode($ar); 
										
										?>
		                   
								TOTAL:&nbsp&nbsp
							
								<?php //echo $ar[0]+$ar[1]; ?>
						
								&nbsp&nbspDIRECT:&nbsp&nbsp
								
								 <?php echo get_own_count_nodes($nodess->HRM_ID,1,$_POST['mlmdesc']); ?>
						
						&nbsp&nbsp Star Members:&nbsp&nbsp
						
						 <?php echo get_count_star($nodess->HRM_ID); ?>
						
						&nbsp&nbsp Double Star:&nbsp&nbsp
						
						 <?php echo get_count_double_star($nodess->HRM_ID);?>
								
								  <?php } ?>" class="blue-tooltip">
									<?php $arr=get_hrm_post($nodess->HRM_ID); 
            							    if($arr[0]->HRM_STATUS==1){
            							        $statss='active.png';
            							    }else{
            							        $statss='inactive.png';
											} 
											
											if(get_hrm_postmeta($nodess->HRM_ID,'star')==1){
												$statss='star.png';
											}
											if(get_hrm_postmeta($nodess->HRM_ID,'double_star')==1){
												$statss='double.png';
											}
            						?>
									<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/<?php echo $statss; ?>" alt="<?php echo $hrm_id; ?>" id= "<?php echo $hrm_id; ?>" onclick='getGenologyTree("<?php echo $hrm_id; ?>",event);' > 
									</a>
									<div class="username" title=" "  data-placement="bottom" > <?php echo get_hrm_postmeta($nodess->HRM_ID,'first_name'); ?><br>(<?php echo $nodess->HRM_ID; ?>)</div>
									<div class="tree_downline_arrow" style="  width: 100px;" ><a href="javascript:void(0)"><img class="" src="<?php echo  base_url(); ?>assets/img/down.png" alt="<?php echo $nodess->HRM_ID; ?>" onclick='getGenologyTree("<?php echo $nodess->HRM_ID; ?>",event);'/></a></div>
								
							</div>
						
						</li>
						<?php } }else{
						?>
						<li>
							<div>
								<a href="<?php echo base_url(); ?>admin/register/no/<?php echo $hrm_id; ?>/<?php echo '2'; ?>" target="_blank">
								<img class="tree_icon" src="<?php echo base_url(); ?>assets/img/add.png" alt="" id= ""  > 
									<div class="username" title=" "  data-placement="bottom" style="background: #454552 !important;">Add Member</div>
								</a>
							</div>
						</li>
						<?php	
					}
						
						?>
					</ul>
					<?php } ?>
				</li>
			</ul>
			<div id="tree" class="orgChart"></div>
		</div>
		<?php
		die();
	}
	public function memberregister2()
	{
		date_default_timezone_set('Asia/Calcutta'); 
		$this->db->trans_start();
		$result=0;
		$firstname=ucwords($_POST['firstname']);
		$lastname=ucwords($_POST['lastname']);
		//$fathername=ucwords($_POST['fathername']);
		//$nmfirstname=ucwords($_POST['nmfirstname']);
		//$nmlastname=ucwords($_POST['nmlastname']);
		//$nmaddress=ucwords($_POST['nmaddress']);
		//$nmrelation=ucwords($_POST['nmrelation']);
		//$mothername=ucwords($_POST['mothername']);
		//$bckdate=$_POST['bckdate'];
		$desiredid=strtoupper($_POST['desiredid']);
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		//$wphone=$_POST['wphone'];
		$aadhar=$_POST['aadhar'];
		$gender=$_POST['gender'];
		//$state=$_POST['state'];
		//$city=$_POST['city'];
		//$pincode=$_POST['pincode'];
		$dob=$_POST['dob'];
		$pancard=$_POST['pancard'];
		$address=$_POST['address'];
		$acno=$_POST['acno'];
		$holdername=$_POST['holdername'];
		$bank=$_POST['bank'];
		$ifsc=$_POST['ifsc'];
		$branch=$_POST['branch'];
		//$paymenttype=$_POST['paymenttype'];
		// if($paymenttype==1){
		//     $epinno=$_POST['epinno'];
		// }
		$sponserid=strtoupper($_POST['sponserid']);
		//$pack=$_POST['pack'];
		//$packprice=get_all_packs_by_id($pack);
		
		$positionid=strtoupper($_POST['positionid']);
		if(strtoupper($_POST['sponserid'])==5000){
		    $positionid=5000;
		    $pos=get_positionmax();
		}else{
			$pos=get_positionmax_member(1,$_POST['sponserid']);
		}
	    $orgpostoinid=$positionid;
	    $prev_upper_sponsor=$sponserid;
		$prev_upper_positionid=$positionid;
		$pass=md5($_POST['pass']);
		$date=date('Y-m-d h:i:s');
		
		
		$status=1;
		$orghrm='';
	//	$amt_pack=get_all_packs_by_id_full_dt($pack);
		$check=0;
		$dt=date('Y-m-d');
		$sponsor_type=$_POST['sponsor_type'];
		$check_sponsor=	$sponserid;
		$get_left_right='';
		$check=1;
	    // if($paymenttype==1){
        // 	if(check_pinno($epinno,$pack,$sponserid)==1){
        // 	    $check=1;
        // 	    if($sponserid == 5000  || $positionid==5000){
        //     	    if(get_option('check_5000')==0){
        //     	        $check=1;
        //     	       // update_mlm_option('check_5000',1);
        //     	    }else{
        //     	        $check=3;
        //     	    }
        //     	}
        //     }else{
        // 	    $check=2;
        // 	}
	    // }else{
	    //    $check=1; 
	    // }
    	if($check==1){
		    if(check_sponsor($sponserid)==1){
		        if(check_sponsor($positionid)==1){
		           if($desiredid=='' || check_sponsor($desiredid)!=1){
		               $hrm_id="RM".create_hrm_id();
					   $orghrm=$hrm_id;
					   $bckdate=date('Y-m-d');
    		            $id=insert_hrm($hrm_id,$firstname." ".$lastname,$date,$status,$pass,$bckdate,$desiredid);
            			if($id>0){
            			   
            			    update_hrmpost_meta($hrm_id,'first_name',$firstname);
            				update_hrmpost_meta($hrm_id,'last_name',$lastname);
            				update_hrmpost_meta($hrm_id,'father_name','');
            				update_hrmpost_meta($hrm_id,'mother_name','');
            				update_hrmpost_meta($hrm_id,'email',$email);
            				update_hrmpost_meta($hrm_id,'gender',$gender);
            				update_hrmpost_meta($hrm_id,'contact',$phone);
            				update_hrmpost_meta($hrm_id,'whatsap_contact','');
            				update_hrmpost_meta($hrm_id,'state','');
            				update_hrmpost_meta($hrm_id,'city','');
            				update_hrmpost_meta($hrm_id,'pin_code','');
            				update_hrmpost_meta($hrm_id,'dob',$dob);
            				update_hrmpost_meta($hrm_id,'pancard',$pancard);
            				update_hrmpost_meta($hrm_id,'aadhar',$aadhar);
            				update_hrmpost_meta($hrm_id,'address',$address);
            				update_hrmpost_meta($hrm_id,'img',get_option('default_img'));
            				update_hrmpost_meta($hrm_id,'password',$_POST['pass']);
            				
            				update_hrmpost_meta($hrm_id,'ac_no',$acno);
            				update_hrmpost_meta($hrm_id,'ac_holder_name',$holdername);
            				update_hrmpost_meta($hrm_id,'bank_id',$bank);
            				update_hrmpost_meta($hrm_id,'ifsc',$ifsc);
            				update_hrmpost_meta($hrm_id,'branch_name',$branch);
            				update_hrmpost_meta($hrm_id,'brnch_address','');
            				update_hrmpost_meta($hrm_id,'payment_type','');
            				// if($paymenttype==1){
            				//     update_hrmpost_meta($hrm_id,'pin_no',$epinno);
            				// }else{
            			    // 	update_hrmpost_meta($hrm_id,'pin_no','');
            				// }
            				update_hrmpost_meta($hrm_id,'package','');
            				update_hrmpost_meta($hrm_id,'hrm_type','2');
            				update_hrmpost_meta($hrm_id,'nmaddress','');
        				    update_hrmpost_meta($hrm_id,'nmfirstname','');
        					update_hrmpost_meta($hrm_id,'nmlastname','');
        					update_hrmpost_meta($hrm_id,'nmfathername','');
        					update_hrmpost_meta($hrm_id,'nmmothername','');
        					update_hrmpost_meta($hrm_id,'nmmob','');
        					update_hrmpost_meta($hrm_id,'nmrelation','');
        					update_hrmpost_meta($hrm_id,'level',1);
        					update_hrmpost_meta($hrm_id,'mlm_plan_desc',3);/*stage 3 matrix*/
            			    update_hrmpost_meta($hrm_id,'given_pair',0);/*stage 3 matrix*/
            			    // if($paymenttype==1){
        					//     update_epin_done_by_epinno($hrm_id,$epinno,$check_sponsor);
            			    // }
            			    
                            $msg='Dear '.$firstname. ' '.$lastname.'\nYou are successfully registered with NEW RMGM.\nYour User ID : '.$hrm_id.'\nPassword : '.$_POST['pass'].'\nFollow this link to login\n'.base_url();
            		        send_sms($phone,$msg,$hrm_id);
            		        
            		        // insert_count_nodes($hrm_id,3);
            			    // insert_count_nodes(5000,3);
            				$ledger_id=insert_ledger('ledger_'.$hrm_id);
            				// if($packprice>5000){
            				//     if($packprice==15000 || $packprice==35000){
                			// 	    $totepin=$packprice/5000;
                			// 	    $totepin=$totepin-1;
            				//     	for($p=1;$p<=$totepin;$p++){
                        	// 			$pin=create_pinno();
                        	// 			$amtid=1;
                        	// 			$status=0;
                        	// 			$epin_id=insertepin($pin,$hrm_id,$amtid,$status);
                        	// 			$msg='Dear user your have got free epin.\nEpin no:'.$pin;
                            //             send_sms($phone,$msg,$hrm_id);
                        	// 		}
                        	// 		$dt=date('Y-m-d');
                        	// 		$amt_pack=5000*$totepin;
                        	// 	    update_amount_ledger(3,(-1)*$amt_pack);
                        	// 	    update_amount_ledger(14,$amt_pack);
                            //         $crid=14;//for epin
                            //         $drid=3;/*for cash account */
                        	// 	    $particular='being epin given free to '.$firstname. ' '.$lastname.' of '.$amt_pack;
                        	// 	    insert_record_transaction($drid,$crid,$this->session->userdata('userid'),$particular,$amt_pack,$dt,$hrm_id);
            				//     }
                    		// }
            			
            				
        					// if(get_option('first_node_matrix_counter_check')==0){
			                //     $pos=1;
			                //     update_mlm_option('first_node_matrix_counter_check',1);
			                // }
            				// if($this->session->userdata('userid')){
            			    //     insert_hrm_level_track(3,1,$hrm_id,$pos,$this->session->userdata('userid'),$positionid,$sponserid);
            				// }else{
            				//     insert_hrm_level_track(3,1,$hrm_id,$pos,'5000',$positionid,$sponserid);
            				// }
            			    // if(get_hrm_type(get_hrm_postmeta($sponserid,'hrm_type')) != 'admin') {
            				//     update_hrm_count_level_own_node($sponserid,1,3);
            				//     $checkinsert=check_free_insert($sponserid);
            				//     $totalleft=get_direct_by_pos($sponserid,1);
            				//     $totalright=get_direct_by_pos($sponserid,2);
            				//     if($totalleft>$totalright){
            				//         $netpair=$totalright;
            				//     }else if($totalright>$totalleft){
            				//         $netpair=$totalleft;
            				//     }else{
            				//         $netpair=$totalleft;
            				//     }
            				//     $levelpercent=get_option('level_income');
            				//     $get_givenpair=get_hrm_postmeta($sponserid,'given_pair');
            				//     if($netpair>$get_givenpair){
            				//         $goingpair=$netpair-$get_givenpair;
            				//         for($i=1;$i<=$goingpair;$i++){
            				//             $netdirectincome=($levelpercent*5000*2)/100;
            				//             pay_commission_to_customer($sponserid,$netdirectincome,1,'0',date('Y-m-d'),1);
            				//             $get_givenpair=get_hrm_postmeta($sponserid,'given_pair');
            				//             update_hrmpost_meta($sponserid,'given_pair',$get_givenpair+1);/*stage 3 matrix*/
            				//         }
            				//     }
            				//     if(!empty($checkinsert)){
            				//         if(check_two_done($sponserid,$checkinsert[0]->DATE_TIME)==1){
            				//             //for auto pool
            				//             if(get_option('auto_pool'.$checkinsert[0]->MLM_DESC_ID)==0){
            			    //                 update_mlm_option('auto_poolid'.$checkinsert[0]->MLM_DESC_ID,$sponserid);
            			    //                 update_mlm_option('auto_pool'.$checkinsert[0]->MLM_DESC_ID,1);
            			    //             }
                    		// 		    update_hrmpost_meta($sponserid,'autopool'.$checkinsert[0]->MLM_DESC_ID.'level',1);
                    		// 		    insert_count_nodes($sponserid,$checkinsert[0]->MLM_DESC_ID);/* 5 is for autopool */
                    		// 		    insert_priority($sponserid,$checkinsert[0]->MLM_DESC_ID);
    					    //             $getpos=get_current_pos($checkinsert[0]->SPONSOR_ID,$checkinsert[0]->MLM_DESC_ID);
                            //     		$positionno=$getpos[0];
                            //             $positionid=$getpos[1];
                            //             insert_hrm_level_track($checkinsert[0]->MLM_DESC_ID,1,$sponserid,$positionno,$checkinsert[0]->ADDED_BY,$positionid,$checkinsert[0]->SPONSOR_ID);
                            //             update_priority($sponserid,$checkinsert[0]->MLM_DESC_ID);
                            //             delete_free_tracks($sponserid);
            				//         }else{
            				//             //send msg to do one more
            				//         }
            				//     }
            				//     /* for direct income */
            				    
            				//     $array=array();
    						// 	for($x=0;$hrm_id!=5000;$x++){
    						// 	    $hrm_id=get_reverse_parent_hrms($hrm_id,3);
    						// 	    if($hrm_id!=5000){
    						// 			$array[]=$hrm_id;
    									
        					// 		}
    						// 	}
    						// 	$array=array_unique($array);
    						// 	foreach($array as $sponserid){
    						// 	    $stage_level=get_hrm_postmeta($sponserid,'mlm_plan_desc');
        					// 		$stagewise_sponsor_level=get_hrm_postmeta($sponserid,'level');
    						// 	    insert_count_nodes($sponserid,$stage_level);
    						// 	    $check=get_own_count_nodes($sponserid,1,3);
    						// 	    $netcount=get_members_validnew($stagewise_sponsor_level);
    						// 	    if($stagewise_sponsor_level<=2){
        					// 		    $mainmaincheck=get_level_row_members($sponserid,$stagewise_sponsor_level);
        					// 		    if($netcount<=$mainmaincheck[0] && $check>=2){
        					// 		         if($stagewise_sponsor_level!=1){
        					// 		            $netdirectincome=($stagewise_sponsor_level*2*$levelpercent*5000)/100;
                            // 		            pay_commission_to_customer($sponserid,$netdirectincome,2,'0',date('Y-m-d'),1);
        					// 		         }        							       
                            // 				 $arr=hrm_level_track($stagewise_sponsor_level,$sponserid,$stage_level);
                            // 				 $sponsor_level=$arr[0]->LEVEL_ID+1;
                            // 				 $pos=$arr[0]->POSITION;
                            // 				 $added_by=$arr[0]->ADDED_BY;
                            // 				 $positionid=$arr[0]->POSITION_ID;
                            // 				 $sponserids_prev=$arr[0]->SPONSOR_ID;
                            // 				 update_hrmpost_meta($sponserid,'level',$stagewise_sponsor_level+1);
                            // 				 insert_hrm_level_track($stage_level,$sponsor_level,$sponserid,$pos,$added_by,$positionid,$sponserids_prev);
                            				 
                            // 				 if($sponsor_level==3){
                            // 				     insert_hrm_level_free_track(5,1,$sponserid,$pos,$added_by,$positionid,$sponserids_prev);
                            // 				 }
                            				
                            // 			}
    						// 	    }
    						// 	}
            				// }
            				$result=1; 
            			}
            			if($result>0){
            				echo $orghrm;
            				$this->db->trans_complete();
            			}else{
            			    echo 'Member not registered successfully';
            			}
		           }else{
		                echo 'Desired id is already present';
		           }
		        }else{
		            echo 'No such position id is present';
		        }
    		}else{
		    	echo 'No such sponsor id is present';
		    }
		}else{
		    if($check==2){
		    	echo 'Incorrect E-Pin entered';
		    }else if($check==4){
		        echo 'You cannot add the member under the selected position id';
		    }else if($check==5){
		        echo 'You cannot add this member in this position';
		    }
		    else{
		        echo 'Cannot use admin id for add member';
		    }
		}
		die();
	}



	public function joinedpackage()
	{
		date_default_timezone_set('Asia/Calcutta'); 
		$this->db->trans_start();
		$result=0;
		
		$sponserid=strtoupper($_POST['sponserid']);
		$pack=$_POST['pack'];
		$packprice=get_all_packs_by_id($pack);
		$positionid=strtoupper($sponserid);
		$epinno=$_POST['epinno'];
		$hrm_id=$_POST['userid'];
		

		if(strtoupper($_POST['sponserid'])==5000){
		    $positionid=5000;
		    $pos=get_positionmax();
		}else{
			$pos=get_positionmax_member(1,$_POST['sponserid']);
		}

	    $orgpostoinid=$positionid;
	    $prev_upper_sponsor=$sponserid;
		$prev_upper_positionid=$positionid;
		$date=date('Y-m-d h:i:s');
		
		
		$status=1;
		$orghrm='';
		// $amt_pack=get_all_packs_by_id_full_dt($pack);
		$check=0;
		$dt=date('Y-m-d');
		$check_sponsor=	$sponserid;
		$get_left_right='';
		$check=1;
	    if($paymenttype=1){
        	if(check_pinno($epinno,$pack,$hrm_id,$sponserid)){
        	    $check=1;
        	    if($sponserid == 5000  || $positionid==5000){
            	    // if(get_option('check_5000')==0){
            	    //     $check=1;
            	    //    // update_mlm_option('check_5000',1);
            	    // }else{
            	    //     $check=3;
            	    // }
            	}
            }else{
        	    $check=2;
        	}
	    }else{
	       $check=1; 
		}
	

		

    	if($check==1){
		    if(check_sponsor($sponserid)==1){
		        if(check_sponsor($positionid)==1){
		           if(check_sponsor($positionid)==1){
					   $orghrm=$hrm_id;
				
            			if(check_sponsor($positionid)==1){

            			    update_hrmpost_meta($hrm_id,'pin_no',$epinno);
							update_hrmpost_meta($hrm_id,'package',$pack);
						
            			    update_epin_done_by_epinno($hrm_id,$epinno,$hrm_id);
            			    update_paystatus($hrm_id, 1);
            		        
            		         insert_count_nodes($hrm_id,3);
            			     insert_count_nodes(5000,3);
            				
            			
            				
        					if(get_option('first_node_matrix_counter_check')==0){
			                    $pos=1;
			                    update_mlm_option('first_node_matrix_counter_check',1);
							}
							

            				if($this->session->userdata('userid')){
            			        insert_hrm_level_track(3,1,$hrm_id,$pos,$this->session->userdata('userid'),$positionid,$sponserid);
            				}else{
            				    insert_hrm_level_track(3,1,$hrm_id,$pos,'5000',$positionid,$sponserid);
							}

							if(get_hrm_type(get_hrm_postmeta($sponserid,'hrm_type')) != 'admin') {
								update_hrm_count_level_own_node($sponserid,1,3);
								$netpair=get_direct_by_hrm($sponserid);

						if($netpair>2){

							      if($sponserid != 5000)
								  pay_commission_to_customer($sponserid,1000,1,'0',date('Y-m-d'),1);
								  
								}else{
								  
					if($netpair==2){	
						
						$parent_level2 =get_reverse_parent_hrms_lev_0($sponserid,3);

						if($sponserid != 5000){
								 
								//  insert_autopool_track(3,1,$sponserid,$pos,$this->session->userdata('userid'),$positionid,$sponserid);
							
								            //for auto pool
								            if(get_option('auto_pool5')==0){
								                update_mlm_option('auto_poolid5',$sponserid);
								                update_mlm_option('auto_pool5',1);
								            }
										    update_hrmpost_meta($sponserid,'autopool5level',1);
										    insert_count_nodes($sponserid,5);/* 5 is for autopool */
										    insert_priority($sponserid,5);
								            $getpos=get_current_pos($sponserid,5);
								    		$positionno=$getpos[0];
								            $positionid=$getpos[1];
								            insert_hrm_level_track(5,1,$sponserid,$positionno,$sponserid,$positionid,$sponserid);
											update_priority($sponserid,5);
										}				

				   if($parent_level2 != 5000){
									pay_commission_to_customer($parent_level2,500,2,'0',date('Y-m-d'),1);
									$parent_level3 =get_reverse_parent_hrms_lev_0($parent_level2,3);

                       if($parent_level3 != 5000){
										
								pay_commission_to_customer($parent_level3,1000,3,'0',date('Y-m-d'),1);
					     	if(get_hrm_postmeta($parent_level3,'double_star') == 0){
									  
								$count_dstar = get_hrm_postmeta($parent_level3,'double_star_count');
								$count_dstar +=1;
								update_hrmpost_meta($parent_level3,'double_star_count',$count_dstar);

								if($count_dstar==4){
									update_hrmpost_meta($parent_level3,'double_star',1);
									make_double_star($parent_level3);

								}
								      
							}
							   
							
								update_hrmpost_meta($parent_level3,'star',1);
								make_star($parent_level3);
							}	


						}   

			      }
								 
                               


								}

							}    	
							

            			    // if(get_hrm_type(get_hrm_postmeta($sponserid,'hrm_type')) != 'admin') {
            				//     update_hrm_count_level_own_node($sponserid,1,3);
            				//     $checkinsert=check_free_insert($sponserid);
            				//     $totalleft=get_direct_by_pos($sponserid,1);
            				//     $totalright=get_direct_by_pos($sponserid,2);
            				//     if($totalleft>$totalright){
            				//         $netpair=$totalright;
            				//     }else if($totalright>$totalleft){
            				//         $netpair=$totalleft;
            				//     }else{
            				//         $netpair=$totalleft;
            				//     }
            				//     $levelpercent=get_option('level_income');
            				//     $get_givenpair=get_hrm_postmeta($sponserid,'given_pair');
            				//     if($netpair>$get_givenpair){
            				//         $goingpair=$netpair-$get_givenpair;
            				//         for($i=1;$i<=$goingpair;$i++){
            				//             $netdirectincome=($levelpercent*5000*2)/100;
            				//             pay_commission_to_customer($sponserid,$netdirectincome,1,'0',date('Y-m-d'),1);
            				//             $get_givenpair=get_hrm_postmeta($sponserid,'given_pair');
            				//             update_hrmpost_meta($sponserid,'given_pair',$get_givenpair+1);/*stage 3 matrix*/
            				//         }
            				//     }
            				//     if(!empty($checkinsert)){
            				//         if(check_two_done($sponserid,$checkinsert[0]->DATE_TIME)==1){
            				//             //for auto pool
            				//             if(get_option('auto_pool'.$checkinsert[0]->MLM_DESC_ID)==0){
            			    //                 update_mlm_option('auto_poolid'.$checkinsert[0]->MLM_DESC_ID,$sponserid);
            			    //                 update_mlm_option('auto_pool'.$checkinsert[0]->MLM_DESC_ID,1);
            			    //             }
                    		// 		    update_hrmpost_meta($sponserid,'autopool'.$checkinsert[0]->MLM_DESC_ID.'level',1);
                    		// 		    insert_count_nodes($sponserid,$checkinsert[0]->MLM_DESC_ID);/* 5 is for autopool */
                    		// 		    insert_priority($sponserid,$checkinsert[0]->MLM_DESC_ID);
    					    //             $getpos=get_current_pos($checkinsert[0]->SPONSOR_ID,$checkinsert[0]->MLM_DESC_ID);
                            //     		$positionno=$getpos[0];
                            //             $positionid=$getpos[1];
                            //             insert_hrm_level_track($checkinsert[0]->MLM_DESC_ID,1,$sponserid,$positionno,$checkinsert[0]->ADDED_BY,$positionid,$checkinsert[0]->SPONSOR_ID);
                            //             update_priority($sponserid,$checkinsert[0]->MLM_DESC_ID);
                            //             delete_free_tracks($sponserid);
            				//         }else{
            				//             //send msg to do one more
            				//         }
            				//     }
            				//     /* for direct income */
            				    
            				//     $array=array();
    						// 	for($x=0;$hrm_id!=5000;$x++){
    						// 	    $hrm_id=get_reverse_parent_hrms($hrm_id,3);
    						// 	    if($hrm_id!=5000){
    						// 			$array[]=$hrm_id;
    									
        					// 		}
    						// 	}
    						// 	$array=array_unique($array);
    						// 	foreach($array as $sponserid){
    						// 	    $stage_level=get_hrm_postmeta($sponserid,'mlm_plan_desc');
        					// 		$stagewise_sponsor_level=get_hrm_postmeta($sponserid,'level');
    						// 	    insert_count_nodes($sponserid,$stage_level);
    						// 	    $check=get_own_count_nodes($sponserid,1,3);
    						// 	    $netcount=get_members_validnew($stagewise_sponsor_level);
    						// 	    if($stagewise_sponsor_level<=2){
        					// 		    $mainmaincheck=get_level_row_members($sponserid,$stagewise_sponsor_level);
        					// 		    if($netcount<=$mainmaincheck[0] && $check>=2){
        					// 		         if($stagewise_sponsor_level!=1){
        					// 		            $netdirectincome=($stagewise_sponsor_level*2*$levelpercent*5000)/100;
                            // 		            pay_commission_to_customer($sponserid,$netdirectincome,2,'0',date('Y-m-d'),1);
        					// 		         }        							       
                            // 				 $arr=hrm_level_track($stagewise_sponsor_level,$sponserid,$stage_level);
                            // 				 $sponsor_level=$arr[0]->LEVEL_ID+1;
                            // 				 $pos=$arr[0]->POSITION;
                            // 				 $added_by=$arr[0]->ADDED_BY;
                            // 				 $positionid=$arr[0]->POSITION_ID;
                            // 				 $sponserids_prev=$arr[0]->SPONSOR_ID;
                            // 				 update_hrmpost_meta($sponserid,'level',$stagewise_sponsor_level+1);
                            // 				 insert_hrm_level_track($stage_level,$sponsor_level,$sponserid,$pos,$added_by,$positionid,$sponserids_prev);
                            				 
                            // 				 if($sponsor_level==3){
                            // 				     insert_hrm_level_free_track(5,1,$sponserid,$pos,$added_by,$positionid,$sponserids_prev);
                            // 				 }
                            				
                            // 			}
    						// 	    }
    						// 	}
            				// }
            				$result=1; 
            			}
            			if($result>0){
            				echo $result;
            				$this->db->trans_complete();
            			}else{
            			    echo 'Member not registered successfully';
            			}
		           }else{
		                echo 'Desired id is already present';
		           }
		        }else{
		            echo 'No such position id is present';
		        }
    		}else{
		    	echo 'No such sponsor id is present';
		    }
		}else{
		    if($check==2){
		    	echo 'Incorrect E-Pin entered';
		    }else if($check==4){
		        echo 'You cannot add the member under the selected position id';
		    }else if($check==5){
		        echo 'You cannot add this member in this position';
		    }
		    else{
		        echo 'Cannot use admin id for add member'.$check;
		    }
		}
		die();
	}
	
	
	
		public function memberregister()
	{
		date_default_timezone_set('Asia/Calcutta'); 
		$this->db->trans_start();
		$result=0;
		$firstname=ucwords($_POST['firstname']);
		$lastname=ucwords($_POST['lastname']);
		$desiredid=strtoupper($_POST['desiredid']);
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$aadhar=$_POST['aadhar'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$pancard=$_POST['pancard'];
		$address=$_POST['address'];
		$acno=$_POST['acno'];
		$holdername=$_POST['holdername'];
		$bank=$_POST['bank'];
		$ifsc=$_POST['ifsc'];
		$branch=$_POST['branch'];
		$sponserid=strtoupper($_POST['sponserid']);
		$positionid=strtoupper($_POST['positionid']);
		
		if(strtoupper($_POST['sponserid'])==5000){
		    $positionid=5000;
		    $pos=get_positionmax();
		}else{
			$pos=get_positionmax_member(1,$_POST['sponserid']);
		}
		
	    $orgpostoinid=$positionid;
	    $prev_upper_sponsor=$sponserid;
		$prev_upper_positionid=$positionid;
		$pass=md5($_POST['pass']);
		$date=date('Y-m-d h:i:s');
		
		
		$status=1;
		$orghrm='';
		$check=1;
		$dt=date('Y-m-d');
		$sponsor_type=$_POST['sponsor_type'];
		$check_sponsor=	$sponserid;
		$get_left_right='';

		// $check_email = $this->get_email($email);
		// if(json_decode($check_email)[0]['msg'] != 'ok'){
		// 	$check = 2;
		// }
		// $check_phone = $this->get_phone($phone);
		// if(json_decode($check_phone)[0]['msg'] != 'ok'){
		// 	$check = 3;
		// }
		// $check_pancard = $this->get_pancard($pancard);
		// if(json_decode($check_pancard)[0]['msg'] != 'ok'){
		// 	$check = 4;
		// }
		// $check_aadhar = $this->get_aadhar($aadhar);
		// if(json_decode($check_aadhar)[0]['msg'] != 'ok'){
		// 	$check = 5;
		// }

		// echo $check;
		// die();
	
    	if($check==1){
		    if(check_sponsor($sponserid)==1){
		        if(check_sponsor($positionid)==1){
		           if($desiredid=='' || check_sponsor($desiredid)!=1){
		               $hrm_id="RM".create_hrm_id();
					   $orghrm=$hrm_id;
					   $bckdate=date('Y-m-d');
    		            $id=insert_hrm($hrm_id,$firstname." ".$lastname,$date,$status,$pass,$bckdate,$desiredid);
            			if($id>0){
            			   
            			    update_hrmpost_meta($hrm_id,'first_name',$firstname);
            				update_hrmpost_meta($hrm_id,'last_name',$lastname);
            				update_hrmpost_meta($hrm_id,'father_name','');
            				update_hrmpost_meta($hrm_id,'mother_name','');
            				update_hrmpost_meta($hrm_id,'email',$email);
            				update_hrmpost_meta($hrm_id,'gender',$gender);
            				update_hrmpost_meta($hrm_id,'contact',$phone);
            				update_hrmpost_meta($hrm_id,'whatsap_contact','');
            				update_hrmpost_meta($hrm_id,'state','');
            				update_hrmpost_meta($hrm_id,'city','');
            				update_hrmpost_meta($hrm_id,'pin_code','');
            				update_hrmpost_meta($hrm_id,'dob',$dob);
            				update_hrmpost_meta($hrm_id,'pancard',$pancard);
            				update_hrmpost_meta($hrm_id,'aadhar',$aadhar);
            				update_hrmpost_meta($hrm_id,'address',$address);
            				update_hrmpost_meta($hrm_id,'img',get_option('default_img'));
            				update_hrmpost_meta($hrm_id,'password',$_POST['pass']);
            				
            				update_hrmpost_meta($hrm_id,'ac_no',$acno);
            				update_hrmpost_meta($hrm_id,'ac_holder_name',$holdername);
            				update_hrmpost_meta($hrm_id,'bank_id',$bank);
            				update_hrmpost_meta($hrm_id,'ifsc',$ifsc);
            				update_hrmpost_meta($hrm_id,'branch_name',$branch);
            				update_hrmpost_meta($hrm_id,'brnch_address','');
            				update_hrmpost_meta($hrm_id,'payment_type','');
            				update_hrmpost_meta($hrm_id,'pin_no','');
            		       	update_hrmpost_meta($hrm_id,'package','');
            				update_hrmpost_meta($hrm_id,'hrm_type','2');
            				update_hrmpost_meta($hrm_id,'nmaddress','');
        				    update_hrmpost_meta($hrm_id,'nmfirstname','');
        					update_hrmpost_meta($hrm_id,'nmlastname','');
        					update_hrmpost_meta($hrm_id,'nmfathername','');
        					update_hrmpost_meta($hrm_id,'nmmothername','');
        					update_hrmpost_meta($hrm_id,'nmmob','');
        					update_hrmpost_meta($hrm_id,'nmrelation','');
        					update_hrmpost_meta($hrm_id,'level',1);
        					update_hrmpost_meta($hrm_id,'mlm_plan_desc',3);
							update_hrmpost_meta($hrm_id,'given_pair',0);
							update_hrmpost_meta($hrm_id,'star',0);
							update_hrmpost_meta($hrm_id,'double_star',0);
							update_hrmpost_meta($hrm_id,'double_star_count',0);
            			    update_hrmpost_meta($hrm_id,'sponsorid',$sponserid);
            			    
                            $msg='Dear '.$firstname. ' '.$lastname.'\nYou are successfully registered with RMGM.\nYour User ID : '.$hrm_id.'\nPassword : '.$_POST['pass'].'\nFollow this link to login\n'.base_url();
							send_sms($phone,$msg,$hrm_id);
							$ledger_id=insert_ledger('ledger_'.$hrm_id);
            		 
            				$result=1; 
            			}
            			if($result>0){
            				echo $orghrm;
            				$this->db->trans_complete();
            			}else{
            			    echo 'Member not registered successfully';
            			}
		           }else{
		                echo 'Desired id is already present';
		           }
		        }else{
		            echo 'No such position id is present';
		        }
    		}else{
		    	echo 'No such sponsor id is present';
		    }
		}else{
		    if($check==2){
		    	echo 'Email already registered';
		    }else if($check==3){
		        echo 'Phone already registered';
		    }else if($check==4){
		        echo 'Pancard already registered';
		    }else if($check==5){
				echo 'Aadhar already registered';
			}
		    else{
		        echo 'Cannot use admin id for add member';
		    }
		}
		die();
	}

}
