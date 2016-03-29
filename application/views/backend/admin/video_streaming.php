
<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">				 
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Live Streaming &amp; Broadcast</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Live Streaming
                                </a>
                            </li>

                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">

                                <div class="panel-body">

                                    <!--Start Page-->                                   
                                    <style>
                                        audio,
                                        video {
                                            -moz-transition: all 1s ease;
                                            -ms-transition: all 1s ease;
                                            -o-transition: all 1s ease;
                                            -webkit-transition: all 1s ease;
                                            transition: all 1s ease;
                                            vertical-align: top;
                                            width: 20%;
                                            margin-right: 10px;
                                        }
                                        input {
                                            border: 1px solid #d9d9d9;
                                            border-radius: 1px;
                                            font-size: 2em;
                                            margin: .2em;
                                            width: 30%;
                                        }
                                        .setup {
                                            border-bottom-left-radius: 0;
                                            border-top-left-radius: 0;
                                            font-size: 102%;
                                            height: 47px;
                                            margin-left: -9px;
                                            margin-top: 8px;
                                            position: absolute;
                                        }
                                    </style>

                                    <!-- scripts used for broadcasting -->
                                    <script src="//cdn.webrtc-experiment.com/firebase.js">
                                    </script>
                                    <script src="//cdn.webrtc-experiment.com/RTCMultiConnection.js">
                                    </script>

                                    <article>

