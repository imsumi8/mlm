jQuery(document).ready(function (){
	var check=0;
	$( ".datepicker" ).datepicker( { 
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
        changeYear: true,
		showButtonPanel: true,
		yearRange: "-70:+0",
		maxDate: 0,
	});
	$('.datatabel_common').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'excel', 'pdf', 'print'
		]
	} );
	$('.slides_class').on('click',function () {
	    if($(this).hasClass('fa-minus')==true){
	        $(this).removeClass('fa-minus');
	        $(this).addClass('fa-plus');
	        $(this).parents('.sections').find('.inner_sec_slide').slideUp();
	    }else{
	       $(this).addClass('fa-minus');
	       $(this).removeClass('fa-plus');
	       $(this).parents('.sections').find('.inner_sec_slide').slideDown(); 
	    }
	} );
	$(".imgInp").change(function() {
	        readURL(this);
    });
   $(".imginput").change(function() {
      readimage(this);
    });
	$("#epingenerate").validate({
        rules: {
            "epinqty": {
                required: true,
               
            },
            "userid": {
                required: true,
            }
        },
        
        submitHandler: function (form) { // for demo
			check=1;
        }
    });
    $('body').on('keyup','.withdrawamtvalid',function(){
        var currentval=parseInt($(this).val());
        var targetval=parseInt($(this).attr('attr-amt'));
        if(currentval>targetval){
            $(this).val('');
            sweetalert('Warning','warning','Invalid amount entered!','#f99b4a');
        }
    });
    $('body').on('keydown','.input_num',function (e) {
       
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
        // Allow: Ctrl/cmd+A
        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: Ctrl/cmd+C
        (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: Ctrl/cmd+X
        (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
        // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
        // let it happen, don't do anything
        return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode == 45) || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
        }
    });
	$("#memberregister").validate({
        rules: {
            "firstname": {
                required: true,
               
            },
            "lastname": {
                required: true,
            },
            "phone": {
                required: true,
               
            }, 
			"email": {
               email: true
            },
			"pass" : {
			        required: true,
            },
            "cpass" : {
                required: true,
                equalTo : "#password"
            },
			
			"sponserid":{
				 required: true,
			},
			"pos":{
			    required: true,
			},
			"aadhar":{
			    required: true,
			},
			"pancard":{
			    required: true,
			},
			
		},
        
        submitHandler: function (form) { // for demo
		     $('#checkedform').val('1');
        }
    });
    
	
    $("#freememberregister").validate({
        rules: {
            "firstname": {
                required: true,
               
            },
            "lastname": {
                required: true,
            },
            "phone": {
                required: true,
            }, 
			"email": {
               email: true
            },
			"passfree" : {
			        required: true,
            },
            "cpassfree" : {
                required: true,
                equalTo : "#passwordfree"
            },
			"sponserid":{
				 required: true,
			},
			"epinno":{
			     required: true,
			}
		},
        
        submitHandler: function (form) { // for demo
			 $('#checkedformfree').val('1');
        }
    });
    $("#admin_update_pass").validate({
        rules: {
            
			"pass" : {
			        required: true,
            },
            "cpass" : {
                required: true,
                equalTo : "#password"
            },
		},
        
        submitHandler: function (form) { // for demo
            check=1;
        }
    });
	$("#user_update_pass").validate({
        rules: {
            
			"pass" : {
			        required: true,
            },
            "cpass" : {
                required: true,
                equalTo : "#upassword"
            },
		},
        
        submitHandler: function (form) { // for demo
            check=1;
        }
    });
    $("#sendwithdrawreq").validate({
        rules: {
            
			"amt" : {
			        required: true,
            },
            "noteswithdraw" : {
			        required: true,
            },
           
		},
        
        submitHandler: function (form) { // for demo
            check=1;
        }
    });
	$("#login").on('submit', function(e){
	   
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: admin_loc+'login',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('.login_cl').attr("disabled","disabled");
			},
			success: function(msg){
				msg=$.trim(msg);
				if(msg == 'ok'){
						location.href=base_loc+'dashboard';
				}else{
					 $('.errors').show();
					 $('.errors').html(msg);
					 $('.errors').focus();
					 $('.errors').delay(2000).fadeOut();
					 $(".login_cl").attr("disabled",false);
					 $('#login').trigger('reset');
				}
			}
		});
	});
	$("#wlcmfrm").on('submit', function(e){
	   
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: admin_loc+'wlcmfrm',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('.wlcmclass').attr("disabled","disabled");
			},
			success: function(msg){
				msg=$.trim(msg);
				if(msg == 'ok'){
					sweetalert('Success','success','Content edited successfully','#469408');
					$(".wlcmclass").attr("disabled",false);
				}else{
					 $('.errors').show();
					 $('.errors').html(msg);
					 $('.errors').focus();
					 $('.errors').delay(2000).fadeOut();
					 $(".wlcmclass").attr("disabled",false);
					 sweetalert('Warning','warning','Somwthing wents wrong!','#f99b4a');
					 
				}
			}
		});
	});
	$("#admin_update_pass").on('submit', function(e){
	   
		if(check==1){
		    e.preventDefault();
    		$.ajax({
    			type: 'POST',
    			url: admin_loc+'update_pass',
    			data: new FormData(this),
    			contentType: false,
    			cache: false,
    			processData:false,
    			beforeSend: function(){
    				$('.admin_update_pass').attr("disabled","disabled");
    			},
    			success: function(msg){
    				msg=$.trim(msg);
    				if(msg == 'ok'){
    				    $('#admin_update_pass').trigger('reset');
    					sweetalert('Success','success','Admin Password Updated successfully','#469408');
    					$(".admin_update_pass").attr("disabled",false);
    				}else{
    					$(".admin_update_pass").attr("disabled",false);
    					 sweetalert('Warning','warning',msg,'#f99b4a');
    					 
    				}
    			}
    		});
		}
	});
	$('body').on("click",".actdeactuser", function(){
	   
		var stat=$(this).attr('attr-stat');
	   var userid=$(this).attr('attr-userid');
	   var d=$(this);
		$.ajax({
			type: 'POST',
			url: admin_loc+'update_stat',
			data: "status="+stat+"&userid="+userid,
		    success: function(msg){
				msg=$.trim(msg);
				if(msg == 'ok'){
				    $('#memberregister').trigger('reset');
				    if(stat==0){
				    	sweetalert('Success','success','User Deactivated successfully','#469408');
				        d.removeClass('btn-danger');
				    	d.addClass('btn-success');
				    	d.attr('attr-stat','1');
				    	d.find('.btn-text').html("ACTIVATE USER");
				    }else{
				        sweetalert('Success','success','User Activated successfully','#469408');
				        d.removeClass('btn-success');
				    	d.addClass('btn-danger');
				    	d.attr('attr-stat','0');
				    	d.find('.btn-text').html("DEACTIVATE USER");
				    }
				}else{
				    sweetalert('Warning','warning',msg,'#f99b4a');
				}
			}
		});
		
	});
	$("#user_update_pass").on('submit', function(e){
	   
		if(check==1){
		    e.preventDefault();
    		$.ajax({
    			type: 'POST',
    			url: admin_loc+'update_pass',
    			data: new FormData(this),
    			contentType: false,
    			cache: false,
    			processData:false,
    			beforeSend: function(){
    				$('.user_update_pass').attr("disabled","disabled");
    			},
    			success: function(msg){
    				msg=$.trim(msg);
    				if(msg == 'ok'){
    				    $('#user_update_pass').trigger('reset');
    					sweetalert('Success','success','User Password Updated successfully','#469408');
    					$(".user_update_pass").attr("disabled",false);
    				}else{
    					$(".user_update_pass").attr("disabled",false);
    					 sweetalert('Warning','warning',msg,'#f99b4a');
    					 
    				}
    			}
    		});
		}
	});
	$("#submit_comp_profile").on('submit', function(e){
	   
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: admin_loc+'submit_comp_profile',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('.update_prof_comp').attr("disabled","disabled");
			},
			success: function(msg){
				msg=$.trim(msg);
				if(msg == 'ok'){
					sweetalert('Success','success','Company profile edited successfully','#469408');
					$(".update_prof_comp").attr("disabled",false);
				}else{
					$(".update_prof_comp").attr("disabled",false);
					 sweetalert('Warning','warning',msg,'#f99b4a');
					 
				}
			}
		});
	});
	$("#kycupdate").on('submit', function(e){
	   
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: admin_loc+'kycupdate',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('.kycupdate').attr("disabled","disabled");
			},
			success: function(msg){
				msg=$.trim(msg);
				if(msg == 'ok'){
					sweetalert('Success','success','Kyc uploaded successfully','#469408');
					$(".kycupdate").attr("disabled",false);
					location.reload();
				}else{
					$(".kycupdate").attr("disabled",false);
					 sweetalert('Warning','warning',msg,'#f99b4a');
					 
				}
			}
		});
	});
	$("#submit_soc_profile").on('submit', function(e){
	   
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: admin_loc+'submit_soc_profile',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('.update_soc_comp').attr("disabled","disabled");
			},
			success: function(msg){
				msg=$.trim(msg);
				if(msg == 'ok'){
				    
					sweetalert('Success','success','Company social profile edited successfully','#469408');
					$(".update_soc_comp").attr("disabled",false);
				}else{
					$(".update_soc_comp").attr("disabled",false);
					 sweetalert('Warning','warning',msg,'#f99b4a');
					 
				}
			}
		});
	});
	$("#update_profile_user").on('submit', function(e){
	   
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: admin_loc+'update_profile_user',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('.update_profile_user').attr("disabled","disabled");
				$('.update_profile_user').attr("value","Please Wait..");
			},
			success: function(msg){
				msg=$.trim(msg);
				if(msg == 'ok'){
					sweetalert('Success','success','User profile edited successfully','#469408');
					$(".update_profile_user").attr("disabled",false);
					location.reload();
				}else{
					$(".update_profile_user").attr("disabled",false);
					$('.update_profile_user').attr("value","SUBMIT");
					 sweetalert('Warning','warning',msg,'#f99b4a');
					 
				}
			}
		});
	});
	$(".positioncheck").on('keyup keypress blur', function(e){
	    var entered_no=$(this).val();
	    var d=$(this);
		var datastring='positionid='+entered_no;
		$('.pos option').each(function (){
            $(this).attr('disabled',false);
        });
		$.ajax({
			type: 'POST',
			url: admin_loc+'check_place',
			data: datastring,
			dataType: "JSON",
			success: function(msg){
			    if(msg.message!=""){
			       sweetalert('Warning','warning',msg.message,'#f99b4a');
			       d.val('');
			    }
			    for(var i=0;i<msg.pos.length;i++){
                    var posno=msg.pos[i].POSITION;
                    $('.pos option').each(function (){
                       if($(this).attr('value')==posno) {
                            $(this).attr('disabled',true);
                            $(this).attr('selected',false);
                       }
                    });
                }
			    
				
			}
		});
	});
	$("#memberregister").on('submit', function(e){
		var checked=$('#checkedform').val();
		var pass=$('#password').val();
		if(checked=='1'){
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: admin_loc+'memberregister',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				async:false,
				beforeSend: function(){
					$('.submitregister').attr("disabled","disabled");
					$('.submitregister').attr("value","Please Wait...");
				},
				success: function(msg){
					msg=$.trim(msg);
					console.log(msg);
					var s = msg.substr(0, 2);
					if(s == 'RM'){
						$('#memberregister').trigger('reset');
						 var str="USER ID : "+msg+"<br> PASSWORD : "+pass+"";
						 sweetalert('Member Registration','success',str,'#469408');
						 $(".submitregister").attr("disabled",false);
						 $('#checkedform').val('0');
						 $('.submitregister').attr("value","SUBMIT");
						 var rand=getRndInteger(1000, 9999);
						 $('#password').val(rand);
						 $('#confirm_password').val(rand);
					}else{
						 $(".submitregister").attr("disabled",false);
						 sweetalert('Failure','warning',msg,'#f99b4a');
						 $('#checkedform').val('0');
						 $('.submitregister').attr("value","SUBMIT");
					}
				}
			});
		}
	});
	$("#freememberregister").on('submit', function(e){
		var checked=$('#checkedformfree').val();
		var pass=$('#passwordfree').val();
		if(checked==1){
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: admin_loc+'freememberregister',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				async:false,
				beforeSend: function(){
					$('.freememberregister').attr("disabled","disabled");
				},
				success: function(msg){
			    	msg=$.trim(msg);
					var s = msg.substr(0, 2);
					if(s == '7S'){
						$('#freememberregister').trigger('reset');
						var str="USER ID : "+msg+"<br> PASSWORD : "+pass+"";
						 sweetalert('Free Member Registration','success',str,'#469408');
						 $(".freememberregister").attr("disabled",false);
					}else{
						 $(".freememberregister").attr("disabled",false);
						 sweetalert('Failure','warning',msg,'#f99b4a');
					}
				}
			});
		}
	});
	$("#topup").on('submit', function(e){
		
	    e.preventDefault();
		$.ajax({
			type: 'POST',
			url: admin_loc+'topup',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			async:false,
			beforeSend: function(){
				$('.topup').attr("disabled","disabled");
			},
			success: function(msg){
				msg=$.trim(msg);
				if(msg == 'ok'){
					$('#topup').trigger('reset');
					 sweetalert('Success','success','Member Registered Successfully!','#469408');
					 $(".topup").attr("disabled",false);
					 location.href=base_loc+'topup';
				}else{
					 $(".topup").attr("disabled",false);
					 sweetalert('Failure','warning',msg,'#f99b4a');
				}
			}
		});
		
	});
	$("#sendwithdrawreq").on('submit', function(e){
		if(check==1){
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: admin_loc+'sendwithdrawreq',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				async:false,
				beforeSend: function(){
					$('.sendwithdrawreq').attr("disabled","disabled");
				},
				success: function(msg){
					msg=$.trim(msg);
					if(msg == 'ok'){
						$('#sendwithdrawreq').trigger('reset');
						sweetalert('Success','success','Withdrawl Requests Sended Successfully!','#469408');
						location.reload();
					}else{
					    $('#sendwithdrawreq').trigger('reset');
						 $(".sendwithdrawreq").attr("disabled",false);
						 sweetalert('Failure','warning',msg,'#f99b4a');
					}
				}
			});
		}
	});
	$("#pay_commission").on('submit', function(e){
		
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: admin_loc+'pay_commission',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				async:false,
				beforeSend: function(){
					$('.release_com').attr("disabled","disabled");
				},
				success: function(msg){
					msg=$.trim(msg);
					if(msg == 'ok'){
						sweetalert('Success','success','Payment Done Successfully!','#469408');
						location.reload();
					}else{
						 $('.errors').show();
						 $('.errors').html(msg);
						 $('.errors').focus();
						 $('.errors').delay(5000).fadeOut();
						 $(".release_com").attr("disabled",false);
						 //sweetalert('Failure','warning',msg,'#f99b4a');
					}
				}
			});
	
	});
	$('body').on('click','.view_dt',function(){
            $('.userid').html($(this).attr('attr-id'));
            $('.fullname').html($(this).attr('attr-name'));
            $('.dob').html($(this).attr('attr-dob'));
            $('.address').html($(this).attr('attr-address'));
            $('.pincode').html($(this).attr('attr-pincode'));
            $('.pan').html($(this).attr('attr-pan'));
            $('.email').html($(this).attr('attr-email'));
            $('.mob').html($(this).attr('attr-mob'));
            $('.bank').html($(this).attr('attr-bank'));
            $('.bnk_nm').html($(this).attr('attr-bnk_nm'));
            $('.branchname').html($(this).attr('attr-branchname'));
            $('#myModal').modal('show');
    });
    $('body').on('click','.approve',function(){
           if(confirm("Are you sure want to confirm the approved pending payment")){
               var id=$(this).attr('attr-id');
               	$.ajax({
    				type: 'POST',
    				url: admin_loc+'approve_income',
    				data: 'id='+id,
    				async:false,
    				beforeSend: function(){
    					$(this).attr("disabled","disabled");
    				},
    				success: function(msg){
    					msg=$.trim(msg);
    					if(msg == 'ok'){
    						sweetalert('Success','success','Payment Approved(Pending) Successfully!','#469408');
    						location.reload();
    					}else{
    						 $(this).attr("disabled",false);
    						 sweetalert('Failure','warning',msg,'#f99b4a');
    					}
    				}
    			});
           }
    });
     $('body').on('click','.approve_kyc',function(){
           if(confirm("Are you sure want to approve the KYC detail")){
               var id=$(this).attr('attr-id');
               var dt=$(this);
               	$.ajax({
    				type: 'POST',
    				url: admin_loc+'approve_kyc',
    				data: 'id='+id,
    				async:false,
    				beforeSend: function(){
    				    dt.attr("disabled","disabled");
    				},
    				success: function(msg){
    					msg=$.trim(msg);
    					if(msg == 'ok'){
    						sweetalert('Success','success','KYC Approved Successfully!','#469408');
    						location.reload();
    					}else{
    						 dt.attr("disabled",false);
    						 sweetalert('Failure','warning',msg,'#f99b4a');
    					}
    				}
    			});
           }
    });
    $("#reject_kyc").on('submit', function(e){
		
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: admin_loc+'reject_kyc',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				async:false,
				beforeSend: function(){
					$('.reject_kyc').attr("disabled","disabled");
				},
				success: function(msg){
					msg=$.trim(msg);
					if(msg == 'ok'){
						sweetalert('Success','success','KYC Rejected Successfully','#469408');
						location.reload();
					}else{
						$(".reject_kyc").attr("disabled",false);
						 sweetalert('Failure','warning',msg,'#f99b4a');
					}
				}
			});
	
	});
    $('body').on('blur','.get_name',function(){
        var id=$(this).val();
		
       	$.ajax({
			type: 'POST',
			url: admin_loc+'get_name',
			data: 'id='+id,
			async:false,
			success: function(msg){
				msg=$.trim(msg);
				$('.usrnm').val(msg);
			}
		});
		
           
    });
     $('.packmain').change(function(){
         var d=$(this);
            var id=d.closest('form').find('.get_name_member').val();
            $('.epins_register option').remove();
			$.ajax({
				type: 'POST',
				url: admin_loc+'get_epin_sponsor',
				data: 'id='+id+'&pack='+$('.packmain').val()+'&price='+$('option:selected', '.packmain').attr('attr-price'),
				async:false,
				dataType: "json",
				success: function(msg){
					var str = '';
					
					if(msg!=''){
						$.each(msg, function (index, element) {
							str += "<option value='" + element.EPIN_NO + "'>" + element.EPIN_NO + "</option>";
						});
						$('.epins_register').append(str);
						$('.noepincase').html("");
					}else{
						$('.noepincase').html("Sponsor does not have any epin");
					}
					
				}
			});
         
     });
    $('.get_name_member').focusout(function(){
        
            var d=$(this);
            var id=d.closest('form').find('.get_name_member').val();
            if(id==5000){
                // $('.forleader').hide();
                $('.pos').val('2');
                $('.position_check').val('5000');
            }else{
				$('.pos').val('2');
                $('.forleader').show();
            }
            $('.epins_register option').remove();
			$.ajax({
				type: 'POST',
				url: admin_loc+'get_epin_sponsor',
				data: 'id='+id+'&pack='+$('.packmain').val()+'&price='+$('option:selected', '.packmain').attr('attr-price'),
				async:false,
				dataType: "json",
				success: function(msg){
					var str = '';
					
					if(msg!=''){
						$.each(msg, function (index, element) {
							str += "<option value='" + element.EPIN_NO + "'>" + element.EPIN_NO + "</option>";
						});
						$('.epins_register').append(str);
						$('.noepincase').html("");
					}else{
						$('.noepincase').html("Sponsor does not have any epin");
					}
					
				}
			});
            $.ajax({
				type: 'POST',
				url: admin_loc+'get_name',
				data: 'id='+id,
				async:false,
				success: function(msg){
					msg=$.trim(msg);
					d.closest('form').find('.usrnm').val(msg);
				}
			});
		   var currentname=$.trim(d.closest('form').find('.name_free').val());
           var sponsortype=d.closest('form').find('.sponsor_type:checked').val();
           var matchname=d.closest('form').find('.usrnm').val();
           if(id!='' && currentname!=''){
               if(sponsortype=="other"){
                   if(currentname==matchname){
                       msg="You cannot use your name in other type";
                       $(this).closest('form').find('.name_free').val('');
                       sweetalert('Invalid','warning',msg,'#f99b4a');
                   }
               }else{
                   if(currentname!=matchname){
                       msg="You must have to use your name in self type";
                       $(this).closest('form').find('.name_free').val('');
                       sweetalert('Invalid','warning',msg,'#f99b4a');
                   }
               }
           }else{
                $(this).closest('form').find('.name_free').val('');
           }
           
    });
    $('.name_free').focusout(function(){
           var id=$(this).closest('form').find('.get_name_member').val();
           var currentname=$.trim($(this).closest('form').find('.name_free').val());
           var sponsortype=$(this).closest('form').find('.sponsor_type:checked').val();
           var matchname=$(this).closest('form').find('.usrnm').val();
          
           if(id!='' && currentname!=''){
                if(sponsortype=="other"){
                   if(currentname==matchname){
                       msg="You cannot use your name in other type";
                       $(this).closest('form').find('.name_free').val('');
                       sweetalert('Invalid','warning',msg,'#f99b4a');
                   }
               }else{
                   if(currentname!=matchname){
                       msg="You must have to use your name in self type";
                       $(this).closest('form').find('.name_free').val('');
                       sweetalert('Invalid','warning',msg,'#f99b4a');
                   }
               }
           }else{
                $(this).closest('form').find('.name_free').val('');
           }
    });
    $('.sponsor_type').on('click',function(){
           var id=$(this).closest('form').find('.get_name_member').val();
           var currentname=$.trim($(this).closest('form').find('.name_free').val());
           var sponsortype=$(this).closest('form').find('.sponsor_type:checked').val();
           var matchname=$(this).closest('form').find('.usrnm').val();
          
            if(id!='' && currentname!=''){
               if(sponsortype=="other"){
                   if(currentname==matchname){
                       msg="You cannot use your name in other type";
                       $(this).closest('form').find('.name_free').val('');
                       sweetalert('Invalid','warning',msg,'#f99b4a');
                   }
               }else{
                   if(currentname!=matchname){
                       msg="You must have to use your name in self type";
                       $(this).closest('form').find('.name_free').val('');
                       sweetalert('Invalid','warning',msg,'#f99b4a');
                   }
               }
            }else{
                $(this).closest('form').find('.name_free').val('');
           }
    });
    $('body').on('click','.approvepaid',function(){
           if(confirm("Are you sure want to final approve the withdrawl request")){
               var id=$(this).attr('attr-id');
               var userid=$(this).attr('attr-userid');
               var amt=$(this).attr('attr-amt');
               	$.ajax({
    				type: 'POST',
    				url: admin_loc+'approve_paid_income',
    				data: 'id='+id+'&userid='+userid+'&amt='+amt,
    				async:false,
    				beforeSend: function(){
    					$(this).attr("disabled","disabled");
    				},
    				success: function(msg){
    					msg=$.trim(msg);
    					if(msg == 'ok'){
    						sweetalert('Success','success','Payment Approved Successfully!','#469408');
    						location.reload();
    					}else{
    						 $(this).attr("disabled",false);
    						 sweetalert('Failure','warning',msg,'#f99b4a');
    					}
    				}
    			});
           }
    });
    $('body').on('click','.cancel',function(){
           if(confirm("Are you sure want to cancel the withdrawl request")){
               var id=$(this).attr('attr-id');
               	$.ajax({
    				type: 'POST',
    				url: admin_loc+'cancel_income',
    				data: 'id='+id,
    				async:false,
    				beforeSend: function(){
    					$(this).attr("disabled","disabled");
    				},
    				success: function(msg){
    					msg=$.trim(msg);
    					if(msg == 'ok'){
    						sweetalert('Success','success','Request Rejected Successfully!','#469408');
    						location.reload();
    					}else{
    						 $(this).attr("disabled",false);
    						 sweetalert('Failure','warning',msg,'#f99b4a');
    					}
    				}
    			});
           }
    });
    $('.pay_comission').on('click',function(){
            var userid=$(this).attr('attr-id');
            var amt=$(this).attr('attr-amount');
            var name=$(this).attr('attr-name');
            $('#name').val(name);
            $('#user_id').val(userid);
            $('#amount').val(amt);
            $('#payment_modal').modal('show');
    });
    $('.cancel_kyc').on('click',function(){
            var userid=$(this).attr('attr-id');
            $('.kyc_id').val(userid);
            $('#reason_modal').modal('show');
    });
	$(".cnf_transfer").on('click', function(){
		    var userid=$(this).attr('attr-id');
		    var amt=$(this).attr('attr-amount');
		    var pendid=$(this).attr('attr-pendid');
		if(confirm("Are you sure want to confirm transfer")){ 
			$.ajax({
				type: 'POST',
				url: admin_loc+'cnfrm_commission',
				data: 'user_id='+userid+'&amt='+amt+'&pendid='+pendid,
				async:false,
				beforeSend: function(){
					$(this).attr("disabled","disabled");
				},
				success: function(msg){
					msg=$.trim(msg);
					if(msg == 'ok'){
						sweetalert('Success','success','Payment Confirmed Successfully!','#469408');
						location.reload();
					}else{
						 $(this).attr("disabled",false);
						 sweetalert('Failure','warning',msg,'#f99b4a');
					}
				}
			});
		}
	
	});
	$("#getepinfront").on('submit', function(e){
	   
	        e.preventDefault();
    		$.ajax({
    			type: 'POST',
    			url: admin_loc+'getepinfront',
    			data: new FormData(this),
    			contentType: false,
    			cache: false,
    			processData:false,
    			beforeSend: function(){
    				$('.getepinfront').attr("disabled","disabled");
    			},
    			success: function(msg){
    				msg=$.trim(msg);
    				if(msg == 'ok'){
    					$('#getepinfront').trigger('reset');
    					sweetalert('Success','success','Request Submitted Successfully!','#469408');
    					$(".getepinfront").attr("disabled",false);
    				}else{
    					$(".getepinfront").attr("disabled",false);
    					sweetalert('Failure','warning',msg,'#f99b4a');
    				}
    			}
    		});
	    
	});
	$("#epingenerate").on('submit', function(e){
	    	if(check==1){
        		e.preventDefault();
        		$.ajax({
        			type: 'POST',
        			url: admin_loc+'epingenerate',
        			data: new FormData(this),
        			contentType: false,
        			cache: false,
        			processData:false,
        			beforeSend: function(){
        				$('.submitepin').attr("disabled","disabled");
        				$('.submitepin').attr("value","Please Wait...");
        			},
        			success: function(msg){
        				msg=$.trim(msg);
        				if(msg == 'ok'){
        					$('#epingenerate').trigger('reset');
        					sweetalert('Success','success','E-Pin Generated Successfully!','#469408');
        					$(".submitepin").attr("disabled",false);
        				    location.href = base_loc+"epin/request";
        				    $('.submitepin').attr("value","SUBMIT");
        				}else{
        					 $(".submitepin").attr("disabled",false);
        					 sweetalert('Failure','warning',msg,'#f99b4a');
        					 $('.submitepin').attr("value","SUBMIT");
        				}
        			}
        		});
	    	}
	});

	$("#add_category").validate({
        rules: {
            "category": {
                required: true,
               
            }
        },
        
        submitHandler: function (form) { // for demo
			check=1;
        }
	});
	
	$("#add_category").on('submit', function(e){
		if(check==1){
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: admin_loc+'add_category',
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				beforeSend: function(){
					$('.submitcategory').attr("disabled","disabled");
					$('.submitcategory').attr("value","Please Wait...");
				},
				success: function(msg){
					msg=$.trim(msg);
					if(msg == 'ok'){
						$('#add_category').trigger('reset');
						sweetalert('Success','success','Category Added Successfully!','#469408');
						$(".submitcategory").attr("disabled",false);
						//location.href = base_loc+"add_category";
						$('#category_list').bootstrapTable('refresh');
						$('.submitcategory').attr("value","SUBMIT");
					}else{
						 $(".submitcategory").attr("disabled",false);
						 sweetalert('Failure','warning',msg,'#f99b4a');
						 $('.submitcategory').attr("value","SUBMIT");
					}
				}
			});
		}
});

