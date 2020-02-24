<link rel="stylesheet" href="<?php echo base_url(); ?>assets/treejscss/styles-tree.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/treejscss/custom-tree.css"/>
<link href="<?php echo base_url(); ?>assets/treejscss/prettify-tree.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/treejscss/style_tooltip.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/treejscss/jquery.tree.js"></script>
<script src="<?php echo base_url() ?>assets/js/zoom.js"></script>
<script src = "<?php echo base_url(); ?>assets/treejscss/easyTooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/treejscss/jquery.scroll.tree.js"></script>
<style>
	#tree table{
		width:100% !important;
	}
	.tree_icon{
	        border: 1px solid #d8cccc;
            padding: 4px;
            box-shadow: 0px 0px 12px 0px #d0cccc;
           
	}
	.summary{
	    margin-top:20px;
	     
	    margin-bottom:20px;
	}
	.tree_up_icon{
	    margin-left: 25px !important;
	}
	.jOrgChart .node{
	       min-width: 300px;
	}
	.jOrgChart .username{
	    padding:25px 0px !important;
	    border-radius:25px;
	}
	.jOrgChart .tree_icon {
        height: 70px !important;
        width: 70px !important;
	}
	.red-tooltip + .tooltip > .tooltip-inner {background-color: #f00;}
    .red-tooltip + .tooltip > .tooltip-arrow { border-bottom-color:#f00; }
</style>
<?php
//$nodes=get_nodes_geneology(5001);
//print_r($nodes);
?>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
				    
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark"><i class="fa fa-sitemap"></i>FREE SINGLE TREE VIEW</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 gen">
                                    <button class="zoomIn btn btn-success"><span class="glyphicon glyphicon-zoom-in" style="font-size:15px"></span></button>
                                    <button class="zoomOut btn btn-primary"><span class="glyphicon glyphicon-zoom-out" style="font-size:15px"></span></button>
                                    <button class="zoomOff btn btn-default"><span class="glyphicon glyphicon-off" style="font-size:15px"></span></button>
                                </div>
							</div>
							<div class="row" style="margin-top:20px;">
							   
							    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 padding-top-icon ">
                                        <img src="<?php echo  base_url(); ?>assets/img/active.png" style="border:hidden" title="Paid" align="absmiddle" width="40px" height="40px"><b>Active</b>&nbsp;&nbsp;&nbsp;
                                        <!--<img src="<?php echo  base_url(); ?>assets/img/inactive.png" style="border:hidden" title="Not Paid" align="absmiddle" width="40px" height="40px"><b>Inactive</b>&nbsp;&nbsp;&nbsp;-->
                                        <img src="<?php echo  base_url(); ?>assets/img/add.png" style="border:hidden" title="New One" align="absmiddle" width="40px" height="40px">&nbsp;<b>Vacant</b>&nbsp;&nbsp;&nbsp; 
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 padding-top-icon text-right">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-6 col-xs-offset-3 col-xs-6">
                                                <input type="text" name="search" class="form-control searchno" placeholder="Search here by user id">
                                                <label class='err' style="color:red;font-size:12px;"></label>
                                            </div>
                                             <div class="col-md-3 text-left col-xs-3">
                                                <button type="button" class="btn btn-primary search">Search</button>
                                            </div>
                                        </div>
                                </div>
                                 
							</div>
							<div id="loader-div" style="z-index:9999;text-align: center;display: none;left: 56%;"><img src="<?php echo base_url(); ?>assets/img/loaders.gif"/></div>
							<div class="row text-center summary act_exp">
							   
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
  <script>
       
     var userid='<?php echo get_option('last_paid'); ?>';   
        
       
    getGenologyTree(userid, null);
    $(document).ready(function () {        
        $('[data-toggle="tooltip"]').tooltip();
        
        $('.search').click(function (){
            var seach_no=$('.searchno').val();
         
            $.ajax({
                type: "POST",
                url: admin_loc+'check_sposonrs_id_single',
               
                data: {
                    check_id:seach_no
                },success: function(data) {
                    if(data==1){
                        $('.err').html('');
                        getGenologyTree($('.searchno').val(), event);
                        $('.searchno').val('');
                    }else{
                        $('.err').html('Invalid Id entered');
                    }
                }
     
             });
        });
    });
    
    function getGenologyTree(user_name, event)
    {
      
       $('.summary').html('');
        $.ajax({
            type: "POST",
            url: admin_loc+'free_single_tree',
           
            data: {
                user_id: user_name
            },
           beforeSend: function() {
               
                if (event) {
                    var x = event.clientX;     // Get the horizontal coordinate
                    var y = event.clientY;     // Get the vertical coordinate
                    var position = "fixed";
                    //alert(x+"--"+y);
                    var d = document.getElementById('loader-div');
                    d.style.position = position;
                    d.style.left = x;
                    d.style.top = y;
                    $('#loader-div').show();
                    
                }
            },
            success: function(data) {
                $('.summary').html(data);
                $('#loader-div').hide();
                $('#tree_view').jOrgChart({
        			  chartElement: '#tree',
                      dragAndDrop: false
            	});
                $("a").tooltip();
              
                //$(".summary").load(" .summary");
                //Uncomment the following code to Focus on ROOT USER OF THE TREE//
                 /*var tree_window_size = $("#tree_div").width();
                 var box_size = $("#summary").width();
                 
                 var x = tree_window_size / 2 - box_size / 2; 
                 var y = 0;
                 
                 $("#summary").scrollTo(x, y);
                 
                 $('#summary').animate({
                 'scrollTop': $("#chart").position().top
                 }, '100');*/
            }
        });
        
    }

</script>