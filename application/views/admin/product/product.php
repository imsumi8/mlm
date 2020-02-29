<?php


?>
<style>
   
    input[type="file"] {
        display: block !important;
    }
	.swal2-content .swal2-file{
        display:none !important;
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
                                                                    <input type="file" class="fileup" name="image" id="image">
                                                                      
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
											<th data-field="pro_name" data-events="actionUpdate" data-sortable="true">Product</th>
											<th data-field="size" data-sortable="true">Size</th>
											<th data-field="mrp" data-sortable="true">MRP</th>
											<th data-field="dp" data-sortable="true">DP</th>
											<th data-field="bv" data-sortable="true">BV</th>
											<th data-field="gst" data-sortable="true">GST</th>
											<th data-field="image" data-sortable="true">Image</th>
											<th data-field="operate" data-events="actionUpdate">Action</th>
											
										 
										</tr>
												
											</thead>
										</table>
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

$this->load->view('admin/product/modal/edit_product');

$this->load->view('admin/product/modal/view_product');

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
                
     	'click .edit-product': function (e, value, row, index) {
                  	    
            //	alert('You click remove icon, row: ' + JSON.stringify(row));
            if(row.image_url != 'No image'){
						var regex = /<img.*?src="(.*?)"/;
						var src = regex.exec(row.image_url)[1];
						$('#image_url').val(src);
					}else{
						$('#image_url').val('');
					}
					$('#product_id').val(row.id);
                    $('#editcategory_id').val(row.category_id).trigger("change",[row.category_id,row.subcategory_id]);
                    // $('#editsubcategory').val(row.subcategory_id);
					 $('#editname').val(row.name);
					 $('#editsize').val(row.size_value);
					 $('#edittype').val(row.size_type);
					 $('#editmrp').val(row.mrp);
					 $('#editdp').val(row.dp_o);
					 $('#editbv').val(row.bv_o);
					 $('#editgst').val(row.gst_o);
					 $('#editdesc').val(row.desc);
					 $('#edithsn').val(row.hsn);
                
		
			     
				},
				'click .view-product': function (e, value, row, index) {
                  	    
						//  	alert('You click removeview icon, row: ' + JSON.stringify(row));
						//   if(row.image_url != 'No image'){
						// 			  var regex = /<img.*?src="(.*?)"/;
						// 			  var src = regex.exec(row.image_url)[1];
						// 			  $('#image_url').val(src);
						// 		  }else{
						// 			  $('#image_url').val('');
						// 		  }
								   $('#pro_id').html(row.product_code);
								   $('#pro_subcategory').html(row.subcategory);
								   $('#pro_category').html(row.category);
								   $('#pro_name').html(row.name);
						      	   $('#pro_size').html(row.size);
						    	   $('#pro_mrp').html(row.mrp);
								   $('#pro_dp').html(row.dp + ' ('+row.dp_o + '%)');
						 		   $('#pro_bv').html(row.bv + ' ('+row.bv_o + '%)');
						 		   $('#pro_gst').html(row.gst + ' ('+row.gst_o + '%)');
						    	   $('#pro_desc').val(row.desc);
								   $('#pro_hsn').html(row.hsn);
							  
					  
							   
							  },
                
			};
	

</script>	
	
<script>
		$("#editproduct_form").on('submit', function(e){
    	    e.preventDefault();
			
    		$.ajax({    
    			type: 'POST',
    			url: admin_loc+'edit_product',
    			data: new FormData(this),
    			contentType: false,
    			cache: false,
    			processData:false,
    			beforeSend: function(){
					console.log('edit');
    				$('.editproduct').attr("disabled","disabled");
    				$('.editproduct').html("Please Wait..");
    			},
    			success: function(msg){
    				msg=$.trim(msg);
    				if(msg == 'ok'){
    					sweetalert('Success','success','Product Updated successfully','#469408');
    					$(".editproduct").attr("disabled",false);
						$('.editproduct').html("UPDATE");
						$('#product_list').bootstrapTable('refresh');
						setTimeout(function() {$('#editproduct').modal('hide');}, 1000);
    					// location.reload();
    				}else{
    					$(".editproduct").attr("disabled",false);
    					 sweetalert('Warning','warning',msg,'#f99b4a');
						 $('.editproduct').html("UPDATE");
						 setTimeout(function() {$('#editproduct').modal('hide');}, 1000);
    					 
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
		$('#editcategory_id').on('change',function(e, row_category, row_subcategroy){
			var category_id = $('#editcategory_id').val();
			$.ajax({
				type:'POST',
				url: admin_loc+'get_subcategory_by_cat',
				data:'category_id='+category_id,
				beforeSend:function(){$('#editsubcategory').html('Please wait..');},
				success:function(result){
					// alert(result);
					$('#editsubcategory').html(result);
					if(category_id == row_category && row_subcategroy != 0 )
						$('#editsubcategory').val(row_subcategroy);
				
				}
			});
		});
		</script>             


<script>
		$(document).on('click','.delete-product',function(){
			if(confirm('Are you sure? Want to delete product?')){
				id = $(this).data("id");
			
				$.ajax({
					url : admin_loc+'delete_product',
					type: "get",
					data: 'id='+id +'&delete_product=1',
					success: function(result){
						// alert(result);
						if(result=='ok'){
							sweetalert('Success','success','Product Deleted successfully','#469408');
							$('#product_list').bootstrapTable('refresh');
							
						}else
						sweetalert('Warning','warning','Product could not be deleted','#f99b4a');
							//alert('Error! Category could not be deleted');
					}
				});
			}
		});
		</script>				