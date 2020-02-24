<?php

    $query=$this->db->query('Select HRM_ID,HRM_NAME from hrm_post where HRM_STATUS=1 and HRM_ID!=5000 and HRM_ID!="'.$this->session->userdata('userid').'" order by ID ASC');
    $result=$query->result();
    $large_arr=array();
   
    foreach($result as $res){
          $minarray=array();
          $minarray['label']=$res->HRM_ID." [ ".$res->HRM_NAME." ]";
          $minarray['value']=$res->HRM_ID;
          array_push($large_arr,$minarray);
    }
    
?>
<script>
    
    $( function() {
    
    var availableTags = <?php echo json_encode($large_arr); ?>;
    $( ".tags" ).autocomplete({
      source: availableTags
    });
    
    $('.multitpleselect').multiselect({

        includeSelectAllOption: true
        
     });
    
  } );


</script>
<style>
    .dropdown-toggle{
        width: 100% !important;

        text-align: left  !important;

        background-color: #fff !important;
    }
    .btn-group{
        width:100% !important;
    }
    .multiselect-container{
        width: 100% !important;
    }
    .multiselect:hover
    {
        border: solid 1px gainsboro !important;

        color: #212121 !important;
    }
    .caret{
        display:none;
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
									<h1 class="panel-title txt-dark"> <i class="fa fa-shopping-basket"></i> TRANSFER E-PIN</h1>
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
            									<form id="epintransfer" action=''>
            									    <input type="hidden" id="checked" value="0">
											       <div class="sections">
                    									<div class="row">
                    										<div class="col-md-6">
                    										    <div class="form-group">
                    										        <div><label>E-PINS <span class="star">*</span></label></div>
                        											<select name="epinno[]" class="multitpleselect form-control" multiple="multiple" required>
                                                                        <?php foreach($epinunused as $unuse) { ?>
                                                                        <option value="<?php echo $unuse->EPIN_NO; ?>"><?php echo $unuse->EPIN_NO; ?></option>
                                                                        <?php  }?>
                                                                    </select>
                                                                </div>
                    										</div>
                    										<div class="col-md-6">
                    											<div class="form-group">
                    												<div><label>Assign E-PIN to User ID <span class="star">*</span></label></div>
                    												<input type="text" name="userid" class="form-control tags" value="" required> 
                    											</div>
                    										</div>
                    									</div>
                    									<div class="row">
                    									    <div class="col-md-12">
                    											<div class="form-group">
                    												<div><label>Message. <span class="star">*</span></label></div>
                    												<textarea name="desc_epin_trans" class="form-control" required></textarea>
                    											</div>
                    										</div>
                    									</div>
                    									<div class="row">
                    										<div class="col-md-12">
                    											<input type="submit" class="btn btn-primary epintransfer" value="TRANSFER">
                    										</div>
                    									</div>
                    								</div>
                    							</form>
            							</div>
            						</div>
            					</div>
            				</div>
            				<!-- /Row -->
						</div>
					</div>
					
				</div> 
				<!-- /Row -->
			</div>
			
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>2018 &copy; <?php echo get_option('footer_name'); ?>. All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
		<script>
		$("#epintransfer").on('submit', function(e){
	    
            		e.preventDefault();
            		$.ajax({
            			type: 'POST',
            			url: admin_loc+'epintransfer',
            			data: new FormData(this),
            			contentType: false,
            			cache: false,
            			processData:false,
            			beforeSend: function(){
            				$('.epintransfer').attr("disabled","disabled");
            			},
            			success: function(msg){
            				msg=$.trim(msg);
            				if(msg == 'ok'){
            					$('#epintransfer').trigger('reset');
            					sweetalert('Success','success','E-Pin Transfered Successfully!','#469408');
            					$(".epintransfer").attr("disabled",false);
            					location.reload();
            					$('#checked').val('0');
            				}else{
            					$(".epintransfer").attr("disabled",false);
            					sweetalert('Failure','warning',msg,'#f99b4a');
            					$('#checked').val('0');
            				}
            			}
            		});
    	    	
		    })
		</script>
        