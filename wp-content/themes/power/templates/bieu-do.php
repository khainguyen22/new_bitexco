<?php

/**
Template Name: Biểu đồ 
 **/
$banner = get_field('banner_ket_qua_san_xuat', 'option');
$navigation = '';
if ($banner) {
    $navigation = $banner['navigation'];
}
$other_info = get_field('other_info_ket_qua_san_xuat', 'option');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";
$home_san_xuat_kinh_doanh = get_field('home_san_xuat_kinh_doanh', 'option');
$home_san_xuat_kinh_doanh_background = '';
$home_san_xuat_kinh_doanh_content = '';
if ($home_san_xuat_kinh_doanh) {
    $home_san_xuat_kinh_doanh_content = $home_san_xuat_kinh_doanh['content'];
    $home_san_xuat_kinh_doanh_background = $home_san_xuat_kinh_doanh['background'];
    $timestamp = strtotime($home_san_xuat_kinh_doanh_content['date']);
}
$san_luong_luy_ke = get_field('ket_qua_san_xuat_san_luong_luy_ke', 'option');
$tong_san_luong = get_field('ket_qua_san_xuat_tong_san_luong', 'option');
if ($tong_san_luong) {
    $tong_san_luong_content = $tong_san_luong['content'];
}
// echo '<pre>';
// print_r($tong_san_luong_content);
// echo '</pre>';
$ty_trong_cong_xuat = get_field('ket_qua_san_xuat_ty_trong_cong_xuat', 'option');
if ($ty_trong_cong_xuat) {
    $ty_trong_cong_xuat_content = $ty_trong_cong_xuat['content'];
}
$cong_xuat_lap_dat = get_field('ket_qua_san_xuat_cong_xuat_lap_dat', 'option');
if ($cong_xuat_lap_dat) {
    $cong_xuat_lap_dat_content = $cong_xuat_lap_dat['content'];
}
get_header();
?>
<style>
    #chartContainer {
        height: 500px;
    }

    .canvasjs-chart-toolbar,
    .canvasjs-chart-credit {
        display: none;
    }
