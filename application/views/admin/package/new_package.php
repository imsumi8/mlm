<?php
    
    // $query=$this->db->query('Select HRM_ID,HRM_NAME from hrm_post where HRM_STATUS=1 and HRM_ID!=5000 ORDER BY ID ASC');
    // $result=$query->result();
    // $large_arr=array();
    // foreach($result as $res){
    //       $minarray=array();
    //       $minarray['label']=$res->HRM_ID." [ ".$res->HRM_NAME." ]";
    //       $minarray['value']=$res->HRM_ID;
    //       array_push($large_arr,$minarray);
    // }
   
//echo "yess".print_r(get_level_row_members('NAM2763873','2'));
?>

<script>
		</script>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
                           <div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Package Purchase</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div  class="pills-struct">
								<ul role="tablist" class="nav nav-pills" id="myTabs_6">
									<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#home_6">Buy Package</a></li>
									<!--<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#profile_6" aria-expanded="false">Free Registration</a></li>-->
								</ul>
								<div class="tab-content" id="myTabContent_6">
									<div  id="home_6" class="tab-pane fade active in" role="tabpanel">

								    	<form id="joinpackage" action=''>
								    	    <input type="hidden" id="checkedform" value='0'>
								    	    <?php  if($this->session->userdata('hrmtype') != 'admin') { 
								    	        
								    	          $arr=get_hrm_post($this->session->userdata('userid'));
								    	    ?>
								    	        <input type="hidden" class="usrnm" value="<?php echo trim($arr[0]->HRM_NAME," "); ?>">
											<?php } else { ?>
												 <input type="hidden" class="usrnm" value="">
												
											<?php } ?>
								    	   
            							    <div class="sections">
            									<div class="row">
            										<div class="col-md-6 col-xs-6">
            											<!-- <div class="head">TRANSACTION & SECURITY</div> -->
            										</div>
            										<div class="col-md-6 col-xs-6 text-right">
            											<!-- <i class="fa btn btn-primary slides_class fa-minus"></i> -->
            										</div>
            									</div>
            									<div class="inner_sec_slide">
                								
                									<div class="row">
                									    <div class="col-md-4">
                											<div class="form-group">
                												<div><label>Package <span class="star">*</span></label></div>
                												<select name="pack" class="form-control">
                													<?php foreach($packs as $pack) { 
																		
																		$amt_id = get_amtid_by_epin($this->uri->segment(3));

																		if($pack->PACKAGE_ID != $amt_id)
																		continue;

																		?>
                													    <option value="<?php echo $pack->PACKAGE_ID;?>" attr-price="<?php echo $pack->PACKAGE_PRICE; ?>"><?php echo $pack->PACKAGE_NAME." [ ".$pack->PACKAGE_PRICE." ]";?></option>
                													<?php } ?>
                												</select>   
                											</div>
                										</div>
                									    <div class="col-md-4">
                											<div class="form-group">
                												<div><label>Sponsor Id <span class="star">*</span></label></div>
                												<?php  if($this->session->userdata('hrmtype') != 'admin') { ?>
                												<input type="text" name="sponserid" class="form-control" value="<?php echo get_hrm_postmeta($this->session->userdata('userid'),'sponsorid'); ?>" style="text-transform: uppercase;" readonly> 
                												<?php } else { ?>
                												<input type="text" name="sponserid" class="form-control" style="text-transform: uppercase;" value=""> 
                												<?php } ?>
                											</div>
                										</div>
                                         
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>E-PIN No. <span class="star">*</span></label></div>
																<input type="text" name="epinno" class="form-control" value="<?php echo $this->uri->segment(3); ?>" readonly> 
		
                												
                											</div>
                										</div>
                									
                									</div>
                								
            									</div>
            								</div>
            							
            								<div class="">
            								   <div class="row">
            								       
            										<div class="col-md-12 text-center">
            											<input type="submit" class="btn btn-primary submitpackage sections" value="JOIN">
            											
            										</div>
            									</div>
            								</div>
            							</form>
									</div>
									
								</div>
							</div>
						
						</div>
					</div>
					
				</div> 
				<!-- /Row -->
			</div>
			
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p><?php echo date('Y'); ?> &copy; <?php echo get_option('footer_name'); ?> All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>

	
		
	
        <!-- /Main Content -->
  
			