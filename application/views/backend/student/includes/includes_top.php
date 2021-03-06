<meta charset="utf-8" />
<title><?php echo $page_title; ?> | <?php echo system_name(); ?> </title>
<meta name="keywords" content="HTML5 Template, CSS3, Mega Menu, Admin Template, Elegant HTML Theme, smart learn" />
<meta name="description" content="UI Elements Panels Draggable - Responsive Admin HTML Template">
<meta name="author" content="Venmond">

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">    
<!-- load the dashboard css -->
<?php
$skin = $this->db->get_where('system_setting', array('type' => 'skin_colour'))->row()->description;
if ($skin == 'theme_green.min.css') {
    ?>
    <link href="<?= $this->config->item('css_path') ?>student/sDashboard_green.css" rel="stylesheet">
<?php } elseif ($skin == 'theme_blue.min.css') { ?>
    <link href="<?= $this->config->item('css_path') ?>student/sDashboard_blue.css" rel="stylesheet">
<?php } elseif ($skin == 'theme_gold.min.css') { ?>
    <link href="<?= $this->config->item('css_path') ?>student/sDashboard_gold.css" rel="stylesheet">
<?php } else { ?>
    <link href="<?= $this->config->item('css_path') ?>student/sDashboard.css" rel="stylesheet">			
<?php } ?>     

<script>
var base_url = '<?php echo base_url(); ?>';
var login_student_id = '<?php echo $this->session->userdata("student_id"); ?>';
</script>
<!-- load gitter css -->


<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="img/logo.png"> 


<!-- CSS -->

<!-- Bootstrap & FontAwesome & Entypo CSS -->
<link href="<?= $this->config->item('css_path') ?>student/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?= $this->config->item('css_path') ?>font-awesome.min.css" rel="stylesheet" type="text/css">
<!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
<link href="<?= $this->config->item('css_path') ?>font-entypo.css" rel="stylesheet" type="text/css">    

<!-- Fonts CSS -->
<link href="<?= $this->config->item('css_path') ?>fonts.css"  rel="stylesheet" type="text/css">

<!-- Plugin CSS -->
<link href="<?= $this->config->item('custom_plugin') ?>jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
<link href="<?= $this->config->item('custom_plugin') ?>prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link href="<?= $this->config->item('custom_plugin') ?>isotope/css/isotope.css" rel="stylesheet" type="text/css">
<link href="<?= $this->config->item('custom_plugin') ?>pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
<link href="<?= $this->config->item('custom_plugin') ?>google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> 


<link href="<?= $this->config->item('custom_plugin') ?>mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<link href="<?= $this->config->item('custom_plugin') ?>tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
<link href="<?= $this->config->item('custom_plugin') ?>bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    


<!-- Specific CSS -->				

<?php
$skin = $this->db->get_where('system_setting', array('type' => 'skin_colour'))->row()->description;
?>     

<!-- Theme CSS -->
<link id="pagestyle"  href="<?= $this->config->item('css_path') ?>student/<?php echo $skin; ?>" rel="stylesheet" type="text/css">
<!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
<link href="<?= $this->config->item('css_path') ?>chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->

<!-- Responsive CSS -->
<link href="<?= $this->config->item('css_path') ?>student/theme-responsive.min.css" rel="stylesheet" type="text/css"> 
<!-- for specific page in style css -->

<!-- for specific page responsive in style css -->


<!-- Custom CSS -->
<link href="<?= $this->config->item('asset') ?>custom/custom.css" rel="stylesheet" type="text/css">

<!-- Head SCRIPTS -->
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>modernizr.js"></script> 
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>mobile-detect.min.js"></script> 
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>mobile-detect-modernizr.js"></script> 

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script type="text/javascript" src="js/html5shiv.js"></script>
  <script type="text/javascript" src="js/respond.min.js"></script>     
<![endif]-->


<!-- load jquery library -->
<script src="<?= $this->config->item('js_path') ?>jquery-1.8.2.js" type="text/javascript"></script>
<!-- load jquery ui library -->
<script src="<?= $this->config->item('js_path') ?>jquery-ui.js" type="text/javascript"></script>
<!-- load touch punch library to enable dragging on touch based devices -->
<script src="<?= $this->config->item('js_path') ?>jquery.ui.touch-punch.js" type="text/javascript"></script>
<!-- load gitter notification library -->
<script src="<?= $this->config->item('js_path') ?>jquery.gritter.js" type="text/javascript"></script>		

