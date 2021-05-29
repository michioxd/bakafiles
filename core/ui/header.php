<?php
/*               bakafiles >~<
            by Michio Nakano (michio.xd)

    License: GNU GENERAL PUBLIC LICENSE (GPL)

      https://github.com/michioxd/bakafiles

File: header.php (UI Headerrrrrr)

Material Design Lite - © Google, 2015. Licensed under an Apache-2 license. (https://getmdl.io)
jQuery - MIT License (https://jquery.com)
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bakafiles</title>
    <link rel="stylesheet" href="assets/font/GoogleSans/main.css">
    <link rel="stylesheet" href="assets/font/MaterialIcons/main.css">
    <link rel="stylesheet" href="plugins/mdl/material.min.css">
    <script src="plugins/mdl/material.min.js"></script>
    <script src="plugins/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/additional.css">
    <link rel="stylesheet" href="dark.css">
    <script src="js/function.js"></script>
</head>

<body>
    <div class="progress">
        <div class="progress__indeterminate"></div>
    </div>
    <div class="logger"></div>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">bakafiles</span>
                <div class="mdl-layout-spacer"></div>
                <?php if ($__uversion == "1") { ?>
                    <div class="update">
                        <button id="tt3" style="float: right;" class="mdl-button mdl-js-button mdl-button--icon">
                            <span class="material-icons">
                                system_update_alt
                            </span>
                            <div class="rippleJS"></div>
                        </button>
                        <div class="mdl-tooltip" data-mdl-for="tt3">
                            A new version of bakafiles!
                        </div>
                    </div>
                    <div class="overlay" id="update-dialog-o"></div>
                    <div class="mdl-card fixed-dialog mdl-shadow--2dp" id="update-dialog">
                        <div class="bar">
                            <p style="float: left;font-weight: bold;font-size: 20px;margin: 5px;">Update</p>
                            <button style="float: right;" id="update-dialog-close" class="mdl-button mdl-js-button mdl-button--icon">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <div class="mdl-dialog__content">
                            Đã có phiên bản mới, bạn có mún update khum? - A new version of bakafile is ready, do u want to update?<br>
                            Current version: <?php echo VERSION_BKF; ?><br>
                            New version: <?php echo $_get_update; ?>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <button class="update-dialog-up mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">
                                Update!
                            </button>
                            <button id="update-dialog-closeb" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Dismiss
                            </button>
                        </div>
                    </div>
                    <script>
                        $('#tt3').click(function() {
                            $("#update-dialog").css("animation", "open_fixed 0.3s");
                            $('#update-dialog-o').css("animation", "fade 0.3s");
                            $("#update-dialog").css("display", "block");
                            $('#update-dialog-o').css("display", "block");
                        })

                        $('#update-dialog-closeb').click(function() {
                            $("#update-dialog").css("animation", "close_fixed 0.3s");
                            $('#update-dialog-o').css("animation", "fadecl 0.3s");
                            setTimeout(function() {
                                $("#update-dialog").css("display", "none");
                                $('#update-dialog-o').css("display", "none");
                            }, 280);
                        });
                        $('#update-dialog-close').click(function() {
                            $("#update-dialog").css("animation", "close_fixed 0.3s");
                            $('#update-dialog-o').css("animation", "fadecl 0.3s");
                            setTimeout(function() {
                                $("#update-dialog").css("display", "none");
                                $('#update-dialog-o').css("display", "none");
                            }, 280);
                        });
                        $('#update-dialog-o').click(function() {
                            $("#update-dialog").css("animation", "close_fixed 0.3s");
                            $('#update-dialog-o').css("animation", "fadecl 0.3s");
                            setTimeout(function() {
                                $("#update-dialog").css("display", "none");
                                $('#update-dialog-o').css("display", "none");
                            }, 280);
                        });
                    </script>
                <?php } ?>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">bakafiles</span>
            <h6 style="margin:0;font-size: 12px;color:gray !important;float: left;margin-left: 10px;">SETTINGS</h6>
            <div class="nav-settings">
                <div class="nav-settings__content">
                    <h5 style="float: left;margin:0">Dảk mode<span style="font-size: 12px;font-weight:lighter;display:block">Darkmode for night :))</span></h5>
                    <label onclick="dark__mode();" style="float: right;margin: 5px 15px 0px 0px;width:fit-content" class="dakmd mdl-switch mdl-js-switch mdl-js-ripple-effect" for="darkmode">
                        <input type="checkbox" id="darkmode" class="dark__mode mdl-switch__input">
                        <span class="mdl-switch__label"></span>
                    </label>
                    <div class="rippleJS"></div>
                </div>
                <div class="nav-settings__content">
                    <h5 style="float: left;margin:0">Blur<span style="font-size: 12px;font-weight:lighter;display:block">Blur overlay,..etc, note: low-end will lag :v</span></h5>
                    <label onclick="blur__mode();" style="float: right;margin: 5px 15px 0px 0px;width:fit-content" class="dakmd mdl-switch mdl-js-switch mdl-js-ripple-effect" for="blurmode">
                        <input type="checkbox" id="blurmode" class="blur__mode mdl-switch__input">
                        <span class="mdl-switch__label"></span>
                    </label>
                    <div class="rippleJS"></div>
                </div>
                <div class="nav-settings__content">
                    <h5 style="float: left;margin:0">Update<span style="font-size: 12px;font-weight:lighter;display:block">Check update for more new function!</span></h5>
                    <div class="rippleJS"></div>
                </div>
            </div>
            <h6 style="margin:0;font-size: 12px;color:gray !important;float: left;margin-left: 10px;">ABOUT</h6>
            <div class="nav-settings">
                <h5 style="margin:0;margin-left: 10px;width:calc(100% - 20px)">bakafiles <?php echo VERSION_BKF; ?></h5>
                <span style="font-size: 12px;font-weight:lighter;display:block"><?php echo VERSION_BKF; ?> - Licensed GPL v3.0</span>
                <div onclick="window.open('https://github.com/michioxd/bakafiles')" class="nav-settings__content">
                    <h5 style="float: left;margin:0">Github<span style="font-size: 12px;font-weight:lighter;display:block">Fork me on Github :3</span></h5>
                    <div class="rippleJS"></div>
                </div>
                <div onclick="window.open('https://fb.com/michio.xd')" class="nav-settings__content">
                    <h5 style="float: left;margin:0">my Facebook<span style="font-size: 12px;font-weight:lighter;display:block">my fb profile :))</span></h5>
                    <div class="rippleJS"></div>
                </div>
            </div>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content main__bkf">
                <div class="boot"></div>