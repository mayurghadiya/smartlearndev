<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">				 
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#"><?php echo ucwords("Home");?></a> </li>
                        <li><a href="#"><?php echo ucwords("Pages");?></a> </li>
                        <li class="active"><?php echo ucwords("CMS Management");?></li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo $page_title; ?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("CMS List");?>
                                </a>
                            </li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("Add CMS");?>
                                </a>
                            </li>
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
                                                <th><?php echo ucwords("Name");?></th>
                                                <th><?php echo ucwords("Slug");?></th>
                                                <th><?php echo ucwords("Status");?></th>
                                                <th><?php echo ucwords("Action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($cms as $row): ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $row['c_title']; ?></td>
                                                    <td><?php echo $row['c_slug']; ?></td>                          
                                                    <td>
                                                        <?php if ($row['c_status'] == '1') { ?>
                                                            <span class="label label-success">Active</span>
                                                        <?php } else { ?>	
                                                            <span class="label label-default">InActive</span>
    <?php } ?>
                                                    </td>
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_cms/<?php echo $row['c_id']; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/cms/delete/<?php echo $row['c_id']; ?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
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
                                    <span style="color:red">* <?php echo ucwords("is mandatory field");?></span> 
                                </div>                                      
<?php echo form_open(base_url() . 'index.php?admin/cms/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'cmsform', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Page Name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="c_title" id="	c_title"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Page Slug");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="c_slug" id="c_slug"/>
                                            </div>
                                        </div>
                                        <div class="form-group" id="ck-editor">					
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Page Content");?><span style="color:red">*</span></label>
                                            <div class="col-sm-7">		
                                                <textarea name="c_description"  class="ckeditor" data-rel="ckeditor" rows="3" required></textarea>
                                            </div>														
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Status");?></label>
                                            <div class="col-sm-5">
                                                <select name="c_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>		
                                                </select>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("Add");?></button>
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
    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    <!-- Specific Page Scripts Put Here -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/adapters/jquery.js"></script>

    <!-- Specific Page Scripts END -->
    <script type="text/javascript">
                                                                                                                        $(window).load(function ()
                                                                                                                        {
                                                                                                                            //CKEDITOR.replace( $('[data-rel^="ckeditor"]') );
                                                                                                                            //$('.ckeditor').ckeditor();                                                                
                                                                                                                        })
    </script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript">
                                                                                                                        $.validator.setDefaults({
                                                                                                                            submitHandler: function (form) {
                                                                                                                                form.submit();
                                                                                                                            }
                                                                                                                        });

                                                                                                                        $().ready(function () {
                                                                                                                            $("#cmsform").validate({
                                                                                                                                ignore: [],
                                                                                                                                rules: {
                                                                                                                                    content_data: {
                                                                                                                                        required: function () {
                                                                                                                                            CKEDITOR.instances.content_data.updateElement();
                                                                                                                                        }
                                                                                                                                    },
                                                                                                                                    c_title: "required",
                                                                                                                                    c_slug: "required",
                                                                                                                                    c_description: "required",
                                                                                                                                },
                                                                                                                                messages: {
                                                                                                                                    c_title: "Please enter title",
                                                                                                                                    c_slug: "Please select slug",
                                                                                                                                    c_description: "Please enter page content",
                                                                                                                                }
                                                                                                                            });
                                                                                                                        });
    </script>
