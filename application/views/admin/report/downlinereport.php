<?php

    $query=$this->db->query('Select HRM_ID,HRM_NAME from hrm_post where HRM_STATUS=1 and HRM_ID!=5000 ORDER BY ID ASC');
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
									<h1 class="panel-title txt-dark"> <i class="fa fa-arrow-circle-down"></i> Downline Report</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								    <div class="row search_panel">
								        <form action='' method="post">
								             <div class="col-md-12">
								                 <h4>Member-wise Downline Report </h4>
								            </div>
								            <div class="col-md-3">
								                 <label>User Id : </label>
										        <input type="text" class="form-control" id="tags" name="userid" value="<?php if(isset($_POST['userid'])){ echo $_POST['userid']; } ?>" placeholder='Enter user id' required>
									        </div>
    								        <div class="col-md-3 col-xs-6">
    								            <label>From : </label>
    								            <input type="text" class="datepicker form-control" name="from" value="<?php if(isset($_POST['from'])){ echo $_POST['from']; } ?>" placeholder='Enter from date' required>
    								        </div>
    								        <div class="col-md-3 col-xs-6">
    								             <label>To : </label>
    								            <input type="text" class="datepicker form-control" name="to" value="<?php if(isset($_POST['to'])){ echo $_POST['to']; } ?>" placeholder='Enter to date' required>
    								        </div>
    								        <div class="col-md-3 col-xs-6">
    								            <button type="submit" class="btn btn-primary mrg_tp_25" name="searchdownline_user">Search</button>
    								        </div>
								        </form>
								    </div>
								    <div class="row search_panel">
								        <form action='' method="post">
								             <div class="col-md-12">
								                 <h4>Month-wise Downline Report </h4>
								            </div>
								            <div class="col-md-4 col-xs-6">
    								            <label>From : </label>
    								            <input type="text" class="datepicker form-control" name="from1" value="<?php if(isset($_POST['from1'])){ echo $_POST['from1']; } ?>" placeholder='Enter from date' required>
    								        </div>
    								        <div class="col-md-4 col-xs-6">
    								             <label>To : </label>
    								            <input type="text" class="datepicker form-control" name="to1" value="<?php if(isset($_POST['to1'])){ echo $_POST['to1']; } ?>" placeholder='Enter to date' required>
    								        </div>
    								        <div class="col-md-4 col-xs-6">
    								            <button type="submit" class="btn btn-primary mrg_tp_25" name="searchdownline_month">Search</button>
    								        </div>
								        </form>
								    </div>
								    <?php if(isset($_POST['from']) && isset($_POST['to'])){ ?>
								    <div class='box' id="print_area" class="panel-body" >
        								<div class="row">
        									<div class="col-sm-12">
        										<div id = "frame" style="float: right;">
        											<a href="javascript:void(0);" onClick="print_report(); return false;" class="btn btn-primary"><i class="fa fa-print"></i></a>
        
        										</div>
        									</div>
        								</div>
        								<style type="text/css">
        									
        									#content{ height:auto;width:auto;margin:auto; }
        									#tablewrapper { width:auto; margin:0 auto;padding:20px;background-color:#fff;border:1px solid #c6d5e1; }
        									#tablewrapper table{ margin:auto;}
        									#tableheader { height:55px }
        									#tableheader select { float:left; font-size:12px; width:125px; padding:2px 4px 4px }
        									#tableheader input { float:left; font-size:12px; width:225px; padding:2px 4px 4px; margin-left:4px }
        									#tablefooter { height:15px; margin-top:20px }
        									#tablenav { float:left }
        									#tablenav img { cursor:pointer }
        									#tablenav div { float:left; margin-right:15px }
        									#tablelocation { float:right; font-size:12px }
        									#tablelocation select { margin-right:3px }
        									#tablelocation div { float:left; margin-left:15px }
        									.page { margin-top:2px; font-style:italic }
        									#selectedrow td { background:#c6d5e1; }
        									#tablewrapper{ margin-top:10px; }
        									#tablewrapper table td{ padding:3px; }
        									table td{ font-size:12px; }
        									h2 { font-size:24px;margin-top:10px;margin-bottom:10px;font-weight:normal ;font-family:dosis;}
        									hr{ border-top:1px dotted #000;background:none;margin-bottom:5px; }
        									table#datastore { border-collapse:collapse;border-bottom:1px solid #c5c5c5;border-top:1px solid #c5c5c5;border-right:1px solid #c5c5c5;color:#2e2e2e;font-weight:normal;width:100%; }
        									table#datastore  th{ border-bottom:1px solid #c5c5c5;font-weight:normal; }
        									table#datastore  td,table#grid th{ padding:10px 0px;text-align:center;border-left:1px solid #c5c5c5; }
        									table#datastore  thead{ line-height:30px;color:#444;font-weight:normal }
        									table#datastore  .mainframe td table#grid tr td{ line-height:24px;font-size:14px;vertical-align:middle }
        									table#datastore  tr { background-color: #f5f5f5; }
        									table#datastore  tr:hover { background-color: #FFF;color:#000 }
        									table#datastore.profile_report_tbl td,table#datastore.profile_report_tbl th { text-align: left; padding-left:10px }
        
        								</style>	
        								<div id="content">
        									<div id="tablewrapper">
        										<div class="row">
        											<div class="col-sm-12">
        												
        												<div class="col-sm-8 col-sm-offset-2">
        
        													<table align="center" id="trt">
        														<tr height='20px'>
        															<td  colspan="3" align='center'>
        																
        																	<img src="<?php echo base_url() ?>assets/uploads_assets/<?php echo get_option('logo'); ?>" class="report_logo">
        																
        															</td>
        														</tr>
        														<tr height='20px'><td  colspan="3" align='center'><b><font color="#ff0000"></font><?php echo get_option('comp_addr'); ?></b></td></tr>
        														<tr height='20px'><td  colspan="3" align='center'><b><font color="#ff0000">Phone:</font>+91 <?php echo get_option('comp_phone'); ?></b></td></tr>
        														<tr height='20px'><td  colspan="3" align='center'><b><font color="#ff0000">Email:</font><?php echo get_option('comp_email'); ?></b></td></tr>
        													</table>
        												</div>
        												<div class="col-sm-2" style="text-align:center; padding: 20px 0px 0px 0px;">
        													<b>Date : <?php echo date("M jS, Y", strtotime(date('Y-m-d'))); ?></b>
        												</div>
        											</div>
        										</div>
        										<hr />
        										<h2 style="text-align: center;">Downline Report of <?php echo $_POST['userid']." (".get_hrm_postmeta($_POST['userid'],'first_name')." )"; ?> </h2><h4 style="text-align: center;"> From : <?php echo date("M jS, Y", strtotime($_POST['from'])); ?>  To : <?php echo date("M jS, Y", strtotime($_POST['to'])); ?></h4>
        										
        												<table width="100%" border="1" cellpadding="5px" cellspacing="0" align="center" id="datastore" class="profile_report_tbl" >
        												<thead>
													<tr>
														<th>Sr No.</th>
														<th>User Id</th>
														<th>Full Name</th>
													    <th>Registered Date</th>
													    <th>Package</th>
													    <th>Introducer Id</th>
														<th>Contact</th>
														
													
													</tr>
												</thead>
												
												<tbody>
												    <?php 
												    
												    if(!empty($downlinelist)) { $i=1; $amt=0; foreach($downlinelist as $post) { 
												         $user_id=$post->HRM_ID;
												         $postionid=get_reverse_parent_hrms_lev_0($post->HRM_ID,3);
													    ?>
															<tr>
																<td><?php echo $i; ?></td>
																<td><?php echo $user_id; ?></td>
																<td><?php echo $post->HRM_NAME; ?></td>
															    <td><?php echo date('j M Y',strtotime($post->HRM_DATE)); ?></td>
															    <td><?php echo get_all_packs_by_id_full(get_hrm_postmeta($post->HRM_ID,'package')); ?></td>
															    <td><?php echo $postionid." [".get_hrm_postmeta($postionid,'first_name')." ".get_hrm_postmeta($postionid,'last_name')."]"; ?></td>
															    <td><?php echo get_hrm_postmeta($post->HRM_ID,'contact'); ?></td>
															</tr>
														<?php  $i++; } } 		
														else { ?>
														    <tr><td colspan="7">No records found</td></tr>
														<?php } ?>
												</tbody>
        													
        													
        
        												</table>
        
        												</div>
        								</div>
        							</div>
        							<?php } ?>
        							 <?php if(isset($_POST['from1']) && isset($_POST['to1'])){ ?>
								    <div class='box' id="print_area" class="panel-body" >
        								<div class="row"  >
        									<div class="col-sm-12">
        										<div id ="frame" style="float: right;">
        											<a href="javascript:void(0);" onClick="print_report(); return false;" class="btn btn-primary"><i class="fa fa-print"></i></a>
        
        										</div>
        									</div>
        								</div>
        								<style type="text/css">
        									
        									#content{ height:auto;width:auto;margin:auto; }
        									#tablewrapper { width:auto; margin:0 auto;padding:20px;background-color:#fff;border:1px solid #c6d5e1; }
        									#tablewrapper table{ margin:auto;}
        									#tableheader { height:55px }
        									#tableheader select { float:left; font-size:12px; width:125px; padding:2px 4px 4px }
        									#tableheader input { float:left; font-size:12px; width:225px; padding:2px 4px 4px; margin-left:4px }
        									#tablefooter { height:15px; margin-top:20px }
        									#tablenav { float:left }
        									#tablenav img { cursor:pointer }
        									#tablenav div { float:left; margin-right:15px }
        									#tablelocation { float:right; font-size:12px }
        									#tablelocation select { margin-right:3px }
        									#tablelocation div { float:left; margin-left:15px }
        									.page { margin-top:2px; font-style:italic }
        									#selectedrow td { background:#c6d5e1; }
        									#tablewrapper{ margin-top:10px; }
        									#tablewrapper table td{ padding:3px; }
        									table td{ font-size:12px; }
        									h2 { font-size:24px;margin-top:10px;margin-bottom:10px;font-weight:normal ;font-family:dosis;}
        									hr{ border-top:1px dotted #000;background:none;margin-bottom:5px; }
        									table#datastore { border-collapse:collapse;border-bottom:1px solid #c5c5c5;border-top:1px solid #c5c5c5;border-right:1px solid #c5c5c5;color:#2e2e2e;font-weight:normal;width:100%; }
        									table#datastore  th{ border-bottom:1px solid #c5c5c5;font-weight:normal; }
        									table#datastore  td,table#grid th{ padding:10px 0px;text-align:center;border-left:1px solid #c5c5c5; }
        									table#datastore  thead{ line-height:30px;color:#444;font-weight:normal }
        									table#datastore  .mainframe td table#grid tr td{ line-height:24px;font-size:14px;vertical-align:middle }
        									table#datastore  tr { background-color: #f5f5f5; }
        									table#datastore  tr:hover { background-color: #FFF;color:#000 }
        									table#datastore.profile_report_tbl td,table#datastore.profile_report_tbl th { text-align: left; padding-left:10px }
        
        								</style>	
        								<div id="content">
        									<div id="tablewrapper">
        										<div class="row">
        											<div class="col-sm-12">
        												
        												<div class="col-sm-8 col-sm-offset-2">
        
        													<table align="center" id="trt">
        														<tr height='20px'>
        															<td  colspan="3" align='center'>
        																
        																<img src="<?php echo base_url() ?>assets/uploads_assets/<?php echo get_option('logo'); ?>" class="report_logo">
        																
        															</td>
        														</tr>
        														<tr height='20px'><td  colspan="3" align='center'><b><font color="#ff0000"></font><?php echo get_option('comp_addr'); ?></b></td></tr>
        														<tr height='20px'><td  colspan="3" align='center'><b><font color="#ff0000">Phone:</font>+91 <?php echo get_option('comp_phone'); ?></b></td></tr>
        														<tr height='20px'><td  colspan="3" align='center'><b><font color="#ff0000">Email:</font><?php echo get_option('comp_email'); ?></b></td></tr>
        													</table>
        												</div>
        												<div class="col-sm-2" style="text-align:center; padding: 20px 0px 0px 0px;">
        													<b>Date : <?php echo date("M jS, Y", strtotime(date('Y-m-d'))); ?></b>
        												</div>
        											</div>
        										</div>
        										<hr />
        										<h2 style="text-align: center;">Downline Report </h2><h4 style="text-align: center;"> From : <?php echo date("M jS, Y", strtotime($_POST['from1'])); ?>  To : <?php echo date("M jS, Y", strtotime($_POST['to1'])); ?></h4>
        										
        												<table width="100%" border="1" cellpadding="5px" cellspacing="0" align="center" id="datastore" class="profile_report_tbl" >
        												<thead>
    													<tr>
    														<th>Sr No.</th>
    														<th>User Id</th>
    														<th>Full Name</th>
    													    <th>Registered Date</th>
    													    <th>Package</th>
    													    <th>Introducer Id</th>
    														<th>Contact</th>
    													</tr>
												</thead>
												<tbody>
												    <?php 
												    
												    if(!empty($downlinelist)) { $i=1; $amt=0; foreach($downlinelist as $post) { 
												         $user_id=$post->HRM_ID;
												         $postionid=get_reverse_parent_hrms_lev_0($post->HRM_ID,3);
													    ?>
															<tr>
																<td><?php echo $i; ?></td>
																<td><?php echo $user_id; ?></td>
																<td><?php echo $post->HRM_NAME; ?></td>
															    <td><?php echo date('j M Y',strtotime($post->HRM_DATE)); ?></td>
															    <td><?php echo get_all_packs_by_id_full(get_hrm_postmeta($post->HRM_ID,'package')); ?></td>
															    <td><?php echo $postionid." [".get_hrm_postmeta($postionid,'first_name')." ".get_hrm_postmeta($postionid,'last_name')."]"; ?></td>
															    <td><?php echo get_hrm_postmeta($post->HRM_ID,'contact'); ?></td>
															</tr>
														<?php  $i++; } } 		
														else { ?>
														    <tr><td colspan="7">No records found</td></tr>
														<?php } ?>
												</tbody>
        													
        													
        
        												</table>
        
        												</div>
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
						<p><?php echo date('Y'); ?> &copy; <?php echo get_option('footer_name'); ?> All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->