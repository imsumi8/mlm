<?php

    $query=$this->db->query('Select HRM_ID,HRM_NAME from hrm_post where HRM_STATUS=1 and HRM_ID!=5000');
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
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">
									    Change Credential
									</h1>
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
            										    <?php if($this->session->userdata('hrmtype') == 'admin') { ?>
            											<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#home_6">Change Admin Password</a></li>
            											<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#profile_6" aria-expanded="false">Change User Password</a></li>
            										    <?php }  ?>
            										</ul>
            										  <?php if($this->session->userdata('hrmtype') == 'admin') { ?>
            										   <div class="tab-content" id="myTabContent_6">
            											<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
            											    <form id="admin_update_pass">
            											           <input type="hidden" name="userid" value="<?php echo $this->session->userdata('userid'); ?>">
                											
                												<div class="form-group">
                												    <label>New Password <span class="star">*</span></label>
                												    <input type="password" name="pass" id="password" class="form-control" required>
                												</div>
                												<div class="form-group">
                												    <label>Confirm Password <span class="star">*</span></label>
                												    <input type="password" name="cpass" id="confirm_password" class="form-control" required>
                												</div>
                												<div class="form-group">
                												    <input type="submit" class="btn btn-success admin_update_pass mrg_tp_15" name="admin_update_pass" value="UPDATE ADMIN PASSWORD">
                												</div>
            												</form>
            											</div>
            											<div id="profile_6" class="tab-pane fade" role="tabpanel">
            												<form id="user_update_pass">
            												    
                												<div class="form-group">
                												     <label>User Id <span class="star">*</span></label>
                												    <input type="text" class="form-control" id="tags" name="userid"  placeholder='Enter user id' required>	
                												   	
                												 </div>
                												<div class="form-group">
                												    <label>New Password <span class="star">*</span></label>
                												    <input type="password" name="pass" id="upassword" class="form-control" required>
                												</div>
                												<div class="form-group">
                												    <label>Confirm Password <span class="star">*</span></label>
                												    <input type="password" name="cpass" id="uconfirm_password" class="form-control" required>
                												</div>
                												<div class="form-group">
                												    <input type="submit" class="btn btn-success user_update_pass mrg_tp_15" name="user_update_pass" value="UPDATE USER PASSWORD">
                												</div>
            												</form>
            											</div>
            											<?php } else { ?>
            											<div id="profile_6" class="tab-pane fade active in" role="tabpanel">
            												<form id="user_update_pass">
            												    
                												<div class="form-group">
                												    <input type="hidden" name="userid" value="<?php echo $this->session->userdata('userid'); ?>">
                												   
                												 </div>
                												<div class="form-group">
                												    <label>New Password <span class="star">*</span></label>
                												    <input type="password" name="pass" id="upassword" class="form-control" required>
                												</div>
                												<div class="form-group">
                												    <label>Confirm Password <span class="star">*</span></label>
                												    <input type="password" name="cpass" id="uconfirm_password" class="form-control" required>
                												</div>
                												<div class="form-group">
                												    <input type="submit" class="btn btn-success user_update_pass mrg_tp_15" name="user_update_pass" value="UPDATE USER PASSWORD">
                												</div>
            												</form>
            											</div>
            											<?php } ?>
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