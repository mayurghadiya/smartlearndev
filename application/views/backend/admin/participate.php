<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a> </li>
                        <li><a href="#">Pages</a> </li>
                        <li class="active">Participate Management</li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Participate Management</h1>
                </div>
            </div>

            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								


                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Participate List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Participate
                                </a></li>
                            <li>
                                <a href="#addsurvey" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add survey Question
                                </a></li>
                            <li>
                                <a href="#survey" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Survey List
                                </a></li> 
                            <li>
                                <a href="#newlist" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Question List
                                </a></li>
                            <li>

                                <a href="#listing" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Activity List
                                </a></li> 
                            <li>
                                <a href="#uploads" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Upload List
                                </a></li>

                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">								
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>											
                                                <th><div>Participate Title </div></th>											
                                                <th><div>Course</div></th>											
                                                <th><div>Branch</div></th>
                                                <th><div>Batch</div></th>											
                                                <th><div>Semester</div></th>											
                                                <th><div>File</div></th>											
                                                <th><div>Date of submission</div></th>									
                                                <th><div>Action</div></th>											
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($participate as $row):
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>	
                                                    <td><?php echo $row->pp_title; ?></td>	
                                                    <td>
                                                        <?php
                                                        if ($row->pp_degree == "All") {
                                                            echo "All";
                                                        } else {
                                                            foreach ($degree as $deg) {

                                                                if ($deg->d_id == $row->pp_degree) {
                                                                    echo $deg->d_name;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                        if ($row->pp_course == "All") {
                                                            echo "All";
                                                        } else {
                                                            foreach ($course as $crs) {

                                                                if ($crs->course_id == $row->pp_course) {
                                                                    echo $crs->c_name;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row->pp_batch == "All") {
                                                            echo "All";
                                                        } else {
                                                            foreach ($batch as $bch) {

                                                                if ($bch->b_id == $row->pp_batch) {
                                                                    echo $bch->b_name;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                        if ($row->pp_semester == "All") {
                                                            echo "All";
                                                        } else {
                                                            foreach ($semester as $sem) {

                                                                if ($sem->s_id == $row->pp_semester) {
                                                                    echo $sem->s_name;
                                                                }
                                                            }
                                                        }
                                                        ?>

                                                    </td>	
                                                    <td id="downloadedfile"><a href="<?php echo $row->pp_url; ?>" download="" title="<?php echo $row->pp_filename; ?>" ><i class="fa fa-download"></i></a></td>	
                                                    <td><?php  echo date_formats($row->pp_dos); ?></td>	

                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_participate/<?php echo $row->pp_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/participate/delete/<?php echo $row->pp_id; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
                                                    </td>	
                                                </tr>
                                            <?php endforeach; ?>						
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">       
                                <div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>                                      
                                    <?php echo form_open(base_url() . 'index.php?admin/participate/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmparticipate', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">											
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Course <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree">
                                                    <option value="">Select Course</option>
                                                    <option value="All">All</option>
                                                    <?php
                                                    $datadegree = $this->db->get_where('degree', array('d_status' => 1))->result();
                                                    foreach ($datadegree as $rowdegree) {
                                                        ?>
                                                        <option value="<?= $rowdegree->d_id ?>"><?= $rowdegree->d_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Branch <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course">
                                                    <option value="">Select Branch</option>
                                                  <option value="All">All</option>
                                                    <?php
                                                    /*  
                                                     * $course = $this->db->get_where('course', array('course_status' => 1))->result();
                                                    foreach ($course as $crs) {
                                                        ?>
                                                      <!--  <option value="<?= $crs->course_id ?>"><?= $crs->c_name ?></option>-->
                                                        <?php
                                                    }*/
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Batch <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="batch" id="batch" onchange="get_student2(this.value);" >
                                                    <option value="">Select batch</option>
                                                    <option value="All">All</option>
                                                    <?php
                                                   /* $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
                                                    foreach ($databatch as $row) {
                                                        ?>
                                                        <option value="<?= $row->b_id ?>"><?= $row->b_name ?></option>
                                                        <?php
                                                    }*/
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Semester <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester" onchange="get_students2(this.value);">
                                                    <option value="">Select Semester</option>
                                                    <option value="All">All</option>
                                                    <?php
                                                    $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                                    foreach ($datasem as $rowsem) {
                                                        ?>
                                                        <option value="<?= $rowsem->s_id ?>"><?= $rowsem->s_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Participate Title <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="title" id="title" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Date <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" readonly="" class="form-control" name="dateofsubmission" id="dateofsubmission" />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">File Upload <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="participatefile" id="participatefile" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green">Add Participate</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                                <!----CREATION FORM ENDS-->
                            </div>
                            
                            
                            
                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="addsurvey" style="padding: 5px">
                                <div class="box-content">                   
<div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>  
                                    <?php echo form_open(base_url() . 'index.php?admin/survey/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmsurvey', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">                                            




                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Question <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="question" id="question" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Short Description <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Status <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="radio" id="status" name="status" value="1" >Active
                                                <input type="radio" id="status" name="status" value="0" > Deactive
                                                <label for="status" class="error"></label>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green">Add Question</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>           


                                </div>

                            </div>



                            <!----CREATION FORM ENDS-->
                            
                            
                            <div class="tab-pane box" id="survey">		
                                <div class="tab-pane box" id="list">
                                             <div class="form-group col-sm-2">
                                    <label>Course</label>
                                    <select class="form-control pfilter-rows" id="pfilter2" data-filter="2" data-type="course">
                                        <option value="">All</option>
                                        <?php foreach ($degree as $row) { ?>
                                            <option value="<?php echo $row->d_name; ?>"
                                                    data-id="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Branch</label>
                                    <select id="pfilter3" name="branch" data-filter="3" class="form-control pfilter-rows" data-type="branch">
                                        <option value="">All</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Batch</label>
                                    <select id="pfilter4" name="batch" data-filter="4" class="form-control pfilter-rows" data-type="batch">
                                        <option value="">All</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-sm-2">
                                    <label> Semester</label>
                                    <select id="pfilter5" name="semester" data-filter="5" class="form-control pfilter-rows" data-type="semester">
                                        <option value="">All</option>

                                    </select>
                                </div>
                                 <label style="margin-left: 40px; margin-top: 30px;">OR</label>
                              
                                    <div class="panel-body table-responsive" id="getresponse">
                                        <table class="table table-striped" id="survey-table">
                                            <thead>
                                                <tr>
                                                    <th><div>#</div></th>                                           
                                                    <th><div>Student Name</div></th>       
                                                    <th><div>Course</div></th>
                                                    <th><div>Branch</div></th>
                                                    <th><div>Batch</div></th>											
                                                    <th><div>Semester</div></th>	
                                                    <th><div>Question</div></th>  
                                                    <th><div>Answer</div></th>                               
                                                    <th><div>Action</div></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 1;
                                                foreach ($survey as $row):
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $count++; ?></td>    
                                                        <td><?php
                                                            foreach ($student as $stu) {
                                                                if ($stu->std_id == $row->student_id) {
                                                                    echo $stu->name;
                                                                }
                                                            }
                                                            ?></td>
                                                        <td>
                                                            <?php
                                                            foreach ($degree as $deg) {
                                                                if ($deg->d_id == $row->std_degree) {
                                                                    echo $deg->d_name;
                                                                }
                                                            }
                                                            ?>
                                                        </td>	
                                                        <td>
                                                            <?php
                                                            foreach ($course as $crs) {
                                                                if ($crs->course_id == $row->course_id) {
                                                                    echo $crs->c_name;
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            foreach ($batch as $bch) {
                                                                if ($bch->b_id == $row->std_batch) {
                                                                    echo $bch->b_name;
                                                                }
                                                            }
                                                            ?>
                                                        </td>	
                                                        <td>
                                                            <?php
                                                            foreach ($semester as $sem) {
                                                                if ($sem->s_id == $row->semester_id) {
                                                                    echo $sem->s_name;
                                                                }
                                                            }
                                                            ?>

                                                        </td>

                                                        <td>
                                                            <?php $question = explode(",", $row->sq_id); ?><?php
                                                            //echo $row->survey_status;
                                                            $queid = $question[0];
                                                            //echo 'dss'.$queid;
                                                            $question1 = $this->crud_model->getquestion('survey_question', $queid);
                                                            echo $question1;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php $status = explode(",", $row->survey_status); ?><?php
                                                            $s1 = $status[0];
                                                            if ($s1 == "1") {
                                                                echo "Yes";
                                                            } elseif ($s1 == "0") {
                                                                echo "No";
                                                            } elseif ($s1 == "2") {
                                                                echo "No Opinion";
                                                            }

                                                            //echo $row->survey_status;
                                                            //$queid = $question[0];
                                                            //echo 'dss'.$queid;
                                                            ?></td>

                                                        <td class="menu-action">
                                                            <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_survey_detal/<?php echo $row->survey_id; ?>');" data-original-title="View Detail" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-file-o"></i></a>
                                                        </td>  
                                                    </tr>
                                                <?php endforeach; ?>                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane box" id="newlist">								
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="data-tabless">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>                                           
                                                <th><div>Question</div></th>       
                                                <th><div>Description</div></th>
                                                <th><div>Status</div></th>
                                                <th><div>Action</div></th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $countq = 1;

                                            foreach ($questions as $rowq):
                                                ?>
                                                <tr>
                                                    <td><?php echo $countq++; ?></td>    
                                                    <td><?php echo $rowq->question; ?></td>    
                                                    <td><?php echo $rowq->question_description; ?></td>    
                                                    <td><?php echo ($rowq->question_status == "1") ? 'Active' : 'Deactive'; ?></td>    

                                                    <td>  <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_question/<?php echo $rowq->sq_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/survey/delete/<?php echo $rowq->sq_id; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	</td>
                                                </tr>
                                            <?php endforeach; ?>                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="tab-pane box" id="listing">	
                                 <div class="form-group col-sm-2">
                                    <label>Course</label>
                                    <select class="form-control filter-rows" id="filter4" data-filter="4" data-type="course">
                                        <option value="">All</option>
                                        <?php foreach ($degree as $row) { ?>
                                            <option value="<?php echo $row->d_name; ?>"
                                                    data-id="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Branch</label>
                                    <select id="filter5" name="branch" data-filter="5" class="form-control filter-rows" data-type="branch">
                                        <option value="">All</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Batch</label>
                                    <select id="filter6" name="batch" data-filter="6" class="form-control filter-rows" data-type="batch">
                                        <option value="">All</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-sm-2">
                                    <label> Semester</label>
                                    <select id="filter7" name="semester" data-filter="7" class="form-control filter-rows" data-type="semester">
                                        <option value="">All</option>

                                    </select>
                                </div>
                                <label style="margin-left: 40px; margin-top: 30px;">OR</label>
                                
                                 
                                <div class="panel-body table-responsive" id="getsubmit">
                                    <table class="table table-striped" id="data-tables-activity">
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
                                                <td><a href="<?php echo base_url(); ?>index.php?admin/confirmparticipate/<?php echo $rows['participate_student_id']; ?>" class="btn btn-info vd_bg-green">Disapprove</a></td>	                                                    

                                                </tr>
<?php endforeach; ?>						
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane box" id="uploads">
                             
                                <div class="panel-body table-responsive" id="upd_getsubmit">
                                <div class="form-group col-sm-2">
                                    <label>Course</label>
                                    <select class="form-control ufilter-rows" id="ufilter2" data-filter="2" data-type="course">
                                        <option value="">All</option>
                                        <?php foreach ($degree as $row) { ?>
                                            <option value="<?php echo $row->d_name; ?>"
                                                    data-id="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Branch</label>
                                    <select id="ufilter3" name="branch" data-filter="3" class="form-control ufilter-rows" data-type="branch">
                                        <option value="">All</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Batch</label>
                                    <select id="ufilter4" name="batch" data-filter="4" class="form-control ufilter-rows" data-type="batch">
                                        <option value="">All</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-sm-2">
                                    <label> Semester</label>
                                    <select id="ufilter5" name="semester" data-filter="5" class="form-control ufilter-rows" data-type="semester">
                                        <option value="">All</option>

                                    </select>
                                </div>
                                 <label style="margin-left: 40px; margin-top: 30px;">OR</label>
  
                                    <table class="table table-striped" id="uploaded-table">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>											
                                                <th><div>Student Name</div></th>	                                               
                                                <th><div>Course</div></th>											
                                                <th><div>Branch</div></th>
                                                <th><div>Batch</div></th>
                                                <th><div>Semester</div></th>											
                                                <th><div>File</div></th>											                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $countsu = 1;



                                            foreach ($uploads as $rowsupl):
                                                $std_id = $rowsupl['std_id'];
                                                //   $pp_id =  $rowsupl['pp_id'];
                                                // if()
                                                $this->db->join('degree', 'degree.d_id=student.std_degree');
                                                $this->db->join('semester', 'semester.s_id=student.semester_id');
                                                $this->db->join('batch', 'batch.b_id=student.std_batch');
                                                $this->db->join('course', 'course.course_id=student.course_id');

                                                $user1 = $this->db->get_where('student', array('std_id' => $std_id))->result_array();
                                                ?>
                                                <tr>
                                                    <td><?php echo $countsu++; ?></td>	
                                                    <td><?php echo $user1[0]['name']; ?></td>	
                                                    <td><?php
                                                        if (isset($user1[0]['d_name'])) {
                                                            echo $user1[0]['d_name'];
                                                        }
                                                        ?></td>

                                                    <td><?php
                                                        if (isset($user1[0]['c_name'])) {
                                                            echo $user1[0]['c_name'];
                                                        }
                                                        ?></td>	
                                                    <td><?php
                                                        if (isset($user1[0]['b_name'])) {
                                                            echo $user1[0]['b_name'];
                                                        }
                                                        ?></td>
                                                    <td><?php
                                                        if (isset($user1[0]['s_name'])) {
                                                            echo $user1[0]['s_name'];
                                                        }
                                                        ?></td>	
                                                    <td id="downloadedfile"><a href="<?php echo $rowsupl['upload_url']; ?>" download=""><i class="fa fa-download" title="<?php echo $rowsupl['upload_file_name']; ?>"></i></a></td>	

                                                </tr>
<?php endforeach; ?>						
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>              
        </div>
        <!-- row --> 
    </div>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript">
         $("#upd_searchform").validate({
            rules: {
                degree:"required",
                course:"required",
                batch:"required",
                semester:"required",

            },
            messages:{
                degree:"select course",
                course:"select branch",
                batch:"select batch",
                semester:"select semester",
            }
        }); 
        $("#sub_searchform").validate({
                  rules: {
                      degree:"required",
                      course:"required",
                      batch:"required",
                      semester:"required",
                  },
                  messages:{
                      degree:"select course",
                      course:"select branch",
                      batch:"select batch",
                      semester:"select semester",
                  }
              });
               $("#searchform").validate({
                      rules: {
                          degree:"required",
                          course:"required",
                          batch:"required",
                          semester:"required",

                      },
                      messages:{
                          degree:"select course",
                          course:"select branch",
                          batch:"select batch",
                          semester:"select semester",
                      }
                  });
    
    $("#upd_courses").change(function(){
                var degree = $(this).val();
                
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_course/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#upd_branches").html(response);
                    }
                });
        });
         $("#upd_branches").change(function(){
                //var course = $(this).val();
                // var degree = $("#degree").val();
                var degree = $("#upd_courses").val();
                var course = $("#upd_branches").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batches/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
                            data: {'course':course},
                            success: function (response1) {
                                $("#upd_semesters").html(response1);
                            }
                        });
                        $("#upd_batches").html(response);
                    }
                });
        });
        $("#upd_searchform").submit(function(){
            var degree =  $("#upd_courses").val();
           var course =  $("#upd_branches").val();
           var batch =  $("#upd_batches").val();
            var semester = $("#upd_semesters").val();
            if($("#upd_courses").val()!="" & $("#upd_branches").val()!="" & $("#upd_batches").val()!="" & $("#upd_semesters").val()!="")
            {
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php?admin/getuploads/",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#upd_getsubmit").html(response);
                }
                
                
            });
            }else{
                $("#upd_searchform").validate({
                    rules: {
                        degree:"required",
                        course:"required",
                        batch:"required",
                        semester:"required",

                    },
                    messages:{
                        degree:"select course",
                        course:"select branch",
                        batch:"select batch",
                        semester:"select semester",
                    }
                });
            
            }
             return false;
            
            
        });    
         $("#sub_courses").change(function(){
                var degree = $(this).val();
                
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_course/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#sub_branches").html(response);
                    }
                });
        });
         $("#sub_branches").change(function(){
                //var course = $(this).val();
                // var degree = $("#degree").val();
                var degree = $("#sub_courses").val();
                var course = $("#sub_branches").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batches/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
                            data: {'course':course},
                            success: function (response1) {
                                $("#sub_semesters").html(response1);
                            }
                        });
                        $("#sub_batches").html(response);
                    }
                });
        });
        $("#sub_searchform").submit(function(){
            var degree =  $("#sub_courses").val();
           var course =  $("#sub_branches").val();
           var batch =  $("#sub_batches").val();
            var semester = $("#sub_semesters").val();
            if($("#sub_courses").val()!="" & $("#sub_branches").val()!="" & $("#sub_batches").val()!="" & $("#sub_semesters").val()!="")
            {
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php?admin/getactivity/",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#getsubmit").html(response);
                }
                
                
            });
            }else{
                $("#sub_searchform").validate({
                  rules: {
                      degree:"required",
                      course:"required",
                      batch:"required",
                      semester:"required",
                  },
                  messages:{
                      degree:"select course",
                      course:"select branch",
                      batch:"select batch",
                      semester:"select semester",
                  }
              });
            }
             return false;
            
            
        });       
        
