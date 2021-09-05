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
   
//echo "yess".print_r(get_level_row_members('NAM2763873','2'));
?>
<script>
    $( function() {
    
    var availableTags = <?php echo json_encode($large_arr); ?>;
    // $( ".tags" ).autocomplete({
    //   source: availableTags
    // });
    
	
    
  } );
</script>
<script>
		</script>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
                           <div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Member Registration</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div  class="pills-struct">
								<ul role="tablist" class="nav nav-pills" id="myTabs_6">
									<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#home_6">Paid Registration</a></li>
								</ul>
								<div class="tab-content" id="myTabContent_6">
									<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
								    	<form id="selfregister" action=''>
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
            											<div class="head"></div>
            										</div>
            										<div class="col-md-6 col-xs-6 text-right">
            											<i class="fa btn btn-primary slides_class fa-minus"></i>
            										</div>
            									</div>
            									<div class="inner_sec_slide">
                								
                									<div class="row">
													<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Sponsor Id <span class="star">*</span></label></div>
                											
                												<input type="text" name="sponserid" class="form-control get_name_member get_postitionid tags" style="text-transform: uppercase;" value="" autocomplete="off" required> 
                											
                											</div>
                										</div>

                									    <div class="col-md-4">
                											<div class="form-group">
                												<div><label>Package <span class="star">*</span></label></div>
                												<select name="pack" class="form-control packmain" required>
																<option value="">Select Package</option>
                													<?php foreach($packs as $pack) { ?>
                													    <option value="<?php echo $pack->PACKAGE_ID;?>" attr-price="<?php echo $pack->PACKAGE_PRICE; ?>"><?php echo $pack->PACKAGE_NAME." [ ".$pack->PACKAGE_PRICE." ]";?></option>
                													<?php } ?>
                												</select>
                											</div>
                										</div>
                									  
                										<div class="col-md-4">
                											<div class="form-group">
                												<div><label>E-PIN No. <span class="star">*</span></label></div>
                												<select name="epinno" class="form-control epins_register" required>
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
                									<div class="row" style="display:none">
                										<div class="col-md-6"  <?php echo $var; ?>>
                											<div class="form-group">
                												<div><label>Back Date (Registration)</label></div>
                												<input type="text" name="bckdate" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>" readonly> 
                											</div>
                										</div>
                									    <input type="hidden" name="desiredid" class="form-control input_num" value=""> 
                										
                									</div>
                									<div class="row forleader">
													<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Sponsor Name<span class="star">*</span></label></div>
                											
                												<input type="text" name="sponsorname" class="form-control sponsorname" style="text-transform: uppercase;" readonly> 
                											
                											</div>
                										</div>

                									    <div class="col-md-4">
                											<div class="form-group">
                												<div><label>Position <span class="star">*</span></label></div>
                												<select name="pos" class="form-control pos get_postitionid" required>
                													<option value=''>Select Position</option>
                													<option value='1' <?php  if($this->uri->segment(5)==1) echo 'selected'; ?>>LEFT</option>
                													<option value='2' <?php  if($this->uri->segment(5)==2) echo 'selected'; ?>>RIGHT</option>
                												</select>
                											</div>
            									    	</div>
														
													
														
                									    <div class="col-md-4">
                											<div class="form-group">
                												<!-- <div><label>Position Id <span class="star">*</span></label></div> -->
                												<input type="hidden" name="positionid" class="form-control position_check" style="text-transform: uppercase;" value="<?php echo $this->uri->segment(4); ?>" readonly> 
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
                												<div><label>Mobile No. <span class="star">*</span></label></div>
                												<input type="text" name="phone" class="form-control phone input_num"> 
                											</div>
                										</div>

														<div class="col-md-4">
                											<div class="form-group">
                												<div><label>Pan Card </label></div>
            													<input type="text" name="pancard" class="form-control pancard"> 
                											</div>
                										</div>
                									
                										
                									</div>
                								
            									</div>
            								</div>
            							
            								<div class="">
            								   <div class="row">
            								        <div class="col-md-12 text-center mrg_tp_25">
            											<!-- <label><input type="checkbox" name="terms" value="yes" class="terms" required style="position: relative;top: 2px;"> I agree with the <a href="javsacript:void(0);"  data-toggle="modal" data-target="#myModal">terms and conditions</a> <span class="star">*</span></label> -->
            										</div>
            										<div class="col-md-12 text-center">
            											<input type="submit" class="btn btn-primary submitregister sections" value="SUBMIT">
            											<!-- <input type="button" class="btn btn-primary onlinepay sections" value="SUBMIT"> -->
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
		
		<script>
		    $(document).ready(function (){
		    //  $('.positioncheck').keyup();
			  <?php  if($this->session->userdata('hrmtype') != 'admin') { ?>
				// $('.get_name_member').focusout();
			  <?php } ?>
		    });
		</script>
       
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
				   
				   $('.pancard').on('Keyup',function(){
			           check_duplicate_pancard();
			       }); 
			       $('.pancard').on('focusout',function(){
					check_duplicate_pancard();
			       }); 
			       $('.pancard').on('change',function(){
					check_duplicate_pancard();
				   });

				   $('.phone').on('Keyup',function(){
			           check_duplicate_phone();
			       }); 
			       $('.phone').on('focusout',function(){
					check_duplicate_phone();
			       }); 
			       $('.phone').on('change',function(){
					check_duplicate_phone();
				   });


				
 $("#selfregister").validate({
        rules: {
            "firstname": {
                required: true,
               
            },
            "lastname": {
                required: true,
            },
            "phone": {
                required: true,
               
            }, 
			"pancard": {
				required: true
			},
			"pass" : {
			        required: true,
            },
            "cpass" : {
                required: true,
                equalTo : "#password"
            },
			
			"sponserid":{
				 required: true,
			},
			"pos":{
			    required: true,
			}
			
		},
        
        submitHandler: function (form) { // for demo
			$('#checkedform').val('1');

        }
	});
	

	$("#selfregister").on('submit', function(e){
		var checked=$('#checkedform').val();
		var pass=$('#password').val();

		if(checked=='1'){
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: admin_loc+'selfregister',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				async:false,
				beforeSend: function(){
					$('.submitregister').attr("disabled","disabled");
					$('.submitregister').attr("value","Please Wait...");
				},
				success: function(msg){
					msg=$.trim(msg);
					console.log(msg);
					var s = msg.substr(0, 2);
					if(s == 'RM'){
						$('#selfregister').trigger('reset');
						 var str="USER ID : "+msg+"<br> PASSWORD : "+pass+"";
						 sweetalert('Member Registration','success',str,'#469408');
						 $(".submitregister").attr("disabled",false);
						 $('#checkedform').val('0');
						 $('.submitregister').attr("value","SUBMIT");
						 var rand=getRndInteger(1000, 9999);
						 $('#password').val(rand);
						 $('#confirm_password').val(rand);
					}else{
						 $(".submitregister").attr("disabled",false);
						 sweetalert('Failure','warning',msg,'#f99b4a');
						 $('#checkedform').val('0');
						 $('.submitregister').attr("value","SUBMIT");
					}
				}
			});
		}
	});

    
    
				});
				
				function check_duplicate_pancard(){
					var pancard=$('.pancard').val();
			        //var position=$('.pos').val();
			        if(pancard != ''){
			            $.ajax({
            				type: 'POST',
            				url: admin_loc+'get_pancard',
            				data: 'pancard='+pancard,
            				async:false,
            				success: function(msg){
							
								var obj = jQuery.parseJSON(msg);
							
            				    if(obj.msg=="Pan No already taken"){
									sweetalert('Invalid','warning',obj.msg,'#f99b4a');
									$('.pancard').val('');
            				    }else{
									// $('.sponsor_name').val(obj.hrm_name);
            				        // $('.position_check').val(obj.hrm_id);
            				    }
            				}
            			});
			        }
				}
				

				function check_duplicate_phone(){
					var phone=$('.phone').val();
					

			        //var position=$('.pos').val();
			        if(phone != ''){
			            $.ajax({
            				type: 'POST',
            				url: admin_loc+'get_phone',
            				data: 'phone='+phone,
            				async:false,
            				success: function(msg){
							
								var obj = jQuery.parseJSON(msg);
							
            				    if(obj.msg=="Mobile No already taken"){
									sweetalert('Invalid','warning',obj.msg,'#f99b4a');
									$('.phone').val('');
            				    }else{
									// $('.sponsor_name').val(obj.hrm_name);
            				        // $('.position_check').val(obj.hrm_id);
            				    }
            				}
            			});
			        }
				}


			    function change_position(){
			        var sponsorid=$('.get_name_member').val();
			        var position=$('.pos').val();
			        if(sponsorid!='' && position!=''){
			            $.ajax({
            				type: 'POST',
            				url: admin_loc+'get_positionid',
            				data: 'sponsorid='+sponsorid+'&position='+position,
            				async:false,
            				success: function(res){
								var obj = jQuery.parseJSON(res);
								
            				    if(obj.msg=="Invalid Sponsor id"){
            				        sweetalert('Invalid','warning',obj.msg,'#f99b4a');
            				    }else{
            				        $('.position_check').val(obj.hrm_id);
									$('.sponsorname').val(obj.hrm_name);
            				    }
            				}
            			});
			        }
			    }
			</script>
		
