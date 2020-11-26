<!DOCTYPE html>
<html lang="en">
<!-- SOFTWARE DEVELOPER-DHEERAJ 
    CONTACT NO . - 9696006233 -->
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php echo "RBW Business"; ?></title>

	
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/login/images/icons/favicon.ico"/>
	
	<!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->

	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		
	<!-- Custom CSS -->
	<link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Custom CSS -->
	<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/front.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/multiselect/multiselect.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!--alerts CSS -->
	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>
	<!--<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>-->
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/extensions/reorder-rows/bootstrap-table-reorder-rows.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/extensions/reorder-rows/bootstrap-table-reorder-rows.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/TableDnD/1.0.3/jquery.tablednd.js"></script>
		
		<script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/extensions/export/bootstrap-table-export.min.js"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/extensions/mobile/bootstrap-table-mobile.min.js"></script>
		<script data-ad-client="ca-pub-9621985279299351" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
		var admin_loc='<?php echo base_url().'Admin_ajax/'; ?>';
		var base_loc='<?php echo base_url().'Admin/'; ?>';
	</script>
	<style>
	        .slide-nav-toggle .fixed-sidebar-left{
	            width: 18% !important;
	        }
	        .slide-nav-toggle .fixed-sidebar-left:hover{
	            width: 18% !important;
	        }
	        .slide-nav-toggle .page-wrapper{
	                width: 82% !important;
	                float:right;
	                left:0px !important;
	        }
	        .fixed-sidebar-left .side-nav li{
	            width:100% !important;
	        }
	        .slide-nav-toggle .fixed-sidebar-left .right-nav-text{
	            opacity:1;
	        }
	        @media only screen and (max-width: 768px) {
              .slide-nav-toggle .fixed-sidebar-left{
	            width: 60% !important;
	        }
	        .slide-nav-toggle .fixed-sidebar-left:hover{
	            width: 60% !important;
	        }
            }
            #toggle_nav_btn{
                display:none !important;
            }
	</style>

</head>

