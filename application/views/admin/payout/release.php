
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Release Income</h1>
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
														
														<th>Sr No.</th>
													    <th>User Id</th>
														<th>Full Name</th>
														<th>Balance Amount</th>
														<th>Pay</th>
													    <th>View User Data</th>
													</tr>
												
												</thead>
											  
												<tbody>
												   	<?php if(!empty($result)) { $i=1; foreach($result as $results) { 
													    $wlt=get_sum_wallet_balance($results->HRM_ID)-get_sum_account_balance($results->HRM_ID);
													    if($wlt>0) {
													    ?>
															<tr>
																<td><?php echo $i; ?></td>
																<td><?php echo $results->HRM_ID; ?></td>
																<td><?php echo $results->HRM_NAME; ?></td>
																<td><?php echo $wlt; ?></td>
																<td><button type="button" class="btn btn-primary pay_comission" attr-name='<?php echo $results->HRM_NAME; ?>' attr-amount='<?php echo $wlt; ?>' attr-id='<?php echo $results->HRM_ID; ?>'>Release</button>
															</td>
																<td><i class="fa fa-eye view_dt" attr-name='<?php echo $results->HRM_NAME; ?>' attr-id='<?php echo $results->HRM_ID; ?>' attr-dob='<?php echo get_hrm_postmeta($results->HRM_ID,'dob'); ?>' attr-address='<?php echo get_hrm_postmeta($results->HRM_ID,'address'); ?>' attr-pincode='<?php echo get_hrm_postmeta($results->HRM_ID,'pin_code'); ?>' attr-pan='<?php echo get_hrm_postmeta($results->HRM_ID,'pancard'); ?>' attr-email='<?php echo get_hrm_postmeta($results->HRM_ID,'email'); ?>' attr-mob='<?php echo get_hrm_postmeta($results->HRM_ID,'contact'); ?>' attr-bank='<?php  echo get_hrm_postmeta($results->HRM_ID,'ac_no'); ?>' attr-bnk_nm='<?php echo get_banks_by_id(get_hrm_postmeta($results->HRM_ID,'bank_id')); ?>' attr-branchname='<?php echo get_hrm_postmeta($results->HRM_ID,'branch_name'); ?>'></i></td>
															</tr>
														<?php $i++; } } } ?>
													
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
        <!-- Button trigger modal -->

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
  <!-- Modal -->
  <div class="modal fade" id="payment_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
         <form id="pay_commission">
            <div class="modal-header pay_modal_header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Release Commission</h4>
            </div>
            <div class="modal-body">
                <div class="row"><div class="col-md-12"><div class="errors alert alert-warning"></div></div></div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Name : </label>
                        <input type="text" name="name_user" id="name" class="form-control" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>User Id : </label>
                        <input type="text" name="user_id" id="user_id" class="form-control" readonly>
                    </div>
                </div>
                <div class="row mrg_tp_15">
                    <div class="col-md-6">
                        <label>Amount : </label>
                        <input type="text" name="amount" id="amount" class="form-control input_num">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
               <input type="submit" class="btn btn-primary release_com" value="Release">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
