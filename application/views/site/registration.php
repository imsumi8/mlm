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


<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo get_option('footer_name'); ?> | Registration</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/login/images/icons/favicon.ico"/>
	
	<!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		
	<!-- Custom CSS -->
	<link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Custom CSS -->
	<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/front.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/multiselect/multiselect.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!--alerts CSS -->
	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>
	<!--<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>-->
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js"></script>


	<script>
		var admin_loc='<?php echo base_url().'admin_ajax/'; ?>';
		var base_loc='<?php echo base_url().'admin/'; ?>';
    </script>
   </head>
<body>
<style>
@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{

font-family: 'Numans', sans-serif;
}
.navbar-brand, .navbar-nav{
color:#fff !important;
}
.navbar-inverse .navbar-nav>li>a{
color:#fff !important;
}
</style>
	<nav class="navbar navbar-inverse navbar-fixed" style="background-color:rgba(12, 20, 123, 0.72) !important;border-radius:0px;">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" style="font-size:35px;" href="<?php echo base_url(); ?>">RMGM</a>
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
    </div>
    <ul class="collapse navbar-collapse bs-example-navbar-collapse-1 nav navbar-nav navbar-right" id="navbar-example">
    <li><a href="<?php echo base_url(); ?>">Home</a></li>
    <li><a href="<?php echo base_url(); ?>">About</a></li>
    <li><a href="<?php echo base_url(); ?>">Marketing PLan</a></li>
    <li><a href="<?php echo base_url(); ?>">Contact</a></li>
      <li><a href="<?php echo base_url(); ?>registration">Sign Up</a></li>
      <li><a href="<?php echo base_url(); ?>admin">Login</a></li>
    </ul>
  </div>
