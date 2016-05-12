<?php 

if(count($student))
                             $degree = $this->db->get_where("degree",array("d_id"=>$student[0]->std_degree))->result();
                                            $course = $this->db->get_where("course",array("course_id"=>$student[0]->course_id))->result();
                                             $batch = $this->db->get_where("batch",array("b_id"=>$student[0]->std_batch))->result();
                                              $semester = $this->db->get_where("semester",array("s_id"=>$student[0]->semester_id))->result();
                                         ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                   Student Detail
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  
                        <div class="panel-body table-responsive">
                            <img src="<?php echo base_url().'uploads/student_image/'.$student[0]->profile_photo; ?>" height="100" width="100" />
                                   
                             <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                             
                                               
                                                
                                                
                                              
                                            </tr>
                                        </thead>
                                         <tbody>
                                        
                                          <tr>		
                                          <th>Student Name</th> <td><?php  echo $student[0]->std_first_name.' '.$student[0]->std_last_name; ?></td>						
                                          </tr>
                                          <tr>		
                                          <th>Degree </th><td><?php echo $degree[0]->d_name; ?></td>
                                          </tr>
                                          <tr>
                                          <th>Course </th>  <td><?php  echo $course[0]->c_name;?></td>
                                          </tr>
                                          <tr>
                                          <th>Batch </th> <td><?php  echo $batch[0]->b_name;?></td>
                                          </tr>
                                          <tr>
                                          <th>Semester </th>  <td><?php  echo $semester[0]->s_name;?></td>                  			
                                          </tr>
                                          <tr>
                                          <th>Roll No </th>  <td><?php  echo $student[0]->std_roll;?></td>                  			
                                          </tr>
                                          <tr>
                                          <th>Email </th>  <td><?php  echo $student[0]->email;?></td>                  			
                                          </tr>
                                          
                                          <tr>
                                          <th>Gender </th>  <td><?php  echo $student[0]->std_gender;?></td>                  			
                                          </tr>
                                          <tr>
                                          <th>Mobile No </th>  <td><?php  echo $student[0]->std_mobile;?></td>                  			
                                          </tr>
                                           <tr>
                                               <th>Student Birthdate </th>  <td><?php  echo date_formats($student[0]->std_birthdate);?></td>                  			
                                          </tr>
                                          
                                              
                                          
                                        </tbody>
                                    </table>
                                         
                                </div>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>

  