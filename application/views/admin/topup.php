<?php

    $query=$this->db->query('Select HRM_ID,HRM_NAME from hrm_post where PAY_STATUS=0 and HRM_ID!=5000');
    $result=$query->result();
    $large_arr=array();
    foreach($result as $res){
          $minarray=array();
          $minarray['label']=$res->HRM_ID." [ ".$res->HRM_NAME." ]";
          $minarray['value']=$res->HRM_ID;
          array_push($large_arr,$minarray);
    }
   

?>
<script>
    $( function() {
    
    var availableTags = <?php echo json_encode($large_arr); ?>;
    $( "#tags" ).autocomplete({
      source: availableTags
    });
    
	
    
  } );
</script>
<script>
		</script>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">TOPUP</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<form id="topup" action=''>
							    <div class="row">
							        <div class="col-md-offset-2 col-md-8">
        							    <div class="sections">
        									<div class="row">
        										<div class="col-md-6 col-xs-6">
        											<div class="head">TOPUP DETAILS</div>
        										</div>
        										<div class="col-md-6 col-xs-6 text-right">
        											<i class="fa btn btn-primary slides_class fa-minus"></i>
        										</div>
        									</div>
        									<div class="inner_sec_slide">
            									<div class="row">
            										<div class="col-md-12">
            											<div class="form-group">
            												<div><label>User Id <span class="star">*</span></label></div>
            												<input type="text" name="userid" id="tags" class="form-control get_name" required> 
            											</div>
            										</div>
            										<div class="col-md-12">
            											<div class="form-group">
            												<div><label>Sponsorid</label></div>
            												<input type="text" name="sponserid" class="form-control get_sponsor" value="" readonly> 
            											</div>
            										</div>
            										<div class="col-md-12">
            											<div class="form-group">
            												<div><label>Epin <span class="star">*</span></label></div>
            												<input type="text" name="epinno" class="form-control" required> 
            											</div>
            										</div>
            									</div>
            									<div class="row">
            										<div class="col-md-12">
            											<div class="form-group">
            												<div><label>Package <span class="star">*</span></label></div>
            												<select name="pack" class="form-control">
            													<?php foreach($packs as $pack) { ?>
            													    <option value="<?php echo $pack->PACKAGE_ID;?>"><?php echo $pack->PACKAGE_NAME." [ ".$pack->PACKAGE_PRICE." ]";?></option>
            													<?php } ?>
            												</select>
            											</div>
            										</div>
            										<div class="col-md-12 text-center">
            											<input type="submit" class="btn btn-success topup sections" value="SUBMIT">
            										</div>
                								</div>
            								</div>
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

        <!-- /Main Content -->