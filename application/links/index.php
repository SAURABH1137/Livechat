<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Live Chat</title>
        <?php
            session_start();
            $hostname = getenv('HTTP_HOST');
            include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");
            echo "
                <link rel='shortcut icon' href='http://$hostname/livechat/img/fav-icon.png' type='image/x-icon'>
                <link rel='stylesheet' href='http://$hostname/livechat/css/style.css'>
                <link rel='stylesheet' href='http://$hostname/livechat/css/cstyle.css'>
                <script src='http://$hostname/livechat/javascript/javascript.js'></script>
                <script src='http://$hostname/livechat/javascript/bootstrap.js'></script>
                <script src='http://$hostname/livechat/javascript/jquery.js'></script>
                <script src='http://$hostname/livechat/javascript/sweet.js'></script>
                <script src='http://$hostname/livechat/javascript/cjquery.js'></script>
            ";
        ?>
    </head>
    <body>
</body>
</html>