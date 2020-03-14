
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
        background-image: url(http://brightdeal.biz/developer/assets/img/Wood_207.jpg) !important;
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
</style>

<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				<div class="row">
				    <div class="col-md-offset-9 col-md-3 col-xs-12">
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
				</div>
					<!-- Row -->
				<div class="row">
				    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box actived pd_bth_10">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13">TODAY JOININGS</span>
												</div>
											    <div class="col-xs-4 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13"> PAID</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo get_today_joining(); ?></span></span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13"> FREE</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo get_today_free_joining(); ?></span></span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13"> TOTAL</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo get_today_joining()+get_today_free_joining(); ?></span></span>
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
									<div class="sm-data-box bg-green pd_bth_10">
										<div class="container-fluid">
											<div class="row">
											    <div class="col-xs-6 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13">TODAY USED E-PINS</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo get_today_used_epin(); ?></span></span>
												</div>
												<div class="col-xs-6 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13">TODAY GENREATED E-PINS</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo today_generatedepin(); ?></span></span>
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
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box actived">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
													<span class="weight-500 uppercase-font txt-light block font-13">TOTAL DOWNLINE MEMBER</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo allposts_count(3); ?></span></span>
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
									<div class="sm-data-box bg-yellow">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
													<span class="weight-500 uppercase-font txt-light block font-13">TOTAL ACTIVE DOWNLINE MEMBER</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo allposts_count(3); ?></span></span>
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
									<div class="sm-data-box bg-green">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center pl-0 pr-0 data-wrap-left">
													<span class="weight-500 uppercase-font txt-light block font-13">TOTAL INACTIVE DOWNLINE MEMBER</span>
													<span class="txt-light block counter"><span class="counter-anim">0</span></span>
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
				    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box actived pd_bth_10">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13">COMPANY STATUS</span>
												</div>
											    <div class="col-xs-4 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13"> TOTAL SALES</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $sale=get_ledger_amt("plan_account"); ?></span></span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13"> TOTAL WALLET</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php $cash=get_ledger_amt("cash"); echo $sale-$cash; ?></span></span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13"> NET INCOME</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $cash; ?></span></span>
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
									<div class="sm-data-box bg-yellow pd_bth_10">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13">WITHDRAWL STATUS</span>
												</div>
											    <div class="col-xs-4 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13"> PENDING</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo get_count_withdrawl_income_stat('0,1'); ?></span></span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13"> APPROVED</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo get_count_withdrawl_income_stat('2'); ?></span></span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13"> REJECTED</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo get_count_withdrawl_income_stat('3');; ?></span></span>
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
									<div class="sm-data-box bg-green pd_bth_10">
										<div class="container-fluid">
											<div class="row">
											    <div class="col-xs-12 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13">KYC STATUS</span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13"> PENDING</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo total_kyc_status(1); ?></span></span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13"> APPROVED</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo total_kyc_status(2); ?></span></span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="weight-500 uppercase-font txt-light block font-13"> REJECTED</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo total_kyc_status(3); ?></span></span>
												</div>
											</div>	
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