$("#add_subcategory").validate({
	rules: {
		"category_id": {
			required: true,
		   
		},
		"subcategory": {
			required: true,
		   
		}
	},
	
	submitHandler: function (form) { // for demo
		check=1;
	}
});

$("#add_subcategory").on('submit', function(e){
	if(check==1){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: admin_loc+'add_subcategory',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('.submitsubcategory').attr("disabled","disabled");
				$('.submitsubcategory').attr("value","Please Wait...");
			},
			success: function(msg){
				msg=$.trim(msg);
				if(msg == 'ok'){
					$('#add_subcategory').trigger('reset');
					sweetalert('Success','success','Sub-Category Added Successfully!','#469408');
					$(".submitsubcategory").attr("disabled",false);
					//location.href = base_loc+"add_category";
					$('#subcategory_list').bootstrapTable('refresh');
					$('.submitsubcategory').attr("value","SUBMIT");
				}else{
					 $(".submitsubcategory").attr("disabled",false);
					 sweetalert('Failure','warning',msg,'#f99b4a');
					 $('.submitsubcategory').attr("value","SUBMIT");
				}
			}
		});
	}
});

$("#add_product").validate({
	rules: {
		"category_id": {
			required: true,
		   
		},
		"subcategory": {
			required: true,
		   
		},
		"name": {
			required: true,
		   
		},
		"mrp": {
			required: true,
		   
		},
		"dp": {
			required: true,
		   
		},
		"bv": {
			required: true,
		   
		},
		"gst": {
			required: true,
		   
		},
		
	},
	
	submitHandler: function (form) { // for demo
		check=1;
	}
});

