<?php
/*               bakafiles >~<
            by Michio Nakano (michio.xd)

    License: GNU GENERAL PUBLIC LICENSE (GPL)

      https://github.com/michioxd/bakafiles

File: play.php
*/
require __DIR__ . '/kernel/sys.php';
if (isset($_GET['dir'])) {
    if (file_exists(ROOT_DIR . "/" . $_GET['dir']) == false) { ?>
        <div style="text-align:center">
            <span style="font-size: 140px;" class="material-icons">
                warning
            </span>
            <h4>This dir is empty :((</h4>
        </div>
    <?php } else {

    ?>
        <div class="dir-badge mdl-card mdl-shadow--2dp">
            <?php
            if (isset($_GET['dir'])) {
                if ($_GET['dir'] != "/" or $_GET['dir'] != null) { ?>
                    <button class="link-click mdl-button mdl-js-button mdl-js-ripple-effect" data-href="core/system/dir.php?dir=<?php echo urlencode($_GET['dir'] . "/.."); ?>" style="float: left;">
                        <span class="material-icons">
                            arrow_back_ios
                        </span>
                        <div class="rippleJS"></div>
                    </button>
            <?php }
            } ?>
            <a class="inndeexx link-click" data-href="core/system/dir.php" href="#"><i class="material-icons">home</i> (home) /</a>
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
        <video style="width:100%;border:none">
            <source type="video/mp4" src="<?php echo "/" . $_GET['dir']; ?>">
        </video>
        <script src="js/page.js"></script>
<?php }
}
