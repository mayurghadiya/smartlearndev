    
<?php 
$edit_data =$this->db->get_where('student_exam_center',array('student_exam_center_id' => $param2))->result();
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Admission Type
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  

                        <?php echo form_open(base_url() . 'index.php?student/exam_center/do_update/'.$edit_data[0]->student_exam_center_id, array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'edit_exam_center', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Exam</label>
                                <div class="col-sm-5">
                                    <select name="exam1" id="exam1">
                                        <option value="">Select exam</option>
                                             <?php
                                          $dataexam=$this->db->get('exam_manager')->result();
                                          foreach($dataexam as $exm)
                                          {
                                              ?>
                                        <option value="<?=$exm->em_id?>" <?php if($exm->em_id==$edit_data[0]->exam_id){ echo "selected";} ?>><?=$exm->em_name;?></option>
                                        <?php
                                          }
					?> 
                                    </select>
                                </div>
                            </div>	

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Center</label>
                                <div class="col-sm-5">
                                    <select name="center1" id="center1">
                                        <option value="">Select center</option>
                                            <?php
                                          $datacenter=$this->db->get('center_user')->result();
                                          foreach($datacenter as $cen)
                                          {
                                              ?>
                                        <option value="<?=$cen->center_id?>" <?php if($cen->center_id==$edit_data[0]->center_id){ echo "selected";} ?>><?=$cen->center_name;?></option>
                                        <?php
                                          }
					?>                                        
                                    </select>
                                </div>
                            </div>	
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info">Edit Exam Center</button>
                                </div>
                            </div>

                        </div>  
                        </form>  
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>

  <script>
        $(document).ready(function () {
            $("#exam1").change(function () {
                var option="";
                var id = $(this).val();
                $.ajax({
                    url: "<?= base_url() ?>/index.php?student/get_center",
                    type: "post",
                    dataType: "json",
                    data:
                            {
                                id: id,
                    },
                    success: function (result) {
                        for (var i = 0; i < result.length; i++)
                        {
                            for (var j = 0; j < result[i].length; j++)
                            {
                                option += "<option value='" + result[i][j].center_id + "' >" + result[i][j].center_name + "</option>";
                            }
                        }
                        $('#center1').children('option:not(:first)').remove();
                        $("#center1").append(option);
                    }
                });
            });
        });
    </script>
     <script type="text/javascript">
      $.validator.setDefaults({
      submitHandler: function (form) {
       form.submit();
       }
       });
        $(document).ready(function () {
        $("#edit_exam_center").validate({
        rules: {
             exam1:{required: true},
             center1: "required",
        },
        messages: {
            exam1: "Exam is required",
            center1: "Center is required",
        }
        });
        });
    </script>