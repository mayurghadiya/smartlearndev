<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
           <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("Home");?></a> </li>
                        <li><?php echo ucwords("asset management");?></li>
                        <li class="active"><?php echo ucwords("Study Resource Management");?></li>
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
                                 <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Course");?></label>
                                    <select class="form-control filter-rows" id="filter2" data-filter="2" data-type="course">
                                        <option value="">All</option>
                                        <?php foreach ($degree as $row) { ?>
                                            <option value="<?php echo $row->d_name; ?>"
                                                    data-id="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Branch");?></label>
                                    <select id="filter3" name="branch" data-filter="3" class="form-control filter-rows" data-type="branch">
                                        <option value="">All</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Batch");?></label>
                                    <select id="filter4" name="batch" data-filter="4" class="form-control filter-rows" data-type="batch">
                                        <option value="">All</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-sm-2">
                                    <label> <?php echo ucwords("Semester");?></label>
                                    <select id="filter5" name="semester" data-filter="5" class="form-control filter-rows" data-type="semester">
                                        <option value="">All</option>

                                    </select>
                                </div>
                                <label style="margin-left: 40px; margin-top: 30px;">OR</label>
                                
                                <div class="panel-body table-responsive" id="getresponse">
                                    <table class="table table-striped" id="studyresource-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>											
                                                <th><div><?php echo ucwords("Title");?></div></th>											
                                                <th><div><?php echo ucwords("Course");?></div></th>
                                                <th><div><?php echo ucwords("Branch");?></div></th>
                                                <th><div><?php echo ucwords("Batch");?></div></th>											
                                                <th><div><?php echo ucwords("Semester");?></div></th>											                                                
                                                <th><div><?php echo ucwords("Date");?></div></th>									
                                                <th><div><?php echo ucwords("File");?></div></th>											
                                                <th><div><?php echo ucwords("Operation");?></div></th>											
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
                                                  
                                                    <td><?php echo date_formats($row->study_dos); ?></td>	
                                                    <td id="downloadedfile"><a href="<?php echo $row->study_url; ?>" download=""  title="<?php echo $row->study_filename; ?>"><i class="fa fa-download"></i></a></td>	
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_studyresource/<?php echo $row->study_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/studyresource/delete/<?php echo $row->study_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
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
            "use strict";
            $('#studyresource-tables').dataTable({
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
                $('#studyresource-tables').DataTable().column(filter_id).search(
                        $('#filter' + filter_id).val()
                        ).draw();
            }
        });
    </script>

    <style>
        #studyresource-tables_filter{
            margin-top: -50px;
        }
    </style>
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
    
  
     <ul class="nav nav-tabs bordered nav-fixedtabs" >
                          
                                <li class="nav-fixed-tabs" >
                                    <a href="#add"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addstudyresource/');"  id="navfixed" class="nav-fixed-a-tabs vd_bg-red" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                <i class="fa fa-plus-circle"> </i>
</a>
                                </a></li>
                                
                        </ul>