</style>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->
<script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-piechart-outlabels@0.1.4/dist/chartjs-plugin-piechart-outlabels.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-doughnutlabel/2.0.3/chartjs-plugin-doughnutlabel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js" integrity="sha512-FJ2OYvUIXUqCcPf1stu+oTBlhn54W0UisZB/TNrZaVMHHhYvLBV9jMbvJYtvDe5x/WVaoXZ6KB+Uqe5hT2vlyA==" crossorigin="anonymous"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            exportEnabled: true,
            animationEnabled: true,
            legend: {
                cursor: "pointer",
                itemclick: explodePie
            },
            data: [{
                type: "pie",
                showInLegend: true,
                toolTipContent: "{name}: <strong>{y}%</strong>",
                indexLabel: "{name}",
                dataPoints: [{
                        y: 80,
                        name: "Thủy điện",
                        color: '#5C91FA',
                        exploded: true
                    },
                    {
                        y: 20,
                        color: '#80B55C',
                        name: "Điện mặt trời"
                    },
                ]
            }]
        });
        chart.render();
    }

    function explodePie(e) {
        if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
        } else {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
        }
        e.chart.render();

    }
    // var pieChartValues = [{
    //     y: 39.16,
    //     exploded: true,
    //     indexLabel: "Hello",
    //     color: "#1f77b4"
    // }, {
    //     y: 21.8,
    //     indexLabel: "Hi",
    //     color: "#ff7f0e"
    // }, {
    //     y: 21.45,
    //     indexLabel: "pk",
    //     color: " #ffbb78"
    // }, {
    //     y: 5.56,
    //     indexLabel: "one",
    //     color: "#d62728"
    // }, {
    //     y: 5.38,
    //     indexLabel: "two",
    //     color: "#98df8a"
    // }, {
    //     y: 3.73,
    //     indexLabel: "three",
    //     color: "#bcbd22"
    // }, {
    //     y: 2.92,
    //     indexLabel: "four",
    //     color: "#f7b6d2"
    // }];
    // renderPieChart(pieChartValues);

    // function renderPieChart(values) {

    //     var chart = new CanvasJS.Chart("pieChart", {
    //         backgroundColor: "white",
    //         colorSet: "colorSet2",

    //         title: {
    //             text: "Pie Chart",
    //             fontFamily: "Verdana",
    //             fontSize: 25,
    //             fontWeight: "normal",
    //         },
    //         animationEnabled: true,
    //         data: [{
    //             indexLabelFontSize: 15,
    //             indexLabelFontFamily: "Monospace",
    //             indexLabelFontColor: "darkgrey",
    //             indexLabelLineColor: "darkgrey",
    //             indexLabelPlacement: "outside",
    //             type: "pie",
    //             showInLegend: false,
    //             toolTipContent: "<strong>#percent%</strong>",
    //             dataPoints: values
    //         }]
    //     });
    //     chart.render();
    // }
    // var columnChartValues = [{
    //     y: 686.04,
    //     label: "one",
    //     color: "#1f77b4"
    // }, {
    //     y: 381.84,
    //     label: "two",
    //     color: "#ff7f0e"
    // }, {
    //     y: 375.76,
    //     label: "three",
    //     color: " #ffbb78"
    // }, {
    //     y: 97.48,
    //     label: "four",
    //     color: "#d62728"
    // }, {
    //     y: 94.2,
    //     label: "five",
    //     color: "#98df8a"
    // }, {
    //     y: 65.28,
    //     label: "Hi",
    //     color: "#bcbd22"
    // }, {
    //     y: 51.2,
    //     label: "Hello",
    //     color: "#f7b6d2"
    // }];
    // renderColumnChart(columnChartValues);

    // function renderColumnChart(values) {

    //     var chart = new CanvasJS.Chart("columnChart", {
    //         backgroundColor: "white",
    //         colorSet: "colorSet3",
    //         title: {
    //             text: "Column Chart",
    //             fontFamily: "Verdana",
    //             fontSize: 25,
    //             fontWeight: "normal",
    //         },
    //         animationEnabled: true,
    //         legend: {
    //             verticalAlign: "bottom",
    //             horizontalAlign: "center"
    //         },
    //         theme: "theme2",
    //         data: [

    //             {
    //                 indexLabelFontSize: 15,
    //                 indexLabelFontFamily: "Monospace",
    //                 indexLabelFontColor: "darkgrey",
    //                 indexLabelLineColor: "darkgrey",
    //                 indexLabelPlacement: "outside",
    //                 type: "column",
    //                 showInLegend: false,
    //                 legendMarkerColor: "grey",
    //                 dataPoints: values
    //             }
    //         ]
    //     });

    //     chart.render();
    // }
