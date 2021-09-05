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
									<h1 class="panel-title txt-dark"><i class="fa fa-tasks"></i> MY PLAN</h1>
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
    							
							<!-- diamond -->
    							<div  style="overflow-x: auto;">
    							    <h3 class="text-center mrg_tp_25">Matrix Team Member (Matrix Pool)</h3>
        							<table class="table table-striped table-bordered mrg_tp_25">
        							    <thead>
        							        <tr>
        							            <th rowspan="2">LEVEL</th>
        							            <th rowspan="2">MEMBER</th>
        							            <th colspan="2"><center>DIRECT MEMBER</center></th>
        							            <th rowspan="2">INCOME</th>
        							            <th colspan="3"><center>Charges</center></th>
        							            <!--<th rowspan="2">TOTAL INCOME</th>-->
        							            <!--<th rowspan="2">NEW PRODUCT PURCHASE CHARGE</th>-->
        							            <th rowspan="2">PAYMENT</th>
        							        </tr>
        							        <tr>
        							            <!--<th>Self ID</th>-->
        							            <th>Other Id</th>
        							            <th>Total Id</th>
        							            <th>NGO 10%</th>
        							            <th>PRODUCT 10%</th>
        							            <th>TOTAL 20%</th>
        							        </tr>
        							    </thead>
        							    <tbody>
        							        <?php $arr_plan=myplan(3);
        							        $self=0;
        							        $other=0;
        							        $total_id=0;
        							        $inc1=0;
        							        $admin_carge=0;$tds_charge=0;$total_charge=0;$final_amt=0;$after_product1=0;$full_product=0;$count_node=0;
        							            foreach($arr_plan as $plan1){
        							                $product=0;
        							                $charge=explode(',',$plan1->LEVEL_CHARGE_ID);
        							                foreach($charge as $charges){
        							                    if($charges!=1 && $charges!=2){
            							                    $arr=get_charges_mlm($charges);
            							                    $product=$arr[0]->AMOUNT;
        							                    }
        							                }
        							        ?>
        							        <tr>
        							            <td><?php echo $plan1->LEVELS; ?></td>
        							            <td><?php if($plan1->COUNT_NODES!=0) { $count_node+=$plan1->COUNT_NODES; echo $plan1->COUNT_NODES; } else { $count_node=0; echo "You"; } ?></td>
        							            <!--<td><?php $self+=$plan1->SELF_ID; echo $plan1->SELF_ID; ?></td>-->
        							            <td><?php $other+=$plan1->OTHER_ID; echo $plan1->OTHER_ID; ?></td>
        							            <td><?php $total_id+=$plan1->SELF_ID+$plan1->OTHER_ID; echo $plan1->SELF_ID+$plan1->OTHER_ID; ?></td>
        							            <td><?php $inc1+=$plan1->AMOUNT; echo $plan1->AMOUNT; ?></td>
        							            <td><?php $admin_carge+=(($plan1->AMOUNT)*10)/100; echo (($plan1->AMOUNT)*10)/100; ?></td>
        							            <td><?php $tds_charge+=(($plan1->AMOUNT)*10)/100; echo (($plan1->AMOUNT)*10)/100; ?></td>
        							            <td><?php $total_charge+=(($plan1->AMOUNT)*20)/100; echo (($plan1->AMOUNT)*20)/100; ?></td>
        							            <!--<td><?php $final_amt+=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100;  $final=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; ?></td>-->
        							            <?php $final_amt+=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100;  $final=$plan1->AMOUNT-(($plan1->AMOUNT)*20)/100; ?>
        							            <!--<td><?php {  echo $product;  $full_product+=$product;  } ?></td>-->
        							            <td><?php $after_product1+=$final-$product; echo $final-$product; ?></td>
        							        </tr>
        							        <?php } ?>
        							    </tbody>
        							    <tfoot>
        							        <tr>
        							            <td>TOTAL</td>
        							            <td><?php echo $count_node; ?></td>
        							            <!--<td><?php echo $self; ?></td>-->
        							            <td><?php echo $other; ?></td>
        							            <td><?php echo $total_id; ?></td>
        							            <td><?php echo $inc1; ?></td>
        							            <td><?php echo $admin_carge; ?></td>
        							            <td><?php echo $tds_charge; ?></td>
        							            <td><?php echo $total_charge; ?></td>
        							            <!--<td><?php echo $final_amt; ?></td>-->
        							            <!--<td><?php echo $full_product; ?></td>-->
        							            <td><?php echo $after_product1; ?></td>
        							        </tr>
        							    </tfoot>
        							</table>
    							</div>
							<!-- TOTAL -->
    							<div style="overflow-x: auto;">
        							<h3 class="text-center mrg_tp_25">Total Income</h3>
        							<table class="table table-striped table-bordered mrg_tp_25">
        							    <thead>
        							        <tr>
        							            <th>Sr No.</th>
        							            <th>Pool Name</th>
        							            <th>Income</th>
        							            <th>Net Income</th>
        							        </tr>
        							    </thead>
        							    <tbody>
        							        <?php $totalinc=0;$final_inc=0; ?>
        							        
        							        <tr>
        							            <td>1</td>
        							            <td>Matrix Team Member</td>
        							            <td><?php $totalinc+=$inc1; echo $inc1; ?></td>
        							            <td><?php $final_inc+=$after_product1; echo $after_product1; ?></td>
        							        </tr>
        							    </tbody>
        							    <tfoot>
        							        <tr>
        							            <td></td>
        							            <td>TOTAL</td>
        							            <td><?php echo $totalinc; ?></td>
        							            <td><?php echo $final_inc; ?></td>
        							            
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