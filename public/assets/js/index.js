$(function() {
    "use strict";

    // progress bars
    $('.progress .progress-bar').progressbar({
            display_text: 'none'
    });

    $('.sparkbar').sparkline('html', { type: 'bar' });

    $('.sparkline-pie').sparkline('html', {
        type: 'pie',
        offset: 90,
        width: '100px',
        height: '100px',
        sliceColors: ['#29bd73', '#182973', '#ffcd55']
    })


    // top products
    var dataStackedBar = {
            labels: ['Q1','Q2','Q3','Q4','Q5'],
            series: [
                [2350,3205,4520,2351,5632],
                [2541,2583,1592,2674,2323],
                [1212,5214,2325,4235,2519],
            ]
    };
    // new Chartist.Bar('#chart-top-products', dataStackedBar, {
    //         height: "255px",
    //         stackBars: true,
    //         axisX: {
    //             showGrid: false
    //         },
    //         axisY: {
    //             labelInterpolationFnc: function(value) {
    //                 return (value / 1000) + 'k';
    //             }
    //         },
    //         plugins: [
    //             Chartist.plugins.tooltip({
    //                 appendToBody: true
    //             }),
    //             Chartist.plugins.legend({
    //                 legendNames: ['Bitcoin', 'NEO', 'ETH']
    //             })
    //         ]
    // }).on('draw', function(data) {
    //         if (data.type === 'bar') {
    //             data.element.attr({
    //                 style: 'stroke-width: 35px'
    //             });
    //         }
    // });


    // notification popup
    if (!localStorage.getItem('theme-template')) {
        // Xóa tất cả các lớp khỏi thẻ <body>
        $('body').removeClass().addClass('theme-orange');
        // Lưu lại vào localStorage
        localStorage.setItem('theme-template', 'theme-orange');
    } else {
        // Nếu localStorage đã chứa giá trị, lấy giá trị và áp dụng lớp cho thẻ <body>
        var savedTheme = localStorage.getItem('theme-template');
        $('body').removeClass().addClass(savedTheme);
    }
    if (!localStorage.getItem('hasShownWelcomeMessage')) {
        // Hiển thị thông báo
        toastr.options.closeButton = true;
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.options.showDuration = 1000;
        toastr['info']('Xin chào , chúc bạn một ngày làm việc vui vẻ .');
    
        // Đánh dấu rằng đã hiển thị thông báo
        localStorage.setItem('hasShownWelcomeMessage', 'true');
    }
    $('#logoutLink').on('click', function() {
        // Xóa mục 'hasShownWelcomeMessage' từ localStorage khi đăng xuất
        localStorage.removeItem('hasShownWelcomeMessage');
    });

    var chart = c3.generate({

        bindto: '#User_Statistics', // id of chart wrapper
        data: {
            columns: [
                // each columns data
                ['data1', 7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3],
                ['data2', 3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3],
                ['data3', 14.2, 10.3, 11.9, 15.2, 17.0, 16.6, 6.6, 4.8, 3.9, 4.2],
            ],

            labels: true,
            type: 'line', // default type of chart
            colors: {
                'data1': hexabit.colors["orange"],
                'data2': hexabit.colors["green"],
                'data3': hexabit.colors["gray-light"]
            },
            names: {
                // name of each serie
                'data1': 'Bitcoin',
                'data2': 'NEO',
                'data3': 'ETH'
            }
        },

        axis: {
            x: {
                type: 'category',
                // name of each category
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug','Sept','Oct']
            },
        },

        legend: {
            show: true, //hide legend
        },

        padding: {
            bottom: 10,
            top: 0
        },
    });
    // function getRandomDataArray(dataName, length) {
    //     var dataArray = [dataName];
    //     for (var i = 0; i < length; i++) {
    //         var randomNumber = Math.random() * 100; // Tạo số ngẫu nhiên trong khoảng từ 0 đến 100
    //         dataArray.push(randomNumber.toFixed(1)); // Định dạng số và thêm vào mảng
    //     }
    //     return dataArray;
    // }

    // function createChart() {
    //     console.log(getRandomDataArray('data1', 10))
    //     var chart = c3.generate({

    //         bindto: '#User_Statistics', // id of chart wrapper
    //         data: {
    //             columns: [
    //                 // each columns data
    //                 getRandomDataArray('data1', 10),
    //                 getRandomDataArray('data2', 10),
    //                 getRandomDataArray('data3', 10),
    //                 getRandomDataArray('data4', 10)
    //             ],

    //             labels: true,
    //             type: 'line', // default type of chart
    //             colors: {
    //                 'data1': hexabit.colors["orange"],
    //                 'data2': hexabit.colors["green"],
    //                 'data3': hexabit.colors["gray-light"],
    //                 'data4': hexabit.colors["red"]
    //             },
    //             names: {
    //                 // name of each serie
    //                 'data1': 'Bitcoin',
    //                 'data2': 'NEO',
    //                 'data3': 'ETH',
    //                 'data4': 'red'
    //             }
    //         },

    //         axis: {
    //             x: {
    //                 type: 'category',
    //                 // name of each category
    //                 categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct']
    //             },
    //         },

    //         legend: {
    //             show: true, //hide legend
    //         },

    //         padding: {
    //             bottom: 10,
    //             top: 0
    //         },
    //     });
    // }
    // setInterval(createChart(), 1000);
});
