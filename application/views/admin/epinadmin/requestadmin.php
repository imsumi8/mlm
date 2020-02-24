
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Requested E-PIN Data</h1>
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
														<th>User Name</th>
														<th>Message</th>
														<th>Quantity</th>
														<th>Amount</th>
														<th>Image</th>
														<th>Phone</th>
														<th>Date</th>
														
														<th>Action</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>Sr No.</th>
														<th>User Id</th>
														<th>User Name</th>
														<th>Message</th>
														<th>Quantity</th>
														<th>Amount</th>
														<th>Image</th>
														<th>Phone</th>
														<th>Date</th>
														
														<th>Action</th>
													</tr>
												</tfoot>
												<tbody>
													
														<?php if(!empty($epinreq)) { $i=1; foreach($epinreq as $epinreqs) { ?>
															<tr>
															<td><?php echo $i; ?></td>
															<td><?php if($epinreqs->HRM_ID!='0'){ echo $epinreqs->HRM_ID; } else { echo '-'; } ?></td>
															<td><?php echo get_hrm_postmeta($epinreqs->HRM_ID,'first_name')." ".get_hrm_postmeta($epinreqs->HRM_ID,'last_name'); ?></td>
															<td><?php echo $epinreqs->MESSAGE; ?></td>
															<td><?php echo $epinreqs->QUANTITY; ?></td>
															<td><?php echo get_epin_amt_by_id($epinreqs->EPINTYPE); ?></td>
															<td><?php  if($epinreqs->RELATED_IMAGE!='') { ?><a class="example-image-link" href="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $epinreqs->RELATED_IMAGE; ?>" data-lightbox="example-1"><img class="example-image" src="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $epinreqs->RELATED_IMAGE; ?>" alt="image-1" style="max-width:80px;min-width:80px;width:100%;" /></a><?php } else { echo '-'; } ?></td>
															<td><?php if(get_hrm_postmeta($epinreqs->HRM_ID,'contact')!=''){ echo get_hrm_postmeta($epinreqs->HRM_ID,'contact'); } else { echo $epinreqs->MOBILE_NO; } ?></td>
															<td><?php echo $epinreqs->REQUESTED_TIME; ?></td>
															<td><a href="<?php echo base_url(); ?>admin/epin/deletereq/<?php echo $epinreqs->EPIN_REQ_ID; ?>" class="btn btn-success"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>admin/epin/generate/<?php echo $epinreqs->HRM_ID; ?>/<?php echo $epinreqs->FRANCHISEE_ID; ?>/<?php echo $epinreqs->EPIN_REQ_ID; ?>/<?php echo $epinreqs->QUANTITY; ?>/<?php echo $epinreqs->EPINTYPE; ?>" class="btn btn-primary"><i class="fa fa-share-alt"></i></a></td>
															</tr>
														<?php $i++; } } ?>
													</tr>
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lightbox/css/lightbox.min.css">
<script src="<?php echo base_url(); ?>assets/lightbox/js/lightbox.min.js"></script>