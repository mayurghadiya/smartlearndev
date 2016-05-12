<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
             <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("user management");?></li>
                         <li><?php echo ucwords("Group Creation");?></li>
                    </ul>                    
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Group Creation");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="">
                            <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                        </div>  
                        <?php echo form_open(base_url() . 'index.php?admin/create_group/create', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'id' => 'create_group')); ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Group Name");?><span style="color:red">*</span></label>
                            <div class="col-sm-5 controls">
                                <input type="text" placeholder="Group Name" name="group_name">
                                <span class="help-inline"></span> </div>
                        </div>
                       <!-- <div class="form-group">
                            <label class="col-sm-4 control-label">Type of Users<span style="color:red">*</span></label>
                            <div class="col-sm-7 controls">
                                <select id="user_type" onchange="return get_user(this.value)" name="user_type" class="width-50" style="width:100%;" >
                                    <option value="">Select User Type</option>
                                    <option value="1">Student</option>
                                </select>
                                <div id="test"></div>
                            </div>
                        </div>	-->
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("department");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select name="degree" id="degree" >
                                    <option value="">Select department</option>
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
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select name="course" id="course" >
                                    <option value="">Select Branch</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Batch");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select name="batch" id="batch" onchange="get_student2(this.value);" >
                                    <option value="">Select batch</option>
                                    
                                </select>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select name="semester" id="semester"  onchange="get_students2(this.value);" >
                                    <option value="">Select semester</option>
                                    <?php
                                    $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                    foreach ($datasem as $rowsem) {
                                        ?>
                                    <option value="<?= $rowsem->s_id ?>"><?= $rowsem->s_name ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-5">
                                <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                                </select>
                            </div>
                            
                            <div class="col-sm-2">
                                    <!--<button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>-->
                                <div>&nbsp;</div>
                                <div>&nbsp;</div>
                                <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                <!--<button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>-->
                            </div>
                            
                            <div class="col-sm-5">
                                <select name="user_role[]" id="multiselect_to" class="form-control" size="8" multiple="multiple" ></select>
                            </div>
                        </div>
                        <!-- col-sm-9-->
                        <div class="col-sm-3">                
                            <div class="mgbt-xs-5">
                                <button class="btn vd_btn vd_bg-green " type="submit"><?php echo ucwords("Create");?></button>
                            </div>
                        </div>
                    </div>		
                    </form>
                </div>
            </div></div>
        
        
    </div>
    
    <!-- row --> 
    
</div>
 <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
   
<script type="text/javascript">
    $(document).ready(function () {
    $("#degree").change(function () {
        var degree = $(this).val();
        var dataString = "degree=" + degree;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'index.php?admin/get_cource/project'; ?>",
            data: dataString,
            success: function (response) {
                $("#course").html(response);
            }
        });
    });

    $("#course").change(function () {
        var course = $(this).val();
        var degree = $("#degree").val();
        var dataString = "course=" + course + "&degree=" + degree;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'index.php?admin/get_batchs/project'; ?>",
            data: dataString,
            success: function (response) {
                $("#batch").html(response);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
                    data: dataString,
                    success: function (response1) {
                        $("#semester").html(response1);
                    }
                });
            }
        });
    });

});

    function get_students2(sem)
    {
        var batch = $("#batch").val();
        var course = $("#course").val();
        var degree = $("#degree").val();
        var semester = $("#semester").val();
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_group_student/',
            type: 'POST',
            
            data: {'batch': batch, 'sem': sem, 'course': course, 'degree': degree},
            success: function (content) {
                $("#multiselect").html(content);
            }
        });
    }
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        // make code pretty
        window.prettyPrint && prettyPrint();

        if (window.location.hash) {
            scrollTo(window.location.hash);
        }

        $('.nav').on('click', 'a', function (e) {
            scrollTo($(this).attr('href'));
        });

        $('#multiselect').multiselect();

        $('[name="q"]').on('keyup', function (e) {
            var search = this.value;
            var $options = $(this).next('select').find('option');

            $options.each(function (i, option) {
                if (option.text.indexOf(search) > -1) {
                    $(option).show();
                } else {
                    $(option).hide();
                }
            });
        });

        $('#search').multiselect({
            search: {
                left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            }
        });

        $('.multiselect').multiselect();
        $('.js-multiselect').multiselect({
            right: '#js_multiselect_to_1',
            rightAll: '#js_right_All_1',
            rightSelected: '#js_right_Selected_1',
            leftSelected: '#js_left_Selected_1',
            leftAll: '#js_left_All_1'
        });

        $('#keepRenderingSort').multiselect({
            keepRenderingSort: true
        });

        $('#undo_redo').multiselect();

        $('#multi_d').multiselect({
            right: '#multi_d_to, #multi_d_to_2',
            rightSelected: '#multi_d_rightSelected, #multi_d_rightSelected_2',
            leftSelected: '#multi_d_leftSelected, #multi_d_leftSelected_2',
            rightAll: '#multi_d_rightAll, #multi_d_rightAll_2',
            leftAll: '#multi_d_leftAll, #multi_d_leftAll_2',
            moveToRight: function (Multiselect, options, event, silent, skipStack) {
                var button = $(event.currentTarget).attr('id');

                if (button == 'multi_d_rightSelected') {
                    var left_options = Multiselect.left.find('option:selected');
                    Multiselect.right.eq(0).append(left_options);

                    if (typeof Multiselect.callbacks.sort == 'function' && !silent) {
                        Multiselect.right.eq(0).find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.right.eq(0));
                    }
                } else if (button == 'multi_d_rightAll') {
                    var left_options = Multiselect.left.find('option');
                    Multiselect.right.eq(0).append(left_options);

                    if (typeof Multiselect.callbacks.sort == 'function' && !silent) {
                        Multiselect.right.eq(0).find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.right.eq(0));
                    }
                } else if (button == 'multi_d_rightSelected_2') {
                    var left_options = Multiselect.left.find('option:selected');
                    Multiselect.right.eq(1).append(left_options);

                    if (typeof Multiselect.callbacks.sort == 'function' && !silent) {
                        Multiselect.right.eq(1).find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.right.eq(1));
                    }
                } else if (button == 'multi_d_rightAll_2') {
                    var left_options = Multiselect.left.find('option');
                    Multiselect.right.eq(1).append(left_options);

                    if (typeof Multiselect.callbacks.sort == 'function' && !silent) {
                        Multiselect.right.eq(1).eq(1).find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.right.eq(1));
                    }
                }
            },
            moveToLeft: function (Multiselect, options, event, silent, skipStack) {
                var button = $(event.currentTarget).attr('id');

                if (button == 'multi_d_leftSelected') {
                    var right_options = Multiselect.right.eq(0).find('option:selected');
                    Multiselect.left.append(right_options);

                    if (typeof Multiselect.callbacks.sort == 'function' && !silent) {
                        Multiselect.left.find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.left);
                    }
                } else if (button == 'multi_d_leftAll') {
                    var right_options = Multiselect.right.eq(0).find('option');
                    Multiselect.left.append(right_options);

                    if (typeof Multiselect.callbacks.sort == 'function' && !silent) {
                        Multiselect.left.find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.left);
                    }
                } else if (button == 'multi_d_leftSelected_2') {
                    var right_options = Multiselect.right.eq(1).find('option:selected');
                    Multiselect.left.append(right_options);

                    if (typeof Multiselect.callbacks.sort == 'function' && !silent) {
                        Multiselect.left.find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.left);
                    }
                } else if (button == 'multi_d_leftAll_2') {
                    var right_options = Multiselect.right.eq(1).find('option');
                    Multiselect.left.append(right_options);

                    if (typeof Multiselect.callbacks.sort == 'function' && !silent) {
                        Multiselect.left.find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.left);
                    }
                }
            }
        });
    });

    function scrollTo(id) {
        if ($(id).length) {
            $('html,body').animate({scrollTop: $(id).offset().top - 40}, 'slow');
        }
    }
</script>
