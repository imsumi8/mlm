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
									<h1 class="panel-title txt-dark"> <i class="fa fa-home"></i> E-Pin Send Record</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								    <div class="fulldiv mrg_tp_25" id="DivIdToPrint">
            							
            							<div class="col-md-12 col-lg-12 col-xs-12" style="overflow-x: auto;padding:0px;">
                							<table class="table table-striped table-bordered custtable mrg_tp_25 datatabel_common">
                							    <thead>
                							        <tr>
                							            <th>Sr No.</th>
                							            <th>User Id</th>
                							            <th>Name</th>
                							            <th>Mob No.</th>
                							            <th>Cost</th>
                							            <th>Send Epin Date and Time</th>
                							          
                							        </tr>
                							    </thead>
                							    <tfoot>
                							        <tr>
                							            <th>Sr No.</th>
                							            <th>User Id</th>
                							            <th>Name</th>
                							            <th>Mob No.</th>
                							            <th>Cost</th>
                							            <th>Send Epin Date and Time</th>
                							          
                							        </tr>
                							    </tfoot>
                							    <tbody>
                							       <?php if(!empty($epinrecord)) { $i=1; foreach($epinrecord as $epinreqs) { 
                							           if($epinreqs->DR_ID!=0){
                							                $ledger_id=get_ledger_dt_by_id($epinreqs->DR_ID);
                							                $hrm_id=str_replace("ledger_","",$ledger_id[0]->NAME);
                							                $hrm_arr=get_hrm_post($hrm_id);
                							       ?>
															<tr>
															<td><?php echo $i; ?></td>
															<td><?php if($hrm_id!='0'){ echo $hrm_id; } else { echo '-'; } ?></td>
															<td><?php echo get_hrm_postmeta($hrm_id,'first_name')." ".get_hrm_postmeta($hrm_id,'last_name'); ?></td>
															<td><?php if(get_hrm_postmeta($hrm_id,'contact')!=''){ echo get_hrm_postmeta($hrm_id,'contact'); } else { echo get_hrm_postmeta($hrm_id,'contact'); } ?></td>
															<td><?php echo $epinreqs->AMOUNT; ?></td>
															<td><?php echo $epinreqs->TRANSACTION_TIME; ?></td>
														
															</tr>
													<?php $i++;  } } } ?>
                							    </tbody>
                							</table>
            							</div>
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
						<p>2018 &copy; <?php echo get_option('footer_name'); ?>. All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->