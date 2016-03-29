    
<?php 
$edit_data =$this->db->get_where('survey',array('survey_id' => $param2))->result();
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                   Survey Detail
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  
                        <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th>Question</th>
                                                <th>Answer</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                                <tr>											
                                                <td>Academic Quality</td><td><?php echo $edit_data[0]->academicquality ?></td>                                                </tr>
                                                <tr><td>Cocurricular Survey</td><td><?php echo $edit_data[0]->cocurricular ?></td></tr>											
                                                <tr><td>Facilities</td><td><?php echo $edit_data[0]->facilities ?></td></tr>											
                                                <tr><td>Value of Degree</td><td><?php echo $edit_data[0]->valueofdegree ?></td></tr>									
                                                <tr><td>Faculty</td><td><?php echo $edit_data[0]->faculty ?></td></tr>
                                                <tr><td>Motivation</td><td><?php echo $edit_data[0]->motivation ?></td></tr>
                                                <tr><td>Bodydiversity</td><td><?php echo $edit_data[0]->bodydiversity ?></td></tr>
                                                <tr><td>Cost</td><td><?php echo $edit_data[0]->cost ?></td></tr>
                                                <tr><td>Reputation</td><td><?php echo $edit_data[0]->reputation ?></td></tr>
                                                <tr><td>Strength</td><td><?php echo $edit_data[0]->strength ?></td></tr>
                                                <tr><td>Weekness</td><td><?php echo $edit_data[0]->weekness ?></td></tr>			
                                        </tbody>
                                    </table>
                                </div>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>

  