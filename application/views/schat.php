

     <!-- Required CSS -->
    
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chat.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">



<!--CHAT CONTAINER STARTS HERE-->
<div id="chat-container" class="fixed" style="display: none;"></div>

<!-- Header -->
<header id="top" class="header">
    <div class="text-vertical-center"></div>
</header>

<!-- Custom JavaScript Files Included Here -->
<script type="text/javascript">

var base = "<?php echo base_url().'index.php?';?>";
var base_img = "<?php echo base_url();?>";

//alert('<?php echo $this->uri->segment(2); ?>');
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/smain.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/schatigniter.js"></script>


   <!-- Code to Display the chat button -->
  
<a href="javascript:void(0)" id="menu-toggle" class="btn-chat btn btn-success">
   <i class="fa fa-comments-o fa-3x"></i>
    <span class="badge progress-bar-danger"></span>
</a> 