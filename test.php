<?php
$youtubeLink = "https://www.youtube.com/embed/FN35GHUwNVM"; // เปลี่ยน VIDEO_ID เป็น ID ของวิดีโอที่คุณต้องการแสดง
$overlayImage = "http://localhost/jtest/wp-content/uploads/2024/07/ปกCover-ปกสลาก_10767.png"; // เปลี่ยน path/to/your/overlay-image.jpg เป็น URL ของรูปที่คุณต้องการใช้เป็น overlay image
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video with Overlay</title>
    <style>
        .video-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: auto;
        }
        .video-container iframe {
            width: 100%;
            height: 450px;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('<?php echo $overlayImage; ?>') no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="video-container">
        <div class="overlay" id="video-overlay"></div>
        <iframe id="video" src="<?php echo $youtubeLink; ?>?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <script>
        var player;
        function onYouTubeIframeAPIReady() {
            var iframe = document.getElementById('video');
            player = new YT.Player(iframe, {
                events: {
                    'onStateChange': function(event) {
                        var overlay = document.getElementById('video-overlay');
                        if (event.data === YT.PlayerState.PLAYING) {
                            overlay.style.display = 'none';
                        } else if (event.data === YT.PlayerState.PAUSED || event.data === YT.PlayerState.ENDED) {
                            overlay.style.display = 'flex';
                        }
                    }
                }
            });
        }

        document.getElementById('video-overlay').addEventListener('click', function() {
            player.playVideo();
        });

        // Load the IFrame Player API code asynchronously.
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    </script>
</body>
</html>