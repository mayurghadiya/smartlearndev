<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Element', 'Density', {role: 'style'}],
            ['Copper', 8.94, '#b87333', ],
            ['Silver', 10.49, 'silver'],
            ['Gold', 19.30, 'gold'],
            ['Platinum',100, 'color: #e5e4e2']
        ]);

        var options = {
            title: "Density of Precious Metals, in g/cm^3",
            bar: {groupWidth: '95%'},
            legend: 'none',
        };

        var chart_div = document.getElementById('chart_div');
        var chart = new google.visualization.ColumnChart(chart_div);

        // Wait for the chart to finish drawing before calling the getImageURI() method.
        google.visualization.events.addListener(chart, 'ready', function () {
            chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
            console.log(chart_div.innerHTML);
        });

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
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="pages-custom-product.html">Pages</a> </li>
                        <li class="active">Course Managment</li>
                    </ul>
                    <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                        <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                        <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                        <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                    </div>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Report</h1>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Table Chart</div>
                    </div>
                    <div class="panel-body" id="chart_div" style="height: 300px;"></div>
                </div>
            </div>
        </div>
        <!-- row --> 
    </div>

