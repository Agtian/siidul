<div class="right_col" role="main">
    <div class="page-title">
        <div class="clearfix"></div>

        <?php echo $this->session->userdata('message') ?>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Filter Data</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <?php echo form_open('rekap/grafik', 'class="form-horizontal "'); ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">TAHUN</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="tahun" required>
                                    <?php foreach ($list_tahun->result() as $dd) { ?>
                                        <option value="<?php echo $dd->TAHUN; ?>"> <?php echo $dd->TAHUN; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Tampilkan</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
               
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <a class="hiddenanchor" id="signup"></a>
                    <div class="x_title">
                        <h2>Grafik Capaian Tahunan <?php echo $tahun; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div id="reportPage">

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
            </div>

        </div>
    </div>
</div>

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

        if (num == 0 || denum == 0) {
            return 0;
        } else {
            return Math.round((num / denum) * 100, 2);
        }

    }

    function myChart(id, detail, capaian, target) {
        const ctx = document.getElementById(id);


        var dataFirst = {
            label: detail,
            data: capaian,
            lineTension: 0.2,
            fill: true,
            borderColor: 'rgb(75, 192, 192)'
        };

        var dataSecond = {
            label: "target / ambang batas ",
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