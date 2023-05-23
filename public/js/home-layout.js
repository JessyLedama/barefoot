jQuery(document).ready(function ($) {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 10) {
            $('nav').addClass('fix');
            $('.green-blue-logo').css('display', 'inline-block');
            $('.white-logo').css('display', 'none');
        }

        else {
            $('nav').removeClass('fix');
            $('.green-blue-logo').css('display', 'none');
            $('.white-logo').css('display', 'inline-block');
        }
    });

    $('nav > .clearfix.desktop #invest-in').hover(function () {
        $('#invest-in-dropdown').toggleClass('drop');
    });

    $('nav > .clearfix.desktop #more').hover(function () {
        $('nav > .clearfix.desktop #more-dropdown').toggleClass('drop');
    });

    $('nav > .clearfix.desktop #account').hover(function () {
        $('nav > .clearfix.desktop #account-dropdown').toggleClass('drop');
    });

    $('#side-menu #invest-in').click(function () {
        $('#side-menu #invest-in-dropdown').toggleClass('drop');
    });

    $('#side-menu #more').click(function () {
        $('#side-menu #more-dropdown').toggleClass('drop');
    });

    $('#side-menu #account').click(function () {
        $('#side-menu #account-dropdown').toggleClass('drop');
    });

    $('#mobile-navicon').click(function () {
        $('#side-menu').toggleClass('drop');
    });

    $('#mobile-search').click(function () {
        $('nav > .clearfix.mobile form').toggleClass('drop');
    });
});