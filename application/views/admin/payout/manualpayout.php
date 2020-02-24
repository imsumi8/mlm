
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh pad_20">
							<div class="panel-heading">
								<div class="text-center">
									<h1 class="panel-title txt-dark"><i class="fa fa-money"></i> Manual Payout Processing</h1>
									<hr class="reddish">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="text-right">
							    <!--<button type='button' id='btn' class="btn btn-primary" onclick='printDiv();'><i class="fa fa-print"></i> Print</button>-->
							</div>
							<div class="fulldiv" id="DivIdToPrint" style="overflow:auto;">
    							<style>
                                    .table-bordered {
                                    border: 1px solid #ddd !important;
                                }
                                th{
                                    text-align:center !important;
                                    
                                    color: #fff !important;
                                    border: 3px solid #fff !important;
                                
                                }
                                thead tr{
                                    background-color: #419bea !important;
                                }
                                tfoot tr{
                                    background-color: #419bea !important;
                                }
                                tfoot td{
                                    color:#fff !important;
                                }
                                td{
                                    text-align:center;
                                }
                                table{
                                        box-shadow: 0px 0px 12px 0px grey;
                                }
                                .checkboxprocess{
                                    height:20px !important;
                                    width: 20px !important;
                                }
                                .mrg_btm_20{
                                    margin-bottom:20px !important;
                                }
                                </style>
                                <form id="payoutproceess">
                                    <table class="table table-bordered table-striped mrg_tp_25">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="selectall checkboxprocess"></th>
                                                <th>Sr No.</th>
                                                <th>User Id</th>
                                                <th>Name</th>
                                                <th>Paying Amount</th>
                                                <th>Wallet Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query=$this->db->query('Select HRM_ID,HRM_NAME from hrm_post where HRM_STATUS=1 and HRM_ID!=5000 ORDER BY ID ASC');
                                                $result=$query->result();
                                                $i=1;
                                                foreach($result as $res){
                                                    $walletamt=get_wallet_balance($res->HRM_ID);
                                                    if($walletamt>0) {
                                                     ?>
                                                      <tr>
                                                        <td><input type="checkbox" name="check_<?php echo $res->HRM_ID; ?>" value="<?php echo $res->HRM_ID; ?>" class="payoutprocess checkboxprocess"></td>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $res->HRM_ID; ?></td>
                                                        <td><?php echo $res->HRM_NAME; ?></td>
                                                        <td><input type="text" class="form-control input_num amts" name="amt_<?php echo $res->HRM_ID; ?>" value="<?php echo $walletamt; ?>"></td>
                                                        <td><?php echo $walletamt; ?></td>
                                                    </tr>
                                                     <?php $i++;
                                                    }
                                                }
                                                if($i==1){
                                                    ?>
                                                     <tr>
                                                        <td colspan="6">No data available</td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="text-right mrg_btm_20">
    							        <button type='button' id='btn' class="btn btn-primary save"> <i class="fa fa-save"></i> SUBMIT</button>
    							    </div>
							    </form>
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
				
<script type="text/javascript">
    $(document).ready(function() {
        $('.selectall').on('click',function(){
            if($(this). prop("checked") == true){
                 $(".payoutprocess").each(function(){
                     $(this). prop("checked",true);
                 });
            }else{
                $(".payoutprocess").each(function(){
                     $(this). prop("checked",false);
                 });
            }
        });
        $(".save").click(function(){
            var hrms='';
            var amts='';
            var datstring='';
            var i=1;
            $.each($(".payoutprocess:checked"), function(){            
                hrms=hrms+'&hrm_'+i+"="+$(this).val();
                amts=amts+'&amt_'+i+"="+$(this).parents('tr').find('.amts').val();
                i++;
            });
            i=i-1;
            if(hrms!=''){
                datstring=hrms+amts+'&total='+i;
                var datstring = datstring. substring(1, datstring. length);
                if(confirm("Are you sure want to confirm transfer")){ 
        			$.ajax({
        				type: 'POST',
        				url: admin_loc+'manual_payout',
        				data: datstring,
        				async:false,
        				beforeSend: function(){
        					$(this).attr("disabled","disabled");
        				},
        				success: function(msg){
        					msg=$.trim(msg);
        					if(msg == 'ok'){
        						sweetalert('Success','success','Payment Paid Successfully!','#469408');
        						location.reload();
        					}else{
        						 $(this).attr("disabled",false);
        						 sweetalert('Failure','warning',msg,'#f99b4a');
        					}
        				}
        			});
        		}
            }else{
                sweetalert('Error','error','Please select at least one checkbox!','#f99b4a');
            }
        });
    });
</script>
		</div>

        <!-- /Main Content -->