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
                        <?php echo form_open('lap_rekap/capaian', 'class="form-horizontal "'); ?>

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
                        <h2>Tabel Data Capaian Tahunan <?php echo $tahun; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table id="" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th rowspan="2" width="30">
                                            <center>NO</center>
                                        </th>
                                        <th rowspan="2" width="220">
                                            <center>INDIKATOR</center>
                                        </th>
                                        <th rowspan="2" width="100">
                                            <center>STANDAR</center>
                                        </th>
                                        <th colspan="12">
                                            <center>BULAN</center>
                                        </th>
                                    </tr>
                                    <tr class="bg-primary">
                                        <th align="center">JAN</th>
                                        <th align="center">FEB</th>
                                        <th align="center">MAR</th>
                                        <th align="center">APR</th>
                                        <th align="center">MEI</th>
                                        <th align="center">JUN</th>
                                        <th align="center">JUL</th>
                                        <th align="center">AGT</th>
                                        <th align="center">SEP</th>
                                        <th align="center">OKT</th>
                                        <th align="center">NOV</th>
                                        <th align="center">DES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($capaian->result() as $row) {
                                    ?>
                                        <tr>
                                            <td rowspan="1" align="center" height="60"><?php echo $no++; ?></td>
                                            <td rowspan="1"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                            <td align="center"><b> <?php echo $row->NILAI_STANDAR; ?> </b></td>
                                            <td align="center">
                                                <?php
                                                if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($row->NUM_JAN / $row->DEN_JAN) * 100, 2) . ' %';
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($row->NUM_FEB / $row->DEN_FEB) * 100, 2) . ' %';
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($row->NUM_MAR == 0 || $row->NUM_MAR == 0) {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($row->NUM_MAR / $row->NUM_MAR) * 100, 2) . ' %';
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($row->NUM_APR == 0 || $row->NUM_APR == 0) {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($row->NUM_APR / $row->NUM_APR) * 100, 2) . ' %';
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($row->NUM_MEI == 0 || $row->NUM_MEI == 0) {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($row->NUM_MEI / $row->NUM_MEI) * 100, 2) . ' %';
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($row->NUM_JUN == 0 || $row->NUM_JUN == 0) {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($row->NUM_JUN / $row->NUM_JUN) * 100, 2) . ' %';
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($row->NUM_JUL == 0 || $row->NUM_JUL == 0) {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($row->NUM_JUL / $row->NUM_JUL) * 100, 2) . ' %';
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($row->NUM_AGT == 0 || $row->NUM_AGT == 0) {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($row->NUM_AGT / $row->NUM_AGT) * 100, 2) . ' %';
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($row->NUM_SEP == 0 || $row->NUM_SEP == 0) {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($row->NUM_SEP / $row->NUM_SEP) * 100, 2) . ' %';
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($row->NUM_OKT == 0 || $row->NUM_OKT == 0) {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($row->NUM_OKT / $row->NUM_OKT) * 100, 2) . ' %';
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($row->NUM_NOV == 0 || $row->NUM_NOV == 0) {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($row->NUM_NOV / $row->NUM_NOV) * 100, 2) . ' %';
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($row->NUM_DES == 0 || $row->NUM_DES == 0) {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($row->NUM_DES / $row->NUM_DES) * 100, 2) . ' %';
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