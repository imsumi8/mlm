<?php


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
									<h1 class="panel-title txt-dark">Manage Team Bonus</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
					

							<div class='row'>
									
										
										
		<!-- CATEGORY TABLE								 -->
		<div class="panel-heading">Team Sales Bonus</div>								
									<div class='col-md-12 col-sm-12' >
										<div id="toolbar">
										
										</div>
										<table class='table-striped' id='income_list'
											data-toggle="table"
											data-url="<?php echo base_url()."admin_ajax/get_team_bonus?table=team_bonus_list" ?>"
											data-click-to-select="true"
											data-side-pagination="server"
											data-pagination="true"
											data-page-list="[5, 10, 20, 50, 100, 200]"
											data-search="true" data-show-columns="true"
											data-show-refresh="true" data-trim-on-search="false"
											data-sort-name="ID" data-sort-order="ASC"
											data-mobile-responsive="true"
											data-toolbar="#toolbar" data-show-export="false"
											data-maintain-selected="true"
											data-export-types='["txt","excel"]'
											data-export-options='{
												"fileName": "subcategory-list-<?=date('d-m-y')?>",
												"ignoreColumn": ["state"]	
											}'
											data-query-params="queryParams">
											<thead>
									
													<tr>
									  
											<th data-field="LEVEL_NO">Level</th>
										
											<th data-field="LEVEL_AMOUNT" data-sortable="true">Income</th>
											<th data-field="operate" data-events="actionUpdate">Action</th>
											
										 
										</tr>
												
											</thead>
										</table>
									</div>
								</div>
								
					</div>

<!-- CATEGORY TABLE -->

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


<?php

$this->load->view('admin/income/modal/edit_team_bonus');

?>

	

		
        <!-- /Main Content -->
		<script>
		function queryParams(p){
			return {
				limit:p.limit,
				sort:p.sort,
				order:p.order,
				offset:p.offset,
				search:p.search
			};
		}
		</script>

<script>
            window.actionUpdate = {
                
                  	'click .edit-income': function (e, value, row, index) {
                  	    
            //	alert('You click remove icon, row: ' + JSON.stringify(row));
            
					$('#income_id').val(row.ID);
	             	$('#LEVEL_AMOUNT').val(row.LEVEL_AMOUNT);
		
			     
            	}
                
			};
			

			$("#editincomeform").on('submit', function(e){
    	    e.preventDefault();
    		$.ajax({    
    			type: 'POST',
    			url: admin_loc+'edit_team_bonus',
    			data: new FormData(this),
    			contentType: false,
    			cache: false,
    			processData:false,
    			beforeSend: function(){
    				$('.editcategory').attr("disabled","disabled");
    				$('.editcategory').html("Please Wait..");
    			},
    			success: function(msg){
    				msg=$.trim(msg);
    				if(msg == 'ok'){
    					sweetalert('Success','success','Income Edited successfully','#469408');
    					$(".editcategory").attr("disabled",false);
						$('.editcategory').html("Update");
						$('#income_list').bootstrapTable('refresh');
						setTimeout(function() {$('#editincome').modal('hide');}, 1000);
    					// location.reload();
    				}else{
    					$(".editcategory").attr("disabled",false);
    					 sweetalert('Warning','warning',msg,'#f99b4a');
						 $('.editcategory').html("Update");
						 setTimeout(function() {$('#editincome').modal('hide');}, 1000);
    					 
    				}
    			}
    		});
	    }); 			
                
                	</script>

