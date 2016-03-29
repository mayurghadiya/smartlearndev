   <!-- Middle Content Start -->
  
  <link rel="stylesheet" href="<?=$this->config->item('css_path')?>style-calender.css">
 
    <div class="vd_content-wrapper">
		<div class="vd_container">
			<div class="vd_content-section clearfix">
            <!-- CALENDAR--> 
				 <div class="container">    
					<div class="row">
					  <div class="col-md-6">
						<div class="calendar hidden-print">
						  <div  class="header">
							<h2 class="month"></h2>
							<a class="btn-prev fa fa-angle-left" href="#"></a>
							<a class="btn-next fa fa-angle-right" href="#"></a>
						  </div>
						  <table id="main">
							<thead class="event-days">
							  <tr></tr>
							</thead>
							<tbody class="event-calendar" id="event_dt">
							  <tr class="1"></tr>
							  <tr class="2"></tr>
							  <tr class="3"></tr>
							  <tr class="4"></tr>
							  <tr class="5"></tr>
							  <tr class="6"></tr>
							</tbody>
						  </table>
						</div>
					  </div>					  
					
	
						<div class="col-md-6">		
							<div class="calendar hidden-print" style="">
								<h2 class="title" id="demo">  
									<input type="hidden" name="targ" id="hd_demo" value=""/>
								</h2>
								<input type="hidden" id="hd_demo" value="" name="hidden_date" />
							<?php 
								//echo "<pre/>";
								//print_r($_GET['name']);							
								//echo  $_SESSION["text_clicked"]  .'dadsfsdyy';
								//print_r($_POST);
								//echo  $this->input->post('name')  .'dadsfsdyy';
								$c_date = date("d M Y");
								$o_date = date("d");
								$noevent		= $this->db->get_where('event_manager')->result_array();	
							
								
									foreach($noevent as $norow):
										$n_date = date("d M Y");	
										$nnewDate = date("d-m-Y", strtotime($norow['event_date']));
										$ndateArray = date_parse_from_format('d-m-Y', $nnewDate);
										//echo "<pre/>";
										//print_r($ndateArray);
										
										//if($ndateArray['day'] == )
									?>
										<p id="update_div"></p>
									<?php endforeach; ?>		
							<?php
								$event_all		= $this->db->get_where('event_manager')->result_array();
								$count = 0; 							
								foreach($event_all as $row_data):
									$c_date = date("d M Y");	
									$newDate = date("d-m-Y", strtotime($row_data['event_date']));
									$dateArray = date_parse_from_format('d-m-Y', $newDate);
									
									if($c_date == $row_data['event_date']){ 	
									?>								
										<h2 class="title" id="demo1">  
										<script> 
												var d = new Date();
												var n = d.getDate();
												document.getElementById("demo").innerHTML = 'Day ' + n;
										</script>										
									</h2>
										<div class="day-event" date-day="<?php echo $dateArray['day']; ?>" date-month="<?php echo $dateArray['month']; ?>" date-year="<?php echo $dateArray['year']; ?>"  data-number="1" style="display: block; padding:5px; margin:5px;" >
											<div class="panel widget" style="padding:0px; margin:0px;">
												<div class="panel-body <?php echo $count; ?>" style="padding:0px; margin:0px;">
													<div class="panel-group" id="accordion" style="padding:0px; margin:0px;">
													  <div class="panel" style="padding:5px; margin:5px;">
														<div class="panel-heading vd_bg-green vd_bd-green">
														  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo  $row_data['event_id']; ?>"><?php echo  $row_data['event_name']; ?> </a> </h4>
														</div>
														<div id="<?php echo  $row_data['event_id']; ?>" class="panel-collapse collapse <?php /*if($count == 0){ echo "in"; } else { }*/?>" style=
														"font-size:13px;">
														  <div class="panel-body"> <?php echo  $row_data['event_desc']; ?></div>
														</div>
													  </div>
													</div>
												</div>
											</div>
										</div>
										<?php } else {  ?>
										<h2 class="title" id="demo1">  
										<script> 
												var d = new Date();
												var n = d.getDate();
												document.getElementById("demo").innerHTML = 'Day ' + n;
												
										</script>	
										<?php //echo "<pre/>"; print_r($dateArray); ?>
											<div class="day-event" date-day="<?php echo $dateArray['day']; ?>" date-month="<?php echo $dateArray['month']; ?>" date-year="<?php echo $dateArray['year']; ?>"  data-number="1" style="padding:5px; margin:5px;">
											
											<div class="panel widget" style="padding:0px; margin:0px;">
												<div class="panel-body <?php echo $count; ?>" style="padding:0px; margin:0px;">
													<div class="panel-group" id="accordion" style="padding:0px; margin:0px;">
													  <div class="panel" style="padding:5px; margin:5px;">
														<div class="panel-heading vd_bg-green vd_bd-green">
														  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo  $row_data['event_id']; ?>"><?php echo  $row_data['event_name']; ?> </a> </h4>
														</div>
														<div id="<?php echo  $row_data['event_id']; ?>" class="panel-collapse collapse <?php /*if($count == 0){ echo "in"; } else { }*/?>" style=
														"font-size:13px;">
														  <div class="panel-body"> <?php echo  $row_data['event_desc']; ?></div>
														</div>
													  </div>
													</div>
												</div>
											</div>
										</div>
												
										<?php } endforeach; ?>
									
								</div>
						</div>
					</div>
				</div>
				<!-- Calender End -->
			</div>			
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 
    </div>

    <!-- .vd_content-wrapper --> 
	<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery.js"></script> 
	<script type="text/javascript">   
	function getVal(e) {
    var targ;
    if (!e) var e = window.event;
    if (e.target) targ = e.target;
    else if (e.srcElement) targ = e.srcElement;
    if (targ.nodeType == 3) // defeat Safari bug
        targ = targ.parentNode;        
		document.getElementById("demo").innerHTML = 'Day ' + targ.innerHTML;		
		$("#hd_demo").val(targ.innerHTML);		
		//$("#demo1").css('display','none');		
		var foo = targ.innerHTML;
		//var result = {name: targ.innerHTML};
		 var update_div = $('#update_div');
		var dataString = 'name='+foo;
		$.ajax({
			   type: 'POST',			
			   url :"<?php echo site_url('admin/dashboard');?>/"+foo,			   
			   data:dataString,				
			  // data: ({name: foo}),
			   
			   success:function(html){
					
					//update_div.html(html);
				}
			}); 
	
}

