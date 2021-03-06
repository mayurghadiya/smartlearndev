<?php
$edit_data = $this->db->get_where('participate_manager', array('pp_id' => $param2))->result_array();
foreach ($edit_data as $row):
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Update Participate");?>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                            <div class="">
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                </div>  
                            <?php echo form_open(base_url() . 'index.php?admin/participate/do_update/' . $row['pp_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditparticipate', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("department ");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="degree" id="degree2">
                                        <option value="">Select department</option>
                                        <option value="All" <?php if($row['pp_degree']=="All"){ echo "selected=selected"; } ?>>All</option>
                                        <?php
                                        $datadegree = $this->db->get_where('degree', array('d_status' => 1))->result();
                                        foreach ($datadegree as $rowdegree) {
                                            if ($rowdegree->d_id == $row['pp_degree']) {
                                                ?>
                                                <option value="<?= $rowdegree->d_id ?>" selected><?= $rowdegree->d_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $rowdegree->d_id ?>"><?= $rowdegree->d_name ?></option>							
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Branch ");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="course" id="course2">
                                        <option value="">Select Branch</option>
                                         <option value="All" <?php if($row['pp_course']=="All"){ echo "selected=selected"; } ?>>All</option>
                                        <?php
                                        $course = $this->db->get_where('course', array('course_status' => 1))->result();
                                        foreach ($course as $crs) {
                                            if ($crs->course_id == $row['pp_course']) {
                                                ?>
                                                <option value="<?= $crs->course_id ?>" selected><?= $crs->c_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $crs->course_id ?>" ><?= $crs->c_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Batch ");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="batch" id="batch2" onchange="get_sem(this.value);">
                                        <option value="">Select batch</option>
                                          <option value="All" <?php if($row['pp_batch']=="All"){ echo "selected=selected"; } ?>>All</option>
                                        <?php
                                        $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
                                        foreach ($databatch as $row1) {
                                            if ($row1->b_id == $row['pp_batch']) {
                                                ?>
                                                <option value="<?= $row1->b_id ?>" selected><?= $row1->b_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $row1->b_id ?>" ><?= $row1->b_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>	
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Semester ");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="semester" id="semester2"  onchange="get_students(this.value);">   
                                    <option value="" >Select Semester</option> 
                                    <option value="All" <?php if($row['pp_semester']=="All"){ echo "selected=selected"; } ?>>All</option>   
                                        <?php
                                        $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                        foreach ($datasem as $rowsem) {
                                            if ($rowsem->s_id == $row['pp_semester']) {
                                                ?>
                                                <option value="<?= $rowsem->s_id ?>" selected><?= $rowsem->s_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $rowsem->s_id ?>" ><?= $rowsem->s_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Participate Title ");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="title" id="title"  value="<?php echo $row['pp_title']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Date  ");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" readonly="" class="form-control" name="dateofsubmission1" id="dateofsubmission1" value="<?php echo $row['pp_dos']; ?>"/>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="pageurl" id="pageurl" value="<?php echo $row['pp_url']; ?>" />
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Description");?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="description" id="description" ><?php echo $row['pp_desc']; ?></textarea>
                                </div>
                            </div>                           
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="submit btn btn-info vd_bg-green"><?php echo ucwords("Update");?></button>
                                </div>
                            </div>
                            </form>
                        </div> </div> </div>
            </div>
        </div>
    </div>

    <?php
endforeach;
?>
<script type="text/javascript">
    
    
          $("#degree2").change(function(){
                var degree = $(this).val();
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_cource/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        if(degree=="All")
                        {

                             $("#batch2").val($("#batch2 option:eq(1)").val());
                             $("#course2").val($("#course2 option:eq(1)").val());
                              $("#semester2").val($("#semester2 option:eq(1)").val());
                              
                    }else{
                        $("#course2").html(response);
                    }

                    }
                });
        });
        
         $("#course2").change(function(){
                var course = $(this).val();
                 var degree = $("#degree2").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batchs/'; ?>",
                    data:dataString,                   
                    success:function(response){
                          $("#semester2").val($("#semester2 option:eq(1)").val());
                        $("#batch2").html(response);
                    }
                });
        });
    
    
    function get_student(batch, semester = '') {
        $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/batchwisestudent/',
           type: 'POST',
           data: {'batch':batch},
           success: function(content){
               $("#student2").html(content);
           }
        });
    }
    
    function get_students(sem)
    {
      /*  var batch = $("#batch2").val();
         $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/semwisestudent/',
           type: 'POST',
           data: {'batch':batch,'sem':sem},
           success: function(content){
               //alert(content);
               $("#student2").html(content);
           }
        });
        */
             var batch = $("#batch2").val();
        var course = $("#course2").val();
         var degree = $("#degree2").val();
         $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/semwisestudent/',
           type: 'POST',
           data: {'batch':batch,'sem':sem,'course':course,'degree':degree},
           success: function(content){
               //alert(content);
               $("#student2").html(content);
           }
        });
        
    }
    
    function participatefile(myfile)
    {
        alert(myfile);
        var val = $(myfile).val();
        var ext = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
    }
    /* $("#participatefile").change(function() {
alert('123');
    var val = $(this).val();

    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
        case 'gif': case 'jpg': case 'png':
            $("#fileerror").val("");
            
            break;
        default:
            $(this).val('');
            // error message here
            $("#fileerror").val("Please Upload valid Image!");
            break;
    }
});*/
//    $(document).ready(function(){
//        
//        $('#batch').on('change', function() {
//            alert(1);
//        });
//    });
    
    
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });
    
   



    $().ready(function () {

        $("#dateofsubmission1").datepicker({
            dateFormat: ' MM dd, yy',
            minDate:0
        });
        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z]+$/.test(value);
        }, 'Please enter a valid character.');

        jQuery.validator.addMethod("url", function (value, element) {
            return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
        }, 'Please enter a valid URL.');

        $("#frmeditparticipate").validate({
            rules: {
                degree: "required",
                course:"required",
                batch: "required",
                semester: "required",
                student: "required",
                dateofsubmission1: "required",               
                title:
                        {
                            required: true,
                            
                        },
               participatefile: {   
                           extension:'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt|jpeg',  
                     },
            },
            messages: {
                degree: "Select department",
                 course:"Select branch",
                batch: "Select batch",
                semester: "Select semester",
                student: "Select student",
                dateofsubmission1: "Select date of submission",
                
                title:
                        {
                            required: "Enter title",
                           
                        },
               participatefile:{  
                            extension:'Upload valid file', 
                        }
            },
        });
    });
</script>
