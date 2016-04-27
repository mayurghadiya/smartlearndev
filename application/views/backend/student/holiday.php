
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/std_event/css/demo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/std_event/css/calendar.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/std_event/css/custom_2.css" />
<style>
    section.scroll_none {
    background: #fff none repeat scroll 0 0 !important;
    height: 500px;
    overflow: hidden;
}
    </style>
<?php
$skin = $this->db->get_where('system_setting', array('type' => 'skin_colour'))->row()->description;

if ($skin == 'theme_green.min.css') {
    ?>
    <link href="<?= $this->config->item('css_path') ?>student/event_green.css" rel="stylesheet">
<?php } elseif ($skin == 'theme_blue.min.css') {
    ?>
    <link href="<?= $this->config->item('css_path') ?>student/event_blue.css" rel="stylesheet">
<?php } elseif ($skin == 'theme_gold.min.css') {
    ?>
    <link href="<?= $this->config->item('css_path') ?>student/event_gold.css" rel="stylesheet">
<?php } else { ?>
    <link href="<?= $this->config->item('css_path') ?>student/event_default.css" rel="stylesheet">			
<?php } ?>     


<script src="<?php echo base_url() ?>assets/std_event/js/modernizr.custom.63321.js"></script>
<?php ?>
<section class="main scroll_none">

    <div class="custom-calendar-wrap">
        <div id="custom-inner" class="custom-inner">
            <div class="custom-header clearfix newcolor">
                <nav>
                    <span id="custom-prev" class="custom-prev"></span>
                    <span id="custom-next" class="custom-next"></span>
                </nav>
                <h2 id="custom-month" class="custom-month"></h2>                          
            </div>
            <div id="calendar" class="fc-calendar-container"></div>
        </div>
    </div>
</section>
</div><!-- /container -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/std_event/js/calendario.js"></script>

<!--<script type="text/javascript" src="js/data.js"></script>-->
<?php $event = $this->db->get('holiday')->result(); ?>
<script type="text/javascript">
    var events = {
<?php
foreach ($event as $eve) :
    
    $event_date = date("m-d-Y", strtotime($eve->holiday_startdate));
    $event_date_time =  $eve->holiday_startdate;
    $event_name = $eve->holiday_name;
    
    $diff=date_diff(date_create($eve->holiday_startdate),date_create($eve->holiday_enddate));
    $count= $diff->format("%R%a days");
   //$sdate=date("Y-m-d", strtotime($eve->holiday_startdate));
    
    for($i=0;$i<=$count;$i++)
    {
        $sdate= date('Y-m-d', strtotime($i.'day', strtotime(date("Y-m-d", strtotime($eve->holiday_startdate)))));
       
        ?>
            '<?php echo date("m-d-Y", strtotime($sdate)); ?>' : [{content: '<?php  echo date("F d, Y", strtotime($sdate));
             echo "<br/>";
             echo $event_name;?>', allDay: true}],    
             <?php
    }

    ?>
<?php endforeach; ?>
    },
            
            t = new Date(),
//Creation of today event
            today = ((t.getMonth() + 1) < 10 ? '0' + (t.getMonth() + 1) : (t.getMonth() + 1)) + '-' + (t.getDate() < 10 ? '0' + t.getDate() : t.getDate()) + '-' + t.getFullYear();
           
    events[today] = [{content: 'TODAY', allDay: true}];

    $(function () {
        function updateMonthYear() {
            var cyear = $('#calendar').calendario('getMonthName');
            var cmonth = $('#calendar').calendario('getYear');
            var currentdata = cyear + ' ' + cmonth;
            $('#custom-month').html(currentdata);
            //$( '#custom-month' ).html( $( '#calendar' ).calendario('getYear'));
        }

        $(document).on('finish.calendar.calendario', function (e) {
            var mmonth = $('#calendar').calendario('getMonthName');
            var myear = $('#calendar').calendario('getYear');
            var mdata = mmonth + ' ' + myear;
            $('#custom-month').html(mdata);
            //$( '#custom-year' ).html( $( '#calendar' ).calendario('getYear'));

            $('#custom-next').on('click', function () {
                $('#calendar').calendario('gotoNextMonth', updateMonthYear);
            });
            $('#custom-prev').on('click', function () {
                $('#calendar').calendario('gotoPreviousMonth', updateMonthYear);
            });
            $('#custom-current').on('click', function () {
                $('#calendar').calendario('gotoNow', updateMonthYear);
            });
        });

        $('#calendar').on('shown.calendar.calendario', function () {
            $('div.fc-row > div').on('onDayClick.calendario', function (e, dateprop) {
                console.log(dateprop);
                if (dateprop.data) {
                    showEvents(dateprop.data.html, dateprop);
                }
            });
        });

        var transEndEventNames = {
            'WebkitTransition': 'webkitTransitionEnd',
            'MozTransition': 'transitionend',
            'OTransition': 'oTransitionEnd',
            'msTransition': 'MSTransitionEnd',
            'transition': 'transitionend'
        },
        transEndEventName = transEndEventNames[ Modernizr.prefixed('transition') ],
                $wrapper = $('#custom-inner');

        function showEvents(contentEl, dateprop) {
            hideEvents();
            var $events = $('<div id="custom-content-reveal" class="custom-content-reveal"><h4>' + dateprop.monthname + ' '
                    + dateprop.day + ', ' + dateprop.year + '</h4></div>'),
                    $close = $('<span class="custom-content-close"></span>').on('click', hideEvents);
            $events.append(contentEl.join(''), $close).insertAfter($wrapper);
            setTimeout(function () {
                $events.css('top', '0%');
            }, 25);
        }

        function hideEvents() {
            var $events = $('#custom-content-reveal');
            if ($events.length > 0) {
                $events.css('top', '100%');
                Modernizr.csstransitions ? $events.on(transEndEventName, function () {
                    $(this).remove();
                }) : $events.remove();
            }
        }

        $('#calendar').calendario({
            caldata: events,
            displayWeekAbbr: true,
            events: ['click', 'focus']
        });

    });
</script>
