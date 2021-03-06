
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<div class="row">
				    <div class="col-lg-12 col-sm-12 col-md-12">
						<div class="panel card-view">
							<div class="panel-wrapper collapse in">
							    <div class="panel-heading">
    								<div class="text-center">
    									<h1 class="panel-title txt-dark">REQUESTED WITHDRAWL STATUS</h1>
    									<hr class="reddish">
    								</div>
    								<div class="clearfix"></div>
    							</div>
								<div class="panel-body">
									<div  class="pills-struct mrg_tp_25">
										<ul role="tablist" class="nav nav-pills" id="myTabs_6">
										    <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="summary" href="#actreq">Active Withdrawl Requests</a></li>
											<li role="presentation" class=""><a  data-toggle="tab"  role="tab" href="#actpend" aria-expanded="false">Approved - Pending Payment</a></li>
										    <li role="presentation" class=""><a  data-toggle="tab" role="tab" href="#actpaid" aria-expanded="false">Approved - Paid</a></li>
										    <li role="presentation" class=""><a  data-toggle="tab" role="tab" href="#actcancel" aria-expanded="false">Rejected Requests</a></li>
										</ul>
										  
										   <div class="tab-content" id="myTabContent_6">
											<div  id="actreq" class="tab-pane fade active in" role="tabpanel">
											    <table class="table table-bordered table-striped datatabel_common">
											        <thead>
											        <tr>
											            <th>
											               SR NO. 
											            </th>
											            <th>
											               USER ID 
											            </th>
											             <th>
											               Name
											            </th>
											            <th>
											               REQUESTED DATE 
											            </th>
											            <th>
											               AMOUNT
											            </th>

														<th>
														WITHDRAWL CHARGE
											            </th>
											            <!--<th>
											               PREFFERED METHOD
											            </th>-->
											            <th>
											              Net Payable
											            </th>
											            <th>
											               DESCRIPTION
											            </th>
											            <th>
											               TOOLS
											            </th>
											        </tr>
											        </thead>
											         <tbody>
											        <?php if(!empty($activereq)){ $i=1; foreach($activereq as $activereqs) { 
											        $arr=get_hrm_post($activereqs->HRM_ID);
											        ?>
											       
											        <tr>
											            <td><?php echo $i; ?></td>
											            <td><?php echo $activereqs->HRM_ID; ?></td>
											            <td><?php echo trim($arr[0]->HRM_NAME," "); ?></td>
											            <td><?php echo $activereqs->DATE; ?></td>
											            <td><?php echo $activereqs->AMOUNT; ?></td>
											            <!--<td><?php echo $activereqs->PREFFERED_METHOD; ?></td>-->
											            <td><?php echo $activereqs->WITHDRAWL_CHARGE; ?></td>
														<td><?php echo  $activereqs->AMOUNT - $activereqs->WITHDRAWL_CHARGE; ?></td>
											            <td><?php echo $activereqs->DESCRIPTION; ?></td>
											            <th><button type="button" class="btn btn-success approve" attr-id="<?php echo $activereqs->WITHDRAW_ID; ?>">Approve (Pending)</button>&nbsp;&nbsp;<button type="button"  attr-id="<?php echo $activereqs->WITHDRAW_ID; ?>" class="btn btn-danger cancel">Reject</button></th>
											        </tr>
											        <?php $i++; } } ?>
											        </tbody>
											    </table>
											</div>
											<div id="actpend" class="tab-pane fade" role="tabpanel">
												<table class="table table-bordered table-striped datatabel_common">
											        <thead>
											        <tr>
											            <th>
											               SR NO. 
											            </th>
											            <th>
											               USER ID 
											            </th>
											            <th>
											               Name
											            </th>
											            <th>
											               REQUESTED DATE 
											            </th>
											            <th>
											               APPROVED DATE 
											            </th>
											            <th>
											               AMOUNT
											            </th>
											            <!--<th>
											               PREFFERED METHOD
											            </th>
											            <th>
											               WITHDRAWL CHARGE
											            </th>-->
											            <th>
											               DESCRIPTION
											            </th>
											            <th>
											               TOOLS
											            </th>
											        </tr>
											        </thead>
											         <tbody>
											        <?php if(!empty($apppendreq)){ $i=1; foreach($apppendreq as $activereqs) {
											         $arr=get_hrm_post($activereqs->HRM_ID);
											        ?>
											        <tr>
											            <td><?php echo $i; ?></td>
											            <td><?php echo $activereqs->HRM_ID; ?></td>
											            <td><?php echo trim($arr[0]->HRM_NAME," "); ?></td>
											            <td><?php echo $activereqs->DATE; ?></td>
											            <td><?php echo $activereqs->APPROVED_DATE; ?></td>
											            <td><?php echo $activereqs->AMOUNT; ?></td>
											            <!--<td><?php echo $activereqs->PREFFERED_METHOD; ?></td>
											            <td><?php echo $activereqs->WITHDRAWL_CHARGE; ?></td>-->
											            <td><?php echo $activereqs->DESCRIPTION; ?></td>
											             <th><button type="button" class="btn btn-success approvepaid" attr-amt="<?php echo $activereqs->AMOUNT; ?>" attr-userid="<?php echo $activereqs->HRM_ID; ?>" attr-id="<?php echo $activereqs->WITHDRAW_ID; ?>">Approve (Paid)</button></th>
											        </tr>
											        <?php $i++; } } ?>
											         </tbody>
											    </table>
											</div>
											<div id="actpaid" class="tab-pane fade" role="tabpanel">
												<table class="table table-bordered table-striped datatabel_common">
												    <thead>
											        <tr>
											            <th>
											               SR NO. 
											            </th>
											            <th>
											               USER ID 
											            </th>
											             <th>
											               Name
											            </th>
											            <th>
											               REQUESTED DATE 
											            </th>
											            <th>
											               RELEASED DATE 
											            </th>
											            <th>
											               AMOUNT
											            </th>
											            <!--<th>
											               PREFFERED METHOD
											            </th>
											            <th>
											               WITHDRAWL CHARGE
											            </th>-->
											            <th>
											               DESCRIPTION
											            </th>
											        </tr>
											        </thead>
											        <tbody>
											        <?php if(!empty($apppaidreq)){ $i=1; foreach($apppaidreq as $activereqs) { 
											        $arr=get_hrm_post($activereqs->HRM_ID);
											        ?>
											        <tr>
											            <td><?php echo $i; ?></td>
											            <td><?php echo $activereqs->HRM_ID; ?></td>
											            <td><?php echo trim($arr[0]->HRM_NAME," "); ?></td>
											            <td><?php echo $activereqs->DATE; ?></td>
											            <td><?php echo $activereqs->RELEASED_DATE; ?></td>
											            <td><?php echo $activereqs->AMOUNT; ?></td>
											            
											            <!--<td><?php echo $activereqs->PREFFERED_METHOD; ?></td>
											            <td><?php echo $activereqs->WITHDRAWL_CHARGE; ?></td>-->
											            <td><?php echo $activereqs->DESCRIPTION; ?></td>
											        </tr>
											        <?php $i++; } } ?>
											        </tbody>
											    </table>
											</div>
											<div id="actcancel" class="tab-pane fade" role="tabpanel">
												<table class="table table-bordered table-striped datatabel_common">
												    <thead>
											        <tr>
											            <th>
											               SR NO. 
											            </th>
											            <th>
											               USER ID 
											            </th>
											             <th>
											               Name
											            </th>
											            <th>
											               REQUESTED DATE 
											            </th>
											            <th>
											               CANCELLED DATE 
											            </th>
											            <th>
											               AMOUNT
											            </th>
											            <!--<th>
											               PREFFERED METHOD
											            </th>
											            <th>
											               WITHDRAWL CHARGE
											            </th>-->
											            <th>
											               DESCRIPTION
											            </th>
											        </tr>
											         </thead>
											         <tbody>
											        <?php if(!empty($cancelreq)){ $i=1; foreach($cancelreq as $activereqs) { 
											        $arr=get_hrm_post($activereqs->HRM_ID);
											        ?>
											        <tr>
											            <td><?php echo $i; ?></td>
											            <td><?php echo $activereqs->HRM_ID; ?></td>
											             <td><?php echo trim($arr[0]->HRM_NAME," "); ?></td>
											            <td><?php echo $activereqs->DATE; ?></td>
											            <td><?php echo $activereqs->CANCELLED_DATE; ?></td>
											            
											            <td><?php echo $activereqs->AMOUNT; ?></td>
											            <!--<td><?php echo $activereqs->PREFFERED_METHOD; ?></td>
											            <td><?php echo $activereqs->WITHDRAWL_CHARGE; ?></td>-->
											            <td><?php echo $activereqs->DESCRIPTION; ?></td>
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
