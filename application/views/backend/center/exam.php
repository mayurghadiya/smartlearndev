<div class="content">
    <div class="container">
        <div class="vd_content-wrapper">
            <div class="">
                <div class="vd_content clearfix">
                    <div class="vd_title-section clearfix">
                        <div class="vd_panel-header">
                            <h1>Registered Student List</h1>            
                        </div>
                    </div>
                    <div class="vd_content-section clearfix">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel widget light-widget">
                                     <?php echo form_open(base_url() . 'index.php?student/exam_center/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'add_exam_center', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Exam</label>
                                            <div class="col-sm-5">
                                                <select name="exam" id="exam">
                                                    <option value="">Select exam</option>
                                                    <?php
                                                    foreach ($exam_list as $row) {
                                                        ?>
                                                             <option value="<?= $row->em_id ?>"><?= $row->em_name .'&nbsp['.$row->em_date.']' ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	
                                            
                                    </div>  
                                    </form>  
                                        
                                    <div class="col-sm-">
                                        <div class="panel-body table-responsive">
                                            <div class="panel">				
                                                <div id="stdlist">
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <script type="text/javascript">
     
        $(document).ready(function () {
            
                 $("#exam").change(function(){
                var examid = $(this).val();
                if(examid!='')
                {                var dataString = "examid="+examid;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?center_user/get_registered_student/exam'; ?>",
                    data: {
                        examid: examid,
                        timetabeleid:'',
                    },                   
                    success:function(response){
                        $("#stdlist").html(response);
                }
            });
            }
        });
    });
    </script>
