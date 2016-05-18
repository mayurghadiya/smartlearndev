<!--
> Muaz Khan     - github.com/muaz-khan 
> MIT License   - www.webrtc-experiment.com/licence
> Documentation - www.RTCMultiConnection.org
-->
<!DOCTYPE html>
<html lang="en">

<head>    
    <style>
    audio,
    video {
        -moz-transition: all 1s ease;
        -ms-transition: all 1s ease;
        -o-transition: all 1s ease;
        -webkit-transition: all 1s ease;
        transition: all 1s ease;
        vertical-align: top;
        width: 100%;
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
</head>

<body>
    <article>
        
        <!-- just copy this <section> and next script -->
        <section class="experiment">
            <section>
                <span>
                    Private ??
                    <a href="" target="_blank" title="Open this link in new tab. Then your room will be private!">
                       Click Here <code style="display:none;">
                            <strong id="unique-token">#123456789</strong>
                        </code>
                    </a>
                </span>

                <input type="text" id="broadcast-name">
                <button id="setup-new-broadcast" class="setup">Setup New Broadcast</button>
            </section>

            <!-- list of all available broadcasting rooms -->
            <table style="width: 100%;" id="rooms-list"></table>

            <!-- local/remote videos container -->
            <div id="videos-container"></div>
        </section>

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

        connection.onstream = function(e) {
            e.mediaElement.width = 600;
            videosContainer.insertBefore(e.mediaElement, videosContainer.firstChild);
            rotateVideo(e.mediaElement);
            scaleVideos();
        };

        function rotateVideo(mediaElement) {
            mediaElement.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(0deg)';
            setTimeout(function() {
                mediaElement.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(360deg)';
            }, 1000);
        }

        connection.onstreamended = function(e) {
            e.mediaElement.style.opacity = 0;
            rotateVideo(e.mediaElement);
            setTimeout(function() {
                if (e.mediaElement.parentNode) {
                    e.mediaElement.parentNode.removeChild(e.mediaElement);
                }
                scaleVideos();
            }, 1000);
        };

        var sessions = {};
        connection.onNewSession = function(session) {
            if (sessions[session.sessionid]) return;
            sessions[session.sessionid] = session;

            var tr = document.createElement('tr');
            tr.innerHTML = '<td><strong>' + session.sessionid + '</strong> is sharing his webcam in one-way direction!</td>' +
                '<td><button class="join">View His Webcam</button></td>';
            roomsList.insertBefore(tr, roomsList.firstChild);

            var joinRoomButton = tr.querySelector('.join');
            joinRoomButton.setAttribute('data-sessionid', session.sessionid);
            joinRoomButton.onclick = function() {
                this.disabled = true;

                var sessionid = this.getAttribute('data-sessionid');
                session = sessions[sessionid];

                if (!session) throw 'No such session exists.';

                connection.join(session);
            };
        };

        var videosContainer = document.getElementById('videos-container') || document.body;
        var roomsList = document.getElementById('rooms-list');

        document.getElementById('setup-new-broadcast').onclick = function() {
            this.disabled = true;

            connection.open(document.getElementById('broadcast-name').value || 'Anonymous');
        };

        // setup signaling to search existing sessions
        connection.connect();

        (function() {
            var uniqueToken = document.getElementById('unique-token');
            if (uniqueToken)
                if (location.hash.length > 2) uniqueToken.parentNode.parentNode.parentNode.innerHTML = '<h2 style="text-align:center;"><a href="' + location.href + '" target="_blank">Share this link</a></h2>';
                else uniqueToken.innerHTML = uniqueToken.parentNode.parentNode.href = '#' + (Math.random() * new Date().getTime()).toString(36).toUpperCase().replace(/\./g, '-');
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
</body>

</html>