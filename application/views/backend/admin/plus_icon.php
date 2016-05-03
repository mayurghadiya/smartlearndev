
    <style>
    .nav-fixedtabs {
    left: 86%;
    position: fixed;
    top: 25%;
    }
    #navfixed{
        cursor: pointer;
    }
    
    </style>
    
    <script>
        $(document).ready(function(){
        $(".nav-fixed-a-tabs").click(function(){
            $(".nav-tabs>li.active").removeClass("active");                
            $(".nav-tabs > li:nth-child(2)").addClass("active");
            $(".tab-content > div.active").removeClass("active");
            $(".tab-content > div#add").addClass("active");
            $(".tab-content > div#theme_setting").addClass("active");
            
           });
         });
    </script>
<!--     <ul class="nav nav-tabs bordered nav-fixedtabs" >
                          
                                <li class="nav-fixed-tabs" >
                                    <a href="#add" id="navfixed" class="nav-fixed-a-tabs vd_bg-red" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                <i class="fa fa-plus-circle"> </i>
</a>
                                </a></li>
                                
                        </ul>-->
    
    <div class="md-fab-wrapper">
<!--        <a class="md-fab md-fab-accent" href="#mailbox_new_message">
            <i class="material-icons">&#xE150;</i>
        </a>
        <br>-->

        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red" href="#add" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>