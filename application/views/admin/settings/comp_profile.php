
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Company Profile</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<!-- Row -->
            				<div class="row">
            					<div class="col-lg-12 col-sm-12 col-md-12">
            						<div class="panel card-view">
            							<div class="panel-wrapper collapse in">
            								<div class="panel-body">
            									<div  class="pills-struct">
            										<ul role="tablist" class="nav nav-pills" id="myTabs_6">
            											<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#home_6">Site Information</a></li>
            											<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#profile_6" aria-expanded="false">Social Profile</a></li>
            										</ul>
            										<div class="tab-content" id="myTabContent_6">
            											<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
            											    <form id="submit_comp_profile" enctype="multipart/form-data">
                												<div class="form-group">
                												    <label>Company Name <span class="star">*</span></label>
                												    <input type="text" name="comp_name" class="form-control" value='<?php echo get_option('comp_name'); ?>' required>
                												</div>
                												<div class="form-group">
                												    <label>Email <span class="star">*</span></label>
                												    <input type="email" name="comp_email" class="form-control" value='<?php echo get_option('comp_email'); ?>' required>
                												</div>
                												<div class="form-group">
                												    <label>Phone <span class="star">*</span></label>
                												    <input type="text" name="comp_phone" class="form-control input_num" value='<?php echo get_option('comp_phone'); ?>' required>
                												</div>
                												<div class="form-group">
                												    <label>Company Address <span class="star">*</span></label>
                												    <textarea name="comp_addr" class="form-control" required><?php echo get_option('comp_addr'); ?></textarea>
                												</div>
                												<div class="form-group">
                												    <div class="col-md-12 no_pad"><label>Logo <span class="star">*</span></label></div>
                    												 <div class="col-md-12 no_pad">
                                                                        <img id="blah" src="<?php echo base_url() ?>assets/uploads_assets/<?php echo get_option('logo'); ?>" alt="your image" class="logoinput" />
                                                                    </div>
                    												<div class="col-md-12 no_pad mrg_tp_15">
                    												    <label for="file-upload" class="custom-file-upload btn btn-primary">
                                                                            <i class="fa fa-cloud-upload"></i> Custom Upload
                                                                        </label>
                                                                        <input id="file-upload" type="file" name="fileToUpload" class='imgInp'/>
                                                                    </div>
                                                                </div>
                												<div class="form-group">
                												    <input type="submit" class="btn btn-success update_prof_comp mrg_tp_15" name="update_prof_comp" value="UPDATE">
                												</div>
            												</form>
            											</div>
            											<div  id="profile_6" class="tab-pane fade" role="tabpanel">
            												<form id="submit_soc_profile">
                												<div class="form-group">
                												    <label>Facebook Url </label>
                												    <input type="text" name="facebook_url" class="form-control" value='<?php echo get_option('facebook_url'); ?>' placeholder='Eg:https://www.facebook.com/example'>
                												</div>
                												<div class="form-group">
                												    <label>Twitter Url </label>
                												    <input type="text" name="twitter_url" class="form-control" value='<?php echo get_option('twitter_url'); ?>' placeholder="Eg:https://www.twitter.com/example">
                												</div>
                												<div class="form-group">
                												    <label>Instagaram Url</label>
                												    <input type="text" name="insta_url" class="form-control" value='<?php echo get_option('insta_url'); ?>' placeholder="Eg:https://www.instagram.com/example">
                												</div>
                												<div class="form-group">
                												    <label>Google Plus</label>
                												    <input type="text" name="google_plus" class="form-control" value='<?php echo get_option('google_plus'); ?>' placeholder="Eg:https://plus.google.com/example">
                												</div>
                												<div class="form-group">
                												    <input type="submit" class="btn btn-success update_soc_comp mrg_tp_15" name="update_soc_comp" value="UPDATE">
                												</div>
            												</form>
            											</div>
            										</div>
            									</div>
            								</div>
            							</div>
            						</div>
            					</div>
            				</div>
            				<!-- /Row -->
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