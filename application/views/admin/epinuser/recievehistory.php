<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark"> <i class="fa fa-shopping-basket"></i> Recieve history</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover display custtable pb-30 datatabel_common" >
												<thead>
													<tr>
														<th>Sr No.</th>
														<th>Given By</th>
														<th>E-Pin</th>
														<th>Amount</th>
														<th>Date</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>Sr No.</th>
														<th>Given By</th>
														<th>E-Pin</th>
														<th>Amount</th>
														<th>Date</th>
													</tr>
												</tfoot>
												<tbody>
													<?php if(!empty($receivepin)) { $i=1; foreach($receivepin as $epinunuse) { ?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php if($epinunuse->TRANSFER_STATUS==0) { if($epinunuse->SELF_CREATED==0) { echo 'Admin'; } else { echo 'Self'; } }  else { echo get_hrm_postmeta($epinunuse->HRM_ID,'first_name')." ".get_hrm_postmeta($epinunuse->HRM_ID,'last_name')." [".$epinunuse->HRM_ID."]"; } ?></td>
															<td><?php echo $epinunuse->EPIN_NO; ?></td>
															<td><?php echo get_epin_amt_by_id($epinunuse->EPIN_AMT_ID); ?></td>
															<td><?php if($epinunuse->TRANSFER_STATUS==0) { echo $epinunuse->ISSUED_DATE; } else { echo $epinunuse->TRANSFERRED_DATE; } ?></td>
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
						<p>2018 &copy; BRIGHT DEAL. All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->