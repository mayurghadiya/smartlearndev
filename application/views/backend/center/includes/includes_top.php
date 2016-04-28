<meta charset="utf-8" />
    <title><?php echo $page_title; ?> | <?php echo system_name(); ?> </title>
    <meta name="keywords" content="HTML5 Template, CSS3, Mega Menu, Admin Template, Elegant HTML Theme, smart learn" />
    <meta name="description" content="UI Elements Panels Draggable - Responsive Admin HTML Template">
    <meta name="author" content="Venmond">
    
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
		<!-- load the dashboard css -->
		<link href="<?=$this->config->item('css_path')?>student/sDashboard.css" rel="stylesheet">

		<!-- load gitter css -->
		
    
			<!-- Fav and touch icons -->
			<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.png">
			<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
			<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
			<link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
			<link rel="shortcut icon" href="img/logo.png"> 
			
			
			<!-- CSS -->
			   
			<!-- Bootstrap & FontAwesome & Entypo CSS -->
			<link href="<?=$this->config->item('css_path')?>student/bootstrap.min.css" rel="stylesheet" type="text/css">
			<link href="<?=$this->config->item('css_path')?>font-awesome.min.css" rel="stylesheet" type="text/css">
			<!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
			<link href="<?=$this->config->item('css_path')?>font-entypo.css" rel="stylesheet" type="text/css">    

			<!-- Fonts CSS -->
			<link href="<?=$this->config->item('css_path')?>fonts.css"  rel="stylesheet" type="text/css">
					   
			<!-- Plugin CSS -->
			<link href="<?=$this->config->item('custom_plugin')?>jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
			<link href="<?=$this->config->item('custom_plugin')?>prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
			<link href="<?=$this->config->item('custom_plugin')?>isotope/css/isotope.css" rel="stylesheet" type="text/css">
			<link href="<?=$this->config->item('custom_plugin')?>pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
			<link href="<?=$this->config->item('custom_plugin')?>google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> 
		   
				 
			<link href="<?=$this->config->item('custom_plugin')?>mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
			<link href="<?=$this->config->item('custom_plugin')?>tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
			<link href="<?=$this->config->item('custom_plugin')?>bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    
			          

			<!-- Specific CSS -->				
			 
			<?php 
				$skin = $this->db->get_where('system_setting' , array('type' => 'skin_colour'))->row()->description;		
				?>     
     
			<!-- Theme CSS -->
				<link id="pagestyle"  href="<?=$this->config->item('css_path')?>student/<?php echo $skin; ?>" rel="stylesheet" type="text/css">
			  <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
			<link href="<?=$this->config->item('css_path')?>chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->
				
			<!-- Responsive CSS -->
			   <link href="<?=$this->config->item('css_path')?>student/theme-responsive.min.css" rel="stylesheet" type="text/css"> 
			<!-- for specific page in style css -->
		 
			<!-- for specific page responsive in style css -->
				
			
			<!-- Custom CSS -->
			<link href="<?=$this->config->item('asset')?>custom/custom.css" rel="stylesheet" type="text/css">
			
			<!-- Head SCRIPTS -->
			 <script type="text/javascript" src="<?=$this->config->item('js_path')?>modernizr.js"></script> 
			<script type="text/javascript" src="<?=$this->config->item('js_path')?>mobile-detect.min.js"></script> 
			<script type="text/javascript" src="<?=$this->config->item('js_path')?>mobile-detect-modernizr.js"></script> 
		 
			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
			  <script type="text/javascript" src="js/html5shiv.js"></script>
			  <script type="text/javascript" src="js/respond.min.js"></script>     
			<![endif]-->
    
		
		<!-- load jquery library -->
		<script src="<?=$this->config->item('js_path')?>jquery-1.8.2.js" type="text/javascript"> </script>
		<!-- load jquery ui library -->
		<script src="<?=$this->config->item('js_path')?>jquery-ui.js" type="text/javascript"> </script>
		<!-- load touch punch library to enable dragging on touch based devices -->
		<script src="<?=$this->config->item('js_path')?>jquery.ui.touch-punch.js" type="text/javascript"> </script>
		<!-- load gitter notification library -->
		<script src="<?=$this->config->item('js_path')?>jquery.gritter.js" type="text/javascript"> </script>		

		<!-- load flotr2 charting library -->
		<!--[if IE]>
		<script language="javascript" type="text/javascript" src="libs/flotr2/flotr2.ie.min.js"></script>
		<![endif]-->
		<script src="<?=$this->config->item('js_path')?>flotr2.js" type="text/javascript"> </script>
 
		<!-- load dashboard library -->
		<script src="<?=$this->config->item('js_path')?>student/jquery-sDashboard.js" type="text/javascript"> </script>

		
		<!-- example code -->
		<script type="text/javascript">
			$(function() {
				//var randomString = "Lorem ipsum dolor sit amet,consectetur adipiscing elit. Aenean lacinia mollis condimentum. Proin vitae ligula quis ipsum elementum tristique. Vestibulum ut sem erat.";				
					//var base = '<?php echo base_url(); ?>';
				    var datanew1 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('index.php?student/gadgets/1');?>"></iframe>';
					var datanew2 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('index.php?student/gadgets/2');?>"></iframe>';
				    var datanew3 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('index.php?student/gadgets/3');?>"></iframe>'; 
					var datanew4 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('index.php?student/gadgets/4');?>"></iframe>'; 
					var datanew5 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('index.php?student/gadgets/5');?>"></iframe>'; 
					var datanew6 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('index.php?student/gadgets/6');?>"></iframe>';
					var datanew7 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('index.php?student/gadgets/7');?>"></iframe>';
					var datanew8 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('index.php?student/gadgets/8');?>"></iframe>';
					var datanew9 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('index.php?student/gadgets/9');?>"></iframe>';
					var datanew10 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('index.php?student/gadgets/10');?>"></iframe>';
					var datanew11 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('index.php?student/gadgets/11');?>"></iframe>';
				//**********************************************//
				//dashboard json data
				//this is the data format that the dashboard framework expects
				//**********************************************//

				var dashboardJSON = [{
					widgetTitle : "Event Calendar",
					widgetId : "id1",
					enableRefresh : true,
					refreshCallBack : function(widgetId){
						return datanew1 + new Date();
					},
					widgetContent : datanew1
				}, {
					widgetTitle : "Admissions",
					widgetId : "id2",
					enableRefresh : true,
					refreshCallBack : function(widgetId){
						return datanew2 + new Date();
					},
					widgetContent : datanew2
				}, {
					widgetTitle : "Assignments",
					widgetId : "id3",
					enableRefresh : true,
					refreshCallBack : function(widgetId){
						return datanew3 + new Date();
					},
					widgetContent : datanew3
				}, {
					widgetTitle : "Study Resources",
					widgetId : "id4",
					enableRefresh : true,
					refreshCallBack : function(widgetId){
						return datanew4 + new Date();
					},
					widgetContent : datanew4
				}, {
					widgetTitle : "Examinations",
					widgetId : "id5",
					enableRefresh : true,
					refreshCallBack : function(widgetId){
						return datanew5 + new Date();
					},
					widgetContent : datanew5
				},{
					widgetTitle : "Results",
					widgetId : "id6",
					enableRefresh : true,
					refreshCallBack : function(widgetId){
						return datanew6 + new Date();
					},
					widgetContent : datanew6
				},{
					widgetTitle : "Project/Synopsis",
					widgetId : "id7",
					enableRefresh : true,
					refreshCallBack : function(widgetId){
						return datanew7 + new Date();
					},
					widgetContent : datanew7
				},{
					widgetTitle : "Digital Library",
					widgetId : "id9",
					enableRefresh : true,
					refreshCallBack : function(widgetId){
						return datanew9 + new Date();
					},
					widgetContent : datanew9
				},{
				widgetTitle : "Participate",
					widgetId : "id10",
					enableRefresh : true,
					refreshCallBack : function(widgetId){
						return datanew10 + new Date();
					},
					widgetContent : datanew10
				}
				
				
				/*, {
					widgetTitle : "Adding an existing dom element",
					widgetId : "tweet123",
					widgetContent : $("#myTweets")
				}*/];

				//basic initialization example
				$("#myDashboard").sDashboard({
					dashboardData : dashboardJSON
				});
					
				
				//example for adding a text widget
				$("#btnAddWidget").click(function() {
					$("#myDashboard").sDashboard("addWidget", {
						widgetTitle : "Video Conferencing",
						widgetId : "id008",
						enableRefresh : true,
						widgetContent : datanew8
						//widgetContent : "Lorem ipsum dolor sit amet," + "consectetur adipiscing elit." + "Aenean lacinia mollis condimentum." + "Proin vitae ligula quis ipsum elementum tristique." + "Vestibulum ut sem erat."
					});
				});
				
				//example for  deleting a widget
				$("#btnDeleteWidget").click(function() {
					$("#myDashboard").sDashboard("removeWidget", "id008");
				});

				//example for adding a table widget
				$("#btnAddTableWidget").click(function() {
					$("#myDashboard").sDashboard("addWidget", {
						widgetTitle : "Digital Library",
						widgetId : "id007",	
						enableRefresh : true,						
						widgetContent : datanew9
					});

				});

				//example for  deleting a widget
				$("#btnDeleteWidget").click(function() {
					$("#myDashboard").sDashboard("removeWidget", "id007");
				});

				//example for adding a pie chart widget
				$("#btnAddPieChartWidget").click(function() {

					$("#myDashboard").sDashboard("addWidget", {
						widgetTitle : "Participate",
						widgetId : "id006",
						//widgetType : "chart",
						enableRefresh : true,
						widgetContent : datanew10
					});
					//example for  deleting a widget
				$("#btnDeleteWidget").click(function() {
					$("#myDashboard").sDashboard("removeWidget", "id006");
				});
				
				});
				
				//example for adding a pie chart widget
				$("#btnAddbrijWidget").click(function() {
						
					$("#myDashboard").sDashboard("addWidget", {
						widgetTitle : "Staff and Email Directory",
						widgetId : "id45",
						enableRefresh : true,
						widgetContent : datanew11,
						refreshCallBack : function(widgetId){
							return datanew11 + new Date();
						}				
						
					
				});
				
				//example for  deleting a widget
				$("#btnDeleteWidget").click(function() {
					$("#myDashboard").sDashboard("removeWidget", "id45");
				});
				});
			});

		</script>
	</head>