<?php
/*               bakafiles >~<
            by Michio Nakano (michio.xd)

    License: GNU GENERAL PUBLIC LICENSE (GPL)

      https://github.com/michioxd/bakafiles

File: no-config.php (onii-chan, kousei fairu wa doko ni arimasu ka??>~<)
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lỗi - Error - 誤差 - bakafiles</title>
    <link rel="stylesheet" href="assets/font/GoogleSans/main.css">
    <link rel="stylesheet" href="assets/font/MaterialIcons/main.css">
    <link rel="stylesheet" href="plugins/mdl/material.min.css">
    <script src="plugins/mdl/material.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <script src="plugins/jquery/jquery-3.6.0.min.js"></script>
    <style>
        .mdl-card {
            position: fixed;
            width: 500px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body class="main">
    <div class="mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Lỗi - Error - 誤差</h2>
        </div>
        <div class="mdl-card__supporting-text">
            Không thể tìm thấy file config, bạn hãy thử tạo lại file <b>bakafiles-this_is-your_config.php</b> nhé!<br>
            Couldn't found the config file, u should try create file <b>bakafiles-this_is-your_config.php</b> in your bakafiles main directory!<br>
            ファイル<b>bakafiles-this_is-your_config.php</b>が見つかりませんでした。メインディレクトリに再作成してください。<br><br>
            <center>&copy;2021 bakafiles</center>
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <a href="" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                Refresh
            </a>
        </div>
    </div>
</body>
<script>
    let matched = window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (matched) {
        $(".main").append("<style>* {color: #fff!important}body {background-color: #121212;}.mdl-card {background-color: #202020;} </style>");
    }
</script>

</html>