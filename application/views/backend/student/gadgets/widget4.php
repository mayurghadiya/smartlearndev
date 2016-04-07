<link href="<?=$this->config->item('css_path')?>student/sDashboard.css" rel="stylesheet">
<div class="vd_panel-menu">					
	<div data-original-title="Config" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font">
		<div data-action="click-target" class="vd_mega-menu-content  width-xs-2  left-xs">
			  <div class="col-sm-6 ui-sortable">
					<div class="content-list content-menu">
					  <ul class="list-wrapper pd-lr-10">
                                               
                                              <?php 
                                              $std_id = $this->session->userdata('std_id');
                                              $std = $this->db->get_where('student',array('std_id'=>$std_id))->result_array();
                                           //   $studyresource = $this->db->get_where('study_resources',array('study_degree'=>$std[0]['std_degree'],study_batch'=>$std[0]['std_batch'],'study_sem'=>$std[0]['semester_id'],'study_course'=>$std[0]['course_id']))->result_array();
                                              $studyresource = $this->db->get_where('study_resources')->result_array();
                                              foreach($studyresource as $row):
                                              ?>
                                              
                                              <li>  <a href="<?php echo $row['study_url'];?>" download="" title="<?php echo $row['study_desc']; ?>" target="_blank"><?php echo $row['study_title']; ?></a>                  
                                                  <?php
                                                $std_id = $this->session->userdata('std_id');
                                                $study_id = $row['study_id'];
                                               $noti = $this->db->query("SELECT * FROM notification WHERE notification_type_id='7' AND FIND_IN_SET('".$std_id."',student_ids) AND data_id='".$study_id."'")->result_array();
                                                                                             
                                               
                                               if(!empty($noti))
                                               {
                                               $student_ids  = $noti[0]['student_ids'];
                                               
                                               }else{
                                               $student_ids = '';
                                               }
                                                if(isset($this->session->userdata('notifications')['study_resources'])){ ?>
                                                <?php 
                                                if($student_ids!='')
                                                {
                                                    $student_ids = explode(",",$student_ids);
                                                  //  print_r($student_ids);
                                                if(in_array($std_id,$student_ids)){ ?>
                                                <img style="margin-top: 5px;" src="<?php echo base_url('assets/images/new_icon.gif'); ?>"/>
                                                <?php } 
                                                }?>
                                                <?php } 
                                                ?>
                                                 
                                              </li>
						<!--<li> <a href="<?php echo base_url();?>index.php?student/studyresource" target="_blank"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Resources Online</div> </a> </li>-->
						<!--<li> <a href="<?php echo base_url();?>index.php?student/studyresource" target="_blank">  <div class="menu-icon"><i class=" icon-trophy"></i></div> <div class="menu-text">Resources Downloadable</div> </a> </li>-->						
                                                <?php endforeach;?>	
					  </ul>
					</div>
			  </div>
		</div>
	</div>
</div>