</nav>

            <div class="container pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="pad_20">
                           <div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Member Registration with RMGM</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div  class="pills-struct">
								<ul role="tablist" class="nav nav-pills" id="myTabs_6">
									<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#home_6">Registration</a></li>
									<!--<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#profile_6" aria-expanded="false">Free Registration</a></li>-->
								</ul>
								<div class="tab-content" id="myTabContent_6">
									<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
								    	<form id="memberregister" action=''>
								    	    <input type="hidden" id="checkedform" value='0'>
								    	   
												 <input type="hidden" class="usrnm" value="">
											
            							    <div class="sections">
            									<div class="row">
            										<div class="col-md-6 col-xs-6">
            											<div class="head">TRANSACTION & SECURITY</div>
            										</div>
            										<div class="col-md-6 col-xs-6 text-right">
            											<i class="fa btn btn-primary slides_class fa-minus"></i>
            										</div>
            									</div>
            									<div class="inner_sec_slide">
                									<div class="row">
                										<div class="col-md-12">
                											<div class="form-group">
                												<div><label>Payment Type <span class="star">*</span></label><span class="mrleft"><label><input type="radio" class="payments" name="paymenttype" checked value='1'> E-PIN</label></span>
                												<span class="mrleft"><label><input type="radio" name="paymenttype" class="payments" value='2'> Online Payment</label></span>
                												</div>
                												
                											</div>
                										</div>
                										
                									</div>
                									<div class="row">
                									    <div class="col-md-4" style="display:none">
                											<div class="form-group">
                												<div><label>Package <span class="star">*</span></label></div>
                												<select name="pack" class="form-control packmain">
                													<?php foreach($packs as $pack) { ?>
                													    <option <?php echo ($pack->PACKAGE_ID==1)?'selected':'' ?> value="<?php echo $pack->PACKAGE_ID;?>" attr-price="<?php echo $pack->PACKAGE_PRICE; ?>"><?php echo $pack->PACKAGE_NAME." [ ".$pack->PACKAGE_PRICE." ]";?></option>
                													<?php } ?>
                												</select>
                											</div>
                										</div>
                									    <div class="col-md-4">
                											<div class="form-group">
                												<div><label>Sponsor Id <span class="star">*</span></label></div>
                												
                												<input type="text" name="sponserid" class="form-control get_name_member get_postitionid tags" style="text-transform: uppercase;" value=""> 
                												
                											</div>
                										</div>

														<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Sponsor Name <span class="star">*</span></label></div>
                												<input type="text" name="positionid" class="form-control sponsor_name" style="text-transform: uppercase;" value="<?php echo $this->uri->segment(4); ?>" readonly> 
                											</div>
                										</div>
                									
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>E-PIN No. <span class="star">*</span></label></div>
                												<select name="epinno" class="form-control epins_register">
                												    <?php if($this->uri->segment(3)!='no') { ?>
                												        <option><?php echo $this->uri->segment(3); ?></option> 
                												    <?php } ?>
                												</select><span class="noepincase" style="color:red;"></span>
                												
                											</div>
                										</div>
                										<div class="col-md-4" style='display:none;'>
                											<div class="form-group">
                												<div><label>Sponsor's Other Id <span class="star">*</span></label></div>
                												<label class="radio-inline"  style="display:none;">
                                                                  <input type="radio" name="sponsor_type" class="sponsor_type" value="self">SELF ID 
                                                                </label>
                                                                <label class="radio-inline">
                                                                  <input type="radio" name="sponsor_type" class="sponsor_type" value="other" checked>OTHER ID
                                                                </label>
                                                            </div>
                										</div>
                									</div>
                									<?php $var='';  if($this->session->userdata('hrmtype') != 'admin') { $var='style="display:none";'; } ?>
                									<div class="row">
                										<div class="col-md-6"  <?php echo $var; ?>>
                											<div class="form-group">
                												<div><label>Back Date (Registration)</label></div>
                												<input type="text" name="bckdate" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>" readonly> 
                											</div>
                										</div>
                									    <input type="hidden" name="desiredid" class="form-control input_num" value=""> 
                										
                									</div>
                									<div class="row forleader">
                									    <!-- <div class="col-md-6">
                											<div class="form-group">
                												<div><label>Position <span class="star">*</span></label></div>
                												<select name="pos" class="form-control pos get_postitionid" required>
                													<option value=''>Select Position</option>
                													<option value='1' <?php  if($this->uri->segment(5)==1) echo 'selected'; ?>>LEFT</option>
                													<option value='2' <?php  if($this->uri->segment(5)==2) echo 'selected'; ?>>RIGHT</option>
                												</select>
                											</div>
            									    	</div> -->
                									    <div class="col-md-6">
                											<div class="form-group">
                												<div><label>Position Id <span class="star">*</span></label></div>
                												<input type="text" name="positionid" class="form-control position_check" style="text-transform: uppercase;" value="<?php echo $this->uri->segment(4); ?>" readonly> 
                											</div>
                										</div>
                									</div>
                									<div class="row" style="display:none;" >
                										<div class="col-md-6">
                											<div class="form-group">
                												<div><label>Password <span class="star">*</span></label></div>
                												<input type="password" name="pass" id="password" class="form-control" value="<?php echo $pass=rand(1000,9999); ?>"> 
                											</div>
                										</div>
                										<div class="col-md-6">
                											<div class="form-group">
                												<div><label>Confirm Password <span class="star">*</span></label></div>
                												<input type="password" name="cpass" id="confirm_password" class="form-control" value="<?php echo $pass; ?>" onkeyup='check();'> 
                												<span id='message'></span>
                											</div>
                										</div>
                									</div>
                									
            									</div>
            								</div>
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
                												<input type="text" name="firstname" class="name_free form-control"> 
                												<input type="hidden" name="lastname" class="form-control"> 
                											</div>
                										</div>
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Phone No. <span class="star">*</span></label></div>
                												<input type="text" name="phone" class="form-control phone input_num"> 
                											</div>
                										</div>
                										<div class="col-md-4">
                											<div class="form-group">
                												<div class="form-group">
                													<div><label>Address</label></div>
                													<textarea name="address" class="form-control" id="editor"> </textarea>
                												</div>
                											</div>
                										</div>
                										
                									</div>
                									<div class="row" style="display:none;">
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Email </label></div>
                												<input type="email" name="email" class="form-control"> 
                											</div>
                										</div>
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Father's / Husband Name</label></div>
                												<input type="text" name="fathername" class="form-control"> 
                											</div>
                										</div>
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Whatsap No. </label></div>
                												<input type="text" name="wphone" class="form-control input_num"> 
                											</div>
                										</div>
                									</div>
                									<div class="row">
                									    <div class="col-md-4">
                											<div class="form-group">
                												<div><label>Date of Birth</label></div>
                												<input type="text" name="dob" class="form-control datepicker" readonly> 
                											</div>
                										</div>
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Pan Card </label></div>
            													<input type="text" name="pancard" class="form-control"> 
                											</div>
                										</div>
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Aadhar No. </label></div>
                												<input type="text" name="aadhar" class="form-control input_num"> 
                											</div>
                										</div>
                									</div>
                									<div class="row" style="display:none;">
                									    <div class="col-md-4">
                											<div class="form-group">
                												<div><label>Gender </label></div>
                												<label><input type="radio" name="gender" class='gend' value="Male" checked>Male </label>
                												<label><input type="radio" name="gender" class='gend' value="Female">Female</label>
                											</div>
                										</div>
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>State </label></div>
                												<select name="state" class="form-control state">
                												    <option value="">--Select State--</option>
                													<?php foreach($states as $state) { ?>
                													    <option value="<?php echo $state->STATE_ID;?>"><?php echo $state->STATE_NAME;?></option>
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
                									<div class="row" style="display:none;">
                										<div class="col-md-8">
                											<div class="form-group">
                												<div><label>Mother's Name </label></div>
                												<input type="text" name="mothername" class="form-control"> 
                											</div>
                										</div>
                										<div class="col-md-4">
                											<div class="form-group">
                												<div class="form-group">
                													<div><label>Pin Code </label></div>
                													<input type="text" name="pincode" class="form-control input_num"> 
                												</div>
                											</div>
                										</div>
                									</div>
            									</div>
            								</div>
            								<div class="sections" style="display:none;">
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
                												<input type="text" name="nmfirstname" class="form-control"> 
                												<input type="hidden" name="nmlastname" class="form-control"> 
                											</div>
                										</div>
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Faher's / Husband Name </label></div>
                												<input type="text" name="nmfathername" class="form-control"> 
                											</div>
                										</div>
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Mother's Name </label></div>
                												<input type="text" name="nmmothername" class="form-control"> 
                											</div>
                										</div>
                									</div>
                									<div class="row">
                									    <div class="col-md-4">
                											<div class="form-group">
                												<div><label>Date of Birth</label></div>
                												<input type="text" name="nmdob" class="form-control datepicker" readonly> 
                											</div>
                										</div>
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Mobile No.</label></div>
                												<input type="text" name="nmmob" class="form-control input_num"></textarea>
                											</div>
                										</div>
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Relation </label></div>
                												<input type="text" name="nmrelation" class="form-control"> 
                											</div>
                										</div>
                									</div>
                									<div class="row">
                									    <div class="col-md-12">
                											<div class="form-group">
                												<div><label>Address</label></div>
                												<textarea name="nmaddress" class="form-control"></textarea>
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
                												<input type="text" name="acno" class="form-control input_num"> 
                											</div>
                										</div>
                										<div class="col-md-6">
                											<div class="form-group">
                												<div><label>A/c Holder Name </label></div>
                												<input type="text" name="holdername" class="form-control"> 
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
                													
                														<option value="<?php echo $bank->BANK_ID;?>"><?php echo $bank->BANK_NAME;?></option>
                													<?php } ?>
                												</select>
                											</div>
                										</div>
                										<div class="col-md-6">
                											<div class="form-group">
                											    <div><label>Branch </label></div>
            													<input type="text" name="branch" class="form-control"> 
                											</div>
                										</div>
                									
                									</div>
                									<div class="row">
                										<div class="col-md-6">
                											<div class="form-group">
                												<div><label>IFSC Code </label></div>
                												<input type="text" name="ifsc" class="form-control"> 
                											</div>
                										</div>
                										<div class="col-md-6" style="display:none;">
                											<div class="form-group">
                												<div><label>Branch Address </label></div>
                												<input type="text" name="brnch_address" class="form-control"> 
                											</div>
                										</div>
                									</div>
                									
            									</div>
            								</div>
            								<div class="">
            								   <div class="row">
            								        <div class="col-md-12 text-center mrg_tp_25">
            											<label><input type="checkbox" name="terms" value="yes" class="terms" required style="position: relative;top: 2px;"> I agree with the <a href="javsacript:void(0);"  data-toggle="modal" data-target="#myModal">terms and conditions</a> <span class="star">*</span></label>
            										</div>
            										<div class="col-md-12 text-center">
            											<input type="submit" class="btn btn-primary submitregister sections" value="SUBMIT">
            											<input type="button" class="btn btn-primary onlinepay sections" value="SUBMIT">
            										</div>
            										<div class="col-md-12 text-center">
            										<h5>Already Signup?<a href="<?php echo base_url(); ?>admin">Login here</a></h5>
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
			
			
		
        <!-- /Main Content -->
        <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header actived text-center">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h5 class="modal-title" id="myModalLabel">TERMS AND CONDITIONS</h5>
						</div>
						<div class="modal-body">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12" style="padding-left:50px;">
									<ol>
									    <li>Cash transactions not allowed.</li>
									    <li>Their is no time limit to get any position or level.</li>
									    <li>Payment released via NEFT/IMPS, PAYTM.</li>
									    <li>We will not be responsible for delay in payments in case of wrong details of your bank.</li>
									    <!--<li>Maximum 1 Id's allowed with same bank details and same pancard / Aadhar card.</li>-->
									    <li>Company reserves the right to modify the Term and Condition , Products, Plan, Business policy to give prior notice through our website www.sparsh.com and it will be binding on all Distributors and members.</li>
									    <li>All dispute with regarding "RMGM" jurisdication with Kanpur Nagar District Court only.</li>
									</ol>
								</div>
							</div>
						</div>
					
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<script>
			    $('document').ready(function(){
			         $('.onlinepay').hide();
			        $('.payments').on('click',function(){
			           if($(this).val()==1){
			             $('.epins_register').parents('.col-md-4').show();
			             $('.submitregister').show();
			              $('.onlinepay').hide();
			           } else{
			               $('.epins_register').parents('.col-md-4').hide();
			               $('.submitregister').hide();
			               $('.onlinepay').show();
			           }
			        });
			       $('.get_postitionid').on('Keyup',function(){
			           change_position();
			       }); 
			       $('.get_postitionid').on('focusout',function(){
			           change_position();
			       }); 
			       $('.get_postitionid').on('change',function(){
			           change_position();
			       }); 
			    });
			    function change_position(){
			        var sponsorid=$('.get_name_member').val();
			        //var position=$('.pos').val();
			        if(sponsorid!=''){
			            $.ajax({
            				type: 'POST',
            				url: admin_loc+'get_positionid',
            				data: 'sponsorid='+sponsorid,
            				async:false,
            				success: function(msg){
							
								var obj = jQuery.parseJSON(msg);
							
            				    if(msg=="Invalid Sponsor id"){
            				        sweetalert('Invalid','warning',msg,'#f99b4a');
            				    }else{
									$('.sponsor_name').val(obj.hrm_name);
            				        $('.position_check').val(obj.hrm_id);
            				    }
            				}
            			});
			        }
			    }
			</script>
			<!-- razor pay integration -->
			<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
