
<style>
    .btn-block{
            
            max-width: 120px;
            font-size: 10px;
    }
    th,td {
    border: 1px solid #ddd;
    }
</style>
<div class="page-wrapper">
            <div class="container-fluid pt-25">

            <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Franchise Downline Member List</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover display pb-30" style="border: 1px solid #000000;">
												
												<tbody>
                                                <tr>
														<th rowspan="2">S.No.</th>
														<th rowspan="2">User Id</th>
														<th rowspan="2">Name</th>
														<th rowspan="2"></th>
														<th rowspan="2"></th>

														<th rowspan="2">Count</th>
													
														<th rowspan="2">% Level</th>
														<th class="text-center" colspan="3">Current Month BV</th>
														<th colspan="3" class="text-center">Total Cummulative BV</th>


													</tr>
                                                    <tr>
                                                    <th>PBV</th>
                                                    <th>GBV</th>
                                                    <th>TBV</th>
                                                    <th>PBV</th>
                                                    <th>GBV</th>
                                                    <th>TBV</th>


                                                    </tr>
												<tr>
												<?php $i= 1;?>
												<td rowspan="2" class="text-center"><?php echo $i; 
												$self =get_hrm_post($this->session->userdata('userid'));
												?></td>
														<td rowspan="2" class="text-center" style="color:blue;font-weight:bold" ><?php echo $this->session->userdata('userid') ?></td>
														<td rowspan="2" class="text-center" style="font-weight:bold"><?php echo $self[0]->HRM_NAME ?></td>
														<td rowspan="2" class="text-center" style="font-weight:bold">
														<i class="fa fa-eye view_dt" attr-name='<?php echo $self[0]->HRM_NAME; ?>' attr-id='<?php echo $this->session->userdata('userid'); ?>' attr-dob='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'dob'); ?>' attr-address='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'address'); ?>' attr-pincode='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'pin_code'); ?>' attr-pan='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'pancard'); ?>' attr-email='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'email'); ?>' attr-mob='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'contact'); ?>' attr-bank='<?php  echo get_hrm_postmeta($self[0]->HRM_ID,'ac_no'); ?>' attr-bnk_nm='<?php echo get_banks_by_id(get_hrm_postmeta($self[0]->HRM_ID,'bank_id')); ?>' attr-branchname='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'branch_name'); ?>'></i></td>

														<td rowspan="2" class="text-center" style="font-weight:bold">(Own Status)</td>

														<td rowspan="2" class="text-center" style="font-weight:bold"><?php echo count($result); ?></td>
													
														<td rowspan="2" class="text-center" style="font-weight:bold">0</td>
														<?php 
														$pbv = current_month_pbv($this->session->userdata('userid'));
														$gbv = current_month_gbv($this->session->userdata('userid'));
                                                  $total_pbv = cummulative_pbv($this->session->userdata('userid'));
												  $total_gbv = cummulative_gbv($this->session->userdata('userid'));

														?>
                                                </tr>
                                                <tr>
														<td  class="text-center" style="font-weight:bold"><?php echo $pbv; ?></td>
														<td class="text-center" style="font-weight:bold"><?php echo $gbv; ?></td>
														<td  class="text-center" style="font-weight:bold"><?php echo $pbv+$gbv; ?></td>
														<td class="text-center" style="font-weight:bold"><?php echo $total_pbv; ?></td>
														<td class="text-center" style="font-weight:bold"><?php echo $total_gbv; ?></td>
														<td class="text-center" style="font-weight:bold"><?php echo $total_pbv+$total_gbv; ?></td>
												</tr>

                                                
                                              <?php
                                               if(!empty($result)){ 
                                                //    print_r($result);
                                                $i++;
                                                foreach($result as $results){ ?>
                                              <tr>
											
												<td rowspan="2" class="text-center"><?php echo $i; 
												$self =get_hrm_post($results->HRM_ID);
                                                $direct =direct_member_list($results->HRM_ID,3);
												?></td>
														<td rowspan="2" class="text-center" style="color:blue;font-weight:bold" ><?php echo $results->HRM_ID ?></td>
														<td rowspan="2" class="text-center" style="font-weight:bold"><?php echo $self[0]->HRM_NAME ?></td>
														<td rowspan="2" class="text-center" style="font-weight:bold">
														<i class="fa fa-eye view_dt" attr-name='<?php echo $self[0]->HRM_NAME; ?>' attr-id='<?php echo $results->HRM_ID; ?>' attr-dob='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'dob'); ?>' attr-address='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'address'); ?>' attr-pincode='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'pin_code'); ?>' attr-pan='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'pancard'); ?>' attr-email='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'email'); ?>' attr-mob='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'contact'); ?>' attr-bank='<?php  echo get_hrm_postmeta($self[0]->HRM_ID,'ac_no'); ?>' attr-bnk_nm='<?php echo get_banks_by_id(get_hrm_postmeta($self[0]->HRM_ID,'bank_id')); ?>' attr-branchname='<?php echo get_hrm_postmeta($self[0]->HRM_ID,'branch_name'); ?>'></i></td>

														<td rowspan="2" class="text-center" style="font-weight:bold">
                                                        <?php if(!empty($direct) && count($direct)){ ?>

                                                        <i class="fa fa-level-down" style="color:red"></i>
                                                        <?php } ?>
                                                        </td>

														<td rowspan="2" class="text-center" style="font-weight:bold"><?php echo (!empty($direct))?count($direct):0; ?></td>
													
														<td rowspan="2" class="text-center" style="font-weight:bold">0</td>
														<?php 
														$pbv = current_month_pbv($results->HRM_ID);
														$gbv = current_month_gbv($results->HRM_ID);
                                                        $total_pbv = cummulative_pbv($results->HRM_ID);
                                                        $total_gbv = cummulative_gbv($results->HRM_ID);

														?>
                                                         </tr>
                                                <tr>    
													    <td class="text-center" style="font-weight:bold"><?php echo $pbv; ?></td>
														<td class="text-center" style="font-weight:bold"><?php echo $gbv; ?></td>
														<td class="text-center" style="font-weight:bold"><?php echo $pbv+$gbv; ?></td>
														<td  class="text-center" style="font-weight:bold"><?php echo $total_pbv; ?></td>
														<td class="text-center" style="font-weight:bold"><?php echo $total_gbv; ?></td>
														<td class="text-center" style="font-weight:bold"><?php echo $total_pbv+$total_gbv; ?></td>
											</tr>
                                              <?php 
                                              $i++;
                                               }
                                            }
                                                ?>
												</tbody>
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