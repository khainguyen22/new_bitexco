<?php



/*

*Template Name: Kết quả sản xuất

 **/

$banner = get_field('banner_ket_qua_san_xuat', 'option');

$navigation = '';

if ($banner) {

    $navigation = $banner['navigation'];
}

$other_info = get_field('other_info_ket_qua_san_xuat', 'option');

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";
$request_uri = "$_SERVER[REDIRECT_URL]";


$san_luong_luy_ke = get_field('ket_qua_san_xuat_san_luong_luy_ke', 'option');

$tong_san_luong = get_field('ket_qua_san_xuat_tong_san_luong', 'option');

if ($tong_san_luong) {

    $tong_san_luong_content = $tong_san_luong['content'];

    $tong_san_luong_value  = array();

    $tong_san_luong_nam = array();

    $tong_san_luong_thuy_dien = array();

    $tong_san_luong_dien_mat_troi = array();

    $tong_san_luong_nang_luong_khac = array();

    foreach ($tong_san_luong_content['item'] as $value) {

        array_push($tong_san_luong_nam, $value['nam']);

        array_push($tong_san_luong_thuy_dien, $value['thuy_dien']);

        array_push($tong_san_luong_dien_mat_troi,  $value['dien_mat_troi']);

        array_push($tong_san_luong_nang_luong_khac, $value['khac']);
    }
}


$ty_trong_cong_xuat = get_field('ket_qua_san_xuat_ty_trong_cong_xuat', 'option');

if ($ty_trong_cong_xuat) {

    $ty_trong_cong_xuat_content = $ty_trong_cong_xuat['content'];

    $ty_trong_cong_xuat_content_data =  $ty_trong_cong_xuat_content['data'];
}



$cong_xuat_lap_dat = get_field('ket_qua_san_xuat_cong_xuat_lap_dat', 'option');

if ($cong_xuat_lap_dat) {

    $cong_xuat_lap_dat_content = $cong_xuat_lap_dat['content'];

    $cong_xuat_lap_dat_value  = array();

    $cong_xuat_lap_dat_nam = array();

    $cong_xuat_lap_dat_cong_ty_con = array();

    $cong_xuat_lap_dat_cong_ty_lien_ket = array();

    foreach ($cong_xuat_lap_dat_content['item'] as $value) {

        array_push($cong_xuat_lap_dat_nam,  $value['nam']);

        array_push($cong_xuat_lap_dat_cong_ty_con,  $value['cong_ty_con']);

        array_push($cong_xuat_lap_dat_cong_ty_lien_ket, $value['cong_ty_lien_ket']);
    }
}


include 'Classes/PHPExcel/IOFactory.php';

$inputFileName = __DIR__ . '/Bitexco.xlsx';

