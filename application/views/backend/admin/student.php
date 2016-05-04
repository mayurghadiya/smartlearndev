<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                     <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("basic management");?></li>
                         <li><?php echo ucwords("student");?></li>
                    </ul>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Student Management");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                     <?php echo ucwords("Student List");?>
                                </a></li>                           
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">

                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">	

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="">
                                            <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                        </div>  
                                        <form id="frmstudentlist" name="frmfilterlist" action="#" enctype="multipart/form-data" class="form-vertical form-groups-bordered validate">
                                            <div class="form-group col-sm-2">
                                                <label ><?php echo ucwords("Course");?><span style="color:red">*</span></label>
                                                    <select class="form-control filter-rows" name="filterdegree" id="filterdegree" >
                                                        <option value="">Select Course</option>
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
                                            <div class="form-group col-sm-2">
                                                <label ><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                                                    <select class="form-control filter-rows" name="filtercourse" id="filtercourse" >
                                                        <option value="">Select Branch</option>

                                                    </select>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label><?php echo ucwords("Batch");?><span style="color:red">*</span></label>
                                                <select name="filterbatch" id="filterbatch" class="form-control">
                                                        <option value="">Select batch</option>

                                                    </select>
                                            </div>	
                                            <div class="form-group col-sm-2">
                                                <label><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                                                    <select class="form-control filter-rows" name="filtersemester" id="filtersemester" >
                                                        <option value="">Select semester</option>
                                                    </select>
                                            </div>

                                            <div class="form-group col-sm-2">
                                                <label></label>
                                                <button type="button" class="btn vd_btn vd_bg-green form-control filter-rows" id="btnsubmit"><?php echo ucwords("Search");?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="panel-body table-responsive" >
                                    <div id="filterdata" >

                                    </div>
                                    
                                </div>
                            </div>

                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                
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
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
<script type="text/javascript">


   

  

    $("#filterdegree").change(function () {
        var degree = $(this).val();
        var dataString = "degree=" + degree;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'index.php?admin/get_cource/student'; ?>",
            data: dataString,
            success: function (response) {
                $("#filtercourse").html(response);
            }
        });
    });

    $("#filtercourse").change(function () {
        var course = $(this).val();
        var degree = $("#filterdegree").val();
        var dataString = "course=" + course + "&degree=" + degree;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'index.php?admin/get_batchs/student'; ?>",
            data: dataString,
            success: function (response) {
                $("#filterbatch").html(response);

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
                    data: dataString,
                    success: function (response1) {
                        $("#filtersemester").html(response1);
                    }
                });
            }
        });
    });


    $.validator.setDefaults({
        submitHandler: function (form) {

            //  filecheck(img);
            form.submit();

        }
    });

    $(document).ready(function () {

        var form = $("#frmstudentlist");

        $("#btnsubmit").click(function () {
            $("#frmstudentlist").validate({
                rules: {
                    filterdegree: "required",
                    filtercourse: "required",
                    filterbatch: "required",
                    filtersemester: "required",
                },
                messages: {
                    filterdegree: "Select course",
                    filtercourse: "Select branch",
                    filterbatch: "Select batch",
                    filtersemester: "Select semester",
                }
            });

            if (form.valid() == true)
            {
                var degree = $("#filterdegree").val();
                var course = $("#filtercourse").val();
                var batch = $("#filterbatch").val();
                var sem = $("#filtersemester").val();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/get_filter_student/',
                    type: 'POST',
                    data: {'batch': batch, 'sem': sem, 'course': course, 'degree': degree},
                    success: function (content) {
                        $("#filterdata").html(content);
                        // $("#dtbl").hide();
                        $('#data-tables').DataTable({
                            aoColumnDefs: [
                                {
                                    bSortable: false,
                                    aTargets: [-1]
                                }
                            ]
                        });
                    }
                });
            }
        });


      
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

        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/add_student/');" href="#" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>
