<?php
/*               bakafiles >~<
            by Michio Nakano (michio.xd)

    License: GNU GENERAL PUBLIC LICENSE (GPL)

      https://github.com/michioxd/bakafiles

File: sys.php
*/
ini_set('max_execution_time', 0);
ini_set('post_max_size', '100000000');
ini_set('upload_max_filesize', '100000000');
if (file_exists(__DIR__ . '/../../../bakafiles-this_is-your_config.php')) {

    include(__DIR__ . '/../../../bakafiles-this_is-your_config.php');
} else {
    include __DIR__ . '/../../ui/error/no-config.php';
    exit();
}
if (isset($SS_USERNAME) == false and isset($SS_PASSWORD) == false) {
    require __DIR__ . '/../../ui/u/first_setup.php';
    exit();
}
if (isset($_COOKIE['bkf_token']) !== true) {
    setcookie('bkf_token', null, -1, '/');
    require __DIR__ . '/../../ui/u/login.php';
    exit();
} else {
    $__get_udata = json_decode(base64_decode(base64_decode($_COOKIE['bkf_token'])));
    if ($__get_udata->uu_username != $SS_USERNAME or $__get_udata->uu_password != md5($SS_PASSWORD)) {
        setcookie('bkf_token', null, -1, '/');
        header("Location: " . $_SERVER['REQUEST_URI'] . "");
        exit();
    }
}
if (isset($_GET['logout'])) {
    setcookie('bkf_token', null, -1, '/');
    echo 'Logged out!';
    exit();
}
define("VERSION_BKF", "v0.3");
define("VERSION", "0.3");
include __DIR__ . '/update_core/server.php';
$_get_update = file_get_contents(UPDATE_SERVER);
if ($_get_update == null) {
    $__uversion = "2";
} else {
    if (version_compare(VERSION, $_get_update) >= 0) {
        $__uversion = "0";
    } else {
        $__uversion = "1";
    }
}
function mime_mdicon($dir)
{
    if (mime_content_type($dir) == "directory") {
        echo "folder";
    } elseif (strpos(mime_content_type($dir), "text/") !== false) {
        echo "description";
    } elseif (strpos(mime_content_type($dir), "image/") !== false) {
        echo "image";
    } elseif (strpos(mime_content_type($dir), "audio/") !== false) {
        echo "library_music";
    } elseif (strpos(mime_content_type($dir), "video/") !== false) {
        echo "movie";
    } elseif (strpos(mime_content_type($dir), "font/") !== false) {
        echo "format_size";
    } elseif (mime_content_type($dir) == "application/pdf") {
        echo "picture_as_pdf";
    } else {
        echo "insert_drive_file";
    }
}
function load_image_b64($path)
{
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    return 'data:image/' . $type . ';base64,' . base64_encode($data);
}
function load_file_size($path)
{
    if (mime_content_type($path) == "directory") {
        return "baka dir >~<";
    } else {
        $size = filesize($path);
        $units = array('Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB');
        $res = @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $units[$i];
        if ($res == "NAN Bytes") {
            return "0 Bytes";
        } else {
            return $res;
        }
    }
}
if (isset($_POST['dir_del'], $_POST['del_last_dir']) == true) {
    if (file_exists(urldecode($_POST['dir_del']))) {
        deleteDirectory(urldecode($_POST['dir_del']));
        echo '<script>alert("Xóa cmn thành cmn công :)))\ndel your dir complete\nフォルダを完全に削除します\n\n bakafiles");cload("core/system/dir.php?dir=' . $_POST['del_last_dir'] . '");</script>';
    } else {
        echo '<script>alert("Tệp không tồn tại :<\nFile not found :<\nファイルが見つかりません\n\n bakafiles")</script>';
    }
    clearstatcache();
    exit();
}
if (isset($_POST['dir_f_del']) == true) {
    if (file_exists(urldecode($_POST['dir_f_del']))) {
        unlink(urldecode($_POST['dir_f_del']));
        echo '<script>alert("Xóa tệp cmn thành cmn công :)))\ndel your file complete\nあなたのファイルを削除完了\n\n bakafiles");cload("core/system/dir.php?dir=' . $_POST['del_last_dir'] . '");</script>';
    } else {
        echo '<script>alert("Tệp không tồn tại :<\nFile not found :<\nファイルが見つかりません\n\n bakafiles")</script>';
    }
    exit();
}
if (isset($_POST['cre_new_f'], $_POST['cre_new_f_dir'], $_POST['cre_new_f_last_dir'])) {
    if ($_POST['cre_new_f'] == null) {
        echo '<script>alert("Vui lòng nhập tên file :<\nPlease enter file name :<\nファイル名を入力してください\n\n bakafiles")</script>';
    } else {
        $uri = urldecode($_POST['cre_new_f_dir'] . "/" . $_POST['cre_new_f']);
        $loadfile = fopen($uri, "w") or die('<script>alert("Không thể tạo file :<\nCouldn\'t create new file :<\n新しいファイルを作成できませんでした\n\n bakafiles")</script>');
        fclose($loadfile);
        echo '<script>alert("Đã tạo file!\nCreated file!\n作成したファイル\n\n bakafiles");cload("core/system/dir.php?dir=' . $_POST['cre_new_f_last_dir'] . '");</script>';
    }
}
if (isset($_POST['cre_new_dir'], $_POST['cre_new_dir_dir'], $_POST['cre_new_dir_last_dir'])) {
    if ($_POST['cre_new_dir'] == null) {
        echo '<script>alert("Vui lòng nhập tên folder :<\nPlease enter folder name :<\nフォルダ名を入力してください\n\n bakafiles")</script>';
    } else {
        $uri = urldecode($_POST['cre_new_dir_dir'] . "/" . $_POST['cre_new_dir']);
        mkdir($uri, 0777) or die('<script>alert("Không thể tạo folder :<\nCouldn\'t create new folder :<\新しいフォルダを作成できませんでした\n\n bakafiles")</script>');
        echo '<script>alert("Đã tạo folder!\nCreated folder!\作成したフォルダ!\n\n bakafiles");cload("core/system/dir.php?dir=' . $_POST['cre_new_dir_last_dir'] . '");</script>';
    }
}
function deleteDirectory($dir)
{
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}
// if (isset($_FILES['file'], $_POST['upload_dir'])) {
//     if ($_FILES['file'] == null) {
//         echo 'Vui lòng chọn file :<\nPlease select a file :<\n\n bakafiles';
//     } elseif (0 < $_FILES['file']['error']) {
//         echo 'Lỗi/error: ' . $_FILES['file']['error'] . '\n\n bakafiles';
//     } else {
//         move_uploaded_file($_FILES['file']['tmp_name'], urldecode($_POST['upload_dir']) . "/" . $_FILES['file']['name']);
//         echo "Đã up thành công! - Uploaded!";
//     }
// }
if (!empty($_FILES) and isset($_GET['upload__dir']) == true) {
    $temp_file = $_FILES['file']['tmp_name'];
    $location = urldecode($_GET['upload__dir']) . "/" . $_FILES['file']['name'];
    move_uploaded_file($temp_file, $location);
}

if (isset($_GET['download'], $_GET['dird'])) {
    $file__dir = $_GET['dird'];
    if (strpos(mime_content_type(ROOT_DIR . "/" . $file__dir), "image/") === false) {
        echo "Error: This file is not an image! >_< - đây khum phải là file ảnh :<";
    } else {
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($file__dir) . "\"");
        readfile(ROOT_DIR . "/" . $file__dir);
        exit;
    }
}
if (isset($_POST['save__in_file'], $_POST['save__content'])) {
    $file__dir = urldecode($_POST['save__in_file']);
    $file__content = urldecode($_POST['save__content']);
    $file__wipe = fopen($file__dir, "w");
    fclose($file__wipe);
    file_put_contents($file__dir, $file__content);
}
