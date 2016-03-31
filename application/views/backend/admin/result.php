<link href="<?= $this->config->item('asset') ?>custom/exam.css" rel="stylesheet" type="text/css">
<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">				  
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Result Manager</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">

                        <section class="content">
                            <?php echo form_open(base_url() . 'index.php?admin/exam_result/search', array('role' => 'form', 'id' => 'search-results-summary', 'target' => '_top')); ?>
                            <div class="box box-info box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><i class="fa fa-search"></i> Search Students</h3>
                                </div><!--/box-header-->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group field-examresults-stu_id required">
                                                <input type="text" autocomplete="off" id="examresults-stu_id" class="form-control ui-autocomplete-input" name="student_roll" placeholder="Enter Student Roll No" value="<?php echo @$std_roll; ?>">
                                            </div>
                                        </div><!--/col-->
                                        <div class="col-sm-12">
                                            <strong class="text-info hint">
                                                [HINT : Enter Student Roll No]
                                            </strong>
                                        </div>
                                    </div>
                                    <h1 class="text-info hint">OR</h1>			
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group field-examgroupsearch-eg_academic_year required">
                                                <label class="control-label" for="examgroupsearch-eg_academic_year">Academic Year</label>
                                                <select id="examgroupsearch-eg_academic_year" class="form-control" name="year">
                                                    <option value="">---Select Academic Year---</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                                </select>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="control-label">Select Degree</label>
                                                <select style="width:100%;" class="form-control" name="degree" id="user_type" onchange="return get_batch(this.value)">
                                                    <option value="">--- Select Degree ---</option>		
                                                    <?php
                                                    $degree = $this->db->get_where('degree')->result_array();

                                                    foreach ($degree as $drow):
                                                        ?>
                                                        <option value="<?php echo $drow['d_id']; ?>"><?php echo $drow['d_name']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group field-examgroupsearch-eg_batch_id required">
                                                <label class="control-label" for="examgroupsearch-eg_batch_id">Batch</label>
                                                <select id="batch_selection_holder" class="form-control" name="batch" onchange="return get_sem(this.value)">
                                                    <option value="">--- Select Batch ---</option>
                                                </select>
                                            </div>
                                        </div>											
                                    </div>
                                    <div class="box-body">
                                        <div class="row">												
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Select Semester</label>	
                                                    <select style="width:100%;" class="form-control" name="sem" id="sem_selection_holder" onchange="Javascript: get_student(this.value); get_exam(this.value);">
                                                        <option value="">---Select Semester---</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Select Exam</label>	
                                                    <select style="width:100%;" class="form-control" name="exam" id="exam_selection_holder">
                                                        <option value="">---Select Exam---</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group field-examgroupsearch-eg_batch_id required">
                                                    <label class="control-label">Select Student</label>
                                                    <select style="width:100%;" class="form-control" name="std" id="std_selection_holder">
                                                        <option value="">--- Select Student ---</option>
                                                    </select>
                                                </div>												
                                            </div>
                                        </div><!--/ box-body-->

                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                            <button type="reset" class="btn btn-default">Reset</button>	</div>
                                        <!--/ box-footer-->
                                    </div>	

                                </div><!--/box-body-->										
                            </div><!--/box-->
                            </form>
                            <?php
                            if (count(@$s_id) > 0) {



                                //foreach($s_id as $row):
                                //echo "<pre/>";
                                //print_r($s_id[0]);										
                                ?>


                                <div class="well well-sm">
                                    <h4 class="page-header edusec-border-bottom-warning">
                                        <i class="fa fa-info-circle"></i> Student Current Details 
                                    </h4>
                                    <div class="table-responsive">
                                        <table>
                                            <colgroup><col style="width:180px">
                                                <col style="width:60%">
                                            </colgroup><tbody><tr>
                                                    <td>
                                                        <img style="width:140px; height:140px" src="<?php echo $this->crud_model->get_image_url('student', $s_id[0]['student_id']); ?>" alt="..." class="center-block img-circle img-thumbnail img-responsive"> 
                                                    </td>
                                                    <td>
                                                        <h3 class="text-primary">
                                                            <b><span class="glyphicon glyphicon-user"></span> 
                                                                <?php echo $s_id[0]['first_name']; ?> <?php echo $s_id[0]['last_name']; ?>
                                                            </b>
                                                        </h3>
                                                        <p>
                                                            <strong>Student ID : </strong> 
                                                            <?php echo $s_id[0]['student_id']; ?>
                                                        </p>														
                                                        <p>
                                                            <strong>Active/InActive : </strong>
                                                            <?php if ($s_id[0]['Status'] == 1) { ?>
                                                                <span class="label label-primary">Active</span>
                                                            <?php } else { ?>
                                                                <span class="label label-danger">InActive</span>
                                                            <?php } ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </div><!--/table-responsive-->
                                </div><!--/well-->
                                <?php //endforeach;  ?>

                                <!--Start display all exam results block for students wise-->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Academic Year : <?php
                                            //echo "<pre/>";
                                            //print_r($s_id[0]['batch']);
                                            //die;

                                            $array = array("student.std_id" => $s_id[0]['student_id']);
                                            $this->db->select('exam_manager.em_year as Exam_year');
                                            $this->db->from('student');
                                            $this->db->join('exam_manager', 'exam_manager.em_semester = student.semester_id');
                                            $this->db->where($array);
                                            $this->db->or_where('student.std_roll', $std_roll);
                                            $query = $this->db->get();
                                            $e_year = $query->result_array();
                                            echo $e_year[0]['Exam_year'];
                                            //print_r($e_year[0]['Exam_year']);	
                                            ?>
                                        </h3>
                                    </div><!--/box-header-->
                                    <div class="box-body">
                                        <div class="box box-warning box-solid">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Branch : <?php
                                                    if (isset($batch)) {
                                                        $array = array("student.std_id" => $s_id[0]['student_id']);
                                                        $this->db->select('batch.b_id as batch_id');
                                                        $this->db->from('student');
                                                        $this->db->join('batch', 'batch.b_id = student.std_batch');
                                                        $this->db->where($array);
                                                        $this->db->or_where('student.std_roll', $std_roll);
                                                        $query = $this->db->get();
                                                        $e_batch = $query->result_array();
                                                        //echo "<pre/>";
                                                        //print_r($e_batch[0]['batch_id']);
                                                        $branch_data = $this->db->get_where('batch', array('b_id' => $e_batch[0]['batch_id']))->result_array();
                                                        foreach ($branch_data as $brow):
                                                            echo $brow['b_name'];
                                                        endforeach;
                                                    }
                                                    ?></h3>
                                            </div><!--/box-header-->
                                            <div class="box-body">
                                                <div class="box box-info box-solid">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">Exam Name : <?php
                                                            $array = array("student.std_id" => $s_id[0]['student_id']);
                                                            $this->db->select('exam_manager.em_name as Exam_name');
                                                            $this->db->from('student');
                                                            $this->db->join('exam_manager', 'exam_manager.em_semester = student.semester_id');
                                                            $this->db->where($array);
                                                            $this->db->or_where('student.std_roll', $std_roll);
                                                            $query = $this->db->get();
                                                            $e_exam = $query->result_array();
                                                            echo $e_exam[0]['Exam_name'];
                                                            ?></h3>
                                                        <!--<div class="pull-right">
                                                                <strong>Exam Type : </strong>Marks and Grade
                                                        </div>-->
                                                    </div><!--/box-header-->
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
                                                                $array = array("student.std_id" => @$student_id);
                                                                $this->db->select('student.name as Name,exam_manager.em_name as Exam_name,subject_manager.subject_name as Subject_name,marks_manager.mark_obtained as Mark_obtain,exam_manager.passing_mark as  passing_mark,subject_manager.subject_code as s_code,exam_manager.total_marks as total_mark,student.std_status as Status,batch.b_name as batch,student.std_id as student_id,student.std_first_name as first_name,student.std_last_name as last_name,marks_manager.mm_remarks as Remark');
                                                                $this->db->from('student');
                                                                $this->db->join('marks_manager', 'marks_manager.mm_std_id = student.std_id');
                                                                $this->db->join('exam_manager', 'exam_manager.em_id = marks_manager.mm_exam_id');
                                                                $this->db->join('batch', 'batch.b_id = student.std_batch');
                                                                $this->db->join('subject_manager', 'subject_manager.sm_id = marks_manager.mm_subject_id');
                                                                $this->db->where($array);
                                                                $this->db->or_where('student.std_roll', $std_roll);
                                                                $query = $this->db->get();

                                                                //echo $this->db->last_query();
                                                                //die;						

                                                                $results = $query->result();
                                                                $count = 1;
                                                                //if(count($resultlists) > 0){
                                                                foreach ($results as $rrow):
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $count; ?></td>
                                                                        <td><?php echo $rrow->s_code; ?></td>
                                                                        <td><?php echo $rrow->Subject_name; ?></td>
                                                                        <td><?php echo $rrow->total_mark; ?></td>
                                                                        <td><?php echo $rrow->passing_mark; ?></td>
                                                                        <td><?php echo $rrow->Mark_obtain; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            if ($rrow->passing_mark <= $rrow->Mark_obtain) {
                                                                                echo "Passed";
                                                                            } else {
                                                                                echo "Failed";
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $rrow->Remark; ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div><!--/box-body-->
                                                    <?php
                                                    $array = array("student.std_id" => @$student_id);
                                                    $this->db->select('student.name as Name,SUM(marks_manager.mark_obtained) as Mark_obtain,marks_manager.mark_obtained as Mark_obtain_sub,student.std_status as Status,student.std_id as student_id,exam_manager.passing_mark as  passing_mark,student.std_first_name as first_name,student.std_last_name as last_name,SUM(exam_manager.total_marks) as total_mark,exam_manager.total_marks as total_mark_1,count(subject_manager.subject_name) as Subject_name');
                                                    $this->db->from('student');
                                                    $this->db->join('marks_manager', 'marks_manager.mm_std_id = student.std_id');
                                                    $this->db->join('subject_manager', 'subject_manager.sm_id = marks_manager.mm_subject_id');
                                                    $this->db->join('exam_manager', 'exam_manager.em_id = marks_manager.mm_exam_id');
                                                    $this->db->where($array);
                                                    $this->db->or_where('student.std_roll', $std_roll);
                                                    $query = $this->db->get();

                                                    //echo $this->db->last_query();
                                                    //die;						

                                                    $results_final = $query->result();
                                                    foreach ($results_final as $rfrow):
                                                        ?>
                                                        <div class="box-footer">
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <strong>Total Marks : </strong><?php echo $rfrow->total_mark; ?>	
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <strong>Total Obtained Marks : </strong><?php echo $rfrow->Mark_obtain; ?>
                                                                </div>																		
                                                                <div class="col-sm-3">
                                                                    <strong>Total Percentages Marks : </strong>
                                                                    <?php
                                                                    $total = $rfrow->total_mark;
                                                                    $total_ind = $rfrow->total_mark_1;
                                                                    $obtain = $rfrow->Mark_obtain;
                                                                    $total_subject = $rfrow->Subject_name;
                                                                    $per = (($obtain) / ($total_ind * $total_subject) * 100);
                                                                    echo number_format($per, 2, '.', '');
                                                                    $single = number_format($per, 1, '.', '');
                                                                    ?>
                                                                    %</div>
                                                                <div class="col-sm-3">
                                                                    <strong>Grade : </strong>
                                                                    <?php
                                                                    $a1 = $rrow->total_mark - 10;
                                                                    $a = $rrow->total_mark - 15;
                                                                    $b = $rrow->total_mark - 25;
                                                                    $c = $rrow->total_mark - 35;

                                                                    //echo $rrow->Mark_obtain;
                                                                    if ($single > 90.9) {
                                                                        echo "A+";
                                                                    } elseif ($single > 85.9) {
                                                                        echo "A";
                                                                    } elseif ($single > 76.9) {
                                                                        echo "B+";
                                                                    } elseif ($single > 71.9) {
                                                                        echo "B";
                                                                    } elseif ($single > 59.9) {
                                                                        echo "C";
                                                                    }
                                                                    ?>
                                                                </div>	
                                                                <div class="col-sm-3">
                                                                    <strong>Results : </strong>
                                                                    <?php if ($rfrow->passing_mark <= $rfrow->Mark_obtain_sub) { ?>
                                                                        <span class="label label-primary">Passed</span>
                                                                    <?php } else { ?>				
                                                                        <span class="label label-success">Failed</span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div><!--/box-footer-->
                                                    <?php endforeach; ?>
                                                </div><!--/box-->
                                            </div><!--/box-body-->
                                        </div><!--/box-->
                                    </div><!--/box-body-->
                                </div><!--/box-->
                                <?php
                                // endforeach; 
                            } elseif (isset($s_id)) {
                                ?>
                                <div>No Result Available </div>
                            <?php }
                            ?>	
                        </section>
                    </div>
                </div>
            </div>
            <!-- row --> 

        </div>
        <!-- .vd_content-section --> 

    </div>
    <!-- .vd_content --> 
</div>
<script type="text/javascript">
    function get_batch(d_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_batch/' + d_id,
            success: function (response)
            {
                jQuery('#batch_selection_holder').html(response);
            }
        });
    }
    function get_sem(s_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_sem/' + s_id,
            success: function (response)
            {
                jQuery('#sem_selection_holder').html(response);
            }
        });
    }
    function get_exam(s_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_exam/' + s_id,
            success: function (response)
            {
                jQuery('#exam_selection_holder').html(response);
            }
        });
    }
    function get_student(std_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_student/' + std_id,
            success: function (response)
            {
                jQuery('#std_selection_holder').html(response);
            }
        });
    }
</script>