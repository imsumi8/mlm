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
  function printDiv() 
    {
    
      var divToPrint=document.getElementById('DivIdToPrint');
    
      var newWin=window.open('','Print-Window');
    
      newWin.document.open();
    
      newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
    
      newWin.document.close();
    
      setTimeout(function(){newWin.close();},10);
    
    }
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
									<h1 class="panel-title txt-dark"> <i class="fa fa-home"></i> Direct Member Detail User</h1>
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
								    <div class="row">
    								    <div class="col-md-12 text-right">
            							    <button type='button' id='btn' class="btn btn-primary" onclick='printDiv();'><i class="fa fa-print"></i> Print</button>
            							</div>
        							</div>
        							<div class="fulldiv" id="DivIdToPrint">
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
            							<div class="col-md-6 col-lg-6 col-xs-12" style="overflow-x: auto;padding:0px;">
                							<table class="table table-striped table-bordered mrg_tp_25">
                							    <thead>
                							        <tr>
                							            <th colspan="7">SELF ID</th>
                							            
                							        </tr>
                							        <tr>
                							            <th>Sr No.</th>
                							            <th>User Id</th>
                							            <th>Name</th>
                							            <th>Father</th>
                							            <th>Pan</th>
                							            <th>Aadhar</th>
                							            <th>Mob No.</th>
                							        </tr>
                							    </thead>
                							    <tbody>
                							       <?php 
                							       $userid=$_POST['userid'];
                							        $hrm=direct_member_list($userid,1);
                							        $i=1;$j=1;
                							        $arr=get_hrm_post($userid);
                							        if(!empty($hrm)){
                							        foreach($hrm as $hrms){
                							            ?>
                    							         <tr>
                    							            <?php if(trim($arr[0]->HRM_NAME)==trim($hrms->HRM_NAME)){ ?>
                        							            <td><?php echo $i; ?></td>
                        							            <td><?php echo $hrms->HRM_ID; ?></td>
                        							            <td><?php echo $hrms->HRM_NAME; ?></td>
                        							            <td><?php echo get_hrm_postmeta($hrms->HRM_ID,'father_name'); ?></td>
                        							            <td><?php echo get_hrm_postmeta($hrms->HRM_ID,'pancard'); ?></td>
                        							            <td><?php echo get_hrm_postmeta($hrms->HRM_ID,'aadhar'); ?></td>
                        							            <td><?php echo get_hrm_postmeta($hrms->HRM_ID,'contact'); ?></td>
                    							            <?php $i++; } ?>
                    							     </tr>
                							            <?php
                							            
                							        } }
	                                                ?>
                							    </tbody>
                							</table>
            							</div>
            							<div class="col-md-6 col-lg-6 col-xs-12" style="overflow-x: auto;padding:0px;">
                							<table class="table table-striped table-bordered mrg_tp_25">
                							    <thead>
                							        <tr>
                							            <th colspan="7">DIRECT ID</th>
                							        </tr>
                							        <tr>
                							            <th>Sr No.</th>
                							            <th>User Id</th>
                							            <th>Name</th>
                							            <th>Father</th>
                							            <th>Pan</th>
                							            <th>Aadhar</th>
                							            <th>Mob No.</th>
                							        </tr>
                							    </thead>
                							    <tbody>
                							       <?php 
                							         $userid=$_POST['userid'];
                							        $hrm=direct_member_list($userid,1);
                							        $i=1;$j=1;
                							        $arr=get_hrm_post($userid);
                							        if(!empty($hrm)){
                							        foreach($hrm as $hrms){
                							            ?>
                    							         <tr>
                    							            <?php if(trim($arr[0]->HRM_NAME)!=trim($hrms->HRM_NAME)){ ?>
                        							            <td><?php echo $j; ?></td>
                        							            <td><?php echo $hrms->HRM_ID; ?></td>
                        							            <td><?php echo $hrms->HRM_NAME; ?></td>
                        							            <td><?php echo get_hrm_postmeta($hrms->HRM_ID,'father_name'); ?></td>
                        							            <td><?php echo get_hrm_postmeta($hrms->HRM_ID,'pancard'); ?></td>
                        							            <td><?php echo get_hrm_postmeta($hrms->HRM_ID,'aadhar'); ?></td>
                        							            <td><?php echo get_hrm_postmeta($hrms->HRM_ID,'contact'); ?></td>
                    							            <?php $j++; } ?>
                    							            
                    							        </tr>
                							            <?php
                							            
                							        } }
	                                                ?>
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