$("#searchform").submit(function(){
           var degree =  $("#courses").val();
           var course =  $("#branches").val();
           var batch =  $("#batches").val();
            var semester = $("#semesters").val();
            if($("#courses").val()!="" & $("#branches").val()!="" & $("#batches").val()!="" & $("#semesters").val()!="")
            {
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php?admin/getsurvey/",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#getresponse").html(response);
                }
                
                
            });
             } else{
                $("#searchform").validate({
                      rules: {
                          degree:"required",
                          course:"required",
                          batch:"required",
                          semester:"required",

                      },
                      messages:{
                          degree:"select course",
                          course:"select branch",
                          batch:"select batch",
                          semester:"select semester",
                      }
                  });
            }
             return false;
         });
$("#courses").change(function(){
                var degree = $(this).val();
                
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_course/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#branches").html(response);
                    }
                });
        });
         $("#branches").change(function(){
                //var course = $(this).val();
                // var degree = $("#degree").val();
                var degree = $("#courses").val();
                var course = $("#branches").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batches/'; ?>",
                    data:dataString,                   
                    success:function(response){
                         $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
                            data: {'course':course},
                            success: function (response1) {
                                $("#semesters").html(response1);
                            }
                        });
                        $("#batches").html(response);
                    }
                });
        });
        $("#degree").change(function () {
            var degree = $(this).val();

            var dataString = "degree=" + degree;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'index.php?admin/get_cource/'; ?>",
                data: dataString,
                success: function (response) {
                    if (degree == "All")
                    {
                        $("#batch").val($("#batch option:eq(1)").val());
                        $("#course").val($("#course option:eq(1)").val());
                        $("#semester").val($("#semester option:eq(1)").val());
                        //  $("#course")..val($("#semester option:second").val());
                        // $("#semester").prepend(response);
                        // $('#semester option:selected').text();


                    } else {


                        $("#course").html(response);
                    }
                }

            });

        });

        $("#course").change(function () {
            var course = $(this).val();
            var degree = $("#degree").val();
            var dataString = "course=" + course + "&degree=" + degree;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'index.php?admin/get_batchs/'; ?>",
                data: dataString,
                success: function (response) {
                     $.ajax({
                        type:"POST",
                        url:"<?php echo base_url().'index.php?admin/get_semesterall/'; ?>",
                        data:{'course':course},                   
                        success:function(response1){
                            $("#semester").html(response1);
                             $("#semester").val($("#semester option:eq(1)").val());
                        }
                        });
                      $("#semester").val($("#semester option:eq(1)").val());
                    $("#batch").html(response);
                }
            });
        });



        function get_student2(batch, semester = '') {
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?admin/batchwisestudent/',
                type: 'POST',
                data: {'batch': batch},
                success: function (content) {
                    $("#student").html(content);
                }
            });
        }

        function get_students2(sem)
        {
            var batch = $("#batch").val();
            var course = $("#course").val();
            var degree = $("#degree").val();
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?admin/semwisestudent/',
                type: 'POST',
                data: {'batch': batch, 'sem': sem, 'course': course, 'degree': degree},
                success: function (content) {
                    //alert(content);
                    $("#student").html(content);
                }
            });


        }








        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

        $().ready(function () {

         $("#frmsurvey").validate({
            rules: {
                question: "required",
                description: "required",
                status: "required"
            },
            messages: {
                question: "enter question",
                description: "enter description",
                status: "select status"
            },
        });

            $("#dateofsubmission").datepicker({
                dateFormat: ' MM dd, yy',
                minDate: 0
            });
            jQuery.validator.addMethod("character", function (value, element) {
                return this.optional(element) || /^[A-z]+$/.test(value);
            }, 'Please enter a valid character.');

            jQuery.validator.addMethod("url", function (value, element) {
                return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
            }, 'Please enter a valid URL.');

            $("#frmparticipate").validate({
                rules: {
                    degree: "required",
                    course: "required",
                    batch: "required",
                    semester: "required",
                    dateofsubmission: "required",
                    participatefile: {
                        required: true,
                        extension: 'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt',
                    },
                    title:
                            {
                                required: true,
                            },
                },
                messages: {
                    degree: "Please select course",
                    course: "Please select branch",
                    batch: "Please select batch",
                    semester: "Please select semester",
                    dateofsubmission: "Please select date of submission",
                    participatefile: {
                        required: "Please select participate file",
                        extension: 'Please upload valid file',
                    },
                    title:
                            {
                                required: "Please enter title",
                            },
                },
            });
        });

        $(document).ready(function () {
        "use strict";
        $('#data-tabless').dataTable();
        });


    </script>

