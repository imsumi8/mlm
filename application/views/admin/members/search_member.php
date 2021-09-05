<?php

    $query=$this->db->query('Select HRM_ID,HRM_NAME from hrm_post where HRM_STATUS=1 and HRM_ID!=5000');
    $result=$query->result();
    $large_arr=array();
    foreach($result as $res){
          $minarray=array();
          $minarray['label']=$res->HRM_ID." ( ".$res->HRM_NAME." [ ".get_hrm_postmeta($res->HRM_ID,'contact')." ] )";
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
<style>
    .profile-image-overlay{
        background-image:url(<?php echo base_url() ?>assets/img/Wood_207.jpg) !important;
        opacity:1 !important;
    }
    .profile-box .profile-info .profile-img-wrap img {
            width: 100%;
      
    }
    .profile-box .profile-info .profile-img-wrap {
   
        width: 180px;
    }
    .profile-box .social-info {
        padding-top: 0px !important;
         border-top: unset !important;
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
							<h1 class="panel-title txt-dark">Search Member</h1>
							<hr class="reddish">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
						    
							<div class="row">
								<form action='<?php echo base_url(); ?>admin/members/member_view' method="post">
									<div class="col-md-4">
										
										<input type="text" class="form-control" id="tags" name="userid"  placeholder="Userid, Name, Mobile No..." required>
									</div>
									<div class="col-md-4">
										<button type="submit" class="btn btn-success" name="searchprofile">Search</button>
									</div>
								</form>
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

				
				
				