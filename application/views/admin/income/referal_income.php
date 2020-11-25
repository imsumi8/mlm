<?php


?>

<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Referal Income</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<!-- Row -->
            				<div class="row">
            					<div class="col-lg-12 col-sm-12 col-md-12">
            						<div class="panel card-view">
            							<div class="panel-wrapper collapse in">
            								<div class="panel-body">
            									<div  class="pills-struct">
            										<ul role="tablist" class="nav nav-pills" id="myTabs_6">
            											<!-- <li class="active" role="presentation" style="background-color: #6ab0ec;"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#home_6">Add Category</a></li> -->
            											<!--<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#profile_6" aria-expanded="false">Franchisee Epin</a></li>-->
            										    <!--<li role="presentation" class=""><a  data-toggle="tab" id="front_tab_6" role="tab" href="#front_6" aria-expanded="false">Front Site Epin</a></li>-->
            										</ul>
            										<div class="tab-content" id="myTabContent_6">
            											<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
            											    <form id="add_referal_income" action=''>
            											        <!-- <input type="hidden" name="category" value="<?php echo $this->uri->segment(6); ?>"> -->
                                								<div class="sections">
                                									<div class="row"><div class="col-md-12"><div class="errors alert alert-warning"></div></div></div>
                                							
                                									<div class="row">
                                										<div class="col-md-6">
                                											<div class="form-group">
												
                                												<div><label>Referal Income<span class="star">*</span></label></div>
                                												<input type="text" name="pair_income"  class="form-control" autocomplete="off" value="<?php echo get_option('pair_income'); ?>"> 
                                											</div>
                                										</div>
                                										
                                									</div>
                                									<div class="row">
                                										<div class="col-md-12">
                                											<input type="submit" class="btn btn-success submitcategory" style="background: #65cea7; border: solid 1px #65cea7;" value="SUBMIT >>">
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
            				<!-- /Row -->

							<div class='row'>
									
										


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
          
          $("#add_referal_income").on('submit', function(e){
	
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: admin_loc+'add_referal_income',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				beforeSend: function(){
					$('.submitcategory').attr("disabled","disabled");
					$('.submitcategory').attr("value","Please Wait...");
				},
				success: function(msg){
					msg=$.trim(msg);
					if(msg == 'ok'){
						
						sweetalert('Success','success','Income Added Successfully!','#469408');
						$(".submitcategory").attr("disabled",false);
						// location.href = base_loc+"direct_income";
						$('.submitcategory').attr("value","SUBMIT");
					}else{
						 $(".submitcategory").attr("disabled",false);
						 sweetalert('Failure','warning',msg,'#f99b4a');
						 $('.submitcategory').attr("value","SUBMIT");
					}
				}
			});
		
});

                	</script>


			