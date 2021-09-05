<div id="editincome" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Income</h4>
      </div>
      <div class="modal-body">
         <form  id="editincomeform">
           
             <input type="hidden" class="income_id" name="income_id" id="income_id">
          
            <div class="row">
                <div class="col-md-12">
                    <label>Income</label>
                    <input type="text" class="category_name form-control" name="LEVEL_AMOUNT" id="LEVEL_AMOUNT" required>
                </div>
            </div>
            
         <br>
        
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" style="background: #65cea7; border: solid 1px #65cea7;" class="btn btn-primary editcategory">Update</button>
                </div>
            </div>
        </form>
      </div>
     
    </div>

  </div>
</div>