<div class="row">
	<div class="col-md-12"> 
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list" style="width:100%;">
            
          
                <table class="table datatable table" border="0" cellpadding="0" cellspacing="0" style="width:100%; font-family:Arial, Helvetica, sans-serif; font-size:14px; letter-spacing:0.5;" id="table_export">
                	<thead>
                    <tr>
                        <td valign="middle" align="left";><div><img src="<?php echo base_url(); ?>/uploads/logo.jpg" width="80" height="70" /></div></td>
                    	<td valign="middle" align="center"><div style="font-size:1.8em; text-align:center; font-weight:600; color:#000;">Page Inc School</div></td>
                        <td valign="bottom" align="right" style="font-size:12px;"><div>Date : <?php echo date('jS M Y'); ?> </div></td>	 
						</tr>
                        <tr><td colspan="5" style="height:15px;"></td></tr>
                        <tr bgcolor="#000000"><td colspan="5" style="font-size:1.2em; text-align:center; font-weight:600; padding:6px 0px; color:#FFF;">Study Materials Uploaded Listing</td></tr>
                		
                        <tr bgcolor="#2092D0">
                    		<th style="color:#FFF; padding:6px 0px;">No</th>
                    		<th style="color:#FFF; padding:6px 0px;">Class Name</th>
                    		<th style="color:#FFF; padding:6px 0px;">Subjects</th> 							
                    		<th style="color:#FFF; padding:6px 0px;">Topic Name</th> 							
                    		<th style="color:#FFF; padding:6px 0px;">Download</th> 							
						</tr>
					</thead>
                    <tbody>
                    	<?php 
						$share_material = $this->db->get('share_material')->result_array();
						$count = 1;
						if(count($share_material) > 0){
						foreach($share_material as $sm_row):						
						?>
                        <tr>
                            <td align="center" style="font-size:12px; padding:6px 0px; border-bottom:1px solid #EEE; border-left:1px solid #EEE; border-right:1px solid #EEE;" width="10%"><?php echo $count++;?></td>
							<td align="center" style="font-size:11px; padding:6px 0px; border-bottom:1px solid #EEE; border-left:0px solid #EEE; border-right:0px solid #EEE;" width="25%" >
								<?php  $class_name		=	$this->db->get_where('class' , array('class_id' => $sm_row['class_id']) )->result_array(); 
								foreach(@$class_name as $cname): ?>
								<?php echo $cname['name_numeric'];?>
								<?php endforeach; ?>
							</td>
							<td align="center" style="font-size:12px; padding:6px 0px; border-bottom:1px solid #EEE; border-left:0px solid #EEE; border-right:0px solid #EEE;" width="25%">
								<?php  $sub_name		=	$this->db->get_where('class' , array('class_id' => $sm_row['subject_id']) )->result_array(); 
								foreach(@$sub_name as $sname): ?>
								<?php echo $sname['name'];?>
								<?php endforeach; ?>
							</td>
							<td align="center" style="font-size:12px; padding:6px 0px; border-bottom:1px solid #EEE; border-left:0px solid #EEE; border-right:0px solid #EEE;" width="25%">
								<?php echo $sm_row['topic_name'];?>
							</td>
							<td align="center" style="font-size:12px; padding:6px 0px; border-bottom:1px solid #EEE; border-left:0px solid #EEE; border-right:0px solid #EEE;" width="25%">
								<a href="<?php echo base_url();?>/material_download.php?file_name=<?php echo $sm_row['m_filename'];?>" class="links"><?php echo base_url().'/material_download.php?file_name='?><?php echo $sm_row['m_filename']; ?></a>
							</td>
                        </tr>
                        <?php 						
						endforeach;  
						}
						else
						{
						?>	
						<tr><td align="left" style="font-size:12px; padding:6px 0px;" colspan="5">*No record found..</td></tr>
						<?php 
						}
						?>
                    </tbody>
                    
                     <tr>
                        <td valign="middle" align="right" colspan="5" style="padding:12px 0px; border-top:2px solid #2092D0; font-size:10px;"><span style="color:#2092D0;">Generated By : </span> <?php echo $this->session->userdata('name');?> </td>
                        </tr>
                    	
                </table>
                
			</div>
            <!----TABLE LISTING ENDS--->
		</div>
	</div>
</div>



