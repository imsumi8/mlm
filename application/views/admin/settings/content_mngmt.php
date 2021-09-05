
<script>
    $( function() {
        tinymce.init({ 
            selector:'textarea',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            }
        });
  } );
</script>
<style>
    .mce-notification-inner,.mce-close,.mce-notification-warning,.mce-branding{
        display:none;
    }
</style>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Content Management</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<form id="wlcmfrm" action=''>
								<div class="sections">
									<div class="row"><div class="col-md-12"><div class="errors alert alert-warning"></div></div></div>
									<div class="row">
										<div class="col-md-12">
											<div class="head">Welcome Letter</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											    <textarea type="text" rows="15" id="txtDefaultHtmlArea"  name="wlcmtext" title="Main Matter" tabindex="4" class="ckeditor form-control"><?php echo get_hrm_postmeta(5000,'wlcm_letter'); ?></textarea>
											</div>
										</div>
									    <div class="col-md-12">
									        <input type="submit" class="btn btn-success wlcmclass" value="Save">
									    </div>
									</div>
								
								</div>
								
							</form>
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
	