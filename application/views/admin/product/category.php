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
									<h1 class="panel-title txt-dark">Product Category</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<!-- Row -->
            				<div class="row">
            					<div class="col-lg-12 col-sm-12 col-md-12">
            						<div class="panel card-view">
            							<div class="panel-wrapper collapse in">
            								<div class="panel-body">
            									<div  class="pills-struct">
            										<ul role="tablist" class="nav nav-pills" id="myTabs_6">
            											<li class="active" role="presentation" style="background-color: #6ab0ec;"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#home_6">Add Category</a></li>
            											<!--<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#profile_6" aria-expanded="false">Franchisee Epin</a></li>-->
            										    <!--<li role="presentation" class=""><a  data-toggle="tab" id="front_tab_6" role="tab" href="#front_6" aria-expanded="false">Front Site Epin</a></li>-->
            										</ul>
            										<div class="tab-content" id="myTabContent_6">
            											<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
            											    <form id="add_category" action=''>
            											        <!-- <input type="hidden" name="category" value="<?php echo $this->uri->segment(6); ?>"> -->
                                								<div class="sections">
                                									<div class="row"><div class="col-md-12"><div class="errors alert alert-warning"></div></div></div>
                                							
                                									<div class="row">
                                										<div class="col-md-6">
                                											<div class="form-group">
												
                                												<div><label>Category<span class="star">*</span></label></div>
                                												<input type="text" name="category"  class="form-control" autocomplete="off" value="<?php echo $this->uri->segment(4); ?>"> 
                                											</div>
                                										</div>
                                										
                                									</div>
                                									<div class="row">
                                										<div class="col-md-12">
                                											<input type="submit" class="btn btn-success submitcategory" style="background: #65cea7; border: solid 1px #65cea7;" value="SUBMIT >>">
                                										</div>
                                									</div>
                                								</div>
                                							</form>
            											</div>
            										
            										</div>
            									</div>
            								</div>
            							</div>
            						</div>
            					</div>
            				</div>
            				<!-- /Row -->

							<div class='row'>
									
										
										
		<!-- CATEGORY TABLE								 -->
		<div class="panel-heading">Category</div>								
									<div class='col-md-12 col-sm-12' >
										<div id="toolbar">
										
										</div>
										<table class='table-striped' id='category_list'
											data-toggle="table"
											data-url="<?php echo base_url()."admin_ajax/get_category?table=category_list" ?>"
											data-click-to-select="true"
											data-side-pagination="server"
											data-pagination="true"
											data-page-list="[5, 10, 20, 50, 100, 200]"
											data-search="true" data-show-columns="true"
											data-show-refresh="true" data-trim-on-search="false"
											data-sort-name="id" data-sort-order="desc"
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
									  
											<th data-field="sno">S.NO.</th>
										
											<th data-field="name" data-sortable="true">Category</th>
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

$this->load->view('admin/product/modal/edit_category');

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
                
                  	'click .edit-category': function (e, value, row, index) {
                  	    
            //	alert('You click remove icon, row: ' + JSON.stringify(row));
            
					$('#category_id').val(row.id);
	             	$('#name').val(row.name);
		
			     
            	}
                
			};
			

			$("#editcategoryform").on('submit', function(e){
    	    e.preventDefault();
    		$.ajax({    
    			type: 'POST',
    			url: admin_loc+'edit_category',
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
    					sweetalert('Success','success','Category Edited successfully','#469408');
    					$(".editcategory").attr("disabled",false);
						$('.editcategory').html("Update");
						$('#category_list').bootstrapTable('refresh');
						setTimeout(function() {$('#editcategory').modal('hide');}, 1000);
    					// location.reload();
    				}else{
    					$(".editcategory").attr("disabled",false);
    					 sweetalert('Warning','warning',msg,'#f99b4a');
						 $('.editcategory').html("Update");
						 setTimeout(function() {$('#editcategory').modal('hide');}, 1000);
    					 
    				}
    			}
    		});
	    }); 			
                
                	</script>


<script>
		$(document).on('click','.delete-category',function(){
			if(confirm('Are you sure? Want to delete category? All related products and sub categories will also be deleted')){
				id = $(this).data("id");
			
				$.ajax({
					url : admin_loc+'delete_category',
					type: "get",
					data: 'id='+id +'&delete_category=1',
					success: function(result){
						// alert(result);
						if(result=='ok'){
							sweetalert('Success','success','Category Deleted successfully','#469408');
							$('#category_list').bootstrapTable('refresh');
							
						}else
						sweetalert('Warning','warning','Category could not be deleted','#f99b4a');
							//alert('Error! Category could not be deleted');
					}
				});
			}
		});
		</script>				