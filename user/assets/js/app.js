/*
 Template Name: Foxia - Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Main js
 */


!function($) {
    "use strict";

    var MainApp = function() {};

    MainApp.prototype.intSlimscrollmenu = function () {
        $('.slimscroll-menu').slimscroll({
            height: 'auto',
            position: 'right',
            size: "5px",
            color: '#9ea5ab',
            wheelStep: 5,
            touchScrollStep: 50
        });
    },
    MainApp.prototype.initSlimscrollnoti = function () {
        $('.slimscroll-noti').slimscroll({
            height: '208px',
            position: 'right',
            size: "5px",
            color: '#98a6ad',
            wheelStep: 10
        });
    },

    MainApp.prototype.initMetisMenu = function () {
        //metis menu
        $("#side-menu").metisMenu();
    },

    MainApp.prototype.initLeftMenuCollapse = function () {
        // Left menu collapse
        $('.button-menu-mobile').on('click', function (event) {
            event.preventDefault();
            $("body").toggleClass("enlarged");
        });
    },

    MainApp.prototype.initEnlarge = function () {
        if ($(window).width() < 1025) {
            $('body').addClass('enlarged');
        } else {
            $('body').removeClass('enlarged');
        }
    },

    MainApp.prototype.initActiveMenu = function () {
        // === following js will activate the menu in left side bar based on url ====
        $("#sidebar-menu a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().addClass("in");
                $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(this).parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().addClass("in"); // add active to li of the current link
                $(this).parent().parent().parent().parent().parent().addClass("active");
            }
        });
    },

    MainApp.prototype.Preloader = function () {
        $(window).on('load', function() {
            $('#status').fadeOut();
            $('#preloader').delay(350).fadeOut('slow');
            $('body').delay(350).css({
                'overflow': 'visible'
            });
        });
    },

    MainApp.prototype.initComponents = function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
    },

    MainApp.prototype.initToggleSearch = function () {
        $('.toggle-search').on('click', function () {
            var targetId = $(this).data('target');
            var $searchBar;
            if (targetId) {
                $searchBar = $(targetId);
                $searchBar.toggleClass('open');
            }
        });
    },


    MainApp.prototype.init = function () {
        this.intSlimscrollmenu();
        this.initSlimscrollnoti();
        this.initMetisMenu();
        this.initLeftMenuCollapse();
        this.initEnlarge();
        this.initActiveMenu();
        this.Preloader();
        this.initComponents();
        this.initToggleSearch();
    },

    //init
    $.MainApp = new MainApp, $.MainApp.Constructor = MainApp
}(window.jQuery),

//initializing
function ($) {
    "use strict";
    $.MainApp.init();
}(window.jQuery);