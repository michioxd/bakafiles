/*               bakafiles >~<
            by Michio Nakano (michio.xd)

    License: GNU GENERAL PUBLIC LICENSE (GPL)

      https://github.com/michioxd/bakafiles

File: main.js
*/
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function delete_cookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function dark__mode() {
    if (document.querySelector(".dark__mode").checked === true) {
        $('head').append('<link class="dark__css" rel="stylesheet" href="css/dark.css">');
        setCookie("darkmode", 1, 999999);
    } else {
        $('.dark__css').remove();
        delete_cookie("darkmode");
    }
}

function blur__mode() {
    if (document.querySelector(".blur__mode").checked === true) {
        $('head').append('<link class="blur__css" rel="stylesheet" href="css/blur.css">');
        setCookie("blurmode", 1, 999999);
    } else {
        $('.blur__css').remove();
        delete_cookie("blurmode");
    }
}
if (getCookie("darkmode") === "1") {
    document.querySelector(".dark__mode").checked = true;
    $('head').append('<link class="dark__css" rel="stylesheet" href="css/dark.css">');
}
if (getCookie("blurmode") === "1") {
    document.querySelector(".blur__mode").checked = true;
    $('head').append('<link class="blur__css" rel="stylesheet" href="css/blur.css">');
}