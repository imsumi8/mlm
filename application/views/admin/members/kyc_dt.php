
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<div class="row">
				    <div class="col-lg-12 col-sm-12 col-md-12">
						<div class="panel card-view">
							<div class="panel-wrapper collapse in">
							    <div class="panel-heading">
    								<div class="text-center">
    									<h1 class="panel-title txt-dark">KYC DETAILS</h1>
    									<hr class="reddish">
    								</div>
    								<div class="clearfix"></div>
    							</div>
								<div class="panel-body">
									<div  class="pills-struct mrg_tp_25">
										<ul role="tablist" class="nav nav-pills" id="myTabs_6">
										    <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="summary" href="#actreq">Pending KYC Details </a></li>
											<li role="presentation" class=""><a  data-toggle="tab"  role="tab" href="#actpend" aria-expanded="false">Approved KYC Details</a></li>
										    <li role="presentation" class=""><a  data-toggle="tab" role="tab" href="#actcancel" aria-expanded="false">Rejected KYC Details</a></li>
										</ul>
										  <div class="tab-content" id="myTabContent_6">
											<div  id="actreq" class="tab-pane fade active in" role="tabpanel">
											    <table class="table table-bordered table-striped datatabel_common text-center">
											        <thead>
											        <tr>
											            <th class="text-center">
											               SR NO. 
											            </th>
											            <th class="text-center">
											               USER ID 
											            </th>
											            <th class="text-center">
											               NAME
											            </th>
											            <th class="text-center">
											               REQUESTED DATE 
											            </th>
											            <th class="text-center">
											               DOCUMENT NAME
											            </th>
											             <th class="text-center">
											               DOCUMENT FILE
											            </th>
											            <th class="text-center">
											               TOOLS
											            </th>
											        </tr>
											        </thead>
											         <tbody>
											        <?php 
											            $document= get_kyc_dt(1);
											            if(!empty($document)) { $i=1;
        						                            foreach($document as $documents) { 
        						                        ?>
        						                        <tr>
        						                            <td><?php echo $i; ?></td>
        						                            <td><?php echo $documents->HRM_ID; ?></td>
        						                            <td><?php echo get_hrm_postmeta($documents->HRM_ID,'first_name')." ".get_hrm_postmeta($documents->HRM_ID,'last_name'); ?></td>
        						                            <td><?php echo $documents->DATETIME; ?></td>
        						                            <td><?php echo $documents->KYC_NAME; ?></td>
        						                            <td><a class="example-image-link" href="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $documents->KYC_IMAGE; ?>" data-lightbox="example-1"><img class="example-image" src="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $documents->KYC_IMAGE;; ?>" alt="image-1" style="max-width:60px;min-width:60px;width:100%;" /></a></td>
        						                            <td><button type="button" class="btn btn-success approve_kyc" attr-id="<?php echo $documents->KYC_ID; ?>">Approve</button>&nbsp;&nbsp;<button type="button" class="btn btn-warning cancel_kyc" attr-id="<?php echo $documents->KYC_ID; ?>">REJECT</button></td>
        						                        </tr>
        						                        <?php $i++; } } ?>
											        </tbody>
											    </table>
											</div>
											<div id="actpend" class="tab-pane fade" role="tabpanel">
												<table class="table table-bordered table-striped datatabel_common text-center">
											        <thead>
											        <tr>
											            <th class="text-center">
											               SR NO. 
											            </th>
											            <th class="text-center">
											               USER ID 
											            </th>
											            <th class="text-center">
											               NAME
											            </th>
											            <th class="text-center">
											               REQUESTED DATE 
											            </th>
											            
											            <th class="text-center">
											               APPROVED DATE 
											            </th>
											            <th class="text-center">
											               DOCUMENT NAME
											            </th>
											             <th class="text-center">
											               DOCUMENT FILE
											            </th>
											            
											        </tr>
											        </thead>
											         <tbody>
											        <?php 
											            $document= get_kyc_dt(2);
											            if(!empty($document)) { $i=1;
        						                            foreach($document as $documents) { 
        						                        ?>
        						                        <tr>
        						                            <td><?php echo $i; ?></td>
        						                            <td><?php echo $documents->HRM_ID; ?></td>
        						                            <td><?php echo get_hrm_postmeta($documents->HRM_ID,'first_name')." ".get_hrm_postmeta($documents->HRM_ID,'last_name'); ?></td>
        						                            <td><?php echo $documents->DATETIME; ?></td>
        						                            <td><?php echo $documents->APPROVED_DATE; ?></td>
        						                            <td><?php echo $documents->KYC_NAME; ?></td>
        						                            <td><a class="example-image-link" href="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $documents->KYC_IMAGE; ?>" data-lightbox="example-1"><img class="example-image" src="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $documents->KYC_IMAGE;; ?>" alt="image-1" style="max-width:60px;min-width:60px;width:100%;" /></a></td>
        						                            
        						                        </tr>
        						                        <?php $i++; } } ?>
											        </tbody>
											    </table>
											</div>
											
											<div id="actcancel" class="tab-pane fade" role="tabpanel">
												<table class="table table-bordered table-striped datatabel_common text-center">
												    <thead>
											        <tr>
											            <th class="text-center">
											               SR NO. 
											            </th>
											            <th class="text-center">
											               USER ID 
											            </th>
											            <th class="text-center">
											               NAME
											            </th>
											            <th class="text-center">
											               REQUESTED DATE 
											            </th>
											            <th class="text-center">
											               CANCELLED DATE 
											            </th>
											            <th class="text-center">
											               DOCUMENT NAME
											            </th>
											             <th class="text-center">
											               DOCUMENT FILE
											            </th>
											            <th class="text-center">
											               REJECTED MESSAGE
											            </th>
											            
											        </tr>
											         </thead>
											         <tbody>
											        <?php 
											            $document= get_kyc_dt(3);
											            if(!empty($document)) { $i=1;
        						                            foreach($document as $documents) { 
        						                        ?>
        						                        <tr>
        						                            <td><?php echo $i; ?></td>
        						                            <td><?php echo $documents->HRM_ID; ?></td>
        						                            <td><?php echo get_hrm_postmeta($documents->HRM_ID,'first_name')." ".get_hrm_postmeta($documents->HRM_ID,'last_name'); ?></td>
        						                            <td><?php echo $documents->DATETIME; ?></td>
        						                            <td><?php echo $documents->REJECTED_DATE; ?></td>
        						                            <td><?php echo $documents->KYC_NAME; ?></td>
        						                            <td><a class="example-image-link" href="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $documents->KYC_IMAGE; ?>" data-lightbox="example-1"><img class="example-image" src="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $documents->KYC_IMAGE;; ?>" alt="image-1" style="max-width:60px;min-width:60px;width:100%;" /></a></td>
        						                            <td><?php echo $documents->REJECTED_MSG; ?></td>
        						                            
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
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lightbox/css/lightbox.min.css">
            <script src="<?php echo base_url(); ?>assets/lightbox/js/lightbox.min.js"></script>	
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
  <div class="modal fade" id="reason_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
         <form id="reject_kyc">
            <div class="modal-header pay_modal_header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Reject KYC</h4>
            </div>
            <div class="modal-body">
                <div class="row mrg_tp_15">
                    <div class="col-md-12">
                        <label>Reason For Reject Request <span class="star"></span></label>
                        <input type="hidden" name="kyc_id" class="kyc_id" value="">
                        <textarea name="reason" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
               <input type="submit" class="btn btn-primary reject_kyc" value="REJECT KYC">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>