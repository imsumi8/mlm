

<!-- Main Content -->
<div class="page-wrapper">
    <div class="container-fluid pt-25">
		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			   <div class="panel panel-default card-view panel-refresh pad_20">
					<div class="panel-heading">
						<div class="text-center">
							<h1 class="panel-title txt-dark">Upload KYC</h1>
							<hr class="reddish">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
						    <div class="row mrg_tp_25">
						        <form id="kycupdate" enctype="multipart/form-data">
                					<div class="col-lg-3 col-xs-4 col-md-4">
                						<div class="form-group">
                						    <label>Select Category <span class="star">*</span></label>
                						    <select name="kyc_category" class="form-control">
                						        <option value=''>Select Category</option>
                						        <?php foreach($kyc_type as $kyc_types){ ?>
                						            <option value="<?php echo $kyc_types->KYC_TYPE_ID; ?>"><?php echo $kyc_types->KYC_NAME ; ?></option>
                						        <?php } ?>
                						    </select>
                						</div>
                					</div>
                					<div class="col-md-4 col-xs-4">
    							        <div class="form-group">
    									    <label>Upload Image <span class="star">*</span></label>
    										<input id="file-upload" type="file" name="fileToUpload" class='form-control' style="display:block !important;"/>
                                           
                                        </div>
    							    </div>
    							    <div class="col-md-4 col-xs-4 mrg_tp_25">
    							        <div class="form-group">
    									    <input type="submit" class="form-control btn btn-primary kycupdate" value="Upload">
                                        </div>
    							    </div>
							    </form>
            				</div>
                			<!-- /Row -->
                			<div class="row mrg_tp_25">
						            <div class="col-lg-12 col-xs-12 col-md-12"><h4>Uploaded Documents</h4></div>
						            <div class="col-md-12">
						                <table class="table table-responsive table-striped table-bordered text-center">
						                    <thead>
						                        <tr>
						                            <th><center>Sr No.</center></th>
						                            <th><center>Document Name</center></th>
						                            <th><center>Status</center></th>
						                            <th><center>Document File</center></th>
						                            <th><center>Tools</center></th>
						                        </tr>
						                    </thead>
						                    <tbody>
						                        <?php if(!empty($document)) { $i=1;
						                            foreach($document as $documents) { 
						                        ?>
						                        <tr>
						                            <td><?php echo $i; ?></td>
						                            <td><?php echo $documents->KYC_NAME; ?></td>
						                            <td><?php $reject=''; if($documents->STATUS==1){ $class='btn-warning';$value='Pending'; } if($documents->STATUS==2){ $class='btn-success';$value='Approved'; }if($documents->STATUS==3){ $class='btn-danger';$value='Rejected';$reject=$documents->REJECTED_MSG; } ?>
						                            <button type="button" class="btn <?php echo $class; ?>"><?php echo $value; ?></button><div><?php echo $reject; ?></div>
						                            </td>
						                            <td><a class="example-image-link" href="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $documents->KYC_IMAGE; ?>" data-lightbox="example-1"><img class="example-image" src="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $documents->KYC_IMAGE;; ?>" alt="image-1" style="max-width:80px;min-width:80px;width:100%;" /></a></td>
						                            
						                            <td><?php if($documents->STATUS==2){ echo 'N/A';  } else { ?><a href="<?php echo base_url(); ?>admin/members/delete_kyc/<?php echo $documents->KYC_ID; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a><?php } ?></td>
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

				
				
				