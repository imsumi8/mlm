<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Un-Used E-PIN</h1>
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
														<th>User Id</th>
														<th>E-Pin</th>
														<th>Amount</th>
														<th>Date</th>
														<!--<th>Action</th>-->
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>Sr No.</th>
														<th>User Id</th>
														<th>E-Pin</th>
														<th>Amount</th>
														<th>Date</th>
														<!--<th>Action</th>-->
													</tr>
												</tfoot>
												<tbody>
													
														<?php if(!empty($epinunused)) { $i=1; foreach($epinunused as $epinunuse) { 
														    
														$hrmpost=get_hrm_post($epinunuse->ISSUE_TO);
														?>
															<tr>
																<td><?php echo $i; ?></td>
																<td><?php echo $epinunuse->ISSUE_TO." [ ".$hrmpost[0]->HRM_NAME." ]"; ?></td>
																<td><?php echo $epinunuse->EPIN_NO; ?></td>
																<td><?php echo get_epin_amt_by_id($epinunuse->EPIN_AMT_ID); ?></td>
																<td><?php echo date("M jS, Y", strtotime($epinunuse->ISSUED_DATE)); ?></td>
																<!--<td><a href="<?php echo base_url(); ?>admin/epin/deletepinunused/<?php echo $epinunuse->EPIN_ID; ?>" class="btn btn-success" disabled><i class="fa fa-trash"></i></a></td>-->
															</tr>
														<?php $i++; } }else { ?>
															<tr><td colspan="6">No Data Available</td></tr>
														<?php } ?>
													
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