<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home"); ?></a> </li>
                        <li><?php echo ucwords("asset management"); ?></li>
                        <li><?php echo ucwords("courseware Management"); ?></li>
                    </ul>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("courseware Management"); ?></h1>                    
                </div>
            </div>

            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered" id="changestab">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("courseware List"); ?>
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">
                                <div class="panel-body table-responsive" id="getresponse">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>			
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>    
                            </div>

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

<style>
    #sub-tables_filter{
        margin-top: -50px;
    }
</style> 

<style>
    .nav-fixedtabs {
        left: 86%;
        position: fixed;
        top: 25%;
    }
    #navfixed{
        cursor: pointer;
    }

</style>


<div class="md-fab-wrapper">

    <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addcourseware/');" href="#" id="navfixed" data-toggle="tab">
        <i class="material-icons">&#xE145;</i>
    </a>
</div>
