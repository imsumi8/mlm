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

           
             $nodes = get_member_nodes($hrm_id,6);

             $level =array();

             for($i=1; $i<=8; $i++){

                if($nodes < pow(4,$i)){
              
                    if($i==1)
                    $level[$i-1] =$nodes; 
                    else
                    $level[$i-1] =$nodes - pow(4,$i-1); 

                 if($level[$i-1]<0)
                    $level[$i-1]=0;

   
                }else{
                    $level[$i-1] =pow(4,$i);  
                   
                 }
             }
           

            
  
			

		 }else{

            $all_node =get_all_hrm_nodes(6);
            if(!empty($all_node)){

                $level =array('0'=>0,'1'=>0,'2'=>0,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0);
                foreach($all_node as $node){

                    $hrm_id = $node->HRM_ID;
		           $nodes = get_member_nodes($hrm_id,6);
           
                       
           
                        for($i=1; $i<=8; $i++){
           
                           if($nodes < pow(4,$i)){
                         
                               if($i==1)
                               $level[$i-1] +=$nodes; 
                               else
                               $level[$i-1] +=$nodes - pow(4,$i-1); 
           
                            if($level[$i-1]<0)
                               $level[$i-1] =0;
           
              
                           }else{
                               $level[$i-1] +=pow(4,$i);  
                              
                            }
                        }
                      
           

                }
            }
      

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
									<h1 class="panel-title txt-dark">Autopool Members</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
                                <?php  ?>
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
													<span class="txt-light block counter"><span class="counter-anim"><?php  echo $level[0];   ?></span></span>
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
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level[1]; ?></span></span>
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
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level[2]; ?></span></span>
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
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level[3]; ?></span></span>
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
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level[4]; ?></span></span>
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
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level[5]; ?></span></span>
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
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level[6]; ?></span></span>
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
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $level[7]; ?></span></span>
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