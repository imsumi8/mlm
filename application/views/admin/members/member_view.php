<?php

    $query=$this->db->query('Select HRM_ID,HRM_NAME from hrm_post where HRM_STATUS=1 and HRM_ID!=5000 ORDER BY ID ASC');
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
<?php	if($this->session->userdata('hrmtype') == 'admin') { ?>
<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid pt-25">
		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			   <div class="panel panel-default card-view panel-refresh pad_20">
					<div class="panel-heading">
						<div class="text-center">
							<h1 class="panel-title txt-dark">Profile View</h1>
							<hr class="reddish">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
						    
							<div class="row">
								<form action='' method="post">
									<div class="col-md-4 col-xs-9">
										
										<input type="text" class="form-control" id="tags" name="userid" value="<?php if(isset($_POST['userid'])){ echo $_POST['userid']; } ?>" placeholder='Enter user id' required>
									</div>
									<div class="col-md-4 col-xs-3">
										<button type="submit" class="btn btn-primary" name="searchprofile">Search</button>
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
                											<button class="btn btn-default btn-block btn-outline btn-anim mt-30" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i><span class="btn-text">edit profile</span></button>
                											<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                												<div class="modal-dialog modal-lg">
                													<div class="modal-content">
                														<div class="modal-header">
                															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                															<h5 class="modal-title" id="myModalLabel">Edit Profile</h5>
                														</div>
                														<div class="modal-body">
                															<!-- Row -->
                															<div class="row">
                																<div class="col-lg-12">
                																	<div class="">
                																		<div class="panel-wrapper collapse in">
                																			<div class="panel-body pa-0">
                																				<div class="col-sm-12 col-xs-12" style="padding:0px;">
                																					<div class="form-wrap">
                																						<form id="update_profile_user" enctype="multipart/form-data">
                																						    <input type="hidden" name="userid" value="<?php echo $user_id; ?>">
                																							<div class="sections">
                                                                            									<div class="row"><div class="col-md-12"><div class="errors alert alert-warning"></div></div></div>
                                                                            									<div class="row">
                                                                            										<div class="col-md-6 col-xs-6">
                                                                            											<div class="head">PERSONAL DETAILS</div>
                                                                            										</div>
                                                                            										<div class="col-md-6 col-xs-6 text-right">
                                                                            											<i class="fa btn btn-primary slides_class fa-minus"></i>
                                                                            										</div>
                                                                            									</div>
                                                                            									<div class="inner_sec_slide">
                                                                                									<div class="row">
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label for="firstname">Applicant's Name <span class="star">*</span></label></div>
                                                                                												<input type="text" name="firstname" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'first_name'); ?>"> 
                                                                                												<input type="hidden" name="lastname" class="form-control"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Father's / Husband Name</label></div>
                                                                                												<input type="text" name="fathername" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'father_name'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Mother's Name </label></div>
                                                                                												<input type="text" name="mothername" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'mother_name'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Email </label></div>
                                                                                												<input type="email" name="email" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'email'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Phone No. <span class="star">*</span></label></div>
                                                                                												<input type="text" name="phone" class="form-control input_num" value="<?php echo get_hrm_postmeta($user_id,'contact'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Whatsap No. </label></div>
                                                                                												<input type="text" name="wphone" class="form-control input_num" value="<?php echo get_hrm_postmeta($user_id,'whatsap_contact'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                									    <div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Date of Birth</label></div>
                                                                                												<input type="text" name="dob" class="form-control datepicker" readonly="" value="<?php echo get_hrm_postmeta($user_id,'dob'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Pan Card </label></div>
                                                                            													<input type="text" name="pancard" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'pancard'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Aadhar No. </label></div>
                                                                                												<input type="text" name="aadhar" class="form-control input_num" value="<?php echo get_hrm_postmeta($user_id,'aadhar'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                									    <div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Gender </label></div>
                                                                                												<label><input type="radio" name="gender" class="gend" value="Male" <?php if(get_hrm_postmeta($user_id,'gender')=="Male"){ echo "checked"; } ?>>Male </label>
                                                                                												<label><input type="radio" name="gender" class="gend" value="Female" <?php if(get_hrm_postmeta($user_id,'gender')=="Female"){ echo "checked"; } ?>>Female</label>
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>State </label></div>
                                                                                												<select name="state" class="form-control state">
                                                                                												    <option value="">--Select State--</option>
                                                                                													<?php foreach($states as $state) { ?>
                                                                                													    <option value="<?php echo $state->STATE_ID;?>" <?php if(get_hrm_postmeta($user_id,'state')==$state->STATE_ID) { echo "selected"; }?>><?php echo $state->STATE_NAME;?></option>
                                                                                													<?php } ?>
                                                                                												</select>
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>District </label></div>
                                                                                												<select name="city" class="form-control city">
                                                                                												    <option value="">--Select District--</option>
                                                                                												</select>
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                										<div class="col-md-8">
                                                                                											<div class="form-group">
                                                                                												<div class="form-group">
                                                                                													<div><label>Address <span class="star">*</span></label></div>
                                                                                													<textarea name="address" class="form-control" id="editor"><?php echo get_hrm_postmeta($user_id,'address'); ?></textarea>
                                                                                												</div>
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div class="form-group">
                                                                                													<div><label>Pin Code </label></div>
                                                                                													<input type="text" name="pincode" class="form-control input_num" value="<?php echo get_hrm_postmeta($user_id,'pin_code'); ?>"> 
                                                                                												</div>
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                            									</div>
                                                                            								</div>
                                                                        									<div class="sections">
                                                                            								    <div class="row">
                                                                            										<div class="col-md-6 col-xs-6">
                                                                            											<div class="head">NOMINEE DETAILS</div>
                                                                            										</div>
                                                                            										<div class="col-md-6 col-xs-6 text-right">
                                                                            											<i class="fa btn btn-primary slides_class fa-minus"></i>
                                                                            										</div>
                                                                            									</div>
                                                                            									<div class="inner_sec_slide">
                                                                                									<div class="row">
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label for="firstname">Name </label></div>
                                                                                												<input type="text" name="nmfirstname" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'nmfirstname'); ?>"> 
                                                                                												<input type="hidden" name="nmlastname" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'nmlastname'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Faher's / Husband Name </label></div>
                                                                                												<input type="text" name="nmfathername" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'nmfathername'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Mother's Name </label></div>
                                                                                												<input type="text" name="nmmothername" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'nmmothername'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                									    <div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Date of Birth</label></div>
                                                                                												<input type="text" name="nmdob" class="form-control datepicker" readonly="" value="<?php echo get_hrm_postmeta($user_id,'nmdob'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Mobile No.</label></div>
                                                                                												<input type="text" name="nmmob" class="form-control input_num" value="<?php echo get_hrm_postmeta($user_id,'nmmob'); ?>">
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Relation </label></div>
                                                                                												<input type="text" name="nmrelation" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'nmrelation'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                									    <div class="col-md-12">
                                                                                											<div class="form-group">
                                                                                												<div><label>Address</label></div>
                                                                                												<textarea name="nmaddress" class="form-control"><?php echo get_hrm_postmeta($user_id,'nmaddress'); ?></textarea>
                                                                                											</div>
                                                                                										</div>
                                                                                										
                                                                                									</div>
                                                                            									</div>
                                                                            								</div>
                                                                            								<div class="sections">
                                                                            									<div class="row">
                                                                            									    <div class="col-md-6 col-xs-6">
                                                                            											<div class="head">BANK DETAILS</div>
                                                                            										</div>
                                                                            										<div class="col-md-6 col-xs-6 text-right">
                                                                            											<i class="fa btn btn-primary slides_class fa-minus"></i>
                                                                            										</div>
                                                                            									</div>
                                                                            									<div class="inner_sec_slide">
                                                                                									<div class="row">
                                                                                										<div class="col-md-6">
                                                                                											<div class="form-group">
                                                                                												<div><label>Bank A/c </label></div>
                                                                                												<input type="text" name="acno" class="form-control input_num" value="<?php echo get_hrm_postmeta($user_id,'ac_no'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-6">
                                                                                											<div class="form-group">
                                                                                												<div><label>A/c Holder Name </label></div>
                                                                                												<input type="text" name="holdername" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'ac_holder_name'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                										<div class="col-md-6">
                                                                                											<div class="form-group">
                                                                                												<div><label>Bank Name </label></div>
                                                                                												<select name="bank" class="form-control">
                                                                                													<option value=''>--Select Bank--</option>
                                                                                													<?php foreach($banks as $bank) { ?>
                                                                                													   <option value="<?php echo $bank->BANK_ID;?>" <?php if(get_hrm_postmeta($user_id,'bank_id')==$bank->BANK_ID) { echo "selected"; } ?>><?php echo $bank->BANK_NAME;?></option>
                                                                                													<?php } ?>
                                                                                												</select>
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-6">
                                                                                											<div class="form-group">
                                                                                											    <div><label>Branch </label></div>
                                                                            													<input type="text" name="branch" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'branch_name'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									
                                                                                									</div>
                                                                                									<div class="row">
                                                                                										<div class="col-md-6">
                                                                                											<div class="form-group">
                                                                                												<div><label>IFSC Code </label></div>
                                                                                												<input type="text" name="ifsc" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'ifsc'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-6">
                                                                                											<div class="form-group">
                                                                                												<div><label>Branch Address </label></div>
                                                                                												<input type="text" name="brnch_address" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'brnch_address'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									
                                                                            									</div>
                                                                            								</div>
                                                                            								<div class="sections">
                                                                            									<div class="row">
                                                                            									    <div class="col-md-12">
                                                                            									        <div class="form-group">
                                                                        												    <div class="col-md-12 no_pad"><label>Profile </label></div>
                                                                            												 <div class="col-md-12 no_pad">
                                                                                                                                <img id="blah" src="<?php echo base_url() ?>assets/uploads_assets/<?php echo get_hrm_postmeta($user_id,'img'); ?>" alt="your image" class="logoinput" />
                                                                                                                            </div>
                                                                            												<div class="col-md-12 no_pad mrg_tp_15">
                                                                            												    <label for="file-upload" class="custom-file-upload btn btn-primary">
                                                                                                                                    <i class="fa fa-cloud-upload"></i> Profile Upload
                                                                                                                                </label>
                                                                                                                                <input id="file-upload" type="file" name="fileToUpload" class='imgInp'/>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                            									    </div>
                                                                            									</div>
                                                                            								</div>
                																							<div class="row mrg_tp_15">	
                																							    <div class="col-md-12 text-right">
                                                                        											<div class="form-group">
                																							        	<input type="submit" class="btn btn-success update_profile_user mr-10 mb-30" value="Update profile">
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
                															</div>
                														</div>
                													
                													</div>
                													<!-- /.modal-content -->
                												</div>
                												<!-- /.modal-dialog -->
                											</div>
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
                                                                            <td><strong>Applicant's Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'first_name')." ".get_hrm_postmeta($user_id,'last_name'); ?></td>
                    														</tr>
                    														 <td><strong>Father's / Husband Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'father_name'); ?></td>
                    														</tr>
                    													    <td><strong>Mother's Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'mother_name'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Email</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'email'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Mobile Number</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'contact'); ?></td>
                    														</tr>
                    														 <td><strong>Whatsap No.</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'whatsap_contact'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Date of Birth </strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'dob'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Pan Card</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'pancard'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Aadhar No.</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'aadhar'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Gender</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'gender'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>State</strong></td>
                    															<td><?php echo get_state_by_id(get_hrm_postmeta($user_id,'state')); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>District</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'city'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Address</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'address'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Pincode</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'pin_code'); ?></td>
                    														</tr>
                    												</table>
                												</div>
                											</div>
                											
                											<div  id="follo_8" class="tab-pane fade" role="tabpanel">
                												<div class="col-md-12">
                													    <table class="table table-bordered table-striped" >
                    													<tr>
                    													    <td><strong>Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmfirstname')." ".get_hrm_postmeta($user_id,'	nmlastname'); ?></td>
                    														</tr>
                    													    <tr>
                    															<td><strong>Faher's / Husband Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmfathername'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Mother's Name </strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmmothername'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Date of Birth</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmdob'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Mobile No.</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmmob'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Relation</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmrelation'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Address</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmaddress'); ?></td>
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
                    														<tr>
                    															<td><strong>Branch Address</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'brnch_address'); ?></td>
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
<?php } else { ?>
<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid pt-25">
		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			   <div class="panel panel-default card-view panel-refresh pad_20">
					<div class="panel-heading">
						<div class="text-center">
							<h1 class="panel-title txt-dark">Profile View</h1>
							<hr class="reddish">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
						    <?php 
							$user_id=$this->session->userdata('userid');
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
                											<button class="btn btn-default btn-block btn-outline btn-anim mt-30" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i><span class="btn-text">edit profile</span></button>
                											<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                												<div class="modal-dialog modal-lg">
                													<div class="modal-content">
                														<div class="modal-header">
                															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                															<h5 class="modal-title" id="myModalLabel">Edit Profile</h5>
                														</div>
                														<div class="modal-body">
                															<!-- Row -->
                															<div class="row">
                																<div class="col-lg-12">
                																	<div class="">
                																		<div class="panel-wrapper collapse in">
                																			<div class="panel-body pa-0">
                																				<div class="col-sm-12 col-xs-12" style="padding:0px;">
                																					<div class="form-wrap">
                																						<form id="update_profile_user" enctype="multipart/form-data">
                																						    <input type="hidden" name="userid" value="<?php echo $user_id; ?>">
                																							<div class="sections">
                                                                            									<div class="row"><div class="col-md-12"><div class="errors alert alert-warning"></div></div></div>
                                                                            									<div class="row">
                                                                            										<div class="col-md-6 col-xs-6">
                                                                            											<div class="head">PERSONAL DETAILS</div>
                                                                            										</div>
                                                                            										<div class="col-md-6 col-xs-6 text-right">
                                                                            											<i class="fa btn btn-primary slides_class fa-minus"></i>
                                                                            										</div>
                                                                            									</div>
                                                                            									<div class="inner_sec_slide">
                                                                                									<div class="row">
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label for="firstname">Applicant's Name <span class="star">*</span></label></div>
                                                                                												<input type="text" name="firstname" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'first_name'); ?>" readonly> 
                                                                                												<input type="hidden" name="lastname" class="form-control" readonly> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Father's / Husband Name</label></div>
                                                                                												<input type="text" name="fathername" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'father_name'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Mother's Name </label></div>
                                                                                												<input type="text" name="mothername" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'mother_name'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Email </label></div>
                                                                                												<input type="email" name="email" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'email'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Phone No. <span class="star">*</span></label></div>
                                                                                												<input type="text" name="phone" class="form-control input_num" value="<?php echo get_hrm_postmeta($user_id,'contact'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Whatsap No. </label></div>
                                                                                												<input type="text" name="wphone" class="form-control input_num" value="<?php echo get_hrm_postmeta($user_id,'whatsap_contact'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                									    <div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Date of Birth</label></div>
                                                                                												<input type="text" name="dob" class="form-control datepicker" readonly="" value="<?php echo get_hrm_postmeta($user_id,'dob'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Pan Card </label></div>
                                                                            													<input type="text" name="pancard" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'pancard'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Aadhar No. </label></div>
                                                                                												<input type="text" name="aadhar" class="form-control input_num" value="<?php echo get_hrm_postmeta($user_id,'aadhar'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                									    <div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Gender </label></div>
                                                                                												<label><input type="radio" name="gender" class="gend" value="Male" <?php if(get_hrm_postmeta($user_id,'gender')=="Male"){ echo "checked"; } ?>>Male </label>
                                                                                												<label><input type="radio" name="gender" class="gend" value="Female" <?php if(get_hrm_postmeta($user_id,'gender')=="Female"){ echo "checked"; } ?>>Female</label>
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>State </label></div>
                                                                                												<select name="state" class="form-control state">
                                                                                												    <option value="">--Select State--</option>
                                                                                													<?php foreach($states as $state) { ?>
                                                                                													    <option value="<?php echo $state->STATE_ID;?>" <?php if(get_hrm_postmeta($user_id,'state')==$state->STATE_ID) { echo "selected"; }?>><?php echo $state->STATE_NAME;?></option>
                                                                                													<?php } ?>
                                                                                												</select>
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>District </label></div>
                                                                                												<select name="city" class="form-control city">
                                                                                												    <option value="">--Select District--</option>
                                                                                												</select>
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                										<div class="col-md-8">
                                                                                											<div class="form-group">
                                                                                												<div class="form-group">
                                                                                													<div><label>Address <span class="star">*</span></label></div>
                                                                                													<textarea name="address" class="form-control" id="editor"><?php echo get_hrm_postmeta($user_id,'address'); ?></textarea>
                                                                                												</div>
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div class="form-group">
                                                                                													<div><label>Pin Code </label></div>
                                                                                													<input type="text" name="pincode" class="form-control input_num" value="<?php echo get_hrm_postmeta($user_id,'pin_code'); ?>"> 
                                                                                												</div>
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                            									</div>
                                                                            								</div>
                                                                        									<div class="sections">
                                                                            								    <div class="row">
                                                                            										<div class="col-md-6 col-xs-6">
                                                                            											<div class="head">NOMINEE DETAILS</div>
                                                                            										</div>
                                                                            										<div class="col-md-6 col-xs-6 text-right">
                                                                            											<i class="fa btn btn-primary slides_class fa-minus"></i>
                                                                            										</div>
                                                                            									</div>
                                                                            									<div class="inner_sec_slide">
                                                                                									<div class="row">
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label for="firstname">Name </label></div>
                                                                                												<input type="text" name="nmfirstname" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'nmfirstname'); ?>"> 
                                                                                												<input type="hidden" name="nmlastname" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'nmlastname'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Faher's / Husband Name </label></div>
                                                                                												<input type="text" name="nmfathername" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'nmfathername'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Mother's Name </label></div>
                                                                                												<input type="text" name="nmmothername" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'nmmothername'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                									    <div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Date of Birth</label></div>
                                                                                												<input type="text" name="nmdob" class="form-control datepicker" readonly="" value="<?php echo get_hrm_postmeta($user_id,'nmdob'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Mobile No.</label></div>
                                                                                												<input type="text" name="nmmob" class="form-control input_num" value="<?php echo get_hrm_postmeta($user_id,'nmmob'); ?>">
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-4">
                                                                                											<div class="form-group">
                                                                                												<div><label>Relation </label></div>
                                                                                												<input type="text" name="nmrelation" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'nmrelation'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                									    <div class="col-md-12">
                                                                                											<div class="form-group">
                                                                                												<div><label>Address</label></div>
                                                                                												<textarea name="nmaddress" class="form-control"><?php echo get_hrm_postmeta($user_id,'nmaddress'); ?></textarea>
                                                                                											</div>
                                                                                										</div>
                                                                                										
                                                                                									</div>
                                                                            									</div>
                                                                            								</div>
                                                                            								<div class="sections">
                                                                            									<div class="row">
                                                                            									    <div class="col-md-6 col-xs-6">
                                                                            											<div class="head">BANK DETAILS</div>
                                                                            										</div>
                                                                            										<div class="col-md-6 col-xs-6 text-right">
                                                                            											<i class="fa btn btn-primary slides_class fa-minus"></i>
                                                                            										</div>
                                                                            									</div>
                                                                            									<div class="inner_sec_slide">
                                                                                									<div class="row">
                                                                                										<div class="col-md-6">
                                                                                											<div class="form-group">
                                                                                												<div><label>Bank A/c </label></div>
                                                                                												<input type="text" name="acno" class="form-control input_num" value="<?php echo get_hrm_postmeta($user_id,'ac_no'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-6">
                                                                                											<div class="form-group">
                                                                                												<div><label>A/c Holder Name </label></div>
                                                                                												<input type="text" name="holdername" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'ac_holder_name'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									<div class="row">
                                                                                										<div class="col-md-6">
                                                                                											<div class="form-group">
                                                                                												<div><label>Bank Name </label></div>
                                                                                												<select name="bank" class="form-control">
                                                                                													<option value=''>--Select Bank--</option>
                                                                                													<?php foreach($banks as $bank) { ?>
                                                                                													   <option value="<?php echo $bank->BANK_ID;?>" <?php if(get_hrm_postmeta($user_id,'bank_id')==$bank->BANK_ID) { echo "selected"; } ?>><?php echo $bank->BANK_NAME;?></option>
                                                                                													<?php } ?>
                                                                                												</select>
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-6">
                                                                                											<div class="form-group">
                                                                                											    <div><label>Branch </label></div>
                                                                            													<input type="text" name="branch" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'branch_name'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									
                                                                                									</div>
                                                                                									<div class="row">
                                                                                										<div class="col-md-6">
                                                                                											<div class="form-group">
                                                                                												<div><label>IFSC Code </label></div>
                                                                                												<input type="text" name="ifsc" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'ifsc'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                										<div class="col-md-6">
                                                                                											<div class="form-group">
                                                                                												<div><label>Branch Address </label></div>
                                                                                												<input type="text" name="brnch_address" class="form-control" value="<?php echo get_hrm_postmeta($user_id,'brnch_address'); ?>"> 
                                                                                											</div>
                                                                                										</div>
                                                                                									</div>
                                                                                									
                                                                            									</div>
                                                                            								</div>
                                                                            								<div class="sections">
                                                                            									<div class="row">
                                                                            									    <div class="col-md-12">
                                                                            									        <div class="form-group">
                                                                        												    <div class="col-md-12 no_pad"><label>Profile </label></div>
                                                                            												 <div class="col-md-12 no_pad">
                                                                                                                                <img id="blah" src="<?php echo base_url() ?>assets/uploads_assets/<?php echo get_hrm_postmeta($user_id,'img'); ?>" alt="your image" class="logoinput" />
                                                                                                                            </div>
                                                                            												<div class="col-md-12 no_pad mrg_tp_15">
                                                                            												    <label for="file-upload" class="custom-file-upload btn btn-primary">
                                                                                                                                    <i class="fa fa-cloud-upload"></i> Profile Upload
                                                                                                                                </label>
                                                                                                                                <input id="file-upload" type="file" name="fileToUpload" class='imgInp'/>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                            									    </div>
                                                                            									</div>
                                                                            								</div>
                																							<div class="row mrg_tp_15">	
                																							    <div class="col-md-12 text-right">
                                                                        											<div class="form-group">
                																							        	<input type="submit" class="btn btn-success update_profile_user mr-10 mb-30" value="Update profile">
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
                															</div>
                														</div>
                													
                													</div>
                													<!-- /.modal-content -->
                												</div>
                												<!-- /.modal-dialog -->
                											</div>
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
                                                                            <td><strong>Applicant's Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'first_name')." ".get_hrm_postmeta($user_id,'last_name'); ?></td>
                    														</tr>
                    														 <td><strong>Father's / Husband Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'father_name'); ?></td>
                    														</tr>
                    													    <td><strong>Mother's Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'mother_name'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Email</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'email'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Mobile Number</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'contact'); ?></td>
                    														</tr>
                    														 <td><strong>Whatsap No.</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'whatsap_contact'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Date of Birth </strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'dob'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Pan Card</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'pancard'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Aadhar No.</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'aadhar'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Gender</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'gender'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>State</strong></td>
                    															<td><?php echo get_state_by_id(get_hrm_postmeta($user_id,'state')); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>District</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'city'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Address</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'address'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Pincode</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'pin_code'); ?></td>
                    														</tr>
                    												</table>
                												</div>
                											</div>
                											
                											<div  id="follo_8" class="tab-pane fade" role="tabpanel">
                												<div class="col-md-12">
                													    <table class="table table-bordered table-striped" >
                    													<tr>
                    													    <td><strong>Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmfirstname')." ".get_hrm_postmeta($user_id,'	nmlastname'); ?></td>
                    														</tr>
                    													    <tr>
                    															<td><strong>Faher's / Husband Name</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmfathername'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Mother's Name </strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmmothername'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Date of Birth</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmdob'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Mobile No.</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmmob'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Relation</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmrelation'); ?></td>
                    														</tr>
                    														<tr>
                    															<td><strong>Address</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'nmaddress'); ?></td>
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
                    														<tr>
                    															<td><strong>Branch Address</strong></td>
                    															<td><?php echo get_hrm_postmeta($user_id,'brnch_address'); ?></td>
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
                    															 <?php $arr=get_hrm_post($user_id); if($arr[0]->HRM_STATUS=='1') { ?>
                    															<td><?php echo get_hrm_postmeta(get_added_by($user_id),'first_name')." ".get_hrm_postmeta(get_added_by($user_id),'last_name')." [".get_added_by($user_id)."  ]"; ?></td>
                    													        <?php } else{ ?>
                    													        <td><?php echo get_hrm_postmeta(get_added_by_free($user_id),'first_name')." ".get_hrm_postmeta(get_added_by_free($user_id),'last_name')." [".get_added_by_free($user_id)."  ]"; ?></td>
                    													        <?php } ?>
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
<?php } ?>
				
				
				