<!-- load flotr2 charting library -->
<!--[if IE]>
<script language="javascript" type="text/javascript" src="libs/flotr2/flotr2.ie.min.js"></script>
<![endif]-->
<script src="<?= $this->config->item('js_path') ?>flotr2.js" type="text/javascript"></script>

<!-- load dashboard library -->
<script src="<?= $this->config->item('js_path') ?>student/jquery-sDashboard.js" type="text/javascript"></script>


<!-- example code -->
<script type="text/javascript">
    $(function () {
        //var randomString = "Lorem ipsum dolor sit amet,consectetur adipiscing elit. Aenean lacinia mollis condimentum. Proin vitae ligula quis ipsum elementum tristique. Vestibulum ut sem erat.";				
        //var base = '<?php echo base_url(); ?>';
<?php
if (isset($widget_order)) {
    $order = str_replace('id', '', $widget_order->order_data);
    $order = explode(',', $order);
    for ($i = 0; $i < count($order); $i++) {
        ?>
                var datanew<?php echo $order[$i]; ?> = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/' . $order[$i]); ?>"></iframe>';
                console.log(datanew<?php echo $order[$i]; ?>);
        <?php
    }
} else {
    ?>
            var datanew1 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/1'); ?>"></iframe>';
            var datanew2 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/2'); ?>"></iframe>';
            var datanew3 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/3'); ?>"></iframe>';
            var datanew4 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/4'); ?>"></iframe>';
            var datanew5 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/5'); ?>"></iframe>';
            var datanew6 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/6'); ?>"></iframe>';
            var datanew7 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/7'); ?>"></iframe>';
            var datanew8 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/8'); ?>"></iframe>';
            var datanew9 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/9'); ?>"></iframe>';
            var datanew10 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/10'); ?>"></iframe>';
            var datanew11 = '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/11'); ?>"></iframe>';
<?php } ?>


        //**********************************************//
        //dashboard json data
        //this is the data format that the dashboard framework expects
        //**********************************************//
<?php if (isset($widget_order)) { ?>
            var dashboardJSON =
            [
    <?php
    for ($i = 0; $i < count($order); $i++) {
        switch ($order[$i]) {
            case '1':
                $title = 'Event Calendar';
                break;
            case '2':
                $title = 'Admission';
                break;
            case '3':
                $title = 'Assignments';
                break;
            case '4':
                $title = 'Study Resources';
                break;
            case '5':
                $title = 'Examinations';
                break;
            case '6':
                $title = 'Results';
                break;
            case '7':
                $title = 'Project/Synopsis';
                break;
            case '8':
                $title = 'Video Conferencing';
                break;
            case '9':
                $title = 'Digital Library';
                break;
            case '10':
                $title = 'Participate';
                break;
            case '11':
                $title = 'Staff and Email Directory';
                break;
        }
        ?>
                {
                widgetTitle: "<?php echo strtoupper($title); ?>",
                        widgetId: "id<?php echo $order[$i]; ?>",
                        widgetContent: datanew<?php echo $order[$i]; ?>
                }
        <?php
        $end = end($order);
        ?>
        <?php
        if ($end == $order[$i])
            echo '';
        else
            echo ',';
        ?>
    <?php } ?>
            ]
<?php } else { ?>
            var dashboardJSON = [
                {
                    widgetTitle: "EVENT CALENDAR",
                    widgetId: "id1",                    
                    widgetContent: datanew1
                }, {
                    widgetTitle: "ADMISSIONS",
                    widgetId: "id2",
                    widgetContent: datanew2
                }, {
                    widgetTitle: "ASSIGNMENTS",
                    widgetId: "id3",
                    widgetContent: datanew3
                }]
<?php } ?>
<?php if (isset($widget_order)) { ?>
        //basic initialization example
        $("#myDashboard").sDashboard({
            dashboardData: dashboardJSON
        });
<?php } ?>
        
    });

</script>

