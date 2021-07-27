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
    $dirb = urldecode($_GET['dir']);
    if ($dirb == "/") {
        $dirb = "";
    }
} else {
    $main_path = ROOT_DIR . "/";
    $dirb = null;
}
if (substr_count($dirb, "//") > 0) {
    $dirb = str_replace("//", "", $dirb);
}
function loadFileDir($file, $ROOT, $dirb)
{
    if ($ROOT == true) {
        $rd = ROOT_DIR . "/";
    } else {
        $rd = null;
    }
    if (isset($dirb)) {
        if ($dirb !== "/" or $dirb !== null) {
            if ($file == null) {
                $ra = urldecode($dirb);
            } else {
                $ra = urldecode($dirb . "/");
            }
        }
    } else {
        $ra = null;
    }
    $res = $rd . $ra . urldecode($file);
    return $res;
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
    if (isset($dirb) && $dirb !== "/") {
        if ($dirb !== null && $dirb !== "") { ?>
            <button class="link-click mdl-button mdl-js-button mdl-js-ripple-effect" data-href="core/system/dir.php<?php
                                                                                                                    $___fetch_dir = explode("/", urldecode($dirb));
                                                                                                                    array_pop($___fetch_dir);
                                                                                                                    if ($___fetch_dir != null) {
                                                                                                                        echo "?dir=";
                                                                                                                    }
                                                                                                                    foreach ($___fetch_dir as $BACK_DIR) {
                                                                                                                        if (count($___fetch_dir) > 1) {
                                                                                                                            echo "/" . $BACK_DIR;
                                                                                                                        } else {
                                                                                                                            echo $BACK_DIR;
                                                                                                                        }
                                                                                                                    }
                                                                                                                    ?>" style="float: left;">
                <span class="material-icons">
                    arrow_back_ios
                </span>
                <div class="rippleJS"></div>
            </button>
    <?php }
    } ?>
    <a class="inndeexx link-click" data-href="core/system/dir.php" href="#"><i class="material-icons">home</i> (root)<?php if ($dirb !== "") {
                                                                                                                            echo "/";
                                                                                                                        } ?></a>
    <?php
    if (isset($dirb) && $dirb !== "/") {
        if ($dirb !== "/" or $dirb !== null) {
            $fetch__dir = explode("/", $dirb);
            foreach ($fetch__dir as $dir_badge) { ?>
                <a><?php echo $dir_badge . "/"; ?></a>
    <?php }
        }
    } ?>
</div>
<?php
if (strpos(mime_content_type($main_path), "video/") === false) {
    echo "Error: This file is not an video! >_< - đây khum phải là file video :<";
} else { ?>
    <video style="width:100%;border:none" controls autoplay>
        <source type="video/mp4" src="<?php echo "/" . $dirb; ?>">
    </video>
<?php } ?>
<script src="js/page.js"></script>