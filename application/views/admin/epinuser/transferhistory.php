<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark"> <i class="fa fa-shopping-basket"></i> TRANSFER HISTORY</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover display custtable  pb-30 datatabel_common" >
												<thead>
													<tr>
														<th>Sr No.</th>
														<th>Transferred To</th>
														<th>Name</th>
														<th>Message</th>
														<th>E-Pin</th>
														<th>Amount</th>
														<th>Transferred Date</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>Sr No.</th>
														<th>Transferred To</th>
														<th>Name</th>
														<th>Message</th>
														<th>E-Pin</th>
														<th>Amount</th>
														<th>Transferred Date</th>
													</tr>
												</tfoot>
												<tbody>
													<?php if(!empty($transferpin)) {
													    $i=1; foreach($transferpin as $epinunuse) { 
													        $arr=get_hrm_post($epinunuse->TRANSFER_TO);
													    ?>
														<tr>
															<td><?php echo $i; ?></td>
															<td><?php echo $epinunuse->TRANSFER_TO; ?></td>
															<td><?php echo $arr[0]->HRM_NAME; ?></td>
															<td><?php echo $epinunuse->DESCRIPTION; ?></td>
															<td><?php echo $epinunuse->EPIN_NO; ?></td>
															<td><?php echo get_epin_amt_by_id($epinunuse->EPIN_AMT_ID); ?></td>
															<td><?php echo $epinunuse->TRANSFERRED_DATE; ?></td>
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