<?php 
include 'head.php';
?>

<link rel="stylesheet" type="text/css" href="reg.css">


<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="#" method="post" id="memberregister">
				<div class="form-left">
					<h2>Personal Details</h2>
					<!-- <div class="form-row">
						<select name="title">
						    <option class="option" value="title">Title</option>
						    <option class="option" value="businessman">Businessman</option>
						    <option class="option" value="reporter">Reporter</option>
						    <option class="option" value="secretary">Secretary</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div> -->
					<div class="form-group">
						<div class="form-row form-row-1">
						<input type="hidden" id="checkedform" value='0'>
							<input type="text" name="sponserid" id="sponserid" style="" class="input-text get_name_member get_postitionid" placeholder="Sponsor Id*" autocomplete="off" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="sponsor_name" id="sponsor_name" class="input-text sponsor_name" placeholder="Sponsor Name" readonly>
						</div>

					</div>

					<div class="form-row">
						<input type="text" name="firstname" class="name_free" id="firstname" placeholder="Applicant's Name*" required>
						<input type="hidden" name="lastname" class="form-control">
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
						<input type="text" name="phone" class="phone input_num" id="phone" placeholder="Phone No*" required>
						</div>
						<div class="form-row form-row-2">
						<input type="text" name="email" class="email" id="email" placeholder="Email*" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
						<input type="text" name="pancard" class="pancard" id="pancard" placeholder="Pan Card*" required>
						</div>
						<div class="form-row form-row-2">
						<input type="text" name="aadhar" class="aadhar" id="aadhar" placeholder="Aadhar No*" required>
						</div>
					</div>

					<div class="form-group" style="display:none">
						<div class="form-row form-row-1">
						<input type="password" name="pass" id="password" class="form-control" value="<?php echo $pass=rand(1000,9999); ?>"> 
						</div>
						<div class="form-row form-row-2">
						<input type="radio" name="sponsor_type" class="sponsor_type" value="other" checked>OTHER ID

						<input type="hidden" name="desiredid" class="form-control input_num" value=""> 
						<input type="password" name="cpass" id="confirm_password" class="form-control" value="<?php echo $pass; ?>" onkeyup='check();'> 
						<input type="text" name="positionid" class="form-control position_check" style="text-transform: uppercase;" value="<?php echo $this->uri->segment(4); ?>" readonly> 

						</div>
					</div>

					<!-- <div class="form-row">
						<input type="text" name="firstname" class="name_free" id="firstname" placeholder="Applicant's Name*" required>
						<input type="hidden" name="lastname" class="form-control">
					</div> -->

					<div class="form-group">
						<div class="form-row form-row-1">
						<select name="gender" required>
						    <option value="">Gender*</option>
						    <option value="Male">Male</option>
						    <option value="Male">Female</option>
						    <option value="Male">Others</option>
						    <!-- <option value="employee">Employee</option> -->
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					
						<div class="form-row form-row-2">
						<input type="text" name="dob" class="dob datepicker" id="dob" placeholder="DOB*" readonly>
						</div>
					</div>

					<div class="form-row">
						<input type="text" name="address" class="address" id="editor" placeholder="Address" required>
					</div>
					<!-- <div class="form-group">
						<div class="form-row form-row-3">
							<input type="text" name="business" class="business" id="business" placeholder="Business Arena" required>
						</div>
						<div class="form-row form-row-4">
							<select name="employees">
							    <option value="employees">Employees</option>
							    <option value="trainee">Trainee</option>
							    <option value="colleague">Colleague</option>
							    <option value="associate">Associate</option>
							</select>
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
					</div> -->
				</div>
				<div class="form-right">
					<h2>Bank Details</h2>
					<div class="form-row">
						<input type="text" name="acno" class="input_num" id="acno" placeholder="Bank A/c">
					</div>
					<div class="form-row">
						<input type="text" name="holdername" class="additional" id="holdername" placeholder="A/c Holder Name" >
					</div>
					<div class="form-row">
					
					
							<select name="bank">
							    <option value="">Bank</option>
							    <?php foreach($banks as $bank) { ?>
                													
							<option value="<?php echo $bank->BANK_ID;?>"><?php echo $bank->BANK_NAME;?></option>
																<?php } ?>
							</select>
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
					
					</div>
					<!-- <div class="form-row">
						<select name="country">
						    <option value="country">Country</option>
						    <option value="Vietnam">Vietnam</option>
						    <option value="Malaysia">Malaysia</option>
						    <option value="India">India</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div> -->
					<!-- <div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="code" class="code" id="code" placeholder="Code +" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="phone" class="phone" id="phone" placeholder="Phone Number" required>
						</div>
					</div> -->
					<div class="form-row">
						<input type="text" name="branch" id="branch" class="input-text"  placeholder="Branch">
					</div>

					<div class="form-row">
						<input type="text" name="ifsc" id="ifsc" class="input-text"  placeholder="IFSC Code">
					</div>

					<div class="form-checkbox">
						<label class="container"><p>I agree with the <a href="javsacript:void(0);"  data-toggle="modal" data-target="#myModal" class="text">Terms and Conditions</a> </p>
						  	<input  type="checkbox" name="terms" value="yes" class="terms" required style="position: relative;top: 2px;">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" class="register submitregister" value="SUBMIT">
					</div>
				</div>
			</form>
		</div>
    </div>

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
									    <li>Company reserves the right to modify the Term and Condition , Products, Plan, Business policy to give prior notice through our website www.rmgm.com and it will be binding on all Distributors and members.</li>
									    <li>All dispute with regarding "RMGM" jurisdication with Kanpur Nagar District Court only.</li>
									</ol>
								</div>
							</div>
						</div>
					
					</div>
				
				</div>
				
			</div>
    <script>
			    $('document').ready(function(){
			      
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
   	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	         
     

<?php 
include 'foot.php';
?>
