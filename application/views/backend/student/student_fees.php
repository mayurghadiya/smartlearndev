<div class="vd_content-wrapper" style="min-height: 8px;">
    <div class="vd_head-section clearfix"></div>
    <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
                    <ul class="breadcrumb">
                          <li><?php echo set_breadcrumb(); ?></li>
                    </ul>

                </div>
            <div class="vd_panel-header">
            <h1>Pay Online</h1>
        </div>
    </div>
     <div class="vd_content-section clearfix">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12">

                    <!------CONTROL TABS START------>
                    <ul class="nav nav-tabs bordered">
                        
                        <li class="active">
                            <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                Pay Online
                            </a></li>
                    </ul>
                    <!------CONTROL TABS END------>
                    <div class="tab-content">
                        <!----TABLE LISTING STARTS-->
                        <div class="tab-pane box active" id="list">

                            <br/>
                            <!----CREATION FORM STARTS---->
                        <div class="tab-pane box" id="add" style="padding: 5px">

                            <form class="form-horizontal form-groups-bordered validate" 
                                  action="<?php echo base_url('index.php?student/pay_online'); ?>" id="student_fees" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-default panel-shadow" data-collapsed="0">
                                            <div class="panel-heading">
                                                <div class="panel-title">Invoice Information</div>
                                            </div>
                                            <div class="panel-body">

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="<?php echo $student_detail->std_first_name . ' ' . $student_detail->std_last_name; ?>" name="title" disabled/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Title</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="title"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Description</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="description"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Date</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group date ebro_datepicker" data-date-format="yyyy-M-dd">
                                                            <input type="text" id="datepicker-normal" name="date" />
                                                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel panel-default panel-shadow" data-collapsed="0">
                                            <div class="panel-heading">
                                                <div class="panel-title">Payment Information</div>
                                            </div>
                                            <div class="panel-body">

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Semester</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" id="semester" name="semester">
                                                            <option value="">Select</option>
                                                            <?php
                                                            foreach ($semester as $row) {
                                                                if ($student_detail->semester_id < $row->s_id) {
                                                                    break;
                                                                }
                                                                ?>
                                                                <option value="<?php echo $row->s_id; ?>"><?php echo $row->s_name; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Type of Fees</label>
                                                    <div class="col-sm-9">
                                                        <select id="fees_structure" class="form-control" name="fees_structure">

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Total Fees</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly="" id="total_fees" name="total_fees" class="form-control"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Due Fees</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly="" id="due_fees" name="due_fees" class="form-control"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Amount</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" required="" pattern="(0\.((0[1-9]{1})|([1-9]{1}([0-9]{1})?)))|(([1-9]+[0-9]*)(\.([0-9]{1,2}))?)" id="amount" class="form-control" name="amount"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Method</label>
                                                    <div class="col-sm-9">
                                                        <select name="method" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="paypal">Paypal</option>
                                                            <option value="authorize.net">Authorize.net</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-5">
                                                <button type="submit" class="btn btn-info">Pay Online</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!----CREATION FORM ENDS-->
                        </div>
                        <!----TABLE LISTING ENDS--->                       

                    </div>
                </div>
            </div>


            <!-- Panel Widget --> 
        </div>
        <!-- col-sm-12--> 
    </div>
    </div>
    <!-- row --> 
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>

<script>
    $(document).ready(function () {
        $('#semester').on('change', function () {
            var semester_id = $(this).val();
            var course_id = '<?php echo $student_detail->course_id; ?>';
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?student/fees_structure_details/' + course_id + '/' + semester_id,
                type: 'get',
                success: function (content) {
                    $('#fees_structure').find('option').remove().end();
                    $('#fees_structure').append("<option value=''>Select</option>");
                    var fees = jQuery.parseJSON(content);
                    $.each(fees, function (key) {
                        $('#fees_structure').append("<option value=" + fees[key].fees_structure_id + ">" + fees[key].title + "</option>");
                    });
                }
            })
            $('#total_fees').val('');
            $('#due_fees').val('');
        });

        $('#fees_structure').on('change', function () {
            $('#total_fees').val('');
            $('#due_fees').val('');
            var student_id = "<?php echo $student_detail->std_id; ?>";
            var semester_id = "<?php echo $student_detail->semester_id; ?>";
            var course_id = "<?php echo $student_detail->course_id; ?>";
            var fees_structure_id = $(this).val();

            $.ajax({
                url: '<?php echo base_url(); ?>index.php?student/student_fees_structure_details/' + fees_structure_id,
                type: 'get',
                success: function (content) {
                    var fees_structure = jQuery.parseJSON(content);
                    $('#total_fees').val(fees_structure.total_fee);
                }
            });

            $.ajax({
                url: '<?php echo base_url(); ?>index.php?student/course_semester_paid_fee/' + fees_structure_id,
                type: 'get',
                success: function (content) {
                    var total_paid_amount = jQuery.parseJSON(content);
                    var due_amount = Number($('#total_fees').val());
                    if (total_paid_amount > 0) {
                        due_amount = Number($('#total_fees').val()) - total_paid_amount;
                    }
                    $('#due_fees').val(due_amount);
                }
            })
        })
    })
</script>

<!-- Start validation -->
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
<script type="text/javascript">
      $.validator.setDefaults({
      submitHandler: function (form) {
       form.submit();
       }
       });
        $().ready(function () {
        $("#student_fees").validate({
        rules: {
             title:{required: true},
             date:"required",
             semester:"required",
             fees_structure:"required",
             amount:{required:true},
             method:"required",
        },
        messages: {
            title: "Title is required",
            date: "Date is required",
            semester:"Semester is required",
            fees_structure:"Fees structure is required",
            amount:"Amount is required",
            method:"Method is required",
        }
        });
        });
    </script>

    <!-- End validation -->
 <script type="text/javascript">
        $(window).load(function() 
{ "use strict"; 
 $( "#datepicker-normal" ).datepicker({ 
  dateFormat: 'dd M yy',
  changeMonth: true,
  changeYear: true
 
 });
});
 </script>