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