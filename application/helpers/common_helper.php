<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    date_default_timezone_set('Asia/Calcutta'); 
    function active_mlm_plans(){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from mlm_plans mp LEFT JOIN mlm_plan_description m on m.MLM_PLAN_ID=mp.PLAN_ID where mp.STATUS='1'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
    }
    function get_all_epireq_all()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from epin_req"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}
	function get_rec_epin()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		if($ci->session->userdata('userid')){
		    $hrmid=$ci->session->userdata('userid');
		}else{
		     $hrmid=0;
		}
		$sql = "select * from epin Left Join epin_transfer_remark on epin_transfer_remark.EPIN_ID=epin.EPIN_ID where ISSUE_TO='".$hrmid."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
	}
	function get_transferred_epin(){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from epin_transfer_remark rem LEFT JOIN epin ep on ep.EPIN_ID=rem.EPIN_ID where HRM_ID='".$ci->session->userdata('userid')."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
	    if(!empty($row)){
	       return $row ;
		}else{
			return 0;
		}
	}
    function get_charges_mlm_type($id){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from mlm_charges_type m where m.CHARGE_TYPE_ID IN (".$id.")"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
    }
   
    function get_generated_epin()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from accounts where CR_ID=8 order by ID ASC"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}
    function get_charges_mlm($id){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from mlm_level_charges mp LEFT JOIN mlm_charges_type m on m.CHARGE_TYPE_ID=mp.CHARGE_TYPE_ID where mp.LEVEL_CHARGE_ID IN (".$id.")"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
    }
    function get_district($id){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from district where STATE_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
    }
    function get_mlm_stages($mlmdesc_id,$level){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from mlm_stages m LEFT JOIN level_description l on l.STAGE_ID=m.STAGE_ID where m.MLM_DESC_ID='".$mlmdesc_id."' and m.LEVELS='".$level."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
    }
    function get_rankname($mlmdesc_id,$level=""){
        $ci=& get_instance();
		$ci->load->database(); 
		if($level==""){
		    $sql = "select * from mlm_stages m LEFT JOIN level_description l on l.STAGE_ID=m.STAGE_ID where m.MLM_DESC_ID='".$mlmdesc_id."'"; 
    		$query = $ci->db->query($sql);
    		$row = $query->result();
		}else{
    		$sql = "select * from mlm_stages m LEFT JOIN level_description l on l.STAGE_ID=m.STAGE_ID where m.MLM_DESC_ID='".$mlmdesc_id."' and m.LEVELS='".$level."'"; 
    		$query = $ci->db->query($sql);
    		$row = $query->result();
		}
		if(!empty($row)){
		    return $row[0]->LEVEL_NAME;
		}else{
		    return '';
		}
    }
    function check_condition_self_other($key,$mlm_desc_id,$level){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "SELECT SUM($key) as $key from mlm_stages where STAGE_ID<=(select STAGE_ID as $key from mlm_stages where MLM_DESC_ID='".$mlm_desc_id."' and LEVELS='".$level."')"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row[0]->$key;
    }
    function get_franchisee_income(){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from franchisee_income"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
    }
    function get_hrm_post($user_id)
    {
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from hrm_post where HRM_ID='".$user_id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
    }
    function update_self_ids($user_id)
    {
    	$ci=& get_instance();
		$ci->load->database(); 
		$temp = explode(',',$user_id);
        $user_ids = "'" . implode ( "', '", $temp ) . "'";
        $sql = "update `hrm_post` set SELF_ID='".$user_id."' where HRM_ID IN (".$user_ids.")"; 
		$query = $ci->db->query($sql);
    }
    
	function get_hrm_postmeta($user_id,$key)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from hrm_post_meta where HRM_ID='".$user_id."' and HRM_KEY='".$key."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->HRM_VALUE;
		}else{
			return '';
		}
	}	
	function get_packmeta_by_key($packid,$key)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from package_meta where PACKAGE_ID='".$packid."' and HRM_KEY='".$key."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->HRM_VALUE;
		}else{
			return '';
		}
	}
	function get_packmeta($packid)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from package_meta where PACKAGE_ID='".$packid."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
		
	}
	function myplan($plan_type){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select mp.LEVELS,mp.COUNT_NODES,mp.SELF_ID,mp.OTHER_ID,m.AMOUNT,m.LEVEL_CHARGE_ID from mlm_stages mp LEFT JOIN level_description m on m.STAGE_ID=mp.STAGE_ID where MLM_DESC_ID='".$plan_type."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
	}
	function update_pass_hrms($hrm_id,$key,$pass)
	{
		$ci=& get_instance();
		$ci->load->database(); 
	    $sql = "update `hrm_post` set ".$key."='".$pass."' where HRM_ID='".$hrm_id."'"; 
		$query = $ci->db->query($sql);
	}
	function get_option($key)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from mlm_options where OPTION_KEY='".$key."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->OPTION_VALUE;
		}else{
			return '';
		}
	}

	function get_max_hrm_id()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "SELECT HRM_ID as id FROM hrm_level_tracking where MLM_DESC_ID=1 and LEVEL_ID=0 and POSITION=5 ORDER BY HRM_TRACK_ID DESC LIMIT 0,1";
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->id;
		}else{
			return '';
		}
	}
	function get_max_hrm_free_id()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "SELECT HRM_ID as id FROM hrm_free_tracking where MLM_DESC_ID=1 and LEVEL_ID=0 and POSITION=5 ORDER BY HRM_TRACK_ID DESC LIMIT 0,1";
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->id;
		}else{
			return '';
		}
	}
	function update_mlm_option($key,$value)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from mlm_options where OPTION_KEY='".$key."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			$sql = "update `mlm_options` set OPTION_VALUE='".$value."' where OPTION_KEY='".$key."'"; 
			$query = $ci->db->query($sql);
		}else{
			$sql = "INSERT INTO `mlm_options`(`OPTION_KEY`, `OPTION_VALUE`) VALUES ('".$key."','".$value."')"; 
			$query = $ci->db->query($sql);
		}
	}	
	function get_hrm_type($type_id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from hrm_type where HRM_TYPE_ID='".$type_id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->HRM_TYPE_NAME;
		}else{
			return '';
		}
	}	
	function get_account_charges($accountid)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		if($accountid!=''){
		$sql = "select * from accounts where ID IN (".$accountid.")"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		$sum=0;
		$str='';
		$newarr=array();
		if(!empty($row)){
			foreach($row as $r){
			    	$sql = "select * from accounting_ledgers where ID IN (".$r->CR_ID.")"; 
            		$query = $ci->db->query($sql);
            		$row = $query->result();
            		$str.=$row[0]->NAME." [ ".$r->AMOUNT." ]<br>";
            		$sum+=$r->AMOUNT;
			}
			$newarr[0]=$str;
			$newarr[1]=$sum;
			return $newarr;
		}else{
			return '';
		}
		}else{
		    return '';
		}
	}	
	function deleteepinreq($reqid)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `epin_req` set REQUEST_STATUS='0', DELETED_TIME='".date('Y-m-d H:i:s')."' where EPIN_REQ_ID='".$reqid."'"; 
		$query = $ci->db->query($sql);
	}
	function deleteepin($pinid)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `epin` set 	EPIN_STATUS='2' where EPIN_ID='".$pinid."'"; 
		$query = $ci->db->query($sql);
	}
	function get_epin_req_by_id($reqid)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from epin_req where EPIN_REQ_ID='".$reqid."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->MOBILE_NO;
		}else{
			return '';
		}
	}
	function get_all_epin($epin_status)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		if($ci->session->userdata('hrmtype') == 'admin') {
			$sql = "select * from epin where EPIN_STATUS='".$epin_status."'"; 
		}else{
			$sql = "select * from epin where EPIN_STATUS='".$epin_status."' and ISSUE_TO='".$ci->session->userdata('userid')."' "; 
		}
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
	}
	function get_min_id($preice)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select MIN(EPIN_AMT_ID) as EPIN_AMT_ID  from epinamount where EPIN_AMT='".$preice."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row[0]->EPIN_AMT_ID;
	}
	function get_all_epin_sponsor($sponsorid,$epin_status,$pack,$price)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$row=array();
		$str='';
		if($ci->session->userdata('hrmtype')== 'admin'){
		    $str=" OR ISSUE_TO='5000'";
		}
		$amts=get_epin_amt_by_id($pack);
		if($amts==$price){
			$amtid=get_min_id($amts);
    			 $sql = "select * from epin where EPIN_STATUS='".$epin_status."' and (ISSUE_TO='".$sponsorid."' ".$str.") and EPIN_AMT_ID='".$amtid."'"; 
    			$query = $ci->db->query($sql);
    			$row = $query->result();
		}
		return $row;
	}
	function get_epin_amt_by_id($amtid)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from epinamount where EPIN_AMT_ID='".$amtid."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->EPIN_AMT;
		}else{
			return '';
		}
	}

	function insertcategory($category)
	{
		date_default_timezone_set('Asia/Calcutta'); 
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "INSERT INTO `product_category`(`name`) VALUES ('".$category."')"; 
		$query = $ci->db->query($sql);
		//$row = $query->result();
		if(!empty($query)){
			return $ci->db->insert_id();
		}else{
			return '';
		}
	}

	function get_count_category($where)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select COUNT(*) as total FROM `product_category` ".$where; 
		$query = $ci->db->query($sql);
		$row = $query->result_array();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}

	function get_category($where,$sort,$order,$offset,$limit)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "SELECT * FROM `product_category` ".$where." ORDER BY ".$sort." ".$order." LIMIT ".$offset.", ".$limit;
				$query = $ci->db->query($sql);
		$row = $query->result_array();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}

	function get_all_category()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "SELECT * FROM `product_category` ";
				$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}

	function updatecategory($category,$id){
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `product_category` set name='".$category."' where id='".$id."'"; 
		$query = $ci->db->query($sql);
	    if(!empty($query)){
			return 1;
		}else{
			return 0;
		}
	}

	function deletecategory($id){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "delete from `product_category` where id='".$id."'"; 
		$query = $ci->db->query($sql);
		return 1;
	}

	function get_category_name_by_id($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from product_category where id='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->name;
		}else{
			return '';
		}
	}

	function get_subcategory_name_by_id($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from product_subcategory where id='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->name;
		}else{
			return '';
		}
	}

	
	function get_count_product($where)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select COUNT(*) as total FROM `products` ".$where; 
		$query = $ci->db->query($sql);
		$row = $query->result_array();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}

	function get_product($where,$sort,$order,$offset,$limit)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "SELECT * FROM `products` ".$where." ORDER BY ".$sort." ".$order." LIMIT ".$offset.", ".$limit;
				$query = $ci->db->query($sql);
		$row = $query->result_array();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}


	function insertsubcategory($category,$subcategory)
	{
		date_default_timezone_set('Asia/Calcutta'); 
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "INSERT INTO `product_subcategory`(`category_id`,`name`) VALUES ('".$category."','".$subcategory."')"; 
		$query = $ci->db->query($sql);
		//$row = $query->result();
		if(!empty($query)){
			return $ci->db->insert_id();
		}else{
			return '';
		}
	}

	function get_count_subcategory($where)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select COUNT(*) as total FROM `product_subcategory` ".$where; 
		$query = $ci->db->query($sql);
		$row = $query->result_array();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}

	function get_subcategory($where,$sort,$order,$offset,$limit)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "SELECT * FROM `product_subcategory` ".$where." ORDER BY ".$sort." ".$order." LIMIT ".$offset.", ".$limit;
				$query = $ci->db->query($sql);
		$row = $query->result_array();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}

	function get_all_subcategory()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "SELECT * FROM `product_subcategory` ";
				$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}

	function updatesubcategory($category,$subcategory,$id){
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `product_subcategory` set category_id='".$category."' , name='".$subcategory."' where id='".$id."'"; 
		$query = $ci->db->query($sql);
	    if(!empty($query)){
			return 1;
		}else{
			return 0;
		}
	}

	function deletesubcategory($id){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "delete from `product_subcategory` where id='".$id."'"; 
		$query = $ci->db->query($sql);
		return 1;
	}

	function get_subcategory_by_cat($category)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "SELECT * FROM `product_subcategory` where category_id='".$category."'";
				$query = $ci->db->query($sql);
		$row = $query->result_array();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}

	function get_size_type($typeid)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "SELECT * FROM `size_types` where id='".$typeid."'";
				$query = $ci->db->query($sql);
		$row = $query->result_array();
		if(!empty($row)){
			return $row[0]['name'];
		}else{
			return '';
		}
	}

	function get_perc_value(int $oval, int $perc){
         
		$value = round(($oval *$perc)/100,2);

		return $value;

	}

	function get_all_size_types()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "SELECT * FROM `size_types` ";
				$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}

	function deleteproduct($id){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "delete from `products` where id='".$id."'"; 
		$query = $ci->db->query($sql);
		return 1;
	}

	function create_productid(){
		$ci=& get_instance();
		$ci->load->database(); 
		$pin='RMG'.rand(100,999);
		$qry = "Select * from products where product_code='".$pin."'";
		$query = $ci->db->query($qry);
		$row = $query->result();
		if(!empty($row)){
			create_productid();
		}else{
			return $pin;
		}
	}


	function get_all_states()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from state"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
		
	}




	function get_all_income_type()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from mlm_income_type"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}
	function get_income_name_by_id($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from mlm_income_type where INCOME_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->INCOME_NAME;
		}else{
			return '';
		}
	}
	function get_state_by_id($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from state where STATE_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->STATE_NAME;
		}else{
			return '';
		}
	}
	function get_all_banks()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from bank_list"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}
	function get_banks_by_id($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from bank_list where BANK_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->BANK_NAME;
		}else{
			return '';
		}
	}
	function get_pos_text($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
	    if($id==1){
	        return "LEFT";
	    }
	    if($id==2){
	        return "Center";
	    }
	    if($id==3){
	        return "Right";
	    }
	}
	function get_all_packs()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from matc_packages order by PACKAGE_ID desc"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}
	function get_all_packs_by_id($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from matc_packages where PACKAGE_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->PACKAGE_PRICE;
		}else{
			return '';
		}
	}
	function get_all_packs_by_id_full($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from matc_packages where PACKAGE_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->PACKAGE_NAME;
		}else{
			return '';
		}
	}
	function get_all_packs_by_id_full_data($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from matc_packages where PACKAGE_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}
	function create_pinno(){
		$ci=& get_instance();
		$ci->load->database(); 
		$pin=rand(1000000,9999999);
		$qry = "Select * from epin where EPIN_NO='".$pin."'";
		$query = $ci->db->query($qry);
		$row = $query->result();
		if(!empty($row)){
			create_pinno();
		}else{
			return $pin;
		}
	}
	function create_hrm_id(){
		$ci=& get_instance();
		$ci->load->database(); 
		$pin=rand(1111111,9999999);
		$qry = "Select * from hrm_post where HRM_ID='".$pin."'";
		$query = $ci->db->query($qry);
		$row = $query->result();
		if(!empty($row)){
			create_hrm_id();
		}else{
			return $pin;
		}
	}
	function check_pinno($epin,$amtid,$sponsorid){
		$ci=& get_instance();
		$ci->load->database(); 
		$preice=$amts=get_epin_amt_by_id($amtid);
		$amtid=get_min_id($preice);
		
	    	$qry = "Select * from epin where EPIN_NO='".$epin."' and EPIN_STATUS=0 and ISSUE_TO='".$sponsorid."' and EPIN_AMT_ID='".$amtid."'";
	   
		$query = $ci->db->query($qry);
		$row = $query->result();
		if(!empty($row)){
			return 1;
		}else{
		    $qry = "Select * from epin where EPIN_NO='".$epin."' and EPIN_STATUS=0 and ISSUE_TO='5000' and EPIN_AMT_ID='".$amtid."'";
		    $query = $ci->db->query($qry);
		    $row = $query->result();
		    if(!empty($row)){
			    return 1;
		    }else{
			    return 0;
		    }
		}
	}
	function get_accessdate(){
	    $day=date('d');
	    if($day>1 && $day<=15){
	        $date=date('Y-m')."-20";
	    }else{
	        $mnth=date('m')+1;
	        $date=date('Y')."-".$mnth."-05";
	    }
	    return $date;
	}
	function check_today_capping($sponsorid,$comtype){
	    	$ci =& get_instance();
    		$ci->load->database();
    		$query=$ci->db->query("Select COUNT(*) as cnt from wallet_balance where HRM_ID='".$sponsorid."' And DATE(ACCESS_DATE)='".date('Y-m-d')."' and COMMISSION_TYPE='".$comtype."'");
            $result=$query->result();
            return $result[0]->cnt;
	}
	function get_all_packs_by_id_full_dt($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from matc_packages where PACKAGE_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}
	function check_sponsor_first($sponsor_level,$SPONSOR)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select COUNT(*) as total from hrm_level_tracking where LEVEL_ID='".$sponsor_level."' and SPONSOR_ID='".$SPONSOR."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->total;
		}else{
			return 0;
		}
	}
	function check_sponsor($sponsor){
		$ci=& get_instance();
		$ci->load->database(); 
		$qry = "Select * from hrm_post where HRM_ID='".$sponsor."'";
		$query = $ci->db->query($qry);
		$row = $query->result();
		if(!empty($row)){
			return 1;
		}else{
			return 0;
		}
	}

	function check_sponsor_get_name($sponsor){
		$ci=& get_instance();
		$ci->load->database(); 
		$qry = "Select * from hrm_post where HRM_ID='".$sponsor."'";
		$query = $ci->db->query($qry);
		$row = $query->result_array();
		if(!empty($row)){
			return $row;
		}else{
			return 0;
		}
	}

	function check_user_free($sponsor){
		$ci=& get_instance();
		$ci->load->database(); 
		$qry = "Select * from hrm_post where HRM_ID='".$sponsor."' and HRM_STATUS=2";
		$query = $ci->db->query($qry);
		$row = $query->result();
		if(!empty($row)){
			return 1;
		}else{
			return 0;
		}
	}
	function check_sponsor_by_level($sponsor,$mlmdesc){
		$ci=& get_instance();
		$ci->load->database(); 
		$qry = "Select * from hrm_post where HRM_ID='".$sponsor."'";
		$query = $ci->db->query($qry);
		$row = $query->result();
		if(!empty($row)){
		    if(get_hrm_postmeta($sponsor,'mlm_plan_desc')==$mlmdesc){
		    	return 1;
		    }else{
		        return 0;
		    }
		}else{
			return 0;
		}
	}
	function update_epin_done($used_by,$epin){
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `epin` set USED_BY='".$used_by."', EPIN_STATUS='1', USED_DATE='".date('Y-m-d H:i:s')."' where ISSUE_TO='".$ci->session->userdata('userid')."' and EPIN_ID='".$epin."'"; 
		$query = $ci->db->query($sql);
	    if(!empty($query)){
			return 1;
		}else{
			return 0;
		}
	}
	function update_epin_req($reqid){
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `epin_req` set APPROVED_TIME='".date('Y-m-d H:i:s')."', REQUEST_STATUS='2' where EPIN_REQ_ID='".$reqid."'"; 
		$query = $ci->db->query($sql);
	    if(!empty($query)){
			return 1;
		}else{
			return 0;
		}
	}
	function update_epin_done_by_epinno($used_by,$epin,$sponsorid){
		$ci=& get_instance();
		$ci->load->database(); 
		
		    $sql = "update `epin` set USED_BY='".$used_by."', EPIN_STATUS='1', USED_DATE='".date('Y-m-d H:i:s')."' where ISSUE_TO='".$sponsorid."' and EPIN_NO='".$epin."'"; 
		
		$query = $ci->db->query($sql);
	    $sql = "update `epin` set USED_BY='".$used_by."', EPIN_STATUS='1', USED_DATE='".date('Y-m-d H:i:s')."' where ISSUE_TO='5000' and EPIN_NO='".$epin."'"; 
	    $query = $ci->db->query($sql);
	}

	function get_all_epinamts()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from epinamount"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}
	function get_all_matc_pack_category()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from matc_pack_category"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}
	function get_all_epireq()
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from epin_req where REQUEST_STATUS=1"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	}
	function insert_hrm($hrmid,$name,$date,$status,$pass,$bckdate,$desiredid)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		if($desiredid==''){
			$sql = "INSERT INTO `hrm_post`(`HRM_ID`, `HRM_NAME`, `HRM_DATE`, `HRM_STATUS`, `HRM_PASSWORD`, `HRM_BACK_DATE_REG`) VALUES ('".$hrmid."','".$name."','".$date."','".$status."','".$pass."', '".$bckdate."')"; 
			$query = $ci->db->query($sql);
		}else{
			$sql = "INSERT INTO `hrm_post`(`HRM_ID`, `HRM_NAME`, `HRM_DATE`, `HRM_STATUS`, `HRM_PASSWORD`, `HRM_BACK_DATE_REG`) VALUES ('".$desiredid."','".$name."','".$date."','".$status."','".$pass."', '".$bckdate."')"; 
			$query = $ci->db->query($sql);
		}
		//$row = $query->result();
		if(!empty($query)){
			return 1;
		}else{
			return '';
		}
	}
	function insert_activity($userid,$remarks)
	{
		$ci=& get_instance();
		$ci->load->database(); 
	
		$sql = "INSERT INTO `activity_history`(`USER_ID`, `IP_ADDRESS`, `REMARKS`) VALUES ('".$userid."','".$_SERVER['REMOTE_ADDR']."','".$remarks."')"; 
		$query = $ci->db->query($sql);
	
		if(!empty($query)){
			return $ci->db->insert_id();
		}else{
			return '';
		}
	
	}
	function get_all_activity()
	{
		$ci=& get_instance();
		$ci->load->database(); 
	    $sql = "Select * from activity_history"; 
		$query = $ci->db->query($sql);
	    $row=$query->result();
		if(!empty($row)){
			return $row;
		}else{
			return '';
		}
	
	}
	function insertepin($pin,$userid,$amtid,$status)
	{
		date_default_timezone_set('Asia/Calcutta'); 
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "INSERT INTO `epin`(`EPIN_NO`, `ISSUE_TO`, `EPIN_AMT_ID`, `EPIN_STATUS`, `ISSUED_DATE`) VALUES ('".$pin."','".$userid."','".$amtid."','".$status."','".date('Y-m-d H:i:s')."')"; 
		$query = $ci->db->query($sql);
		//$row = $query->result();
		if(!empty($query)){
			return $ci->db->insert_id();
		}else{
			return '';
		}
	}



	function update_epin_transfer($epin,$userid,$desc){
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from epin where EPIN_NO='".$epin."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		$sql = "update `epin` set ISSUE_TO='".$userid."', TRANSFER_STATUS='1' where EPIN_ID='".$row[0]->EPIN_ID."'"; 
		$query = $ci->db->query($sql);
	    if(!empty($query)){
	        $sql = "insert into `epin_transfer_remark` (HRM_ID,TRANSFER_TO,EPIN_ID,DESCRIPTION,TRANSFERRED_DATE) values('".$row[0]->ISSUE_TO."','".$userid."','".$row[0]->EPIN_ID."','".$desc."','".date('Y-m-d H:i:s')."')"; 
		    $query = $ci->db->query($sql);
			return 1;
		}else{
			return 0;
		}
	}
	function insertereq($reqmsg,$status,$image,$franchiseeid,$quant,$epintype,$mobno=NULL)
	{
		date_default_timezone_set('Asia/Calcutta'); 
		$ci=& get_instance();
		$ci->load->database(); 
		if($ci->session->userdata('userid')){
		    $sql = "INSERT INTO `epin_req`(`HRM_ID`, `MESSAGE`, `REQUEST_STATUS`, `RELATED_IMAGE`, `FRANCHISEE_ID`, `QUANTITY`, `EPINTYPE`,`REQUESTED_TIME`) VALUES ('".$ci->session->userdata('userid')."','".$reqmsg."','".$status."','".$image."','".$franchiseeid."','".$quant."','".$epintype."','".date('Y-m-d H:i:s)')."')"; 
		}else{
		    $quant=1;
		    $sql = "INSERT INTO `epin_req`(`HRM_ID`, `MESSAGE`, `MOBILE_NO`, `REQUEST_STATUS`, `RELATED_IMAGE`, `FRANCHISEE_ID`, `QUANTITY`, `EPINTYPE`,`REQUESTED_TIME`) VALUES ('0','".$reqmsg."','".$mobno."','".$status."','".$image."','".$franchiseeid."','".$quant."','".$epintype."','".date('Y-m-d H:i:s)')."')"; 
		}
		$query = $ci->db->query($sql);
		//$row = $query->result();
		if(!empty($query)){
			return $ci->db->insert_id();
		}else{
			return '';
		}
	}
	function update_hrmpost_meta($hrm_id,$key,$value)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from hrm_post_meta where HRM_ID='".$hrm_id."' and HRM_KEY='".$key."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			$sql = "update `hrm_post_meta` set HRM_VALUE='".$value."' where HRM_ID='".$hrm_id."' and HRM_KEY='".$key."'"; 
			$query = $ci->db->query($sql);
		}else{
			$sql = "INSERT INTO `hrm_post_meta`(`HRM_ID`, `HRM_KEY`, `HRM_VALUE`) VALUES ('".$hrm_id."','".$key."','".$value."')"; 
			$query = $ci->db->query($sql);
		}
	}
	function update_pack_meta($packid,$categid,$key,$value)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from package_meta where PACKAGE_ID='".$packid."' and PACK_META_NAME='".$key."' and CATEGORY_ID='".$categid."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			$sql = "update `package_meta` set PACK_META_VALUE='".$value."', CATEGORY_ID='".$categid."' where PACKAGE_ID='".$packid."' and PACK_META_NAME='".$key."' "; 
			$query = $ci->db->query($sql);
		}else{
			$sql = "INSERT INTO `package_meta`(`PACKAGE_ID`, `CATEGORY_ID`, `PACK_META_NAME`, `PACK_META_VALUE`) VALUES ('".$packid."','".$categid."','".$key."','".$value."')"; 
			$query = $ci->db->query($sql);
		}
	}
	function get_ledger_name($ledgername)
	{
		$ci =& get_instance();
		$ci->load->database();
	
		$ledger_dt=$ci->db->query('select * from accounting_ledgers where NAME="'.$ledgername.'"');
		$ledger_dt=$ledger_dt->result();
		return $ledger_dt;
	}
	function get_ledger_amt($ledgername)
	{
		$ci =& get_instance();
		$ci->load->database();
	
		$ledger_dt=$ci->db->query('select AMOUNT from accounting_ledgers where NAME="'.$ledgername.'"');
		$ledger_dt=$ledger_dt->result();
		return $ledger_dt[0]->AMOUNT;
	}
	function get_ledger_dt_by_id($ledgerid)
	{
		$ci =& get_instance();
		$ci->load->database();
		$ledger_dt=$ci->db->query('select * from accounting_ledgers where ID="'.$ledgerid.'"');
		$ledger_dt=$ledger_dt->result();
		return $ledger_dt;
	}
	function update_amount_ledger($ledgerid,$amt)
	{
		$ci =& get_instance();
		$ci->load->database();
		$ledger_dt=$ci->db->query('select * from accounting_ledgers where ID="'.$ledgerid.'"');
		$ledger_dt=$ledger_dt->result();
		if(!empty($ledger_dt)){
			$amt+=$ledger_dt[0]->AMOUNT;
		}
		$ledger_get_amount=$ci->db->query('update accounting_ledgers set AMOUNT="'.$amt.'" where ID="'.$ledgerid.'"');
		return true;
	}
	function insert_self_level_pair($hrmid,$levelid,$lefthrmid,$righthrmid)
	{
		$ci =& get_instance();
		$ci->load->database();
		$details=array
		 (
			'HRM_ID'=>$hrmid,
			'LEVEL_ID'=>$levelid,
			'HRM_LEFT_ID'=>$lefthrmid,
		    'HRM_RIGHT_ID'=>$righthrmid
		);
		$ci->db->insert('self_level_pair',$details);
		return $ci->db->insert_id();
	}
	function update_self_level_pair($hrmid,$levelid,$key,$value)
	{
		$ci =& get_instance();
		$ci->load->database();
    	$sql = "update `self_level_pair` set ".$key."='".$value."' where HRM_ID='".$hrmid."' and LEVEL_ID='".$levelid."'"; 
		$query = $ci->db->query($sql);
	}
	function update_date_self_level_pair($hrmid,$levelid)
	{
		$ci =& get_instance();
		$ci->load->database();
    	$sql = "update `self_level_pair` set DATE='".date('Y-m-d')."' where HRM_ID='".$hrmid."' and LEVEL_ID='".$levelid."'"; 
		$query = $ci->db->query($sql);
	}
	function get_self_level_pair($hrmid,$levelid)
	{
		$ci =& get_instance();
		$ci->load->database();
    	$sql = "Select * from self_level_pair where HRM_ID='".$hrmid."' and LEVEL_ID='".$levelid."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}
	}
	function get_last_left_right($hrmid){
	    
	    if($hrmid!=5000){
    	    $ci =& get_instance();
    		$ci->load->database();
    		$orghrmid=$hrmid;
    		for($i=1;$hrmid!='';$i++){
            	$sql = "Select * from hrm_level_tracking where POSITION_ID='".$hrmid."' and LEVEL_ID='1' and MLM_DESC_ID=3"; 
        		$query = $ci->db->query($sql);
        		$row = $query->result();
        		if(!empty($row)){
        		   $hrmid=$row[0]->HRM_ID;
        		   $orghrmid=$hrmid;
        		}else{
        		    $hrmid='';
        		}
    		}
    		return $orghrmid;
	    }else{
	        return 5000;
	    }
		
	}
	function get_admin_id(){
	    
	  
    	    $ci =& get_instance();
			$ci->load->database();
			$hrmtype=1;
    	$sql = "Select * from hrm_post where HRM_TYPE='".$hrmtype."'"; 
        		$query = $ci->db->query($sql);
        		$row = $query->result();
        		if(!empty($row)){
        		   $hrmid=$row[0]->HRM_ID;
        		
        		}else{
        		    $hrmid='';
        		}
    		
    		return $hrmid;
	    
		
	}

	function get_last_left_right_limited_loop($hrmid,$position,$count){
	    $ci =& get_instance();
		$ci->load->database();
		$orghrmid=$hrmid;
		for($i=1;$hrmid!='';$i++){
        	$sql = "Select * from hrm_level_tracking where POSITION_ID='".$hrmid."' and LEVEL_ID='1' and POSITION='".$position."'"; 
    		$query = $ci->db->query($sql);
    		$row = $query->result();
    		if(!empty($row)){
    		   $hrmid=$row[0]->HRM_ID;
    		   $orghrmid=$hrmid;
    		}else{
    		    $hrmid='';
    		    $orghrmid='';
    		}
    		if($i==$count){
    		    break;
    		}
		}
		return $orghrmid;
	}
	function get_direct_by_pos($hrmid,$pos){
	    $ci =& get_instance();
		$ci->load->database();
	
    	$sql = "Select COUNT(*) as cnt from hrm_level_tracking where SPONSOR_ID='".$hrmid."' and MLM_DESC_ID=3 and LEVEL_ID='1' and POSITION='".$pos."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row[0]->cnt;
		}else{
		    return 0;
		}
	}
	function insert_ledger($name)
	{
		$ci =& get_instance();
		$ci->load->database();
		$details=array
		       (
				 	'NAME'=>$name,
				 	'UNDER'=>'29',
				 	'AMOUNT'=>'0',
				);
		$ci->db->insert('accounting_ledgers',$details);
		return $ci->db->insert_id();
	}
	function insert_record_transaction($drid,$crid,$hrm_id,$particular,$amt,$dt,$ref='')
	{
		$ci =& get_instance();
		$ci->load->database();
		$details=array
		    (
				 	'DR_ID'=>$drid,
				 	'CR_ID'=>$crid,
				 	'HRM_ID'=>$hrm_id,
				 	'PARTICULAR'=>$particular,
				 	'TRANSACTION_TIME'=>date("Y-m-d H:i:s"),
				 	'AMOUNT'=>$amt,
				 	'DATE'=>$dt,
				 	'REFRENCE'=>$ref
			);
		$ci->db->insert('accounts',$details);
		return $ci->db->insert_id();
	}
	function insert_pending_payment($id,$stat)
	{
		$dt=date('Y-m-d');
		$ci =& get_instance();
		$ci->load->database();
		$details=array
	    (
			 	'ACCOUNT_ID'=>$id,
			 	'STATUS'=>$stat,
			 	'DATE'=>$dt,
			 	'DATETIME'=>date('Y-m-d H:i:s'),
		);
		$ci->db->insert('pending_payments',$details);
		return $ci->db->insert_id();
	}
	function insert_hrm_level_track($MLM_DESC_ID,$level_id,$hrmid,$pos,$added_by,$root,$sponsor)
	{
		date_default_timezone_set('Asia/Calcutta');
		$ci =& get_instance();
		$ci->load->database();
		$details=array
		       (
				 	'MLM_DESC_ID'=>$MLM_DESC_ID,
				 	'LEVEL_ID'=>$level_id,
				 	'HRM_ID'=>$hrmid,
				 	'POSITION'=>$pos,
				 	'ADDED_BY'=>$added_by,
				 	'POSITION_ID'=>$root,
				 	'SPONSOR_ID'=>$sponsor,
				    'COUNT_NODE'=>0,
				    'DATE_TIME'=>date('Y-m-d H:i:s'),
				 	
				);
		$ci->db->insert('hrm_level_tracking',$details);
		return true;
	}
	function insert_hrm_level_free_track($MLM_DESC_ID,$level_id,$hrmid,$pos,$added_by,$root,$sponsor)
	{
	    date_default_timezone_set('Asia/Calcutta');
		$ci =& get_instance();
		$ci->load->database();
		$details=array
		       (
				 	'MLM_DESC_ID'=>$MLM_DESC_ID,
				 	'LEVEL_ID'=>$level_id,
				 	'HRM_ID'=>$hrmid,
				 	'POSITION'=>$pos,
				 	'ADDED_BY'=>$added_by,
				 	'POSITION_ID'=>$root,
				 	'SPONSOR_ID'=>$sponsor,
				    'COUNT_NODE'=>0,
				    'DATE_TIME'=>date('Y-m-d H:i:s'),
				 	
				);
		$ci->db->insert('hrm_free_tracking',$details);
		return true;
	}
	function check_free_insert($hrmid){
	    $ci =& get_instance();
		$ci->load->database();
	    $sql = "Select * from hrm_free_tracking where HRM_ID='".$hrmid."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}else{
		   return 0;
		}
    
	}
	function check_two_done($hrmid,$datetime){
	    $ci =& get_instance();
		$ci->load->database();
	    $sql = "Select COUNT(*) as COUNT from hrm_level_tracking where SPONSOR_ID='".$hrmid."' and MLM_DESC_ID='3' and LEVEL_ID=1 and DATE_TIME>='".$datetime."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   if($row[0]->COUNT>=2){
		        return 1;
		   }else{
		       return 0;
		   }
		}else{
		   return 0;
		}
    
	}
	function insert_wallet_balance($hrmid,$amt,$comission_type,$accessdate,$stat,$accountid='')
	{
		$ci =& get_instance();
		$ci->load->database();
		$details=array
		       (
				    'HRM_ID'=>$hrmid,
				    'WALLET_AMOUNT'=>$amt,
				    'COMMISSION_TYPE'=>$comission_type,
				    'ACCESS_DATE'=>$accessdate,
				    'WALLET_STATUS'=>$stat,
				    'DATE_TIME'=>date('Y-m-d H:i:s'),
				    'ACCOUNT_ID'=>$accountid
			    );
		$ci->db->insert('wallet_balance',$details);
		return true;
	}
	function get_current_hrm_reward($hrm,$status)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from reward_track where HRM_ID='".$hrm."' and STATUS='".$status."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}
	}
	
	function get_total_hrm_reward($hrm)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select COUNT(*) as cnt from reward_track where HRM_ID='".$hrm."' and STATUS='0'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row[0]->cnt;
		}else{
		    return 0;
		}
	}
	function get_current_hrm_performance($hrm,$status,$perform_INCOME_ID)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from performance_track where HRM_ID='".$hrm."' and STATUS='".$status."' and PERFORM_ID='".$perform_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}
	}
	function get_current_hrm_pension($hrm,$status,$pension_INCOME_ID)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from pension_track where HRM_ID='".$hrm."' and STATUS='".$status."' and PENSION_TRACK='".$pension_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}
	}
	function get_current_hrm_bonanza($hrm,$status,$bonanza_INCOME_ID)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from bonanza_track where HRM_ID='".$hrm."' and STATUS='".$status."' and BONANZA_INCOME_ID='".$bonanza_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}
	}
	function get_reward_by_id($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
	    $sql = "select * from reward_income where REWARD_INCOME_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}
	}
	function get_perform_by_id($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
	    $sql = "select * from performance_bonus where PERFORM_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}
	}
	function get_pension_by_id($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
	    $sql = "select * from pension_income where PENSION_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}
	}
	function get_bonanza_by_id($id)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from bonanza_offer where OFFER_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}
	}
	function  get_own_count_nodes($hrm_id,$level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select OWN_COUNT from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->OWN_COUNT;
		    return $count;
		}else{
		    return 0;
		}
	}
	function  get_self_nodes($hrm_id,$level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select SELF_ID from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->SELF_ID;
		    return $count;
		}else{
		    return 0;
		}
	}
	function  get_other_nodes($hrm_id,$level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select OTHER_NODE from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->OTHER_NODE;
		    return $count;
		}else{
		    return 0;
		}
	}
	function update_hrm_nonwork_count($hrm,$status,$level)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
	    $sql = "select * from non_working_track where HRM_ID='".$hrm."' and STATUS='".$status."' and NON_TRACK_LEVEL='".$level."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->COUNTER;
		    $count=$count+1;
			$sql = "update `non_working_track` set COUNTER='".$count."' where HRM_ID='".$hrm."' and STATUS='".$status."' and NON_TRACK_LEVEL='".$level."'"; 
			$query = $ci->db->query($sql);
		}
	}
	function get_current_hrm_non_work($hrm,$status,$level)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
	    $sql = "select * from non_working_track where HRM_ID='".$hrm."' and STATUS='".$status."' and NON_TRACK_LEVEL='".$level."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}
	}
	function check_already_inserted_or_not_non_wrk($hrm)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from non_working_track where HRM_ID='".$hrm."' and NON_TRACK_LEVEL='1'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    return 1;
		}else{
		    return 0;
		}
		
	}
	function get_non_work_income($packid,$level)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
	    $sql = "select * from non_working_income where PACKAGE_ID='".$packid."' and LEVEL='".$level."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}
	}
	function insert_non_work_track($hrm,$datefrom,$dateto,$counter,$tgcounter,$status,$amt,$level)
	{
		$ci=& get_instance();
		$ci->load->database(); 
	    $sql = "INSERT INTO `non_working_track`(`HRM_ID`, `STARTDATE`, `ENDDATE`,`COUNTER`, `MEMBER_COUNT`, `AMOUNT`, `DATETIME`, `STATUS`, `NON_TRACK_LEVEL`) VALUES ('".$hrm."','".$datefrom."','".$dateto."','".$counter."','".$tgcounter."','".$amt."','".date('Y-m-d H:i:s')."','".$status."','".$level."')"; 
		$query = $ci->db->query($sql);
		if(!empty($query)){
			return $ci->db->insert_id();
		}else{
			return '';
		}
	
	}
	function insert_hrm_reward($hrm,$datefrom,$dateto,$status)
	{
		$ci=& get_instance();
		$ci->load->database(); 
	
		$sql = "INSERT INTO `reward_track`(`HRM_ID`, `FROM`, `TO`,`DATETIME`, `STATUS`) VALUES ('".$hrm."','".$datefrom."','".$dateto."','".date('Y-m-d H:i:s')."','".$status."')"; 
		$query = $ci->db->query($sql);
		
		if(!empty($query)){
			return $ci->db->insert_id();
		}else{
			return '';
		}
	
	}
	function insert_hrm_pension($hrm,$counter,$tgcounter,$status,$pension_incomeid)
	{
		$ci=& get_instance();
		$ci->load->database(); 
	    $sql = "INSERT INTO `pension_track`(`HRM_ID`, `COUNTER`, `TARGET_COUNTER`, `DATETIME`, `STATUS`, `PENSION_TRACK`) VALUES ('".$hrm."','".$counter."','".$tgcounter."','".date('Y-m-d H:i:s')."','".$status."','".$pension_incomeid."')"; 
		$query = $ci->db->query($sql);
		if(!empty($query)){
			return $ci->db->insert_id();
		}else{
			return '';
		}
	}
	function insert_hrm_bonanza($hrm,$datefrom,$dateto,$counter,$tgcounter,$status,$bonanza_incomeid)
	{
		$ci=& get_instance();
		$ci->load->database(); 
	    $sql = "INSERT INTO `bonanza_track`(`HRM_ID`, `FROM`, `TO`, `COUNTER`, `TARGET_COUNTER`, `DATETIME`, `STATUS`, `BONANZA_INCOME_ID`) VALUES ('".$hrm."','".$datefrom."','".$dateto."','".$counter."','".$tgcounter."','".date('Y-m-d H:i:s')."','".$status."','".$bonanza_incomeid."')"; 
		$query = $ci->db->query($sql);
		if(!empty($query)){
			return $ci->db->insert_id();
		}else{
			return '';
		}
	}
	function insert_hrm_perform($hrm,$counter,$tgcounter,$status,$perform_incomeid)
	{
		$ci=& get_instance();
		$ci->load->database(); 
	    $sql = "INSERT INTO `performance_track`(`HRM_ID`, `COUNTER`, `TARGET_COUNTER`, `DATETIME`, `STATUS`, `PERFORM_ID`) VALUES ('".$hrm."','".$counter."','".$tgcounter."','".date('Y-m-d H:i:s')."','".$status."','".$perform_incomeid."')"; 
		$query = $ci->db->query($sql);
		if(!empty($query)){
			return $ci->db->insert_id();
		}else{
			return '';
		}
	}
	function get_three_member_just_down($hrm,$mlmdesc)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from hrm_level_tracking where POSITION_ID='".$hrm."' and LEVEL_ID='1' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    return $row;
		}
		
	}
	function update_reward_gain($hrm)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
		$sql = "update `reward_track` set REWARD_GAIN_OR_NOT='1' where HRM_ID='".$hrm."' and STATUS='1'"; 
		$query = $ci->db->query($sql);
		
	}
	function update_perform_gain($hrm,$perform_INCOME_ID)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `performance_track` set PER_GAIN_OR_NOT='1' where HRM_ID='".$hrm."' and PERFORM_ID='".$perform_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
	}
	function update_pension_gain($hrm,$perform_INCOME_ID)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `pension_track` set PENSION_GAIN_OR_NOT='1' where HRM_ID='".$hrm."' and PENSION_TRACK='".$perform_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
	}
	function update_bonanza_gain($hrm,$bonanza_INCOME_ID)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `bonanza_track` set BONANZA_GAIN_OR_NOT='1' where HRM_ID='".$hrm."' and BONANZA_INCOME_ID='".$bonanza_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
	}
	function allposts_count_reward($mlm_desc,$users)
    {   
        $ci=& get_instance();
		$ci->load->database(); 
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" ORDER BY ID asc');
        $result=$query->result();
        if(!empty($result)){ 
            $arr=array();
            foreach($result as $results){
    		    $hrm_id=$results->HRM_ID;
    		   for($x=0;$hrm_id!=5000;$x++){
    			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
    			    if($hrm_id==$users){
    					$arr[]=$results->HRM_ID;
    				}
    			}
    		}
    		if(!empty($arr)){
        		$user_ids = "'" . implode ( "', '", $arr ) . "'";
        	    $query=$ci->db->query('Select * from hrm_post where HRM_ID IN ('.$user_ids.')');
                return $query->num_rows();  
    		}else{
    		    return 0;
    		}
            //$resultnew=$query->result();
      }else{
	    return 0;
	    }
    }
    function get_left_right_members($mlm_desc,$users,$position)
    {   
        $ci=& get_instance();
		$ci->load->database(); 
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" ORDER BY ID asc');
        $result=$query->result();
        if(!empty($result)){ 
            $arr=array();
            foreach($result as $results){
    		    $hrm_id=$results->HRM_ID;
    		   for($x=0;$hrm_id!=5000;$x++){
    			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
    			    if($hrm_id==$users){
    					$arr[]=$results->HRM_ID;
    				}
    			}
    		}
    		if(!empty($arr)){
    		    if(in_array($position,$arr)){
    		        return 1;
    		    }else{
    		        return 0;
    		    }
        		//$user_ids = "'" . implode ( "', '", $arr ) . "'";
        	
        	    //$query=$ci->db->query('Select * from hrm_post where HRM_ID IN ('.$user_ids.')');
                //return $query->result();  
    		}else{
    		    return 0;
    		}
            //$resultnew=$query->result();
      }else{
	    return 0;
	    }
    }
    function allposts_sum_pv($mlm_desc,$users,$level)
    {   
        $ci=& get_instance();
		$ci->load->database(); 
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" ORDER BY ID asc');
        $result=$query->result();
        if(!empty($result)){ 
            $arr=array();
            foreach($result as $results){
    		    $hrm_id=$results->HRM_ID;
    		   for($x=0;$hrm_id!=5000;$x++){
    			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
    			    if($hrm_id==$users){
    					$arr[]=$results->HRM_ID;
    				}
    			}
    		}
    		if(!empty($arr)){
        		$user_ids = "'" . implode ( "', '", $arr ) . "'";
        		$sql = "Select SUM(HRM_VALUE) as COUNT from hrm_post_meta WHERE HRM_ID IN (".$user_ids.") AND HRM_KEY='level' and HRM_VALUE>='".$level."'";
        		$query = $ci->db->query($sql);
        		$row = $query->result();
        		if(!empty($row)){
        		    return $row[0]->COUNT;
        		}else{
        		    return 0;
        		}
    		}else{
    		    return 0;
    		}
            //$resultnew=$query->result();
      }else{
	    return 0;
	    }
    }
    
    function update_given_pv($sponserid,$given){
        $already_given=get_hrm_postmeta($sponserid,'givenpv');
        update_hrmpost_meta($sponserid,'givenpv',$already_given+$given);
    }
    function update_given_pair($sponserid){
        $already_given=get_hrm_postmeta($sponserid,'givenpair');
        update_hrmpost_meta($sponserid,'givenpair',$already_given+1);
    }
	function get_member_three($sponserid){
        $just_three_down=get_three_member_just_down($sponserid,3);
           $count_member_leg=array();
           $count_member_leg[0]=0;
           $count_member_leg[1]=0;
           if(!empty($just_three_down)){
               foreach($just_three_down as $downs){
                   $hrmid=$downs->HRM_ID;
                   $count_member_leg[$downs->POSITION-1]=allposts_count_reward(3,$hrmid)+1;
               }
           }
        return json_encode($count_member_leg);
    }
   
	function update_reward_status($hrm,$status)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
		$sql = "update `reward_track` set STATUS='".$status."' where HRM_ID='".$hrm."' and STATUS=1"; 
		$query = $ci->db->query($sql);
		
	}
	function update_performance_status($hrm,$status,$perform_INCOME_ID)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
		$sql = "update `performance_track` set STATUS='".$status."' where HRM_ID='".$hrm."' and PERFORM_ID='".$perform_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
		
	}
	function update_pension_status($hrm,$status,$pension_INCOME_ID)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
		$sql = "update `pension_track` set STATUS='".$status."' where HRM_ID='".$hrm."' and PENSION_TRACK='".$pension_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
		
	}
	function update_bonanza_status($hrm,$status,$bonanza_INCOME_ID)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
		$sql = "update `bonanza_track` set STATUS='".$status."' where HRM_ID='".$hrm."' and BONANZA_INCOME_ID='".$bonanza_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
		
	}
	function  update_hrm_count_level_self($hrm_id,$hrm_level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select SELF_ID from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->SELF_ID;
		    $count=$count+1;
			$sql = "update `hrm_level_tracking` set SELF_ID='".$count."' where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
			$query = $ci->db->query($sql);
		}
	}
	function  update_hrm_count_level_othernode($hrm_id,$hrm_level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select OTHER_NODE from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->OTHER_NODE;
		    $count=$count+1;
			$sql = "update `hrm_level_tracking` set OTHER_NODE='".$count."' where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
			$query = $ci->db->query($sql);
		}
	}
	function  update_hrm_count_level_own_node($hrm_id,$hrm_level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select OWN_COUNT from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->OWN_COUNT;
		    $count=$count+1;
			$sql = "update `hrm_level_tracking` set OWN_COUNT='".$count."' where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
			$query = $ci->db->query($sql);
		}
	}
	function  update_hrm_count_level_count_node($hrm_id,$hrm_level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select COUNT_NODE from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->COUNT_NODE;
		    $count=$count+1;
			$sql = "update `hrm_level_tracking` set COUNT_NODE='".$count."' where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
			$query = $ci->db->query($sql);
		}
	}
	function  get_count_hrm_track_for_autopool($hrm_id,$hrm_level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select COUNT(*) as cnt from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    if($row[0]->cnt>0){
		        return 1;
		    }else{
		        return 0;
		    }
		}else{
		    return 0;
		}
	}
	function get_sum_wallet_balance($hrmid)
	{
		$ci =& get_instance();
		$ci->load->database();
	    $sql = "select sum(WALLET_AMOUNT) as total from wallet_balance where HRM_ID='".$hrmid."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->total;
		}else{
			return 0;
		}
		
		return true;
	}
	function get_sum_wallet_balance_type($hrmid,$type)
	{
		$ci =& get_instance();
		$ci->load->database();
	    $sql = "select sum(WALLET_AMOUNT) as total from wallet_balance where HRM_ID='".$hrmid."' and COMMISSION_TYPE IN (".$type.") and WALLET_STATUS=1"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->total;
		}else{
			return 0;
		}
		
		return true;
	}
	function get_count_wallet_balance_type($hrmid,$type)
	{
		$ci =& get_instance();
		$ci->load->database();
	    $sql = "select count(*) as cnt from wallet_balance where HRM_ID='".$hrmid."' and COMMISSION_TYPE='".$type."' and WALLET_STATUS=1"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->cnt;
		}else{
			return 0;
		}
		
		return true;
	}
	function get_sum_withdrawl_amt($from,$to,$userid)
	{
		$ci =& get_instance();
		$ci->load->database();
		$ledgerid=get_ledger_id($userid);
	    $sql = "select sum(AMOUNT) as total from accounts where DR_ID='11' and CR_ID='".$ledgerid."' and DATE(DATE)>='".$from."' and DATE(DATE)<='".$to."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->total;
		}else{
			return 0;
		}
		
		return true;
	}
	function get_withdrawl_amt_list($from,$to,$userid)
	{
		$ci =& get_instance();
		$ci->load->database();
		$ledgerid=get_ledger_id($userid);
	    $sql = "select * from accounts where DR_ID='11' and CR_ID='".$ledgerid."' and DATE(DATE)>='".$from."' and DATE(DATE)<='".$to."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return 0;
		}
		
	}
	function get_withdrawl_amt_list_by_date($from,$to)
	{
		$ci =& get_instance();
		$ci->load->database();
		$sql = "select * from accounts where DR_ID='11' and DATE(DATE)>='".$from."' and DATE(DATE)<='".$to."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return 0;
		}
	
	}
	function check_nodes_added($sponsor_level,$SPONSOR)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select COUNT(*) as total from hrm_level_tracking where LEVEL_ID='".$sponsor_level."' and (SPONSOR_ID='".$SPONSOR."' OR POSITION_ID='".$SPONSOR."')"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->total;
		}else{
			return 0;
		}
	}
	function release_income($sponsor_level)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select AMOUNT as total from income_description where STAGE_ID='".$sponsor_level."' and INCOME_ID=1"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row[0]->total;
		}else{
			return 0;
		}
	}
	function hrm_level_track($sponsor_level,$hrmid,$mlm_desc)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from hrm_level_tracking where LEVEL_ID='".$sponsor_level."' and HRM_ID='".$hrmid."' and MLM_DESC_ID='".$mlm_desc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return 0;
		}
	}
	function  check_available_position($positionid_level,$positionid){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select POSITION from hrm_level_tracking where LEVEL_ID='".$positionid_level."' and POSITION_ID='".$positionid."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
			return $row;
		}else{
			return 0;
		}
	}
	function update_wallet_balance_status($sponserid,$sponsor_level,$status)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
		$sql = "update `wallet_balance` set STATUS='".$status."'  where HRM_ID='".$sponserid."' and FOR_LEVEL='".$sponsor_level."'"; 
		$query = $ci->db->query($sql);
	
	}
	function get_reverse_parent_hrms($positionid,$mlm_desc){
	   
	    $ci=& get_instance();
		$ci->load->database(); 
	    $sql = "select POSITION_ID from hrm_level_tracking where HRM_ID='".$positionid."' and MLM_DESC_ID='".$mlm_desc."'"; 
	    
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
	        return 	$row[0]->POSITION_ID;
		}else{
		    return '';
		}
	}
	function get_sponsor_id_free($userid,$mlm_desc){
	   
	    $ci=& get_instance();
		$ci->load->database(); 
	    $sql = "select SPONSOR_ID from hrm_free_tracking where HRM_ID='".$userid."' and MLM_DESC_ID='".$mlm_desc."'"; 
	    
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
	        return 	$row[0]->SPONSOR_ID;
		}else{
		    return '';
		}
	}
	function get_position_id_free($userid,$mlm_desc){
	   
	    $ci=& get_instance();
		$ci->load->database(); 
	    $sql = "select POSITION_ID from hrm_free_tracking where HRM_ID='".$userid."' and MLM_DESC_ID='".$mlm_desc."'"; 
	    
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
	        return 	$row[0]->POSITION_ID;
		}else{
		    return '';
		}
	}
	function get_position_id_of_that_free($userid,$mlm_desc){
	   
	    $ci=& get_instance();
		$ci->load->database(); 
	    $sql = "select HRM_ID from hrm_free_tracking where POSITION_ID='".$userid."' and MLM_DESC_ID='".$mlm_desc."'"; 
	    $query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
	        return 	$row[0]->HRM_ID;
		}else{
		    return '';
		}
	}
	function get_reverse_parent_hrms_lev_0($positionid,$mlm_desc){
	   
	    $ci=& get_instance();
		$ci->load->database(); 
	    $sql = "select POSITION_ID from hrm_level_tracking where HRM_ID='".$positionid."' and LEVEL_ID=1 and MLM_DESC_ID='".$mlm_desc."'"; 
	    $query = $ci->db->query($sql);
		$row = $query->result();
	    return 	$row[0]->POSITION_ID;
	}
	function get_reverse_parent_hrms_any_level($positionid,$mlm_desc,$level){
	   
	    $ci=& get_instance();
		$ci->load->database(); 
	    $sql = "select POSITION_ID from hrm_level_tracking where HRM_ID='".$positionid."' and LEVEL_ID='".$level."' and MLM_DESC_ID='".$mlm_desc."'"; 
	    $query = $ci->db->query($sql);
		$row = $query->result();
	    return 	$row[0]->POSITION_ID;
	}
	function get_reverse_parent_hrms_lev_0_free($positionid,$mlm_desc){
	   
	    $ci=& get_instance();
		$ci->load->database(); 
	    $sql = "select POSITION_ID from hrm_free_tracking where HRM_ID='".$positionid."' and LEVEL_ID=1 and MLM_DESC_ID='".$mlm_desc."'"; 
	    $query = $ci->db->query($sql);
		$row = $query->result();
	    return 	$row[0]->POSITION_ID;
	}
	function  insert_count_nodes($hrm_id,$mlm_desc_id){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from hrm_count_nodes where HRM_ID='".$hrm_id."' and MLM_DESC_ID='".$mlm_desc_id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->COUNT;
		    $count=$count+1;
			$sql = "update `hrm_count_nodes` set COUNT='".$count."' where HRM_ID='".$hrm_id."' and MLM_DESC_ID='".$mlm_desc_id."'"; 
			$query = $ci->db->query($sql);
		}else{
			$sql = "INSERT INTO `hrm_count_nodes`(`HRM_ID`, `COUNT`, `MLM_DESC_ID`) VALUES ('".$hrm_id."','0','".$mlm_desc_id."')"; 
			$query = $ci->db->query($sql);
		}
	}
	function update_hrm_reward_count($hrm,$status,$REWARD_INCOME_ID,$count)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `reward_track` set COUNTER='".$count."' where HRM_ID='".$hrm."' and STATUS='".$status."' and REWARD_INCOME_ID='".$REWARD_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
    }
    function update_hrm_pension_count($hrm,$status,$pension_INCOME_ID,$count)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `pension_track` set COUNTER='".$count."' where HRM_ID='".$hrm."' and STATUS='".$status."' and PENSION_TRACK='".$pension_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
    }
    function update_hrm_perform_count($hrm,$status,$perform_INCOME_ID,$count)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `performance_track` set COUNTER='".$count."' where HRM_ID='".$hrm."' and STATUS='".$status."' and PERFORM_ID='".$perform_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
    }
    function update_hrm_bonanza_count($hrm,$status,$bonanza_INCOME_ID)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "Select * from `bonanza_track` where HRM_ID='".$hrm."' and STATUS='".$status."' and BONANZA_INCOME_ID='".$bonanza_INCOME_ID."'"; 
		$query = $ci->db->query($sql);
		$query=$query->result();
		if(!empty($query)){
		    $count=$query[0]->COUNTER+1;
    		$sql = "update `bonanza_track` set COUNTER='".$count."' where HRM_ID='".$hrm."' and STATUS='".$status."' and BONANZA_INCOME_ID='".$bonanza_INCOME_ID."'"; 
    		$query = $ci->db->query($sql);
		}
    }
	function  get_member_nodes($hrm_id,$mlm_desc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select COUNT from hrm_count_nodes where HRM_ID='".$hrm_id."' and MLM_DESC_ID='".$mlm_desc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->COUNT;
		    return $count;
		}else{
		    return 0;
		}
	}
	function  get_count_nodes($hrm_id,$level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select COUNT_NODE from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->COUNT_NODE;
		    return $count;
		}else{
		    return 0;
		}
	}
	function  get_direct_count_nodes($hrm_id,$level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select DIRECT_NODE from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->DIRECT_NODE;
		    return $count;
		}else{
		    return 0;
		}
	}
	function  get_self_id_node(){
	    $ci=& get_instance();
		$ci->load->database(); 
		$hrm_id=$ci->session->userdata('userid');
		$sql = "select SUM(COUNT_NODE) as sum from hrm_level_tracking where HRM_ID='".$hrm_id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->sum;
		    return $count;
		}else{
		    return 0;
		}
	}
	function  get_self_id_node_admin_ajax($hrm_id){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select SUM(COUNT_NODE) as sum from hrm_level_tracking where HRM_ID='".$hrm_id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->sum;
		    return $count;
		}else{
		    return 0;
		}
	}
	function  get_other_id_node(){
	    $ci=& get_instance();
		$ci->load->database(); 
		$hrm_id=$ci->session->userdata('userid');
		$sql = "select SUM(INDIRECT_NODE) as sum from hrm_level_tracking where HRM_ID='".$hrm_id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->sum;
		    return $count;
		}else{
		    return 0;
		}
	}
	function  get_other_id_node_admin_ajax($hrm_id){
	    $ci=& get_instance();
		$ci->load->database(); 
		
		$sql = "select SUM(INDIRECT_NODE) as sum from hrm_level_tracking where HRM_ID='".$hrm_id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->sum;
		    return $count;
		}else{
		    return 0;
		}
	}
	function  get_free_other_id_node(){
	    $ci=& get_instance();
		$ci->load->database(); 
		$hrm_id=$ci->session->userdata('userid');
		$sql = "select COUNT(*) as sum from hrm_free_tracking where SPONSOR_ID='".$hrm_id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->sum;
		    return $count;
		}else{
		    return 0;
		}
	}
	function  get_free_other_id_node_by_user($hrm_id){
	    $ci=& get_instance();
		$ci->load->database(); 
		
		$sql = "select COUNT(*) as sum from hrm_free_tracking where SPONSOR_ID='".$hrm_id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->sum;
		    return $count;
		}else{
		    return 0;
		}
	}
	function  get_other_id($hrm_id,$level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select INDIRECT_NODE from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->INDIRECT_NODE;
		    return $count;
		}else{
		    return 0;
		}
	}
	function  update_hrm_count_level($hrm_id,$hrm_level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select COUNT_NODE from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->COUNT_NODE;
		    $count=$count+1;
			$sql = "update `hrm_level_tracking` set COUNT_NODE='".$count."' where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
			$query = $ci->db->query($sql);
		}
	}
	function delete_hrm($userid){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "delete from `hrm_post` where HRM_ID='".$userid."'"; 
		$query = $ci->db->query($sql);
	}
	function  update_hrm_free_level_pos($pos,$hrm){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `hrm_free_tracking` set POSITION_ID='".$hrm."' where POSITION_ID='".$pos."'"; 
		$query = $ci->db->query($sql);
		
	}
	function  update_hrm_free_level_pos_by_id($hrm,$pos){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "update `hrm_free_tracking` set POSITION_ID='".$pos."' where HRM_ID='".$hrm."'"; 
		$query = $ci->db->query($sql);
	}
	function  delete_free_tracks($hrm){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "delete from `hrm_free_tracking` where HRM_ID='".$hrm."'"; 
		$query = $ci->db->query($sql);
	}
	function  update_hrm_count_level_indirect($hrm_id,$hrm_level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select INDIRECT_NODE from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->INDIRECT_NODE;
		    $count=$count+1;
			$sql = "update `hrm_level_tracking` set INDIRECT_NODE='".$count."' where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
			$query = $ci->db->query($sql);
		}
	}
	function  update_hrm_count_level_direct($hrm_id,$hrm_level,$mlmdesc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select DIRECT_NODE from hrm_level_tracking where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    $count=$row[0]->DIRECT_NODE;
		    $count=$count+1;
			$sql = "update `hrm_level_tracking` set DIRECT_NODE='".$count."' where HRM_ID='".$hrm_id."' and LEVEL_ID='".$hrm_level."' and MLM_DESC_ID='".$mlmdesc."'"; 
			$query = $ci->db->query($sql);
		}
	}
	function update_non_work_gain($hrm,$level)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
		$sql = "update `non_working_track` set GAIN_OR_NOT='1' where HRM_ID='".$hrm."' and NON_TRACK_LEVEL='".$level."'"; 
		$query = $ci->db->query($sql);
		
	}
	function get_members_valid($level){
	    $sum=0;
        for($i=0;$i<=$level;$i++){
         $sum=$sum+pow(2,$i);
        }
        return  $sum-1;
	}
	function check_extra_comission($level_id,$POSITION_id){
	    $ci=& get_instance();
		$ci->load->database(); 
	    $sql="Select * from hrm_level_tracking where LEVEL_ID='".$level_id."' and POSITION IN (1,2) and SPONSOR_ID !='".$POSITION_id."' and POSITION_ID='".$POSITION_id."'";
	    $query = $ci->db->query($sql);
	    $row = $query->result();
		if(!empty($row)){
		   return 1;
		}else{
		   return 0;
		}
	}
	function get_nodes_geneology($POSITION_id){
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
	    $sql="Select * from hrm_level_tracking where LEVEL_ID='0' and POSITION IN (1,2) and POSITION_ID='".$POSITION_id."' ORDER BY POSITION ASC";
	    $query = $ci->db->query($sql);
	    $row = $query->result();
	    $array=$row;
		if(!empty($array)){
		   return $array;
		}else{
		   return $array;
		}
	}
	function get_nodes_geneology_pos($POSITION_id,$position,$mlm_desc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
	    $sql="Select * from hrm_level_tracking where LEVEL_ID='1' and POSITION IN (1,2) and POSITION_ID='".$POSITION_id."'  and MLM_DESC_ID='".$mlm_desc."' and POSITION='".$position."' and HRM_ID!=5000 ORDER BY POSITION ASC";
	    $query = $ci->db->query($sql);
	    $row = $query->result();
	    $array=$row;
		if(!empty($array)){
		   return $array;
		}else{
		   return $array;
		}
	}
	function get_free_nodes_geneology_pos($POSITION_id,$position,$mlm_desc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
	    $sql="Select * from hrm_free_tracking where LEVEL_ID='0' and POSITION IN (1,2) and POSITION_ID='".$POSITION_id."'  and MLM_DESC_ID='".$mlm_desc."' and POSITION='".$position."' and HRM_ID!=5000 ORDER BY POSITION ASC";
	    $query = $ci->db->query($sql);
	    $row = $query->result();
	    $array=$row;
		if(!empty($array)){
		   return $array;
		}else{
		   return $array;
		}
	}
	function get_added_by($hrm_id){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
	    $sql="Select SPONSOR_ID from hrm_level_tracking where LEVEL_ID='1' and HRM_ID='".$hrm_id."'";
	    $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row[0]->SPONSOR_ID;
		}else{
		   return '';
		}
	}
	function get_added_by_free($hrm_id){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
	    $sql="Select SPONSOR_ID from hrm_free_tracking where LEVEL_ID='0' and HRM_ID='".$hrm_id."'";
	    $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row[0]->SPONSOR_ID;
		}else{
		   return '';
		}
	}
	function get_hrms_all(){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
	    $sql="Select * from hrm_post where HRM_ID!='5000' and HRM_STATUS=1 ORDER BY ID ASC";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function get_hrm_by_date($from,$to){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		
	    $sql="Select * from hrm_post where HRM_ID!='5000' and DATE(HRM_DATE)>='".$from."' and DATE(HRM_DATE)<='".$to."' ORDER BY ID ASC";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function get_sales_all(){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
	    $sql="Select * from accounts where CR_ID='8'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function get_sales_by_date($from,$to,$pack){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		
	    $sql="Select * from accounts where CR_ID='8'  and DATE(DATE)>='".$from."' and DATE(DATE)<='".$to."'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function get_comission_by_date($from,$to,$income,$userid){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		if($income=='all'){
		    $income='1,2,3,4,5,6';
		}
		$sql="Select * from wallet_balance where HRM_ID='".$userid."' and COMMISSION_TYPE IN (".$income.") and DATE(DATE_TIME)>='".$from."' and DATE(DATE_TIME)<='".$to."' order by WALLET_ID ASC";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function get_comission_by_date_all($from,$to,$income){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		if($income=='all'){
		    $income='1,2,3,4,5,6';
		}
		$users=	$ci->session->userdata('userid');
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" and HRM_STATUS=1 ORDER by ID ASC');
        $result=$query->result();
        $arr=array();
        foreach($result as $res){
            $arr[]=$res->HRM_ID;
        }
        $user_ids = "'" . implode ( "', '", $arr ) . "'";
		$sql="Select * from wallet_balance where HRM_ID IN (".$user_ids.") and COMMISSION_TYPE IN (".$income.") and DATE(DATE_TIME)>='".$from."' and DATE(DATE_TIME)<='".$to."'  order by WALLET_ID ASC";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function get_sum_comission_by_date($from,$to,$income,$userid){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		if($income=='all'){
		    $income='1,2,3,4,5,6';
		}
		$sql="Select SUM(WALLET_AMOUNT) as AMOUNT from wallet_balance where HRM_ID='".$userid."' and COMMISSION_TYPE IN (".$income.") and DATE(DATE_TIME)>='".$from."' and DATE(DATE_TIME)<='".$to."'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row[0]->AMOUNT;
		}else{
		   return 0;
		}
	}
	function get_all_pending_payments(){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		
	    $sql="Select * from pending_payments where STATUS='0'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function get_pend_pay_by_date($from,$to){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		
	    $sql="Select * from pending_payments where STATUS='0' and DATE(DATE)>='".$from."' and DATE(DATE)<='".$to."'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function update_pend_pay_status($payid){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		
	    $sql = "update `pending_payments` set STATUS='1' , DATE_MODIFIED='".date('Y-m-d H:i:s')."' where PAY_ID='".$payid."'"; 
		$query = $ci->db->query($sql);
		
	}
	function get_dt_account_by_id($id){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		
	    $sql="Select * from accounts where ID='".$id."'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function get_rank_dt_by_id($id){
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		
	    $sql="Select * from rank_commission where RANK_ID='".$id."'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function get_team_dt_by_id($id){
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		$sql="Select * from reward_team where REWARD_TEAM_ID='".$id."'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function get_direct_dt_by_id($id){
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		$sql="Select * from reward_direct where REWARD_DIRECT_ID='".$id."'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function get_sum_account_balance($hrmid)
	{
		$ci =& get_instance();
		$ci->load->database();
		//$ledger_dt=get_ledger_name("ledger_".$hrmid);
		if($hrmid==5000){
		    return 0;
		}
		$id=get_ledger_id($hrmid);
	    $sql="Select sum(AMOUNT) as amt from accounts where (CR_ID='9' OR CR_ID='12' OR CR_ID='10') and DR_ID='".$id."'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row[0]->amt;
		}else{
		   return 0;
		}
	
	}
	function send_sms($mobileno,$msg,$touserid){
	    $ci =& get_instance();
		$ci->load->database();
		// $ci->load->library('setupfile');
		//	$ci->setupfile->send("9696006233", "hello");
	    if(get_option('send_msg')==1){
    	    $username="rohit123456";
    		$password="dcntv.16";
    		$sender=get_option('sender');
    	    $mobile=$mobileno;
    	    $message=$msg;
    	   
    		$username=urlencode($username);
    		$password=urlencode($password);
    		$sender=urlencode($sender);
    		$message=urlencode($message);
    		if ($mobile > 1111111111 && $mobile < 9999999999) {
    			$parameters="username=".$username."&password=".$password."&mobile=".$mobile."&sendername=".$sender."&message=".$message;
    
    			$url="http://priority.muzztech.in/sms_api/sendsms.php";
    
    			$ch = curl_init($url);
    
    			if(isset($_POST))
    			{
    				curl_setopt($ch, CURLOPT_POST,1);
    				curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
    			}
    			else
    			{
    				$get_url=$url."?".$parameters;
    
    				curl_setopt($ch, CURLOPT_POST,0);
    				curl_setopt($ch, CURLOPT_URL, $get_url);
    			}
    
    			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
    			curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
    			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
    			
    			$return_val = curl_exec($ch);
    			if($return_val==""){
    				$jbid="Failed";
    				$stat=0;
    			}
    			else{
    				$stat=1;
    				$jbid=$return_val;
    			}
    			if($ci->session->userdata('userid')){
                    insert_sms_track($ci->session->userdata('userid'),$touserid,true,$jbid,$msg);
                }else{
                   insert_sms_track(0,$touserid,true,$jbid,$msg);
                }
    			
    		}else{
    		    if($ci->session->userdata('userid')){
                    insert_sms_track($ci->session->userdata('userid'),$touserid,false,'invalid mobile no',$msg);
                }else{
                    insert_sms_track(0,$touserid,false,'invalid mobile no',$msg);
                }
    		  
    		}
	    }
	}
	
	function insert_sms_track($byuserid,$touserid,$status,$desc,$msg)
	{
		$ci =& get_instance();
		$ci->load->database();
		$details=array
		       (
				    'BY_USERID'=>$byuserid,
				    'TO_USERID'=>$touserid,
				    'STATUS'=>$status,
				    'DESC'=>$desc,
				    'MESSAGE'=>$msg,
			    );
		$ci->db->insert('sms_track',$details);
		return true;
	}
	function get_payouts_by_date($from,$to,$user){
	    
	  
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		$ledger_dt=get_ledger_name("ledger_".$user);
		$id=$ledger_dt[0]->ID;
	    $sql="Select * from accounts LEFT JOIN hrm_post on hrm_post.HRM_ID='".$user."' where DR_ID='".$id."' and CR_ID='9' and DATE(DATE)>='".$from."' and DATE(DATE)<='".$to."'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function get_payouts_by_date_month($from,$to){
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
	    $sql="Select * from accounts where CR_ID='9' and DATE(DATE)>='".$from."' and DATE(DATE)<='".$to."'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return $row;
		}else{
		   return '';
		}
	}
	function check_paid_or_not($ac_id){
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
	    $sql="Select * from pending_payments where STATUS='0' and ACCOUNT_ID='".$ac_id."'";
        $query = $ci->db->query($sql);
	    $row = $query->result();
	    if(!empty($row)){
		   return 1;
		}else{
		   return 0;
		}
	}
	function update_non_wrk_status($hrm,$status,$level)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		
		$sql = "update `non_working_track` set STATUS='".$status."' where HRM_ID='".$hrm."' and NON_TRACK_LEVEL='".$level."'"; 
		$query = $ci->db->query($sql);
		
	}
	function  direct_member_list($hrm_id,$mlm_desc){
	    $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from hrm_level_tracking LEFT JOIN hrm_post on hrm_post.HRM_ID=hrm_level_tracking.HRM_ID where hrm_level_tracking.SPONSOR_ID='".$hrm_id."' and LEVEL_ID='1' and MLM_DESC_ID='".$mlm_desc."' and hrm_level_tracking.HRM_ID!=5000"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		   return $row;
		}
	}
	function get_down_parent_hrms_lev_0($hrm_id,$mlm_desc){
	   
	    $ci=& get_instance();
		$ci->load->database(); 
	    $sql = "select HRM_ID from hrm_level_tracking where POSITION_ID='".$hrm_id."' and LEVEL_ID=1 and MLM_DESC_ID='".$mlm_desc."' and HRM_ID!=5000"; 
	    $query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
	        return 	$row[0]->HRM_ID;
		}else{
		    return '';
		}
	}
	function allposts_count_by_user($mlm_desc,$users)
    {   
        $ci=& get_instance();
		$ci->load->database(); 
       /* used in member dasdhboard */
       
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" and HRM_STATUS=1');
        $result=$query->result();
        if(!empty($result)){ 
            $arr=array();
        
    		foreach($result as $results){
    		    $hrm_id=$results->HRM_ID;
    		   for($x=0;$hrm_id!=5000;$x++){
    			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
    			    if($hrm_id==$users){
    					$arr[]=$results->HRM_ID;
    				}
    			}
    		}
    		$user_ids = "'" . implode ( "', '", $arr ) . "'";
    	
    	    $query=$ci->db->query('Select * from hrm_post where HRM_ID IN ('.$user_ids.')');
            return $query->num_rows(); 
            //$resultnew=$query->result();
      } 
    }
    function alldown_check($mlm_desc,$userid,$level)
    {   
        $ci=& get_instance();
		$ci->load->database(); 
		
        $users=	$userid;
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" and HRM_STATUS=1 ORDER by ID ASC');
        $result=$query->result();
        if(!empty($result)){ 
            $arr=array();
        
    		foreach($result as $results){
    		    $hrm_id=$results->HRM_ID;
    		   for($x=0;$hrm_id!=5000;$x++){
    			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
    			    if($hrm_id==$users){
    					$arr[]=$results->HRM_ID;
    				}
    			}
    		}
    		$user_ids = "'" . implode ( "', '", $arr ) . "'";
    	
    	    $query=$ci->db->query('Select * from hrm_post h LEFT JOIN hrm_post_meta p on p.HRM_ID=h.HRM_ID where h.HRM_ID IN ('.$user_ids.') and p.HRM_KEY="level" and p.HRM_VALUE="'.$level.'" ORDER by h.ID ASC');
            return $query->num_rows();  
      }else{
          return 0;
      }
    }
	function allposts_count($mlm_desc)
    {   
        $ci=& get_instance();
		$ci->load->database(); 
		
        $users=	$ci->session->userdata('userid');
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" and HRM_STATUS=1 ORDER by ID ASC');
        $result=$query->result();
        if(!empty($result)){ 
            $arr=array();
        
    		foreach($result as $results){
    		    $hrm_id=$results->HRM_ID;
    		   for($x=0;$hrm_id!=5000;$x++){
    			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
    			    if($hrm_id==$users){
    					$arr[]=$results->HRM_ID;
    				}
    			}
    		}
    		$user_ids = "'" . implode ( "', '", $arr ) . "'";
    	
    	    $query=$ci->db->query('Select * from hrm_post where HRM_ID IN ('.$user_ids.') ORDER by ID ASC');
           return $query->num_rows();  
      }else{
          return 0;
      }
    }
    function get_amount($arr){
        if(!empty($arr)){
            $ci=& get_instance();
    		$ci->load->database(); 
    		$user_ids = "'" . implode ( "', '", $arr ) . "'";
    	    $query=$ci->db->query('Select group_concat(hp.HRM_VALUE) as packages from hrm_post h LEFT JOIN hrm_post_meta hp on hp.HRM_ID=h.HRM_ID where h.HRM_ID IN ('.$user_ids.') and hp.HRM_KEY="package" ORDER by h.ID ASC');
    	    if($query->num_rows()>0)
            {
                $arr=$query->result();  
                $arr=explode(',',$arr[0]->packages);
                $sum=0;
                foreach($arr as $amtid){
                    $sum+=get_epin_amt_by_id($amtid);
                }
                return $sum;
               
            }
        }else{
            return 0;
        }
        
    }
    function totaldown($users,$mlm_desc)
    {   
        $ci=& get_instance();
		$ci->load->database(); 
		
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" and HRM_STATUS=1 ORDER by ID ASC');
        $result=$query->result();
        if(!empty($result)){ 
            $arr=array();
            foreach($result as $results){
    		    $hrm_id=$results->HRM_ID;
    		   for($x=0;$hrm_id!=5000;$x++){
    			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
    			    if($hrm_id==$users){
    					$arr[]=$results->HRM_ID;
    				}
    			}
    		}
    		return get_amount($arr);
            
      }
    }
    function all_free_count()
    {   
        $ci=& get_instance();
		$ci->load->database(); 
        $users=	$ci->session->userdata('userid');
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" and HRM_STATUS=2 and HRM_PAID_DATE="0000-00-00 00:00:00"');
        return $query->num_rows();  
    
    }
    
    function allposts($limit,$start,$col,$dir,$mlm_desc)
    {   
        $ci=& get_instance();
		$ci->load->database(); 
        $users=	$ci->session->userdata('userid');
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'"  and HRM_STATUS=1 ORDER by ID ASC');
        $result=$query->result();
        if(!empty($result)){ 
                $arr=array();
            
        		foreach($result as $results){
        		    $hrm_id=$results->HRM_ID;
        		   for($x=0;$hrm_id!=5000;$x++){
        			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
        			    if($hrm_id==$users){
        					$arr[]=$results->HRM_ID;
        				}
        			}
        		}
        		$user_ids = "'" . implode ( "', '", $arr ) . "'";
        		$query=$ci->db->query('Select * from hrm_post where HRM_ID IN ('.$user_ids.')  ORDER BY ID '.$dir.' limit '.$limit.' OFFSET '.$start.'');
                if($query->num_rows()>0)
                {
                    return $query->result(); 
                }
                else
                {
                    return null;
                }
          }else{
               return null;
          }
       
        
    }
   
    function posts_search($limit,$start,$search,$col,$dir,$mlm_desc)
    {
        
        $ci=& get_instance();
		$ci->load->database(); 
        $users=	$ci->session->userdata('userid');
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'"  and HRM_STATUS=1 ORDER by ID ASC');
        $result=$query->result();
        if(!empty($result)){ 
                $arr=array();
            
        		foreach($result as $results){
        		    $hrm_id=$results->HRM_ID;
        		   for($x=0;$hrm_id!=5000;$x++){
        			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
        			    if($hrm_id==$users){
        					$arr[]=$results->HRM_ID;
        				}
        			
        			}
        		}
        		$user_ids = "'" . implode ( "', '", $arr ) . "'";
        		$query=$ci->db->query('Select * from hrm_post where HRM_ID IN ('.$user_ids.')  and  ( HRM_ID LIKE "%'.$search.'%" OR HRM_NAME LIKE "%'.$search.'%" )  ORDER BY ID '.$dir.' limit '.$limit.' OFFSET '.$start.'');
                if($query->num_rows()>0)
                {
                    return $query->result(); 
                }
                else
                {
                    return null;
                }
          }else{
               return null;
          }
    }

    function posts_search_count($search,$mlm_desc)
    {
        $ci=& get_instance();
		$ci->load->database(); 
		
        $users=	$ci->session->userdata('userid');
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'"  and HRM_STATUS=1 ORDER by ID ASC');
        $result=$query->result();
        if(!empty($result)){ 
                $arr=array();
            
        		foreach($result as $results){
        		    $hrm_id=$results->HRM_ID;
        		   for($x=0;$hrm_id!=5000;$x++){
        			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
        			    if($hrm_id==$users){
        					$arr[]=$results->HRM_ID;
        				}
        				
        			}
        		}
        		$user_ids = "'" . implode ( "', '", $arr ) . "'";
        	
        	    $query=$ci->db->query('Select * from hrm_post where ( HRM_ID LIKE "%'.$search.'%" OR HRM_NAME LIKE "%'.$search.'%" ) and HRM_ID IN ('.$user_ids.')');
               
                return $query->num_rows(); 
         }
    } 
    function get_ledger_id($userid){
        $ci=& get_instance();
		$ci->load->database(); 
		$ledgerid=get_ledger_name("ledger_".$userid);
        $ledgerid=$ledgerid[0]->ID;
        return $ledgerid;
    }
    function get_transactions($userid){
        $ci=& get_instance();
		$ci->load->database(); 
        $ledgerid=get_ledger_id($userid);
        $query=$ci->db->query("Select * from accounts where DR_ID='".$ledgerid."' OR CR_ID='".$ledgerid."'  ORDER BY ID ASC");
        $result=$query->result();
        return $result;
    }
    function get_wallet_balance($userid){
         $ledgerid=get_ledger_id($userid);
         $wallet=get_ledger_dt_by_id($ledgerid);
         
         return $wallet[0]->AMOUNT;
    }
    
    function insert_withdrawreq($userid,$amt,$status,$desc,$prefermethod='',$withdrawlcharge='0')
	{
		$ci =& get_instance();
		$ci->load->database();
		$details=array
		       (
				    'HRM_ID'=>$userid,
				    'AMOUNT'=>$amt,
				    'PREFFERED_METHOD'=>$prefermethod,
				    'WITHDRAWL_CHARGE'=>$withdrawlcharge,
				    'DESCRIPTION'=>$desc,
				    'STATUS'=>$status,
				    'DATE'=>date('Y-m-d'),
				    'TIME_STAMP'=>date('Y-m-d H:i:s'),
			    );
		$ci->db->insert('withdrawl_requests',$details);
		return true;
	}
	function get_withdrawreq_by_stat($userid,$stat)
	{
		$ci =& get_instance();
		$ci->load->database();
		$query=$ci->db->query("Select * from withdrawl_requests where HRM_ID='".$userid."' And STATUS='".$stat."'");
        $result=$query->result();
        return $result;
		
	}
	function admin_get_withdrawreq_by_stat($stat)
	{
		$ci =& get_instance();
		$ci->load->database();
		$query=$ci->db->query("Select * from withdrawl_requests where STATUS='".$stat."'");
        $result=$query->result();
        return $result;
		
	}
	function update_withdrawlreq($withdrawlid,$stat,$key_date){
	    
	    $ci=& get_instance();
		$ci->load->database(); 
		$array=array();
		
	    $sql = "update `withdrawl_requests` set STATUS='".$stat."' , ".$key_date."='".date('Y-m-d H:i:s')."' where WITHDRAW_ID='".$withdrawlid."'"; 
		$query = $ci->db->query($sql);
		
	}
	function insert_kyc($kyc_type_id,$doument_image)
	{
		$ci =& get_instance();
		$ci->load->database();
		$details=array
		       (
				 	'HRM_ID'=>$ci->session->userdata('userid'),
				 	'KYC_TYPE_ID'=>$kyc_type_id,
				 	'STATUS'=>'1',
				 	'KYC_IMAGE'=>$doument_image,
				 	'DATETIME'=>date('Y-m-d H:i:s'),
				);
		$ci->db->insert('kyc_detail',$details);
		return $ci->db->insert_id();
	}
	function get_kyc_type(){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from kyc_type"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
    }
    function get_kyc_doc($userid){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from kyc_detail dt LEFT JOIN kyc_type kt on kt.KYC_TYPE_ID=dt.KYC_TYPE_ID where dt.HRM_ID='".$userid."' and dt.STATUS!=4"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
    }
    function get_kyc_dt($status){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from kyc_detail dt LEFT JOIN kyc_type kt on kt.KYC_TYPE_ID=dt.KYC_TYPE_ID where dt.STATUS='".$status."' and dt.STATUS!=4"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row;
    }
    function get_kyc_type_by_id($id){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from kyc_type where KYC_TYPE_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		return $row[0]->KYC_NAME;
    }
    function update_status_kyc_delete($id){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "update kyc_detail set STATUS='4' where KYC_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		
    }
    function update_kyc_details($id,$stat,$datecolumn){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "update kyc_detail set STATUS='".$stat."' , ".$datecolumn."='".date('Y-m-d H:i:s')."' where KYC_ID='".$id."'"; 
		$query = $ci->db->query($sql);
		
    }
    function update_cancel_reason_kyc($id,$reason){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "update kyc_detail set REJECTED_MSG='".$reason."' where KYC_ID='".$id."'"; 
		$query = $ci->db->query($sql);
	}
	function check_already_approve($kyc_type){
        $ci=& get_instance();
		$ci->load->database(); 
		$sql = "select * from kyc_detail where KYC_TYPE_ID='".$kyc_type."' and STATUS=2 and HRM_ID='".$ci->session->userdata('userid')."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
		    return 1;
		}else{
		    return 0;
		}
	}
	function pay_commission_to_customer($sponserid,$amt,$comtype,$charges_list,$accesdate,$stat){
	    $ci=& get_instance();
		$ci->load->database(); 
	    $dt=Date('Y-m-d');
	    $sum_charge=0;
	  
             $spnoser_ledger=get_ledger_name("ledger_".$sponserid);
             $spnoser_ledgerid=$spnoser_ledger[0]->ID; /*for sponsor account */
             $firstname=get_hrm_postmeta($sponserid,'first_name');
             $lastname=get_hrm_postmeta($sponserid,'last_name');
             $pancard=get_hrm_postmeta($sponserid,'pancard');
             $drid=$spnoser_ledgerid;
             
             $drid=9; /*for comission account */
        	 $crid=3;/*for cash account */
         	 update_amount_ledger(3,(-1)*$amt);
         	 update_amount_ledger(9,$amt);
             $particular='Being cash paid to commision for '.$firstname. ' '.$lastname.' of '.$amt;
        	 insert_record_transaction($drid,$crid,5000,$particular,$amt,$dt);
        	 $drid=$spnoser_ledgerid; /*for sponsor account */
        	 $crid=9;/*for comission account */
         	 update_amount_ledger($drid,$amt);
         	 update_amount_ledger(9,(-1)*$amt);
             $particular='Being commission paid to '.$firstname. ' '.$lastname.' of '.$amt;
             insert_record_transaction($drid,$crid,5000,$particular,$amt,$dt);
             $chargeid='';
             $mlm_charges_aray=get_charges_mlm($charges_list);
             if(!empty($mlm_charges_aray)){
    		     foreach($mlm_charges_aray as $charges){
    	            $ledger_id_charge=$charges->LEDGER_ID;
    	            $charge_name=$charges->CHARGE_TYPE_NAME;
    	            $chargepercent='';
    	            if($charges->CHARGE_MODE==1){
    	                /* for percentage charges */
    	                if($charges->CHARGE_TYPE_ID==2){
    	                     if($pancard!=''){
    	                        $amt_charge=($amt*$charges->AMOUNT)/100;
    	                        $chargepercent=$charges->AMOUNT."%";
    	                     }else{
    	                         $amt_charge=($amt*20)/100;
    	                         $chargepercent="20%";
    	                     }
    	                }else{
    	                    $amt_charge=($amt*$charges->AMOUNT)/100;
    	                    $chargepercent=$charges->AMOUNT."%";
    	                }
    	                $amt_charge=number_format((float)$amt_charge, 2, '.', '');
    	            }else{
    	                if($charges->CHARGE_TYPE_ID==2){
    	                     if($pancard!=''){
    	                        $amt_charge=($amt*$charges->AMOUNT)/100;
    	                        $chargepercent=$charges->AMOUNT." FLAT";
    	                     }else{
    	                         $amt_charge=($amt*20)/100;
    	                         $chargepercent="20 FLAT";
    	                     }
    	                }else{
    	                    $amt_charge=($amt*$charges->AMOUNT)/100;
    	                    $chargepercent=$charges->AMOUNT." FLAT";
    	                }
    	                /* for flat charges */
    	                $amt_charge=$charges->AMOUNT;
    	            }
    		        $sum_charge+=$amt_charge;
    	            $cr_id=$ledger_id_charge;
                    update_amount_ledger($drid,(-1)*$amt_charge);
    		 	    update_amount_ledger($cr_id,$amt_charge);
    		        $particular='Being '.$charge_name.' '.$chargepercent.' deduct for '.$firstname. ' '.$lastname.' of '.$amt_charge;
    			    $id=insert_record_transaction($drid,$cr_id,$ci->session->userdata('userid'),$particular,$amt_charge,$dt);
                    $chargeid.=$id.",";
    		     }
    	    }
	    
	    if($chargeid!=''){
	        $chargeid=substr(trim($chargeid), 0, -1);
	    }
	    insert_wallet_balance($sponserid,$amt-$sum_charge,$comtype,$accesdate,$stat,$chargeid);  
	}
    function get_positionmax(){
         $ci=& get_instance();
		 $ci->load->database(); 
		 $sql = "select MAX(POSITION) as pos from hrm_level_tracking where MLM_DESC_ID=3 and LEVEL_ID=1 and POSITION_ID=5000"; 
		 $query = $ci->db->query($sql);
		 $query =	$query ->result();
		 if(!empty($query)){
		     $query=$query[0]->pos;
		      $query= $query+1;
		     return $query;
		 }else{
		     return 1;
		 }
	}
	

	function get_positionmax_member($level,$position_id){
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select MAX(POSITION) as pos from hrm_level_tracking where MLM_DESC_ID=3 and LEVEL_ID='".$level."' and POSITION_ID='".$position_id."'"; 
		$query = $ci->db->query($sql);
		$query =	$query ->result();
		if(!empty($query)){
			$query=$query[0]->pos;
			 $query= $query+1;
			return $query;
		}else{
			return 1;
		}
   }

    function get_all_nodes_by_admin(){
         $ci=& get_instance();
		 $ci->load->database(); 
		 $sql = "select * from hrm_level_tracking where MLM_DESC_ID=3 and LEVEL_ID=1 and POSITION_ID=5000 and HRM_ID!=5000"; 
		 $query = $ci->db->query($sql);
		 $query =	$query ->result();
		 return $query;
    }
	/* dashoboard function */
	function get_today_joining(){
	     $ci=& get_instance();
		 $ci->load->database(); 
		 $sql = "select COUNT(*) as total from hrm_post where DATE(HRM_DATE)=CURDATE() and HRM_STATUS=1"; 
		 $query = $ci->db->query($sql);
		 $row = $query->result();
		 if(!empty($row)){
		    return $row[0]->total;
		 }else{
		    return 0;
		 }
	}
	function get_today_free_joining(){
	     $ci=& get_instance();
		 $ci->load->database(); 
		 $sql = "select COUNT(*) as total from hrm_post where DATE(HRM_DATE)=CURDATE() and HRM_STATUS=2"; 
		 $query = $ci->db->query($sql);
		 $row = $query->result();
		 if(!empty($row)){
		    return $row[0]->total;
		 }else{
		    return 0;
		 }
	}
	function get_today_products($packge_id){
	     $ci=& get_instance();
		 $ci->load->database(); 
		 $sql = "select COUNT(*) as total from hrm_post main LEFT JOIN hrm_post_meta hrm_pst on hrm_pst.HRM_ID=main.HRM_ID where DATE(main.HRM_DATE)=CURDATE() and main.HRM_STATUS=1 and hrm_pst.HRM_KEY='package' and HRM_VALUE='".$packge_id."'"; 
		 $query = $ci->db->query($sql);
		 $row = $query->result();
		 if(!empty($row)){
		    return $row[0]->total;
		 }else{
		    return 0;
		 }
	}
	function today_topups(){
	     $ci=& get_instance();
		 $ci->load->database(); 
		 $sql = "select COUNT(*) as total from hrm_post main where DATE(main.HRM_DATE)=CURDATE() and main.HRM_STATUS=1 and main.HRM_PAID_DATE!='0000-00-00 00:00:00'"; 
		 $query = $ci->db->query($sql);
		 $row = $query->result();
		 if(!empty($row)){
		    return $row[0]->total;
		 }else{
		    return 0;
		 }
	}
	function today_generatedepin(){
	     $ci=& get_instance();
		 $ci->load->database(); 
		 $sql = "select COUNT(*) as total from epin where DATE(ISSUED_DATE)=CURDATE()"; 
		 $query = $ci->db->query($sql);
		 $row = $query->result();
		 if(!empty($row)){
		    return $row[0]->total;
		 }else{
		    return 0;
		 }
	}
	function total_kyc_status($status){
	     $ci=& get_instance();
		 $ci->load->database(); 
		 $sql = "select COUNT(*) as total from kyc_detail where STATUS='".$status."'"; 
		 $query = $ci->db->query($sql);
		 $row = $query->result();
		 if(!empty($row)){
		    return $row[0]->total;
		 }else{
		    return 0;
		 }
	}
	function getfirstleveltopay($hrmid){
	    $ci=& get_instance();
		$ci->load->database(); 
        $sql = "SELECT WALLET_AMOUNT FROM wallet_balance WHERE (WALLET_STATUS='0' OR WALLET_STATUS='2') and COMMISSION_TYPE=2 and HRM_ID='".$hrmid."' ORDER BY WALLET_ID ASC LIMIT 1"; 
		 $query = $ci->db->query($sql);
		 $row = $query->result();
		 if(!empty($row)){
		    return $row[0]->WALLET_AMOUNT;
		 }else{
		    return 0;
		 }
	}
	function updatefirstleveltopay($hrmid){
	    $ci=& get_instance();
		$ci->load->database(); 
        $sql = "update wallet_balance set WALLET_STATUS=2 WHERE WALLET_STATUS='0' and COMMISSION_TYPE=2 and HRM_ID='".$hrmid."' ORDER BY WALLET_ID ASC LIMIT 1"; 
	    $query = $ci->db->query($sql);
		 
	}
	function get_withdrawl_income_stat($hrmid,$stat){
	    $ci=& get_instance();
		$ci->load->database(); 
        $sql = "SELECT SUM(AMOUNT) as amt FROM withdrawl_requests WHERE STATUS IN (".$stat.") and HRM_ID='".$hrmid."' ORDER BY WITHDRAW_ID ASC"; 
    	$query = $ci->db->query($sql);
    	$row = $query->result();
    	if(!empty($row)){
    	   return $row[0]->amt;
    	}else{
    	   return 0;
    	}
	}
	function get_count_withdrawl_income_stat($stat){
	    $ci=& get_instance();
		$ci->load->database(); 
        $sql = "SELECT COUNT(*) as ct FROM withdrawl_requests WHERE STATUS IN (".$stat.") ORDER BY WITHDRAW_ID ASC"; 
    	$query = $ci->db->query($sql);
    	$row = $query->result();
    	if(!empty($row)){
    	   return $row[0]->ct;
    	}else{
    	   return 0;
    	}
	}
    function to_renew_perform_bonus(){
        $ci=& get_instance();
		$ci->load->database(); 
		$query=$ci->db->query('Select HRM_ID from hrm_post where HRM_STATUS=1 and HRM_ID!=5000 order by ID ASC');
        $result=$query->result();
        foreach($result as $res){
            $netmnth=get_hrm_postmeta($res->HRM_ID,'netmnth');
            if($netmnth!=''){
                $countmnth=get_hrm_postmeta($res->HRM_ID,'countmnth');
                $netmnth=get_hrm_postmeta($res->HRM_ID,'netmnth');
                $amount=get_hrm_postmeta($res->HRM_ID,'performamt');
                $dateexpired=strtotime(get_hrm_postmeta($res->HRM_ID,'dateexpired'));
                $datereleased=get_hrm_postmeta($res->HRM_ID,'datereleased');
                $nextdate= strtotime(date('Y-m-d', strtotime("+$countmnth months", strtotime($datereleased))));
                $current_date=strtotime(date('Y-m-d'));
                if($current_date<$dateexpired && $countmnth<$netmnth){
                    if($current_date>=$nextdate){
                        $current_date=date('Y-m-d');
                		$nextdate= date('Y-m-d', strtotime("+$countmnth months", strtotime($datereleased)));
                		$diff=get_month_diff($nextdate,$current_date);
                        for($i=0;$i<$diff;$i++){
                            $countmnth=get_hrm_postmeta($res->HRM_ID,'countmnth');
                            pay_commission_to_customer($res->HRM_ID,$amount,3,'1,2',date('Y-m-d'),1);/* for perform comission */
                            update_hrmpost_meta($res->HRM_ID,'countmnth',$countmnth+1);
                        }
                    }
                }
            }
        }
    }
	function get_month_diff($date1,$date2){
	    $ts1 = strtotime($date1);
        $ts2 = strtotime($date2);
        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);
        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);
        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        return $diff;
	}
	/* withdrawl requests*/
	function liable_amount_to_pay($hrmid){
	     $ci=& get_instance();
		 $ci->load->database(); 
		 $sum=0;
		 $sum+=get_sum_wallet_balance_type($hrmid,1);
		 $sum+=get_sum_wallet_balance_type($hrmid,2);
		 $sum+=get_sum_wallet_balance_type($hrmid,3);
		 $sum+=get_sum_wallet_balance_type($hrmid,4);
		 $sum+=get_sum_wallet_balance_type($hrmid,5);
		 $sum+=get_sum_wallet_balance_type($hrmid,6);
	     $payable_income=$sum;
		 $alreadyrequested=get_withdrawl_income_stat($hrmid,'0,1');
		 $date=date('Y-m-d');
         $netpayable=$payable_income-$alreadyrequested-get_sum_withdrawl_amt('2018-01-01',date('Y-m-d'),$hrmid);
		 return $netpayable;
	}
	function cron_update_wallet_level(){
	     $ci=& get_instance();
		 $ci->load->database(); 
		 $date=date('Y-m-d');
         $ts = strtotime($date);
         $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
         $start_date = date('Y-m-d', $start);
         //$start_date='2019-02-10';
		 $sql = "SELECT * FROM wallet_balance WHERE WALLET_STATUS='2' AND DATE_TIME<'".$start_date."' and COMMISSION_TYPE='2' ORDER BY WALLET_ID ASC"; 
    	 $query = $ci->db->query($sql);
    	 $row = $query->result();
    	 if(!empty($row)){
    	   foreach($row as $wallet_id){
    	       $sql = "update wallet_balance set WALLET_STATUS=1 WHERE WALLET_ID='".$wallet_id->WALLET_ID."'"; 
    	       $query = $ci->db->query($sql);
    	       update_mlm_option($wallet_id->HRM_ID,'');
    	   }
    	 }
	}
	function allposts_count_user($mlm_desc,$users)
    {   
        $ci=& get_instance();
		$ci->load->database(); 
        
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" ORDER BY ID asc');
        $result=$query->result();
        if(!empty($result)){ 
            $arr=array();
        
    		foreach($result as $results){
    		    $hrm_id=$results->HRM_ID;
    		   for($x=0;$hrm_id!=5000;$x++){
    			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
    			    if($hrm_id==$users){
    					$arr[]=$results->HRM_ID;
    				}
    			}
    		}
    		if(!empty($arr)){
        		$user_ids = "'" . implode ( "', '", $arr ) . "'";
        	    $query=$ci->db->query('Select * from hrm_post where HRM_ID IN ('.$user_ids.') ORDER BY ID ASC');
                return $query->num_rows();  
    		}else{
    		    return 0;
    		}
            //$resultnew=$query->result();
      }
    }
    function allposts_by_user_report($mlm_desc,$users,$datefrom,$dateto)
    {   
        $ci=& get_instance();
		$ci->load->database(); 
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" ORDER BY ID asc');
        $result=$query->result();
        if(!empty($result)){ 
                $arr=array();
            
        		foreach($result as $results){
        		    $hrm_id=$results->HRM_ID;
        		   for($x=0;$hrm_id!=5000;$x++){
        			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
        			    if($hrm_id==$users){
        					$arr[]=$results->HRM_ID;
        				}
        			}
        		}
        	    $user_ids = "'" . implode ( "', '", $arr ) . "'";
        	    
        	    $query=$ci->db->query('Select * from hrm_post where HRM_ID IN ('.$user_ids.')  and DATE(HRM_DATE)>="'.$datefrom.'" and DATE(HRM_DATE)<="'.$dateto.'" ORDER BY ID ASC');
                if($query->num_rows()>0)
                {
                    return $query->result(); 
                }
                else
                {
                    return null;
                }
          }else{
               return null;
          }
    }
    function allposts_user($limit,$start,$col,$dir,$mlm_desc,$users)
    {   
        $ci=& get_instance();
		$ci->load->database(); 
        
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" ORDER BY ID asc');
        $result=$query->result();
        if(!empty($result)){ 
                $arr=array();
            
        		foreach($result as $results){
        		    $hrm_id=$results->HRM_ID;
        		   for($x=0;$hrm_id!=5000;$x++){
        			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
        			    if($hrm_id==$users){
        					$arr[]=$results->HRM_ID;
        				}
        			}
        		}
        	   $user_ids = "'" . implode ( "', '", $arr ) . "'";
        	    $query=$ci->db->query('Select * from hrm_post where HRM_ID IN ('.$user_ids.')  ORDER BY ID ASC limit '.$limit.' OFFSET '.$start.'');
                 if($query->num_rows()>0)
                {
                    return $query->result(); 
                }
                else
                {
                    return null;
                }
          }else{
               return null;
          }
       
        
    }
   
    function posts_search_user($limit,$start,$search,$col,$dir,$mlm_desc,$users)
    {
         $ci=& get_instance();
		$ci->load->database(); 
       
       
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" ORDER BY ID asc');
        $result=$query->result();
        if(!empty($result)){ 
                $arr=array();
            
        		foreach($result as $results){
        		    $hrm_id=$results->HRM_ID;
        		   for($x=0;$hrm_id!=5000;$x++){
        			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlm_desc);
        			    if($hrm_id==$users){
        					$arr[]=$results->HRM_ID;
        				}
        			}
        		}
        	    $user_ids = "'" . implode ( "', '", $arr ) . "'";
        	    $query=$ci->db->query('Select * from hrm_post where ( HRM_ID LIKE "%'.$search.'%" OR HRM_NAME LIKE "%'.$search.'%" ) and HRM_ID IN ('.$user_ids.')  ORDER BY ID ASC limit '.$limit.' OFFSET '.$start.'');
                 if($query->num_rows()>0)
                {
                    return $query->result(); 
                }
                else
                {
                    return null;
                }
          }else{
               return null;
          }
    }

    function posts_search_count_user($search,$mlmdesc,$users)
    {
        $ci=& get_instance();
		$ci->load->database(); 
        
        $query=$ci->db->query('Select * from hrm_post where HRM_ID!="'.$users.'" ORDER BY ID asc');
        $result=$query->result();
        if(!empty($result)){ 
                $arr=array();
            
        		foreach($result as $results){
        		    $hrm_id=$results->HRM_ID;
        		   for($x=0;$hrm_id!=5000;$x++){
        			    $hrm_id=get_reverse_parent_hrms_lev_0($hrm_id,$mlmdesc);
        			    if($hrm_id==$users){
        					$arr[]=$results->HRM_ID;
        				}
        			}
        		}
        		$user_ids = "'" . implode ( "', '", $arr ) . "'";
        	    $query=$ci->db->query('Select * from hrm_post where ( HRM_ID LIKE "%'.$search.'%" OR HRM_NAME LIKE "%'.$search.'%" ) and HRM_ID IN ('.$user_ids.')');
               
                return $query->num_rows(); 
               
                
          }
    } 
	function check_id_todo_what($hrm){
	    $ci=& get_instance();
		$ci->load->database(); 
        $query=$ci->db->query('Select * from self_level_pair where HRM_ID="'.$hrm.'" ORDER BY ID asc where (HRM_LEFT_ID="" OR HRM_RIGHT_ID="")');
        $result=$query->result();
        return $result;
	}
	function insert_priority($hrmid,$mlmdesc){
        $ci=& get_instance();
		$ci->load->database(); 
        $sql = "INSERT INTO `priority_table`(`HRM_ID`, `MLM_DESC_ID`, `POSITION_ID`,`CURRENT_LEVEL`) VALUES ('".$hrmid."','".$mlmdesc."','1','0')"; 
		$query = $ci->db->query($sql);
    }
    function get_current_pos($sponsorid,$mlm_desc){
        $ci=& get_instance();
		$ci->load->database(); 
	    $query=$ci->db->query('Select COUNT(*) as cnt from priority_table where MLM_DESC_ID="'.$mlm_desc.'"');
        $result=$query->result();
        $position=get_option('auto_poolid'.$mlm_desc);
        $lastblank=$position;
        if($result[0]->cnt>1){
    	    for($i=1;$position!='';$i++){
    	        $fullpos=get_current_priority($position,$mlm_desc);
    	        $position=new_down_parent_by_pos($position,$mlm_desc,$fullpos[0]->POSITION_ID);
    	        if($position!=''){
    	            $lastblank=$position;
    	        }
    	    }
    	    $fullpos=get_current_priority($lastblank,$mlm_desc);    
    		$arr[0]=$fullpos[0]->POSITION_ID; /* this is for pos */
    		$arr[1]=$fullpos[0]->HRM_ID; /* this is for parent */
        }else{
            $arr[0]=1; /* pos 1 for left */
    		$arr[1]=5000;/* position id */
        }
		return $arr;
    }
    function get_current_priority($hrmid,$mlm_desc){
        $ci=& get_instance();
		$ci->load->database(); 
        $sql = "Select * from  `priority_table` where HRM_ID='".$hrmid."' and MLM_DESC_ID='".$mlm_desc."'"; 
		$query = $ci->db->query($sql);
		$query = $query->result();
		return $query;
    }
    function new_down_parent_by_pos($hrm_id,$mlm_desc,$pos){
	   
	    $ci=& get_instance();
		$ci->load->database(); 
	    $sql = "select HRM_ID from hrm_level_tracking where POSITION_ID='".$hrm_id."' and POSITION='".$pos."' and LEVEL_ID=1 and MLM_DESC_ID='".$mlm_desc."' and HRM_ID!=5000"; 
	    $query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
	        return 	$row[0]->HRM_ID;
		}else{
		    return '';
		}
	}
	function get_max_level($mlm_desc){
	    $ci=& get_instance();
		$ci->load->database(); 
	    $sql = "select MAX(LEVELS) as LEVELS from mlm_stages where MLM_DESC_ID='".$mlm_desc."'"; 
	    $query = $ci->db->query($sql);
		$row = $query->result();
		if(!empty($row)){
	        return 	$row[0]->LEVELS;
		}else{
		    return '';
		}
	}
	function update_priority($hrm_id,$mlm_desc){
        $ci=& get_instance();
		$ci->load->database();
		$array=array();
		$orighrm=$hrm_id;
	    if($hrm_id!='5000'){
	      
	        /* for updating levels */
	        for($x=0;$hrm_id!='5000';$x++){
			    $hrm_id=get_reverse_parent_hrms($hrm_id,$mlm_desc);
			     if($hrm_id!='5000'){
					$array[]=$hrm_id;
					$current_level=get_current_priority($hrm_id,$mlm_desc);
					$valid=get_level_row_to_give($hrm_id,$current_level[0]->CURRENT_LEVEL,$mlm_desc);
					if($valid==1){
					     update_priority_key($hrm_id,$mlm_desc,'CURRENT_LEVEL',$current_level[0]->CURRENT_LEVEL+1);
					}
				}
			}  
			 
	        /* first parent */
    		$hrm_id=get_reverse_parent_hrms($orighrm,$mlm_desc);
    		$parenthrm=$hrm_id;
    		$checkcount=get_two_just_down($hrm_id,$mlm_desc);
    		if($checkcount<2){
    		    update_priority_key($hrm_id,$mlm_desc,'POSITION_ID',2);
    		}
    		else if($checkcount==2){
    		    update_priority_key($hrm_id,$mlm_desc,'POSITION_ID',1);
    		    for($x=0;$hrm_id!='5000';$x++){
    			    $hrm_id=get_reverse_parent_hrms($hrm_id,$mlm_desc);
    			    if($hrm_id!='5000'){
    					$pos=get_current_priority($hrm_id,$mlm_desc)[0]->POSITION_ID;
            		    if($pos<2){
            		        update_priority_key($hrm_id,$mlm_desc,'POSITION_ID',$pos+1);
            		        break;
            		    }else{
            		        update_priority_key($hrm_id,$mlm_desc,'POSITION_ID',1);
            		    }
            		}
            	}
    		}
    		/* for giving the autopool income */
    		$fresharr=array();
    		for($x=0;$orighrm!='5000';$x++){
			    $orighrm=get_reverse_parent_hrms($orighrm,$mlm_desc);
			    if($orighrm!='5000'){
					$fresharr[]=$orighrm;
				}
			} 
			
			if(!empty($fresharr)){
			    foreach($fresharr as $hrm_id){
			        insert_count_nodes($hrm_id,$mlm_desc);
        		    $stagewise_sponsor_level=get_hrm_postmeta($hrm_id,'autopool'.$mlm_desc.'level');
        		    $count_nodes=get_member_nodes($hrm_id,$mlm_desc);
        		    $full_dt=get_mlm_stages($mlm_desc,$stagewise_sponsor_level);/*main line */
        		    $check_node=get_members_valid($stagewise_sponsor_level);
        		    $descmaxlevel=get_max_level($mlm_desc);
        		   
        		    if($check_node<=$count_nodes){
        		        if(!empty($full_dt)){
            		        $amt=$full_dt[0]->AMOUNT;
            		        if($amt>0){
            		            pay_commission_to_customer($hrm_id,$amt,$mlm_desc,'0',date('Y-m-d'),1);
            		        }
        		        }
        		        $arr=hrm_level_track($stagewise_sponsor_level,$hrm_id,$mlm_desc);
        				$sponsor_level=$arr[0]->LEVEL_ID+1;
        				$pos=$arr[0]->POSITION;
        				$added_by=$arr[0]->ADDED_BY;
        				$positionid=$arr[0]->POSITION_ID;
        				$sponserids_prev=$arr[0]->SPONSOR_ID;
        				insert_hrm_level_track($mlm_desc,$sponsor_level,$hrm_id,$pos,$added_by,$positionid,$sponserids_prev);
        				update_hrmpost_meta($hrm_id,'autopool'.$mlm_desc.'level',$sponsor_level);
        				//need to implemented here 
        				if($sponsor_level>$descmaxlevel){
        				     $newmlm_desc=$mlm_desc+1;
        				     insert_hrm_level_free_track($newmlm_desc,1,$hrm_id,$pos,$added_by,$positionid,$sponserids_prev);
        				     //for auto pool up coming
        				   /* $newmlm_desc=$mlm_desc+1;
        				    if(get_option('auto_pool'.$newmlm_desc)==0){
			                    update_mlm_option('auto_poolid'.$newmlm_desc,$hrm_id);
			                    update_mlm_option('auto_pool'.$newmlm_desc,1);
			                }
        				    update_hrmpost_meta($hrm_id,'autopool'.$newmlm_desc.'level',1);
        				    insert_count_nodes($hrm_id,$newmlm_desc);
        				    insert_priority($hrm_id,$newmlm_desc);
			                $getpos=get_current_pos($sponserids_prev,$newmlm_desc);
			               
                    		$positionno=$getpos[0];
                            $positionid=$getpos[1];
                            insert_hrm_level_track($newmlm_desc,1,$hrm_id,$positionno,$added_by,$positionid,$sponserids_prev);
                            update_priority($hrm_id,$newmlm_desc);
                	        */
                		}
        			}
        		}
			}
			
		}
    }
    function get_two_just_down($hrm,$mlmdesc)
	{
		$ci=& get_instance();
		$ci->load->database(); 
		$sql = "select count(*) as cnt from hrm_level_tracking where POSITION_ID='".$hrm."' and LEVEL_ID='1' and MLM_DESC_ID='".$mlmdesc."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
		$arr=array();
		if(!empty($row)){
		    return $row[0]->cnt;
		}else{
		    return '0';
		}
	}
    function update_priority_key($hrmid,$mlm_desc,$key,$value){
        $ci=& get_instance();
		$ci->load->database(); 
        $sql = "update `priority_table` set ".$key."='".$value."' where HRM_ID='".$hrmid."' and MLM_DESC_ID='".$mlm_desc."'"; 
		$query = $ci->db->query($sql);
	}
    function get_level_row_members($hrmid,$level){
        $arr=array();
        $main_arr=array();
        
        for($i=1;$i<=$level;$i++){
            if(empty($arr)){
                $get_downs=get_three_member_just_down($hrmid,3);
                foreach($get_downs as $down){
                   $arr[]=$down->HRM_ID;
                }
                $main_arr=$arr;
            }else{
                $arr=array();
                if(!empty($main_arr)){
                    foreach($main_arr as $res){
                        $get_downs=get_three_member_just_down($res,3);
                        if(!empty($get_downs)){
                            foreach($get_downs as $down){
                               $arr[]=$down->HRM_ID;
                            }
                        }
                    }
                }
                $main_arr=$arr;
           }
        }
        $checkz_arr=array();
        $checkz_arr[0]=count($main_arr);
        $checkz_arr[1]=1;
        return $checkz_arr;
       
    }
    
    function get_level_row_to_give($hrmid,$level,$mlm_desc){
        $arr=array();
        $main_arr=array();
        $check=1;
        for($i=0;$i<=$level;$i++){
            if(empty($arr)){
                $get_downs=get_three_member_just_down($hrmid,$mlm_desc);
                if(!empty($get_downs)){
                    foreach($get_downs as $down){
                       $arr[]=$down->HRM_ID;
                    }
                    $main_arr=$arr;
                }else{
                    break;
                }
            }else{
                $arr=array();
                foreach($main_arr as $res){
                    $get_downs=get_three_member_just_down($res,$mlm_desc);
                    if(!empty($get_downs)){
                        foreach($get_downs as $down){
                           $arr[]=$down->HRM_ID;
                        }
                    }else{
                        break;
                    }
                }
                $main_arr=$arr;
           }
        }
        $countlevel=get_members_validnew($level+1);
        if($countlevel==count($main_arr)){
            return 1;
        }else{
            return 0;
        }
    }
    function get_members_validnew($level){
	    $sum=0;
        $sum=pow(2,$level);
        
        return $sum;
	}
	//dashbord function
	function get_today_used_epin(){
	    $ci=& get_instance();
		$ci->load->database(); 
        $sql = "Select COUNT(*) as cnt from epin where DATE(USED_DATE)='".date('Y-m-d')."'"; 
		$query = $ci->db->query($sql);
		$query=$query->result();
		if(!empty($query)){
		    return $query[0]->cnt;
		}else{
		    return 0;
		}
	}
?>