<?php 
$base = $_SERVER['REQUEST_URI'];
$custom = preg_match("/[^\/]+$/", $base, $matches);
$last_word = @$matches[0]; 

?>
	<?php 
		$news_conent		=	$this->db->get_where('cms_manager' , array('c_slug' => $last_word,'c_status' => 1) )->result_array(); 
		$data['blog_text'] = @$news_conent[0]['c_description'];
		$data['page_title'] = @$news_conent[0]['c_title'];
	?>
	 <?php $this->load->view('backend/student/includes/includes_top',$data); ?>	
	 <?php $this->load->view('backend/student/includes/header'); ?>	
	
	
 <?php $this->load->view('backend/student/page_menu', $data); ?>
  <?php $this->load->view('backend/student/includes/footer'); ?>	
 <?php $this->load->view('backend/student/includes/includes_bottom'); ?>	
 




