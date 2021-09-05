
<script>
 $(document).ready(function() {
    $('#example').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 2 ).footer() ).html(
                pageTotal 
            );
        }
    } );
   
     /* pageTotal +' ( '+ total +' total)'*/
} );
   
</script>
<style>
    .btn-block{
            
            max-width: 120px;
            font-size: 10px;
    }
</style>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">E-Wallet Debit Transactions</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
										  
											<table class="table table-hover display" id="example">
												<thead>
													<tr>
													    <th>SR NO.</th>
														<th>Date</th>
													    <th>Debit</th>
													</tr>
												</thead>
												 <tfoot> 
											        <tr> 
											            <th colspan="2" style="text-align:right">Total : </th>
											            <th></th> 
											        </tr>
											    </tfoot>
											    <tbody>
													<?php if(!empty($result)){ $i=1;$balanceamt=0;
													 foreach($result as $results){  
													    $amt1=0;$amt2=0; 
													    if($results->CR_ID==$ledgerid){
													        $amt1=$results->AMOUNT;
													    }
													     if($amt1!=0){
													 ?>
                                                         <tr>
                                                             <td><?php echo $i; ?></td>
                                                             <td><?php echo $results->DATE; ?></td>
                                                             <td><?php echo $amt1; ?></td>
                                                         </tr>
                                                    <?php $i++; } } } ?>
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
							<p><?php echo date('Y'); ?> &copy; <?php echo get_option('footer_name'); ?> All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->
       
 