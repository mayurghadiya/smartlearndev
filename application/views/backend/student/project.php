<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="">
        <div class="vd_content clearfix">
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header">
                    <h1><?php echo $page_title ?></h1>            
                </div>
                
            </div>
            <div class="vd_content-section clearfix">
                <?php
                if ($param == "submission") {
                    ?>
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Project List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Submitted Project List
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
                                                <th><div>Project Title</div></th>											
                                                <th><div>Degree</div></th>											
                                                <th><div>Batch</div></th>											
                                                <th><div>Semester</div></th>											
                                                <th><div>Date of submission</div></th>	
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php $count = 1;
                                                foreach ($project as $row):
                                                    ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>	
                                                <td><?php echo $row->pm_title; ?></td>	
                                                <td>
                                                            <?php
                                                            foreach ($degree as $deg) {
                                                                if ($deg->d_id == $row->pm_degree) {
                                                                    echo $deg->d_name;
                                                                }
                                                            }
                                                            ?>
                                                </td>	
                                                <td>
                                                            <?php
                                                            foreach ($batch as $bch) {
                                                                if ($bch->b_id == $row->pm_batch) {
                                                                    echo $bch->b_name;
                                                                }
                                                            }
                                                            ?>
                                                </td>	
                                                <td>
                                                            <?php
                                                            foreach ($semester as $sem) {
                                                                if ($sem->s_id == $row->pm_semester) {
                                                                    echo $sem->s_name;
                                                                }
                                                            }
                                                            ?>
                                                                
                                                </td>	

                                                <td><?php echo date('F d, Y',strtotime($row->pm_dos)); ?></td>	
                                                <td>
                                               <a href="<?php echo $row->pm_url; ?>" download=""><i class="fa fa-download"></i></a></td>
                                                <td>
                                                    <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_submit_project/<?php echo $row->pm_id; ?>');" data-original-title="Submit Project" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a></td>					
                                                    
                                            </tr>
    <?php endforeach; ?>						
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->
                                
                                
                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                               <?php
                                $this->db->select('s.*,a.*');
                                 $this->db->from('project_document_submission s');
                                 $this->db->join('project_manager a','a.pm_id=s.project_id');
                                 $this->db->where('s.student_id',$this->session->userdata('std_id'));
                                    $submitedproject= $this->db->get();
                               ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel-body table-responsive">
                                            <div class="panel">
                                                
                                                <table class="table table-striped" id="data-tables">
                                                    <thead>
                                                        <tr>
                                                            <th><div>#</div></th>
                                                            <th><div>Project Title</div></th>												
                                                            <th><div>Submitted Date</div></th>												
                                                            <th><div>Document Name</div></th>	                                                                
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                <?php $count = 1;foreach($submitedproject->result() as $row): ?>
                                                        <tr>
                                                            <td><?php echo $count++;?></td>
                                                            <td><?php echo $row->pm_title;?></td>	
                                                            <td><?php echo date('F d, Y',strtotime($row->dos));?></td>	
                                                            <td><a href="<?php echo base_url().'uploads/project_file/'.$row->document_file ?>" download="" title="<?php echo $row->document_file; ?>"><?php echo $row->document_file;?></a></td>	
                                                        </tr>
                                                <?php endforeach;?>						
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php
                } elseif ($param = "video") {
                    ?>
                <div class="row">
                    <div class="col-sm-12">	
                            <?php
                            foreach ($project as $p) {
                                $filepath = 'uploads/project_file/' . $p->pm_filename;
                                $extension = pathinfo($filepath, PATHINFO_EXTENSION);
                                if ($extension == "mp4" || $extension == "wmv") {
                                    echo pathinfo($filepath, PATHINFO_BASENAME) . "<br>";
                                    ?>
                        <a id="play-video" href="#"> 
                            <iframe id="video" width="420" height="315" src="//www.youtube.com/embed/9B7te184ZpQ?rel=0" frameborder="0" allowfullscreen></iframe>
                        </a><br />
                                    <?php
                                }
                            }
                            ?>
                    </div>
                </div>
                    <?php
                }
                ?>
            </div>              
        </div>
        <!-- row --> 
    </div>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript">
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });
        
        
        $().ready(function () {
            $("#dateofsubmission").datepicker({
            });
            jQuery.validator.addMethod("character", function (value, element) {
                return this.optional(element) || /^[A-z]+$/.test(value);
            }, 'Please enter a valid character.');
            
            jQuery.validator.addMethod("url", function (value, element) {
                return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
            }, 'Please enter a valid URL.');
            
            $("#frmproject").validate({
                rules: {
                    degree: "required",
                    batch: "required",
                    semester: "required",
                    student: "required",
                    dateofsubmission: "required",
                    pageurl: {
                        required: true,
                        url: true,
                    },
                    projectfile: "required",
                    title: {
                        required: true,
                        character: true,
                    },
                },
                messages: {
                    degree: "Degree is required",
                    batch: "Batch is required",
                    semester: "Semester is required",
                    student: "Student is required",
                    dateofsubmission: "Submission date is required",
                    pageurl: {
                        required: "Page url is required",
                    },
                    projectfile: "Project file is required",
                    title: {
                        required: "Title is required",
                        character: "Valid title is required",
                    },
                }
            });
        });
    </script>	