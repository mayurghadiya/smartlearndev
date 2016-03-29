<?php 
$base = $_SERVER['REQUEST_URI'];
$custom = preg_match("/[^\/]+$/", $base, $matches);
$last_word = $matches[0]; 

?>

        <?php $this->load->view('page_header'); ?> 		
		<?php 
		
			$news_conent		=	$this->db->get_where('news' , array('slug' => $last_word) )->result_array();
			$data['blog_text'] = $news_conent[0]['text'];
        
		?>
		 <?php $this->load->view('page_menu', $data); ?>
		
		
		<?php $this->load->view('page_footer'); ?>
