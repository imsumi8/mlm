
<style>
   
   input[type="file"] {
	   display: block !important;
   }
   .swal2-content .swal2-file{
	   display:none !important;
   }
  
</style>

	   <div class="page-wrapper">
		   <div class="container-fluid pt-25">
			   
		   
					   

						   <div class='row'>
							   
										 
	   <div class="panel-heading">Registered Members</div>								
								   <div class='col-md-12 col-sm-12' >
									   <div id="toolbar">
									   
									   </div>
									   <table class='table-striped' id='member_list'
										   data-toggle="table"
										   data-url="<?php echo base_url()."admin_ajax/get_register_members?table=member_list" ?>"
										   data-click-to-select="true"
										   data-side-pagination="server"
										   data-pagination="true"
										   data-page-list="[5, 10, 20, 50, 100, 200]"
										   data-search="true" data-show-columns="true"
										   data-show-refresh="true" data-trim-on-search="false"
										   data-sort-name="HRM_ID" data-sort-order="desc"
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
									   
										   <th data-field="userid" data-sortable="true">Userid</th>
										   <th data-field="username" data-sortable="true">Username</th>
										   <th data-field="mobile" data-events="actionUpdate" data-sortable="true">Mobile</th>
										   <th data-field="email" data-sortable="true">Email</th>
										   <th data-field="sponsorid" data-sortable="true">Sponsorid</th>
										   <th data-field="sponsorname" data-sortable="true">Sponsor Name</th>
										   <th data-field="pay_status" data-sortable="true">Status</th>
										   <!-- <th data-field="operate" data-events="actionUpdate">Action</th>
										    -->
										
									   </tr>
											   
										   </thead>
									   </table>
								   </div>
					   


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

// $this->load->view('admin/product/modal/edit_product');

// $this->load->view('admin/product/modal/view_product');

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

	 			