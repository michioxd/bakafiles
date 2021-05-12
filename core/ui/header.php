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
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">bakafiles</span>
                <div class="mdl-layout-spacer"></div>
            </div>
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
            </div>
            <h6 style="margin:0;font-size: 12px;color:gray !important;float: left;margin-left: 10px;">ABOUT</h6>
            <div class="nav-settings">
                <h5 style="margin:0;margin-left: 10px;width:calc(100% - 20px)">bakafiles <?php echo VERSION; ?></h5>
                <span style="font-size: 12px;font-weight:lighter;display:block"><?php echo VERSION; ?> - Licensed GPL v3.0</span>
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