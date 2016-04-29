<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                        <li><?php echo ucwords("basic management");?></li>
                        <li class="active"><?php echo ucwords("batch management");?></li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("batch management");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("batch list");?>
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("add batch");?>
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
                                                <th><?php echo ucwords("batch name");?></th>
                                                <th><?php echo ucwords("course");?></th>
                                                <th><?php echo ucwords("branch");?></th>
                                                <th><?php echo ucwords("status");?></th>
                                                <th><?php echo ucwords("action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($batches as $row):
                                                ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $row['b_name']; ?></td>    
                                                <td> <?php
                                                       $explodedegree =explode(',',$row['degree_id']);
                                                        foreach ($degree as $deg) {
                                                            if (in_array($deg['d_id'],$explodedegree)) {
                                                                echo $deg['d_name']."<br> ";
                                                            }
                                                        }
                                                        ?></td>
                                                <td>                                                    
                                                    <?php
                                                    $explodecourse =explode(',',$row['course_id']);
                                                        foreach ($course as $crs) {
                                                            if (in_array($crs->course_id, $explodecourse)) {
                                                                echo $crs->c_name."<br>";
                                                            }
                                                        }
                                                        ?>
                                                </td>
                                                <td>
                                                        <?php if ($row['b_status'] == '1') { ?>
                                                    <span class="label label-success">Active</span>
                                                        <?php } else { ?>	
                                                    <span class="label label-default">InActive</span>
    <?php } ?>
                                                </td>
                                                <td class="menu-action">
                                                     <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_batch/<?php echo $row['b_id'];?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>        
                                                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/batch/delete/<?php echo $row['b_id']; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
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
                                <div class="box-content"> 
                                <div class="">
                                    <span style="color:red">*<?php echo ucwords(" is mandatory field");?> </span> 
                                </div>
<?php echo form_open(base_url() . 'index.php?admin/batch/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'batchform', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("batch name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="b_name" id="b_name"/>
                                            </div>
                                        </div>	
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("course");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select id="degree" name="degree[]" class="form-control" multiple>
                                                    <option value="">Select Course</option>
                                                        <?php foreach ($degree as $srow) { ?>
                                                        <option value="<?php echo $srow['d_id']; ?>"><?php echo $srow['d_name']; ?>
                                                        </option>
                                                        <?php } ?>
                                                </select>
                                            </div>	
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("branch");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select id="course" name="course[]" class="form-control" multiple>
                                                                                                        
                                                </select>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("status");?></label>
                                            <div class="col-sm-5">
                                                <select name="batch_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>	
                                                </select>
                                                <lable class="error" id="error_lable_exist" style="color:red"></lable>
                                            	
                                            </div>
                                             
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("add");?></button>
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
        <!-- row --> 
    </div>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript">
      $( "#batchform" ).submit(function( event ) {
          if($("#degree").val()!=null & $("#course").val()!=null & $("#b_name").val()!="" )
          { 
         $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/check_batch'; ?>",
                    dataType:'json',
                   data:
                        {
                            'degree':$("#degree").val(),
                            'course':$("#course").val(),
                            'batch':$("#b_name").val(),
                        }, 
                                success:function(response){
                                    if(response.length == 0){
                                    $('#batchform').attr('validated',true);
                                    $('#batchform').submit();
                                     } else
                                         {
                                             $("#error_lable_exist").html('Record is already present in the system');
                                         return false;
                                     }
                    }
                });
                    return false; 
                    }
        event.preventDefault();
      });
  
        
        $().ready(function () {
            
                 $("#degree").change(function(){
                var degree = $(this).val();
                  if(degree!="")
                  {
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_cource_multiple/'; ?>",
                   data:
                        {
                            'degree':degree,
                        },                  
                    success:function(response){
                        $("#course").html(response);
                    }
                });
                }
        });

            $.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
 }, "Value must not equal arg.");
 
            $("#batchform").validate({
                rules: {
                    b_name: "required",
                    'degree[]': 
                            {
                                 valueNotEquals: "default",
                                 required:true,
                            },
                    'course[]': 
                    {
                         valueNotEquals: "default",
                         required:true,
                    },
                    batch_status: "required",
                },
                messages: {
                    b_name: "Enter batch name",
                    'degree[]': 
                            {
                                 valueNotEquals: "Select course",
                                 required:"Select course",
                            },
                    'course[]': 
                    {
                         valueNotEquals: "Select branch",
                         required:"Select branch",
                    },
                    batch_status: "Select status",
                }
            });
        });
    </script>