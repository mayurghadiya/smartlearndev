
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
                                                    <label class="col-sm-3 control-label">Course*</label>
                                                    <div class="col-sm-5">
                                                        <select id="degree" class="form-control" name="private-broadcast-degree">
                                                            <option value="">Select</option>
                                                            <?php foreach ($degree as $row) { ?>
                                                                <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label style="display:none; color: red" id="degree_error"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="private-broadcast-course">
                                                    <label class="col-sm-3 control-label">Branch*</label>
                                                    <div class="col-sm-5">
                                                        <select id="course" class="form-control" name="private-broadcast-course">
                                                            <option value="">Select</option>
                                                        </select>
                                                        <label style="display:none; color: red" id="course_error"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="private-broadcast-batch">
                                                    <label class="col-sm-3 control-label">Batch*</label>
                                                    <div class="col-sm-5">
                                                        <select id="batch" class="form-control" name="private-broadcast-batch">
                                                            <option value="">Select</option>
                                                        </select>
                                                        <label style="display:none; color: red" id="batch_error"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="private-broadcast-semester">
                                                    <label class="col-sm-3 control-label">Semester*</label>
                                                    <div class="col-sm-5">
                                                        <select id="semester" class="form-control" name="private-broadcast-course">
                                                            <option value="">Select</option>
                                                            <?php foreach ($semester as $row) { ?>
                                                                <option value="<?php echo $row->s_id; ?>"><?php echo $row->s_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label style="display:none; color: red" id="sem_error"></label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Live Broadcast*</label>
                                                    <div class="col-sm-5">
                                                        <input id="broadcast-name" type="text" class="form-control" placeholder="live streaming for all batch and course" name="title"/>
                                                        <label style="display:none; color: red" id="name_error"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-5">
                                                        <button id="setup-new-broadcast" class="btn btn-success">Start Streaming</button>
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
                                            <table style="width: 100%;" id="rooms-list" border="1">
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Course</th>
                                                    <th>Semester</th>
                                                    <th>Action</th>
                                                </tr>
                                            </table>

                                            <!-- local/remote videos container -->
                                            <div id="videos-container"></div>
                                        </section>

                                        <script>
                                            var video_session_id = '';
                                            var streaming_session = '';
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
                                                var session_course = localStorage.getItem(session.sessionid + 'course');
                                                var session_semester = localStorage.getItem(session.sessionid + 'semester');

                                                //ajax semester
                                                $.ajax({
                                                    url: '<?php echo base_url(); ?>index.php?sub_admin/get_semetser_detail/' + session_semester,
                                                    type: 'get',
                                                    success: function (content) {
                                                        session_semester = content;
                                                    }
                                                })
                                                //var current_sess_course = '';
                                                //ajax for course
                                                $.ajax({
                                                    url: '<?php echo base_url(); ?>index.php?sub_admin/get_course_details/' + session_course,
                                                    type: 'get',
                                                    async: false,
                                                    success: function (content) {
                                                        tr.innerHTML = '<td><strong>' + session.sessionid + '</strong></td>' +
                                                                '<td>' + content + '</td>' +
                                                                '<td>' + session_semester + '</td>' +
                                                                '<td><button class="join">View</button></td>';
                                                        roomsList.appendChild(tr);
                                                    }
                                                });
                                                //alert(current_sess_course);
                                                //tr.innerHTML = '<td><strong>' + session.sessionid + '</strong>' + content + ' is sharing his webcam in one-way direction!</td>' +
                                                //        '<td><button class="join">View Streaming</button></td>';
                                                //roomsList.insertBefore(tr, roomsList.firstChild);
                                                video_session_id = session.sessionid;

                                                var joinRoomButton = tr.querySelector('.join');
                                                joinRoomButton.setAttribute('data-sessionid', session.sessionid);
                                                joinRoomButton.onclick = function () {
                                                    this.disabled = true;

                                                    var sessionid = this.getAttribute('data-sessionid');
                                                    $('<label class="stream_title" style="margin-left: 110px;">' + sessionid + '</label>').insertBefore('#videos-container');
                                                    session = sessions[sessionid];

                                                    if (!session)
                                                        throw 'No such session exists.';

                                                    connection.join(session);
                                                };
                                            };

                                            var videosContainer = document.getElementById('videos-container') || document.body;
                                            var roomsList = document.getElementById('rooms-list');

                                            document.getElementById('setup-new-broadcast').onclick = function () {

                                                //broadcast
                                                var current_url = window.location.href;
                                                var result = current_url.split("#");

                                                if (result.length == 2) {
                                                    //multicast
                                                    if (!multicast_validation()) {
                                                        return false;
                                                    }
                                                } else {
                                                    if (!validate_streaming()) {
                                                        return false;
                                                    }
                                                }
                                                this.disabled = true;


                                                connection.open(document.getElementById('broadcast-name').value || 'Anonymous');
                                                streaming_session = $('#broadcast-name').val();
                                                localStorage.setItem(streaming_session + 'course', $('#course').val());
                                                localStorage.setItem(streaming_session + 'semester', $('#semester').val());

                                                //alert(sessions['course']);
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
                                                //streaming_session = $('#unique-token').html();
                                                //alert(streaming_session);
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
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>

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

                                                }
                                                $('#setup-new-broadcast').on('click', function () {

                                                    if (result.length == 2) {
                                                        if (!multicast_validation())
                                                            return false;
                                                        // private
                                                        // insert via ajax
                                                        var form_data = {
                                                            title: $('#broadcast-name').val(),
                                                            degree: $('#degree').val(),
                                                            course: $('#course').val(),
                                                            batch: $('#batch').val(),
                                                            semester: $('#semester').val(),
                                                            url_link: result[1]
                                                        };
                                                        $.ajax({
                                                            url: '<?php echo base_url(); ?>index.php?video_streaming/create_private_broadcast',
                                                            type: 'post',
                                                            data: form_data,
                                                            success: function () {
                                                                console.log(form_data);
                                                                alert('live streaming is created');
                                                            }
                                                        })
                                                    } else {
                                                        if (!validate_streaming())
                                                            return false;
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
                    url: '<?php echo base_url(); ?>index.php?video_streaming/course_list_from_degree/' + degree_id,
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
                    url: '<?php echo base_url(); ?>index.php?video_streaming/batch_list_from_degree_and_course/' + degree_id + '/' + course_id,
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

    <script>
        function validate_streaming() {
            var name = $('#broadcast-name').val();
            if (name == '') {
                $('#name_error').css('display', 'inline');
                $('#name_error').text('Please enter broadcast name');
                return false;
            } else {
                $('#name_error').css('display', 'none');
                $('#name_error').text('');
                return true;
            }
        }

        function multicast_validation() {
            var name = $('#broadcast-name').val();
            var degree = $('#degree').val();
            var course = $('#course').val();
            var batch = $('#batch').val();
            var sem = $('#semester').val();

            if (degree == '') {
                $('#degree_error').css('display', 'inline');
                $('#degree_error').text('Please select degree');
                return false;
            } else {
                $('#degree_error').css('display', 'none');
                $('#degree_error').text('');
                //return true;
            }

            if (course == '') {
                $('#course_error').css('display', 'inline');
                $('#course_error').text('Please select course');
                return false;
            } else {
                $('#course_error').css('display', 'none');
                $('#course_error').text('');
                //return true;
            }

            if (batch == '') {
                $('#batch_error').css('display', 'inline');
                $('#batch_error').text('Please select batch');
                return false;
            } else {
                $('#batch_error').css('display', 'none');
                $('#batch_error').text('');
                //return true;
            }

            if (sem == '') {
                $('#sem_error').css('display', 'inline');
                $('#sem_error').text('Please select semester');
                return false;
            } else {
                $('#sem_error').css('display', 'none');
                $('#sem_error').text('');
                //return true;
            }

            if (name == '') {
                $('#name_error').css('display', 'inline');
                $('#name_error').text('Please enter broadcast name');
                return false;
            } else {
                $('#name_error').css('display', 'none');
                $('#name_error').text('');
                return true;
            }
        }
    </script>

