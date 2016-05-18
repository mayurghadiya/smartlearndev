<div class="box-body no-padding table-responsive">
															<table class="table table-bordered table-striped">
																<tbody>
																<tr>
																	<th>SI NO.</th>
																	<th>Subject Code</th>
																	<th>Subject Name</th>
																	<th>Total Marks</th>
																	<th>Passing Marks</th>
																	<th>Obtained Marks</th>
																	<th>Results</th>
																	<th>Remarks</th>
																</tr>
																<?php 
																	$array = array("student.std_id"=>@$student_id);
																	$this->db->select('student.name as Name,exam_manager.em_name as Exam_name,subject_manager.subject_name as Subject_name,marks_manager.mark_obtained as Mark_obtain,exam_manager.passing_mark as  passing_mark,subject_manager.subject_code as s_code,exam_manager.total_marks as total_mark,student.std_status as Status,batch.b_name as batch,student.std_id as student_id,student.std_first_name as first_name,student.std_last_name as last_name,marks_manager.mm_remarks as Remark');
																	$this->db->from('student');
																	$this->db->join('marks_manager', 'marks_manager.mm_std_id = student.std_id');
																	$this->db->join('exam_manager', 'exam_manager.em_id = marks_manager.mm_exam_id');
																	$this->db->join('batch', 'batch.b_id = student.std_batch');
																	$this->db->join('subject_manager', 'subject_manager.sm_id = marks_manager.mm_subject_id');
																	$this->db->where($array);
																	$this->db->or_where('student.std_roll',$std_roll); 
																	$query = $this->db->get();
																	
																	//echo $this->db->last_query();
																	//die;						
																	
																	$results =$query->result();
																	$count = 1;
																	//if(count($resultlists) > 0){
																	foreach($results as $rrow):
																										
																?>
																<tr>
																	<td><?php echo $count; ?></td>
																	<td><?php echo $rrow->s_code; ?></td>
																	<td><?php echo $rrow->Subject_name; ?></td>
																	<td><?php echo $rrow->total_mark; ?></td>
																	<td><?php echo $rrow->passing_mark; ?></td>
																	<td><?php echo $rrow->Mark_obtain; ?></td>
																	<td>
																	<?php if($rrow->passing_mark <= $rrow->Mark_obtain ){
																		echo "Passed";
																	}else {
																		echo "Failed";
																	} ?>
																	</td>
																	<td><?php echo $rrow->Remark; ?></td>
																</tr>
																<?php
																	endforeach;  ?>
																</tbody>
															</table>
														</div><!--/box-body-->