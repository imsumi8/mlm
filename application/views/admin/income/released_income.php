
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
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                pageTotal 
            );
        }
    });
    
     /* pageTotal +' ( '+ total +' total)'*/
});
   
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
									<h1 class="panel-title txt-dark">Released Income</h1>
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
													   <th>Date</th>
														<th>Status</th>
														<th>Total Amount</th>
														
													</tr>
												
												</thead>
											    <tfoot> 
											        <tr> 
											            <th colspan="3" style="text-align:right">Total : </th>
											            <th></th>
											        </tr>
											    </tfoot>
												<tbody>
												    <?php if(!empty($apppaidreq)){ $i=1; foreach($apppaidreq as $activereqs) { ?>
											        <tr>
											            <td><?php echo $i; ?></td>
											            <td><?php echo $activereqs->DATE; ?></td>
											            <td><?php echo 'Paid'; ?></td>
											            <td><?php echo $activereqs->AMOUNT; ?></td>
											        </tr>
											        <?php $i++; } } ?>
														
													
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