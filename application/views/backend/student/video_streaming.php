<div class="vd_content-wrapper" style="min-height: 8px;">
    <div class="vd_head-section clearfix"></div>
    <!--<hr/>-->
    <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1>Live Streaming</h1>
        </div>
    </div>
    <div class="vd_banner vd_bg-white clearfix pd-20">
        <div class="container">
            <div class="vd_content clearfix">
                <div class="row">           
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
                                width: 30%;
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
                                <div class="form-horizontal" style="display: none;">
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
                                <table style="width: 100%;" id="rooms-list" class="table table-bordered"></table>

                                <!-- local/remote videos container -->
                                <div id="videos-container"></div>
                            </section>

                            <script>

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
                                    tr.innerHTML = '<td><strong>' + session.sessionid + '</strong> is sharing his webcam in one-way direction!</td>' +
                                            '<td><button class="join">View His Webcam</button></td>';
                                    roomsList.insertBefore(tr, roomsList.firstChild);

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
                                    this.disabled = true;

                                    connection.open(document.getElementById('broadcast-name').value || 'Anonymous');
                                };

                                // setup signaling to search existing sessions
                                connection.connect();

                                (function () {
                                    var uniqueToken = document.getElementById('unique-token');
                                    if (uniqueToken)
                                        if (location.hash.length > 2)
                                            uniqueToken.parentNode.parentNode.parentNode.innerHTML = '<h2 style="text-align:center;"><a href="' + location.href + '" target="_blank">Share this link</a></h2>';
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
            </div>
        </div>
    </div>
</div>