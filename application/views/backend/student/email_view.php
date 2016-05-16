<!-- Middle Content Start -->

<div class="vd_content-wrapper">
    <div class="vd_container" style="margin-right:0px !important;">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="email.html">Email</a></li>
                        <li class="active">Email Compose</li>
                    </ul>
                    <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                        <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                        <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                        <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>

                    </div>
                </div>
                <!-- vd_panel-header --> 
            </div>
            <!-- vd_panel-head-section -->

            <div class="vd_title-section clearfix">
                <div class="vd_panel-header">
                    <h1>View Email</h1>
                    <div class="vd_panel-menu  hidden-xs">  
                        <div class="menu" style="display: none">
                            <div data-action="click-trigger"> Options <i class="fa fa-angle-down"></i> </div>
                            <div class="vd_mega-menu-content width-xs-2 left-xs" data-action="click-target">
                                <div class="child-menu">
                                    <div class="content-list content-menu">
                                        <ul class="list-wrapper pd-lr-10">
                                           
                                            <li> 
                                                <a href="#"> 
                                                    <div class="menu-icon">
                                                        <i class=" icon-feather"></i>
                                                    </div> 
                                                    <div class="menu-text">Forward</div> 
                                                </a> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- menu --> 
                    </div>
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
                                        <div class="col-sm-7">
                                            <?php                                            
                                        if(!empty($email->email_to))
                                        {
                                        $admin = $this->db->get_where('admin', array(
                                            'admin_id'  => $email->email_to
                                        ))->row();
                                        
                                        $send_email =  $admin->email; 
                                        }else{
                                             $professor = $this->db->get_where('professor', array(
                                            'professor_id'  => $email->student_to_professor
                                        ))->row();
                                             $send_email = $professor->email;
                                        }
                                            ?>
                                            <input type="text" readonly="" class="form-control" name="from" id="from"
                                                   value="<?php echo $send_email; ?>"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Subject</label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control" id="subject" name="subject" readonly=""><?php echo $email->subject; ?></textarea>                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Cc</label>
                                        <div class="col-sm-7">
                                            <input id="cc" class="form-control" name="cc" value="<?php echo $email->cc; ?>" readonly=""/>                                           
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Message</label>
                                        <div class="col-sm-9">
                                            <textarea id="message" name="message" readonly="" class="width-100 form-control"  rows="15" placeholder="Write your message here">
                                                <?php echo $email->message; ?>
                                            </textarea>                                          
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

                <div class="col-md-3" style="display: none;">
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