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
                                <!-- <a class="btn btn-primary" target="_blank" href="<?php echo base_url('rekap/export_grafik/') . $id_ruang_sub . '/' . $tahun; ?>">Export PDF</a> -->
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <!-- <button type="button" id="download-pdf2">
                            Download Higher Quality PDF
                        </button> -->
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

    //add event listener to 2nd button
    document.getElementById('download-pdf2').addEventListener("click", downloadPDF2);
    //download pdf form hidden canvas
    function downloadPDF2() {


        //creates PDF from img
        var doc = new jsPDF('potrait');
        doc.setFontSize(12);
        doc.text(12, 12, "Grafik Capaian Tahun");
        // Add image chart
        <?php
        $no = 0;
        foreach ($capaian->result() as $row) {
            $no = $no + 1;
        ?>
            var newCanvas = document.querySelector('#<?php echo 'chart_indikator_id_' . $no; ?>');

            //create image from dummy canvas
            var newCanvasImg = newCanvas.toDataURL("image/png", 1.0);
            doc.addImage(newCanvasImg, 'PNG', 10, 10, 150, 280);
        <?php } ?>
        doc.save('new-canvas.pdf');
    }

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
</script>