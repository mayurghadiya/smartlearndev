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
							if($_POST['entity']){
								 $all=$this->db->get_where('group', array('group_id'=>$_POST['entity']))->result_array();
								//echo $this->db->last_query();
							}
                           foreach($all as $row):
							 $explode_user_role=explode(',',$row['user_role']);
							foreach($explode_user_role as $row_user):
							
							if($row['user_type']==1){
								$user_query=$this->db->get_where('teacher', array('teacher_id'=>$row_user))->result_array();
							}
							else if($row['user_type']==2){
								$user_query=$this->db->get_where('student', array('student_id'=>$row_user))->result_array();
							}
							else if($row['user_type']==3){
								$user_query=$this->db->get_where('student', array('student_id'=>$row_user))->result_array();
							}
							else if($row['user_type']==4){
								$user_query=$this->db->get_where('parent', array('parent_id'=>$row_user))->result_array();
							}
							foreach($user_query as $get_row_user):
							if($row['user_type'] == 1){
								$ids = $get_row_user['teacher_id'];
							}elseif($row['user_type'] == 2){
								$ids = $get_row_user['student_id'];							 
							}elseif($row['user_type'] == 3){
								$ids = $get_row_user['teacher_id'];
							}elseif($row['user_type'] == 4){
								 $ids = $get_row_user['parent_id'];
							}
						   ?>
							<tr> 
								<td><div><input type="checkbox" class="chkGrpSD3" name="chk_group[]" value="<?php echo $get_row_user['email'];?>" /></div><?php echo $get_row_user['name'];?></td>
								<td><?php echo $get_row_user['email'];?></td>								
							</tr>
								<input type="hidden" id="mail_email" name="reciever_email[<?php echo $ids; ?>]" 
                                value="<?php echo $get_row_user['email']; ?>"/>
								<input type="hidden" name="reciever_name[<?php echo $ids; ?>]"
                                 value="<?php echo $get_row_user['name']; ?>"/>
								<input type="hidden" name="reciever_id" 
                                value="<?php echo $ids;?>"/>
                        <?php endforeach; endforeach; endforeach;?>
                    </tbody>
                </table>
</div>
<script type="text/javascript">

  $("input[type=checkbox]").change( function() {
	var sel = $(this).val();
	
    var delimiter = ";";
    var text = $("input[name='modelos']");
    var strss = "";
    
    // for each checked checkbox, add the checkbox value and delimiter to the textbox
    $(":checked").each(function () {
        strss += $(this).val() + delimiter;
    });
   // alert(strss);
	//return false;
    // set the value of the textbox
    text.val(strss);
});
</script>