</script>
<div class="ket-qua-san-xuat">
    <?php if ($banner) : ?>
        <section class="banner" style='background-image:url("<?php echo $banner['background']; ?>")'>
            <div class="container">
                <div class="content">
                    <?php if ($banner['title']) : ?><h3><?php echo $banner['title'] ?></h3> <?php endif; ?>
                    <?php if ($banner['description']) : ?> <p><?php echo   $banner['description']; ?></p> <?php endif; ?>
                </div>
                <?php if ($navigation) : ?>
                    <div class="navigation">
                        <ul>
                            <?php foreach ($navigation as $key => $value) : ?>
                                <li class="<?php echo $actual_link == $value['link'] ? 'active' : '' ?>"> <a href="<?php echo $value['link']; ?>"><?php echo $value['label']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
    <div class="main">
        <section class="san_luong_luy_ke" style='background-image:url("<?php echo $san_luong_luy_ke['background']; ?>")'>
            <div class="information">
                <div class="container">
                    <div class="headding">
                        <?php if ($san_luong_luy_ke) : ?><h4><?php echo $san_luong_luy_ke['title']; ?></h4> <?php endif; ?>
                    </div>
                    <div class="row list">
                        <?php if ($home_san_xuat_kinh_doanh_content['san_luong_ngay']) : ?>
                            <div class="col-12 col-md-4 item">
                                <p class="label">Sản lượng ngày
                                    <?php
                                    $day = date('d', $timestamp);
                                    echo $day;
                                    ?>
                                </p>
                                <h1 class="info" lang="vi"><?php echo $home_san_xuat_kinh_doanh_content['san_luong_ngay']; ?></h1>
                                <p class="unit">Triệu kWh </p>
                            </div>
                        <?php endif; ?>
                        <div class="col-12 col-md-4 item">
                            <p class="label" lang="fr">Sản lượng tháng
                                <?php
                                $month = date('m', $timestamp);
                                echo $month;
                                ?>
                            </p>
                            <h1 class="info" lang="vi"><?php echo $home_san_xuat_kinh_doanh_content['san_luong_thang']; ?></h1>
                            <p class="unit">Triệu kWh </p>
                        </div>
                        <div class="col-12 col-md-4 item">
                            <p class="label">Sản lượng lũy kế năm
                                <?php
                                $year = date('Y', $timestamp);
                                echo $year;
                                ?>
                            </p>
                            <h1 class="info" lang="vi"><?php echo $home_san_xuat_kinh_doanh_content['san_luong_nam']; ?></h1>
                            <p class="unit">Triệu kWh </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php if ($tong_san_luong) : ?>
            <div class="divider-section"></div>
            <section class="bieu-do-san-luong">
                <div class="container">
                    <div class="d-flex head flex-wrap justify-content-between">
                        <?php if ($tong_san_luong) : ?><h4 class="headding"><?php echo $tong_san_luong['title']; ?></h4> <?php endif; ?>
                        <input type="date" name="date" class="input-date form-control">
                    </div>
                    <canvas id="tong_san_luong" class="tong_san_luong"></canvas>
                </div>
            </section>
        <?php endif; ?>
        <?php if ($ty_trong_cong_xuat) : ?>
            <div class="divider-section"></div>
            <section class="bieu-do-ti-trong">
                <div class="container">
                    <?php if ($ty_trong_cong_xuat) : ?><h4 class="title"><?php echo $ty_trong_cong_xuat['title']; ?></h4> <?php endif; ?>
                    <div class="row bieu-do">
                        <div class="col-12 col-md-6">
                            <div class="content">
                                <p>Tổng công suất của <strong>Bitexco Power</strong> đạt</p>
                                <div class="d-flex">
                                    <h2>3%</h2>
                                    <p>công suất</p>
                                </div>
                                <p><strong>Hệ thống điện quốc gia</strong></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <canvas id="ty_trong_cong_xuat" class="ty_trong_cong_xuat"></canvas>
                            <div>
                                <div id="chartContainer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php if ($cong_xuat_lap_dat) : ?>
            <div class="divider-section"></div>
            <section class="bieu-do-cong-suat-lap-dat">
                <div class="container ">
                    <div class="d-flex head flex-wrap justify-content-between">
                        <?php if ($cong_xuat_lap_dat) : ?><h4 class="title"><?php echo $cong_xuat_lap_dat['title']; ?></h4> <?php endif; ?>
                        <input type="date" name="date" class="input-date form-control">
                    </div>
                    <canvas id="cong-suat-lap-dat" class="cong-suat-lap-dat"></canvas>
                    <table class="table">
                        <tr>
                            <td>Công ty con</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>Công ty liên kết</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>Tổng công suất</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                        </tr>
                    </table>
                </div>
            </section>
        <?php endif; ?>
    </div>
    <?php if ($other_info) : ?>
        <section class="other-information">
            <div class="other-container">
                <div class="other-content hover-zoom">
                    <?php foreach ($other_info as $value) : ?>
                        <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>
</div>

