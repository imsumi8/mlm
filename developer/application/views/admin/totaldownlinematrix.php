<?php

    $query=$this->db->query('Select HRM_ID,HRM_NAME from hrm_post where HRM_STATUS=1 and HRM_ID!=5000');
    $results=$query->result();
    $large_arr=array();
    foreach($results as $res){
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
    .btn-block{
            
            max-width: 120px;
            font-size: 10px;
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
									<h1 class="panel-title txt-dark">Total Downline Member List</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								    <?php if($this->session->userdata('hrmtype') == 'admin') { ?>
								    <div class="row search_panel">
								        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							                 <label>User Id : </label>
									        <input type="text" class="form-control user" id="tags" name="userid" value="" placeholder='Enter user id' required>
								        </div>
    								    <div class="col-md-offset-4 col-lg-offset-4 col-lg-4 col-md-4 col-sm-8 col-xs-8 text-right">
                    						<div class="panel panel-default card-view pa-0">
                    							<div class="panel-wrapper collapse in">
                    								<div class="panel-body pa-0">
                    									<div class="sm-data-box dashboxes actived">
                    										<div class="container-fluid">
                    											<div class="row">
                    												<div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
                    													<span class="txt-light block counter fnt_20"><span class="counter-anim total_down">0</span></span>
                    													<span class="weight-500 uppercase-font txt-light block fnt_20">Total Downline</span>
                    												    <div class="text-center txt-light">
                                                                            <div class="col-md-6 col-xs-6">
                                                                                LEFT<div class="leftdown">0</div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-6 col-xs-6">
                                                                                RIGHT<div class="rightdown">0</div>
                                                                            </div>
                                                                        </div>
                                                                        
                    												</div>
                    												<div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right" style="min-height:150px;">
                    													<i class="zmdi zmdi-male-female txt-light fnt_100 data-right-rep-icon"></i>
                    												</div>
                    											</div>	
                    										</div>
                    									</div>
                    								</div>
                    							</div>
                    						</div>
                    					</div>
								    </div>
								    <?php } ?>
									<div class="table-wrap">
										<div class="table-responsive">
										    <?php if($this->session->userdata('hrmtype') == 'admin') { ?>
											<table class="table table-hover display" id="posts">
												<thead>
													<tr>
													
														<th>User Id</th>
														<th>Full name</th>
														<th>Registered Date</th>
														<th style="width:280px;">Package</th>
														<th>Introducer Id [Name]</th>
														<th>Contact</th>
													    <th class="mystatadmin">Status</th>
														<th>Tools</th>
													</tr>
												</thead>
											    <tbody>
												
														
													
												</tbody>
											</table>
											<?php } else { ?>
											<table class="table table-hover display" id="memberposts">
												<thead>
													<tr>
													    <th>User Id</th>
														<th>Full name</th>
														<th>Registered Date</th>
														<th style="width:280px;">Package</th>
														<th>Introducer Id [Name]</th>
														<th>Contact</th>
													    <th>Tools</th>
													</tr>
												</thead>
											    <tbody>
												
														
													
												</tbody>
											</table>
											<?php } ?>
										</div>
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
						<p><?php echo date('Y'); ?> &copy; <?php echo get_option('footer_name'); ?>. All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->
        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header pay_modal_header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">User Details</h4>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-12">
                  <table class="table table-bordered table-hover table-striped">
                      <tr>
                          <td>User Id</td>
                          <td class='userid'>5033</td>
                      </tr>
                      <tr>
                          <td>Full Name</td>
                          <td class='fullname'>Dheeraj Verma</td>
                      </tr>
                      <tr>
                          <td>Date of Birth</td>
                          <td class='dob'>MY NAME</td>
                      </tr>
                      <tr>
                          <td>Address</td>
                          <td class='address'>MY NAME</td>
                      </tr>
                      <tr>
                          <td>Pin Code</td>
                          <td class='pincode'>MY NAME</td>
                      </tr>
                      <tr>
                          <td>Pan Card</td>
                          <td class='pan'>MY NAME</td>
                      </tr>
                      <tr>
                          <td>Email</td>
                          <td class='email'>MY NAME</td>
                      </tr>
                      <tr>
                          <td>Mobile No.</td>
                          <td class='mob'>MY NAME</td>
                      </tr>
                       <tr>
                          <td>Bank A/c No.</td>
                          <td class='bank'>MY NAME</td>
                      </tr>
                      <tr>
                          <td>Bank Name</td>
                          <td class='bnk_nm'>MY NAME</td>
                      </tr>
                      <tr>
                          <td>Branch Name</td>
                          <td class='branchname'>MY NAME</td>
                      </tr>
                  </table>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- edit modal -->
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <form id="smalledit">
            <div class="modal-header pay_modal_header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">User ID : <span class="useridedit"></span></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="userid" id="userid" value="">
                        <table class="table table-bordered table-hover table-striped">
                          <tr>
                              <td>PHONE NO</td>
                              <td class=''><input type="text" name="contact" id="contact" class="form-control"></td>
                          </tr>
                          <tr>
                              <td>PASSWORD</td>
                              <td class=''><input type="password" name="pass" class="form-control"></td>
                          </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="submit" class="smalledit btn btn-primary" name="smalledit" value="Update">
            </div>
        </form>
      </div>
      
    </div>
  </div>
  <script>
  <!-- Modal -->
  $(document).ready(function () {
        var type='<?php if($this->session->userdata('hrmtype') == 'admin') { echo "1"; } else { echo "0"; } ?>';
	    if(type==1){
	       $('.user').on('blur',function(){
	           var user=$('.user').val();
	           if(user==''){
	               user='5000';
	               $('.leftdown').html('0');
	               
	               $('.rightdown').html('0');
	               $('.total_down').html('0');
	           }else{
	                $.ajax({
        				type: 'POST',
        				url: admin_loc+'check_downs',
        				data: 'user='+user,
        				async:false,
        				dataType: "json",
        				success: function(msg){
        					console.log(msg);
        					var tot=0;
        					//alert(msg[0]+" "+msg[1]+" "+msg[2]);
        					if(msg[0]===undefined){
        					    $('.leftdown').html('0');
        					}else{
        					    $('.leftdown').html(msg[0]);
        					    tot+=msg[0];
        					}
        					if(msg[1]===undefined){
        					    $('.rightdown').html('0');
        					}else{
        					    $('.rightdown').html(msg[1]);
        					    tot+=msg[1];
        					}
        					$('.total_down').html(tot);
        				}
        			});
	           }
	           $("#posts").dataTable().fnDestroy();
	           $('#posts').DataTable({
                    dom: 'Bfrtip',
                    pageLength: '30',
                    buttons: [
                       'excel', 'pdf', 'print'
                    ],
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
        		     "url": "<?php echo base_url('admin/posts') ?>",
        		     "dataType": "json",
        		     "type": "POST",
        		     "data":{  'userid' : user }
        		                   },
            	    "columns": [
            		          
            		          { "data": "HRM_ID" },
            		          { "data": "HRM_NAME" },
            		          { "data": "HRM_DATE" },
            		          { "data": "PACKAGE" },
            		          { "data": "INTRODUCER" },
            		          { "data": "CONTACT" },
            		          { "data": "HRM_STATUS" },
            		          { "data": "HRM_ADDED_TIME" },
            		       ]	 
        
        	    });
	           
	       });
	       $('#posts').DataTable({
                dom: 'Bfrtip',
                pageLength: '30',
                buttons: [
                   'excel', 'pdf', 'print'
                ],
                "processing": true,
                "serverSide": true,
                "ajax":{
    		     "url": "<?php echo base_url('admin/posts') ?>",
    		     "dataType": "json",
    		     "type": "POST",
    		     "data":{  'userid' : '5000' }
    		                   },
        	    "columns": [
        		          
        		          { "data": "HRM_ID" },
        		          { "data": "HRM_NAME" },
        		          { "data": "HRM_DATE" },
        		          { "data": "PACKAGE" },
        		          { "data": "INTRODUCER" },
        		          { "data": "CONTACT" },
        		          { "data": "HRM_STATUS" },
        		          { "data": "HRM_ADDED_TIME" },
        		       ]	 
    
    	    });
	    }else{
	        $('#memberposts').DataTable({
                dom: 'Bfrtip',
                pageLength: '30',
                buttons: [
                   'excel', 'pdf', 'print'
                ],
                "processing": true,
                "serverSide": true,
                "ajax":{
    		     "url": "<?php echo base_url('admin/memberposts') ?>",
    		     "dataType": "json",
    		     "type": "POST",
    		     "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
    		                   },
        	    "columns": [
        		          
        		          { "data": "HRM_ID" },
        		          { "data": "HRM_NAME" },
        		          { "data": "HRM_DATE" },
        		          { "data": "PACKAGE" },
        		          { "data": "INTRODUCER" },
        		          { "data": "CONTACT" },
        		          { "data": "HRM_ADDED_TIME" },
        		       ]	 
    
    	    });
	    }
        
	   
    });
    </script>