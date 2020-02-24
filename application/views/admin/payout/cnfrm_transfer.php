
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Confirm Transfer</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								    <div class="row">
								        <form action='' method="post">
    								        <div class="col-md-4">
    								            <label>From : </label>
    								            <input type="text" class="datepicker form-control" name="from" value="<?php if(isset($_POST['from'])){ echo $_POST['from']; } ?>" placeholder='Enter from date' required>
    								        </div>
    								        <div class="col-md-4">
    								            <label>To : </label>
    								            <input type="text" class="datepicker form-control" name="to" value="<?php if(isset($_POST['to'])){ echo $_POST['to']; } ?>" placeholder='Enter to date' required>
    								        </div>
    								        <div class="col-md-4">
    								            <button type="submit" class="btn btn-success mrg_tp_25" name="searchconfirm">Search</button>
    								        </div>
								        </form>
								    </div>
									<div class="table-wrap mrg_tp_25">
										<div class="table-responsive">
											<table class="table table-hover display datatabel_common">
												<thead>
													<tr>
														
														<th>Sr No.</th>
													    <th>User Id</th>
														<th>Full Name</th>
														<th>Amount</th>
														<th>Confirm Pay</th>
													    <th>View User Data</th>
													</tr>
												
												</thead>
											  
												<tbody>
												    	<?php if(!empty($pend_pay)) { $i=1; foreach($pend_pay as $results) { 
												    	   
													        $acc_dt=get_dt_account_by_id($results->ACCOUNT_ID);
													        $ldger_dt=get_ledger_dt_by_id($acc_dt[0]->DR_ID);
													        $hrm_id=str_replace("matc_","",$ldger_dt[0]->NAME);
													    ?>
													    	<tr>
																<td><?php echo $i; ?></td>
																<td><?php echo $hrm_id; ?></td>
																<td><?php echo get_hrm_postmeta($hrm_id,'first_name')." ".get_hrm_postmeta($hrm_id,'last_name'); ?></td>
																<td><?php echo $acc_dt[0]->AMOUNT; ?></td>
																<td><button type="button" class="btn btn-primary cnf_transfer" attr-name='<?php echo get_hrm_postmeta($hrm_id,'first_name')." ".get_hrm_postmeta($hrm_id,'last_name'); ?>' attr-amount='<?php echo $acc_dt[0]->AMOUNT; ?>' attr-pendid='<?php echo $results->PAY_ID; ?>' attr-id='<?php echo $hrm_id; ?>'>Confirm Pay</button>
															</td>
																<td><i class="fa fa-eye view_dt" attr-name='<?php echo get_hrm_postmeta($hrm_id,'first_name')." ".get_hrm_postmeta($hrm_id,'last_name'); ?>' attr-id='<?php echo $hrm_id; ?>' attr-dob='<?php echo get_hrm_postmeta($hrm_id,'dob'); ?>' attr-address='<?php echo get_hrm_postmeta($hrm_id,'address'); ?>' attr-pincode='<?php echo get_hrm_postmeta($hrm_id,'pin_code'); ?>' attr-pan='<?php echo get_hrm_postmeta($hrm_id,'pancard'); ?>' attr-email='<?php echo get_hrm_postmeta($hrm_id,'email'); ?>' attr-mob='<?php echo get_hrm_postmeta($hrm_id,'contact'); ?>' attr-bank='<?php  echo get_hrm_postmeta($hrm_id,'ac_no'); ?>' attr-bnk_nm='<?php echo get_banks_by_id(get_hrm_postmeta($hrm_id,'bank_id')); ?>' attr-branchname='<?php echo get_hrm_postmeta($hrm_id,'branch_name'); ?>'></i></td>
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
