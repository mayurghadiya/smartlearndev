<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="">
        <div class="vd_content clearfix">
            <div class="vd_title-section clearfix">

                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                          <li><?php echo set_breadcrumb(); ?></li>
                    </ul>

                </div>

                <div class="vd_panel-header">
                    <h1><?php echo $page_title ?></h1>            
                </div>

            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                       
                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">								
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th><?php echo ucwords("course name");?></th>
                                                <th><?php echo ucwords("category");?></th>
                                                <th><?php echo ucwords("course start date");?></th>
                                                <th><?php echo ucwords("course end date");?></th>
                                                <th><?php echo ucwords("course fee");?></th>
                                                <th><?php echo ucwords("professor name");?></th>
                                                 <th><?php echo ucwords("action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php $count = 1;
                                            foreach ($vocationalcourse as $row):
                                                ?><tr>
                                            <td><?php echo $count++; ?></td>
                                              <td><?php echo $row['course_name']; ?></td>   
                                               <td><?php 
                                               $categories = $this->db->get('course_category')->result();
                                               foreach($categories as $category)
                                               {
                                               
                                               if($category->category_id==$row['category_id']){ echo $category->category_name; } 
                                               }
                                               ?></td>    
                                              <td><?php echo date('F d, Y', strtotime($row['course_startdate'])); ?></td>    
                                              <td><?php echo date('F d, Y', strtotime($row['course_enddate'])); ?></td>    
                                              <td><?php echo $row['course_fee']; ?></td>   
                                              <td><?php 
                                               $professor = $this->db->get('professor')->result_array();
                                               foreach($professor as $pro)
                                               {
                                                   if($pro['professor_id']==$row['professor_id'])
                                                   {
                                                       echo $pro['name'];
                                                   }
                                               }
                                               ?></td>   
                                              
                                                <td class="menu-action">
                                                    <a href="<?php echo base_url(); ?>index.php?student/vocationalcourse/register/<?php echo $row['vocational_course_id']; ?>"  data-original-title="Submit Assignment" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow">Register Now</a>
                                                </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                  <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
  
                <script>
                $(document).ready(function () {
                    $('#data-tables1').dataTable();
                })

                </script>