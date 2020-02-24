
<style>
    .btn-block{
            
            max-width: 120px;
            font-size: 10px;
    }
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
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark"> <i class="fa fa-briefcase"></i> All Team in Business</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
										    
											<table class="table table-hover display" id="posts">
												<thead>
													<tr>
													    <th>Sr No.</th>
														<th>User Id</th>
														<th>Password</th>
														<th>Joining Date</th>
														<th>Name</th>
														<th>Pan Card</th>
														<th>Aadhar</th>
														<th>Address</th>
														
														<th>Mob No</th>
														<th class="sum">Wallet</th>
														<th class="sum">Withdrawl</th>
													</tr>
												</thead>
											    <tbody>
												
														
													
												</tbody>
												<tfoot>
												    <tr>
													    <th>Sr No.</th>
														<th>User Id</th>
														<th>Password</th>
														<th>Joining Date</th>
														<th>Name</th>
														<th>Pan Card</th>
														<th>Aadhar</th>
														<th>Address</th>
													
														<th>Mob No</th>
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
						<p><?php echo date('Y'); ?> &copy; <?php echo get_option('footer_name'); ?>. All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->
        <!-- Modal -->
 
  <script>
  <!-- Modal -->
  $(document).ready(function () {
        $('#posts').DataTable({
            dom: 'Bfrtip,l',
            pageLength: '50',
            lengthMenu: [[10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000], [10, 25, 50, 100, 200, 500, 1000, 2000, 5000, 10000]],
            buttons: [
               'excel', 'pdf', 'print'
            ],
            "processing": true,
            "serverSide": true,
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
            },
            "ajax":{
		     "url": "<?php echo base_url('admin/teambusinessposts') ?>",
		     "dataType": "json",
		     "type": "POST",
		     "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
		                   },
    	    "columns": [
    		          { "data": "SR_NO" },
    		          { "data": "HRM_ID" },
    		          { "data": "HRM_PASS" },
    		          { "data": "HRM_DATE" },
    		          { "data": "HRM_NAME" },
    		          { "data": "PAN" },
    		          { "data": "AADHAR" },
    		          { "data": "ADDRESS" },
    		          { "data": "CONTACT" },
    		          { "data": "WALLET" },
    		          { "data": "WITHDRAWL" },
    		         
    		       ]	 
         });
	});
    </script>