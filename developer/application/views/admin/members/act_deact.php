<?php

    $query=$this->db->query('Select HRM_ID,HRM_NAME from hrm_post where HRM_ID!=5000');
    $result=$query->result();
    $large_arr=array();
    foreach($result as $res){
          $minarray=array();
          $minarray['label']=$res->HRM_ID." [ ".$res->HRM_NAME." ]";
          $minarray['value']=$res->HRM_ID;
          array_push($large_arr,$minarray);
    }
?>
<script>
    
    $( function() {
    
    var availableTags = <?php echo json_encode($large_arr); ?>;
    $( "#tags" ).autocomplete({
      source: availableTags
    });
    
	
    
  } );
</script>
<style>
    .profile-image-overlay{
        background-image:url(<?php echo base_url() ?>assets/img/Wood_207.jpg) !important;
        opacity:1 !important;
    }
    .profile-box .profile-info .profile-img-wrap img {
            width: 100%;
      
    }
    .profile-box .profile-info .profile-img-wrap {
   
        width: 180px;
    }
    .profile-box .social-info {
        padding-top: 0px !important;
         border-top: unset !important;
    }
</style>
<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid pt-25">
		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			   <div class="panel panel-default card-view panel-refresh pad_20">
					<div class="panel-heading">
						<div class="text-center">
							<h1 class="panel-title txt-dark">Activate / Deactivate Member</h1>
							<hr class="reddish">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
						    
							<div class="row">
								<form action='' method="post">
									<div class="col-md-4">
										
										<input type="text" class="form-control" id="tags" name="userid" value="<?php if(isset($_POST['userid'])){ echo $_POST['userid']; } ?>" placeholder='Enter user id' required>
									</div>
									<div class="col-md-4">
										<button type="submit" class="btn btn-success" name="searchprofile">Search</button>
									</div>
								</form>
							</div>
							<?php if(isset($_POST['userid'])){ 
							    if(get_hrm_postmeta($_POST['userid'],'first_name')=='') { ?>
    							<div class="row">
                                    <div class="col-md-12" style="margin-top: 15px; ">
                                    <div class="alert alert-warning clrwt">User Id does not exist</div>
                                    </div>
                                </div>
                            <?php } } ?>
                            
							<?php if(isset($_POST['userid'])){ 
							   $user_id=$_POST['userid'];
							 if(get_hrm_postmeta($user_id,'first_name')!='') {
							   $hrm_post=get_hrm_post($user_id); 
							   
							?>
							<div class="row mrg_tp_25">
                					<div class="col-lg-3 col-xs-12">
                						<div class="panel panel-default card-view  pa-0" style="margin-left:0px;">
                							<div class="panel-wrapper collapse in">
                								<div class="panel-body  pa-0">
                									<div class="profile-box">
                										<div class="profile-cover-pic">
                											
                											<div class="profile-image-overlay"></div>
                										</div>
                										<div class="profile-info text-center">
                											<div class="profile-img-wrap">
                												<img class="inline-block mb-10" src="<?php echo base_url() ?>assets/uploads_assets/<?php echo get_hrm_postmeta($user_id,'img'); ?>" alt="user"/>
                												
                											</div>	
                											<h3 class="block mt-10 mb-5 weight-500 capitalize-font txt-danger"><?php echo $user_id; ?></h3>
                											<h4 class="block mt-10 mb-5 weight-500 capitalize-font txt-danger"><?php echo get_hrm_postmeta($user_id,'first_name')." ".get_hrm_postmeta($user_id,'last_name'); ?></h4>
                											
                										</div>	
                										<div class="social-info">
                										   <?php if($hrm_post[0]->HRM_STATUS==1){ ?>
                											<button class="btn btn-danger actdeactuser btn-block mt-30" attr-stat="0" attr-userid="<?php echo $user_id; ?>"><span class="btn-text">DEACTIVATE USER</span></button>
                											<?php } elseif($hrm_post[0]->HRM_STATUS==0){  ?>
                											<button class="btn btn-success actdeactuser btn-block mt-30" attr-stat="1" attr-userid="<?php echo $user_id; ?>"><span class="btn-text">ACTIVATE USER</span></button>
                											<?php } ?>
                										</div>
                									</div>
                								</div>
                							</div>
                						</div>
                					</div>
                					<div class="col-lg-9 col-xs-12">
                						<div class="panel panel-default card-view pa-0">
                							<div class="panel-wrapper collapse in">
                								<div  class="panel-body pb-0">
                									<div  class="tab-struct custom-tab-1">
                										<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
                											<li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>Personal Details</span></a></li>
                											<li  role="presentation" class="next"><a aria-expanded="true"  data-toggle="tab" role="tab" id="follo_tab_8" href="#follo_8"><span>Nominee Details</span></a></li>
                											<li role="presentation" class=""><a  data-toggle="tab" id="photos_tab_8" role="tab" href="#photos_8" aria-expanded="false"><span>Bank Details</span></a></li>
                											<li role="presentation" class=""><a  data-toggle="tab" id="earning_tab_8" role="tab" href="#earnings_8" aria-expanded="false"><span>Transaction & Security</span></a></li>
                											
                										</ul>
                										<div class="tab-content" id="myTabContent_8">
                											<div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
                												<div class="col-md-12">
                													    <table class="table table-bordered table-striped" >
                    													<tr>
                    													    <tr>
                    															<td><strong>Userid</strong></td>
                    															<td><?php echo $user_id; ?></td>
                    														</tr>
                                                                            <td><strong>Full Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'first_name')." ".get_hrm_postmeta($user_id,'last_name'); ?></td>
                    														</tr>
                    														 <td><strong>Father Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'father_name'); ?></td>
                    														</tr>
                    													
                    														<tr>
                    															<td><strong>Address</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'address'); ?></td>
                    														</tr>
                    														<tr >
                    															<td><strong>Pincode</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'pin_code'); ?></td>
                    														</tr>
                    														<tr >
                    															<td><strong>Pan Card</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'pancard'); ?></td>
                    														</tr>
                    													
                    														 <tr>
                    															<td><strong>State</strong></td>
                    															<td><?php echo get_state_by_id(get_hrm_postmeta($user_id,'state')); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>City</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'city'); ?></td>
                    														</tr>
                                                                           
                    														<tr >
                    															<td><strong>Mobile Number</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'contact'); ?></td>
                    														</tr>
                    													
                    														<tr>
                    															<td><strong>Email</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'email'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Date of Birth </strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'dob'); ?></td>
                    														</tr>
                    												</table>
                												</div>
                											</div>
                											
                											<div  id="follo_8" class="tab-pane fade" role="tabpanel">
                												<div class="col-md-12">
                													    <table class="table table-bordered table-striped" >
                    													<tr>
                    													   
                                                                            <td><strong>Full Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmfirstname')." ".get_hrm_postmeta($user_id,'	nmlastname'); ?></td>
                    														</tr>
                    													    <tr>
                    															<td><strong>Address</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmaddress'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Relation </strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmrelation'); ?></td>
                    														</tr>
                    												</table>
                												</div>
                											</div>
                											<div  id="photos_8" class="tab-pane fade" role="tabpanel">
                												<div class="col-md-12">
                													    <table class="table table-bordered table-striped" >
                    													<tr>
                    													    <tr>
                    															<td><strong>Bank A/c</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'ac_no'); ?></td>
                    														</tr>
                                                                            <td><strong>A/c Holder Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'ac_holder_name'); ?></td>
                    														</tr>
                    														 <td><strong>Bank Name</strong></td>
                    															<td><?php echo get_banks_by_id(get_hrm_postmeta($user_id,'bank_id')); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>IFSC Code</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'ifsc'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Branch</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'branch_name'); ?></td>
                    														</tr>
                    														
                    												</table>
                												</div>
                											</div>
                											<div  id="earnings_8" class="tab-pane fade" role="tabpanel">
                												<div class="col-md-12">
                													    <table class="table table-bordered table-striped" >
                    													<tr>
                    													   
                                                                            <td><strong>Epin</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'pin_no'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Sponsor Name</strong></td>
                    															<td><?php echo get_hrm_postmeta(get_added_by($user_id),'first_name')." ".get_hrm_postmeta(get_added_by($user_id),'last_name')." [".get_added_by($user_id)."  ]"; ?></td>
                    														</tr>
                    														
                    												</table>
                												</div>
                											</div>
                											
                										</div>
                									</div>
                								</div>
                							</div>
                						</div>
                						
                							
                					</div>
                				</div>
                				<!-- /Row -->
							<?php } } ?>
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

				
				
				