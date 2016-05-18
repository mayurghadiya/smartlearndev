<div class="panel-body table-responsive" id="getsubmit">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>											
                                                <th><div>Student Name</div></th>	
                                                <th><div>Participate Title</div></th>
                                                <th><div>Comment</div></th>
                                                <th><div>Course</div></th>											
                                                <th><div>Branch</div></th>
                                                <th><div>Batch</div></th>

                                                <th><div>Semester</div></th>											
                                                <th><div>Participate Status</div></th>											
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counts = 1;

                                            foreach ($volunteer as $rows):
                                                $std_id = $rows['student_id'];
                                                $pp_id = $rows['pp_id'];
                                                $this->db->join('degree', 'degree.d_id=student.std_degree');
                                                $this->db->join('semester', 'semester.s_id=student.semester_id');
                                                $this->db->join('batch', 'batch.b_id=student.std_batch');
                                                $this->db->join('course', 'course.course_id=student.course_id');

                                                $user = $this->db->get_where('student', array('std_id' => $std_id))->result_array();
                                                $part = $this->db->get_where('participate_manager', array('pp_id' => $pp_id))->result_array();
                                                ?>
                                                <tr>
                                                    <td><?php echo $counts++; ?></td>	
                                                    <td><?php echo $user[0]['name']; ?></td>	
                                                    <td><?php echo $part[0]['pp_title']; ?></td>
                                                    <td><?php echo wordwrap($rows['comment'], 40, "<br>\n", true); ?></td>
                                                    <td><?php
                                                        if (isset($user[0]['d_name'])) {
                                                            echo $user[0]['d_name'];
                                                        }
                                                        ?></td>

                                                    <td><?php
                                                        if (isset($user[0]['c_name'])) {
                                                            echo $user[0]['c_name'];
                                                        }
                                                        ?></td>	
                                                    <td><?php
                                                        if (isset($user[0]['b_name'])) {
                                                            echo $user[0]['b_name'];
                                                        }
                                                        ?></td>
                                                    <td><?php
                                                        if (isset($user[0]['s_name'])) {
                                                            echo $user[0]['s_name'];
                                                        }
                                                        ?></td>	
                                                <td><a href="<?php echo base_url(); ?>index.php?admin/confirmparticipate/<?php echo $rows['participate_student_id']; ?>" class="btn btn-info">Disapprove</a></td>	                                                    

                                                </tr>
<?php endforeach; ?>						
                                        </tbody>
                                    </table>
                                </div>

<script type="text/javascript">
	$(document).ready(function() {
		"use strict";				
		$('#data-tables').dataTable();
	} );
        $(document).ready(function() {
		"use strict";				
		$('#data-tabless').dataTable();
	} );
</script>
            