<body onload=display_ct();>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-1-active pimary-color-red slide-nav-toggle sidebar-hover">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap pad_tp_0">
						<a href="javascript:void(0);">
							<h3 style="color:#e05656">RBW Business</h3>
							 <!-- <img style="top:-4px;" class="brand-img wdth top-img" src="<?php echo base_url() ?>assets/uploads_assets/<?php echo get_option('logo'); ?>" alt="brand"> -->
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);" style="color:#000000"><i class="zmdi zmdi-menu"></i></a>
				<!-- <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a> -->
				<!-- <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
			 -->
			</div>
		
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
			
			
				<?php  if($this->session->userdata('hrmtype') == 'admin') { ?>
				<li>
					<a <?php if($title=='Dashboard') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/dashboard"><div class="pull-left"><i class="fa fa-dashboard mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
				
				<!-- <li>
					<a <?php if($title=='Member Dashboard') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/memdashboard"><div class="pull-left"><i class="fa fa-dashboard mr-20"></i><span class="right-nav-text">Member Dashboard</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li> -->
				
				<?php } else{ ?>
				<li>
					<a <?php if($title=='Dashboard') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/dashboard"><div class="pull-left"><i class="fa fa-dashboard mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
				<?php } ?>
				<?php $arr=get_hrm_post($this->session->userdata('userid'));
				if($arr[0]->HRM_STATUS=='1') {
				?>
				<!-- <li>
					<a <?php if($title=='Registration') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/register"><div class="pull-left"><i class="fa fa-group mr-20"></i><span class="right-nav-text">Member Registration</span></div><div class="clearfix"></div></a>
				</li> -->
				<?php } ?>
				<!-- <li><hr class="light-grey-hr mb-10"/></li> -->
				<?php  if($this->session->userdata('hrmtype') != 'admin') { ?>
				<li>
					<a <?php if($title=='Profile Management') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#profile_dr"><div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">Profile Management</span></div><div class="pull-right">
					<span class="badge badge-success bounceIn animation-delay5" style="background-color: #fc8675">5</span></div><div class="clearfix"></div></a>
					<ul id="profile_dr" class="collapse collapse-level-1">
						<li>
							<a <?php if($subpage=='member_view') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/members/member_view"><i class="fa fa-circle <?php if($subpage=='member_view') { echo 'clrred'; } ?>"></i> Profile View</a>
						</li>
						
						<li>
							<a <?php if($subpage=='change_cred') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/members/change_cred"><i class="fa fa-circle <?php if($subpage=='change_cred') { echo 'clrred'; } ?>"></i> Change Credential</a>
						</li>
					    <li>
							<a <?php if($subpage=='kyc_update') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/members/kyc_update"><i class="fa fa-circle <?php if($subpage=='kyc_update') { echo 'clrred'; } ?>"></i> Upload KYC</a>
						</li>
					</ul>
				</li>
				<li>
					<a <?php if($title=='Epin') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="fa fa-shopping-basket mr-20"></i><span class="right-nav-text">E-Pin</span></div><div class="pull-right">
					<span class="badge badge-success bounceIn animation-delay5" style="background-color: #fc8675">6</span></div><div class="clearfix"></div></a>
					<ul id="dashboard_dr" class="collapse collapse-level-1">
					
					<li>
							<a <?php if($subpage=='requestmember') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/requestmember"><i class="fa fa-circle  <?php if($subpage=='requestmember') { echo 'clrred'; } ?>"></i> Purchase E-pin</a>
						</li>

						<!-- <li>
							<a <?php if($subpage=='generateepinwallet') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/generateepinwallet"><i class="fa fa-circle  <?php if($subpage=='generateepinwallet') { echo 'clrred'; } ?>"></i> Generate Epin Wallet</a>
						</li> -->
						
						<li>
							<a <?php if($subpage=='usedmember') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/usedmember"><i class="fa fa-circle  <?php if($subpage=='usedmember') { echo 'clrred'; } ?>"></i> Used E-pin</a>
						</li>
						<li>
							<a  <?php if($subpage=='unusedmember') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/unusedmember"><i class="fa fa-circle  <?php if($subpage=='unusedmember') { echo 'clrred'; } ?>"></i> Unused E-pin</a>
						</li>
						
					
						<li>
							<a <?php if($subpage=='transferepin') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/transferepin"><i class="fa fa-circle  <?php if($subpage=='transferepin') { echo 'clrred'; } ?>"></i> Transfer E-pin</a>
						</li>
						<li>
							<a <?php if($subpage=='transferhistory') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/transferhistory"><i class="fa fa-circle  <?php if($subpage=='transferhistory') { echo 'clrred'; } ?>"></i> Transfer History</a>
						</li>
						
						<li>
							<a <?php if($subpage=='recievehistory') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/recievehistory"><i class="fa fa-circle  <?php if($subpage=='recievehistory') { echo 'clrred'; } ?>"></i> Receive History</a>
						</li>
					
					</ul>
				</li>
				
				<?php  } else { ?>
				<li>
					<a <?php if($title=='Profile Management') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#profile_dr"><div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">Members</span></div><div class="pull-right">
					<span class="badge badge-success bounceIn animation-delay5" style="background-color: #fc8675">5</span></div><div class="clearfix"></div></a>
					<ul id="profile_dr" class="collapse collapse-level-1">
						<li>
							<a <?php if($subpage=='member_view') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/members/member_view"><i class="fa fa-circle <?php if($subpage=='member_view') { echo 'clrred'; } ?>"></i> Member View</a>
						</li>
						<!-- <li>
							<a  <?php if($subpage=='search_member') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/members/search_member"><i class="fa fa-circle <?php if($subpage=='search_member') { echo 'clrred'; } ?>"></i> Search Member</a>
						</li> -->

						<li>
							<a <?php if($subpage=='member_registered') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/members/member_registered"><i class="fa fa-circle <?php if($subpage=='member_registered') { echo 'clrred'; } ?>"></i> Registered Users</a>
						</li>
						<li>
							<a <?php if($subpage=='change_cred') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/members/change_cred"><i class="fa fa-circle <?php if($subpage=='change_cred') { echo 'clrred'; } ?>"></i> Change Credential</a>
						</li>
						<li>
							<a <?php if($subpage=='act_deact') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/members/act_deact"><i class="fa fa-circle <?php if($subpage=='act_deact') { echo 'clrred'; } ?>"></i> Activate / Deactivate</a>
						</li>
					    <li>
							<a <?php if($subpage=='kyc_dt') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/members/kyc_dt"><i class="fa fa-circle <?php if($subpage=='kyc_dt') { echo 'clrred'; } ?>"></i> KYC Details</a>
						</li>
					</ul>
				</li>
				<li>
					<a <?php if($title=='Epin') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="fa fa-shopping-basket mr-20"></i><span class="right-nav-text">E-Pin</span></div><div class="pull-right">
					<span class="badge badge-success bounceIn animation-delay5" style="background-color: #fc8675">6</span></div><div class="clearfix"></div></a>
					<ul id="dashboard_dr" class="collapse collapse-level-1">
						<li>
							<a <?php if($subpage=='generate') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/generate"><i class="fa fa-circle <?php if($subpage=='generate') { echo 'clrred'; } ?>"></i> Generate E-pin</a>
						</li>
						<li>
							<a  <?php if($subpage=='request') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/request"><i class="fa fa-circle <?php if($subpage=='request') { echo 'clrred'; } ?>"></i> E-pin Requests</a>
						</li>
							<li>
							<a  <?php if($subpage=='requestrecord') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/requestrecord"><i class="fa fa-circle <?php if($subpage=='requestrecord') { echo 'clrred'; } ?>"></i> Requests Record</a>
						</li>
						<li>
							<a  <?php if($subpage=='sendrecord') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/sendrecord"><i class="fa fa-circle <?php if($subpage=='sendrecord') { echo 'clrred'; } ?>"></i> Send Record</a>
						</li>
						<!--
						<li>
							<a <?php if($subpage=='search') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/search"><i class="fa fa-circle <?php if($subpage=='search') { echo 'clrred'; } ?>"></i> Search E-pin</a>
						</li>
						-->
						<li>
							<a <?php if($subpage=='unused') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/unused"><i class="fa fa-circle <?php if($subpage=='unused') { echo 'clrred'; } ?>"></i> Unused E-pin</a>
						</li>
						<li>
							<a <?php if($subpage=='used') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/epin/used"><i class="fa fa-circle <?php if($subpage=='used') { echo 'clrred'; } ?>"></i> Used E-pin</a>
						</li>
					</ul>
				
				</li>
				<?php } ?>

				<?php  if($this->session->userdata('hrmtype') == 'admin') { ?>
				
				<li>
					<a <?php if($title=='Topup') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/topup"><div class="pull-left"><i class="fa fa-shopping-bag mr-20"></i><span class="right-nav-text">Topup</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>

				<?php  } ?>
				<!-- <li>
					<a <?php if($title=='Free Single Geneology') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/free_single_tree"><div class="pull-left"><i class="fa fa-sitemap mr-20"></i><span class="right-nav-text">Free Single Geneology</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li> -->
				
				<?php	
				if($arr[0]->HRM_STATUS=='1' && $arr[0]->PAY_STATUS=='1') {
				?>
				<!--
				<li>
					<a <?php if($title=='Single View') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/single_tree"><div class="pull-left"><i class="fa fa-sitemap mr-20"></i><span class="right-nav-text">Single Geneology</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
				-->
				<!-- <li>
					<a <?php if($title=='Tree View') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/view_tree"><div class="pull-left"><i class="fa fa-tree mr-20"></i><span class="right-nav-text">Silver Geneology</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li> -->

				

				<li>
					<a <?php if($title=='Tree View') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#genealogy_tr"><div class="pull-left"><i class="fa fa-tree mr-20"></i><span class="right-nav-text">Genealogy</span></div><div class="pull-right">
						<span class="badge badge-success bounceIn animation-delay5" style="background-color: #fc8675">1</span></div><div class="clearfix"></div></a>
					<ul id="genealogy_tr" class="collapse collapse-level-1">
						<li>
							<a <?php if($subpage=='member_tree') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/view_tree"><i class="fa fa-circle <?php if($subpage=='member_tree') { echo 'clrred'; } ?>"></i> Member Tree View</a>
						</li>
						<?php  if($this->session->userdata('hrmtype') != 'admin') { ?>
						<li>
							<a <?php if($subpage=='member_registered') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/members/member_registered"><i class="fa fa-circle <?php if($subpage=='member_registered') { echo 'clrred'; } ?>"></i> Registered Users</a>
						</li>
						<?php } ?>
					
					</ul>
				</li>


			
				<!-- <li>
					
				    <a <?php if($title=='STAR VIEW') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#star_dr"><div class="pull-left"><i class="fa fa-tree mr-20"></i><span class="right-nav-text">Star Geneology</span></div><div class="pull-right">
					<span class="badge badge-success bounceIn animation-delay5" style="background-color: #fc8675">3</span></div><div class="clearfix"></div></a>
					<ul id="star_dr" class="collapse collapse-level-1">
					
						<li>
							<a <?php if($subpage=='star') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/star"><i class="fa fa-circle <?php if($subpage=='star') { echo 'clrred'; } ?>"></i> Star</a> 
						</li> -->
						
						<!-- <li>
							<a  <?php if($subpage=='double_star') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/double_star"><i class="fa fa-circle <?php if($subpage=='double_star') { echo 'clrred'; } ?>"></i> Double Star</a>
						</li>

					
				
						<li>
					<a <?php if($subpage=='triple_star') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/tripleStar_list"><i class="fa fa-circle <?php if($subpage=='triple_star') { echo 'clrred'; } ?>"></i> Triple Star</a>
				</li>	
-->
				<li>
					<a <?php if($subpage=='autopool') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/autopool_list"><i class="fa fa-circle <?php if($subpage=='autopool') { echo 'clrred'; } ?>"></i> Travelpool</a>
				</li>	 

						<!-- </ul>
				</li> -->

			
				
				<?php $s=0; if($s == 1){ ?>
				
				<li>
					
				    <a <?php if($title=='AUTO POOL VIEW') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#pool_dr"><div class="pull-left"><i class="fa fa-tree mr-20"></i><span class="right-nav-text">Auto Pool Geneology</span></div><div class="pull-right">
					<span class="badge badge-success bounceIn animation-delay5" style="background-color: #fc8675">2</span></div><div class="clearfix"></div></a>
					<ul id="pool_dr" class="collapse collapse-level-1">
						<?php if(get_count_hrm_track_for_autopool($arr[0]->HRM_ID,2,3)==1) { ?>
						<li>
							<a <?php if($subpage=='Auto Pool 5') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/autopool/5"><i class="fa fa-circle <?php if($subpage=='Auto Pool 5') { echo 'clrred'; } ?>"></i> Silver</a> 
						</li>
						<?php } if(get_count_hrm_track_for_autopool($arr[0]->HRM_ID,3,3)==1) {  ?>
						<li>
							<a  <?php if($subpage=='Auto Pool 6') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/autopool/6"><i class="fa fa-circle <?php if($subpage=='Auto Pool 6') { echo 'clrred'; } ?>"></i> Gold</a>
						</li>
						<?php } if(get_count_hrm_track_for_autopool($arr[0]->HRM_ID,1,7)==1) {  ?>
							<li>
							<a  <?php if($subpage=='Auto Pool 7') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/autopool/7"><i class="fa fa-circle <?php if($subpage=='Auto Pool 7') { echo 'clrred'; } ?>"></i> Diamond</a>
						</li>
						<?php } if(get_count_hrm_track_for_autopool($arr[0]->HRM_ID,1,8)==1) {  ?>
						<li>
							<a  <?php if($subpage=='Auto Pool 8') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/autopool/8"><i class="fa fa-circle <?php if($subpage=='Auto Pool 8') { echo 'clrred'; } ?>"></i> Double Diamond</a>
						</li>
						<?php } if(get_count_hrm_track_for_autopool($arr[0]->HRM_ID,1,9)==1) {  ?>
						<li>
							<a <?php if($subpage=='Auto Pool 9') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/autopool/9"><i class="fa fa-circle <?php if($subpage=='Auto Pool 9') { echo 'clrred'; } ?>"></i> Black Diamond</a>
						</li>
						<?php } ?>
						<?php if(get_count_hrm_track_for_autopool($arr[0]->HRM_ID,1,10)==1) {  ?>
						<li>
							<a <?php if($subpage=='Auto Pool 10') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/autopool/10"><i class="fa fa-circle <?php if($subpage=='Auto Pool 10') { echo 'clrred'; } ?>"></i> Royal Diamond</a>
						</li>
						<?php } ?>
					</ul>
				</li>
				<?php } }  ?>
				<!--
				<li>
					<a <?php if($title=='Total Member List') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/downlist_member"><div class="pull-left"><i class="fa fa-arrow-circle-down mr-20"></i><span class="right-nav-text">Total Down (Monoline)</span></div><div class="clearfix"></div></a>
				</li>
				-->
				<!-- <li>
					<a <?php if($title=='Total Matrix Member List') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/downlist_member_matrix"><div class="pull-left"><i class="fa fa-arrow-circle-down mr-20"></i><span class="right-nav-text">Total Down (Matrix)</span></div><div class="clearfix"></div></a>
				</li> -->
				<?php  if($this->session->userdata('hrmtype') != 'admin') { ?>
				
    				<li>
    					<a <?php if($title=='Direct Member List') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/directmemberlist"><div class="pull-left"><i class="fa fa-level-down mr-20"></i><span class="right-nav-text">Direct Downline</span></div><div class="clearfix"></div></a>
    				</li>
    				
				<?php } ?>
				<!--
				<li>
					<a <?php if($title=='My Plan') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/myplan"><div class="pull-left"><i class="fa fa-tasks mr-20"></i><span class="right-nav-text">My Plan</span></span></div><div class="clearfix"></div></a>
				</li>
				-->
				<?php  if($this->session->userdata('hrmtype') != 'admin') { ?>
				<!--
				<li>
					<a <?php if($title=='My Achieve Level') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/myachievelevel"><div class="pull-left"><i class="fa fa-check-circle mr-20"></i><span class="right-nav-text">My Achieve level</span></span></div><div class="clearfix"></div></a>
				</li>
				-->
				<?php } ?>
				
				
				<?php  if($this->session->userdata('hrmtype') == 'admin') { ?>
					<li>
					<a <?php if($title=='Product') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#product_dr"><div class="pull-left"><i class="fa fa-cart-plus mr-20"></i><span class="right-nav-text">Product</span></div><div class="pull-right">
					<span class="badge badge-success bounceIn animation-delay5" style="background-color: #fc8675">3</span></div><div class="clearfix"></div></a>
					<ul id="product_dr" class="collapse collapse-level-1">
						<li>
							<a <?php if($subpage=='add_category') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/add_category">
							<i class="fa fa-circle  <?php if($subpage=='add_category') { echo 'clrred'; } ?>"></i> Add Category</a>
						</li>
						<li>
							<a  <?php if($subpage=='add_subcategory') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/add_subcategory">
							<i class="fa fa-circle  <?php if($subpage=='add_subcategory') { echo 'clrred'; } ?>"></i> Add Subcategory</a>
						</li>

						<li>
							<a  <?php if($subpage=='add_product') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/add_product"><i class="fa fa-circle  <?php if($subpage=='add_product') { echo 'clrred'; } ?>"></i> Add Product</a>
						</li>
					
						</li>
					</ul>
				</li>


				<!-- <li>
					<a <?php if($title=='Franchise') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#franchise_dr"><div class="pull-left"><i class="fa fa-users mr-20"></i><span class="right-nav-text">Franchise</span></div><div class="pull-right">
					<span class="badge badge-success bounceIn animation-delay5" style="background-color: #fc8675">1</span></div><div class="clearfix"></div></a>
					<ul id="franchise_dr" class="collapse collapse-level-1">
						<li>
							<a <?php if($subpage=='add_franchise') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/add_franchise">
							<i class="fa fa-circle  <?php if($subpage=='add_franchise') { echo 'clrred'; } ?>"></i> Add Franchise</a>
						</li>
					
					
						</li>
					</ul>
				</li> -->




				<li>
					<a <?php if($title=='Manage Income') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#income_dr"><div class="pull-left"><i class="fa fa-cart-plus mr-20"></i><span class="right-nav-text">Manage Income</span></div><div class="pull-right">
					<span class="badge badge-success bounceIn animation-delay5" style="background-color: #fc8675">4</span></div><div class="clearfix"></div></a>
					<ul id="income_dr" class="collapse collapse-level-1">

				     	<li>
							<a <?php if($subpage=='direct_income') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/direct_income">
							<i class="fa fa-circle  <?php if($subpage=='direct_income') { echo 'clrred'; } ?>"></i>Direct Income</a>
						</li>

						<li>
							<a <?php if($subpage=='referal_income') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/referal_income">
							<i class="fa fa-circle  <?php if($subpage=='referal_income') { echo 'clrred'; } ?>"></i>Pair Income</a>
						</li>
						<!-- <li>
							<a <?php if($subpage=='team_bonus') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/team_bonus">
							<i class="fa fa-circle  <?php if($subpage=='team_bonus') { echo 'clrred'; } ?>"></i> Income</a>
						</li> -->
						<!-- <li>
							<a  <?php if($subpage=='star_bonus') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/star_bonus">
							<i class="fa fa-circle  <?php if($subpage=='star_bonus') { echo 'clrred'; } ?>"></i> Star Bonus</a>
						</li>

						<li>
							<a  <?php if($subpage=='doublestar_bonus') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/doublestar_bonus">
							<i class="fa fa-circle  <?php if($subpage=='doublestar_bonus') { echo 'clrred'; } ?>"></i> Silver Bonus</a>
						</li>

						<li>
							<a  <?php if($subpage=='triplestar_bonus') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/triplestar_bonus">
							<i class="fa fa-circle  <?php if($subpage=='triplestar_bonus') { echo 'clrred'; } ?>"></i> Gold Bonus</a>
						</li> -->

						<li>
							<a  <?php if($subpage=='autopool_bonus') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/autopool_bonus">
							<i class="fa fa-circle  <?php if($subpage=='autopool_bonus') { echo 'clrred'; } ?>"></i> Travelpool Bonus</a>
						</li>
					
						</li>
					</ul>
				</li>

				<li>
					<a <?php if($title=='Package | RMGM') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/package"><div class="pull-left"><i class="fa fa-shopping-cart mr-20"></i><span class="right-nav-text">Packages</span></div><div class="clearfix"></div></a>
				</li>
			    <li>
					<a <?php if($title=='Manual Payout | RMGM') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/manualpayout"><div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">Manual Payout</span></div><div class="clearfix"></div></a>
				</li>
			    <li>
					<a <?php if($title=='Withdrawl Request') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/withdrawlreq"><div class="pull-left"><i class="fa fa-paper-plane mr-20"></i><span class="right-nav-text">Withdrawl Request</span></div><div class="clearfix"></div></a>
				</li>
			    
			    <!-- <li>
					<a <?php if($title=='All Team Business | RMGM') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/teambusiness"><div class="pull-left"><i class="fa fa-briefcase mr-20"></i><span class="right-nav-text">All Team Business</span></div><div class="clearfix"></div></a>
				</li> -->
				<li>
					<a <?php if($title=='Member Bank Detail | RMGM') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/bankdetail"><div class="pull-left"><i class="fa fa-bank mr-20"></i><span class="right-nav-text">Member Bank Detail</span></div><div class="clearfix"></div></a>
				</li>
				<!--
				<li>
					<a <?php if($title=='Payout') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#payout_dr"><div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">Payout</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="payout_dr" class="collapse collapse-level-1">
						<li>
							<a <?php if($subpage=='release') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/payout/release"><i class="fa fa-circle <?php if($subpage=='release') { echo 'clrred'; } ?>"></i> Release</a>
						</li>
						<?php if(get_option('autorelease')==0){ ?>
						<li>
							<a <?php if($subpage=='cnfrm_transfer') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/payout/cnfrm_transfer"><i class="fa fa-circle <?php if($subpage=='cnfrm_transfer') { echo 'clrred'; } ?>"></i> Confirm Transfer</a>
						</li>
					    <?php } ?>
					</ul>
				</li>
				-->
				<li>
					<a <?php if($title=='Reports') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#report_dr"><div class="pull-left"><i class="fa fa-bar-chart mr-20"></i><span class="right-nav-text">Reports</span></div><div class="pull-right">
					<span class="badge badge-success bounceIn animation-delay5" style="background-color: #65cea7">6</span></div><div class="clearfix"></div></a>
					<ul id="report_dr" class="collapse collapse-level-1">
						<li>
							<a <?php if($subpage=='profile') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/report/profile"><i class="fa fa-circle <?php if($subpage=='profile') { echo 'clrred'; } ?>"></i> Profile Report</a>
						</li>
						<li>
							<a <?php if($subpage=='joining') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/report/joining"><i class="fa fa-circle <?php if($subpage=='joining') { echo 'clrred'; } ?>"></i> Joining Report</a>
						</li>
						<li>
							<a <?php if($subpage=='downlinereport') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/report/downlinereport"><i class="fa fa-circle <?php if($subpage=='downlinereport') { echo 'clrred'; } ?>"></i> Downline Report</a>
						</li>
						<li>
							<a <?php if($subpage=='commission') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/report/commission"><i class="fa fa-circle <?php if($subpage=='commission') { echo 'clrred'; } ?>"></i> Commission Report</a>
						</li>
							<li>
							<a <?php if($subpage=='payout_release') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/report/payout_release"><i class="fa fa-circle <?php if($subpage=='payout_release') { echo 'clrred'; } ?>"></i> Payout Released</a>
						</li>
						<li>
							<a <?php if($subpage=='sales') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/report/sales_report"><i class="fa fa-circle <?php if($subpage=='sales') { echo 'clrred'; } ?>"></i> Sales Report</a>
						</li>
					</ul>
				</li>
				<li>
					<a <?php if($title=='Settings') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#setting_dr"><div class="pull-left"><i class="fa fa-cog mr-20"></i><span class="right-nav-text">Settings</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="setting_dr" class="collapse collapse-level-1">
        				<li>
        					<a <?php if($title=='Content Management') { ?> class="active" <?php } ?> href="<?php echo base_url(); ?>admin/settings/content_management"><i class="fa fa-circle  <?php if($subpage=='Content Management') { echo 'clrred'; } ?>"></i> Content Management</a>
        				</li>
        				<li>
        					<a <?php if($title=='Company Profile') { ?> class="active" <?php } ?> href="<?php echo base_url(); ?>admin/settings/comp_profile"><i class="fa fa-circle  <?php if($subpage=='Company Profile') { echo 'clrred'; } ?>"></i> Company Profile</a>
        				</li>
					</ul>
				</li>
				
				<li>
					<a <?php if($title=='Activity History') { ?> class="actived" <?php } ?> href="<?php echo base_url(); ?>admin/activity_history"><div class="pull-left"><i class="fa fa-calendar mr-20"></i><span class="right-nav-text">Activity History</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
				<?php } ?>
				<?php  if($this->session->userdata('hrmtype') != 'admin') { ?>
				
				<li>
					<a <?php if($title=='Reports') { ?> class="actived" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#report_dr"><div class="pull-left"><i class="fa fa-money mr-20"></i><span class="right-nav-text">Income Details</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="report_dr" class="collapse collapse-level-1">
						<li>
							<a <?php if($subpage=='eincmome') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/report/earned_income"><i class="fa fa-circle <?php if($subpage=='eincmome') { echo 'clrred'; } ?>"></i> Earned Income</a>
						</li>
						
						<li>
							<a <?php if($subpage=='rincome') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/report/released_income"><i class="fa fa-circle <?php if($subpage=='rincome') { echo 'clrred'; } ?>"></i> Released Income</a>
						</li>

						<li>
							<a <?php if($subpage=='transaction') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/memberwallet/transaction"><i class="fa fa-circle <?php if($subpage=='transaction') { echo 'clrred'; } ?>"></i> Daily Payout Detail</a>
						</li>
<!-- 						
						<li>
							<a <?php if($subpage=='ewalletsummary') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/memberwallet/ewalletsummary"><i class="fa fa-circle <?php if($subpage=='ewalletsummary') { echo 'clrred'; } ?>"></i> E-Wallet Summary</a>
						</li> -->
						
						<li>
							<a <?php if($subpage=='withdrawfund') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/memberwallet/withdrawfund"><i class="fa fa-circle <?php if($subpage=='withdrawfund') { echo 'clrred'; } ?>"></i> My Wallet</a>
						</li>
						<li>
							<a <?php if($subpage=='withdrawlreq') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/memberwallet/withdrawlreq"><i class="fa fa-circle <?php if($subpage=='withdrawlreq') { echo 'clrred'; } ?>"></i> My Withdrawl Req</a>
						</li>
						
					
				    </ul>
				</li>
			
				<!--
				<li>
					<a <?php if($title=='E-Wallet') { ?> class="active" <?php } ?> href="javascript:void(0);" data-toggle="collapse" data-target="#wallet_dr"><div class="pull-left"><i class="fa fa-suitcase mr-20"></i><span class="right-nav-text">E-Wallet</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="wallet_dr" class="collapse collapse-level-1">
						<li>
							<a <?php if($subpage=='ewalletsummary') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/memberwallet/ewalletsummary"><i class="fa fa-circle <?php if($subpage=='ewalletsummary') { echo 'clrred'; } ?>"></i> E-Wallet Summary</a>
						</li>
						<li>
							<a <?php if($subpage=='transaction') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/memberwallet/transaction"><i class="fa fa-circle <?php if($subpage=='transaction') { echo 'clrred'; } ?>"></i> Transactions</a>
						</li>
					    <li>
							<a <?php if($subpage=='ewalletcredit') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/memberwallet/ewalletcredit"><i class="fa fa-circle <?php if($subpage=='ewalletcredit') { echo 'clrred'; } ?>"></i> E-Wallet Credit</a>
						</li>
						<li>
							<a <?php if($subpage=='ewalletdebit') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/memberwallet/ewalletdebit"><i class="fa fa-circle <?php if($subpage=='ewalletdebit') { echo 'clrred'; } ?>"></i> E-Wallet Debit</a>
						</li>
						<li>
							<a <?php if($subpage=='withdrawfund') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/memberwallet/withdrawfund"><i class="fa fa-circle <?php if($subpage=='withdrawfund') { echo 'clrred'; } ?>"></i> Withdraw Fund</a>
						</li>
						<li>
							<a <?php if($subpage=='depositfund') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/memberwallet/depositfund"><i class="fa fa-circle <?php if($subpage=='depositfund') { echo 'clrred'; } ?>"></i> Deposit Fund</a>
						</li>
						<li>
							<a <?php if($subpage=='withdrawlreq') { ?> class="active active-page" <?php } ?> href="<?php echo base_url(); ?>admin/memberwallet/withdrawlreq"><i class="fa fa-circle <?php if($subpage=='withdrawlreq') { echo 'clrred'; } ?>"></i> My Withdrawl Req</a>
						</li>
					</ul>
				</li>
				-->
			    <?php } ?>
			    <li>
					<a <?php if($title=='Logout') { ?> class="active" <?php } ?> href="<?php echo base_url(); ?>admin/logout"><div class="pull-left"><i class="fa fa-key mr-20"></i><span class="right-nav-text">logout</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
		<script>
    	    (function($) {
                var $window = $(window),
                    $html = $('.wrapper');
            
                function resize() {
                    if ($window.width() < 768) {
                       $html.removeClass('slide-nav-toggle');
                       $html.removeClass('sidebar-hover');
                       $('#toggle_nav_btn').attr('style','display:inline-block !important;')
                    }
                }
            
                $window
                    .resize(resize)
                    .trigger('resize');
            })(jQuery);
    	</script>
		
		
		<!-- /Right Setting Menu -->
		
		<!-- Right Sidebar Backdrop -->
		<div class="right-sidebar-backdrop"></div>
		<!-- /Right Sidebar Backdrop -->