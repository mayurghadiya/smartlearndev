<!-- Middle Content Start -->

<div class="vd_content-wrapper">
    <div class="vd_container" style="margin-right:0px !important;">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                         <li><?php echo set_breadcrumb(); ?></li>
                    </ul>
                    
                </div>
                <!-- vd_panel-header --> 
            </div>
            <!-- vd_panel-head-section -->

            <div class="vd_title-section clearfix">
                <div class="vd_panel-header">
                    <h1>View Email</h1>
                    
                    <!-- vd_panel-menu -->            </div>
            </div>
            <!-- vd_title-section -->

            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel widget light-widget">
                            <div class="panel-heading no-title"> </div>
                            <!-- vd_panel-heading -->

                            <div class="panel-body">
                                <h2 class="mgtp--10"> <?php echo $email->subject; ?> </h2>
                                <br/>
                                <form class="form-horizontal" role="form" action="#" method="post">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">To</label>
                                        <div class="col-sm-9">
                                            <?php                                       
                                            if(!empty($email->email_to))
                                            {
                                            $query = "SELECT email FROM student ";
                                            $query .= "WHERE std_id IN ($email->email_to)";
                                            }else{
                                            $query = "SELECT email FROM admin ";
                                            $query .= "WHERE admin_id IN ($email->professor_to_admin)";
                                            }
                                            $result = $this->db->query($query)->result();
                                            $sent_list = '';
                                            foreach ($result as $re) {
                                                $sent_list .= $re->email . ', ';
                                            }
                                            ?>
                                            <textarea class="form-control" id="sent_to" name="to" style="height: 75px" readonly=""><?php echo rtrim($sent_list, ', '); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Subject</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="subject" class="form-control" name="subject" readonly=""
                                                   value="<?php echo $email->subject ?>"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Cc</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="cc" class="form-control" name="cc" readonly=""
                                                   value="<?php echo $email->cc ?>"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Message</label>
                                        <div class="col-sm-9">
                                            <textarea name="message" readonly="" class="width-100 form-control"  rows="15" placeholder="Write your message here"><?php echo $email->message; ?></textarea>
                                        </div>
                                    </div>

                                    <?php if ($email->file_name != '') { ?> 
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Attachments</label>

                                            <?php
                                            $file_names = explode(',', $email->file_name);
                                            foreach ($file_names as $file) {
                                                ?>
                                            <a target="_blank" download href="<?php echo base_url('uploads/emails/' . $file); ?>" style="margin-left: 15px;"><?php echo $file; ?></a><br/>
                                            <?php } ?>
                                        </div>
                                </div>
                            <?php } ?>


                            </form>
                        </div>
                        <!-- panel-body  --> 

                    </div>
                    <!-- panel --> 
                </div>
                <!-- col-md-8 -->

                <div class="col-md-3" style="display: none">
                    <div class="panel widget">
                        <div class="panel-heading vd_bg-yellow">
                            <h3 class="panel-title"> <span class="menu-icon"> <i class="glyphicon glyphicon-book"></i> </span> Address Book </h3>
                        </div>
                        <!-- vd_panel-heading -->

                        <div class="panel-body">
                            <div class="form-group clearfix mgtp-10">
                                <div class="vd_input-wrapper light-theme"> <span class="menu-icon"> <i class="fa fa-filter"></i> </span>
                                    <input type="text" id="filter-text" placeholder="Name Filter">
                                </div>
                            </div>
                            <br/>
                            <form class="form-horizontal" role="form" action="#">



                                <a href="#" id="check-all">Check All</a> <span class="mgl-10 mgr-10">/</span> <a href="#" id="uncheck-all">Uncheck All</a>  

                                <hr class="mgtp-5"/>                   
                                <div class="form-group clearfix" style="height: 250px; overflow-y:scroll;">
                                    <div class="col-md-12">
                                        <div class="content-list content-menu" id="email-list">
                                            <div class="list-wrapper wrap-25 isotope">
                                                <div class="email-item">
                                                    <div class="vd_checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox-1" value="brad@pitt.com">
                                                        <label class="filter-name" for="checkbox-1"> Brad Pitt - <em class="font-normal">brad@pitt.com</em> </label>
                                                    </div>
                                                </div>
                                                <div  class="email-item">
                                                    <div class="vd_checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox-2" value="angelina@jolie.com">
                                                        <label class="filter-name" for="checkbox-2"> Angelina Jolie - <em class="font-normal">angelina@jolie.com</em> </label>
                                                    </div>
                                                </div>
                                                <div class="email-item">
                                                    <div class="vd_checkbox checkbox-success"> <input type="checkbox" id="checkbox-3" value="adam@sandler.com">

                                                        <label class="filter-name" for="checkbox-3"> Adam Sandler - <em class="font-normal">adam@sandler.com</em> </label>
                                                    </div>
                                                </div>
                                                <div  class="email-item">
                                                    <div class="vd_checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox-4" value="christina@aguilera.com">
                                                        <label class="filter-name" for="checkbox-4"> Chirstina Aguilera - <em class="font-normal">christina@aguilera.com</em> </label>
                                                    </div>
                                                </div>
                                                <div class="email-item">
                                                    <div class="vd_checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox-5" value="tom@cruise.com">
                                                        <label class="filter-name" for="checkbox-5"> Tom Cruise - <em class="font-normal">tom@cruise.com</em> </label>
                                                    </div>
                                                </div>
                                                <div  class="email-item">
                                                    <div class="vd_checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox-6" value="dominicus@soddley.com">
                                                        <label class="filter-name" for="checkbox-6"> Dominicus Soddley - <em class="font-normal">dominicus@soddley.com</em> </label>
                                                    </div>
                                                </div>
                                                <div class="email-item">
                                                    <div class="vd_checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox-7" value="web@designer.com">
                                                        <label class="filter-name" for="checkbox-7"> Web Designer - <em class="font-normal">web@designer.com</em> </label>
                                                    </div>
                                                </div>
                                                <div  class="email-item">
                                                    <div class="vd_checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox-8" value="web@templatecompany.com">
                                                        <label class="filter-name" for="checkbox-8"> Web Template Company - <em class="font-normal">web@templatecompany.com</em> </label>
                                                    </div>
                                                </div>
                                                <div class="email-item">
                                                    <div class="vd_checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox-9" value="round@live.com">
                                                        <label class="filter-name" for="checkbox-9"> Round Live - <em class="font-normal">round@live.com</em> </label>
                                                    </div>
                                                </div>
                                                <div  class="email-item">
                                                    <div class="vd_checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox-10" value="chrisitan@bautista.com">
                                                        <label class="filter-name" for="checkbox-10"> Chrisitan Bautista - <em class="font-normal">chrisitan@bautista.com</em> </label>
                                                    </div>
                                                </div>
                                                <div  class="email-item">
                                                    <div class="vd_checkbox checkbox-success">
                                                        <input type="checkbox" id="checkbox-11" value="admin@template.com">
                                                        <label class="filter-name" for="checkbox-11"> Admin Template - <em class="font-normal">admin@template.com</em> </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- list-wrapper --> 
                                        </div>
                                        <!-- content-list --> 
                                    </div>
                                    <!-- col-md-12 --> 
                                </div>
                                <!-- form-group -->


                                <hr/>
                                <div class="form-group form-actions">
                                    <div class="col-sm-12">
                                        <button type="button" id="insert-email-btn" class="btn vd_btn vd_bg-blue vd_white"><i class="fa fa-angle-double-left append-icon"></i> INSERT ADDRESS</button>
                                        <button type="button" class="btn vd_btn vd_bg-grey vd_white"><i class="fa fa-plus append-icon"></i> ADD NEW</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- panel-body  --> 

                    </div>
                    <!-- panel --> 
                </div>
                <!-- col-md-8 --> 
            </div>
            <!-- row --> 

        </div>
        <!-- .vd_content-section --> 

    </div>
    <!-- .vd_content --> 
</div>
<!-- .vd_container --> 
</div>
<!-- .vd_content-wrapper --> 

<!-- Middle Content End --> 

<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysiwyg/js/wysihtml5-0.3.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysiwyg/js/bootstrap-wysihtml5-0.0.2.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/plugins/isotope/isotope.pkgd.min.js"></script>

<script>
    $(document).ready(function () {
        $('#message').wysihtml5();
    })
    $("#students").select2({closeOnSelect: false});
    $("#checkbox").click(function () {
        if ($("#checkbox").is(':checked')) {
            $("#students > option").prop("selected", "selected");
            $("#students").trigger("change");
        } else {
            $("#students > option").removeAttr("selected");
            $("#students").trigger("change");
        }
    });
</script>