<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <title>Larrizo</title>

    <link href = "/media/css/reset.css" rel = "stylesheet" type = "text/css">
    <link href = "/media/css/countdown.css" rel = "stylesheet" type = "text/css">

    <script src = "http://code.jquery.com/jquery-1.11.0.min.js" type = "text/javascript"></script>
    <script src = "/media/js/countdown.min.js" type = "text/javascript"></script>
    <script src = "/media/js/modernizr.custom.js" type = "text/javascript"></script>
    <script src = "/media/js/landingpage.js" type = "text/javascript"></script>
</head>
<body>

<div id = "container">
    <h1><img src = "/media/images/logo.png" title = "Larrizo" alt = "Larrizo" style = "height: 75px;"></h1>

    <h2>Feel your best online shopping experience in:</h2>

    <div id = "countdown">
        <div class = "countdown">
            <div class = "circle">
                <canvas id = "days" width = "408" height = "408"></canvas>
                <div class = "circle__values">
                    <span class = "ce-digit ce-days"></span>
                    <span class = "ce-label ce-days-label"></span>
                </div>
            </div>
            <div class = "circle">
                <canvas id = "hours" width = "408" height = "408"></canvas>
                <div class = "circle__values">
                    <span class = "ce-digit ce-hours"></span>
                    <span class = "ce-label ce-hours-label"></span>
                </div>
            </div>
            <div class = "circle">
                <canvas id = "minutes" width = "408" height = "408"></canvas>
                <div class = "circle__values">
                    <span class = "ce-digit ce-minutes"></span>
                    <span class = "ce-label ce-minutes-label"></span>
                </div>
            </div>
            <div class = "circle">
                <canvas id = "seconds" width = "408" height = "408"></canvas>
                <div class = "circle__values">
                    <span class = "ce-digit ce-seconds"></span>
                    <span class = "ce-label ce-seconds-label"></span>
                </div>
            </div>
        </div>
    </div>

    <div id = "social-media">
        <h3>Meanwhile,</h3>
        <ul>
            <li>
                <a href = "https://www.facebook.com/Larrizo" title = "Larrizo on Facebook" target = "_blank" class = "facebook"></a>
            </li>
            <li>
                <a href = "https://twitter.com/LarrizoOfficial" title = "Larrizo on Twitter" target = "_blank" class = "twitter"></a>
            </li>
            <li>
                <a href = "https://plus.google.com/u/0/b/111966895716811642602/111966895716811642602/posts" title = "Larrizo on G+" target = "_blank" class = "gplus"></a>
            </li>
        </ul>
    </div>

    <?=form_open('/landingpage/subscribe', array('class' => 'form', 'id' => 'newsletter-form'))?>
        <div class = "form-group">
            <div class = "input-group">
                <?=form_input(array('type' => 'email', 'class' => 'form-control', 'name' => 'email'))?>
                  <span class = "input-group-btn">
                    <button class = "btn btn-default" type = "submit">Keep me updated!</button>
                  </span>
            </div>
        </div>
    <?=form_close()?>
</div>

</body>
</html>