<script type="text/javascript">
	$(document).ready(function() {
		"use strict";				
		$('#data-tablessearch').DataTable( {
             aoColumnDefs: [
                {
                   bSortable: false,
                   aTargets: [ -1 ]
                }
              ]
        } );

	} );
</script>
<script type="text/javascript">
	$(document).ready(function() {
		"use strict";				
		$('#data-tablesupd').DataTable( {
             aoColumnDefs: [
                {
                   bSortable: false,
                   aTargets: [ -1 ]
                }
              ]
        } );

	} );
</script>
<script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#data-tables-activity').dataTable({
                "order": [[7, "desc"]],
                "dom": "<'row'<'col-sm-6'><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
            });
            $('.filter-rows').on('change', function () {
                var filter_id = $(this).attr('data-filter');
                filter_column(filter_id);
            });

            function filter_column(filter_id) {
                $('#data-tables-activity').DataTable().column(filter_id).search(
                        $('#filter' + filter_id).val()
                        ).draw();
            }
        });
    </script>

    <style>
        #data-tables-activity_filter{
            margin-top: -50px;
        }
    </style>
<script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#upload-data-table').dataTable({
                "order": [[7, "desc"]],
                "dom": "<'row'<'col-sm-6'><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
            });
            $('.sfilter-rows').on('change', function () {
                var filter_id = $(this).attr('data-filter');
                filter_column(filter_id);
            });

            function filter_column(filter_id) {
                $('#upload-data-table').DataTable().column(filter_id).search(
                        $('#filter' + filter_id).val()
                        ).draw();
            }
        });
           $(document).ready(function() {
		"use strict";				
		$('#data-tablesupd').dataTable();
	});
    </script>

    <style>
        #upload-data-table_filter{
            margin-top: -50px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#survey-table').dataTable({
                "order": [[7, "desc"]],
                "dom": "<'row'<'col-sm-6'><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
            });
            $('.pfilter-rows').on('change', function () {
                var filter_id = $(this).attr('data-filter');
                filter_column(filter_id);
            });

            function filter_column(filter_id) {
                $('#survey-table').DataTable().column(filter_id).search(
                        $('#pfilter' + filter_id).val()
                        ).draw();
            }
        });
           $(document).ready(function() {
		"use strict";				
		$('#survey-table').dataTable();
	});
    </script>

    <style>
        #survey-table_filter{
            margin-top: -50px;
        }
    </style>
  <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#uploaded-table').dataTable({
                "dom": "<'row'<'col-sm-6'><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
            });
            $('.ufilter-rows').on('change', function () {
                var filter_id = $(this).attr('data-filter');
                filter_column(filter_id);
            });

            function filter_column(filter_id) {
                $('#uploaded-table').DataTable().column(filter_id).search(
                        $('#ufilter' + filter_id).val()
                        ).draw();
            }
        });
           $(document).ready(function() {
		"use strict";				
		$('#uploaded-table').dataTable();
	});
    </script>

    <style>
        #uploaded-table_filter{
            margin-top: -50px;
        }
    </style>