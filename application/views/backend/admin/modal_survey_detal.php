<?php 
$this->db->select('s.*,sl.*,sl.created_date as cdate'); 
$this->db->join('student s','s.std_id=sl.student_id');
$edit_data =$this->db->get_where('survey_list sl',array('survey_id' => $param2))->result();
$question = explode(",",$edit_data[0]->sq_id);
$status = explode(",",$edit_data[0]->survey_status);
$data=array_combine($question,$status);
$this->load->helper("date_format");
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                   <?php echo ucwords("Survey Detail");?>
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  
                        <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="data-tables">
                                        <h5>Date : <?php echo datetime_formats($edit_data[0]->cdate); ?></h5>
                                         <thead>
                                            <tr>
                                                <th><?php echo ucwords("Student Name");?></th>
                                                <th><?php echo ucwords("Degree ");?></th>
                                                <th><?php echo ucwords("Course ");?></th>
                                                <th><?php echo ucwords("Batch ");?></th>
                                                <th><?php echo ucwords("Semester ");?></th>
                                            </tr>
                                        </thead>
                                        <?php $degree = $this->db->get_where("degree",array("d_id"=>$edit_data[0]->std_degree))->result();
                                            $course = $this->db->get_where("course",array("course_id"=>$edit_data[0]->course_id))->result();
                                             $batch = $this->db->get_where("batch",array("b_id"=>$edit_data[0]->std_batch))->result();
                                              $semester = $this->db->get_where("semester",array("s_id"=>$edit_data[0]->semester_id))->result();
                                         ?>
                                         <tbody>
                                             <td><?php echo $edit_data[0]->std_first_name.' '.$edit_data[0]->std_last_name; ?></td>
                                             <td><?php echo $degree[0]->d_name; ?></td>
                                             <td><?php  echo $course[0]->c_name;?></td>
                                             <td><?php  echo $batch[0]->b_name;?></td>
                                             <td><?php  echo $semester[0]->s_name;?></td>
                                             
                                         </tbody>
                                         </table>
                                           <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><?php echo ucwords("Question");?></th>
                                                <th><?php echo ucwords("Answer");?></th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                         <?php foreach($data as $key=>$val):
                                            $valques = $this->db->get_where('survey_question',array("sq_id"=>$key))->num_rows();
                                            if($valques > 0)
                                            {
                                          ?>
                                            <?php   $question1 =  $this->crud_model->getquestion('survey_question',$key);
                                                      ?>
                                                <tr>		
                                                <td><?php  echo $question1; ?></td>						
                                                <td><?php  $s1= $val; 
if($s1=="1")
                                                        {
                                                            echo "Yes";
                                                        }
                                                        elseif($s1=="0")
                                                        {
                                                            echo "No";
                                                        }
                                                        elseif($s1=="2")
                                                        {
                                                            echo "No Opinion";
                                                        }

                                                ?></td>                     			
                                               </tr>	
                                               <?php } ?>
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

  