<script>
    $(document).ready(function () {
        $('#addWidgetFromSelect').on('click', function () {
            var widget_id = $(this).children(":selected").attr('id');

            switch (widget_id) {
                case 'wid1':
                    //event calendar widget
                    $('#myDashboard').sDashboard("addWidget", {
                        widgetTitle: "EVENT CALENDAR",
                        widgetId: "id1",
                        widgetContent: '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/1'); ?>"></iframe>'
                    });
                    break;
                case 'wid2':
                    //event calendar widget
                    $('#myDashboard').sDashboard("addWidget", {
                        widgetTitle: "ADMISSIONS",
                        widgetId: "id2",
                        widgetContent: '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/2'); ?>"></iframe>'
                    });
                    break;
                case 'wid3':
                    //event calendar widget
                    $('#myDashboard').sDashboard("addWidget", {
                        widgetTitle: "ASSIGNMENTS",
                        widgetId: "id3",
                        widgetContent: '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/3'); ?>"></iframe>'
                    });
                    break;
                case 'wid4':
                    //event calendar widget
                    $('#myDashboard').sDashboard("addWidget", {
                        widgetTitle: "STUDY RESOURCES",
                        widgetId: "id4",
                        widgetContent: '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/4'); ?>"></iframe>'
                    });
                    break;
                case 'wid5':
                    //event calendar widget
                    $('#myDashboard').sDashboard("addWidget", {
                        widgetTitle: "EXAMINATIONS",
                        widgetId: "id5",
                        widgetContent: '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/5'); ?>"></iframe>'
                    });
                    break;
                case 'wid6':
                    //event calendar widget
                    $('#myDashboard').sDashboard("addWidget", {
                        widgetTitle: "RESULTS",
                        widgetId: "id6",
                        widgetContent: '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/6'); ?>"></iframe>'
                    });
                    break;
                case 'wid7':
                    //event calendar widget
                    $('#myDashboard').sDashboard("addWidget", {
                        widgetTitle: "PROJECTS & SYNOPSIS",
                        widgetId: "id7",
                        widgetContent: '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/7'); ?>"></iframe>'
                    });
                    break;
                case 'wid8':
                    //event calendar widget
                    $('#myDashboard').sDashboard("addWidget", {
                        widgetTitle: "VIDEO CONFERENCING",
                        widgetId: "id8",
                        widgetContent: '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/8'); ?>"></iframe>'
                    });
                    break;
                case 'wid9':
                    //event calendar widget
                    $('#myDashboard').sDashboard("addWidget", {
                        widgetTitle: "DIGITAL LIBRARY",
                        widgetId: "id9",
                        widgetContent: '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/9'); ?>"></iframe>'
                    });
                    break;
                case 'wid10':
                    //event calendar widget
                    $('#myDashboard').sDashboard("addWidget", {
                        widgetTitle: "PARTICIPATE",
                        widgetId: "id10",
                        widgetContent: '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/10'); ?>"></iframe>'
                    });
                    break;
                case 'wid11':
                    //event calendar widget
                    $('#myDashboard').sDashboard("addWidget", {
                        widgetTitle: "STAFF & EMAIL DIRECTORY",
                        widgetId: "id11",
                        widgetContent: '<iframe class="widget-iframe" style="overflow:hidden;" src="<?php echo base_url('student/gadgets/11'); ?>"></iframe>'
                    });
                    break;
            }
        });
    });
</script>

<style> 
                .image_box, .text_box{width: 50%; display: inline-block; float: left; }
                        .text_box{position: relative;}
                        .text_box .detials{height: 10em; display: flex; align-items: center; justify-content: center}                        
                        .image_box img{ max-width: 100%; display: block;}
                        .image_box1 {width:100%; height:100%;display:table-cell; vertical-align:middle; }
                        .image_box img{ display:block;margin-left:auto;margin-right:auto;vertical-align:middle;height: 179px;}     

body{margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: none;}
.sDashboardWidget .sDashboardWidgetContent{ margin: 0; padding: 0; }
.sDashboardWidget .sDashboardWidgetContent .widget-iframe{vertical-align: middle; height: 100%; width: 100%; box-sizing:border-box;}
.sDashboardWidget .sDashboardWidgetContent .widget-iframe * { -webkit-box-sizing: border-box; -moz-box-sizing: border-box;  box-sizing: border-box;}
.sDashboardWidget .sDashboardWidgetContent .widget-iframe :before, .sDashboardWidget .sDashboardWidgetContent .widget-iframe :after { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}
.sDashboardWidget .sDashboardWidgetContent .widget-iframe body{margin: 0 !important; padding: 0 !important; -webkit-text-size-adjust: none;}
.sDashboardWidget .sDashboardWidgetContent .widget-iframe body div{overflow: hidden; height: 100%;}
.sDashboardWidget .sDashboardWidgetContent .widget-iframe .image_box1 {display: table-cell; height: 100%; vertical-align: middle; width: 100%;}
.text_box{overflow-y:auto;}     
            </style>
</head>