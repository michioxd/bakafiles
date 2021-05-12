<?php
if (file_exists(__DIR__ . '/../../../bakafiles-this_is-your_config.php')) {

    include(__DIR__ . '/../../../bakafiles-this_is-your_config.php');
} else {

    include __DIR__ . '/../../ui/error/no-config.php';
    exit();
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
if (isset($_POST['dir_del']) == true) {
    if (file_exists(urldecode($_POST['dir_del']))) {
        rmdir(urldecode($_POST['dir_del']));
        echo '<script>alert("Xóa cmn thành cmn công :)))\ndel your dir complete\nフォルダを完全に削除します\n\n bakafiles");cload("core/system/dir.php");</script>';
    } else {
        echo '<script>alert("Tệp không tồn tại :<\nFile not found :<\nファイルが見つかりません\n\n bakafiles")</script>';
    }
    clearstatcache();
    exit();
}
if (isset($_POST['dir_f_del']) == true) {
    if (file_exists(urldecode($_POST['dir_f_del']))) {
        unlink(urldecode($_POST['dir_f_del']));
        echo '<script>alert("Xóa tệp cmn thành cmn công :)))\ndel your file complete\nあなたのファイルを削除完了\n\n bakafiles");cload("core/system/dir.php");</script>';
    } else {
        echo '<script>alert("Tệp không tồn tại :<\nFile not found :<\nファイルが見つかりません\n\n bakafiles")</script>';
    }
    exit();
}
if (isset($_POST['cre_new_f'], $_POST['cre_new_f_dir'])) {
    if ($_POST['cre_new_f'] == null) {
        echo '<script>alert("Vui lòng nhập tên file :<\nPlease enter file name :<\nファイル名を入力してください\n\n bakafiles")</script>';
    } else {
        $uri = urldecode($_POST['cre_new_f_dir'] . "/" . $_POST['cre_new_f']);
        $loadfile = fopen($uri, "w") or die('<script>alert("Không thể tạo file :<\nCouldn\'t create new file :<\n新しいファイルを作成できませんでした\n\n bakafiles")</script>');
        fclose($loadfile);
        echo '<script>alert("Đã tạo file!\nCreated file!\n作成したファイル\n\n bakafiles");cload("core/system/dir.php?dir=");</script>';
    }
}
