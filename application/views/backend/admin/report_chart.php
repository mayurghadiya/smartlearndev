<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!--Male vs Female-->
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Male/Female'],
            ['Male', <?php echo $male_female_pie_chart['total_male_student']; ?>],
            ['Female', <?php echo $male_female_pie_chart['total_female_student']; ?>]
        ]);

        var options = {
            title: 'Male vs Female Students'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

<!--Year wise student-->
<script type="text/javascript">
    //google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Total Student'],
<?php foreach ($new_student_joining as $row) { ?>
                ['<?php echo $row->Year; ?>', <?php echo (int) $row->Total ?>],
<?php } ?>
        ]);

        var options = {
            chart: {
                title: 'Year wise student',
                subtitle: 'Year wise student registration count',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('year_wise_student'));

        chart.draw(data, options);
    }
</script>

<!--Male vs female course wise-->
<script type="text/javascript">
    //google.charts.load('current', {'packages':['bar']});
<?php
$course = $this->db->get('course')->result();
$this->load->helper('report_chart');
?>
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Course', 'Male', 'Female'],
<?php foreach ($course as $co) { ?>
                ['<?php echo $co->course_alias_id; ?>', <?php echo course_male_student_count($co->course_id); ?>, <?php echo course_female_student_count($co->course_id); ?>],
<?php } ?>
        ]);

        var options = {
            chart: {
                title: 'Male vs Female Student Course Wise',
                subtitle: 'Male vs Female students course wise 2016',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('male_female_count_course'));

        chart.draw(data, options);
    }
</script>

<!--Corse wise student count-->
<script type="text/javascript">
    //google.charts.load('current', {'packages': ['bar']});
<?php
$course = $this->db->get('course')->result();
$this->load->helper('report_chart');
?>
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Course', 'Total Students'],
<?php foreach ($course as $co) { ?>
                ['<?php echo $co->course_alias_id; ?>', <?php echo course_wise_student($co->course_id); ?>],
<?php } ?>
        ]);

        var options = {
            chart: {
                title: 'Total Student Count',
                subtitle: 'Course wise total student count 2016',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('course_wise_student_count'));

        chart.draw(data, options);
    }
</script>
<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>">Home</a> </li>
                        <li><?php echo ucwords("reports");?></li>
                        <li class="active">Report</li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Report</h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Male vs Female Student</div>
                    </div>
                    <div class="panel-body" id="piechart" style="height: 300px;"></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Year Wise Student</div>
                    </div>
                    <div class="panel-body" id="year_wise_student" style="height: 300px;"></div>
                </div>
            </div>
            <div class="col-md-12" style="min-height: 500px;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Male vs Female Course wise count</div>
                    </div>
                    <div class="panel-body" id="male_female_count_course" style="height: 500px;"></div>
                </div>
            </div>
            <div class="col-md-12" style="min-height: 500px;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Course Wise Student Count</div>
                    </div>
                    <div class="panel-body" id="course_wise_student_count" style="height: 500px;"></div>
                </div>
            </div>

        </div>
        <!-- row --> 
    </div>
    