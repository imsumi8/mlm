<?php


?>
<style>
   
    input[type="file"] {
        display: block !important;
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
									<h1 class="panel-title txt-dark">Products</h1>
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
            											<li class="active" role="presentation" style="background-color: #6ab0ec;"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#home_6">Add Products</a></li>
            											<!--<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#profile_6" aria-expanded="false">Franchisee Epin</a></li>-->
            										    <!--<li role="presentation" class=""><a  data-toggle="tab" id="front_tab_6" role="tab" href="#front_6" aria-expanded="false">Front Site Epin</a></li>-->
            										</ul>
            										<div class="tab-content" id="myTabContent_6">
            											<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
            											    <form id="add_product" action='' enctype="multipart/form-data">
            											        <!-- <input type="hidden" name="category" value="<?php echo $this->uri->segment(6); ?>"> -->
                                								<div class="sections">
                                									<div class="row"><div class="col-md-12"><div class="errors alert alert-warning"></div></div></div>
                                							
                                                                    <div class="row">
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>Category <span class="star">*</span></label>
                                                                        <select name="category_id" id="category_id" class="form-control">
                                                                        <option value="">Select Category</option>
                                                                            <?php $arrepin=array(); $category=get_all_category();  foreach($category as $cat) {
                                                                            if(!in_array($cat->name,$arrepin)){
                                                                                $arrepin[]=$cat->name;
                                                                            
                                                                            ?>
                                                                                <option value="<?php echo $cat->id;?>"><?php echo $cat->name;?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                </div>
                                                                </div>
                                                             
                                										<div class="col-md-6">
                                											<div class="form-group">
												
                                												<div><label>Sub-Category<span class="star">*</span></label></div>
                                                                                <select name='subcategory' id='subcategory' class='form-control' >
														                      <option value=''>Select Sub Category</option>
													                                    </select>
                                											</div>
                                										</div>
                                										
                                									</div>

                                                  	
                                                                <div class="row">
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>Product Name <span class="star">*</span></label>
                                                                    <input type="text" name="name" id="name" class="form-control" autocomplete="off" placeholder="Product Name"> 
                                                                      
                                                                </div>
                                                                </div>
                                                               
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>Product Description </label>
                                                                    <input type="text" name="desc" id="desc" class="form-control" autocomplete="off" placeholder="Product Description"> 
                                                                      
                                                                </div>
                                                                </div>
                                                             
                                										
                                										
                                									</div>   

                                                                    <div class="row">
                                                                    
                                                             
                                										<div class="col-md-6">
                                											<div class="form-group">
												
                                												<div><label>Size Value</label></div>
                                                                                <input type="text" name="size" id="size" class="form-control" autocomplete="off" placeholder="Size Value"> 
                                                                              
                                											</div>
                                										</div>

                                                                        
                                										<div class="col-md-6">
                                											<div class="form-group">
												
                                												<div><label>Size Type</label></div>
                                                                                <select name="type" id="type" class="form-control">
                                                                        <option value="">Select</option>
                                                                            <?php $arrepin=array(); $category=get_all_size_types();  foreach($category as $cat) {
                                                                            if(!in_array($cat->name,$arrepin)){
                                                                                $arrepin[]=$cat->name;
                                                                            
                                                                            ?>
                                                                                <option value="<?php echo $cat->id;?>"><?php echo $cat->name;?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                											</div>
                                										</div>
                                										
                                									</div> 

                                                                    <div class="row">
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>MRP <span class="star">*</span></label>
                                                                    <input type="text" name="mrp" id="mrp" class="form-control" autocomplete="off" placeholder="MRP"> 
                                                                      
                                                                </div>
                                                                </div>
                                                                
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>DP <span class="star">*</span></label>
                                                                    <input type="text" name="dp" id="dp" class="form-control" autocomplete="off" placeholder="DP"> 
                                                                      
                                                                </div>
                                                                </div>
                                                             </div>   

                                                           <div class="row">
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>BV <span class="star">*</span></label>
                                                                    <input type="text" name="bv" id="bv" class="form-control" autocomplete="off" placeholder="BV"> 
                                                                      
                                                                </div>
                                                                </div>
                                                              
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>GST <span class="star">*</span></label>
                                                                    <input type="text" name="gst" id="gst" class="form-control" autocomplete="off" placeholder="GST"> 
                                                                      
                                                                </div>
                                                                </div>
                                                             </div>   

                                                               <div class="row">
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>HSN Code <span class="star"></span></label>
                                                                    <input type="text" name="hsn" id="hsn" class="form-control" autocomplete="off" placeholder="HSN Code"> 
                                                                      
                                                                </div>
                                                                </div>
                                                              
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>Image </label>
                                                                    <input type="file" class="" name="image" id="image">
                                                                      
                                                                </div>
                                                                </div>
                                                             </div>          

                                									<div class="row">
                                										<div class="col-md-12">
                                											<input type="submit" class="btn btn-success submitproduct" style="background: #65cea7; border: solid 1px #65cea7;" value="SUBMIT >>">
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
		<div class="panel-heading">Products</div>								
									<div class='col-md-12 col-sm-12' >
										<div id="toolbar">
										
										</div>
										<table class='table-striped' id='product_list'
											data-toggle="table"
											data-url="<?php echo base_url()."admin_ajax/get_products?table=product_list" ?>"
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
									  
											<th data-field="sno">S.No.</th>
										
											<th data-field="category" data-sortable="true">Category</th>
                                            <th data-field="subcategory" data-sortable="true">Sub-Category</th>
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

<div id="editsubcategory" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Sub-Category</h4>
      </div>
      <div class="modal-body">
         <form  id="editsubcategoryform">
           
             <input type="hidden" class="subcategory_id" name="subcategory_id" id="subcategory_id">
          
             <div class="row">
																	<div class="col-md-12">
                                                                    <label>Category <span class="star">*</span></label>
                                                                        <select name="category" id="category" class="form-control">
                                                                            <?php $arrepin=array(); $category=get_all_category();  foreach($category as $cat) {
                                                                            if(!in_array($cat->name,$arrepin)){
                                                                                $arrepin[]=$cat->name;
                                                                            
                                                                            ?>
                                                                                <option value="<?php echo $cat->id;?>" ><?php echo $cat->name;?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                </div>
                                                                </div>
                                                                <br>
            <div class="row">
                <div class="col-md-12">
                    <label>Sub-Category</label>
                    <input type="text" class="subcategory_name form-control" name="subcategory" id="subcategory" required>
                </div>
            </div>
            
         <br>
        
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" style="background: #65cea7; border: solid 1px #65cea7;" class="btn btn-primary editsubcategory">Update</button>
                </div>
            </div>
        </form>
      </div>
     
    </div>

  </div>
</div>

		
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
                
                  	'click .edit-subcategory': function (e, value, row, index) {
                  	    
            //	alert('You click remove icon, row: ' + JSON.stringify(row));
            
                    $('#subcategory_id').val(row.id);
                    $('#category').val(row.category_id);
                     $('#subcategory').val(row.subcategory);
                
		
			     
            	}
                
			};
			

			$("#editsubcategoryform").on('submit', function(e){
    	    e.preventDefault();
    		$.ajax({    
    			type: 'POST',
    			url: admin_loc+'edit_subcategory',
    			data: new FormData(this),
    			contentType: false,
    			cache: false,
    			processData:false,
    			beforeSend: function(){
    				$('.editsubcategory').attr("disabled","disabled");
    				$('.editsubcategory').html("Please Wait..");
    			},
    			success: function(msg){
    				msg=$.trim(msg);
    				if(msg == 'ok'){
    					sweetalert('Success','success','Sub-Category Edited successfully','#469408');
    					$(".editsubcategory").attr("disabled",false);
						$('.editsubcategory').html("Update");
						$('#subcategory_list').bootstrapTable('refresh');
						setTimeout(function() {$('#editsubcategory').modal('hide');}, 1000);
    					// location.reload();
    				}else{
    					$(".editsubcategory").attr("disabled",false);
    					 sweetalert('Warning','warning',msg,'#f99b4a');
						 $('.editsubcategory').html("Update");
						 setTimeout(function() {$('#editsubcategory').modal('hide');}, 1000);
    					 
    				}
    			}
    		});
	    }); 			
                
                	</script>

<script>
		$('#category_id').on('change',function(e){
			var category_id = $('#category_id').val();
			$.ajax({
				type:'POST',
				url: admin_loc+'get_subcategory_by_cat',
				data:'category_id='+category_id,
				beforeSend:function(){$('#subcategory').html('Please wait..');},
				success:function(result){
					// alert(result);
					$('#subcategory').html(result);
				}
			});
		});
		</script>              


<script>
		$(document).on('click','.delete-subcategory',function(){
			if(confirm('Are you sure? Want to delete subcategory? All related products will also be deleted')){
				id = $(this).data("id");
			
				$.ajax({
					url : admin_loc+'delete_subcategory',
					type: "get",
					data: 'id='+id +'&delete_subcategory=1',
					success: function(result){
						// alert(result);
						if(result=='ok'){
							sweetalert('Success','success','Sub-Category Deleted successfully','#469408');
							$('#subcategory_list').bootstrapTable('refresh');
							
						}else
						sweetalert('Warning','warning','Sub-Category could not be deleted','#f99b4a');
							//alert('Error! Category could not be deleted');
					}
				});
			}
		});
		</script>				