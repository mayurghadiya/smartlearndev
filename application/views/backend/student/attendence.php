<?php 
$attendance	=	$this->db->get('attendance')->result_array();
						foreach($attendance as $row):
						echo "<pre/>";
						if($row['status'] == 2){
							$newd = $row['date'];
						}
						echo $newd;
						//print_r($row['date']);
						endforeach;
						die;
//echo "sdfsd"; die; ?>
	<div class="col-md-12">
    	<div class="row">
            <!-- CALENDAR-->
            <div class="col-md-12 col-xs-12">    
                <div class="panel panel-primary " data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="fa fa-calendar"></i>
                            <?php echo get_phrase('event_schedule');?>
                        </div>
                    </div>
                    <div class="panel-body" style="padding:0px;">
                        <div class="calendar-env">
                            <div class="calendar-body">
                                <div id="attendence_calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	 <script>
  $(document).ready(function() {
	  
	  var calendar = $('#attendence_calendar');
				
				$('#attendence_calendar').fullCalendar({
					header: {
						left: 'title',
						right: 'prev,next'
						//right: 'today prev,next'
					},
					
					//defaultView: 'basicWeek',
					
					editable: false,
					firstDay: 1,
					height: 530,
					droppable: false,
					
					events: [
						<?php 
						$attendance	=	$this->db->get('attendance')->result_array();
						foreach($attendance as $row):
						if($row['status'] == 2){
							$newd = $row['date'];
						}
						?>
						{
							title: "Absent",
							start: new Date(<?php echo $newd; ?>)
							/*start: new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),
							end:	new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>)*/ 
						},
						<?php 
						endforeach;
						?>
						
					]
				});
	});
  </script>