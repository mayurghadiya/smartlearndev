<link rel="stylesheet" href="<?=$this->config->item('css_path')?>style-calender.css">
<link href="<?=$this->config->item('css_path')?>fonts.css"  rel="stylesheet" type="text/css">
<link href="<?=$this->config->item('css_path')?>theme.min.css" rel="stylesheet" type="text/css">
<link href="<?=$this->config->item('css_path')?>chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->    
<link href="<?=$this->config->item('css_path')?>student/sDashboard.css" rel="stylesheet">
 
<!-- Bootstrap & FontAwesome & Entypo CSS -->
<link href="<?=$this->config->item('css_path')?>/student/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=$this->config->item('css_path')?>font-awesome.min.css" rel="stylesheet" type="text/css">
<!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
<link href="<?=$this->config->item('css_path')?>font-entypo.css" rel="stylesheet" type="text/css">    

<!-- Fonts CSS -->
<link href="<?=$this->config->item('css_path')?>fonts.css"  rel="stylesheet" type="text/css">
	   
<!-- Plugin CSS -->
<link href="<?=$this->config->item('custom_plugin')?>jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    

<link href="<?=$this->config->item('custom_plugin')?>/isotope/css/isotope.css" rel="stylesheet" type="text/css">
<link href="<?=$this->config->item('custom_plugin')?>pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
<link href="<?=$this->config->item('custom_plugin')?>google-code-prettify/prettify.css" rel="stylesheet" type="text/css">

<!-- Theme CSS -->
<link href="<?=$this->config->item('css_path')?>student/theme.min.css" rel="stylesheet" type="text/css">
<!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->

<!-- Responsive CSS -->
<link href="<?=$this->config->item('css_path')?>student/theme-responsive.min.css" rel="stylesheet" type="text/css"> 
			
<!-- Responsive CSS -->
<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery.js"></script> 
<script type="text/javascript" src='<?=$this->config->item('custom_plugin')?>jquery-ui/jquery-ui.custom.min.js'></script>
<div class="container"> 
	<div class="form-group">
		 <label class="req" for="reg_input_name">Select Date</label>
		<div data-date-format="yyyy-M-dd" class="input-group date ebro_datepicker">			 
		   <input id="datepicker" name="datepicker1" type="text">
			<span class="input-group-addon"><i class="icon-calendar"></i></span>
		</div>
	</div>
	<!--<div class="row">
		<div class="form-group form-actions">			
			<div class="col-sm-7">
			  <button type="submit" id="event" class="btn vd_btn vd_bg-green vd_white"><i class="icon-ok"></i> Click Me</button>
			</div>
		</div>
	</div>-->
	
	<div class="col-md-6">
		<div data-number="2" date-year="2016" date-month="2" date-day="10" class="day-event" style="display:block;">
			<h2 class="title" id="demo"> </h2>
			<p id="foo"></p>
		</div>
	</div>
	
</div>					
<script type="text/javascript">
	$(document).ready(function() {
		$('#foo').hide();
		$('#datepicker').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
			onSelect: function(dateText, inst) {
				var e_id =  $(this).val();
				//alert(e_id);
				
				 $.ajax({
					 type: "POST",
					url: '<?php echo base_url();?>index.php?student/get_event/' ,
					data: {date: e_id},
					success: function(response)
					{	
						$('#foo').fadeIn();
						jQuery('#demo').html(e_id);
						jQuery('#foo').html(response);
						
					}
				});
			}
		});
	});
	
	
</script>			 