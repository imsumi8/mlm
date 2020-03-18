<style>
    .time{
            padding: 10px;
            color: #fff;
            font-size: 21px;
    }
    .plusicon {
        background-color: #45ade6;
        color: #fff;
        padding: 20px;
        font-size: 30px;
        margin-top: 30px;
        margin-bottom:12px;
    }
    .profile-image-overlay {
        background-image: url(http://kbc20.com/developer/assets/img/Wood_207.jpg) !important;
        opacity: 1 !important;
    }
    .pad_10{
        padding:10px;
    }
    .pd_bth_10{
        padding-top:15px;
        padding-bottom:15px;
    }
    .pa-0{
        padding:6px !important;
        border-radius: 20px;
    }
    .sm-data-box {
        box-shadow: 0px 0px 8px 0px #f18d8d;
    }
    .bx_copy{
         box-shadow: 0px 0px 12px 0px #f18d8d;
    }
    .profile-box img{
        max-width: 100px;
    }
</style>

<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
                
				<!-- Row -->
				  <?php 
				  //$ar=get_member_three($this->session->userdata('userid')); 
				    //$ar=json_decode($ar);
				    $userid=$this->session->userdata('userid');
				  ?>
				<!-- <div class="row">
				    <div class="col-md-6 col-xs-12">
				        <div class="panel panel-default card-view pa-0">
				            <div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
								    <div class="sm-data-box bg-yellow time text-center">
				                        <div class="row">
				                            <div class="col-md-6">
				                                LEFT (<?php echo $ar[0]; ?>)
				                            </div>
				                            <div class="col-md-6">
				                                RIGHT (<?php echo $ar[1]; ?>)
				                            </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
					
					<div class="col-md-6 col-xs-12">
				        <div class="panel panel-default card-view pa-0">
				            <div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
								    <div class="sm-data-box bg-red time text-center">
				                        <span id='ct'></span>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div> -->
				<!-- Row -->
				<!-- /Row -->
				<div class="row">
				    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box actived">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
													<span class="weight-500 uppercase-font txt-light block font-13"> TOTAL DOWNLINE</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo allposts_count_by_user(3,$userid); ?></span></span>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
													<span class="weight-500 uppercase-font txt-light block font-13"> DIRECT DOWNLINE</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo get_own_count_nodes($userid,1,3); ?></span></span>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box actived">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
												    <span class="weight-500 uppercase-font txt-light block font-13"> Team Business</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $team_business_target=totaldown($userid,3); ?></span></span>
												</div>
											
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
													<span class="weight-500 uppercase-font txt-light block font-13">Self Business</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php $own_business_target=direct_member_list($userid,3); $arr=array(); if(!empty($own_business_target)) { foreach($own_business_target as $own){ $arr[]=$own->HRM_ID; } echo get_amount($arr); } else {echo '0'; } ?></span></span>
												</div>
												
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<!-- Row -->
				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
												    <span class="weight-500 uppercase-font txt-light block font-13"> DIRECT REFFERAL INCOME</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php  echo $direct=get_sum_wallet_balance_type($userid,1); ?></span></span>
													
												</div>
											
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-1 text-center col-md-1 col-sm-1 col-xs-12">
					    <i class="fa fa-plus plusicon"></i>
					 </div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-yellow">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
													<span class="weight-500 uppercase-font txt-light block font-13"> DIRECT REFERRAL BONUS INCOME</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $silver=get_sum_wallet_balance_type($userid,2); ?></span></span>
												</div>
											
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-1 text-center col-md-1 col-sm-1 col-xs-12">
					    <i class="fa fa-plus plusicon"></i>
					 </div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-green">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
												    <span class="weight-500 uppercase-font txt-light block font-13"> AUTO POOL INCOME</span>
												    <span class="txt-light block counter"><span class="counter-anim"><?php echo $gold=get_sum_wallet_balance_type($userid,'5,6,7,8,9'); ?></span></span>
												</div>
											
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				    <div class="col-lg-1 text-center col-md-1 col-sm-1 col-xs-12">
					    <i class="fa fa-align-justify plusicon"></i>
					 </div>
				</div>
				<!-- /Row -->
				<!-- Row -->
				<div class="row">
					
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box actived">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
													<span class="weight-500 uppercase-font txt-light block font-13"> TOTAL INCOME</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $direct+$silver+$gold; ?></span></span>
												</div>
											
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box actived">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
													<span class="weight-500 uppercase-font txt-light block font-13"> Wallet (INCOME RS)</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php $arr=get_hrm_post($userid); if($arr[0]->HRM_STATUS=='1') { echo get_wallet_balance($userid); } else { echo '0'; } ?></span></span>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
													<span class="weight-500 uppercase-font txt-light block font-13">WITHDRAWL (INCOME RS)</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo get_sum_withdrawl_amt('2017-01-01',date('Y-m-d'),$userid); ?></span></span>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $arr=get_hrm_post($this->session->userdata('userid'));?>
				  <?php $user_id=$this->session->userdata('userid'); ?>
				<div class="row">
				    <div class="col-lg-6 col-xs-12">
						<div class="panel panel-default card-view  pa-0" style="margin-left:0px;">
							<div class="panel-wrapper collapse in">
								<div class="panel-body  pa-0">
									<div class="profile-box">
										<div class="profile-info text-center pad_10">
											<div class="">
												<img class="inline-block mb-10" src="<?php echo base_url() ?>assets/uploads_assets/<?php echo get_hrm_postmeta($user_id,'img'); ?>" alt="user"/>
											</div>
											<h4>MEMBER DETAIL</h4>
											<table class="table table-striped table-bordered">
											    <tr>
											        <td>USER ID</td>
											        <td><?php echo $user_id; ?></td>
											    </tr>
											    <tr>
											        <td>USER NAME</td>
											        <td><?php echo get_hrm_postmeta($user_id,'first_name')." ".get_hrm_postmeta($user_id,'last_name'); ?></td>
											    </tr>
											    <tr>
											        <td>MOBILE NO</td>
											        <td><?php echo get_hrm_postmeta($user_id,'contact'); ?></td>
											    </tr>
											    <tr>
											        <td>WHATSAP NO</td>
											        <td><?php echo get_hrm_postmeta($user_id,'whatsap_contact'); ?></td>
											    </tr>
											     <tr>
											        <td>MAIL ID</td>
											        <td><?php echo get_hrm_postmeta($user_id,'email'); ?></td>
											    </tr>
											    <tr>
											        <td>PAN NO</td>
											        <td><?php echo get_hrm_postmeta($user_id,'pancard'); ?></td>
											    </tr>
											    <tr>
											        <td>AADHAR NO</td>
											        <td><?php echo get_hrm_postmeta($user_id,'aadhar'); ?></td>
											    </tr>
											    <?php $hrm_post=get_hrm_post($user_id); ?>
											    <tr>
											        <td>DATE OF JOINING</td>
											       <td><?php echo $today = date("F j, Y, g:i a",strtotime( $hrm_post[0]->HRM_DATE)); ?></td>
											    </tr>
											    
											</table>
										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php  $arr=get_hrm_post($this->session->userdata('userid')); if($arr[0]->PAY_STATUS=='1') { $user_id=get_added_by($this->session->userdata('userid')); } else { $user_id=get_hrm_postmeta($user_id,'sponsorid');
						//get_added_by_free($this->session->userdata('userid'));
						 } ?>
					<div class="col-lg-6 col-xs-12">
						<div class="panel panel-default card-view  pa-0" style="margin-left:0px;">
							<div class="panel-wrapper collapse in">
								<div class="panel-body  pa-0">
									<div class="profile-box">
										<div class="profile-info text-center pad_10">
											<div class="">
												<img class="inline-block mb-10" src="<?php echo base_url() ?>assets/uploads_assets/<?php echo get_hrm_postmeta($user_id,'img'); ?>" alt="user"/>
											</div>	
											<h4>SPONSOR DETAIL</h4>
											<table class="table table-striped table-bordered">
											    <tr>
											        <td>USER ID</td>
											        <td><?php echo $user_id; ?></td>
											    </tr>
											    <tr>
											        <td>USER NAME</td>
											        <td><?php echo get_hrm_postmeta($user_id,'first_name')." ".get_hrm_postmeta($user_id,'last_name'); ?></td>
											    </tr>
											    <tr>
											        <td>MOBILE NO</td>
											        <td><?php echo get_hrm_postmeta($user_id,'contact'); ?></td>
											    </tr>
											    <tr>
											        <td>WHATSAP NO</td>
											        <td><?php echo get_hrm_postmeta($user_id,'whatsap_contact'); ?></td>
											    </tr>
											     <tr>
											        <td>MAIL ID</td>
											        <td><?php echo get_hrm_postmeta($user_id,'email'); ?></td>
											    </tr>
											    <tr>
											        <td>PAN NO</td>
											        <td><?php echo get_hrm_postmeta($user_id,'pancard'); ?></td>
											    </tr>
											    <tr>
											        <td>AADHAR NO</td>
											        <td><?php echo get_hrm_postmeta($user_id,'aadhar'); ?></td>
											    </tr>
											    <?php $hrm_post=get_hrm_post($user_id); ?>
											    <tr>
											        <td>DATE OF JOINING</td>
											        <td><?php echo $today = date("F j, Y, g:i a",strtotime( $hrm_post[0]->HRM_DATE)); ?></td>
											    </tr>
											   
											</table>
										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
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