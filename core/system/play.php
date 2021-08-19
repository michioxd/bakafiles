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
        $main_path = ROOT_DIR . "/" . urldecode($_GET['dir']);
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
// if (strpos(mime_content_type($main_path), "video") !== true or strpos(mime_content_type($main_path), "audio") == false) {
//     echo "Error: This file is not an video/audio file! >_< - đây khum phải là file video hoặc audio :<";
//     exit();
// }
?>
<script src="plugins/jstag/jsmediatags.min.js"></script>
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
<h4 style="margin:20px"><?php echo basename($main_path); ?><p style="color:gray !important;font-weight:bold;margin:7px;float:right;font-size:12px">FILE SIZE: <?php echo load_file_size($main_path); ?></p>
</h4>
<?php

if (strpos(mime_content_type($main_path), "video") !== false) {
 ?>
    <video style="width:100%;border:none" controls autoplay>
        <source type="video/mp4" src="<?php echo "http://" . $_SERVER['SERVER_NAME'] . BASEDIR . "/" . $dirb; ?>">
    </video>
<?php } elseif(strpos(mime_content_type($main_path), "audio") !== false) { ?>
    <div id="audioInfo" style="display: none;">
        <img src="assets/music-album.svg" id="artwork">
        <div class="i4">
            <p id="title"><span class="material-icons">list_alt</span>Title: </p>
            <p id="artist"><span class="material-icons">person</span>Artist: </p>
            <p id="album"><span class="material-icons">album</span>Album: </p>
        </div>
    </div>
    <audio src="<?php echo "http://" . $_SERVER['SERVER_NAME'] . BASEDIR . "/" . $dirb; ?>" controls autoplay></audio>
    <div id="nonArtwork">Icons made by <a href="https://www.flaticon.com/authors/prettycons" title="prettycons">prettycons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
    <script>
        $('document').ready(function() {
            var encode = function(d,a,e,b,c,f) {
                c="";
                for(a=e=b=0;a<4*d.length/3;f=b>>2*(++a&3)&63,c+=String.fromCharCode(f+71-(f<26?6:f<52?0:f<62?75:f^63?90:87))+(75==(a-1)%76?"\r\n":""))a&3^3&&(b=b<<8^d[e++]);
                for(;a++&3;)c+="=";
                return c
            };
            var jsmediatags = window.jsmediatags;
            jsmediatags.read("<?php echo "http://" . $_SERVER['SERVER_NAME'] . BASEDIR . "/" . $dirb; ?>", {
                onSuccess: function(result) {
                    var mediaTitle = result.tags.title;
                    var mediaArtist = result.tags.artist;
                    var mediaAlbum = result.tags.album;
                    var mediaArtwork = result.tags.picture;
                    if(mediaTitle || mediaArtist) {
                        $('#audioInfo').css("display","flex");
                        $('#audioInfo #title').append(mediaTitle);
                        $('#audioInfo #artist').append(mediaArtist);
                        $('#audioInfo #album').append(mediaAlbum);
                        if(mediaArtwork !== "undefined") {
                            const { data, format } = mediaArtwork;
                            $('#audioInfo #artwork').attr("src", "data:" + format + ";base64," + encode(data));
                            $('#nonArtwork').css("display", "none");
                        }
                    }
                }
            });
        });
    </script>
    <?php } else { ?>
        this is not an audio/video file :<< đây hum phải là file VIDEO or AUDIO :v 
        <?php } ?>
<script src="js/page.js"></script>