try {

    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);

    $objReader = PHPExcel_IOFactory::createReader($inputFileType);

    $objPHPExcel = $objReader->load($inputFileName);
} catch (Exception $e) {

    die('Lỗi không thể đọc file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
}

// get data current date of day

$sheet = $objPHPExcel->getSheet(idate('m'));

$highestRow = $sheet->getHighestRow();

$highestColumn = $sheet->getHighestColumn();

for ($row = 1; $row <= $highestRow; $row++) {

    $rowData[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
}

// get data current date of month and total of year

$sheet_month = $objPHPExcel->getSheet(0);

$highestRow_month  = $sheet_month->getHighestRow();

$highestColumn_month = $sheet_month->getHighestColumn();

for ($row = 1; $row <= $highestRow_month; $row++) {

    $rowData_month[] = $sheet_month->rangeToArray('A' . $row . ':' . $highestColumn_month . $row, NULL, TRUE, FALSE);
}
// check the previous day
$date = date("Y-m-d");
$yesterday = $date;
$current_date = date('m-d');
$fake_date = '01-01';

if ($current_date === $fake_date) {
    $yesterday = date_create($date)->format('Y-m-d');
} else {
    $yesterday = date_create($date)->modify('-1 day')->format('Y-m-d');
}

$day = number_format(date('d', strtotime($yesterday)));
$month = number_format(date('m', strtotime($yesterday)));
get_header();

?>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->

<script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-piechart-outlabels@0.1.4/dist/chartjs-plugin-piechart-outlabels.min.js">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-doughnutlabel/2.0.3/chartjs-plugin-doughnutlabel.js">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js" integrity="sha512-FJ2OYvUIXUqCcPf1stu+oTBlhn54W0UisZB/TNrZaVMHHhYvLBV9jMbvJYtvDe5x/WVaoXZ6KB+Uqe5hT2vlyA==" crossorigin="anonymous"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>



<script>
    var data_ty_trong_cong_xuat = <?php echo json_encode($ty_trong_cong_xuat_content_data); ?>;

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

                        y: data_ty_trong_cong_xuat['thuy_dien'],

                        name: "Thủy điện",

                        color: '#5C91FA',


                        exploded: true

                    },

                    {

                        y: data_ty_trong_cong_xuat['dien_mat_troi'],

                        color: '#80B55C',

                        name: "Điện mặt trời",
                        size: 14,
                        style: 'bold',
                        family: 'Public Sans',
                    },

                ]

            }]

        });

        chart.render();

    }



    function explodePie(e) {

        if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e
                .dataPointIndex].exploded) {

            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;

        } else {

            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;

        }

        e.chart.render();



    }
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

                                <li class="<?php echo strlen(strstr($value['link'], $request_uri)) > 0 ? 'active' : '' ?>"> <a href="<?php echo $value['link']; ?>"><?php echo _e($value['label']); ?></a></li>

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

                        <?php if ($san_luong_luy_ke) : ?><h4><?php echo $san_luong_luy_ke['title']; ?></h4>
                        <?php endif; ?>

                    </div>

                    <div class="row list  wrap_counter">


                        <div class="col-12 col-md-4 item">

                            <p class="label">
                                <?php if ($san_luong_luy_ke) : ?><?php echo $san_luong_luy_ke['san_luong_ngay']; ?> <?php endif; ?>
                            <?php

                            $d = date('d');

                            echo $d;

                            ?>

                            </p>

                            <h1 class="info notranslate counter" data-number='<?php echo $rowData[$day][0][8]; ?>'>0</h1>
                            </h1>
                            <?php if ($san_luong_luy_ke) : ?> <p class="unit"><?php echo $san_luong_luy_ke['don_vi_san_luong_ngay']; ?></p> <?php endif; ?>

                        </div>

                        <div class="col-12 col-md-4 item">

                            <p class="label">
                                <?php if ($san_luong_luy_ke) : ?><?php echo $san_luong_luy_ke['san_luong_thang']; ?> <?php endif; ?>
                            <?php

                            $m = date('m');

                            echo $m;

                            ?>

                            </p>
                            <h1 class="info notranslate counter" data-number='<?php echo $rowData_month[$month][0][8]; ?>'>0</h1>
                            </h1>
                            <?php if ($san_luong_luy_ke) : ?> <p class="unit"><?php echo $san_luong_luy_ke['don_vi_san_luong_thang']; ?></p> <?php endif; ?>

                        </div>

                        <div class="col-12 col-md-4 item count">

                            <p class="label">
                                <?php if ($san_luong_luy_ke) : ?><?php echo $san_luong_luy_ke['san_luong_nam']; ?> <?php endif; ?>
                            <?php

                            $y = date('Y');

                            echo $y;

                            ?>

                            </p>

                            <h1 class="info notranslate counter" data-number='<?php echo $rowData_month[13][0][8]; ?>'>0</h1>
                            </h1>

                            <?php if ($san_luong_luy_ke) : ?> <p class="unit"><?php echo $san_luong_luy_ke['don_vi_san_luong_nam']; ?></p> <?php endif; ?>

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

                        <?php if ($tong_san_luong) : ?><h4 class="headding"><?php echo $tong_san_luong['title']; ?></h4>
                        <?php endif; ?>

                        <input type="date" name="date" class="input-date form-control d-none">

                    </div>

                    <canvas id="tong_san_luong" class="tong_san_luong"></canvas>

                </div>

            </section>

        <?php endif; ?>

        <?php if ($ty_trong_cong_xuat) : ?>

            <div class="divider-section"></div>

            <section class="bieu-do-ti-trong">

                <div class="container">

                    <?php if ($ty_trong_cong_xuat) : ?><h4 class="title"><?php echo $ty_trong_cong_xuat['title']; ?></h4>
                    <?php endif; ?>

                    <div class="row bieu-do">

                        <div class="col-12 col-md-5 wrap_content_bieu-do-ti-trong">

                            <div class="content">

                                <p class="label">Tổng công suất của <strong>Bitexco Power</strong> đạt</p>

                                <div class="d-flex wrap_counter">

                                    <h2 class="number counter notranslate" data-number="3">0
                                    </h2>

                                    <span class="unit_percent"><span>%</span></span>

                                    <span class="unit"><span>công suất</span></span>

                                </div>

                                <p class="desc"><strong>Hệ thống điện quốc gia</strong></p>

                            </div>

                        </div>

                        <div class="col-12 col-md-7 wrap_bieu-do-ti-trong">

                            <div id="chartContainer"></div>

                        </div>

                    </div>

                </div>

            </section>

        <?php endif; ?>

        <?php if ($cong_xuat_lap_dat) : ?>

            <section class="bieu-do-cong-suat-lap-dat">

                <div class="container ">

                    <div class="d-flex head flex-wrap justify-content-between">

                        <?php if ($cong_xuat_lap_dat) : ?><h4 class="title"><?php echo $cong_xuat_lap_dat['title']; ?></h4>
                        <?php endif; ?>

                        <input type="date" name="date" class="input-date form-control d-none">

                    </div>

                    <canvas id="cong-suat-lap-dat" class="cong-suat-lap-dat"></canvas>

                    <table class="table">

                        <tr>

                            <td><?php _e('Công ty con') ?></td>

                            <?php foreach ($cong_xuat_lap_dat_cong_ty_con as $value) : ?>

                                <td><?php echo number_format($value, 0, ',', '.'); ?></td>

                            <?php endforeach; ?>

                        </tr>

                        <tr>

                            <td><?php _e('Công ty liên kết') ?></td>

                            <?php foreach ($cong_xuat_lap_dat_cong_ty_lien_ket as $value) : ?>

                                <td><?php echo number_format($value, 0, ',', '.'); ?></td>

                            <?php endforeach; ?>

                        </tr>

                        <tr>

                            <td><?php _e('Tổng công suất') ?></td>

                            <?php
                            $result = array();

                            for ($i = 0; $i < count($cong_xuat_lap_dat_cong_ty_con); $i++) {
                                $result[$i] = $cong_xuat_lap_dat_cong_ty_con[$i] + $cong_xuat_lap_dat_cong_ty_lien_ket[$i];
                            } ?>
                            <?php foreach ($result as $value) : ?>

                                <td><?php echo number_format($value, 0, ',', '.'); ?></td>

                            <?php endforeach; ?>

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
    // cong_suat_lap_dat

    var data_cong_xuat_lap_dat_nam = <?php echo json_encode($cong_xuat_lap_dat_nam); ?>;

    var cong_xuat_lap_dat_cong_ty_con = <?php echo json_encode($cong_xuat_lap_dat_cong_ty_con); ?>;

    var cong_xuat_lap_dat_cong_ty_lien_ket = <?php echo json_encode($cong_xuat_lap_dat_cong_ty_lien_ket); ?>;

    const arr_cong_xuat_lap_dat_cong_ty_con = cong_xuat_lap_dat_cong_ty_con.map(str => {

        return parseInt(str, 10);

    });

    const arr_cong_xuat_lap_dat_cong_ty_lien_ket = cong_xuat_lap_dat_cong_ty_lien_ket.map(str => {

        return parseInt(str, 10);

    });

    var data_cong_xuat_lap_dat = [];

    if (arr_cong_xuat_lap_dat_cong_ty_con.length === arr_cong_xuat_lap_dat_cong_ty_lien_ket.length) {

        for (let index_1 = 0; index_1 < arr_cong_xuat_lap_dat_cong_ty_con.length; index_1++) {

            data_cong_xuat_lap_dat.push(arr_cong_xuat_lap_dat_cong_ty_con[index_1] + arr_cong_xuat_lap_dat_cong_ty_lien_ket[
                index_1])

        }

    } else {}

    const config_cong_suat_lap_dat = {

        type: 'bar',

        data: {

            labels: data_cong_xuat_lap_dat_nam,

            datasets: [{

                    label: 'Công ty liên kết',

                    data: cong_xuat_lap_dat_cong_ty_lien_ket,

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

                    data: cong_xuat_lap_dat_cong_ty_con,

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

                    data: data_cong_xuat_lap_dat,

                    backgroundColor: [

                        '#DAA622',

                    ],

                    borderColor: [

                        '#DAA622',

                    ],

                    borderWidth: 1,

                    tension: 0.4,

                    type: 'line',

                    pointRadius: 0,

                    pointHoverRadius: 0,

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

                    enabled: true,

                },
                legend: {
                    position: 'right',
                    align: 'start',
                },
                datalabels: {

                    align: 'top',

                    display: true

                },

            },

            scales: {

                x: {
                    title: {
                        display: true,
                        text: 'Năm',
                        font: {
                            size: 14,
                            style: 'bold',
                            family: 'Public Sans',
                        }
                    },

                    stacked: true,

                },

                y: {

                    title: {
                        display: true,
                        text: 'Tổng Công suất (mW)',
                        font: {
                            size: 14,
                            style: 'bold',
                            family: 'Public Sans',
                        }
                    },

                    beginAtZero: true,

                    stacked: true,

                }

            },

        },

        plugins: [ChartDataLabels],

    };

    var numberWithCommas = function(x) {

        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    };

    // render init block

    const chart_cong_suat_lap_dat = new Chart(

        document.getElementById('cong-suat-lap-dat'),

        config_cong_suat_lap_dat

    );





    // tong_san_luong

    var data_tong_san_luong_nam = <?php echo json_encode($tong_san_luong_nam); ?>;

    var data_tong_san_luong_thuy_dien = <?php echo json_encode($tong_san_luong_thuy_dien); ?>;

    var data_tong_san_luong_dien_mat_troi = <?php echo json_encode($tong_san_luong_dien_mat_troi); ?>;

    var data_tong_san_luong_nang_luong_khac = <?php echo json_encode($tong_san_luong_nang_luong_khac); ?>;

    var data_tong_san_luong = [];

    const arr_data_tong_san_luong_thuy_dien = data_tong_san_luong_thuy_dien.map(str => {

        return parseInt(str, 10);

    });

    const arr_data_tong_san_luong_dien_mat_troi = data_tong_san_luong_dien_mat_troi.map(str => {

        return parseInt(str, 10);

    });

    const arr_data_tong_san_luong_nang_luong_khac = data_tong_san_luong_nang_luong_khac.map(str => {

        return parseInt(str, 10);

    });

    if (arr_data_tong_san_luong_thuy_dien.length === arr_data_tong_san_luong_dien_mat_troi.length) {

        for (let index_2 = 0; index_2 < arr_data_tong_san_luong_thuy_dien.length; index_2++) {

            data_tong_san_luong.push(arr_data_tong_san_luong_thuy_dien[index_2] + arr_data_tong_san_luong_dien_mat_troi[
                index_2] + arr_data_tong_san_luong_nang_luong_khac[index_2])

        }

    } else {}

    const config_tong_san_luong = {

        type: 'bar',

        data: {

            labels: data_tong_san_luong_nam,

            datasets: [{

                    label: 'Khác',

                    data: data_tong_san_luong_nang_luong_khac,

                    backgroundColor: [

                        '#A65F28'

                    ],

                    borderWidth: 1,

                    order: 4,

                    datalabels: {

                        color: 'rgba(0, 0, 0, 0)',

                    },

                },

                {

                    label: 'Điện mặt trời',

                    data: data_tong_san_luong_dien_mat_troi,

                    backgroundColor: [

                        '#5B8FF9'

                    ],

                    borderWidth: 1,

                    order: 3,

                    datalabels: {

                        color: 'rgba(0, 0, 0, 0)',

                    },

                },

                {

                    label: 'Thủy điện',

                    data: data_tong_san_luong_thuy_dien,

                    backgroundColor: [

                        '#80B55C'

                    ],

                    borderWidth: 1,

                    order: 2,

                    datalabels: {

                        color: 'rgba(0, 0, 0, 0)',

                    }

                },

                {

                    label: 'Tổng sản lượng',

                    data: data_tong_san_luong,

                    backgroundColor: [

                        '#DAA622',

                    ],

                    borderColor: [

                        '#DAA622',

                    ],

                    borderWidth: 1,

                    tension: 0.4,

                    type: 'line',

                    pointRadius: 0,

                    pointHoverRadius: 0,

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

                    enabled: true,

                },
                legend: {
                    position: 'right',
                    align: 'start',
                },
                datalabels: {

                    align: 'top',

                    display: true

                },

            },

            scales: {

                x: {

                    title: {

                        display: true,
                        text: 'Năm',
                        font: {
                            size: 14,
                            style: 'bold',
                            family: 'Public Sans',
                        }
                    },
                    stacked: true,

                },

                y: {

                    title: {

                        display: true,

                        text: 'Tổng Công suất (mW)',
                        font: {
                            size: 14,
                            style: 'bold',
                            family: 'Public Sans',
                        }
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
</script>

<?php

get_footer();

?>