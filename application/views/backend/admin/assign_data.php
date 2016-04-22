<!-- Middle Content Start -->  
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a> </li>
                        <li><a href="#">Pages</a> </li>
                        <li class="active">Assignment Management</li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Assignment Management</h1>                    
                </div>
            </div>
           
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Assignment List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Assignment
                                </a></li>
                                
                               
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">		
                                
                                 <div class="form-group col-sm-2">
                                    <label>Course</label>
                                    <select class="form-control filter-rows" id="filter2" data-filter="2" data-type="course">
                                        <option value="">All</option>
                                        <?php foreach ($degree as $row) { ?>
                                            <option value="<?php echo $row->d_name; ?>"
                                                    data-id="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Branch</label>
                                    <select id="filter3" name="branch" data-filter="3" class="form-control filter-rows" data-type="branch">
                                        <option value="">All</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Batch</label>
                                    <select id="filter4" name="batch" data-filter="4" class="form-control filter-rows" data-type="batch">
                                        <option value="">All</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-sm-2">
                                    <label> Semester</label>
                                    <select id="filter5" name="semester" data-filter="5" class="form-control filter-rows" data-type="semester">
                                        <option value="">All</option>

                                    </select>
                                </div>
                                 <label style="margin-left: 40px; margin-top: 30px;">OR</label>
                               <div class="panel-body table-responsive" id="getresponse">
                                    
<table cellpadding="0" cellspacing="0" border="0" id="data" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
             <th>Last Name</th>
        </tr>
    </thead>
    <tbody></tbody>
    <tfoot></tfoot>
</table>
                                </div>    
                             </div>
                           
                            
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">  
<div class="">
                                    <span style="color:red">* Is Mandatory Field</span> 
                                </div>                                       
<?php echo form_open(base_url() . 'index.php?admin/assignment/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmassignment', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Assignment Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="title" id="title" />
                                            </div>
                                             <lable class="error" id="error_lable_exist" style="color:#f85d2c"></lable>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label">Course<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree">
                                                    <option value="">Select Course</option>
                                                    <?php
                                                    $degree = $this->db->get_where('degree', array('d_status' => 1))->result();
                                                    foreach ($degree as $dgr) {
                                                        ?>
                                                        <option value="<?= $dgr->d_id ?>"><?= $dgr->d_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Branch<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course">
                                                    <option value="">Select Branch</option>
                                                    <?php
                                                   /* $course = $this->db->get_where('course', array('course_status' => 1))->result();
                                                    foreach ($course as $crs) {
                                                        ?>
                                                        <option value="<?= $crs->course_id ?>"><?= $crs->c_name ?></option>
                                                        <?php
                                                    }*/
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Batch<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="batch" id="batch">
                                                    <option value="">Select Batch</option>
                                                    <?php
                                                  /*  $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
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
                                            <label class="col-sm-3 control-label">Semester<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester">
                                                    <option value="">Select Semester</option>
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

                                      <!--  <div class="form-group">
                                            <label class="col-sm-3 control-label">Assignment URL</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="assignmenturl" id="assignmenturl" />
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Submission Date<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="submissiondate" id="submissiondate" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">File Upload<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="assignmentfile" id="assignmentfile" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green">Add Assignment</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                                <!----CREATION FORM ENDS-->
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#data').dataTable({
            "type":"POST",
            "ajax": "<?php echo base_url('index.php?admin/get_data'); ?>",
            "pageLength": "10",
            "order": [[ 0, "desc" ]],
            "aoColumnDefs": [
                { "bVisible": false, "aTargets": [0] },
                {
                    "bSortable": false,
                    "aTargets": ["no-sort"]  
                }],
            "dom": 'T<"clear">lfrtip',
            tableTools: {
                "sSwfPath": "<?php echo base_url("assets/plugins/data_tables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"); ?>"
            }
        });
});
</script>