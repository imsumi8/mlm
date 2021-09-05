<div id="editproduct" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Product</h4>
      </div>
      <div class="modal-body">
	  <form id="editproduct_form" enctype="multipart/form-data">
            											        <!-- <input type="hidden" name="category" value="<?php echo $this->uri->segment(6); ?>"> -->
                                				<div class="sections">
                                									<div class="row"><div class="col-md-12"><div class="errors alert alert-warning"></div></div></div>
                                							
                                                                    <div class="row">
																	<div class="col-md-6">
                                                                    <div class="form-group">
																	<input type='hidden' name="product_id" id="product_id" value=''/>
																	<input type='hidden' name="image_url" id="image_url" value=''/>
                                                                    <label>Category <span class="star">*</span></label>
                                                                        <select name="category_id" id="editcategory_id" class="form-control">
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
                                                                                <select name='subcategory' id='editsubcategory' class='form-control' >
														                      <option value=''>Select Sub Category</option>
													                                    </select>
                                											</div>
                                										</div>
                                										
                                									</div>

                                                  	
                                                                <div class="row">
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>Product Name <span class="star">*</span></label>
                                                                    <input type="text" name="name" id="editname" class="form-control" autocomplete="off" placeholder="Product Name"> 
                                                                      
                                                                </div>
                                                                </div>
                                                               
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>Product Description </label>
                                                                    <input type="text" name="desc" id="editdesc" class="form-control" autocomplete="off" placeholder="Product Description"> 
                                                                      
                                                                </div>
                                                                </div>
                                                             
                                										
                                										
                                									</div>   

                                                                    <div class="row">
                                                                    
                                                             
                                										<div class="col-md-6">
                                											<div class="form-group">
												
                                												<div><label>Size Value</label></div>
                                                                                <input type="text" name="size" id="editsize" class="form-control" autocomplete="off" placeholder="Size Value"> 
                                                                              
                                											</div>
                                										</div>

                                                                        
                                										<div class="col-md-6">
                                											<div class="form-group">
												
                                												<div><label>Size Type</label></div>
                                                                                <select name="type" id="edittype" class="form-control">
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
                                                                    <input type="text" name="mrp" id="editmrp" class="form-control" autocomplete="off" placeholder="MRP"> 
                                                                      
                                                                </div>
                                                                </div>
                                                                
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>DP <span class="star">*</span></label>
                                                                    <input type="text" name="dp" id="editdp" class="form-control" autocomplete="off" placeholder="DP"> 
                                                                      
                                                                </div>
                                                                </div>
                                                             </div>   

                                                           <div class="row">
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>BV <span class="star">*</span></label>
                                                                    <input type="text" name="bv" id="editbv" class="form-control" autocomplete="off" placeholder="BV"> 
                                                                      
                                                                </div>
                                                                </div>
                                                              
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>GST <span class="star">*</span></label>
                                                                    <input type="text" name="gst" id="editgst" class="form-control" autocomplete="off" placeholder="GST"> 
                                                                      
                                                                </div>
                                                                </div>
                                                             </div>   

                                                               <div class="row">
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>HSN Code <span class="star"></span></label>
                                                                    <input type="text" name="hsn" id="edithsn" class="form-control" autocomplete="off" placeholder="HSN Code"> 
                                                                      
                                                                </div>
                                                                </div>
                                                              
																	<div class="col-md-6">
                                                                    <div class="form-group">
                                                                    <label>Image ( Leave it blank for no change )</label>
                                                                    <input type="file" class="fileup" name="image" id="editimage">
                                                                      
                                                                </div>
                                                                </div>
                                                             </div>          

                                									<div class="row">
                                										<div class="col-md-12">
																		<button type="submit" style="background: #65cea7; border: solid 1px #65cea7;" class="btn btn-primary editproduct">Update</button>
                                										</div>
                                									</div>
                                								</div>
                                							</form>
      </div>
     
    </div>

  </div>
</div>