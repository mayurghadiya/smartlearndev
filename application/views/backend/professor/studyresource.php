<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
           <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                     <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?professor/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("asset management");?></li>
                         <li><?php echo ucwords("Study Resource Management");?></li>
                    </ul>                 
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Study Resource Management");?></h1>
                    
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Study Resource List");?>
                                </a></li>
                            
                        </ul>
                        <!------CONTROL TABS END------> 

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">	
                                 <form action="#" method="post" id="searchform">
                                            <div class="form-group col-sm-3 validating">
                                                <label>Department</label>
                                                <select id="courses" name="degree" class="form-control">
                                                    <option value="">Select department</option>
                                                    <option value="All">All</option>
                                                    
                                                    <?php foreach ($degree as $row) { ?>
                                                        <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-3 validating">
                                                <label>Branch</label>
                                                <select id="branches" name="course" class="form-control">
                                                     <option value="">Select Branch</option>
                                                     <option value="All">All</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-3 validating">
                                                <label>Batch</label>
                                                <select id="batches" name="batch" class="form-control">
                                                     <option value="">Select Batch</option>
                                                      <option value="All">All</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-2 validating">
                                                <label>Select Semester</label>
                                                <select id="semesters" name="semester" class="form-control">
                                                    <option value="">Select Semester</option>
                                                     <option value="All">All</option>
                                                  
                                                    <?php foreach ($semester as $row) { ?>
                                                        <option value="<?php echo $row->s_id; ?>"
                                                               ><?php echo $row->s_name; ?></option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                     
                                
                                    <div class="form-group col-sm-1">
                                        <label>&nbsp;</label>
                                        
                                    <button type="submit" class="submit btn btn-info vd_bg-green">Go</button>
                                    </div>
                                
                                    </form>
                               
                                <div class="panel-body table-responsive" id="getresponse">
                                    <table class="table table-striped" id="studyresource-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>											
                                                <th><div><?php echo ucwords("Title");?></div></th>											
                                                <th><div><?php echo ucwords("department");?></div></th>
                                                <th><div><?php echo ucwords("Branch");?></div></th>
                                                <th><div><?php echo ucwords("Batch");?></div></th>											
                                                <th><div><?php echo ucwords("Semester");?></div></th>											                                                                                               
                                                <th><div><?php echo ucwords("File");?></div></th>											
                                                <th><div><?php echo ucwords("Action");?></div></th>											
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($studyresource as $row): ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>	
                                                    <td><?php echo $row->study_title; ?></td>	
                                                    <td>
                                                        <?php
                                                        if($row->study_degree!="All")
                                                        {
                                                        foreach ($degree as $deg) {
                                                            if ($deg->d_id == $row->study_degree) {
                                                                echo $deg->d_name;
                                                            }
                                                        }
                                                        }
                                                        else{
                                                            echo "All";
                                                        }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                        if($row->study_course!="All")
                                                        {
                                                        foreach ($course as $crs) {
                                                            if ($crs->course_id == $row->study_course) {
                                                                echo $crs->c_name;
                                                            }
                                                        }
                                                        }else{
                                                            echo "All";
                                                            
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if($row->study_batch!="All")
                                                        {
                                                        foreach ($batch as $bch) {
                                                            if ($bch->b_id == $row->study_batch) {
                                                                echo $bch->b_name;
                                                            }
                                                        }
                                                        }
                                                        else{
                                                            echo "All";
                                                            
                                                        }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                         if($row->study_sem!="All")
                                                        {
                                                        foreach ($semester as $sem) {
                                                            if ($sem->s_id == $row->study_sem) {
                                                                echo $sem->s_name;
                                                            }
                                                        }
                                                        }else{
                                                            echo "All";
                                                        }
                                                        ?>

                                                    </td>	
                                                   <td id="downloadedfile"><a href="<?php echo $row->study_url; ?>" download=""  title="<?php echo $row->study_filename; ?>"><i class="fa fa-download"></i></a></td>	
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_studyresource/<?php echo $row->study_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?professor/studyresource/delete/<?php echo $row->study_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
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
                               
                                <!----CREATION FORM ENDS-->
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
         $(document).ready(function () {
    
        $("#searchform").submit(function(){
           var degree =  $("#courses").val();
           var course =  $("#branches").val();
           var batch =  $("#batches").val();
            var semester = $("#semesters").val();
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php?professor/getstudyresource/",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#getresponse").html(response);
                }
                
                
            });
             return false;
         });
         $("#courses").change(function(){
                var degree = $(this).val();
                
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?professor/course_filter/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        if(degree=='All')
                        {
                            $("#branches").html(response);
                             $("#batches").val($("#batches option:eq(1)").val());
                             $("#branches").val($("#branches option:eq(1)").val());
                             $("#semesters").val($("#semesters option:eq(1)").val());
                            
                        }
                        else{
                            $("#branches").append(response);
                            
                        }
                    }
                });
        });
        $("#batches").change(function(){
            var batches = $("#batches").val();
            if(batches=='All')
            {
                $("#semesters").val($("#semesters option:eq(1)").val());
            }
        });
         $("#branches").change(function(){
                //var course = $(this).val();
                // var degree = $("#degree").val();
                var degree = $("#courses").val();
                var course = $("#branches").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?professor/batch_filter/'; ?>",
                    data:dataString,                   
                    success:function(response){
                         if(course=='All')
                        {
                             $("#batches").html(response);
                             $("#batches").val($("#batches option:eq(1)").val());                            
                             $("#semesters").val($("#semesters option:eq(1)").val());
                           
                        }
                        else{
                           $("#batches").append(response);
                            
                        }
                        
                    }
                });
        });
        });
        $(document).ready(function () {
            $('#studyresource-tables').dataTable();

        });
    </script>

   <style>
    .nav-fixedtabs {
    left: 86%;
    position: fixed;
    top: 25%;
    }
    #navfixed{
        cursor: pointer;
    }
    
    </style>
    
    
    <div class="md-fab-wrapper">

        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addstudyresource/');" href="#" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>