<?php
//session_start();
$_SESSION['username'] = "babydoe" // Must be already set
?>


<link type="text/css" rel="stylesheet" media="all" href="<?=$this->config->item('asset')?>chat/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?=$this->config->item('asset')?>chat/css/screen.css" />


<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->
	<div class="vd_content-wrapper">
			<div class="vd_container">
				<div class="vd_content clearfix">

					<div id="main_container">

						<a href="javascript:void(0)" onclick="javascript:chatWith('janedoe')">Chat With Jane Doe</a>
						<a href="javascript:void(0)" onclick="javascript:chatWith('johndoe')">Chat With John Doe</a>
						<!-- YOUR BODY HERE -->
					</div>
</div>
</div>	</div>				

