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
                        Edit Project
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                            <?php echo form_open(base_url() . 'index.php?admin/participate_attend/create/' . $row['pp_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmaddparticipate', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                          
                             
                            
                           
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="submit btn btn-info">Update</button>
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
                        $("#course2").html(response);
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
                        $("#batch2").html(response);
                    }
                });
        });
    
    
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    $().ready(function () {
        $("#submissiondate1").datepicker({
            minDate: 0
        });

        $("#frmeditassignment").validate({
            rules: {
                degree:"required",
                course: "required",
                batch: "required",
                semester: "required",
                submissiondate: "required",              
                title:
                        {
                            required: true,
                           
                        },
                assignmentfile: {
                    
                    extension:'gif|jpg|png|jpeg|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt',  
                                                                            
                },
            },
            messages: {
                degree:"Please select degree",
                course: "Please select course",
                batch: "Please select batch",
                semester: "Please select semester",
                submissiondate: "Please select date of submission",
                title:
                        {
                            required: "Please enter title",
                            
                        },
                assignmentfile: {
                                   
                                    extension:'Please upload valid file',  
                                },
            }
        });
    });
</script>
