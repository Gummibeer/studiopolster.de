$(window).on('load', () => {
    $('a.smooth').smoothScroll({
        offset: ($('#header').height() * -1),
        scrollTarget: window.location.hash
    });

    $('body').scrollspy({
        target: '#navbar-main-menu',
        offset: $(window).height() * (1/3),
    });
});
