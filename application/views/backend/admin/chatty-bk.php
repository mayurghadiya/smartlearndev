<?php
// Start the session
//session_start();
$_SESSION['username'] = $this->session->userdata('name'); 

?>
<style>

.chat-link-box li a { color:#000; text-decoration: none; font-size:14px; color:Green;}

.chat-link-box {
  position: fixed;
  overflow: hidden;  
  right: 10px;
  bottom: 35px;  
  padding: 10px 20px;
  display: block;
  border-radius: 4px;
  transform: translateY(20px);
  transition: all 0.5s;
  visibility:hidden;
 
  max-width:250px;
  
}

.chat-link-box.active {
  display: block;
  visibility: visible;
  box-shadow: 2px 3px 16px silver;
  transition: all 600ms;
  transform: translateY(0px);
  transition: all 0.5s;
}

.wrap.active .content {
  position: relative;
  z-index: 1;
  opacity: 1;
  transition: all 600ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
}

a.chat-button {
  padding: 7px 20px 7px 20px;
  outline: none;
  border-radius: 5px;
  border-bottom-left-radius:0px;
  border-bottom-right-radius:0px;
  background: #007fed;
  color: #fff;
  font-size: 16px;
  display: block;
  position: fixed;
  right: 10px;
  bottom: 0px;
  text-decoration:none;  
  transition: transform 0.25s;
 
}



</style>
<link type="text/css" rel="stylesheet" media="all" href="<?=$this->config->item('asset')?>chat/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?=$this->config->item('asset')?>chat/css/screen.css" />
<script type="text/javascript" src="<?=$this->config->item('asset')?>chat/js/jquery.js"></script>

<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->
	<div class="vd_content-wrapper">
			<div class="vd_container">
				<div class="vd_content clearfix">

					<!-----------code by h------------->

					<div id="main_container">
                     <!-----------code by h------------->
                    <a class='chat-button' href='#'><i class="glyphicon glyphicon-plus"></i> Chat with us</a>
                    
                     <div class='chat-link-box'>
  <div class='content'>
    <h3>Welcome to Chat Box</h3>
    <ul>
     <li><a href="#">Chat link One</a></li>
     <li><a href="#">Chat link One</a></li>
     <li><a href="#">Chat link One</a></li>
     <li><a href="#">Chat link One</a></li>
     <li><a href="#">Chat link One</a></li>
     <li><a href="#">Chat link One</a></li>
     <li><a href="#">Chat link One</a></li>
     <li><a href="#">Chat link One</a></li>
     <li><a href="#">Chat link One</a></li>
    
    </ul>
   
  </div>
</div>



 <!-----------code by h------------->
                    
						<?php 
							$all_std		=	$this->db->get_where('student')->result_array();
							 foreach($all_std as $row):
							
						?>
						<a href="javascript:void(0)" onclick="javascript:chatWith('<?php echo $row['name']; ?>')">Chat With <?php echo $row['name']; ?></a><br/>
						
					<!-- YOUR BODY HERE -->
						 <?php endforeach;?>
					</div>
				</div>
			</div>
		</div>




