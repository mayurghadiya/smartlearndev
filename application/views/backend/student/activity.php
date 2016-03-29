<?php
$std_id = $this->session->userdata('std_id');
?>

<div class="content">
    <div class="container">
        <div class="vd_content-wrapper">
            <div class="">
                <div class="vd_content clearfix">
                    <div class="vd_title-section clearfix">
                        <div class="vd_panel-header">
                            <h1><?php echo $page_title ?></h1>            
                        </div>
                    </div>
                    <div class="vd_content-section clearfix">

                        <div class="row">
                            <div class="col-sm-12">	
                                <table class="table table-striped" id="data-tables">
                        <thead>
                            <tr>
                                <th><div>#</div></th>											
                                <th><div>Participate Title</div></th>											                                                										
                                <th><div>Downloadable File</div></th>											
                                <th><div>Date</div></th>									

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($participate as $row):
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>	
                                    <td><?php echo $row->pp_title; ?></td>	
                                    <td><a href="<?php echo $row->pp_url; ?>" download="" title="<?php echo $row->pp_filename; ?>"  ><i class=" fa fa-download"></i></a></td>	
                                    <td><?php echo date('F d Y',strtotime($row->pp_dos)); ?></td>	


                                </tr>
                            <?php endforeach; ?>						
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