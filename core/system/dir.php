<?php
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
if(substr_count($dirb, "//") > 0) {
    $dirb = str_replace("//", "", $dirb);
}
$all__files = scandir($main_path);
$all__files = array_diff(scandir($main_path), array('.', '..'));
function loadFileDir($file, $ROOT, $dirb)
{
    if($ROOT == true) {
        $rd = ROOT_DIR . "/";
    } else {
        $rd = null;
    }
    if (isset($dirb)) {
        if ($dirb !== "/" or $dirb !== null) {
            if($file == null) {
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
?>

<script src="js/function.js"></script>
<div class="overlay" id="main-dir_new-file-overlay"></div>
<div class="mdl-card fixed-dialog mdl-shadow--2dp" id="main-dir_new-file-dialog">
    <div class="bar">
        <p style="float: left;font-weight: bold;font-size: 20px;margin: 5px;">Create new file</p>
        <button style="float: right;" id="main-dir_new-file-closeb" class="mdl-button mdl-js-button mdl-button--icon">
            <i class="material-icons">close</i>
        </button>
    </div>
    <div class="mdl-dialog__content">
        Bạn vui lòng nhập tên file vào - Please enter file name!
        <label style="width: 100%;" class="pure-material-textfield-filled">
            <input placeholder="" type="text" class="main-dir_new-file_input">
            <span>Tên file - name file - 名前のファイル</span>
        </label>
    </div>
    <div class="mdl-card__actions mdl-card--border">
        <button class="main-dir_new-file_cre mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">
            Create now! <div class="rippleJS"></div>
        </button>
        <button id="main-dir_new-file-close" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            Cancel <div class="rippleJS"></div>
        </button>
    </div>
</div>

<div class="overlay" id="main-dir_new-dir-overlay"></div>
<div class="mdl-card fixed-dialog mdl-shadow--2dp" id="main-dir_new-dir-dialog">
    <div class="bar">
        <p style="float: left;font-weight: bold;font-size: 20px;margin: 5px;">Create new folder</p>
        <button style="float: right;" id="main-dir_new-dir-closeb" class="mdl-button mdl-js-button mdl-button--icon">
            <i class="material-icons">close</i>
        </button>
    </div>
    <div class="mdl-dialog__content">
        Bạn vui lòng nhập tên folder vào - Please enter folder name!
        <label style="width: 100%;" class="pure-material-textfield-filled">
            <input placeholder="" type="text" class="main-dir_new-dir_input">
            <span>Tên file - name file - 名前のファイル</span>
        </label>
    </div>
    <div class="mdl-card__actions mdl-card--border">
        <button class="main-dir_new-dir_cre mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">
            Create now! <div class="rippleJS"></div>
        </button>
        <button id="main-dir_new-dir-close" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            Cancel <div class="rippleJS"></div>
        </button>
    </div>
</div>

<div class="overlay" id="main-dir_upload-file-overlay"></div>
<div class="mdl-card fixed-dialog mdl-shadow--2dp" style="width: 100%;" id="main-dir_upload-file-dialog">
    <div class="bar">
        <p style="float: left;font-weight: bold;font-size: 20px;margin: 5px;">Upload file</p>
        <button style="float: right;" id="main-dir_upload-file-closeb" class="mdl-button mdl-js-button mdl-button--icon">
            <i class="material-icons">close</i>
        </button>
    </div>
    <div class="progresss">
        <div class="progress__indeterminate"></div>
    </div>
    <div class="mdl-dialog__content">
        <!-- Nhấn để chọn file - click to select file
        <label style="width: 100%;" class="pure-material-textfield-filled">
            <input placeholder="" type="file" class="main-dir_upload-file_input">
            <span>Your file</span>
        </label> -->
        <div class="upload__inner">
            <div class="ui_drop">
                <form action="core/system/kernel/sys.php?upload__dir=<?php echo loadFileDir(null, false, $dirb);?>" class="dropzone" id="DropzoneFrom">
                </form>
            </div>
        </div>
    </div>
    <div class="mdl-card__actions mdl-card--border">
        <button class="main-dir_upload-file_up mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored">
            Upload now! <div class="rippleJS"></div>
        </button>
        <button id="main-dir_upload-file-close" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            Cancel <div class="rippleJS"></div>
        </button>
    </div>
</div>

<div class="dir-badge mdl-card mdl-shadow--2dp">
    <?php
    if (isset($dirb) && $dirb !== "/") {
        if ($dirb !== null && $dirb !== "") { ?>
            <button class="link-click mdl-button mdl-js-button mdl-js-ripple-effect" data-href="core/system/dir.php<?php
                                                                                                                        $___fetch_dir = explode("/", urldecode($dirb));
                                                                                                                        array_pop($___fetch_dir);
                                                                                                                            if($___fetch_dir != null) {
                                                                                                                                echo "?dir=";
                                                                                                                            }
                                                                                                                            foreach ($___fetch_dir as $BACK_DIR) {
                                                                                                                                if(count($___fetch_dir) > 1) {
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
<div class="main-dir-control">
    <button class="link-click mdl-button mdl-js-button mdl-button--raised mdl-button--colored" data-href="core/system/dir.php<?php if (isset($dirb)) {
                                                                                                                                        echo "?dir=" . urlencode($dirb);
                                                                                                                                    } ?>">
        <span class="material-icons">
            refresh
        </span> Refresh <div class="rippleJS"></div>
    </button>
    <button id="main-dir_upload-file-open" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        <span class="material-icons">upload_file</span> Upload files <div class="rippleJS"></div>
    </button>
    <button id="main-dir_new-file-open" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        <span class="material-icons">add_box</span> New files <div class="rippleJS"></div>
    </button>
    <button id="main-dir_new-dir-open" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        <span class="material-icons">create_new_folder</span> New folder <div class="rippleJS"></div>
    </button>
</div>
<div class="main-dir-tab">
    <?php if ($all__files != null) { ?>
        <table class="mdl-data-table  mdl-shadow--2dp">
            <thead>
                <tr>
                    <th style="width:50px"></th>
                    <th class="mdl-data-table__cell--non-numeric">Name</th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $xnum = 0;
                foreach ($all__files as $file) { ?>
                    <tr>
                        <td <?php if (mime_content_type($main_path . '/' . $file) == "directory") { ?>class="link-click" data-href="core/system/dir.php?dir=<?php echo loadFileDir($file, false, $dirb);?>" <?php  } ?>><span class="material-icons"><?php echo mime_mdicon($main_path . '/' . $file); ?></span></td>
                        <td <?php if (mime_content_type($main_path . '/' . $file) == "directory") { ?> data-href="core/system/dir.php?dir=<?php echo loadFileDir($file, false, $dirb);?>" <?php  } ?> class="link-click mdl-data-table__cell--non-numeric"><?php echo $file; ?></td>
                        <td <?php if (mime_content_type($main_path . '/' . $file) == "directory") { ?>class="link-click" data-href="core/system/dir.php?dir=<?php echo loadFileDir($file, false, $dirb);?>" <?php  } ?>><?php echo mime_content_type($main_path . '/' . $file); ?></td>
                        <td>
                            <?php echo load_file_size($main_path . '/' . $file); ?>
                        </td>
                        <td>
                            <?php
                            if (strpos(mime_content_type($main_path . '/' . $file), "text/") !== false or strpos(mime_content_type($main_path . '/' . $file), "application/x-empty") !== false) { ?>
                                <button class="link-click mdl-button mdl-js-button mdl-js-ripple-effect" data-href="core/system/editor.php?dir=<?php echo loadFileDir($file, false, $dirb);?>">
                                    <span class=" material-icons">
                                        edit
                                    </span>
                                    <div class="rippleJS"></div>
                                </button>
                            <?php
                            } elseif (strpos(mime_content_type($main_path . '/' . $file), "video/") !== false) { ?>
                                <button class="link-click mdl-button mdl-js-button mdl-js-ripple-effect" data-href="core/system/play.php?dir=<?php echo loadFileDir($file, false, $dirb);?>">
                                    <span class="material-icons">
                                        play_arrow
                                    </span>
                                    <div class="rippleJS"></div>
                                </button>
                            <?php } elseif (strpos(mime_content_type($main_path . '/' . $file), "image/") !== false) { ?>
                                <button class="link-click mdl-button mdl-js-button mdl-js-ripple-effect" data-href="core/system/preview.php?dir=<?php echo loadFileDir($file, false, $dirb);?>">
                                    <span class="material-icons">
                                        perm_media
                                    </span>
                                    <div class="rippleJS"></div>
                                </button>
                            <?php } ?>
                            <button class="rename-fileid-<?php echo $xnum; ?> mdl-button mdl-js-button mdl-js-ripple-effect" data-file="<?php echo loadFileDir($file, true, $dirb);?>">
                                <span class="material-icons">
                                    drive_file_rename_outline
                                </span>
                                <div class="rippleJS"></div>
                            </button>
                            <script>
                                $('.rename-fileid-<?php echo $xnum; ?>').click(function() {
                                    var newName = prompt("Vui lòng nhập tên mới, please enter new name!", "<?php echo $file; ?>");
                                    if (newName === "<?php echo $file; ?>") {
                                        alert("Tên cũ rồi không đổi cho đâu :v - u have entered old name :<");
                                    } else {
                                        var dir = $(this).attr('data-file');
                                        $.ajax({
                                            method: "POST",
                                            url: "core/system/kernel/sys.php",
                                            data: {
                                                rename__file: dir,
                                                newname: newName,
                                                currentDir: "<?php echo loadFileDir(null, false, $dirb);?>"
                                            },
                                            beforeSend: function() {
                                                $(".progress").css("display", "block");
                                            },
                                            success: function(data) {
                                                $(".progress").css("display", "none");
                                                $('body').append(data);
                                            }
                                        });
                                    }
                                });
                            </script>
                            <button class="mdl-button mdl-js-button <?php if (mime_content_type($main_path . '/' . $file) == "directory") {
                                                                        echo "del-dir-" . $xnum;
                                                                    } else {
                                                                        echo "del-file-" . $xnum;
                                                                    } ?> mdl-js-ripple-effect" data-file="<?php echo loadFileDir($file, true, $dirb);?>">
                                <span class="material-icons">
                                    delete_outline
                                </span>
                                <div class="rippleJS"></div>
                            </button>
                        </td>
                    </tr>
                    <script>
                        <?php if (mime_content_type($main_path . '/' . $file) == "directory") { ?>
                            $('.del-dir-<?php echo $xnum; ?>').click(function() {
                                var dir = $(this).attr('data-file');
                                if (confirm("Bạn có muốn cho ra đi cái folder này khum??\nAre u sure to del this folder?\nこのフォルダを削除しますか\n\nbakafiles")) {
                                    $.ajax({
                                        method: "POST",
                                        url: "core/system/kernel/sys.php",
                                        data: {
                                            dir_del: dir,
                                            del_last_dir: "<?php echo loadFileDir(null, false, $dirb);?>"
                                        },
                                        beforeSend: function() {
                                            $(".progress").css("display", "block");
                                        },
                                        success: function(data) {
                                            $(".progress").css("display", "none");
                                            $('body').append(data);
                                        }
                                    });
                                }
                            });
                        <?php } else { ?>
                            $('.del-file-<?php echo $xnum; ?>').click(function() {
                                var dir = $(this).attr('data-file');
                                if (confirm("Bạn có muốn cho ra đi cái file này khum?\nAre u sure to del this file?\nこのファイルを削除しますか\n\n bakafiles")) {
                                    $.ajax({
                                        method: "POST",
                                        url: "core/system/kernel/sys.php",
                                        data: {
                                            dir_f_del: dir,
                                            del_last_dir: "<?php echo loadFileDir(null, false, $dirb);?>"
                                        },
                                        beforeSend: function() {
                                            $(".progress").css("display", "block");
                                        },
                                        success: function(data) {
                                            $(".progress").css("display", "none");
                                            $('.logger').html(data);
                                        }
                                    });
                                }
                            });
                        <?php } ?>
                    </script>
                <?php $xnum++;
                } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div style="text-align:center">
            <span style="font-size: 140px;" class="material-icons">
                warning
            </span>
            <h4>This dir is empty :((</h4>
        </div>
    <?php  } ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.js"></script>
<script>
    function load_uploader() {
        var load_drz = new Dropzone("form#DropzoneFrom", {
            autoProcessQueue: false,
            parallelUploads: 10,
            init: function() {
                var submitButton = document.querySelector('.main-dir_upload-file_up');
                myDropzone = this;
                submitButton.addEventListener("click", function() {
                    myDropzone.processQueue();
                });
                this.on("complete", function(file) {
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                        cload("core/system/dir.php?dir=<?php echo loadFileDir(null, false, $dirb);?>");
                    }
                });
            },

        });
    }
    load_uploader();
    $('.main-dir_new-file_cre').click(function() {
        var file = $('.main-dir_new-file_input').val();
        $.ajax({
            method: "POST",
            url: "core/system/kernel/sys.php",
            data: {
                cre_new_f: file,
                cre_new_f_dir: "<?php echo loadFileDir(null, true, $dirb);?>",
                cre_new_f_last_dir: "<?php echo loadFileDir(null, false, $dirb);?>"
            },
            beforeSend: function() {
                $(".progress").css("display", "block");
                $("#main-dir_new-file-dialog").css("animation", "close_fixed 0.3s");
                $('#main-dir_new-file-overlay').css("animation", "fadecl 0.3s");
                setTimeout(function() {
                    $("#main-dir_new-file-dialog").css("display", "none");
                    $('#main-dir_new-file-overlay').css("display", "none");
                }, 280);
            },
            success: function(data) {
                $(".progress").css("display", "none");
                $('.logger').html(data);
            }

        })
    })
    $('.main-dir_new-dir_cre').click(function() {
        var file = $('.main-dir_new-dir_input').val();
        $.ajax({
            method: "POST",
            url: "core/system/kernel/sys.php",
            data: {
                cre_new_dir: file,
                cre_new_dir_dir: "<?php echo loadFileDir(null, true, $dirb);?>",
                cre_new_dir_last_dir: "<?php echo loadFileDir(null, true, $dirb);?>"
            },
            beforeSend: function() {
                $(".progress").css("display", "block");
                $("#main-dir_new-dir-dialog").css("animation", "close_fixed 0.3s");
                $('#main-dir_new-dir-overlay').css("animation", "fadecl 0.3s");
                setTimeout(function() {
                    $("#main-dir_new-dir-dialog").css("display", "none");
                    $('#main-dir_new-dir-overlay').css("display", "none");
                }, 280);
            },
            success: function(data) {
                $(".progress").css("display", "none");
                $('.logger').html(data);
            }

        })
    });

    function rename_file(main_dir, old_file) {

    }
</script>
<script src="js/dir_ui.js"></script>
<script src="js/page.js"></script>