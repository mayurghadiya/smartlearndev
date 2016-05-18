<?php
header('Content-type: text/json');
echo '[';
$separator = "";
$days = 16;
 //   echo '  { "date": "2013-03-19 17:30:00", "type": "meeting", "title": "Test Last Year", "description": "Lorem Ipsum dolor set", "url": "" },';
  //  echo '  { "date": "2013-03-23 17:30:00", "type": "meeting", "title": "Test Next Year", "description": "Lorem Ipsum dolor set", "url": "http://www.event3.com/" },';

$i = 1;
    echo $separator;
    //$initTime = date("Y")."-".date("m")."-".date("d")." ".date("H").":00:00";
    $initTime = date("Y-m-d H:i:00");
	
    echo '  { "date": "2016-03-07 17:30:00", "type": "meeting", "title": "Test Last Year", "description": "Lorem Ipsum dolor set", "url": "" },';
    echo '  { "date": "'; echo date("Y-m-d H:i:00",strtotime($initTime. ' + 1 days')); echo '", "type": "meeting", "title": "Project '; echo $i; echo ' meeting", "description": "Lorem Ipsum dolor set", "url": "" }';
   

  

    $separator = ",";

echo ']';
?>