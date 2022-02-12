/*
 Template Name: Foxia - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Dashboard js
 */

!function ($) {
    "use strict";

    var Dashboard = function () {
    };
        
        //creates Stacked chart
        Dashboard.prototype.createStackedChart  = function(element, data, xkey, ykeys, labels, lineColors) {
            Morris.Bar({
                element: element,
                data: data,
                xkey: xkey,
                ykeys: ykeys,
                stacked: true,
                labels: labels,
                hideHover: 'auto',
                resize: true, //defaulted to true
                gridLineColor: '#eeeeee',
                barColors: lineColors
            });
        },

        //creates Donut chart
        Dashboard.prototype.createDonutChart = function (element, data, colors) {
            Morris.Donut({
                element: element,
                data: data,
                resize: true,
                colors: colors,
            });
        },

        // pie
        $('.peity-pie').each(function () {
            $(this).peity("pie", $(this).data());
        });

        //donut
        $('.peity-donut').each(function () {
            $(this).peity("donut", $(this).data());
        });

        // line
        $('.peity-line').each(function () {
            $(this).peity("line", $(this).data());
        });


        Dashboard.prototype.init = function () {

            //creating Stacked chart
            var $stckedData  = [
                { y: '2008', a: 45, b: 180, c: 100 },
                { y: '2009', a: 75,  b: 65, c: 80 },
                { y: '2010', a: 100, b: 90, c: 56 },
                { y: '2011', a: 75,  b: 65, c: 89 },
                { y: '2012', a: 100, b: 90, c: 120 },
                { y: '2013', a: 75,  b: 65, c: 110 },
                { y: '2014', a: 50,  b: 40, c: 85 },
                { y: '2015', a: 75,  b: 65, c: 52 },
                { y: '2016', a: 50,  b: 40, c: 77 },
                { y: '2017', a: 75,  b: 65, c: 90 },
                { y: '2018', a: 100, b: 90, c: 130 }
            ];
            this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b', 'c'], ['Desktops', 'Tablets', 'Mobiles'], ['#1699dd', '#655be6', '#ebeff2']);



            //creating donut chart
            var $donutData = [
                {label: "Marketing", value: 12},
                {label: "Online", value: 42},
                {label: "Offline", value: 20}
            ];
            this.createDonutChart('morris-donut-example', $donutData, ['#f0f1f4', '#655be6', '#1699dd']);

          
        },
        //init
        $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.Dashboard.init();
    }(window.jQuery);