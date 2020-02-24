  <!-- Start Bottom Header -->
  <div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">Our Products</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3"><?php echo $data[0]->PACKAGE_NAME; ?></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Header -->
  <div class="blog-page area-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding-top:20px;">
			<div style="padding:5px;border:1px solid black;box-shadow:0px 0px 5px 0px grey;">
			<img src="<?php echo base_url();?>assets/uploads_assets/<?php echo $data[0]->PACKAGE_IMG; ?>" width="100%" style="max-height:350px;max-width:350px;">
			</div>
        </div>
        <!-- End left sidebar -->
        <!-- Start single blog -->
        <div class="col-md-8 col-sm-8 col-xs-12" style="padding-top:20px;">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="single-blog">
				<div class="blog-text">
                  <h4><a href="javascript:void(0);"><?php echo $data[0]->PACKAGE_NAME." Rs. ".$data[0]->PACKAGE_PRICE; ?></a></h4>
              
                  <h5><?php echo  $data[0]->PACKAGE_DESC; ?></h5>
                 
                   <div class="table-responsive">
                   <table class="table table-bordered mytble table-striped">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                 <th>Category</th>
                                <th>Attribute Name</th>
                                <th>Attribute Value</th>
                               
                            </tr>
                        </thead>
                        <tbody class="myattrtbody">
                           
                        </tbody>
                    </table>
                   </div>
                    <?php  $categ=get_all_matc_pack_category(); 
                  	$json=json_encode($categ);
                   ?>
                  <script>
                  var admin_loc='<?php echo base_url(); ?>admin_ajax/';
                  var id=<?php echo $this->uri->segment('3'); ?>;
                    var categ=<?php echo $json; ?>;
                  	$(document).ready(function(){
	                  $.ajax({    
	    			type: 'POST',
	    			url: admin_loc+'get_pack_meta',
	    			data:'id='+id ,
	    		    dataType: "json",
	    		    async:false,
	    		    success: function(msg){
	    		        var html='';
	    		        var i=1;
	                    $.each(msg, function(k, v) {
	                            var str='';
	                            $.each(categ,function(k,vs){
	                                if(vs.CATEGORY_ID==v.CATEGORY_ID){
	                                    str+=vs.CATEGORY_NAME;
	                                }
	                            });
	                            str+='</select>'
	    			        html+='<tr><td class="srno">'+i+'</td><td>'+str+'</td><td>'+v.PACK_META_NAME+'</td>';
	                        html+='<td>'+v.PACK_META_VALUE+'</td>';
	                          
	                        i++;
	                    });
				if(html==""){
					$('.mytble').hide();
				}
	                	$('.myattrtbody').html(html);   
	    			}
	    		});
	    		});
    		</script>
                </div>
           
              </div>
            </div>
         
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog Area -->

  <div class="clearfix"></div>
