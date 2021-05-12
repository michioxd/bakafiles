function open_dialog(id, overlay) {
    document.getElementById(id).style.animation = "open_fixed 0.3s";
    document.getElementById(overlay).style.animation = "fade 0.3s";
    document.getElementById(id).style.display = "block";
    document.getElementById(overlay).style.display = "block";
}

function open_dialog(id, overlay) {
    document.getElementById(id).style.animation = "close_fixed 0.3s";
    document.getElementById(overlay).style.animation = "fadecl 0.3s";
    setTimeout(function() {
        document.getElementById(id).style.display = "none";
        document.getElementById(overlay).style.display = "none";
    }, 280);
}