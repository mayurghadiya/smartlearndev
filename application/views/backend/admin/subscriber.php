
<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
             <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("asset management");?></li>
                         <li><?php echo ucwords("subscriber");?></li>
                    </ul>                   
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("subscriber");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                   <?php echo ucwords("subscriber list");?>
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">

                                <div class="panel-body table-responsive">
                                    <table class="table table-striped table-responsive" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th><?php echo ucwords("email");?></th>
                                                <th><?php echo ucwords("action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($subscriber as $row): ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $row->email; ?></td> 
                                                    <td class="menu-action">                                                       
                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/subscriber/delete/<?php echo $row->id; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
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
                                   <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                               </div>                                    
<?php echo form_open(base_url() . 'index.php?admin/degree/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'degreeform', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("course name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="d_name" id="d_name"/>
                                            </div>
                                        </div>												
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("status");?></label>
                                            <div class="col-sm-5">
                                                <select name="degree_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>		
                                                </select>	
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green" ><?php echo ucwords("add");?></button>
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
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

   
        $().ready(function () {
             
            $("#degreeform").validate({
                rules: {                  
                     d_name: 
                        {
                            required:true,
                            remote: {
                              url: "<?php echo base_url().'index.php?admin/check_degree'; ?>",
                              type: "post",
                              data: {
                                course: function() {
                                  return $( "#d_name" ).val();
                                },
                              }
                            }
                        },
                    degree_status: "required",
                },
                messages: {
                    d_name:
                    {
                         required:"Enter course name",
                        remote:"Record is already present in the system",
                    },
                    
                    degree_status: "Select status",
                }
            });
        });
    </script>