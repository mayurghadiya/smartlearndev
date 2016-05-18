</div>
</div>
<!-- .container --> 
</div>
<!-- .content -->

<!-- Footer Start -->
<footer class="footer-1"  id="footer">      
    <div class="vd_bottom ">
        <div class="container">
            <div class="row">
                <div class=" col-xs-12">
                    <div class="copyright">
                        Copyright &copy; <?php echo date("Y"); ?> Learning Management System Developed By <a href="http://searchnative.in/hosting/loreBrain/">Lore Brain</a>. All Rights Reserved 
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
</footer>
<!-- Footer END -->


<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>
<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<?php if ($this->uri->segment(2) != 'dashboard') { ?>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
<?php } ?> 
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

<script type="text/javascript" src="<?= $this->config->item('js_path') ?>caroufredsel.js"></script> 

<script type="text/javascript" src="<?= $this->config->item('js_path') ?>plugins.js"></script>


<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>breakpoints/breakpoints.js"></script>

<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 

<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>pnotify/js/jquery.pnotify.min.js"></script>

<script type="text/javascript" src="<?= $this->config->item('js_path') ?>theme.js"></script>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/custom/custom2.js' ?>"></script>
<script type="text/javascript" src="<?= $this->config->item('asset') ?>custom/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/custom/custom3.js' ?>"></script>

<!-- Specific Page Scripts Put Here -->
<script src="<?= $this->config->item('js_path') ?>simplecalendar.js" type="text/javascript"></script>
<!-- Specific Page Scripts END -->
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        "use strict";
        $('#data-tables').DataTable({
            aoColumnDefs: [
                {
                    bSortable: false,
                    aTargets: [-1]
                }
            ]
        });

    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/multiselect.min.js"></script>
<script src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
<script src="<?= $this->config->item('js_path') ?>additional-methods.min.js"></script>