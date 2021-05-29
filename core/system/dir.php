<?php
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
$all__files = scandir($main_path);
$all__files = array_diff(scandir($main_path), array('.', '..'));
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
<div class="mdl-card fixed-dialog mdl-shadow--2dp" id="main-dir_upload-file-dialog">
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
        Nhấn để chọn file - click to select file
        <label style="width: 100%;" class="pure-material-textfield-filled">
            <input placeholder="" type="file" class="main-dir_upload-file_input">
            <span>Your file</span>
        </label>
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
<div class="main-dir-control">
    <button class="link-click mdl-button mdl-js-button mdl-button--raised mdl-button--colored" data-href="core/system/dir.php?dir=<?php if (isset($_GET['dir'])) {
                                                                                                                                        echo urlencode($_GET['dir']);
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
                        <td <?php if (mime_content_type($main_path . '/' . $file) == "directory") { ?>class="link-click" data-href="core/system/dir.php?dir=<?php
                                                                                                                                                            if (isset($_GET['dir'])) {
                                                                                                                                                                if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                                                                                                                                                    echo urlencode($_GET['dir'] . "/");
                                                                                                                                                                }
                                                                                                                                                            }
                                                                                                                                                            echo urlencode($file); ?>" <?php  } ?>><span class="material-icons"><?php echo mime_mdicon($main_path . '/' . $file); ?></span></td>
                        <td <?php if (mime_content_type($main_path . '/' . $file) == "directory") { ?> data-href="core/system/dir.php?dir=<?php
                                                                                                                                            if (isset($_GET['dir'])) {
                                                                                                                                                if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                                                                                                                                    echo urlencode($_GET['dir'] . "/");
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                            echo urlencode($file); ?>" <?php  } ?> class="link-click mdl-data-table__cell--non-numeric"><?php echo $file; ?></td>
                        <td <?php if (mime_content_type($main_path . '/' . $file) == "directory") { ?>class="link-click" data-href="core/system/dir.php?dir=<?php
                                                                                                                                                            if (isset($_GET['dir'])) {
                                                                                                                                                                if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                                                                                                                                                    echo urlencode($_GET['dir'] . "/");
                                                                                                                                                                }
                                                                                                                                                            }
                                                                                                                                                            echo urlencode($file); ?>" <?php  } ?>><?php echo mime_content_type($main_path . '/' . $file); ?></td>
                        <td>
                            <?php echo load_file_size($main_path . '/' . $file); ?>
                        </td>
                        <td>
                            <?php
                            if (strpos(mime_content_type($main_path . '/' . $file), "text/") !== false) { ?>
                                <button class="mdl-button mdl-js-button mdl-js-ripple-effect">
                                    <span class="material-icons">
                                        edit
                                    </span>
                                    Edit <div class="rippleJS"></div>
                                </button>
                            <?php
                            } elseif (strpos(mime_content_type($main_path . '/' . $file), "video/") !== false) { ?>
                                <button class="link-click mdl-button mdl-js-button mdl-js-ripple-effect" data-href="core/system/play.php?dir=<?php if (isset($_GET['dir'])) {
                                                                                                                                                    if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                                                                                                                                        echo urlencode($_GET['dir'] . "/");
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                                echo urlencode($file); ?>">
                                    <span class="material-icons">
                                        play_arrow
                                    </span>
                                    Play <div class="rippleJS"></div>
                                </button>
                            <?php } elseif (strpos(mime_content_type($main_path . '/' . $file), "image/") !== false) { ?>
                                <button class="link-click mdl-button mdl-js-button mdl-js-ripple-effect" data-href="core/system/preview.php?dir=<?php if (isset($_GET['dir'])) {
                                                                                                                                                    if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                                                                                                                                        echo urlencode($_GET['dir'] . "/");
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                                echo urlencode($file); ?>">
                                    <span class="material-icons">
                                        perm_media
                                    </span>
                                    Preview <div class="rippleJS"></div>
                                </button>
                            <?php } ?>
                            <button class="mdl-button mdl-js-button mdl-js-ripple-effect" data-file="<?php echo ROOT_DIR . "/";
                                                                                                        if (isset($_GET['dir'])) {
                                                                                                            if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                                                                                                echo urlencode($_GET['dir'] . "/");
                                                                                                            }
                                                                                                        }
                                                                                                        echo urlencode($file); ?>">
                                <span class="material-icons">
                                    drive_file_rename_outline
                                </span>
                                Rename <div class="rippleJS"></div>
                            </button>
                            <button class="mdl-button mdl-js-button <?php if (mime_content_type($main_path . '/' . $file) == "directory") {
                                                                        echo "del-dir-" . $xnum;
                                                                    } else {
                                                                        echo "del-file-" . $xnum;
                                                                    } ?> mdl-js-ripple-effect" data-file="<?php echo ROOT_DIR . "/";
                                                                                                            if (isset($_GET['dir'])) {
                                                                                                                if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                                                                                                    echo urlencode($_GET['dir'] . "/");
                                                                                                                }
                                                                                                            }
                                                                                                            echo urlencode($file); ?>">
                                <span class="material-icons">
                                    delete_outline
                                </span>
                                Delete <div class="rippleJS"></div>
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
                                            del_last_dir: "<?php echo urlencode($_GET['dir']); ?>"
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
                                            del_last_dir: "<?php echo urlencode($_GET['dir']); ?>"
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
<script>
    $('#main-dir_new-file-open').click(function() {
        $("#main-dir_new-file-dialog").css("animation", "open_fixed 0.3s");
        $('#main-dir_new-file-overlay').css("animation", "fade 0.3s");
        $("#main-dir_new-file-dialog").css("display", "block");
        $('#main-dir_new-file-overlay').css("display", "block");
    })

    $('#main-dir_new-file-overlay').click(function() {
        $("#main-dir_new-file-dialog").css("animation", "close_fixed 0.3s");
        $('#main-dir_new-file-overlay').css("animation", "fadecl 0.3s");
        setTimeout(function() {
            $("#main-dir_new-file-dialog").css("display", "none");
            $('#main-dir_new-file-overlay').css("display", "none");
        }, 280);
    });
    $('#main-dir_new-file-close').click(function() {
        $("#main-dir_new-file-dialog").css("animation", "close_fixed 0.3s");
        $('#main-dir_new-file-overlay').css("animation", "fadecl 0.3s");
        setTimeout(function() {
            $("#main-dir_new-file-dialog").css("display", "none");
            $('#main-dir_new-file-overlay').css("display", "none");
        }, 280);
    });
    $('#main-dir_new-file-closeb').click(function() {
        $("#main-dir_new-file-dialog").css("animation", "close_fixed 0.3s");
        $('#main-dir_new-file-overlay').css("animation", "fadecl 0.3s");
        setTimeout(function() {
            $("#main-dir_new-file-dialog").css("display", "none");
            $('#main-dir_new-file-overlay').css("display", "none");
        }, 280);
    });

    $('#main-dir_new-dir-open').click(function() {
        $("#main-dir_new-dir-dialog").css("animation", "open_fixed 0.3s");
        $('#main-dir_new-dir-overlay').css("animation", "fade 0.3s");
        $("#main-dir_new-dir-dialog").css("display", "block");
        $('#main-dir_new-dir-overlay').css("display", "block");
    })

    $('#main-dir_new-dir-overlay').click(function() {
        $("#main-dir_new-dir-dialog").css("animation", "close_fixed 0.3s");
        $('#main-dir_new-dir-overlay').css("animation", "fadecl 0.3s");
        setTimeout(function() {
            $("#main-dir_new-dir-dialog").css("display", "none");
            $('#main-dir_new-dir-overlay').css("display", "none");
        }, 280);
    });
    $('#main-dir_new-dir-close').click(function() {
        $("#main-dir_new-dir-dialog").css("animation", "close_fixed 0.3s");
        $('#main-dir_new-dir-overlay').css("animation", "fadecl 0.3s");
        setTimeout(function() {
            $("#main-dir_new-dir-dialog").css("display", "none");
            $('#main-dir_new-dir-overlay').css("display", "none");
        }, 280);
    });
    $('#main-dir_new-dir-closeb').click(function() {
        $("#main-dir_new-dir-dialog").css("animation", "close_fixed 0.3s");
        $('#main-dir_new-dir-overlay').css("animation", "fadecl 0.3s");
        setTimeout(function() {
            $("#main-dir_new-dir-dialog").css("display", "none");
            $('#main-dir_new-dir-overlay').css("display", "none");
        }, 280);
    });

    $('#main-dir_upload-file-open').click(function() {
        $("#main-dir_upload-file-dialog").css("animation", "open_fixed 0.3s");
        $('#main-dir_upload-file-overlay').css("animation", "fade 0.3s");
        $("#main-dir_upload-file-dialog").css("display", "block");
        $('#main-dir_upload-file-overlay').css("display", "block");
    })

    $('#main-dir_upload-file-overlay').click(function() {
        $("#main-dir_upload-file-dialog").css("animation", "close_fixed 0.3s");
        $('#main-dir_upload-file-overlay').css("animation", "fadecl 0.3s");
        setTimeout(function() {
            $("#main-dir_upload-file-dialog").css("display", "none");
            $('#main-dir_upload-file-overlay').css("display", "none");
        }, 280);
    });
    $('#main-dir_upload-file-close').click(function() {
        $("#main-dir_upload-file-dialog").css("animation", "close_fixed 0.3s");
        $('#main-dir_upload-file-overlay').css("animation", "fadecl 0.3s");
        setTimeout(function() {
            $("#main-dir_upload-file-dialog").css("display", "none");
            $('#main-dir_upload-file-overlay').css("display", "none");
        }, 280);
    });
    $('#main-dir_upload-file-closeb').click(function() {
        $("#main-dir_upload-file-dialog").css("animation", "close_fixed 0.3s");
        $('#main-dir_upload-file-overlay').css("animation", "fadecl 0.3s");
        setTimeout(function() {
            $("#main-dir_upload-file-dialog").css("display", "none");
            $('#main-dir_upload-file-overlay').css("display", "none");
        }, 280);
    });
    $('.main-dir_new-file_cre').click(function() {
        var file = $('.main-dir_new-file_input').val();
        $.ajax({
            method: "POST",
            url: "core/system/kernel/sys.php",
            data: {
                cre_new_f: file,
                cre_new_f_dir: "<?php echo ROOT_DIR . "/";
                                if (isset($_GET['dir'])) {
                                    if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                        echo urlencode($_GET['dir'] . "/");
                                    }
                                } ?>",
                cre_new_f_last_dir: "<?php if (isset($_GET['dir'])) {
                                            if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                                echo urlencode($_GET['dir'] . "/");
                                            }
                                        } ?>"
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
    $('.main-dir_upload-file_up').on('click', function() {
        var file_data = $('.main-dir_upload-file_input').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('upload_dir', "<?php echo ROOT_DIR . "/";
                                        if (isset($_GET['dir'])) {
                                            if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                                echo urlencode($_GET['dir'] . "/");
                                            }
                                        } ?>");
        form_data.append('up_dir_last', "<?php if (isset($_GET['dir'])) {
                                                if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                                    echo urlencode($_GET['dir'] . "/");
                                                }
                                            } ?>");
        $.ajax({
            url: 'core/system/kernel/sys.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(php_script_response) {
                if (php_script_response.includes("POST Content-Length of") === true) {
                    alert("File nặng quá up íu được hic hic:<\nCannot upload this file - File exceed limit");
                } else {
                    alert("Lỗi có xác định :))\nError: " + php_script_response)
                }
                cload("core/system/dir.php?dir=<?php
                                                if (isset($_GET['dir'])) {
                                                    echo $_GET['dir'] . "/";
                                                } ?>");
            }
        });
    });
    $('.main-dir_new-dir_cre').click(function() {
        var file = $('.main-dir_new-dir_input').val();
        $.ajax({
            method: "POST",
            url: "core/system/kernel/sys.php",
            data: {
                cre_new_dir: file,
                cre_new_dir_dir: "<?php echo ROOT_DIR . "/";
                                    if (isset($_GET['dir'])) {
                                        if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                            echo urlencode($_GET['dir'] . "/");
                                        }
                                    } ?>",
                cre_new_dir_last_dir: "<?php if (isset($_GET['dir'])) {
                                            if ($_GET['dir'] != "/" or $_GET['dir'] != null) {
                                                echo urlencode($_GET['dir'] . "/");
                                            }
                                        } ?>"
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
    })
</script>
<script src="js/page.js"></script>