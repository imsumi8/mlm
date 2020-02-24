<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
                
				<div class="row">
				    
					<div class="col-lg-12 col-sm-12 col-md-12">
					     
						<div class="panel card-view">
						    <div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Requested E-PIN Data</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div  class="pills-struct">
										<ul role="tablist" class="nav nav-pills" id="myTabs_6">
											<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#home_6">Request Custom Epin</a></li>
											<!--<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#profile_6" aria-expanded="false">Request Franchisee Epin</a></li>-->
										</ul>
										<div class="tab-content" id="myTabContent_6">
											<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
											    <form id="reqpin" enctype="multipart/form-data">
                    								<div class="sections">
                    									<div class="row"><div class="col-md-12"><div class="errors alert alert-warning"></div></div></div>
                    									<div class="row">
                    									    <div class="col-md-12">
                    											<div class="form-group">
                    												<div><label>E-PIN TYPE <span class="star">*</span></label>
                    												    <select name="amtid" class="form-control">
                        													<?php foreach($epimamts as $epimamt) { ?>
                        														<option value="<?php echo $epimamt->EPIN_AMT_ID;?>"><?php echo $epimamt->EPIN_AMT;?></option>
                        													<?php } ?>
                        												</select>
                    												</div>
                    											</div>
                    										</div>
                    										<div class="col-md-12">
                    											<div class="form-group">
                    												<div><label>Quantity <span class="star">*</span></label>
                    												    <input type="text" name="quant" class="form-control input_num" value="">
                    												</div>
                    											</div>
                    										</div>
                    										<div class="col-md-12">
                    											<div class="form-group">
                    												<div><label>Write E-PIN Request <span class="star">*</span></label>
                    												<textarea name="reqmsg" rows='7' placeholder="Write your E-PIN request to Admin. You can include any Bank Transaction detail also" class="form-control" required></textarea>
                    												</div>
                    											</div>
                    										</div>
                    										<div class="col-md-12">
                                                                <img id="blah" src="" alt="Your Receipt Image" class="logoinput" />
                                                            </div>
                    										<div class="col-md-12 mrg_tp_15">
                                							    <label for="file-upload" class="custom-file-upload btn btn-primary">
                                                                    <i class="fa fa-cloud-upload"></i> Receipt Image Upload 
                                                                </label>
                                                                <input id="file-upload" type="file" name="fileToUpload" class='imgInp'/>
                                                            </div>
                    									</div>
                    									<div class="row mrg_tp_15">
                    										<div class="col-md-12">
                    											<input type="submit" class="btn btn-success submitreqpin" value="SUBMIT">
                    										</div>
                    									</div>
                    									
                    								</div>
                    							</form>
											</div>
											<!--<div  id="profile_6" class="tab-pane fade" role="tabpanel">
												<form id="epinrequest_franchisee" enctype="multipart/form-data">
                    								<div class="sections">
                    									<div class="row"><div class="col-md-12"><div class="errors alert alert-warning"></div></div></div>
                    									<div class="row">
                    										<div class="col-md-12">
                    											<div class="form-group">
                    												<div><label>Franchisee Epin <span class="star">*</span></label></div>
                    												<select name="frenchisee_epin" class="form-control fran_type" required>
                    												    <option value="" attr-cost="0" attr-dis="0">--Select Type--</option>
                    													<?php $epimamts=get_franchisee_income(); foreach($epimamts as $epimamt) { ?>
                    														<option value="<?php echo $epimamt->NO_EPIN; ?>" attr-cost="<?php echo $epimamt->COST; ?>" attr-dis="<?php echo $epimamt->DISCOUNT; ?>"><?php echo $epimamt->FRANCHISEE_NAME." [ ".$epimamt->NO_EPIN. " ] "; ?></option>
                    													<?php } ?>
                    												</select>
                    											</div>
                    										</div>
                    										<div class="col-md-12">
                    											<div class="form-group">
                    												<div><label>AMOUNT</label></div>
                    												<input type="text" name="amt" class="form-control amt_fran input_num" value="0" readonly> 
                    											</div>
                    										</div>
                    										<div class="col-md-12">
                    											<div class="form-group">
                    												<div><label>Discount</label></div>
                    												<input type="text" name="frandis" class="form-control dis_fran input_num" value="0" readonly> 
                    											</div>
                    										</div>
                    									</div>
                    									<div class="row">
                    										<div class="col-md-12">
                    											<div class="form-group">
                    												<div><label>Write E-PIN Request <span class="star">*</span></label>
                    												<textarea name="reqmsg" rows='7' placeholder="Write your E-PIN request to Admin. You can include any Bank Transaction detail also" class="form-control" required></textarea>
                    												</div>
                    											</div>
                    										</div>
                    										<div class="col-md-12">
                                                                <img id="imagesrc" src="" alt="Your Receipt Image" class="logoinput" />
                                                            </div>
                    										<div class="col-md-12 mrg_tp_15">
                                							    <input type="file" name="fileToUpload" class='imginput' style="display:block !important;"/>
                                                            </div>
                    									</div>
                    									<div class="row mrg_tp_15">
                    										<div class="col-md-12">
                    											<input type="submit" class="btn btn-success requestepin_franchisee" value="SUBMIT">
                    										</div>
                    									</div>
                    								</div>
                    							</form>
											</div>-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Row -->
				
				
				
				
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