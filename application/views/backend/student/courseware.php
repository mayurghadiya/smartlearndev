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
                                                <th><div><?php echo ucwords("topic name"); ?></div></th>
                                                <th><div><?php echo ucwords("branch"); ?></div></th>
                                                <th><div><?php echo ucwords("attachment"); ?></div></th>
                                                <th><div><?php echo ucwords("description"); ?></div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $count = 1;
                                            foreach ($courseware as $row)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                     <td><?php echo $row['topic']; ?></td>
                                                     <td><?php echo $row['c_name']; ?></td>
                                                    <td id="downloadedfile"><a href="<?=base_url()?>uploads/courseware/<?php echo $row['attachment']; ?>" download="" title="<?php echo $row['attachment']; ?>"><i class="fa fa-download"></i></a></td>	
                                                    <td><?php echo $row['description']; ?></td>
                                                </tr>
                                            <?php                                                
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                  
                <script>
                $(document).ready(function () {
                    $('#data-tables1').dataTable();
                })

                </script>