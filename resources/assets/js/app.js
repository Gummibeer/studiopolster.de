import 'lazysizes';
import 'lazysizes/plugins/unveilhooks/ls.unveilhooks';
import $ from 'jquery';
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/scrollspy';
import 'jquery-smooth-scroll';

window.$ = window.jQuery = $;

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