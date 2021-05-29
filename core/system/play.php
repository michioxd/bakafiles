<?php
/*               bakafiles >~<
            by Michio Nakano (michio.xd)

    License: GNU GENERAL PUBLIC LICENSE (GPL)

      https://github.com/michioxd/bakafiles

File: play.php
*/
require __DIR__ . '/kernel/sys.php';
if (isset($_GET['dir'])) {
    if ($_GET['dir'] == "/" or $_GET['dir'] == null) {
        $main_path = ROOT_DIR . "/";
    } else {
        $main_path = ROOT_DIR . "/" . $_GET['dir'];
    }
} else {
    $main_path = ROOT_DIR . "/";
}
$all__files = scandir(dirname($main_path, 1));
$all__files = array_diff(scandir(dirname($main_path, 1)), array('.', '..'));
if (strpos(mime_content_type($main_path), "video/") === false) {
    echo "Error: This file is not an video! >_< - đây khum phải là file video :<";
    exit();
}
?>
<div class="dir-badge mdl-card mdl-shadow--2dp">
    <?php
    if (isset($_GET['dir'])) {
        if ($_GET['dir'] != null or $_GET['dir'] != "") { ?>
            <button class="link-click mdl-button mdl-js-button mdl-js-ripple-effect" data-href="core/system/dir.php?dir=<?php
                                                                                                                        if (urlencode(dirname($_GET['dir'], 1)) == "." or $_GET['dir'] == '%2f') {
                                                                                                                            echo "";
                                                                                                                        } else {
                                                                                                                            echo urlencode(dirname($_GET['dir'], 1));
                                                                                                                        } ?>" style="float: left;">
                <span class="material-icons">
                    arrow_back_ios
                </span>
                <div class="rippleJS"></div>
            </button>
    <?php }
    } ?>
    <a class="inndeexx link-click" data-href="core/system/dir.php" href="#"><i class="material-icons">home</i> (root)/</a>
    <?php
    if (isset($_GET['dir'])) {
        if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
            $forrr = explode("/", $_GET['dir']);
            foreach ($forrr as $dir_badge) { ?>
                <a><?php if ($dir_badge != null) {
                        echo str_replace("../", "", $dir_badge . "/");
                    }; ?></a>
    <?php }
        }
    } ?>
</div>
<?php
if (strpos(mime_content_type($main_path), "video/") === false) {
    echo "Error: This file is not an video! >_< - đây khum phải là file video :<";
} else { ?>
    <video style="width:100%;border:none" controls autoplay>
        <source type="video/mp4" src="<?php echo "/" . $_GET['dir']; ?>">
    </video>
<?php } ?>
<script src="js/page.js"></script>