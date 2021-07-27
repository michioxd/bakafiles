/*               bakafiles >~<
            by Michio Nakano (michio.xd)

    License: GNU GENERAL PUBLIC LICENSE (GPL)

      https://github.com/michioxd/bakafiles

File: page.js
*/
$('.link-click').click(function() {
    var href = $(this).attr('data-href');
    $('.boot').css("animation", "fadecl 0.3s");
    setTimeout(function() {
        $('.boot').remove();
        $('.main__bkf').append('<div class="boot"></div>');
        $(document).ajaxStart(function() {
            $(".progress").css("display", "block");
            $('.boot').css('display', 'none');
        });
        $(document).ajaxSuccess(function() {
            $(".progress").css("display", "none");
            $('.boot').css('display', 'block');
            $('.boot').css("animation", "fade 0.3s");
        });
        $('.boot').load(href);
    }, 280);
});

function cload(page) {
    $('.boot').load(page);
}