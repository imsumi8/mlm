<style>
    .pack{
       
    width: 100%;
    max-width: 50px;
    max-height: 50px;
    }
    .mrgn_tp_10{
        margin-top:20px;
    }
    input[type="file"] {
        display: block !important;
    }
    .pad_tp_10{
        padding-top:10px;
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
									<h1 class="panel-title txt-dark"> <i class="fa fa-shopping-cart"></i> Packages</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								    <div class="text-right">
								        
								        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpack"><i class="fa fa-plus"></i> Add New Pack</button>
								    </div>
								   <table class="mrgn_tp_10 table table-bordered table-striped">
								       <thead>
								           <tr>
								               <th>Sr No.</th>
								                <th>Image</th>
								                <th>Name</th>
								                <th>Description</th>
								                <th>Amount</th>
								                <th>Tools</th>
								           </tr>
								       </thead>
								       <tbody>
								           <?php $srno=1;
								           $pack=get_all_packs();
								            if(!empty($pack)){
								                foreach($pack as $pk){
								                    ?>
								                        <tr>
								                            <th><?php echo $srno; ?></th>
								                            <th><img class="pack" src="<?php echo base_url(); ?>assets/uploads_assets/<?php echo $pk->PACKAGE_IMG; ?>"></th>
								                            <th><?php echo $pk->PACKAGE_NAME; ?></th>
								                            <th><?php echo $pk->PACKAGE_DESC; ?></th>
								                            <th><?php echo $pk->PACKAGE_PRICE; ?></th>
								                            <th><button attr-id="<?php echo $pk->PACKAGE_ID; ?>" attr-amt="<?php echo $pk->PACKAGE_PRICE; ?>" attr-desc="<?php echo $pk->PACKAGE_DESC; ?>" attr-nm="<?php echo $pk->PACKAGE_NAME; ?>" attr-img="<?php echo $pk->PACKAGE_IMG; ?>" type="button" class="btn btn-success packedit"><i class="fa fa-edit"></i></button></th>
								                        </tr>
								                    <?php
								                    $srno++;
								                }
								            }
								           ?>
								       </tbody>
								   </table>
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
 <!-- add package -->
 <div id="addpack" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Package</h4>
      </div>
      <div class="modal-body">
         <form  id="addpackform" enctype="multipart/form-data">
             <input type="hidden" class="totalrow" name="totalrow" value="0">
            <div class="row">
                <div class="col-md-6">
                    <label>Package Name <span class="star">*</span></label>
                    <input type="text" class="pack_name form-control" name="pack_name" required>
                </div>
                <div class="col-md-6">
                    <label>Pack Amount <span class="star">*</span></label>
                    <input type="number" class="form-control" name="amtid" required>
                    	<!-- <select name="amtid" class="form-control"> -->
                            <?php 
                            // $arrepin=array(); $epimamts=get_all_epinamts();  foreach($epimamts as $epimamt) {
							// if(!in_array($epimamt->EPIN_AMT,$arrepin)){
							//     $arrepin[]=$epimamt->EPIN_AMT;
							
							?>
								<!-- <option value="<?php echo $epimamt->EPIN_AMT_ID;?>"><?php echo $epimamt->EPIN_AMT;?></option> -->
                            <?php
                        //  } } 
                         ?>
						<!-- </select> -->
                </div>
            </div>
            <div class="row pad_tp_10">
                <div class="col-md-12">
                    <label>Pack Description</label>
                    <textarea class="form-control" name="pack_desc" placeholder="Add description here"></textarea>
                </div>
            </div>
            <div class="row pad_tp_10">
                <div class="col-md-12">
                    <label>Select Pack Image</label>
                    <input type="file" class="fileToUpload" name="fileToUpload">
                </div>
            </div>
            <div class="row pad_tp_10">
                <div class="col-md-12">
                    <label>Add Attribute <button type="button" class="btn btn-danger add_attr_row">Add</button></label>
                </div>
            </div>
             <div class="row pad_tp_10">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Category</th>
                                <th>Attribute Name</th>
                                <th>Attribute Value</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody class="myattrtbody">
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row pad_tp_10 text-right">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary addpackform">Save</button>
                </div>
            </div>
        </form>
      </div>
     
    </div>

  </div>
</div>
  <!-- edit package -->
 <div id="editpackmodel" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Package</h4>
      </div>
      <div class="modal-body">
         <form  id="editpackform" enctype="multipart/form-data">
             <input type="hidden" class="totalrow" name="totalrow" value="1">
             <input type="hidden" class="pack_id" name="pack_id">
             <input type="hidden" class="filename" name="filename">
            <div class="row">
                <div class="col-md-12">
                    <label>Package Name</label>
                    <input type="text" class="pack_name form-control" name="pack_name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Pack Amount</label>
                    <input type="number" class="editamt form-control" name="editamt" required>
                </div>
            </div>
             <div class="row pad_tp_10">
                <div class="col-md-12">
                    <label>Pack Description</label>
                    <textarea class="form-control pack_desc" name="pack_desc" placeholder="Add description here"></textarea>
                </div>
            </div>
            <div class="row pad_tp_10">
                <div class="col-md-12">
                    <label>Select Pack Image</label>
                    <input type="file" class="fileToUpload" name="fileToUpload">
                </div>
            </div>
            <div class="row pad_tp_10">
                <div class="col-md-12">
                    <label>Add Attribute <button type="button" class="btn btn-danger add_attr_row">Add</button></label>
                </div>
            </div>
            <div class="row pad_tp_10">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                 <th>Category</th>
                                <th>Attribute Name</th>
                                <th>Attribute Value</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody class="myattrtbody">
                           
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row pad_tp_10 text-right">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary editpackform">Update</button>
                </div>
            </div>
        </form>
      </div>
     
    </div>

  </div>
</div>
<?php $categ=get_all_matc_pack_category();
       $json=json_encode($categ);
?>
  <script>
  var categ=<?php echo $json; ?>;
    $('document').ready(function(){
        $('#addpackform .add_attr_row').trigger('click');
        $('.add_attr_row').on('click',function(){
            var html='';
            var str='<select name="categ_1" class="categ">';
            $.each(categ,function(k,v){
                str+='<option value="'+v.CATEGORY_ID+'">'+v.CATEGORY_NAME+'</option>';
            });
            str+='</select>'
            html+='<tr><td class="srno">1</td><td>'+str+'</td>';
            html+='<td><input type="text" class="attrname" name="attr_name_1"></td>';
            html+='<td><input type="text" class="attrvalue" name="attr_value_1"></td>';
            
            html+='<td><button type="button" class="del_row btn bt-sm btn-success"><i class="fa fa-trash"></i> </button></td></tr>';                    
            $(this).parents('form').find('.myattrtbody').append(html);      
            update_row($(this).parents('form'));
        });
        $('body').on('click','.del_row',function(){
           if(confirm("Are you sure want to delete")){
               var d=$(this).parents('form');
               $(this).closest('tr').remove();
               update_row(d);
           } 
        });
        $("#addpackform").on('submit', function(e){
    	    e.preventDefault();
    		$.ajax({    
    			type: 'POST',
    			url: admin_loc+'addpackform',
    			data: new FormData(this),
    			contentType: false,
    			cache: false,
    			processData:false,
    			beforeSend: function(){
    				$('.addpackform').attr("disabled","disabled");
    				$('.addpackform').attr("Please Wait..");
    			},
    			success: function(msg){
    				msg=$.trim(msg);
    				if(msg == 'ok'){
    					sweetalert('Success','success','Pack added successfully','#469408');
    					$(".addpackform").attr("disabled",false);
    					$('.addpackform').attr("Save");
    					location.reload();
    				}else{
    					$(".addpackform").attr("disabled",false);
    					 sweetalert('Warning','warning',msg,'#f99b4a');
    					 $('.addpackform').attr("Save");
    					 
    				}
    			}
    		});
	    }); 
	    $('.packedit').on('click',function(){
	        var ref=$('#editpackform');
	        var id=$(this).attr('attr-id');
	        var nm=$(this).attr('attr-nm');
            var amt=$(this).attr('attr-amt');
	        var desc=$(this).attr('attr-desc');
	        var filename=$(this).attr('attr-img');
	        $('#editpackmodel').modal('show');
	        $('#editpackform').find('.pack_id').val(id);
	        $('#editpackform').find('.filename').val(filename);
	        $('#editpackform').find('.pack_name').val(nm);
            $('#editpackform').find('.editamt').val(amt);
	        $('#editpackform').find('.pack_desc').val(desc);
	        ref.find('.myattrtbody').html("");   
	        	$.ajax({    
    			type: 'POST',
    			url: admin_loc+'get_pack_meta',
    			data:'id='+id ,
    		    dataType: "json",
    		    async:false,
    		    success: function(msg){
    		        var html='';
                    $.each(msg, function(k, v) {
                            var str='<select class="categ">';
                            $.each(categ,function(k,vs){
                                if(vs.CATEGORY_ID==v.CATEGORY_ID){
                                    str+='<option value="'+vs.CATEGORY_ID+'" selected>'+vs.CATEGORY_NAME+'</option>';
                                }else{
                                    str+='<option value="'+vs.CATEGORY_ID+'">'+vs.CATEGORY_NAME+'</option>';
                                }
                            });
                            str+='</select>'
    			        html+='<tr><td class="srno">1</td><td>'+str+'</td><td><input type="text" class="attrname" name="" value="'+v.PACK_META_NAME+'" readonly></td>';
                        html+='<td><input type="text" class="attrvalue" name=""  value="'+v.PACK_META_VALUE+'"></td>';
                        html+='<td><button type="button" class="del_row btn bt-sm btn-success"><i class="fa fa-trash"></i> </button></td></tr>';        
                    });

                	ref.find('.myattrtbody').html(html);   
    			}
    		});
    	    update_row(ref);
	    });
	     $("#editpackform").on('submit', function(e){
    	    e.preventDefault();
    		$.ajax({    
    			type: 'POST',
    			url: admin_loc+'editpackform',
    			data: new FormData(this),
    			contentType: false,
    			cache: false,
    			processData:false,
    			beforeSend: function(){
    				$('.editpackform').attr("disabled","disabled");
    				$('.editpackform').html("Please Wait..");
    			},
    			success: function(msg){
    				msg=$.trim(msg);
    				if(msg == 'ok'){
    					sweetalert('Success','success','Package Edited successfully','#469408');
    					$(".editpackform").attr("disabled",false);
    					$('.editpackform').html("Update");
    					location.reload();
    				}else{
    					$(".editpackform").attr("disabled",false);
    					 sweetalert('Warning','warning',msg,'#f99b4a');
    					 $('.editpackform').html("Update");
    					 
    				}
    			}
    		});
	    }); 
    });
    function update_row(ref){
       
        var i=1;
        ref.find('.myattrtbody tr').each(function(){
            $(this).find('.srno').html(i);
            $(this).find('.attrname').attr('name','attr_name_'+i);
            $(this).find('.attrvalue').attr('name','attr_value_'+i);
             $(this).find('.categ').attr('name','categ_'+i);
            i++;
        });
        i=i-1;
        ref.find('.totalrow').val(i);
    }
    
</script>