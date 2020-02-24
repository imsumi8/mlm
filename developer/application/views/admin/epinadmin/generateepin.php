<?php

    $query=$this->db->query('Select HRM_ID,HRM_NAME from hrm_post where HRM_STATUS=1 and HRM_ID!=5000');
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
    
	
    
  } );
</script>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark">Generate E-PIN</h1>
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
            											<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#home_6">Custom Epin</a></li>
            											<!--<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#profile_6" aria-expanded="false">Franchisee Epin</a></li>-->
            										    <!--<li role="presentation" class=""><a  data-toggle="tab" id="front_tab_6" role="tab" href="#front_6" aria-expanded="false">Front Site Epin</a></li>-->
            										</ul>
            										<div class="tab-content" id="myTabContent_6">
            											<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
            											    <form id="epingenerate" action=''>
            											        <input type="hidden" name="epinreqid" value="<?php echo $this->uri->segment(6); ?>">
                                								<div class="sections">
                                									<div class="row"><div class="col-md-12"><div class="errors alert alert-warning"></div></div></div>
                                									<div class="row">
                                										<div class="col-md-6">
                                											<div class="form-group">
                                												<div><label>E-PIN Amount <span class="star">*</span></label></div>
                                												<select name="amtid" class="form-control epintype">
                                													<?php $arrepin=array();  foreach($epimamts as $epimamt) {
                                													if(!in_array($epimamt->EPIN_AMT,$arrepin)){
                                													    $arrepin[]=$epimamt->EPIN_AMT;
                                													
                                													?>
                                														<option value="<?php echo $epimamt->EPIN_AMT_ID;?>"><?php echo $epimamt->EPIN_AMT;?></option>
                                													<?php } } ?>
                                												</select>
                                											</div>
                                										</div>
                                										<div class="col-md-6">
                                											<div class="form-group">
                                												<div><label>E-PIN Qty. <span class="star">*</span></label></div>
                                												<input type="text" name="epinqty" class="form-control input_num" value="<?php echo $this->uri->segment(7); ?>"> 
                                											</div>
                                										</div>
                                									</div>
                                									<div class="row">
                                										<div class="col-md-6">
                                											<div class="form-group">
                                												<div><label>Assign E-PIN to User ID <span class="star">*</span></label></div>
                                												<input type="text" name="userid" style="text-transform: uppercase;" class="form-control tags" value="<?php echo $this->uri->segment(4); ?>"> 
                                											</div>
                                										</div>
                                										
                                									</div>
                                									<div class="row">
                                										<div class="col-md-12">
                                											<input type="submit" class="btn btn-success submitepin" value="SUBMIT">
                                										</div>
                                									</div>
                                								</div>
                                							</form>
            											</div>
            											<!--<div  id="profile_6" class="tab-pane fade" role="tabpanel">
            												<form id="epingenerate_franchisee" action=''>
            												    <input type="hidden" name="epinreqid" value="<?php echo $this->uri->segment(6); ?>">
                                								<div class="sections">
                                									<div class="row"><div class="col-md-12"><div class="errors alert alert-warning"></div></div></div>
                                									<div class="row">
                                										<div class="col-md-12">
                                											<div class="form-group">
                                												<div><label>Franchisee Epin <span class="star">*</span></label></div>
                                												<select name="frenchisee_epin" class="form-control fran_type" required>
                                												    <option value="" attr-cost="0" attr-dis="0">--Select Type--</option>
                                													<?php $epimamtss=get_franchisee_income(); foreach($epimamtss as $epimamt) { ?>
                                														<option value="<?php echo $epimamt->NO_EPIN; ?>" attr-cost="<?php echo $epimamt->COST; ?>" attr-dis="<?php echo $epimamt->DISCOUNT; ?>"><?php echo $epimamt->FRANCHISEE_NAME." [ ".$epimamt->NO_EPIN. " ] "; ?></option>
                                													<?php } ?>
                                												</select>
                                											</div>
                                										</div>
                                										<div class="col-md-12">
                                											<div class="form-group">
                                												<div><label>AMOUNT</label></div>
                                												<input type="text" name="amt" class="form-control amt_fran input_num" value="0" readonly> 
                                											</div>
                                										</div>
                                										<div class="col-md-12">
                                											<div class="form-group">
                                												<div><label>Discount</label></div>
                                												<input type="text" name="frandis" class="form-control dis_fran input_num" value="0" readonly> 
                                											</div>
                                										</div>
                                									</div>
                                									<div class="row">
                                										<div class="col-md-12">
                                											<div class="form-group">
                                												<div><label>Assign E-PIN to User ID <span class="star">*</span></label></div>
                                												<input type="text" name="userid" class="form-control tags" value="<?php echo $this->uri->segment(4); ?>"> 
                                											</div>
                                										</div>
                                										
                                									</div>
                                									<div class="row">
                                										<div class="col-md-12">
                                											<input type="submit" class="btn btn-success submitepin_franchisee" value="SUBMIT">
                                										</div>
                                									</div>
                                								</div>
                                							</form>
            											</div>
            											<div  id="front_6" class="tab-pane fade" role="tabpanel">
            											    <form id="epingeneratefront" action=''>
            											        <input type="hidden" name="epinreqid" value="<?php echo $this->uri->segment(6); ?>">
                                								<div class="sections">
                                								    <div class="row">
                                										<div class="col-md-6">
                                											<div class="form-group">
                                												<div><label>E-PIN Amount <span class="star">*</span></label></div>
                                												<select name="amtid" class="form-control">
                                													<?php foreach($epimamts as $epimamt) { ?>
                                														<option value="<?php echo $epimamt->EPIN_AMT_ID;?>"><?php echo $epimamt->EPIN_AMT;?></option>
                                													<?php } ?>
                                												</select>
                                											</div>
                                										</div>
                                										<div class="col-md-6">
                                											<div class="form-group">
                                												<div><label>E-PIN Qty. <span class="star">*</span></label></div>
                                												<input type="text" name="epinqty" class="form-control input_num"> 
                                											</div>
                                										</div>
                                									</div>
                                									<div class="row">
                                										<div class="col-md-12">
                                											<input type="submit" class="btn btn-success epingeneratefront" value="SUBMIT">
                                										</div>
                                									</div>
                                								</div>
                                							</form>
            											</div>-->
            										</div>
            									</div>
            								</div>
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
							<p><?php echo date('Y'); ?> &copy; <?php echo get_option('footer_name'); ?> All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
		
        <!-- /Main Content -->
        <script>
        $('document').ready(function () {
            var side='<?php echo $this->uri->segment(5); ?>';
            var epintype='<?php echo $this->uri->segment(8); ?>';
            if(side!=0 && side!=1){
                $('#profile_tab_6').trigger('click');
                $('#profile_6').addClass('active');
                $('#profile_6').addClass('in');
                $('#home_6').removeClass('active');
                 $('.fran_type option').each(function(){
                   if($(this).attr('value')==side) {
                        $(this).attr('selected',true);
                   }
                });
                $('.fran_type').trigger('change');
            }
            if(side==1){
                $('#front_tab_6').trigger('click');
                $('#front_6').addClass('active');
                $('#front_6').addClass('in');
                $('#home_6').removeClass('active');
            }
            $('.epintype option').each(function(){
                   if($(this).attr('value')==epintype) {
                        $(this).attr('selected',true);
                   }
            });
        });
        </script>