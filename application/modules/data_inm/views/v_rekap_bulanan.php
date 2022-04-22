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
                        <?php echo form_open('data_inm/rekap_bulanan', 'class="form-horizontal "'); ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">BULAN</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="bulan" required>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
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
                        <h2>Tabel Data : <?php echo formatNamaBulan($bulan) . ' ' . $tahun; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th rowspan="2" width="30">
                                            <center>NO</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>INDIKATOR</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>TOTAL NUMERATOR</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>TOTAL DENUMERATOR</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>PERSEN</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($bulanan->result() as $value) {
                                    ?>
                                        <tr>
                                            <td> <?= $no++; ?> </td>
                                            <td> <?= $value->DETAIL_INDIKATOR; ?> </td>
                                            <td align="center">
                                                <?php
                                                if ($value->NUM_BULAN == 0) {
                                                    echo '0';
                                                } else {
                                                    echo $value->NUM_BULAN;
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($value->DEN_BULAN == 0) {
                                                    echo '0';
                                                } else {
                                                    echo $value->DEN_BULAN;
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($value->NUM_BULAN == 0 || $value->DEN_BULAN == 0) {
                                                    echo '0 %';
                                                } else {
                                                    echo round(($value->NUM_BULAN / $value->DEN_BULAN) * 100) . '%';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>