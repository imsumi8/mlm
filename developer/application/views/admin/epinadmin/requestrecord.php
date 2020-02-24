<?php

    $query=$this->db->query('Select HRM_ID,HRM_NAME from hrm_post where HRM_STATUS=1 and HRM_ID!=5000 order by ID asc');
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
									<h1 class="panel-title txt-dark"> <i class="fa fa-home"></i> E-Pin Request User</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								    <div class="row">
								        <form action='' method="post">
								            
								            <div class="col-md-3">
								                 <label>User Id : </label>
										        <input type="text" class="form-control" id="tags" name="userid" value="<?php if(isset($_POST['userid'])){ echo $_POST['userid']; } ?>" placeholder='Enter user id' required>
									        </div>
    								       <div class="col-md-3 col-xs-6">
    								            <button type="submit" class="btn btn-primary mrg_tp_25" name="searchpayoutrelease_user">Search</button>
    								        </div>
								        </form>
								    </div>
								    
								    <?php if(isset($_POST['userid'])){ ?>
								   
        							<div class="fulldiv mrg_tp_25" id="DivIdToPrint">
            							<div class="col-md-12 col-lg-12 col-xs-12" style="overflow-x: auto;padding:0px;">
                							<table class="table table-striped custtable table-bordered mrg_tp_25 datatabel_common">
                							    <thead>
                							        <tr>
                							            <th>Sr No.</th>
                							            <th>User Id</th>
                							            <th>Name</th>
                							            <th>Message</th>
                							            <th>Image</th>
                							            <th>Mob No.</th>
                							            <th>Request Date and Time</th>
                							            <th>Send Epin Date and Time</th>
                							            <th>Type</th>
                							        </tr>
                							    </thead>
                							    <tfoot>
                							        <tr>
                							            <th>Sr No.</th>
                							            <th>User Id</th>
                							            <th>Name</th>
                							            <th>Message</th>
                							            <th>Image</th>
                							            <th>Mob No.</th>
                							            <th>Request Date and Time</th>
                							            <th>Send Epin Date and Time</th>
                							            <th>Type</th>
                							        </tr>
                							    </tfoot>
                							    <tbody>
                							       <?php if(!empty($epinrecord)) { $i=1; foreach($epinrecord as $epinreqs) { 
                							       if($epinreqs->HRM_ID==$_POST['userid']){
                							       ?>
															<tr>
															<td><?php echo $i; ?></td>
															<td><?php if($epinreqs->HRM_ID!='0'){ echo $epinreqs->HRM_ID; } else { echo '-'; } ?></td>
															<td><?php echo get_hrm_postmeta($epinreqs->HRM_ID,'first_name')." ".get_hrm_postmeta($epinreqs->HRM_ID,'last_name'); ?></td>
															<td><?php echo $epinreqs->MESSAGE; ?></td>
															<td><?php  if($epinreqs->RELATED_IMAGE!='') { ?><a class="example-image-link" href="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $epinreqs->RELATED_IMAGE; ?>" data-lightbox="example-1"><img class="example-image" src="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $epinreqs->RELATED_IMAGE; ?>" alt="image-1" style="max-width:80px;min-width:80px;width:100%;" /></a><?php } else { echo '-'; } ?></td>
															<td><?php if(get_hrm_postmeta($epinreqs->HRM_ID,'contact')!=''){ echo get_hrm_postmeta($epinreqs->HRM_ID,'contact'); } else { echo $epinreqs->MOBILE_NO; } ?></td>
															<td><?php echo $epinreqs->REQUESTED_TIME; ?></td>
															<td><?php echo $epinreqs->APPROVED_TIME; ?></td>
															<td><?php if($epinreqs->FRANCHISEE_ID>1){ echo "Franchisee"; } else if($epinreqs->FRANCHISEE_ID==1) { echo "Front Site Request"; } else { echo "Custom Epin"; } ?></td>
															
															</tr>
													<?php $i++; } } } ?>
                							    </tbody>
                							</table>
            							</div>
            						</div>
        						     <?php } else { ?>
        						     
        							<div class="fulldiv mrg_tp_25" id="DivIdToPrint">
            							<style>
                                            .table-bordered {
                                            border: 1px solid #ddd !important;
                                        }
                                        th{
                                            text-align:center !important;
                                            
                                            color: #fff !important;
                                            border: 3px solid #fff !important;
                                           padding: 20px !important;
                                        }
                                        thead tr{
                                            background-color: #419bea !important;
                                        }
                                        tfoot tr{
                                            background-color: #419bea !important;
                                        }
                                        tfoot td{
                                            color:#fff !important;
                                        }
                                        td{
                                            text-align:center;
                                        }
                                        table{
                                                box-shadow: 0px 0px 12px 0px grey;
                                        }
                                        </style>
            							<div class="col-md-12 col-lg-12 col-xs-12" style="overflow-x: auto;padding:0px;">
                							<table class="table table-striped table-bordered mrg_tp_25 datatabel_common">
                							    <thead>
                							        <tr>
                							            <th>Sr No.</th>
                							            <th>User Id</th>
                							            <th>Name</th>
                							            <th>Message</th>
                							            <th>Image</th>
                							            <th>Mob No.</th>
                							            <th>Request Date and Time</th>
                							            <th>Send Epin Date and Time</th>
                							            <th>Type</th>
                							        </tr>
                							    </thead>
                							    <tfoot>
                							        <tr>
                							            <th>Sr No.</th>
                							            <th>User Id</th>
                							            <th>Name</th>
                							            <th>Message</th>
                							            <th>Image</th>
                							            <th>Mob No.</th>
                							            <th>Request Date and Time</th>
                							            <th>Send Epin Date and Time</th>
                							            <th>Type</th>
                							        </tr>
                							    </tfoot>
                							    <tbody>
                							       <?php if(!empty($epinrecord)) { $i=1; foreach($epinrecord as $epinreqs) { 
                							       
                							       ?>
															<tr>
															<td><?php echo $i; ?></td>
															<td><?php if($epinreqs->HRM_ID!='0'){ echo $epinreqs->HRM_ID; } else { echo '-'; } ?></td>
															<td><?php echo get_hrm_postmeta($epinreqs->HRM_ID,'first_name')." ".get_hrm_postmeta($epinreqs->HRM_ID,'last_name'); ?></td>
															<td><?php echo $epinreqs->MESSAGE; ?></td>
															<td><?php  if($epinreqs->RELATED_IMAGE!='') { ?><a class="example-image-link" href="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $epinreqs->RELATED_IMAGE; ?>" data-lightbox="example-1"><img class="example-image" src="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $epinreqs->RELATED_IMAGE; ?>" alt="image-1" style="max-width:80px;min-width:80px;width:100%;" /></a><?php } else { echo '-'; } ?></td>
															<td><?php if(get_hrm_postmeta($epinreqs->HRM_ID,'contact')!=''){ echo get_hrm_postmeta($epinreqs->HRM_ID,'contact'); } else { echo $epinreqs->MOBILE_NO; } ?></td>
															<td><?php echo $epinreqs->REQUESTED_TIME; ?></td>
															<td><?php echo $epinreqs->APPROVED_TIME; ?></td>
															<td><?php if($epinreqs->FRANCHISEE_ID>1){ echo "Franchisee"; } else if($epinreqs->FRANCHISEE_ID==1) { echo "Front Site Request"; } else { echo "Custom Epin"; } ?></td>
															
															</tr>
													<?php $i++;  } } ?>
                							    </tbody>
                							</table>
            							</div>
            						</div>
        						     <?php } ?>
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
						<p>2018 &copy; BRIGHT DEAL. All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lightbox/css/lightbox.min.css">
<script src="<?php echo base_url(); ?>assets/lightbox/js/lightbox.min.js"></script>