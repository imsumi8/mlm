
<style>
   
    table{
        width:100% !important;
    }
    thead tr,tfoot tr{
        background-color: #419bea !important;
    }
    thead th,tfoot th{
       color: #fff !important;
    }
</style>
<script>
 $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip,l',
        pageLength: '50',
        lengthMenu: [[10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000], [10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000]],
        buttons: [
           'excel', 'pdf', 'print'
        ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
             
            api.columns('.sum', { page: 'current'}).every( function () {
              var sum = this
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
              
              this.footer().innerHTML = sum;
            } );
        }
   
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
									<h1 class="panel-title txt-dark">Earned Income</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								    
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover display " id="example">
												<thead>
													<tr>
														
														<th>Sr No.</th>
													    <th>Amount Type</th>
														<th>Date</th>
														<th>Status</th>
														<th class="sum">Total Amount</th>
														<th>Charges</th>
														<th class="sum">Net Amount</th>
													</tr>
												
												</thead>
											    <tbody>
													<?php if(!empty($commission)) { $i=1; $amt=0; foreach($commission as $commissions) { 
													     $user_id=$this->session->userdata('userid');
													     $accountid=get_account_charges($commissions->ACCOUNT_ID);
													     $chargestr='';
													     $chargeamt=0;
													     if($commissions->WALLET_STATUS==0){
													         $statsr='<span style="color:red;">Hold</span>';
													     }elseif($commissions->WALLET_STATUS==2){
															$statsr='<span style="color:red;">Debit</span>';
														 }else{
													         $statsr='<span style="color:green;">Credit</span>';
													     }
													      if(!empty($accountid)){
													          $chargestr=$accountid[0];
													          $chargeamt=$accountid[1];
													      }
													    ?>
															<tr>
																<td><?php echo $i; ?></td>
															    <td><?php echo get_income_name_by_id($commissions->COMMISSION_TYPE); ?></td>
															    <td><?php echo date("d-m-Y", strtotime($commissions->DATE_TIME)); ?></td>
															    <td><?php echo $statsr; ?></td>
															    <td><?php echo $commissions->WALLET_AMOUNT+$chargeamt; ?></td>
															    <td><?php echo $chargestr; ?></td>
															    <td><?php echo $commissions->WALLET_AMOUNT; ?></td>
															</tr>
														<?php  $i++;  }
													
													 } ?>
														
													
												</tbody>
												 <tfoot> 
											        <tr>
														<th>Sr No.</th>
													    <th>Amount Type</th>
														<th>Date</th>
														<th></th>
														<th></th>
														<th></th>
														<th></th>
													</tr>
											    </tfoot>
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
							<p><?php echo date('Y'); ?> &copy; <?php echo get_option('footer_name'); ?> All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->