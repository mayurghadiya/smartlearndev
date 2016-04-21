
<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>



<!-- Placed at the end of the document so the pages load faster --> 

<!--[if lt IE 9]>
  <script type="text/javascript" src="js/excanvas.js"></script>      
<![endif]-->
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/jquery.toaster.js"></script>
<script>
<?php
$message = $this->session->flashdata('flash_message');
if ($message != '') {
    ?>
        $.toaster({
            priority: 'success',
            title: 'Success! ',
            message: '<?php echo $message; ?>',
            timeOut: 5000
        });
<?php } ?>
</script>
<script type="text/javascript" src='<?= $this->config->item('custom_plugin') ?>jquery-ui/jquery-ui.custom.min.js'></script>
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>breakpoints/breakpoints.js"></script>
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 

<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>pnotify/js/jquery.pnotify.min.js"></script>

<script type="text/javascript" src="<?= $this->config->item('js_path') ?>theme.js"></script>
<?php if ($this->router->fetch_method() == 'dashboard') { ?>
    <script>
    $(document).ready(function () {
        $("#myDashboard").mouseup(
                function () {
                    setTimeout(
                            function () {
                                var widget_order = '';
                                $('#myDashboard li').each(function (i) {
                                    widget_order += $(this).attr('id') + ',';
                                });
                                widget_order = widget_order.replace(/(^\s*,)|(,\s*$)/g, '');

                                //check in db
                                var student_id = '<?php echo $this->session->userdata("student_id"); ?>';
                                $.ajax({
                                    url: '<?php echo base_url(); ?>index.php?student/is_present_widget_order/' + student_id,
                                    type: 'get',
                                    async: false,
                                    success: function (content) {
                                        if (content == '0') {
                                            var form_data = {
                                                student: student_id,
                                                widget_data: widget_order
                                            };
                                            $.ajax({
                                                url: '<?php echo base_url(); ?>index.php?student/save_widget_order',
                                                type: 'post',
                                                data: form_data,
                                                success: function () {
                                                    console.log(form_data);
                                                }
                                            });
                                        } else {
                                            //update       
                                            var form_data = {
                                                student: student_id,
                                                widget_data: widget_order
                                            };
                                            $.ajax({
                                                url: '<?php echo base_url(); ?>index.php?student/save_widget_order/'+student_id,
                                                type: 'post',
                                                data: form_data,
                                                success: function () {
                                                    console.log(form_data);
                                                }
                                            });
                                        }
                                    }
                                })
                            },
                            2000);
                });
    });
    </script>
<?php } ?>
<script type="text/javascript" src="<?= $this->config->item('asset') ?>custom/custom.js"></script>

<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>dataTables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        "use strict";
        $('#data-tables').dataTable();
    });
</script>	
<!-- Specific Page Scripts Put Here -->
<script type="text/javascript">
    $(document).ready(function () {
        "use strict";

        $('[data-rel^="sortable"]').sortable({
            connectWith: '[data-rel^="sortable"]',
            items: 'div.widget',
            opacity: 0.8,
            placeholder: 'ui-drop-placeholder panel widget',
            forcePlaceholderSize: true,
            iframeFix: false,
            tolerance: 'pointer',
            helper: 'original',
            revert: true,
            forceHelperSize: true,
        }).disableSelection();
    });
</script>
<!-- Specific Page Scripts END -->
<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->

</body>
</html>