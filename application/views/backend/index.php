<?php
	$system_name        =	$this->db->get_where('system_setting' , array('type'=>'system_name'))->row()->description;
	$system_title       =	$this->db->get_where('system_setting' , array('type'=>'system_title'))->row()->description;
//	$text_align         =	$this->db->get_where('system_setting' , array('type'=>'text_align'))->row()->description;
	$account_type       =	$this->session->userdata('login_type');

?>

<!DOCTYPE html>
<html lang="en" dir="<?php //if ($text_align == 'right-to-left') echo 'rtl';?>" manifest="mainfest.appcache">
<head>
	
	<title><?php echo system_name(); ?> | <?php //echo $system_title;?></title>
    
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Smart School system - Searchnative" />
	<meta name="author" content="Creativeitem" />
	

	<?php include $account_type.'/includes/'.'includes_top.php';?>
	
</head>

		<?php  include $account_type.'/includes/'.'header.php';?>
		<?php include  $account_type.'/includes/'.'/navigation.php';?>
		<?php include $account_type.'/'.$page_name.'.php';?>
		<?php include $account_type.'/includes/'.'includes_bottom.php';?>
		<?php include $account_type.'/includes/'.'footer.php';?>
		<?php //include $account_type.'/includes/'.'forms-validation.php';?>
	
		<?php //include 'chat.php';?>
        	
	
    <?php include 'modal.php';?>
    <?php //include 'includes_bottom.php';?>
    
</body>
</html>