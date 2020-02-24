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
									<h1 class="panel-title txt-dark">Transactions List</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
										  
											<table class="table table-hover display datatabel_common">
												<thead>
													<tr>
													    <th>SR NO.</th>
														<th>Date</th>
														<!--<th>Description</th>-->
														<th>Debit</th>
													    <th>Credit</th>
														<th>Balance</th>
													</tr>
												</thead>
											    <tbody>
													<?php if(!empty($result)){ $i=1;$balanceamt=0;
													 foreach($result as $results){  
													    $amt1=0;$amt2=0; 
													    if($results->DR_ID==$ledgerid){
													        $amt2=$results->AMOUNT;
													        $balanceamt+=$amt2;
													    }
													    if($results->CR_ID==$ledgerid){
													        $amt1=$results->AMOUNT;
													        $balanceamt-=$amt1;
													    }
													    
													 ?>
                                                         <tr>
                                                             <td><?php echo $i; ?></td>
                                                             <td><?php echo $results->DATE; ?></td>
                                                             <!--<td><?php echo $results->PARTICULAR; ?></td>-->
                                                             <?php if($amt1!=0){ ?>
                                                             <td style="color:red;"><?php echo $amt1; ?></td>
                                                             <?php } else { ?>
                                                              <td><?php echo $amt1; ?></td>
                                                             <?php } ?>
                                                              <?php if($amt2!=0){ ?>
                                                              <td style="color:green;"><?php echo $amt2; ?></td>
                                                             <?php } else { ?>
                                                              <td><?php echo $amt2; ?></td>
                                                             <?php } ?>
                                                            
                                                            <td><?php echo $balanceamt; ?></td>
                                                         </tr>
                                                    <?php $i++; } } ?>
														
													
												</tbody>
											</table>
											
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
						<p><?php echo date('Y'); ?> &copy; <?php echo get_option('footer_name'); ?> All rights reserved</p>
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
  <script>
  <!-- Modal -->
 /* $(document).ready(function () {
        var type='<?php if($this->session->userdata('hrmtype') == 'admin') { echo "1"; } else { echo "0"; } ?>';
	    if(type==1){
	       $('#posts').DataTable({
                dom: 'Bfrtip',
                buttons: [
                   'excel', 'pdf', 'print'
                ],
                "processing": true,
                "serverSide": true,
                "ajax":{
    		     "url": "<?php echo base_url('admin/posts') ?>",
    		     "dataType": "json",
    		     "type": "POST",
    		     "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
    		                   },
        	    "columns": [
        		          
        		          { "data": "HRM_ID" },
        		          { "data": "HRM_NAME" },
        		          { "data": "HRM_DATE" },
        		          { "data": "CONTACT" },
        		          { "data": "HRM_STATUS" },
        		          { "data": "HRM_ADDED_TIME" },
        		       ]	 
    
    	    });
	    }else{
	        $('#memberposts').DataTable({
                dom: 'Bfrtip',
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
        		          { "data": "CONTACT" },
        		          { "data": "HRM_ADDED_TIME" },
        		       ]	 
    
    	    });
	    }
        
	   
    }); */
    </script>