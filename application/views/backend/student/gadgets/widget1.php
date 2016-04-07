
             <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/std_event/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/std_event/css/calendar.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/std_event/css/custom_2.css" />
        <script src="<?php echo base_url() ?>assets/std_event/js/modernizr.custom.63321.js"></script>
        <?php 
        ?>
            <section class="main">
                
                <div class="custom-calendar-wrap">
                    <div id="custom-inner" class="custom-inner">
                        <div class="custom-header clearfix">
                            <nav>
                                <span id="custom-prev" class="custom-prev"></span>
                                <span id="custom-next" class="custom-next"></span>
                            </nav>
                            <h2 id="custom-month" class="custom-month"></h2>
                            <h3 id="custom-year" class="custom-year"></h3>
                        </div>
                        <div id="calendar" class="fc-calendar-container"></div>
                    </div>
                </div>
            </section>
        </div><!-- /container -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/std_event/js/calendario.js"></script>
        <!--<script type="text/javascript" src="js/data.js"></script>-->
        <?php
        
       $event =  $this->db->get('event_manager')->result(); ?>
        <script type="text/javascript"> 
        var events = {
            <?php foreach($event as $eve) :
                $event_date = date("m-d-Y",strtotime($eve->event_date));
            $event_name = $eve->event_name;
            $event_location = $eve->event_location;
            $event_desc = $eve->event_desc;
            ?>
    '<?php echo $event_date; ?>' : [{content: '<?php echo $event_date; echo "<br/>"; echo $event_name; echo "<br/>"; echo $event_location; echo "<br/>"; echo $event_desc; ?>', allDay: true}],   
    <?php endforeach; ?>
},
t = new Date(),
//Creation of today event
today = ((t.getMonth() + 1) < 10 ? '0' + (t.getMonth() + 1) : (t.getMonth() + 1)) + '-' + (t.getDate() < 10 ? '0' + t.getDate() : t.getDate()) + '-' +t.getFullYear();
events[today] = [{content: 'TODAY', allDay: true}];

            $(function() {
                function updateMonthYear() {
					$( '#custom-month' ).html( $( '#calendar' ).calendario('getMonthName') );
					$( '#custom-year' ).html( $( '#calendar' ).calendario('getYear'));
				}
				
				$(document).on('finish.calendar.calendario', function(e){
                    $( '#custom-month' ).html( $( '#calendar' ).calendario('getMonthName') );
					$( '#custom-year' ).html( $( '#calendar' ).calendario('getYear'));
					$( '#custom-next' ).on( 'click', function() {
						$( '#calendar' ).calendario('gotoNextMonth', updateMonthYear);
					} );
					$( '#custom-prev' ).on( 'click', function() {
						$( '#calendar' ).calendario('gotoPreviousMonth', updateMonthYear);
					} );
					$( '#custom-current' ).on( 'click', function() {
						$( '#calendar' ).calendario('gotoNow', updateMonthYear);
					} );
                });
				
				$('#calendar').on('shown.calendar.calendario', function(){
					$('div.fc-row > div').on('onDayClick.calendario', function(e, dateprop) {
						console.log(dateprop);
						if(dateprop.data) {
							showEvents(dateprop.data.html, dateprop);
						}
					});
				});
            
                var transEndEventNames = {
                    'WebkitTransition' : 'webkitTransitionEnd',
                    'MozTransition' : 'transitionend',
                    'OTransition' : 'oTransitionEnd',
                    'msTransition' : 'MSTransitionEnd',
                    'transition' : 'transitionend'
                },
                transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
                $wrapper = $( '#custom-inner' );

                function showEvents( contentEl, dateprop ) {
                    hideEvents();
                    var $events = $( '<div id="custom-content-reveal" class="custom-content-reveal"><h4>Events for ' + dateprop.monthname + ' '
					+ dateprop.day + ', ' + dateprop.year + '</h4></div>' ),
                    $close = $( '<span class="custom-content-close"></span>' ).on( 'click', hideEvents);
                    $events.append( contentEl.join('') , $close ).insertAfter( $wrapper );
                    setTimeout( function() {
                        $events.css( 'top', '0%' );
                    }, 25);
                }
				
                function hideEvents() {
                    var $events = $( '#custom-content-reveal' );
                    if( $events.length > 0 ) {   
                        $events.css( 'top', '100%' );
                        Modernizr.csstransitions ? $events.on( transEndEventName, function() { $( this ).remove(); } ) : $events.remove();
                    }
                }
				
				$( '#calendar' ).calendario({
                    caldata : events,
                    displayWeekAbbr : true,
                    events: ['click', 'focus']
                });
            
            });
        </script>
