/*               bakafiles >~<
            by Michio Nakano (michio.xd)

    License: GNU GENERAL PUBLIC LICENSE (GPL)

      https://github.com/michioxd/bakafiles

File: dir_ui.js
*/
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