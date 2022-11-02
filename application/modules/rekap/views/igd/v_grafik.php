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
                hitung(<?php echo $no; ?>, <?php echo $row->NUM_JAN; ?>, <?php echo $row->DEN_JAN; ?>, <?php echo $tt_hari_jan; ?>),
                hitung(<?php echo $no; ?>, <?php echo $row->NUM_FEB; ?>, <?php echo $row->DEN_FEB; ?>, <?php echo $tt_hari_feb; ?>),
                hitung(<?php echo $no; ?>, <?php echo $row->NUM_MAR; ?>, <?php echo $row->DEN_MAR; ?>, <?php echo $tt_hari_mar; ?>),
                hitung(<?php echo $no; ?>, <?php echo $row->NUM_APR; ?>, <?php echo $row->DEN_APR; ?>, <?php echo $tt_hari_apr; ?>),
                hitung(<?php echo $no; ?>, <?php echo $row->NUM_MEI; ?>, <?php echo $row->DEN_MEI; ?>, <?php echo $tt_hari_mei; ?>),
                hitung(<?php echo $no; ?>, <?php echo $row->NUM_JUN; ?>, <?php echo $row->DEN_JUN; ?>, <?php echo $tt_hari_jun; ?>),
                hitung(<?php echo $no; ?>, <?php echo $row->NUM_JUL; ?>, <?php echo $row->DEN_JUL; ?>, <?php echo $tt_hari_jul; ?>),
                hitung(<?php echo $no; ?>, <?php echo $row->NUM_AGT; ?>, <?php echo $row->DEN_AGT; ?>, <?php echo $tt_hari_agt; ?>),
                hitung(<?php echo $no; ?>, <?php echo $row->NUM_SEP; ?>, <?php echo $row->DEN_SEP; ?>, <?php echo $tt_hari_sep; ?>),
                hitung(<?php echo $no; ?>, <?php echo $row->NUM_OKT; ?>, <?php echo $row->DEN_OKT; ?>, <?php echo $tt_hari_okt; ?>),
                hitung(<?php echo $no; ?>, <?php echo $row->NUM_NOV; ?>, <?php echo $row->DEN_NOV; ?>, <?php echo $tt_hari_nov; ?>),
                hitung(<?php echo $no; ?>, <?php echo $row->NUM_DES; ?>, <?php echo $row->DEN_DES; ?>, <?php echo $tt_hari_des; ?>)
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

    function hitung(no, num, den, hari) {
        if (no == 2) {
            if (num == 0 || den == 0) {
                return 0;
            } else {
                return (num / den);
            }
        } else if (no == 4) {
            if (num == 0) {
                return 0;
            } else {
                return (num / num);
            }
        } else if (no == 5) {
            if (num == 0) {
                return 0;
            } else {
                return (num * 60 / den);
            }
        } else {
            if (num == 0 || den == 0) {
                return 0;
            } else {
                return (num / den * 100);
            }
        }

    }

    
</script>