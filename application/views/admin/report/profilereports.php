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
							<h1 class="panel-title txt-dark">Profile Report</h1>
							<hr class="reddish">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="row">
								<form action='' method="post">
									<div class="col-md-4">
										
										<input type="text" class="form-control" id="tags" name="userid" value="<?php if(isset($_POST['userid'])){ echo $_POST['userid']; } ?>" placeholder='Enter user id' required>
									</div>
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary" name="searchprofile">Search</button>
									</div>
								</form>
							</div>
							<?php if(isset($_POST['userid'])){ 
							    if(get_hrm_postmeta($_POST['userid'],'first_name')=='') { ?>
    							<div class="row">
                                    <div class="col-md-12" style="margin-top: 15px; ">
                                    <div class="alert alert-warning clrwt">User Id does not exist</div>
                                    </div>
                                </div>
                            <?php } } ?>
							<?php if(isset($_POST['userid'])){ 
							$user_id=$_POST['userid'];
							 if(get_hrm_postmeta($user_id,'first_name')!='') {
							?>
							<div class='box' id="print_area" class="panel-body" >
								<div class="row"  >
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
									table td{ font-size:12px;width:50%; }
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
										<h2 style="text-align: center;">Profile Report</h2>
										
												<table width="100%" border="1" cellpadding="5px" cellspacing="0" align="center" id="datastore" class="profile_report_tbl" >
													<tr class="text">
													    <tr>
															<td><strong>Userid</strong></td>
															<td><?php echo $user_id; ?></td>
														</tr>
                                                        <td><strong>Full Name</strong></td>
															<td><?php echo get_hrm_postmeta($user_id,'first_name')." ".get_hrm_postmeta($user_id,'last_name'); ?></td>
														</tr>
														 <td><strong>Father Name</strong></td>
															<td><?php echo get_hrm_postmeta($user_id,'father_name'); ?></td>
														</tr>
														<tr>
															<td><strong>Sponsor Name</strong></td>
															<td><?php echo get_hrm_postmeta(get_added_by($user_id),'first_name')." ".get_hrm_postmeta(get_added_by($user_id),'last_name')." [".get_added_by($user_id)."  ]"; ?></td>
														</tr>
														<tr>
															<td><strong>Address</strong></td>
															<td><?php echo get_hrm_postmeta($user_id,'address'); ?></td>
														</tr>
														<tr >
															<td><strong>Pincode</strong></td>
															<td><?php echo get_hrm_postmeta($user_id,'pin_code'); ?></td>
														</tr>
														<tr >
															<td><strong>Pan Card</strong></td>
															<td><?php echo get_hrm_postmeta($user_id,'pancard'); ?></td>
														</tr>
														<tr >
															<td><strong>E Pin</strong></td>
															<td><?php echo get_hrm_postmeta($user_id,'pin_no'); ?></td>
														</tr>
														 <tr>
															<td><strong>State</strong></td>
															<td><?php echo get_state_by_id(get_hrm_postmeta($user_id,'state')); ?></td>
														</tr>
														<tr>
															<td><strong>City</strong></td>
															<td><?php echo get_hrm_postmeta($user_id,'city'); ?></td>
														</tr>
                                                       
														<tr >
															<td><strong>Mobile Number</strong></td>
															<td><?php echo get_hrm_postmeta($user_id,'contact'); ?></td>
														</tr>
													
														<tr>
															<td><strong>Email</strong></td>
															<td><?php echo get_hrm_postmeta($user_id,'email'); ?></td>
														</tr>
														<tr>
															<td><strong>Date of Birth </strong></td>
															<td><?php echo get_hrm_postmeta($user_id,'dob'); ?></td>
														</tr>
													
													

												</table>

												</div>
								</div>
							</div>
							<?php } } ?>
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