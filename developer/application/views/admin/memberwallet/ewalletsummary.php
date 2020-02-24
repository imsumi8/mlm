
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				
				
				<!-- Row -->
				<div class="row">
				    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-yellow">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $wallet=get_wallet_balance($this->session->userdata('userid')); ?></span></span>
													<i class="weight-500 uppercase-font txt-light block">Wallet Balance</i>
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
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $earned=get_sum_comission_by_date('2017-01-01',date('Y-m-d'),'1,2',$this->session->userdata('userid')); ?></span></span>
													<span class="weight-500 uppercase-font txt-light block font-13">Total Earned Income</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="txt-light fa fa-money fnt_50"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-blue">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $withdrawl=get_sum_withdrawl_amt('2017-01-01',date('Y-m-d'),$this->session->userdata('userid')); ?></span></span>
													<span class="weight-500 uppercase-font txt-light block">Total Withdrawl Income</span>
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
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-green">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php $withdrawl=get_sum_withdrawl_amt('2017-01-01',date('Y-m-d'),$this->session->userdata('userid')); echo $earned-$withdrawl-$wallet; ?></span></span>
													<span class="weight-500 uppercase-font txt-light block">Total Pending Income</span>
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
				<!-- /Row -->
				<div class="row">
				    <div class="col-lg-6 col-sm-6 col-md-6">
						<div class="panel card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div  class="pills-struct">
										<ul role="tablist" class="nav nav-pills" id="myTabs_6">
										    <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="summary" href="#home_6">Summary</a></li>
											<li role="presentation" class=""><a  data-toggle="tab"  role="tab" href="#thismonth" aria-expanded="false">This Month</a></li>
										    <li role="presentation" class=""><a  data-toggle="tab" role="tab" href="#thisyear" aria-expanded="false">This Year</a></li>
										</ul>
										  
										   <div class="tab-content" id="myTabContent_6">
											<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
											    <table class="table table-bordered table-striped">
											        <tr>
											            <th>
											               Fund Deposit 
											            </th>
											            <th>
											               <i class="fa fa-inr"></i> 0
											            </th>
											        </tr>
											        <tr>
											            <th>
											                Direct Commission
											            </th>
											            <th>
											               <i class="fa fa-inr"></i><?php echo " ".get_sum_comission_by_date('2017-01-01',date('Y-m-d'),'2',$this->session->userdata('userid')); ?>
											            </th>
											        </tr>
											        <tr>
											            <th>
											                Referral Commission
											            </th>
											            <th>
											               <i class="fa fa-inr"></i><?php echo " ".get_sum_comission_by_date('2017-01-01',date('Y-m-d'),'1',$this->session->userdata('userid')); ?>
											            </th>
											        </tr>
											        <tr>
											            <th>
											               Withdrawal
											            </th>
											            <th>
											              <i class="fa fa-inr"></i><?php echo " ".get_sum_withdrawl_amt('2017-01-01',date('Y-m-d'),$this->session->userdata('userid')); ?>
											            </th>
											        </tr>
											    </table>
											</div>
											<div id="thismonth" class="tab-pane fade" role="tabpanel">
												<table class="table table-bordered table-striped">
											        <tr>
											            <th>
											               Fund Deposit 
											            </th>
											            <th>
											               <i class="fa fa-inr"></i> 0
											            </th>
											        </tr>
											        <tr>
											            <th>
											                Direct Commission
											            </th>
											            <th>
											               <i class="fa fa-inr"></i><?php  echo " ".get_sum_comission_by_date(date('Y-m').'-01',date('Y-m-d'),'2',$this->session->userdata('userid')); ?>
											            </th>
											        </tr>
											        <tr>
											            <th>
											                Referral Commission
											            </th>
											            <th>
											               <i class="fa fa-inr"></i><?php echo " ".get_sum_comission_by_date(date('Y-m').'-01',date('Y-m-d'),'1',$this->session->userdata('userid')); ?>
											            </th>
											        </tr>
											        <tr>
											            <th>
											               Withdrawal
											            </th>
											            <th>
											               <i class="fa fa-inr"></i><?php echo " ".get_sum_withdrawl_amt(date('Y-m').'-01',date('Y-m-d'),$this->session->userdata('userid')); ?>
											               
											            </th>
											        </tr>
											    </table>
											</div>
											<div id="thisyear" class="tab-pane fade" role="tabpanel">
												<table class="table table-bordered table-striped">
											        <tr>
											            <th>
											               Fund Deposit 
											            </th>
											            <th>
											               <i class="fa fa-inr"></i> 0
											            </th>
											        </tr>
											        <tr>
											            <th>
											                Direct Commission
											            </th>
											            <th>
											               <i class="fa fa-inr"></i><?php echo " ".get_sum_comission_by_date(date('Y').'-01-01',date('Y-m-d'),'2',$this->session->userdata('userid')); ?>
											            </th>
											        </tr>
											        <tr>
											            <th>
											                Referral Commission
											            </th>
											            <th>
											               <i class="fa fa-inr"></i><?php echo " ".get_sum_comission_by_date(date('Y').'-01-01',date('Y-m-d'),'1',$this->session->userdata('userid')); ?>
											            </th>
											        </tr>
											        <tr>
											            <th>
											               Withdrawal
											            </th>
											            <th>
											               <i class="fa fa-inr"></i><?php echo " ".get_sum_withdrawl_amt(date('Y').'-01-01',date('Y-m-d'),$this->session->userdata('userid')); ?>
											            </th>
											        </tr>
											    </table>
											</div>
										</div>
									</div>
									<div class="form-group text-right">
									    <a href="<?php echo base_url(); ?>admin/memberwallet/withdrawfund" class="btn btn-success">Withdraw Fund</a>
									    <a href="<?php echo base_url(); ?>admin/memberwallet/transaction" class="btn btn-primary">View All</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Wallet Status</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
									</a>
									
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
										<canvas id="incomechart" height="191" width="293" style="display: block; width: 293px; height: 191px;"></canvas>
									</div>	
									<hr class="light-grey-hr row mt-10 mb-15">
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-yellow mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5"><?php echo $wallet; ?> <i class='fa fa-inr'></i> Wallet Balance</span></span>
										
											<div class="clearfix"></div>
										</div>
									</div>
									<hr class="light-grey-hr row mt-10 mb-15">
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-red mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5"><?php echo $earned; ?> <i class='fa fa-inr'></i> Total Earned Income</span></span>
										
											<div class="clearfix"></div>
										</div>
									</div>
									<hr class="light-grey-hr row mt-10 mb-15">
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-blue mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5"><?php echo $withdrawl; ?> <i class='fa fa-inr'></i> Total Withdrawl Income</span></span>
										
											<div class="clearfix"></div>
										</div>
									</div>
									<hr class="light-grey-hr row mt-10 mb-15">
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-green mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5"><?php echo $earned-$withdrawl-$wallet; ?> <i class='fa fa-inr'></i> Total Pending Income</span></span>
										
											<div class="clearfix"></div>
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
<script>
$(document).ready(function() {
    var wt=<?php echo $wallet; ?>;
    var et=<?php echo $earned; ?>;
    var wthdr=<?php echo $withdrawl; ?>;
    var pt=<?php echo $earned-$withdrawl-$wallet; ?>;
    if( $('#incomechart').length > 0 ){
		var ctx6 = document.getElementById("incomechart").getContext("2d");
		var data6 = {
			 labels: [
			"WALLET BALANCE",
			"EARNED INCOME",
			"WALLET INCOME",
			"PENDING INCOME"
		],
		datasets: [
			{
				data: [wt,et,wthdr,pt],
				backgroundColor: [
				    "#e69a2a",
				    "#ea6c41",
				    "#177ec1",
				    "#469408",
				],
				hoverBackgroundColor: [
				    "#e69a2a",
				    "#ea6c41",
				    "#177ec1",
				    "#469408",
				]
			}]
		};
		
		var pieChart  = new Chart(ctx6,{
			type: 'pie',
			data: data6,
			options: {
				animation: {
					duration:	3000
				},
				responsive: true,
				maintainAspectRatio:false,
				legend: {
					display:false
				},
				tooltip: {
					backgroundColor:'rgba(33,33,33,1)',
					cornerRadius:0,
					footerFontFamily:"'Roboto'"
				},
				elements: {
					arc: {
						borderWidth: 0
					}
				}
			}
		});
	}
});
</script>