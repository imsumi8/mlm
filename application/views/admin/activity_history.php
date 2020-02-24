
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Activity History</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover display  pb-30 datatabel_common" >
												<thead>
													<tr>
														<th>Sr No.</th>
														<th>Date</th>
														<th>User Id</th>
														<th>Ip Address</th>
														<th>Activity</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>Sr No.</th>
														<th>Date</th>
														<th>User Id</th>
														<th>Ip Address</th>
														<th>Activity</th>
													</tr>
												</tfoot>
												<tbody>
													
														<?php if(!empty(get_all_activity())) { $i=1; $activity=get_all_activity(); foreach($activity as $activities) { ?>
															<tr>
																<td><?php echo $i; ?></td>
																<td><?php echo $activities->TIME; ?></td>
																<td><?php echo $activities->USER_ID; ?></td>
																<td><?php echo $activities->IP_ADDRESS; ?></td>
																<td><?php echo $activities->REMARKS ?></td>
															
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