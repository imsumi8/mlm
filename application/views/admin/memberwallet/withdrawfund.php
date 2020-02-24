<style>
    .pa-0{
        padding:6px !important;
        border-radius: 20px;
    }
    .sm-data-box {
        box-shadow: 0px 0px 8px 0px #f18d8d;
    }
</style>

<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				<div class="row">
				    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box actived">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
												    <i class="weight-500 uppercase-font txt-light block">Net Wallet Balance</i>
													<span class="txt-light block counter"><span class="counter-anim"><?php $arr=get_hrm_post($this->session->userdata('userid')); if($arr[0]->HRM_STATUS=='1') { echo get_wallet_balance($this->session->userdata('userid')); } else { echo '0'; } ?></span></span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="txt-light fa fa-suitcase fnt_50"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-yellow">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
												    <span class="weight-500 uppercase-font txt-light block">Net Withdrawl Income</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo get_sum_withdrawl_amt('2017-01-01',date('Y-m-d'),$this->session->userdata('userid')); ?></span></span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="txt-light fa fa-inr fnt_50"></i>
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
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Create Withdrawl Request</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								    <div class="row">
								        <form id='sendwithdrawreq' method="post">
								            <input type="hidden" name="userid" value="<?php echo $this->session->userdata('userid'); ?>">
								            <div class="col-md-12">
								                <label>Amount To Be Withdraw : <span class="star"></span></label>
										        <input type="text" class="form-control input_num withdrawamtvalid" attr-amt="<?php echo liable_amount_to_pay($this->session->userdata('userid')); ?>" name="amt" placeholder='Enter Amount' required>
										        <div style="color:red;margin-top:3px;">Max amount to be requested : <?php echo liable_amount_to_pay($this->session->userdata('userid')); ?></div>
									        </div>
    								         <div class="col-md-12 mrg_tp_15">
								                 <label>Notes : <span class="star"></span></label>
										        <textarea class="form-control" name="noteswithdraw" placeholder='Enter Notes Here...' required></textarea>
									        </div>
    								        <div class="col-md-12 col-xs-12">
    								            <button type="submit" class="btn btn-success sendwithdrawreq mrg_tp_15" name="sendwithdrawreq">Submit Withdrawl Request</button>
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
        <!-- /Main Content -->