<script>
    const labels = ["2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", ];
    let Data1 = [112, 59, 45, 56, 58, 52, 59, 87, 45, 20];
    let Data2 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 10];
    let Data3 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 30];
    var jArray = <?php echo json_encode($tong_san_luong); ?>;
    console.log(jArray['content']['item']);
    for (var i = 0; i < jArray['content']['item'].length; i++) {
        // console.log(jArray[i]['nam']);
    }
    const config_cong_suat_lap_dat = {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                    label: 'Công ty liên kết',
                    data: [50, 100, 100, 100, 100, 100, 100, 100, 100, 100],
                    backgroundColor: [
                        '#2A0E3D'
                    ],
                    borderColor: [
                        '#2A0E3D'
                    ],
                    borderWidth: 1,
                    order: 2,
                    datalabels: {
                        color: 'rgba(0, 0, 0, 0)',
                    },
                },
                {
                    label: 'Công ty con',
                    data: [50, 10, 20, 30, 40, 50, 60, 70, 80, 90],
                    backgroundColor: [
                        '#F2DD39'
                    ],
                    borderColor: [
                        '#F2DD39'
                    ],
                    borderWidth: 1,
                    order: 2,
                    datalabels: {
                        color: 'rgba(0, 0, 0, 0)',
                    }
                },
                {
                    label: 'Tổng công suất',
                    data: [100, 110, 120, 130, 140, 150, 160, 170, 180, 190],
                    backgroundColor: [
                        '#DAA622',
                    ],
                    borderColor: [
                        '#DAA622',
                    ],
                    borderWidth: 1,
                    tension: 0.4,
                    type: 'line',
                    pointRadius: 30,
                    pointHoverRadius: 30,
                    order: 1,
                    pointStyle: 'line',
                    stepped: 'middle',
                },
            ]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    enabled: false,
                },
                datalabels: {
                    display: false
                },
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Năm'
                    },
                    stacked: true,
                },
                y: {
                    title: {
                        display: true,
                        text: 'Tổng Công suất (mW)'
                    },
                    beginAtZero: true,
                    stacked: true,
                }
            },
        },
        plugins: [ChartDataLabels],
    };
    // render init block
    const chart_cong_suat_lap_dat = new Chart(
        document.getElementById('cong-suat-lap-dat'),
        config_cong_suat_lap_dat
    );

    const config_tong_san_luong = {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                    display: false,
                    label: 'Tổng sản lượng',
                    data: [100, 110, 120, 130, 140, 150, 160, 170, 180, 190],
                    backgroundColor: [
                        '#DAA622',
                    ],
                    borderColor: [
                        '#DAA622',
                    ],
                    borderWidth: 1,
                    tension: 0.4,
                    type: 'line',
                    pointRadius: 30,
                    pointHoverRadius: 30,
                    order: 1,
                    pointStyle: 'line',
                    stepped: 'middle',
                },
                {
                    label: 'Thủy điện',
                    data: [50, 100, 100, 100, 100, 100, 100, 100, 100, 100],
                    backgroundColor: [
                        '#80B55C'
                    ],
                    borderWidth: 1,
                    order: 2,
                },
                {
                    label: 'Điện mặt trời',
                    data: [50, 10, 20, 30, 40, 50, 60, 70, 80, 90],
                    backgroundColor: [
                        '#5B8FF9'
                    ],
                    order: 3,
                },
                {
                    label: 'Khác',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    backgroundColor: [
                        '#A65F28'
                    ],
                    borderWidth: 1,
                    order: 4,
                },
            ]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    enabled: false,
                },
                datalabels: {
                    display: false
                },
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Năm'
                    },
                    stacked: true,
                },
                y: {
                    title: {
                        display: true,
                        text: 'Sản lượng (Triệu kWh)'
                    },
                    beginAtZero: true,
                    stacked: true,
                }
            },
        },
        plugins: [ChartDataLabels],
    };
    const chart_tong_san_luong = new Chart(
        document.getElementById('tong_san_luong'),
        config_tong_san_luong
    );

    var ctxPie = document.getElementById("ty_trong_cong_xuat").getContext('2d');
    var myChartPie = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: [
                'Thủy điện',
                'Điện mặt trời',
            ],
            datasets: [{
                data: [900, 100],
                backgroundColor: [
                    '#5C91FA',
                    '#80B55C',
                ],
                hoverOffset: 2
            }],
        },
        options: {
            tooltips: {
                displayColors: true,
                mode: 'label',
            },
            animation: {
                duration: 10,
            },
            plugins: {
                // outlabels: {
                //     backgroundColor: null,
                //     color: COLORS,
                //     stretch: 30,
                //     font: {
                //         resizable: true,
                //         minSize: 15,
                //         maxSize: 20,
                //     },
                //     zoomOutPercentage: 100,
                //     textAlign: 'start',
                //     backgroundColor: null
                // }
                datalabels: {
                    display: true,
                    formatter: (value) => {
                        return value + '%';
                    },
                },
                labels: {
                    render: 'percentage',
                    fontColor: function(data) {
                        var rgb = hexToRgb(data.dataset.backgroundColor[data.index]);
                        var threshold = 140;
                        var luminance = 0.299 * rgb.r + 0.587 * rgb.g + 0.114 * rgb.b;
                        return luminance > threshold ? 'black' : 'white';
                    },
                    precision: 2
                }
            },
            legend: {
                display: true
            },

            responsive: true,
            maintainAspectRatio: true,
        }
    });
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Thủy điện', 11],
            ['Điện mặt trời', 2],
            ['Watch TV', 2],
            ['Tution', 2],
            ['Sleep', 7]
        ]);

        var options = {
            title: 'My Day Schedule',
            is3D: true
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart3d'));
        chart.draw(data, options);
    }
</script>

<?php
get_footer();
?>