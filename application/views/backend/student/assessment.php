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
                                                  <th><div>Instructions & guidance</div></th>
                                                    <th><div>Feedback</div></th>
                                                    <th><div>Submissions</div></th>
                                                    <th><div>Marks</div></th>
                                                    <th><div>Assessment By</div></th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php $count = 1;
                                            foreach ($assessments as $row):
                                                ?><tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $row->instruction; ?></td>
                                            <td><?php echo $row->submissions; ?></td>
                                            <td><?php echo $row->feedback_tutor; ?></td>
                                            <td><?php echo $row->marks; ?></td>
                                            <td><?php $get = roleuserdatacomment($row->user_role,$row->user_role_id); 
                                            echo $row->user_role." ".$get[0]['name'];                                            
                                            ?></td>
                                            
                                              
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