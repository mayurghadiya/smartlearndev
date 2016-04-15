<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<?php if($this->uri->segment(2) != 'dashboard' ){ ?>
<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery.js"></script>
<?php } ?> 
<!--[if lt IE 9]>
  <script type="text/javascript" src="js/excanvas.js"></script>      
<![endif]-->
<script type="text/javascript" src="<?=$this->config->item('js_path')?>bootstrap.min.js"></script>	
<script src="<?php echo base_url(); ?>assets/js/jquery.toaster.js"></script>
<script>
<?php
$message = $this->session->flashdata('flash_message');
if($message != '') { ?>
$.toaster({ 
	priority : 'success', 
	title : 'Success! ', 
	message : '<?php echo $message; ?>',
	timeOut: 5000
});
<?php } ?>
 </script> 
<script type="text/javascript" src='<?=$this->config->item('custom_plugin')?>jquery-ui/jquery-ui.custom.min.js'></script>
<script type="text/javascript" src="<?=$this->config->item('custom_plugin')?>jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript" src="<?=$this->config->item('js_path')?>caroufredsel.js"></script> 

<script type="text/javascript" src="<?=$this->config->item('js_path')?>plugins.js"></script>


<script type="text/javascript" src="<?=$this->config->item('custom_plugin')?>breakpoints/breakpoints.js"></script>

<script type="text/javascript" src="<?=$this->config->item('custom_plugin')?>prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 

<script type="text/javascript" src="<?=$this->config->item('custom_plugin')?>mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?=$this->config->item('custom_plugin')?>tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?=$this->config->item('custom_plugin')?>bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?=$this->config->item('custom_plugin')?>blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?=$this->config->item('custom_plugin')?>pnotify/js/jquery.pnotify.min.js"></script>

<script type="text/javascript" src="<?=$this->config->item('js_path')?>theme.js"></script>
<script type="text/javascript"> 
    var base_url ="<?php echo base_url(); ?>";  
</script>
 <script type="text/javascript" src="<?php echo base_url().'assets/custom/custom2.js' ?>"></script>
<script type="text/javascript" src="<?=$this->config->item('asset')?>custom/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/custom/custom3.js' ?>"></script>
 
<!-- Specific Page Scripts Put Here -->
 <script src="<?=$this->config->item('js_path')?>simplecalendar.js" type="text/javascript"></script>
<!-- Specific Page Scripts END -->
<script type="text/javascript" src="<?=$this->config->item('custom_plugin')?>dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=$this->config->item('custom_plugin')?>dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		"use strict";				
		$('#data-tables').DataTable( {
             aoColumnDefs: [
                {
                   bSortable: false,
                   aTargets: [ -1 ]
                }
              ]
        } );

	} );
</script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/multiselect.min.js"></script>
	<script src="<?=$this->config->item('js_path')?>jquery.validate.min.js"></script>
	<script src="<?=$this->config->item('js_path')?>additional-methods.min.js"></script>
	<script type="text/javascript">
//	$.validator.setDefaults({
//		submitHandler: function() {
//			 var form = document.getElementsByTagName("form");
//			 form.submit();
//		}
//	});

	$().ready(function() {
		
		// validate signup form on keyup and submit
		$("#systemform").validate({
			rules: {
				system_name: "required",				
				phone: {
					required: true,
					phoneUS: true
				},
				paypal_email: {
					required: true,
					email: true
				},
				currency: "required",	
				
				system_email: {
					required: true,
					email: true
				}
			},
			messages: {
				system_name: "Please enter your system name",				
				phone: {
					required: "Please Enter Phone",
					phoneUS: "Please Enter Valid Phone "
				},
				paypal_email: {
					required: "Please Enter  Paypal Email",
					email: "Please Enter Valid Email"
				},			
				currency: "Please enter Currency",
				system_email: {
					required: "Please Enter  System Email",
					email: "Please Enter Valid Email"
				}				
			}
		});
		});
		$().ready(function() {
		$.validator.addMethod("slurl", 
			  function(value, element) {
				 return !/(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/.test(value);
				}, 
				 "No URL's"
			  );
				  
				  
		// validate signup form on keyup and submit
		$("#edit_profile").validate({
			rules: {
				email: {
					required: true,
					email: true
				},
				name: "required",
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},	
				ad_first_name : "required",
				ad_last_name : "required",
				ad_birthdate : "required",
				ad_branch : "required",				
				ad_mobile: {
					required: true,
					phoneUS: true
				},
				ad_fb: {
					required: true,
					 url: "slurl"
				},
				ad_twitter: {
					 required: true,
					 url: "slurl"
				}
			},
			messages: {
				email: {
					required: "Please Enter  Email",
					email: "Please Enter Valid Email"
				},	
				name: "Please enter your name",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				ad_first_name: "Please enter First name",				
				ad_last_name: "Please enter Last name",				
				ad_birthdate: "Please enter Birthdate",				
				ad_branch: "Please Select Branch",							
				ad_mobile: {
					required: "Please Enter Phone",
					phoneUS: "Please Enter Valid Phone "
				},
				ad_fb: {
					required: "Please Enter  URL",
					url: "Please Enter Valid URL"
				},
				ad_twitter: {
					required: "Please Enter  URL",
					url: "Please Enter Valid URL"
				}				
			}
		});
	});
	
	//Start Herry Patel
	$().ready(function() {
		
		// validate create_group form on keyup and submit
		$("#create_group").validate({
			rules: {
				group_name: "required",				
				user_type: "required",				
                                'user_role[]': "required",
                                degree: "required",
                                course: "required",
                                batch: "required",
                                semester: "required",
			},
			messages: {
				group_name: "Enter group name",				
				user_type: "Select user type",
				'user_role[]': "Select user",	
                                degree: "Select course",
                                course: "Select branch",
                                batch: "Select batch",
                                semester: "Select semester",
			}
		});
		});

		$().ready(function() {
		$("#list_group").validate({
			rules: {
				group_name: "required",				
				user_type: "required",	
				'user_role[]':"required", 
			},
			messages: {
				group_name: "Please enter group name",				
				user_type: "Please select user type",
				'user_role[]': "Please select user",			
			}
		});
		});
		
		$().ready(function() {
		$("#assign_module").validate({
			rules: {
				group_name: "required",				
				module_name: "required",
			},
			messages: {
				group_name: "Please enter group name",				
				module_name: "Value required ",			
			}
		});
		});
		
		$().ready(function() {
		$("#list_module").validate({
			rules: {
				group_name: "required",				
				module_name: "required",
			},
			messages: {
				group_name: "Please select group name",				
				module_name: "Value required ",			
			}
		});
		});
	
	//End Herry Patel
	</script>
	

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->