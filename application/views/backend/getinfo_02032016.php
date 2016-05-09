<div class="panel-body">
	 <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr> 												
                            <th><div>Name</div></th>
                            <th><div>Email</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
							if($_POST['entity'] == 1){
								 $all	=	$this->db->get('manager')->result_array();
							}elseif($_POST['entity'] == 2){
								 $all	=	$this->db->get('teacher')->result_array();
							}elseif($_POST['entity'] == 3){
								 $all	=	$this->db->get('student')->result_array();
							}elseif($_POST['entity'] == 4){
								 $all	=	$this->db->get('parent')->result_array();
							}			
							 
                           foreach($all as $row):
							
							if($_POST['entity'] == 1){
								 $ids = $row['manager_id'];
							}elseif($_POST['entity'] == 2){
								 $ids = $row['teacher_id'];								 
							}elseif($_POST['entity'] == 3){
								$ids = $row['student_id'];
							}elseif($_POST['entity'] == 4){
								 $ids = $row['parent_id'];
							}
							
						   ?>
							<tr> 
								<td><div><input type="checkbox" name="chk_group[]" value="<?php echo $ids; ?>" /></div><?php echo $row['name'];?></td>
								<td><?php echo $row['email'];?></td>								
							</tr>
								<input type="hidden" name="reciever_email[<?php echo $ids; ?>]" value="<?php echo $row['email']; ?>"/>
								<input type="hidden" name="reciever_name[<?php echo $ids; ?>]" value="<?php echo $row['name']; ?>"/>
								<input type="hidden" name="reciever_id" value="<?php echo $ids; ?>"/>
                        <?php endforeach;?>
                    </tbody>
    </table>
</div>