onload = function() {
    var t;
	var t = document.getElementById("main").getElementsByTagName("td");
	alert(t);
	//console.log(t);
    for ( var i = 0; i < t.length; i++ )
        t[i].onclick = getVal;
	}
		
						
						
	var calendar = {

	init: function(ajax) {

		if (ajax) {

      // ajax call to print json
      $.ajax({
  				url: '<?=$this->config->item('json_path')?>events.json',
  				type: 'GET',
  			})
  			.done(function(data) {
				
			
          var events = data.events;

          // loop json & append to dom
          for (var i = 0; i < events.length; i++) {
           // $('.list').append('<div class="day-event" date-day="'+ events[i].day +'" date-month="' + events[i].month +'" date-year="'+ events[i].year +'" data-number="'+ i +'"><h2 class="title">'+ events[i].title +'</h2><p>'+ events[i].description +'</p></div>');
			
			/* $('.list').append('<div class="day-event" date-day="'+ events[i].day +'" date-month="' + events[i].month +'" date-year="'+ events[i].year +'" data-number="'+ i +'"><a href="#" class="close fontawesome-remove"></a><h2 class="title">'+ events[i].title +'</h2><p>'+ events[i].description +'</p><label class="check-btn"><input type="checkbox" class="save" id="save" name="" value=""/><span>Save to personal list!</span></label></div>'); */
          }

          // start calendar
          calendar.startCalendar();

  			})
  			.fail(function(data) {
  				console.log(data);
  			});
		} else {

      // if not using ajax start calendar
      calendar.startCalendar();
    }

	},

  startCalendar: function() {
		var mon = 'Mon';
		var tue = 'Tue';
		var wed = 'Wed';
		var thur = 'Thu';
		var fri = 'Fri';
		var sat = 'Sat';
		var sund = 'Sun';

		/**
		 * Get current date
		 */
		var d = new Date();
		var strDate = yearNumber + "/" + (d.getMonth() + 1) + "/" + d.getDate();
		var yearNumber = (new Date).getFullYear();
		/**
		 * Get current month and set as '.current-month' in title
		 */
		var monthNumber = d.getMonth() + 1;

		function GetMonthName(monthNumber) {
			var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
			return months[monthNumber - 1];
		}

		setMonth(monthNumber, mon, tue, wed, thur, fri, sat, sund);

		function setMonth(monthNumber, mon, tue, wed, thur, fri, sat, sund) {
			$('.month').text(GetMonthName(monthNumber) + ' ' + yearNumber);
			$('.month').attr('data-month', monthNumber);
			printDateNumber(monthNumber, mon, tue, wed, thur, fri, sat, sund);
		}

		$('.btn-next').on('click', function(e) {
			var monthNumber = $('.month').attr('data-month');
			if (monthNumber > 11) {
				$('.month').attr('data-month', '0');
				var monthNumber = $('.month').attr('data-month');
				yearNumber = yearNumber + 1;
				setMonth(parseInt(monthNumber) + 1, mon, tue, wed, thur, fri, sat, sund);
			} else {
				setMonth(parseInt(monthNumber) + 1, mon, tue, wed, thur, fri, sat, sund);
			};
		});

		$('.btn-prev').on('click', function(e) {
			var monthNumber = $('.month').attr('data-month');
			if (monthNumber < 2) {
				$('.month').attr('data-month', '13');
				var monthNumber = $('.month').attr('data-month');
				yearNumber = yearNumber - 1;
				setMonth(parseInt(monthNumber) - 1, mon, tue, wed, thur, fri, sat, sund);
			} else {
				setMonth(parseInt(monthNumber) - 1, mon, tue, wed, thur, fri, sat, sund);
			};
		});

		/**
		 * Get all dates for current month
		 */

		function printDateNumber(monthNumber, mon, tue, wed, thur, fri, sat, sund) {

			$($('tbody.event-calendar tr')).each(function(index) {
				$(this).empty();
			});

			$($('thead.event-days tr')).each(function(index) {
				$(this).empty();
			});

			function getDaysInMonth(month, year) {
				// Since no month has fewer than 28 days
				var date = new Date(year, month, 1);
				var days = [];
				while (date.getMonth() === month) {
					days.push(new Date(date));
					date.setDate(date.getDate() + 1);
				}
				return days;
			}

			i = 0;

			setDaysInOrder(mon, tue, wed, thur, fri, sat, sund);

			function setDaysInOrder(mon, tue, wed, thur, fri, sat, sund) {
				var monthDay = getDaysInMonth(monthNumber - 1, yearNumber)[0].toString().substring(0, 3);
				if (monthDay === 'Mon') {
					$('thead.event-days tr').append('<td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td>');
				} else if (monthDay === 'Tue') {
					$('thead.event-days tr').append('<td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td>');
				} else if (monthDay === 'Wed') {
					$('thead.event-days tr').append('<td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td>');
				} else if (monthDay === 'Thu') {
					$('thead.event-days tr').append('<td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td>');
				} else if (monthDay === 'Fri') {
					$('thead.event-days tr').append('<td>' + fri + '</td><td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td>');
				} else if (monthDay === 'Sat') {
					$('thead.event-days tr').append('<td>' + sat + '</td><td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td>');
				} else if (monthDay === 'Sun') {
					$('thead.event-days tr').append('<td>' + sund + '</td><td>' + mon + '</td><td>' + tue + '</td><td>' + wed + '</td><td>' + thur + '</td><td>' + fri + '</td><td>' + sat + '</td>');
				}
			};
			$(getDaysInMonth(monthNumber - 1, yearNumber)).each(function(index) {
				var index = index + 1;
				if (index < 8) {
					$('tbody.event-calendar tr.1').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
				} else if (index < 15) {
					$('tbody.event-calendar tr.2').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
				} else if (index < 22) {
					$('tbody.event-calendar tr.3').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
				} else if (index < 29) {
					$('tbody.event-calendar tr.4').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
				} else if (index < 32) {
					$('tbody.event-calendar tr.5').append('<td date-month="' + monthNumber + '" date-day="' + index + '" date-year="' + yearNumber + '">' + index + '</td>');
				}
				i++;
			});
			var date = new Date();
			var month = date.getMonth() + 1;
			var thisyear = new Date().getFullYear();
			setCurrentDay(month, thisyear);
			setEvent();
			displayEvent();
		}

		/**
		 * Get current day and set as '.current-day'
		 */
		function setCurrentDay(month, year) {
			var viewMonth = $('.month').attr('data-month');
			var eventYear = $('.event-days').attr('date-year');
			if (parseInt(year) === yearNumber) {
				if (parseInt(month) === parseInt(viewMonth)) {
					$('tbody.event-calendar td[date-day="' + d.getDate() + '"]').addClass('current-day');
				}
			}
		};

		/**
		 * Add class '.active' on calendar date
		 */
		$('tbody td').on('click', function(e) {
			if ($(this).hasClass('event')) {
				$('tbody.event-calendar td').removeClass('active');
				 $(this).addClass('active');
			} else {
				$('tbody.event-calendar td').removeClass('active');
			};
		});

		/**
		 * Add '.event' class to all days that has an event
		 */
		function setEvent() {
			$('.day-event').each(function(i) {
				var eventMonth = $(this).attr('date-month');
				var eventDay = $(this).attr('date-day');
				var eventYear = $(this).attr('date-year');
				var eventClass = $(this).attr('event-class');
				if (eventClass === undefined) eventClass = 'event';
				else eventClass = 'event ' + eventClass;

				if (parseInt(eventYear) === yearNumber) {
					$('tbody.event-calendar tr td[date-month="' + eventMonth + '"][date-day="' + eventDay + '"]').addClass(eventClass);
				}
			});
		};

		/**
		 * Get current day on click in calendar
		 * and find day-event to display
		 */
		function displayEvent() {
			$('tbody.event-calendar td').on('click', function(e) {
				$('.day-event').slideUp('fast');
				var monthEvent = $(this).attr('date-month');
				var dayEvent = $(this).text();
				$('.day-event[date-month="' + monthEvent + '"][date-day="' + dayEvent + '"]').slideDown('fast');
			});
		};

		/**
		 * Close day-event
		 */
		$('.close').on('click', function(e) {
			$(this).parent().slideUp('fast');
		});

		/**
		 * Save & Remove to/from personal list
		 */
		$('.save').click(function() {
			if (this.checked) {
				$(this).next().text('Remove from personal list');
				var eventHtml = $(this).closest('.day-event').html();
				var eventMonth = $(this).closest('.day-event').attr('date-month');
				var eventDay = $(this).closest('.day-event').attr('date-day');
				var eventNumber = $(this).closest('.day-event').attr('data-number');
				$('.person-list').append('<div class="day" date-month="' + eventMonth + '" date-day="' + eventDay + '" data-number="' + eventNumber + '" style="display:none;">' + eventHtml + '</div>');
				$('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"]').slideDown('fast');
				$('.day').find('.close').remove();
				$('.day').find('.save').removeClass('save').addClass('remove');
				$('.day').find('.remove').next().addClass('hidden-print');
				remove();
				sortlist();
			} else {
				$(this).next().text('Save to personal list');
				var eventMonth = $(this).closest('.day-event').attr('date-month');
				var eventDay = $(this).closest('.day-event').attr('date-day');
				var eventNumber = $(this).closest('.day-event').attr('data-number');
				$('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').slideUp('slow');
				setTimeout(function() {
					$('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').remove();
				}, 1500);
			}
		});

		function remove() {
			$('.remove').click(function() {
				if (this.checked) {
					$(this).next().text('Remove from personal list');
					var eventMonth = $(this).closest('.day').attr('date-month');
					var eventDay = $(this).closest('.day').attr('date-day');
					var eventNumber = $(this).closest('.day').attr('data-number');
					$('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').slideUp('slow');
					$('.day-event[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').find('.save').attr('checked', false);
					$('.day-event[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').find('span').text('Save to personal list');
					setTimeout(function() {
						$('.day[date-month="' + eventMonth + '"][date-day="' + eventDay + '"][data-number="' + eventNumber + '"]').remove();
					}, 1500);
				}
			});
		}

		/**
		 * Sort personal list
		 */
		function sortlist() {
			var personList = $('.person-list');

			personList.find('.day').sort(function(a, b) {
				return +a.getAttribute('date-day') - +b.getAttribute('date-day');
			}).appendTo(personList);
		}

		/**
		 * Print button
		 */
		$('.print-btn').click(function() {
			window.print();
		});
  },

};

$(document).ready(function() {
	calendar.init('ajax');
});

	</script>