$('document').ready(function(){
    var SITEURL = "<?php echo base_url() ?>";
    $('body').on('click', '.onlinepay', function(e){
        var terms=$('.terms:checked').val();
        $newcheck=0;
        if (typeof terms === "undefined") {
          alert('please check terms and conditions');
        }else{
            if($('.get_name_member').val()!=''  && $('.name_free').val()!='' && $('.phone').val()!='' && $('.terms').val()!=''){
                $.ajax({
                    url: SITEURL + 'admin_ajax/check_sposonrs_id_single',
                    type: 'post',
                    async:false,
                    data: {
                        check_id: $('.get_name_member').val(),
                    }, 
                    success: function (msg) {
                    
                        msg=$.trim(msg);
                        if(msg==1){
                            $newcheck=1;
                        }else{
                            alert('Sponsor id is invalid');
                        }
                    }
                });
            }else{
                alert('please fill all required fields');
            }
        }
      
        if($newcheck==1){
         	var baseurl='<?php echo base_url(); ?>';
            var totalAmount = $('option:selected', '.packmain').attr('attr-price');
            var product_id =  $('.packmain').val();
            var sponsorid=$('.get_name_member').val();
            var options = {
                "key": "rzp_test_2zn3sFLkpJvTtA",
                "amount": (totalAmount*100), // 2000 paise = INR 20
                "name": "RMGM",
                "description": "Payment",
                "image": baseurl+"assets/uploads_assets/5d68186c3b82a.png",
                "handler": function (response){
                      $.ajax({
                        url: SITEURL + 'payment/razorPaySuccess',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,sponsors:sponsorid,
                        }, 
                        success: function (msg) {
                         
                           //window.location.href = SITEURL + 'payment/RazorThankYou';
                        }
                    });
                    $('.submitregister').trigger('click');
                },
                "theme": {
                    "color": "#528FF0"
                }
            };
           
            var rzp1 = new Razorpay(options);
            rzp1.open();
            e.preventDefault();
        }
    });
    
     
    
}); 
</script>
			

   <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
	<!-- Data table JavaScript -->
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<!-- Slimscroll JavaScript -->
	<script src="<?php echo base_url(); ?>assets/dist/js/jquery.slimscroll.js"></script>
	
	<!-- simpleWeather JavaScript -->
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/dist/js/simpleweather-data.js"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="<?php echo base_url(); ?>assets/dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="<?php echo base_url(); ?>assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- ChartJS JavaScript -->
	<script src="<?php echo base_url(); ?>assets/vendors/chart.js/Chart.min.js"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/morris.js/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="<?php echo base_url(); ?>assets/dist/js/init.js"></script>
	<script src="<?php echo base_url(); ?>assets/dist/js/dashboard-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/multiselect/multiselect.js"></script> <!-- Resource JavaScript -->
	<!-- Sweet-Alert  -->
	<!--<script src="<?php echo base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>-->


</body>
</html>



