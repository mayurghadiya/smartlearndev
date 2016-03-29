    
<div class="content">
    <div class="container">
        <div class="vd_content-wrapper">
            <div class="">
                <div class="vd_content clearfix">
                    <div class="vd_title-section clearfix">
                        <div class="vd_panel-header">
                            <h1><?php echo $page_title ?></h1>            
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
                                                    foreach ($exam_listing as $row) {
                                                        ?>
                                                    <option value="<?= $row->em_id ?>"><?= $row->em_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	
                                            
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Center</label>
                                            <div class="col-sm-5">
                                                <select name="center" id="center">
                                                    <option value="">Select center</option>
                                                        
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Add Exam Center</button>
                                            </div>
                                        </div>
                                            
                                    </div>  
                                    </form>  
                                        
                                    <div class="col-sm-">
                                        <div class="panel-body table-responsive">
                                            <div class="panel">										
                                                <table class="table table-striped" id="data-tables">
                                                    <thead>
                                                        <tr>
                                                            <th><div>#</div></th>
                                                            <th><div>Exam Name</div></th>
                                                            <th><div>Center Name</div></th>
                                                            <th><div>Action</div></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $count = 1;
                                                             foreach ($centerlist as $row): ?>
                                                        <tr>
                                                            <td><?=$count++;?></td>
                                                            <td><?php 
                                                                foreach($examlist as $el)
                                                                {
                                                                    if($el->em_id ==  $row->exam_id)
                                                                    {
                                                                        echo $el->em_name;
                                                                    }
                                                                }
                                                            ?></td>
                                                            <td><?php
                                                            foreach($center as $cen)
                                                                {
                                                                    if($cen->center_id == $row->center_id)
                                                                    {
                                                                        echo $cen->center_name;
                                                                    }
                                                                }
                                                            ?></td>
                                                            
                                                            <td class="menu-action">
                                                                <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_center/<?php echo $row->student_exam_center_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>
                                                            
                                                                <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?student/exam_center/delete/<?php echo $row->student_exam_center_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                            </td>
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
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#exam").change(function () {
                var option;
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
                        $("#center").append(option);
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
        $().ready(function () {
        $("#add_exam_center").validate({
        rules: {
             exam:{required: true},
             center: "required",
        },
        messages: {
            exam: "Exam is required",
            center: "Center is required",
        }
        });
        });
    </script>
