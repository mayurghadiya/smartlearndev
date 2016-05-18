<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Specific Page Data -->
<?php $title = 'Multipurpose Dashboard - Responsive Multipurpose Admin Templates'; ?>
<?php $keywords = 'HTML5 Template, CSS3, All Purpose Admin Template, '; ?>
<?php $description = 'Responsive Admin Template for multipurpose use'; ?>
<?php $page = 'dashboard';   // To set active on the same id of primary menu ?>
<?php 
	// Additional Specific CSS 
	$specific_css[0] = 'plugins/fullcalendar/fullcalendar.css';
	$specific_css[1] = 'plugins/fullcalendar/fullcalendar.print.css';
	$specific_css[2] = 'plugins/introjs/css/introjs.min.css';	
?>

<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>

<div class="content">
  <div class="container">
    <?php if ($navbar_left_config != 0) { $current_navbar="vd_navbar-left"; require('templates/navbars/'.$navbar_left.'.tpl.php'); }?>
    <?php if ($navbar_right_config != 0) { $current_navbar="vd_navbar-right"; require('templates/navbars/'.$navbar_right.'.tpl.php'); }?>
    
    <!-- Middle Content Start -->
    
    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a href="index.php">Home</a> </li>
                <li class="active">Default Dashboard</li>
              </ul>
              <?php include('templates/widgets/panel-menu-head-section.tpl.php'); ?> 
            </div>
          </div>
          <!-- vd_head-section -->
          
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Dashboard</h1>
              <small class="subtitle">Default dashboard for multipurpose demonstration</small>
              <?php include('templates/widgets/panel-menu-title-section-index.tpl.php'); ?> 
            </div>
            <!-- vd_panel-header --> 
          </div>
          <!-- vd_title-section -->
          
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-7 mgbt-md-20 mgbt-lg-0">
                <?php require_once('templates/widgets/widget-interactive-chart.tpl.php'); ?>
              </div>
              <!--col-md-7 -->
              <div class="col-md-5">
                <div class="row">
                  <div class="col-md-12">
                    <?php include('templates/widgets/widget-status-total-visitor.tpl.php'); ?>
                  </div>
                  <!--col-md-12 --> 
                </div>
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-6">
                    <?php include('templates/widgets/widget-status-new-order.tpl.php'); ?>
                  </div>
                  <!--col-xs-6 -->
                  <div class="col-xs-6">
                    <?php include('templates/widgets/widget-status-new-review.tpl.php'); ?>
                  </div>
                  <!--col-xs-6 --> 
                </div>
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-6">
                    <?php include('templates/widgets/widget-status-new-user.tpl.php'); ?>
                  </div>
                  <!--col-xs-6 -->
                  <div class="col-xs-6">
                    <?php include('templates/widgets/widget-status-new-task.tpl.php'); ?>
                  </div>
                  <!--col-md-xs-6 --> 
                </div>
                <!-- .row --> 
                
              </div>
              <!-- .col-md-5 --> 
            </div>
            <div class="row">
              <div class="col-md-5">
                <?php  include('templates/widgets/widget-map.tpl.php'); ?>
              </div>
              <!--col-md-5-->
              <div class="col-md-4">
                <?php  include('templates/widgets/widget-realtime-chart.tpl.php'); ?>
              </div>
              <!--col-md-4-->
              <div class="col-md-3">
                <?php  include('templates/widgets/widget-pie-chart.tpl.php'); ?>
              </div>
              <!-- col-md-3 --> 
            </div>
            <div class="row">
              <div class="col-md-6  mgbt-xs-20 mgbt-md-0">
                <?php  include('templates/widgets/widget-calendar.tpl.php'); ?>
              </div>
              <!-- col-md-6 -->
              
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <?php  include('templates/widgets/widget-tabs.tpl.php'); ?>
                  </div>
                  <!-- col-md-12 --> 
                </div>
                <!-- row --> 
              </div>
            </div>
            <!-- .row -->
            <div class="row">
              <div class="col-md-4">
                <?php  include('templates/widgets/widget-weather.tpl.php'); ?>
              </div>
              <!-- col-md-4 -->
              <div class="col-md-4">
                <?php  include('templates/widgets/widget-todo.tpl.php'); ?>
              </div>
              <!-- col-md-4 -->
              <div class="col-md-4" >
                <?php  include('templates/widgets/widget-news.tpl.php'); ?>
              </div>
              <!-- col-md-4 --> 
              
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
    
  </div>
  <!-- .container --> 
</div>
<!-- .content -->

<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>

<!-- Specific Page Scripts Put Here -->
<?php include('templates/scripts/index.tpl.php'); ?>

<!-- Specific Page Scripts END -->

<?php require_once('templates/footers/closing.tpl.php'); ?>