$("#add_product").on('submit', function(e){
	if(check==1){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: admin_loc+'add_product',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('.submitproduct').attr("disabled","disabled");
				$('.submitproduct').attr("value","Please Wait...");
			},
			success: function(msg){
				msg=$.trim(msg);
				if(msg == 'ok'){
					$('#add_product').trigger('reset');
					sweetalert('Success','success','Product Added Successfully!','#469408');
					$(".submitproduct").attr("disabled",false);
					//location.href = base_loc+"add_category";
					$('#product_list').bootstrapTable('refresh');
					$('.submitproduct').attr("value","SUBMIT");
				}else{
					 $(".submitproduct").attr("disabled",false);
					 sweetalert('Failure','warning',msg,'#f99b4a');
					 $('.submitproduct').attr("value","SUBMIT");
				}
			}
		});
	}
});
	$("#epingeneratefront").on('submit', function(e){
	        e.preventDefault();
    		$.ajax({
    			type: 'POST',
    			url: admin_loc+'epingeneratefront',
    			data: new FormData(this),
    			contentType: false,
    			cache: false,
    			processData:false,
    			beforeSend: function(){
    				$('.epingeneratefront').attr("disabled","disabled");
    			},
    			success: function(msg){
    				msg=$.trim(msg);
    				if(msg == 'ok'){
    				sweetalert('Success','success','E-Pin Generated Successfully!','#469408');
    					$(".epingeneratefront").attr("disabled",false);
    				    location.href = base_loc+"epin/request";
    				}else{
    					$(".epingeneratefront").attr("disabled",false);
    					sweetalert('Failure','warning',msg,'#f99b4a');
    				}
    			}
    		});
	    
	});
	$("#epingenerate_franchisee").on('submit', function(e){
	    	
    		e.preventDefault();
    		$.ajax({
    			type: 'POST',
    			url: admin_loc+'epingenerate_franchisee',
    			data: new FormData(this),
    			contentType: false,
    			cache: false,
    			processData:false,
    			beforeSend: function(){
    				$('.submitepin_franchisee').attr("disabled","disabled");
    			},
    			success: function(msg){
    				msg=$.trim(msg);
    				if(msg == 'ok'){
    					$('#epingenerate_franchisee').trigger('reset');
    					sweetalert('Success','success','E-Pin Generated Successfully!','#469408');
    					$(".submitepin_franchisee").attr("disabled",false);
    					location.href = base_loc+"epin/request";
    				}else{
    					 $('.errors').show();
    					 $('.errors').html(msg);
    					 $('.errors').focus();
    					 $('.errors').delay(5000).fadeOut();
    					 $(".submitepin_franchisee").attr("disabled",false);
    					sweetalert('Failure','warning',msg,'#f99b4a');
    				}
    			}
    		});
	    	
	});
	$('.state').on('change',function () {
	    $('.city option').remove();
	    if($(this).val()!=''){
    	    $.ajax({
    			type: 'POST',
    			url: admin_loc+'get_district',
    			data: 'stateid='+$(this).val(),
    		    dataType: "json",
    			success: function(msg){
    			    var str='';
    			    str +="<option value=''>--Select District--</option>";
    				$.each(msg, function(index, element) {
                        str +="<option value='"+element.DISTRICT_NAME+"'>"+element.DISTRICT_NAME+"</option>";
                    });
                    $('.city').append(str);
    			}
    		});
	    }else{
	        var str='';
    	    str +="<option value=''>--Select District--</option>";
    	    $('.city').append(str);
	    }
	});
	$('.fran_type').on('change',function () {
	    $('.amt_fran').val($('option:selected', this).attr('attr-cost'));
	    $('.dis_fran').val($('option:selected', this).attr('attr-dis'));
	});
	$("#reqpin").on('submit', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: admin_loc+'reqpin',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('.submitreqpin').attr("disabled","disabled");
				$('.submitreqpin').attr("value","Please Wait..");
			},
			success: function(msg){
				msg=$.trim(msg);
				if(msg == 'ok'){
					$('#reqpin').trigger('reset');
					sweetalert('Success','success','Request Submitted Successfully!','#469408');
					$(".submitreqpin").attr("disabled",false);
					$('.submitreqpin').attr("value","SUBMIT");
				}else{
					$(".submitreqpin").attr("disabled",false);
					sweetalert('Failure','warning','Something Wents Wrong','#f99b4a');
					$('.submitreqpin').attr("value","SUBMIT");
				}
			}
		});
	});
	$("#epinrequest_franchisee").on('submit', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: admin_loc+'epinrequest_franchisee',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('.requestepin_franchisee').attr("disabled","disabled");
			},
			success: function(msg){
				msg=$.trim(msg);
				if(msg == 'ok'){
					$('#epinrequest_franchisee').trigger('reset');
					sweetalert('Success','success','Franchisee Request Submitted Successfully!','#469408');
					$(".requestepin_franchisee").attr("disabled",false);
				}else{
					 $(".requestepin_franchisee").attr("disabled",false);
					sweetalert('Failure','warning','Something Wents Wrong','#f99b4a');
				}
			}
		});
	});
}); 
 function print_report() {
        var myPrintContent = document.getElementById('print_area');
        var myPrintWindow = window.open("", "Print Report", 'left=300,top=100,width=700,height=500', '_blank');
        myPrintWindow.document.write(myPrintContent.innerHTML);
        myPrintWindow.document.close();
        myPrintWindow.focus();
        myPrintWindow.print();
        myPrintWindow.close();
        return false;
    }
function sweetalert(title,types,texts,colorcode){
		swal({   
			title: title,   
            type: types, 
			html: texts,
			confirmButtonColor: colorcode,   
        });
}
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
       // $('#imagesrc').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
function readimage(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
        $('#imagesrc').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}
function display_ct() {
    
    var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
  "July", "Aug", "Sept", "Oct", "Nov", "Dec"
];

var date = new Date();

var hours = date.getHours();
var minutes = date.getMinutes();
var ampm = date.getHours() >= 12 ? 'PM' : 'AM';
hours = hours % 12;
hours = hours ? hours : 12; // the hour '0' should be '12'
minutes = minutes < 10 ? '0' + minutes : minutes;
if(date.getSeconds()<10){
    x="0"+date.getSeconds();
}else{
    x=date.getSeconds();
}
var strTime = hours + ':' + minutes + ':' + x + ' ' + ampm;

x1=monthNames[date.getMonth()] + " " + date.getDate() + " " + date.getFullYear() + " " + strTime;

document.getElementById('ct').innerHTML = x1;
display_c();
 }
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  sweetalert('Copied to clipboard','success','Copied Successfully!','#469408');
  $temp.remove();
}
function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min) ) + min;
}