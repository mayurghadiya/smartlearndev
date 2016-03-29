<?php
// Start the session
//session_start();
$_SESSION['username'] = $this->session->userdata('name'); 

?>

<link type="text/css" rel="stylesheet" media="all" href="<?=$this->config->item('asset')?>chat/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?=$this->config->item('asset')?>chat/css/screen.css" />
<script type="text/javascript" src="<?=$this->config->item('asset')?>chat/js/jquery.js"></script>

<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->


                   
						
				
		




