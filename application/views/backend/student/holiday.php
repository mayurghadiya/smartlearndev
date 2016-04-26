<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Event Calendar</h1>
                </div>
            </div>
        <div class="vd_content-section clearfix">
            <!-- CALENDAR--> 
            <div class="container">    
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 clearfix">
                        <div id="eventCalendarHumanDate"></div>
                    </div>					  


                    <div class="col-md-6">		

                    </div>
                </div>
            </div>
            <!-- Calender End -->
        </div>			
        <!-- .vd_content --> 
    </div>
    <!-- .vd_container --> 
</div>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>event_js/moment.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        $("#eventCalendarHumanDate").eventCalendar({
            eventsjson: '<?php echo base_url(); ?>/student/json_holiday',
            jsonDateFormat: 'human'  // 'YYYY-MM-DD HH:MM:SS'
        });

    });
</script>   