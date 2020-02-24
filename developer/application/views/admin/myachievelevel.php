<script>
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
									<h1 class="panel-title txt-dark"><i class="fa fa-tasks"></i> MY ACHIEVE LEVEL</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="text-right">
							    <button type='button' id='btn' class="btn btn-primary" onclick='printDiv();'><i class="fa fa-print"></i> Print</button>
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
    							<div style="overflow-x: auto;">
        							<h3 class="text-center">Gold Team Member (Single Leg Pool)</h3>
        							<table class="table table-striped table-bordered mrg_tp_25">
        							    <thead>
        							        <tr>
        							            <th rowspan="2">LEVEL</th>
        							            <th rowspan="2">REQ. MEMBER</th>
        							            <th rowspan="2">ACHIEVE MEMBER</th>
        							            <th colspan="3"><center>REQ. DIRECT MEMBER</center></th>
        							            <th colspan="3"><center>ACHEIVE DIRECT MEMBER</center></th>
        							            <th rowspan="2">INCOME</th>
        							            <th rowspan="2">ACHIEVE INCOME</th>
        							            <th colspan="3"><center>Charges</center></th>
        							            <th rowspan="2">TOTAL INCOME</th>
        							            <th rowspan="2">TOTAL ACHEIVE INCOME</th>
        							            <th rowspan="2">NEW PRODUCT PURCHASE CHARGE</th>
        							            <th rowspan="2">PAYMENT</th>
        							            <th rowspan="2">ACHIEVE PAYMENT</th>
        							        </tr>
        							        <tr>
        							            <th>Self ID</th>
        							            <th>Other Id</th>
        							            <th>Total Id</th>
        							            <th>Self ID</th>
        							            <th>Other Id</th>
        							            <th>Total Id</th>
        							            <th>Admin 10%</th>
        							            <th>TDS 10%</th>
        							            <th>TOTAL 20%</th>
        							        </tr>
        							    </thead>
        							    <tbody>
        							        <?php $arr_plan=myplan(1);
        							        $stage_level=get_hrm_postmeta($this->session->userdata('userid'),'mlm_plan_desc');
    							            $stagewise_sponsor_level=get_hrm_postmeta($this->session->userdata('userid'),'level');
        							        $self=0;
        							        $other=0;
        							        $total_id=0;
        							        $inc=0;
        							        $admin_carge=0;$tds_charge=0;$total_charge=0;$final_amt=0;$after_product=0;$full_product=0;$count_node=0;
        							        $count_node_achieve=0;$self_achieve=0;$other_achieve=0;$total_achieve=0;$income_achieve=0;$netincome_achieve=0;$final_achieve=0;
        							            foreach($arr_plan as $plan1){
        							                $product=0;
        							                $charge=explode(',',$plan1->LEVEL_CHARGE_ID);
        							                foreach($charge as $charges){
        							                    if($charges!=1 && $charges!=2){
            							                    $arr=get_charges_mlm($charges);
            							                    $product=$arr[0]->AMOUNT;
        							                    }
        							                }
        							                if($stage_level==3){
        							        ?>
        							        <tr>
        							            <td><?php echo $plan1->LEVELS; ?></td>
        							            <td><?php if($plan1->COUNT_NODES!=0) { echo $count_node=$plan1->COUNT_NODES; } else { echo "You"; } ?></td>
        							            <!-- achieve member -->
        							            <td><?php if($plan1->COUNT_NODES!=0) { echo $count_node=$plan1->COUNT_NODES; } else { echo "You"; } ?></td>
        							            
        							            <td><?php $self+=$plan1->SELF_ID; echo $plan1->SELF_ID; ?></td>
        							            <td><?php $other+=$plan1->OTHER_ID; echo $plan1->OTHER_ID; ?></td>
        							            <td><?php $total_id+=$plan1->SELF_ID+$plan1->OTHER_ID; echo $plan1->SELF_ID+$plan1->OTHER_ID; ?></td>
        							            <!-- achieve direct ids -->
        							            <td><?php echo $plan1->SELF_ID; ?></td>
        							            <td><?php echo $plan1->OTHER_ID; ?></td>
        							            <td><?php echo $plan1->SELF_ID+$plan1->OTHER_ID; ?></td>
        							            
        							            <td><?php $inc+=$plan1->AMOUNT; echo $plan1->AMOUNT; ?></td>
        							            <!-- achieve income -->
        							            <td><?php echo $plan1->AMOUNT; ?></td>
        							            
        							            <td><?php $admin_carge+=(($plan1->AMOUNT)*10)/100; echo (($plan1->AMOUNT)*10)/100; ?></td>
        							            <td><?php $tds_charge+=(($plan1->AMOUNT)*10)/100; echo (($plan1->AMOUNT)*10)/100; ?></td>
        							            <td><?php $total_charge+=(($plan1->AMOUNT)*20)/100; echo (($plan1->AMOUNT)*20)/100; ?></td>
        							            
        							            <td><?php $final_amt+=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; echo $final=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; ?></td>
        							             <!-- total achieve income -->
        							            <td><?php echo $final=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; ?></td>
        							            <td><?php  echo $product;  $full_product+=$product;  ?></td>
        							            
        							            <td><?php $after_product+=$final-$product; echo $final-$product; ?></td>
        							             <!-- total achieve payment -->
        							            <td><?php echo $final-$product; ?></td>
        							        </tr>
        							        <?php } else{ 
        							        ?>
        							        <tr>
        							            <td><?php echo $plan1->LEVELS; ?></td>
        							            <td><?php if($plan1->COUNT_NODES!=0) { echo $count_node=$plan1->COUNT_NODES; } else { echo "You"; } ?></td>
        							            <!-- achieve member -->
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ if($plan1->COUNT_NODES!=0) {  $count_node_achieve+=$plan1->COUNT_NODES; echo $plan1->COUNT_NODES;  } else { $count_node_achieve+=0; echo "You"; } } else { $count_node_achieve+=0; echo '-'; }  ?></td>
        							            
        							            <td><?php $self+=$plan1->SELF_ID; echo $plan1->SELF_ID; ?></td>
        							            <td><?php $other+=$plan1->OTHER_ID; echo $plan1->OTHER_ID; ?></td>
        							            <td><?php $total_id+=$plan1->SELF_ID+$plan1->OTHER_ID; echo $plan1->SELF_ID+$plan1->OTHER_ID; ?></td>
        							            <!-- achieve direct ids -->
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ $self_achieve+=$plan1->SELF_ID; echo $plan1->SELF_ID; } else { $self_achieve+=0; echo '-'; }  ?></td>
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){  $other_achieve+=$plan1->OTHER_ID; echo $plan1->OTHER_ID; } else { $other_achieve+=0; echo '-'; }  ?></td>
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ $total_achieve+=$plan1->SELF_ID+$plan1->OTHER_ID; echo $plan1->SELF_ID+$plan1->OTHER_ID; } else { $total_achieve+=0; echo '-'; }  ?></td>
        							            
        							            <td><?php $inc+=$plan1->AMOUNT; echo $plan1->AMOUNT; ?></td>
        							            <!-- achieve income -->
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ $income_achieve+=$plan1->AMOUNT; echo $plan1->AMOUNT; } else { $income_achieve+=0; echo '-'; } ?></td>
        							            
        							            <td><?php $admin_carge+=(($plan1->AMOUNT)*10)/100; echo (($plan1->AMOUNT)*10)/100; ?></td>
        							            <td><?php $tds_charge+=(($plan1->AMOUNT)*10)/100; echo (($plan1->AMOUNT)*10)/100; ?></td>
        							            <td><?php $total_charge+=(($plan1->AMOUNT)*20)/100; echo (($plan1->AMOUNT)*20)/100; ?></td>
        							            
        							            <td><?php $final_amt+=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; echo $final=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; ?></td>
        							             <!-- total achieve income -->
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ $netincome_achieve+=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; echo $final=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100;  } else { $netincome_achieve+=0; echo '-'; }  ?></td>
        							            
        							            <td><?php  echo $product;  $full_product+=$product;  ?></td>
        							            
        							            <td><?php $after_product+=$final-$product; echo $final-$product; ?></td>
        							             <!-- total achieve payment -->
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ $final_achieve+=$final-$product; echo $final-$product;   } else { $final_achieve+=0; echo '-'; }  ?></td>
        							        </tr>
        							        <?php  }  } ?>
        							    </tbody>
        							    <?php if($stage_level==3){
        							        ?>
        							    <tfoot>
        							        <tr>
        							            <td>TOTAL</td>
        							            <td><?php echo $count_node; ?></td>
        							            <td><?php echo $count_node; ?></td>
        							            <td><?php echo $self; ?></td>
        							            <td><?php echo $other; ?></td>
        							            <td><?php echo $total_id; ?></td>
        							            <td><?php echo $self; ?></td>
        							            <td><?php echo $other; ?></td>
        							            <td><?php echo $total_id; ?></td>
        							            <td><?php echo $inc; ?></td>
        							            <td><?php echo $inc; ?></td>
        							            <td><?php echo $admin_carge; ?></td>
        							            <td><?php echo $tds_charge; ?></td>
        							            <td><?php echo $total_charge; ?></td>
        							            <td><?php echo $final_amt; ?></td>
        							            <td><?php echo $final_amt; ?></td>
        							            <td><?php echo $full_product; ?></td>
        							            <td><?php echo $after_product; ?></td>
        							            <td><?php echo $after_product; ?></td>
        							        </tr>
        							    </tfoot>
        							    <?php } else { ?>
        							     <tfoot>
        							        <tr>
        							            <td>TOTAL</td>
        							            <td><?php echo $count_node; ?></td>
        							            <td><?php echo $count_node_achieve; ?></td>
        							            <td><?php echo $self; ?></td>
        							            <td><?php echo $other; ?></td>
        							            <td><?php echo $total_id; ?></td>
        							            <td><?php echo $self_achieve; ?></td>
        							            <td><?php echo $other_achieve; ?></td>
        							            <td><?php echo $total_achieve; ?></td>
        							            <td><?php echo $inc; ?></td>
        							            <td><?php echo $income_achieve; ?></td>
        							            <td><?php echo $admin_carge; ?></td>
        							            <td><?php echo $tds_charge; ?></td>
        							            <td><?php echo $total_charge; ?></td>
        							            <td><?php echo $final_amt; ?></td>
        							            <td><?php echo $netincome_achieve; ?></td>
        							            <td><?php echo $full_product; ?></td>
        							            <td><?php echo $after_product; ?></td>
        							            <td><?php echo $final_achieve; ?></td>
        							        </tr>
        							    </tfoot>
        							    <?php } ?>
        							</table>
    							</div>
    							<!-- diamond new -->
    							<div style="overflow-x: auto;">
        							<h3 class="text-center">Diamond Team Member (Matrix Pool)</h3>
        							<table class="table table-striped table-bordered mrg_tp_25">
        							    <thead>
        							        <tr>
        							            <th rowspan="2">LEVEL</th>
        							            <th rowspan="2">REQ. MEMBER</th>
        							            <th rowspan="2">ACHIEVE MEMBER</th>
        							            <th colspan="3"><center>REQ. DIRECT MEMBER</center></th>
        							            <th colspan="3"><center>ACHEIVE DIRECT MEMBER</center></th>
        							            <th rowspan="2">INCOME</th>
        							            <th rowspan="2">ACHIEVE INCOME</th>
        							            <th colspan="3"><center>Charges</center></th>
        							            <th rowspan="2">TOTAL INCOME</th>
        							            <th rowspan="2">TOTAL ACHEIVE INCOME</th>
        							            <th rowspan="2">NEW PRODUCT PURCHASE CHARGE</th>
        							            <th rowspan="2">PAYMENT</th>
        							            <th rowspan="2">ACHIEVE PAYMENT</th>
        							        </tr>
        							        <tr>
        							            <th>Self ID</th>
        							            <th>Other Id</th>
        							            <th>Total Id</th>
        							            <th>Self ID</th>
        							            <th>Other Id</th>
        							            <th>Total Id</th>
        							            <th>Admin 10%</th>
        							            <th>TDS 10%</th>
        							            <th>TOTAL 20%</th>
        							        </tr>
        							    </thead>
        							    <tbody>
        							        <?php $arr_plan=myplan(3);
        							        $stage_level=get_hrm_postmeta($this->session->userdata('userid'),'mlm_plan_desc');
    							            $stagewise_sponsor_level=get_hrm_postmeta($this->session->userdata('userid'),'level');
        							        $self=0;
        							        $other=0;
        							        $total_id=0;
        							        $inc=0;
        							        $admin_carge=0;$tds_charge=0;$total_charge=0;$final_amt=0;$after_product=0;$full_product=0;$count_node=0;$totcount_node=0;
        							        $count_node_achieve=0;$self_achieve=0;$other_achieve=0;$total_achieve=0;$income_achieve=0;$netincome_achieve=0;$final_achieve=0;
        							            foreach($arr_plan as $plan1){
        							                $product=0;
        							                $charge=explode(',',$plan1->LEVEL_CHARGE_ID);
        							                foreach($charge as $charges){
        							                    if($charges!=1 && $charges!=2){
            							                    $arr=get_charges_mlm($charges);
            							                    $product=$arr[0]->AMOUNT;
        							                    }
        							                }
        							                 if($stage_level!=1){
        							               ?>
        							        <tr>
        							            <td><?php echo $plan1->LEVELS; ?></td>
        							            <td><?php if($plan1->COUNT_NODES!=0) { $totcount_node+=$plan1->COUNT_NODES; echo $count_node=$plan1->COUNT_NODES; } else { $totcount_node=0; $count_node=0; echo "You"; } ?></td>
        							            <!-- achieve member -->
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ if($plan1->COUNT_NODES!=0) {  $count_node_achieve+=$plan1->COUNT_NODES; echo $plan1->COUNT_NODES;  } else { $count_node_achieve+=0; echo "You"; } } else { $count_node_achieve+=0; echo '-'; }  ?></td>
        							            
        							            <td><?php $self+=$plan1->SELF_ID; echo $plan1->SELF_ID; ?></td>
        							            <td><?php $other+=$plan1->OTHER_ID; echo $plan1->OTHER_ID; ?></td>
        							            <td><?php $total_id+=$plan1->SELF_ID+$plan1->OTHER_ID; echo $plan1->SELF_ID+$plan1->OTHER_ID; ?></td>
        							            <!-- achieve direct ids -->
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ $self_achieve+=$plan1->SELF_ID; echo $plan1->SELF_ID; } else { $self_achieve+=0; echo '-'; }  ?></td>
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ $other_achieve+=$plan1->OTHER_ID; echo $plan1->OTHER_ID; } else { $other_achieve+=0; echo '-'; }  ?></td>
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ $total_achieve+=$plan1->SELF_ID+$plan1->OTHER_ID; echo $plan1->SELF_ID+$plan1->OTHER_ID; } else { $total_achieve+=0; echo '-'; }  ?></td>
        							            
        							            <td><?php $inc+=$plan1->AMOUNT; echo $plan1->AMOUNT; ?></td>
        							            <!-- achieve income -->
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ $income_achieve+=$plan1->AMOUNT; echo $plan1->AMOUNT; } else { $income_achieve+=0; echo '-'; } ?></td>
        							            
        							            <td><?php $admin_carge+=(($plan1->AMOUNT)*10)/100; echo (($plan1->AMOUNT)*10)/100; ?></td>
        							            <td><?php $tds_charge+=(($plan1->AMOUNT)*10)/100; echo (($plan1->AMOUNT)*10)/100; ?></td>
        							            <td><?php $total_charge+=(($plan1->AMOUNT)*20)/100; echo (($plan1->AMOUNT)*20)/100; ?></td>
        							            
        							            <td><?php $final_amt+=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; echo $final=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; ?></td>
        							             <!-- total achieve income -->
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ $netincome_achieve+=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; echo $final=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100;  } else { $netincome_achieve+=0; echo '-'; }  ?></td>
        							            
        							            <td><?php  echo $product;  $full_product+=$product;  ?></td>
        							            
        							            <td><?php $after_product+=$final-$product; echo $final-$product; ?></td>
        							             <!-- total achieve payment -->
        							            <td><?php if($plan1->LEVELS<=$stagewise_sponsor_level){ $final_achieve+=$final-$product; echo $final-$product;   } else { $final_achieve+=0; echo '-'; }  ?></td>
        							        </tr>
        							        
        							        
        							        <?php  }  else { ?>
            							        <tr>
            							            <td><?php echo $plan1->LEVELS; ?></td>
            							            <td><?php if($plan1->COUNT_NODES!=0) { $totcount_node+=$plan1->COUNT_NODES; echo $count_node=$plan1->COUNT_NODES; } else { $totcount_node=0; $count_node=0; echo "You"; } ?></td>
            							            <!-- achieve member -->
            							            <td><?php  echo '-';   ?></td>
            							            
            							            <td><?php $self+=$plan1->SELF_ID; echo $plan1->SELF_ID; ?></td>
            							            <td><?php $other+=$plan1->OTHER_ID; echo $plan1->OTHER_ID; ?></td>
            							            <td><?php $total_id+=$plan1->SELF_ID+$plan1->OTHER_ID; echo $plan1->SELF_ID+$plan1->OTHER_ID; ?></td>
            							            <!-- achieve direct ids -->
            							            <td><?php echo '-'; ?></td>
            							            <td><?php echo '-';  ?></td>
            							            <td><?php echo '-'; ?></td>
            							            
            							            <td><?php $inc+=$plan1->AMOUNT; echo $plan1->AMOUNT; ?></td>
            							            <!-- achieve income -->
            							            <td><?php echo '-'; ?></td>
            							            
            							            <td><?php $admin_carge+=(($plan1->AMOUNT)*10)/100; echo (($plan1->AMOUNT)*10)/100; ?></td>
            							            <td><?php $tds_charge+=(($plan1->AMOUNT)*10)/100; echo (($plan1->AMOUNT)*10)/100; ?></td>
            							            <td><?php $total_charge+=(($plan1->AMOUNT)*20)/100; echo (($plan1->AMOUNT)*20)/100; ?></td>
            							            
            							            <td><?php $final_amt+=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; echo $final=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; ?></td>
            							             <!-- total achieve income -->
            							            <td><?php  echo '-';   ?></td>
            							            
            							            <td><?php  echo $product;  $full_product+=$product;  ?></td>
            							            
            							            <td><?php $after_product+=$final-$product; echo $final-$product; ?></td>
            							             <!-- total achieve payment -->
            							            <td><?php echo '-';  ?></td>
            							        </tr>
        							        <?php } } ?>
        							    </tbody>
        							    <tfoot>
        							        <tr>
        							            <td>TOTAL</td>
        							            <td><?php echo $totcount_node; ?></td>
        							            <td><?php echo $count_node_achieve; ?></td>
        							            <td><?php echo $self; ?></td>
        							            <td><?php echo $other; ?></td>
        							            <td><?php echo $total_id; ?></td>
        							            <td><?php echo $self_achieve; ?></td>
        							            <td><?php echo $other_achieve; ?></td>
        							            <td><?php echo $total_achieve; ?></td>
        							            <td><?php echo $inc; ?></td>
        							            <td><?php echo $income_achieve; ?></td>
        							            <td><?php echo $admin_carge; ?></td>
        							            <td><?php echo $tds_charge; ?></td>
        							            <td><?php echo $total_charge; ?></td>
        							            <td><?php echo $final_amt; ?></td>
        							            <td><?php echo $netincome_achieve; ?></td>
        							            <td><?php echo $full_product; ?></td>
        							            <td><?php echo $after_product; ?></td>
        							            <td><?php echo $final_achieve; ?></td>
        							        </tr>
        							    </tfoot>
        							</table>
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