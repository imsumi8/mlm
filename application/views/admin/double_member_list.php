<style>
    .pa-0{
        padding:6px !important;
        border-radius: 20px;
    }
    .sm-data-box {
        box-shadow: 0px 0px 8px 0px #f18d8d;
    }

    .first {
    background-color: #41c6ea !important;
    color: #fff !important;
}

.second {
    background-color: #41eab0 !important;
    color: #fff !important;
}

.third {
    background-color: #41ea79  !important;
    color: #fff !important;
}

.fourth {
    background-color: #c4ea41  !important;
    color: #fff !important;
}

.fifth {
    background-color: #eae141  !important;
    color: #fff !important;
}
.sixth {
    background-color: #eac241 !important;
    color: #fff !important;
}

.seventh {
    background-color: #ea8c41 !important;
    color: #fff !important;
}

.eighth {
    background-color: #ea417b  !important;
    color: #fff !important;
}
</style>

<?php 
		 $hrm_id = $this->session->userdata('userid');
		 
		 if($hrm_id !=5000){
             $level1 = get_level_nodes($hrm_id,'DL1');
			 $level2 = get_level_nodes($hrm_id,'DL2');
             $level3 = get_level_nodes($hrm_id,'DL3');
             $level4 = get_level_nodes($hrm_id,'DL4');
			 $level5 = get_level_nodes($hrm_id,'DL5');
             $level6 = get_level_nodes($hrm_id,'DL6');
             $level7 = get_level_nodes($hrm_id,'DL7');
			 $level8 = get_level_nodes($hrm_id,'DL8');
			

		 }else{
            $level1 = get_all_level_nodes('DL1');
            $level2 = get_all_level_nodes('DL2');
            $level3 = get_all_level_nodes('DL3');
            $level4 = get_all_level_nodes('DL4');
            $level5 = get_all_level_nodes('DL5');
            $level6 = get_all_level_nodes('DL6');
            $level7 = get_all_level_nodes('DL7');
            $level8 = get_all_level_nodes('DL8');
		 }

?>

<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view pa-0">
						<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Double Star Downline Members</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box first">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
												    <i class="weight-500 uppercase-font txt-light block">LEVEL 1</i>
													<span class="txt-light block counter"><span class="counter-anim"><?php  echo $level1;  ?></span></span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="txt-light fa fa-users fnt_50"></i>
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
									<div class="sm-data-box second">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
												    <span class="weight-500 uppercase-font txt-light block">LEVEL 2</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level2; ?></span></span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="txt-light fa fa-users fnt_50"></i>
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
				    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box third">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
												    <i class="weight-500 uppercase-font txt-light block">LEVEL 3</i>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level3; ?></span></span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="txt-light fa fa-users fnt_50"></i>
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
									<div class="sm-data-box fourth">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
												    <span class="weight-500 uppercase-font txt-light block">LEVEL 4</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level4; ?></span></span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="txt-light fa fa-users fnt_50"></i>
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
				    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box fifth">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
												    <i class="weight-500 uppercase-font txt-light block">LEVEL 5</i>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level5; ?></span></span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="txt-light fa fa-users fnt_50"></i>
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
									<div class="sm-data-box sixth">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
												    <span class="weight-500 uppercase-font txt-light block">LEVEL 6</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level6; ?></span></span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="txt-light fa fa-users fnt_50"></i>
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
				    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box seventh">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
												    <i class="weight-500 uppercase-font txt-light block">LEVEL 7</i>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level7; ?></span></span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="txt-light fa fa-users fnt_50"></i>
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
									<div class="sm-data-box eighth">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
												    <span class="weight-500 uppercase-font txt-light block">LEVEL 8</span>
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level8; ?></span></span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="txt-light fa fa-users fnt_50"></i>
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