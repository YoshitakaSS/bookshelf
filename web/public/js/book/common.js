var $navBar = $('.nav-bar');
var $menu = $('.header-menu');

$navBar.on('click', function(){
    if ($(this).hasClass('fa-bars')) {
        $(this).removeClass('fa-bars');
        $(this).addClass('fa-times');

        $menu.slideDown();
    } else {
        $(this).removeClass('fa-times');
        $(this).addClass('fa-bars');

        $menu.slideUp();
    }
});

window.addEventListener('load', function lazy() {
    [].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
        img.setAttribute('src', img.getAttribute('data-src'));
        img.onload = function() {
            img.removeAttribute('data-src');
        };
    });
    window.removeEventListener('scroll', lazy);
});
