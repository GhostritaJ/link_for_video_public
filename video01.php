<?php
$youtubeLink = "https://www.youtube.com/embed/FN35GHUwNVM"; // เปลี่ยน VIDEO_ID เป็น ID ของวิดีโอที่คุณต้องการแสดง
$url = "https://www.huaykeys789.com/api-for-get-video/";
$overlayImage = "https://www.huaykeys789.com/wp-content/uploads/2024/07/%E0%B8%9B%E0%B8%81Cover-%E0%B8%9B%E0%B8%81%E0%B8%AA%E0%B8%A5%E0%B8%B2%E0%B8%81160767.png"; // เปลี่ยน path/to/your/overlay-image.jpg เป็น URL ของรูปที่คุณต้องการใช้เป็น overlay image
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
            width: 60%;
            height: 60%;
            background: url('<?php echo $overlayImage; ?>') no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .overlay .play-icon {
            width: 80px;
            height: 80px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .overlay .play-icon::before {
            content: '';
            display: inline-block;
            margin-left: 5px;
            width: 0;
            height: 0;
            border-left: 20px solid white;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
        }
    </style>
</head>
<body>
     <?php
        
     ?>
    <div class="video-container">
        <div class="overlay" id="video-overlay">
            <div class="play-icon"></div>
        </div>
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