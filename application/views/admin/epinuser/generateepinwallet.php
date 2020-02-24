
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark"> <i class="fa fa-shopping-basket"></i> GENERATE E-PIN FROM WALLET</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="row">
            				    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            						<div class="panel panel-default card-view pa-0">
            							<div class="panel-wrapper collapse in">
            								<div class="panel-body pa-0">
            									<div class="sm-data-box actived">
            										<div class="container-fluid">
            											<div class="row">
            												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
            												    <i class="weight-500 uppercase-font txt-light block">Net Wallet Balance</i>
            													<span class="txt-light block counter"><span class="counter-anim"><?php $arr=get_hrm_post($this->session->userdata('userid')); if($arr[0]->HRM_STATUS=='1') { echo get_wallet_balance($this->session->userdata('userid')); } else { echo '0'; } ?></span></span>
            												</div>
            												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
            													<i class="txt-light fa fa-suitcase fnt_50"></i>
            												</div>
            											</div>	
            										</div>
            									</div>
            								</div>
            							</div>
            						</div>
            					</div>
            					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            						<div class="panel panel-default card-view pa-0">
            							<div class="panel-wrapper collapse in">
            								<div class="panel-body pa-0">
            									<div class="sm-data-box bg-red">
            										<div class="container-fluid">
            											<div class="row">
            												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
            												    <i class="weight-500 uppercase-font txt-light block">Valid Wallet Balance</i>
            													<span class="txt-light block counter"><span class="counter-anim liableamt"><?php echo liable_amount_to_pay($this->session->userdata('userid')); ?></span></span>
            												</div>
            												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
            													<i class="txt-light fa fa-suitcase fnt_50"></i>
            												</div>
            											</div>	
            										</div>
            									</div>
            								</div>
            							</div>
            						</div>
            					</div>
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
            										
            										</ul>
            										<div class="tab-content" id="myTabContent_6">
            											<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
            											    <form id="epingeneratewallet" action=''>
            											        <div class="sections">
                                									<div class="row">
                                										<div class="col-md-6">
                                											<div class="form-group">
                                												<div><label>E-PIN Amount <span class="star">*</span></label></div>
                                												<select name="amtid" class="form-control amtid">
                                													<?php $arrepin=array(); foreach($epimamts as $epimamt) {
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
                                												<input type="text" name="epinqty" class="form-control input_num quant" required> 
                                											</div>
                                										</div>
                                									</div>
                                								    <input type="hidden" name="userid" class="form-control tags" value="<?php echo $this->session->userdata('userid'); ?>"> 
                                									<div class="row mrg_tp_15">
                                										<div class="col-md-12">
                                											<input type="submit" class="btn btn-primary epingeneratewallet" value="SUBMIT">
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
						</div>
					</div>
					
				</div> 
				<!-- /Row -->
			</div>
			
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>2018 &copy; BRIGHT DEAL. All rights reserved</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
		<script>
		$(document).ready(function(){
		    var liable=parseInt($('.liableamt').text());
		    $('.amtid').on('change',function(){
		        var value=$('.quant').val();
		       var pricing = $('option:selected', '.amtid').html();
		      
		        var price=pricing*value;
		        if(price>liable){
		            sweetalert('Failure','warning','Insufficient wallet amount','#f99b4a');
		            $(this).val('');
		        }
		    });
		   	$('.quant').on('keyup',function(){
		       var value=$(this).val();
		       var pricing = $('option:selected', '.amtid').html();
		      
		        var price=pricing*value;
		        if(price>liable){
		            sweetalert('Failure','warning','Insufficient wallet amount','#f99b4a');
		            $(this).val('');
		        }
		    });
		    $('.franselect').on('change',function(){
		       var value=$(this).val();
		        var pricing = $('option:selected', '.amtid').html();
		        var price=pricing*value;
		        if(price>liable){
		            sweetalert('Failure','warning','Insufficient wallet amount','#f99b4a');
		            $(this).val('');
		        }
		    });
		    $("#epingeneratewallet").on('submit', function(e){
        	    e.preventDefault();
        		$.ajax({
        			type: 'POST',
        			url: admin_loc+'epingeneratewallet',
        			data: new FormData(this),
        			contentType: false,
        			cache: false,
        			processData:false,
        			beforeSend: function(){
        				$('.epingeneratewallet').attr("disabled","disabled");
        			},
        			success: function(msg){
        				msg=$.trim(msg);
        				if(msg == 'ok'){
        					$('#epingeneratewallet').trigger('reset');
        					sweetalert('Success','success','E-Pin Generated Successfully!','#469408');
        					$(".epingeneratewallet").attr("disabled",false);
        				    location.reload();
        				}else{
        					$(".epingeneratewallet").attr("disabled",false);
        					sweetalert('Failure','warning',msg,'#f99b4a');
        				}
        			}
        		});
    	    });
		});
		</script>
       