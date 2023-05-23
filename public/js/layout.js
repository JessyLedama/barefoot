jQuery(document).ready(function ($) {

    $('nav > .clearfix.desktop #invest-in').hover(function () {
        $('#invest-in-dropdown').toggleClass('drop');
    });

    $('nav > .clearfix.desktop #more').hover(function () {
        $('nav > .clearfix.desktop #more-dropdown').toggleClass('drop');
    });

    $('#side-menu #invest-in').click(function () {
        $('#side-menu #invest-in-dropdown').toggleClass('drop');
    });

    $('#side-menu #more').click(function () {
        $('#side-menu #more-dropdown').toggleClass('drop');
    });

    $('#mobile-navicon').click(function () {
        $('#side-menu').toggleClass('drop');
    });

    $('#mobile-search').click(function () {
        $('nav > .clearfix.mobile form').toggleClass('drop');
    });
});