<!-- just copy this <section> and next script -->
                                        <section class="experiment">
                                            <div class="form-horizontal">
                                                <div class="form-group" id="private-broadcast-degree">
                                                    <label class="col-sm-3 control-label">Degree</label>
                                                    <div class="col-sm-5">
                                                        <select id="degree" class="form-control" name="private-broadcast-degree">
                                                            <option>Select</option>
                                                            <?php foreach ($degree as $row) { ?>
                                                                <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="private-broadcast-course">
                                                    <label class="col-sm-3 control-label">Course</label>
                                                    <div class="col-sm-5">
                                                        <select id="course" class="form-control" name="private-broadcast-course">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="private-broadcast-batch">
                                                    <label class="col-sm-3 control-label">Batch</label>
                                                    <div class="col-sm-5">
                                                        <select id="batch" class="form-control" name="private-broadcast-batch">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="private-broadcast-semester">
                                                    <label class="col-sm-3 control-label">Semester</label>
                                                    <div class="col-sm-5">
                                                        <select id="semester" class="form-control" name="private-broadcast-course">
                                                            <option value="all">All Semester</option>
                                                            <?php foreach ($semester as $row) { ?>
                                                                <option value="<?php echo $row->s_id; ?>"><?php echo $row->s_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Live Broadcast</label>
                                                    <div class="col-sm-5">
                                                        <input id="broadcast-name" type="text" class="form-control" placeholder="live streaming for all batch and course" name="title"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-5">
                                                        <button id="setup-new-broadcast" class="btn btn-success">Setup New Broadcast</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <section class="col-md-5 col-md-offset-3">
                                                        <span>
                                                            Private ??
                                                            <a href="" target="_blank" title="Open this link in new tab. Then your room will be private!">
                                                                Click Here <code style="display:none;">
                                                                    <strong id="unique-token">#123456789</strong>
                                                                </code>
                                                            </a>
                                                        </span>                                                
                                                    </section>
                                                </div>
                                            </div>
                                            <!-- list of all available broadcasting rooms -->
                                            <h4>All Broadcast</h4>
                                            <table style="width: 100%;" id="rooms-list" class="table table-bordered"></table>

                                            <!-- local/remote videos container -->
                                            <div id="videos-container" style="margin-right: 5px;"></div>
                                            <br/>
                                            <h4 class="multicast">All Multicast</h4>
                                            <?php
                                            $date = date('Y-m-d');

                                            $multicast = $this->db->select()
                                                    ->from('broadcast_and_streaming')
                                                    ->join('course', 'course.course_id = broadcast_and_streaming.course')
                                                    ->join('semester', 'semester.s_id = broadcast_and_streaming.semester')
                                                    ->like('created_at', $date)
                                                    ->where('url_link !=', '')
                                                    ->get()
                                                    ->result();
                                            if (count($multicast)) {
                                                ?>
                                                <table class="table table-bordered multicast">
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Course</th>
                                                        <th>Semester</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <?php
                                                    foreach ($multicast as $mul) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $mul->title; ?></td>
                                                            <td><?php echo $mul->c_name; ?></td>
                                                            <td><?php echo $mul->s_name; ?></td>
                                                            <td>
                                                                <button onclick="window.open('<?php echo base_url(); ?>index.php?video_streaming#<?php echo $mul->url_link; ?>')">View Streaming</button>
                                                                <button session_id="<?php echo $mul->title; ?>" class="multicaststartstop_tab">Start</button>
                                                            </td>
                                                        </tr>                                                    
                                                    <?php } ?>
                                                </table>
                                            <?php }
                                            ?>
                                        </section>
                                        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
                                        <script>
                                                            // Muaz Khan     - https://github.com/muaz-khan
                                                            // MIT License   - https://www.webrtc-experiment.com/licence/
                                                            // Documentation - https://github.com/muaz-khan/RTCMultiConnection

                                                            var connection = new RTCMultiConnection();
                                                            connection.session = {
                                                                audio: true,
                                                                video: true,
                                                                oneway: true
                                                            };

                                                            connection.onstream = function (e) {

                                                                e.mediaElement.width = 600;
                                                                videosContainer.insertBefore(e.mediaElement, videosContainer.firstChild);
                                                                //videosContainer.insertBefore(title, videosContainer.firstChild);
                                                                rotateVideo(e.mediaElement);
                                                                scaleVideos();
                                                            };

                                                            function rotateVideo(mediaElement) {
                                                                mediaElement.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(0deg)';
                                                                setTimeout(function () {
                                                                    mediaElement.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(360deg)';
                                                                }, 1000);
                                                            }

                                                            connection.onstreamended = function (e) {
                                                                e.mediaElement.style.opacity = 0;
                                                                rotateVideo(e.mediaElement);
                                                                setTimeout(function () {
                                                                    if (e.mediaElement.parentNode) {
                                                                        e.mediaElement.parentNode.removeChild(e.mediaElement);
                                                                    }
                                                                    scaleVideos();
                                                                }, 1000);
                                                            };

                                                            var sessions = {};
                                                            connection.onNewSession = function (session) {
                                                                if (sessions[session.sessionid])
                                                                    return;
                                                                sessions[session.sessionid] = session;

                                                                var tr = document.createElement('tr');
                                                                tr.innerHTML = '<td><strong>' + session.sessionid + '</strong> is sharing his webcam in one-way direction!</td>' +
                                                                        '<td><button class="join">View His Webcam</button></td>' +
                                                                        '<td><button session_id=' + session.sessionid + ' class="startstop" style="margin-left: -100px">Start</button></td>';
                                                                roomsList.insertBefore(tr, roomsList.firstChild);

                                                                var joinRoomButton = tr.querySelector('.join');
                                                                var startStopButton = tr.querySelector('.startstop');
                                                                startStopButton.setAttribute('id', session.sessionid + 'btn');
                                                                joinRoomButton.setAttribute('data-sessionid', session.sessionid);
                                                                joinRoomButton.onclick = function () {
                                                                    this.disabled = true;
                                                                    $('#' + session.sessionid + 'btn').html('Stop');

                                                                    var sessionid = this.getAttribute('data-sessionid');
                                                                    //$('<p>Hello</p>').insertBefore('video');
                                                                    $('<label class="stream_title" style="margin-left: 110px;">' + sessionid + '</label>').insertBefore('#videos-container');
                                                                    session = sessions[sessionid];

                                                                    if (!session)
                                                                        throw 'No such session exists.';

                                                                    connection.join(session);
                                                                    //console.log('My Object: '+session);
                                                                };

                                                                $('.startstop').on('click', function () {
                                                                    var session_clicked = $(this).attr('session_id');
                                                                    var streaming_status = $(this).html();
                                                                    $.ajax({
                                                                        url: '<?php echo base_url(); ?>index.php?admin/start_stop_streaming/' + session_clicked + '/' + streaming_status,
                                                                        type: 'get',
                                                                        success: function () {
                                                                            alert('Streaming is successfully ' + streaming_status);
                                                                        }
                                                                    })
                                                                })

                                                                //multicast start stop
                                                                $('.multicaststartstop').on('click', function () {
                                                                    var session_clicked = $(this).attr('session_id');
                                                                    var streaming_status = $(this).html();
                                                                    if (streaming_status == 'Start') {
                                                                        $.ajax({
                                                                            url: '<?php echo base_url(); ?>index.php?admin/start_stop_streaming/' + session_clicked + '/' + streaming_status,
                                                                            type: 'get',
                                                                            success: function () {

                                                                            }
                                                                        });
                                                                        $(this).html('Stop');
                                                                        alert('Streaming is started');
                                                                    } else {
                                                                        $.ajax({
                                                                            url: '<?php echo base_url(); ?>index.php?admin/start_stop_streaming/' + session_clicked + '/' + streaming_status,
                                                                            type: 'get',
                                                                            success: function () {

                                                                            }
                                                                        });
                                                                        $(this).html('Start');
                                                                        alert('Streaming is stopped');
                                                                    }

                                                                })

                                                                $('.multicaststartstop_tab').on('click', function () {
                                                                    var current_multicast_session = $(this).attr('session_id');
                                                                    var current_milticast_status = $(this).html();
                                                                    if (current_milticast_status == 'Start') {
                                                                        $.ajax({
                                                                            url: '<?php echo base_url(); ?>index.php?admin/start_stop_streaming/' + current_multicast_session + '/' + current_milticast_status,
                                                                            type: 'get',
                                                                            success: function () {

                                                                            }
                                                                        });
                                                                        $(this).html('Stop');
                                                                        alert('Streaming is started');
                                                                    } else {
                                                                        $.ajax({
                                                                            url: '<?php echo base_url(); ?>index.php?admin/start_stop_streaming/' + current_multicast_session + '/' + current_milticast_status,
                                                                            type: 'get',
                                                                            success: function () {

                                                                            }
                                                                        });
                                                                        $(this).html('Start');
                                                                        alert('Streaming is stopped');
                                                                    }
                                                                })

                                                                // start and stop

                                                                var start_stop_status = 'stop';
                                                                startStopButton.setAttribute('data-sessionid', session.sessionid);

                                                                startStopButton.onclick = function () {
                                                                    $('#streamname').val(session.sessionid);
                                                                    startStopButton.setAttribute('status', start_stop_status);
                                                                    var current_status = $(this).attr('status');
                                                                    var video_session_id = $(this).attr('data-sessionid');

                                                                    if (current_status == 'stop') {
                                                                        start_stop_status = 'start';
                                                                        $(this).html('Stop');
                                                                        // update streaming to 1

                                                                    } else if (current_status == 'start') {
                                                                        start_stop_status = 'stop';

                                                                        $.ajax({
                                                                            url: '<?php echo base_url(); ?>index.php?video_streaming/in_active_streaming/' + video_session_id,
                                                                            type: 'post',
                                                                            success: function () {
                                                                                //alert('Video stream is stopped.');
                                                                            }
                                                                        })
                                                                        $(this).html('Start');
                                                                        // update streaming to 0
                                                                        //$('#myModal').modal('hide');
                                                                    }
                                                                    //this.disabled = true;

                                                                    /*var sessionid = this.getAttribute('data-sessionid');
                                                                     session = sessions[sessionid];
                                                                     
                                                                     if (!session)
                                                                     throw 'No such session exists.';
                                                                     
                                                                     connection.join(session);*/
                                                                };
                                                            };

                                                            var videosContainer = document.getElementById('videos-container') || document.body;
                                                            var roomsList = document.getElementById('rooms-list');

                                                            document.getElementById('setup-new-broadcast').onclick = function () {
                                                                this.disabled = true;

                                                                connection.open(document.getElementById('broadcast-name').value || 'Anonymous');
                                                            };

                                                            // setup signaling to search existing sessions
                                                            connection.connect();

                                                            (function () {
                                                                var uniqueToken = document.getElementById('unique-token');
                                                                if (uniqueToken)
                                                                    if (location.hash.length > 2)
                                                                        uniqueToken.parentNode.parentNode.parentNode.innerHTML = '';
                                                                    else
                                                                        uniqueToken.innerHTML = uniqueToken.parentNode.parentNode.href = '#' + (Math.random() * new Date().getTime()).toString(36).toUpperCase().replace(/\./g, '-');
                                                            })();

                                                            function scaleVideos() {
                                                                var videos = document.querySelectorAll('video'),
                                                                        length = videos.length,
                                                                        video;

                                                                var minus = 130;
                                                                var windowHeight = 700;
                                                                var windowWidth = 600;
                                                                var windowAspectRatio = windowWidth / windowHeight;
                                                                var videoAspectRatio = 4 / 3;
                                                                var blockAspectRatio;
                                                                var tempVideoWidth = 0;
                                                                var maxVideoWidth = 0;

                                                                for (var i = length; i > 0; i--) {
                                                                    blockAspectRatio = i * videoAspectRatio / Math.ceil(length / i);
                                                                    if (blockAspectRatio <= windowAspectRatio) {
                                                                        tempVideoWidth = videoAspectRatio * windowHeight / Math.ceil(length / i);
                                                                    } else {
                                                                        tempVideoWidth = windowWidth / i;
                                                                    }
                                                                    if (tempVideoWidth > maxVideoWidth)
                                                                        maxVideoWidth = tempVideoWidth;
                                                                }
                                                                for (var i = 0; i < length; i++) {
                                                                    video = videos[i];
                                                                    if (video)
                                                                        video.width = maxVideoWidth - minus;
                                                                }
                                                            }


                                                            window.onresize = scaleVideos;
                                        </script>

                                    </article>
                                    <!-- commits.js is useless for you! -->
                                    <script src="//cdn.webrtc-experiment.com/commits.js" async>
                                    </script>


                                    <!--End page-->

                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->

                        </div>
                    </div>
                </div>
            </div>              
        </div>
        <!-- row --> 
    </div>



    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Live Streaming Setup</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group" id="private-broadcast-course">
                            <label class="col-sm-3 control-label">Stream Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="streamname" name="streamname" readonly=""/>
                            </div>
                        </div>

                        <div class="form-group" id="private-broadcast-course">
                            <label class="col-sm-3 control-label">Course</label>
                            <div class="col-sm-5">
                                <select id="course" class="form-control" name="private-broadcast-course">
                                    <option value="all">All Course</option>
                                    <?php foreach ($course as $row) { ?>
                                        <option value="<?php echo $row->course_id; ?>"><?php echo $row->c_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="private-broadcast-semester">
                            <label class="col-sm-3 control-label">Semester</label>
                            <div class="col-sm-5">
                                <select id="semester" class="form-control" name="private-broadcast-course">
                                    <option value="all">All Semester</option>
                                    <?php foreach ($semester as $row) { ?>
                                        <option value="<?php echo $row->s_id; ?>"><?php echo $row->s_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-5">
                                <select id="stream_status" name="stream_status" class="form-control">
                                    <option value="1">Start</option>
                                    <option value="0">Stop</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button id="start_new_broadcast" class="btn btn-success">Setup New Broadcast</button>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="close_model" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // start multicast
        $(document).ready(function () {
            $('.startmulticast').on('click', function () {
                var session_id = $(this).attr('session_id');
                $('#streamname').val(session_id);
            });
        })
    </script>
    <script>
        // assign broadcast
        $(document).ready(function () {
            // modal on load
            $('#myModal').on('load', function () {
                var stream_name = $('#streamname').val();
                var stream_status = $('#' + stream_name + 'btn').html();
                if (stream_status == 'Start') {
                    $('#myModal').modal('hide');
                    $('#close_model').click();
                }
            })
            $('#start_new_broadcast').on('click', function () {
                $('#myModal').modal('hide');
                var stream_name = $('#streamname').val();
                //var stream_status = $('#stream_status').val();
                //alert(stream_name);
                // form data
                var formdata = {
                    title: $('#streamname').val(),
                    course: $('#course').val(),
                    semester: $('#semester').val(),
                    is_active: $('#stream_status').val()
                };
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?video_streaming/assign_live_stream',
                    type: 'post',
                    data: formdata,
                    success: function () {
                        alert('Live stream is successfully updated.');
                        //
                    }
                })
                //var stream_status = $('#stream_status').val();               

            })

            $('#close_model').on('click', function () {
                var stream_name = $('#streamname').val();
                $('#' + stream_name + 'btn').html('Start');
            })
        });
    </script>



    <script>
        $(document).ready(function () {
            var current_url = window.location.href;
            var result = current_url.split("#");

            if (result.length != 2) {
                // show course                
                $('#private-broadcast-course').css('display', 'none');
                $('#private-broadcast-semester').css('display', 'none');
                $('#private-broadcast-degree').css('display', 'none');
                $('#private-broadcast-batch').css('display', 'none');

            } else {
                $('.multicast').css('display', 'none');
            }
            $('#setup-new-broadcast').on('click', function () {
                if (result.length == 2) {
                    // private
                    // insert via ajax
                    var form_data = {
                        title: $('#broadcast-name').val(),
                        course: $('#course').val(),
                        semester: $('#semester').val(),
                        url_link: result[1]
                    };
                    console.log(form_data);
                    $.ajax({
                        url: '<?php echo base_url(); ?>index.php?video_streaming/create_private_broadcast',
                        type: 'post',
                        data: form_data,
                        success: function () {
                            alert('live streaming is created');
                        }
                    })
                } else {
                    // broadcast
                    var form_data = {
                        title: $('#broadcast-name').val(),
                        course: 'all',
                        semester: 'all',
                        url_link: result[1]
                    };
                    console.log(form_data);
                    $.ajax({
                        url: '<?php echo base_url(); ?>index.php?video_streaming/create_private_broadcast',
                        type: 'post',
                        data: form_data,
                        success: function () {
                            alert('live streaming is created');
                        }
                    })
                }
            })

        })
    </script>

    <script>
        $(document).ready(function () {
            //course by degree
            $('#degree').on('change', function () {
                var course_id = $('#course').val();
                var degree_id = $(this).val();

                //remove all present element
                $('#course').find('option').remove().end();
                $('#course').append('<option value="">Select</option>');
                var degree_id = $(this).val();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/course_list_from_degree/' + degree_id,
                    type: 'get',
                    success: function (content) {
                        var course = jQuery.parseJSON(content);
                        $.each(course, function (key, value) {
                            $('#course').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                        })
                    }
                })
                batch_from_degree_and_course(degree_id, course_id);
            });

            //batch from course and degree
            $('#course').on('change', function () {
                var degree_id = $('#degree').val();
                var course_id = $(this).val();
                batch_from_degree_and_course(degree_id, course_id);
            })

            //find batch from degree and course
            function batch_from_degree_and_course(degree_id, course_id) {
                //remove all element from batch
                $('#batch').find('option').remove().end();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/batch_list_from_degree_and_course/' + degree_id + '/' + course_id,
                    type: 'get',
                    success: function (content) {
                        $('#batch').append('<option value="">Select</option>');
                        var batch = jQuery.parseJSON(content);
                        console.log(batch);
                        $.each(batch, function (key, value) {
                            $('#batch').append('<option value=' + value.b_id + '>' + value.b_name + '</option>');
                        })
                    }
                })
            }

        })
    </script>
