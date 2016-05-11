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
                                  action="<?php echo base_url('index.php?student/pay_online_vocational_course'); ?>" id="student_fees" method="post">
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
                                                        <input type="text" class="form-control" value="<?php echo $this->session->userdata('name'); ?>" name="title" disabled/>
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
                                                    <div class="col-sm-9">
                                                        <input type="hidden" name="voc_course" id="voc_course" value="<?php echo $vocationalcourse[0]['vocational_course_id']?>" >
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-sm-3 control-label">Vocational course name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly="" id="coursename" name="coursename" class="form-control" value="<?php echo $vocationalcourse[0]['course_name']?>"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Total Fees</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly="" id="total_fees" name="total_fees" class="form-control" value="<?php echo $vocationalcourse[0]['course_fee']?>"/>
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
//       $('#course').on('change', function () {
//           
//           var id=$(this).val();
//            $.ajax({
//                url: '<?php echo base_url(); ?>index.php?student/get_vocational_fee' ,
//                type: 'post',
//                dataType:'json',
//                data:
//                {
//                 'id':id,   
//                },    
//                success: function (result) {
//                    
//                    $("#total_fees").val(result[0].course_fee);
//                }
//            })
//         });
//         
        
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
             course:"required",
             amount:{required:true},
             method:"required",
        },
        messages: {
            title: "Title is required",
            date: "Date is required",
            course: "Course is required",
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