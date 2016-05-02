<div class="vd_content-wrapper">

    <div class="vd_head-section clearfix"></div>
    <!--<hr/>-->
    <div class="vd_title-section clearfix">
        
        <div class="vd_panel-header">
                   <div class="vd_panel-header " style="float: left;">
                    <ul class="breadcrumb">
                          <li><?php echo set_breadcrumb(); ?></li>
                    </ul>

                </div> 
            <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4" style="float: right;">
                
            Add Widgets
            <select style="width: 75%;" id="addWidgetFromSelect">
                <option value="">Select Widget</option>
                <option value="id1" id="wid1">Event Calendar</option>
                <option value="id2" id="wid2">Admissions</option>
                <option value="id3" id='wid3'>Assignments</option>
                <option value="id4" id="wid4">Study Resources</option>
                <option value="id5" id="wid5">Examinations</option>
                <option value="id6" id="wid6">Results</option>
                <option value="id7" id="wid7">Project &amp; Synopsis</option>
                <option value="id8" id="wid8">Video Conferencing</option>
                <option value="id9" id="wid9">Digital Library</option>
                <option value="id10" id="wid10">Participate</option>
                <option value="id11" id="wid11">Staff &amp; Email Directory</option>
            </select>
            </div>
        </div>
    </div>

    <ul class="mega-ul">   

        <li id="test" class="one-icon mega-li hidden"> 
            <a class="mega-link" href="javascript:void(0);" data-action="click-trigger">                
                <span class="mega-icon">
                    <i class="fa fa-plus"> Add Gadgets</i>                    
                </span>
            </a>
            <div class="width-xs-12  center-xs-12" data-action="click-target" style="display: none;" >
                <div class="child-menu"> 
                    <div class="content-list content-menu text-left L0">
                        <ul class="list-wrapper pd-lr-10">
                            <li class="btn" id="btnAddWidget"> <a href="#" class="btn vd_btn vd_bg-grey"> <span class="menu-icon"><i class=" fa fa-user"></i></span> <span class="menu-text">Video Conferencing</span> </a> </li>
                            <li class="btn" id="btnAddTableWidget"> <a href="#" class="btn vd_btn vd_bg-grey"> <span class="menu-icon"><i class=" fa fa-trophy"></i></span> <span class="menu-text">Digital Library</span> </a> </li>
                            <li class="btn" id="btnAddPieChartWidget"> <a href="#" class="btn vd_btn vd_bg-grey"> <span class="menu-icon"><i class=" fa fa-flask"></i></span> <span class="menu-text">Participate</span> </a>  </li>
                            <li class="btn" id="btnAddbrijWidget"> <a href="#" class="btn vd_btn vd_bg-grey"> <span class="menu-icon"><i class=" fa fa-flask"></i></span> <span class="menu-text">Staff and Email Directory</span> </a>  </li>
                            <!--<li class="btn" id="btnAddBarChartWidget"> <a href="#"> <span class="menu-icon"><i class=" fa fa-flask"></i></span> <span class="menu-text">Gadgets 5</span> </a>  </li>
                            <li class="btn" id="btnAddLineChartWidget"> <a href="#"> <span class="menu-icon"><i class=" fa fa-flask"></i></span> <span class="menu-text">Gadgets 6</span> </a>  </li>-->
                        </ul>
                    </div> 
                </div> 
            </div> 
            <!-- vd_mega-menu-content  -->     
        </li>      
    </ul>    
    <ul id="myDashboard">

    </ul>
</div>
