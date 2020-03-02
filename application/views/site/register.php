<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>RMGM | Register</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/register/css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/register/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/register/css/style.css"/>
</head>
<body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="#" method="post" id="myform">
				<div class="form-left">
					<h2>General Infomation</h2>
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
							<input type="text" name="sponserid" id="sponserid" style="" class="input-text get_name_member get_postitionid" placeholder="Sponsor Id" autocomplete="off" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="sponsor_name" id="sponsor_name" class="input-text sponsor_name" placeholder="Sponsor Name" readonly>
						</div>
					</div>
					<div class="form-row">
						<select name="position">
						    <option value="position">Position</option>
						    <option value="director">Director</option>
						    <option value="manager">Manager</option>
						    <option value="employee">Employee</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-row">
						<input type="text" name="company" class="company" id="company" placeholder="Company" required>
					</div>
					<div class="form-group">
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
					</div>
				</div>
				<div class="form-right">
					<h2>Contact Details</h2>
					<div class="form-row">
						<input type="text" name="street" class="street" id="street" placeholder="Street + Nr" required>
					</div>
					<div class="form-row">
						<input type="text" name="additional" class="additional" id="additional" placeholder="Additional Information" required>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="zip" class="zip" id="zip" placeholder="Zip Code" required>
						</div>
						<div class="form-row form-row-2">
							<select name="place">
							    <option value="place">Place</option>
							    <option value="Street">Street</option>
							    <option value="District">District</option>
							    <option value="City">City</option>
							</select>
							<span class="select-btn">
							  	<i class="zmdi zmdi-chevron-down"></i>
							</span>
						</div>
					</div>
					<div class="form-row">
						<select name="country">
						    <option value="country">Country</option>
						    <option value="Vietnam">Vietnam</option>
						    <option value="Malaysia">Malaysia</option>
						    <option value="India">India</option>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="code" class="code" id="code" placeholder="Code +" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="phone" class="phone" id="phone" placeholder="Phone Number" required>
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="your_email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
					</div>
					<div class="form-checkbox">
						<label class="container"><p>I do accept the <a href="#" class="text">Terms and Conditions</a> of your site.</p>
						  	<input type="checkbox" name="checkbox">
						  	<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" class="register" value="Register Badge">
					</div>
				</div>
			</form>
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
            
     

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>