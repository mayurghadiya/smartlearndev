<?php
$std_id = $this->session->userdata('std_id');
$res = $this->db->query("SELECT * FROM participate_manager WHERE pp_id not in (select pp_id from participate_student where student_id=$std_id )")->result_array();
    ?>


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
<div class="row">
                        <div class="col-sm-12">								
                            <!------CONTROL TABS START------>
                            <ul class="nav nav-tabs bordered">
                                <li class="active">
                                    <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                      Participate
                                    </a></li>
                               
                            </ul>
                            <!------CONTROL TABS END------>

                            <div class="tab-content">
                                <!----TABLE LISTING STARTS-->
                                <div class="tab-pane box active" id="list">	
                                    <?php if($this->session->flashdata('flash_message')){ echo $this->session->flashdata('flash_message'); } ?>
                                        <div class="box-content">                	
    <?php echo form_open(base_url() . 'index.php?student/volunteer/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmproject', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                        <div class="padded">											
                                            
                                          
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Participate Title <span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="pp_id" name="pp_id">
                                                        <option value="<?php  ?>" > Select  </option>
                                                        <?php foreach ($res as $rs): ?>
                                                        <option value="<?php echo $rs['pp_id'];  ?>" ><?php echo $rs['pp_title']; ?>  </option>
                                                        <?php endforeach;?>
                                                        
                                                    </select>
                                                  
                                                </div>
                                                 <input type="hidden" name="std_id" value="<?php echo $this->session->userdata('std_id'); ?>" />                                              
                                            </div>
                                            <div class="form-group"  id="description">
                                                
                                                
                                             
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Date Of Participate </label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="dos" readonly="" value="<?php if(!empty($res)){ echo $res[0]['pp_dos']; } ?>" id="dos" />
                                                </div>
                                                
                                             
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Your interest</label>
                                                <div class="col-sm-5">
                                                    <input type="radio" name="p_status" value="1" checked="" >Yes						
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Comment</label>
                                                <div class="col-sm-5">
                                                    <textarea class="form-control" name="comment" id="std_about" ></textarea>
                                                </div>
                                                 
                                            </div>
                                           
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-5">
                                                    <button type="submit" class="btn btn-info">Submit</button>
                                                </div>
                                            </div>
                                            </form>               
                                        </div>                
                                    </div>
                                </div>
                                <!----TABLE LISTING ENDS--->


                                <!----CREATION FORM STARTS---->
                              
                            </div>
                        </div>
                    </div>
                </div></div></div></div></div>

    <?php

?>

 <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript">
        
        $("#pp_id").change(function(){
            var pp_id = $(this).val();
           $.ajax({
              type:"POST" ,
              url:"<?php echo base_url(); ?>index.php?student/get_desc",
              data:{'pp_id':pp_id},
              success:function(response)
              {
                 $("#description").html(response);
              }    
               
           }); 
        });
       

                                                    $.validator.setDefaults({
                                                        submitHandler: function (form) {

                                                            //  filecheck(img);
                                                            form.submit();

                                                        }
                                                    });

                                                    $().ready(function () {
                                                        

                                                       
                                                        $("#frmproject").validate({
                                                            rules: {
                                                                pp_id:"required",
                                                                p_status:"required",                                                               
                                                            },
                                                            messages: {
                                                                pp_id:"Please select participation",
                                                                p_status:"Please select your interest",                                                                        
                                                               
                                                            }
                                                        });
                                                    });
    </script>
