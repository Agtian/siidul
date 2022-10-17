<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/font-awesome/css/font-awesome.min.css">

    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap-datetimepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css">

    <!-- Bootstrap Colorpicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

</head>

<body>
    <div class="row" style="line-height:24px; font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color:#555;">

        <div class="">

            <a class="hiddenanchor" id="signup"></a>
            <div class="x_title">
                <h4>Grafik Capaian Tahunan <?php echo $tahun; ?></h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <?php
                $no = 0;
                foreach ($capaian->result() as $row) {
                    $no = $no + 1;
                ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $no . ". " . $row->DETAIL_INDIKATOR; ?></h3>
                        </div>
                        <div class="panel-body">
                            <canvas id="<?php echo "chart_indikator_id_" . $no; ?>"></canvas>
                        </div>
                    </div>
                <?php } ?>

            </div>


        </div>

    </div>
    <!-- Chart.js -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/Chart.js/dist/Chart.min.js"></script>
    <script type="text/javascript">
        <?php
        $no = 0;
        foreach ($capaian->result() as $row) {
            $no = $no + 1;
            $datas = $row;
        ?>
            var target = <?php echo $row->STD_VALUE; ?>;
            var dataTarget = [];
            for (var i = 1; i <= 12; i++) {
                dataTarget.push(target);
            }

            myChart('<?php echo 'chart_indikator_id_' . $no; ?>', '<?php echo $row->DETAIL_INDIKATOR; ?>',
                [
                    hitung(<?php echo $no; ?>, <?php echo $row->NUM_JAN; ?>, <?php echo $row->DEN_JAN; ?>),
                    hitung(<?php echo $no; ?>, <?php echo $row->NUM_FEB; ?>, <?php echo $row->DEN_FEB; ?>),
                    hitung(<?php echo $no; ?>, <?php echo $row->NUM_MAR; ?>, <?php echo $row->DEN_MAR; ?>),
                    hitung(<?php echo $no; ?>, <?php echo $row->NUM_APR; ?>, <?php echo $row->DEN_APR; ?>),
                    hitung(<?php echo $no; ?>, <?php echo $row->NUM_MEI; ?>, <?php echo $row->DEN_MEI; ?>),
                    hitung(<?php echo $no; ?>, <?php echo $row->NUM_JUN; ?>, <?php echo $row->DEN_JUN; ?>),
                    hitung(<?php echo $no; ?>, <?php echo $row->NUM_JUL; ?>, <?php echo $row->DEN_JUL; ?>),
                    hitung(<?php echo $no; ?>, <?php echo $row->NUM_AGT; ?>, <?php echo $row->DEN_AGT; ?>),
                    hitung(<?php echo $no; ?>, <?php echo $row->NUM_SEP; ?>, <?php echo $row->DEN_SEP; ?>),
                    hitung(<?php echo $no; ?>, <?php echo $row->NUM_OKT; ?>, <?php echo $row->DEN_OKT; ?>),
                    hitung(<?php echo $no; ?>, <?php echo $row->NUM_NOV; ?>, <?php echo $row->DEN_NOV; ?>),
                    hitung(<?php echo $no; ?>, <?php echo $row->NUM_DES; ?>, <?php echo $row->DEN_DES; ?>)
                ], [
                    <?php echo $row->STD_VALUE ?>,
                    <?php echo $row->STD_VALUE ?>,
                    <?php echo $row->STD_VALUE ?>,
                    <?php echo $row->STD_VALUE ?>,
                    <?php echo $row->STD_VALUE ?>,
                    <?php echo $row->STD_VALUE ?>,
                    <?php echo $row->STD_VALUE ?>,
                    <?php echo $row->STD_VALUE ?>,
                    <?php echo $row->STD_VALUE ?>,
                    <?php echo $row->STD_VALUE ?>,
                    <?php echo $row->STD_VALUE ?>,
                    <?php echo $row->STD_VALUE ?>
                ]);
        <?php } ?>


        function hitung(no, num, denum) {
            if (no == 4) {
                if (num == 0) {
                    return 0;
                } else {
                    return Math.round(num, 2);
                }
            } else {
                if (num == 0 || denum == 0) {
                    return 0;
                } else {
                    return Math.round((num / denum) * 100, 2);
                }
            }
        }

        function myChart(id, detail, capaian, target) {
            const ctx = document.getElementById(id);


            var dataFirst = {
                label: detail,
                data: capaian,
                lineTension: 0,
                fill: false,
                borderColor: 'rgb(75, 192, 192)'
            };

            var dataSecond = {
                label: "target ",
                data: target,
                lineTension: 0,
                fill: false,
                borderColor: 'rgb(255, 51, 51)'
            };

            var dataCapaianTarget = {
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGT', 'SEP', 'OKT', 'NOV', 'DES'],
                datasets: [dataFirst, dataSecond]
            };
            const myChart = new Chart(ctx, {
                type: 'line',
                data: dataCapaianTarget,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        }
    </script>
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/dashboard/build/js/custom.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/pdfmake/build/vfs_fonts.js"></script>


</html>