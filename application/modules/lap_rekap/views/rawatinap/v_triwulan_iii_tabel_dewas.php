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
                        <?php echo form_open('lap_rekap/triwulan_iii_dewas', 'class="form-horizontal "'); ?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">RUANG</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="id_sub_ruang" required>
                                        <option value="rawat_inap">Semua Ruang Rawat Inap</option>
                                        <?php foreach ($list_ruang->result() as $dd) { ?>
                                            <option value="<?php echo $dd->ID; ?>"> <?php echo $dd->NAMA_SUB_RUANG; ?> </option>
                                        <?php } ?>
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

                    <div class="x_title">
                        <h2>Tabel Data Triwulan III Rawat Inap (Form Dewas) TH. <?php echo $tahun; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table id="" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th rowspan="2" width="5"><center>NO</center></th>
                                        <th rowspan="2"><center>INDIKATOR</center></th>
                                        <th rowspan="2"><center>SUB INDIKATOR</center></th>
                                        <th colspan="9"><center>BULAN</center></th>
                                        <th rowspan="2"><center>TOTAL</center></th>
                                        <th rowspan="2"><center>PERSEN</center></th>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach ($triwulan->result() as $row) {
                                    ?>
                                    <tr>
                                        <td rowspan="2"><?php echo $no++; ?></td>
                                        <td rowspan="2"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                        <td rowspan="1"><?php echo $row->DETAIL_NUM; ?></td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_JAN == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->NUM_JAN / $tt_hari_jan; 
                                                } else {
                                                    echo  $row->NUM_JAN;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_FEB == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->NUM_FEB / $tt_hari_feb; 
                                                } else {
                                                    echo  $row->NUM_FEB;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_MAR == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->NUM_MAR / $tt_hari_mar; 
                                                } else {
                                                    echo  $row->NUM_MAR;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_APR == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->NUM_APR / $tt_hari_apr; 
                                                } else {
                                                    echo  $row->NUM_APR;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_MEI == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->NUM_MEI / $tt_hari_mei; 
                                                } else {
                                                    echo  $row->NUM_MEI;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_JUN == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->NUM_JUN / $tt_hari_jun; 
                                                } else {
                                                    echo  $row->NUM_JUN;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_JUL == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo ($row->NUM_JUL) / $tt_hari_jul; 
                                                } else {
                                                    echo ($row->NUM_JUL); 
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_AGT == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo ($row->NUM_AGT) / $tt_hari_agt; 
                                                } else {
                                                    echo ($row->NUM_AGT); 
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_SEP == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo ($row->NUM_SEP) / $tt_hari_sep; 
                                                } else {
                                                    echo ($row->NUM_SEP); 
                                                }
                                            ?> 
                                        </td>
                                        <td align="center">
                                            <b> 
                                                <?php 
                                                    if ($no == '2' || $no == '4') {
                                                        $total_num = round(($row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III) / 9); 
                                                        echo $total_num;
                                                    } else if ($no == 4) {
                                                        $total_num = round(($row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III) / 9); 
                                                        echo $total_num;
                                                    } else {
                                                        echo $row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III;
                                                    }
                                                ?> 
                                            </b>
                                        </td>
                                        <td rowspan="2" align="center">
                                            <b> 
                                                <?php 
                                                    if ($no == '2')
                                                    {
                                                        $total_num = ($row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III) / 9;
                                                        $total_den = ($row->TOTAL_DEN_TW_I + $row->TOTAL_DEN_TW_II + $row->TOTAL_DEN_TW_III) / 9;
                                                        $persen    = round(($total_num / $total_den) * 100);
                                                        echo "$persen %";
                                                    } else if ($no == 4) {
                                                        $total_num = round(($row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III) / 9); 
                                                        echo $total_num;
                                                    } else if ($no == '9') {
                                                        $total_num = ($row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III);
                                                        $total_den = ($row->TOTAL_DEN_TW_I + $row->TOTAL_DEN_TW_II + $row->TOTAL_DEN_TW_III);
                                                        $persen    = round(($total_num / $total_den) * 1000);
                                                        echo "$persen";
                                                    } else {
                                                        $total_num = ($row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III);
                                                        $total_den = ($row->TOTAL_DEN_TW_I + $row->TOTAL_DEN_TW_II + $row->TOTAL_DEN_TW_III);
                                                        $persen    = round(($total_num / $total_den) * 100);
                                                        echo "$persen %";
                                                    }
                                                ?> 
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row->DETAIL_DEN; ?></td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->DEN_JAN == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->DEN_JAN / $tt_hari_jan; 
                                                } else {
                                                    echo  $row->DEN_JAN;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->DEN_FEB == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->DEN_FEB / $tt_hari_feb; 
                                                } else {
                                                    echo  $row->DEN_FEB;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->DEN_MAR == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->DEN_MAR / $tt_hari_mar; 
                                                } else {
                                                    echo  $row->DEN_MAR;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->DEN_APR == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->DEN_APR / $tt_hari_apr; 
                                                } else {
                                                    echo  $row->DEN_APR;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->DEN_MEI == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->DEN_MEI / $tt_hari_mei; 
                                                } else {
                                                    echo  $row->DEN_MEI;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->DEN_JUN == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->DEN_JUN / $tt_hari_jun; 
                                                } else {
                                                    echo  $row->DEN_JUN;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->DEN_JUL == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->DEN_JUL / $tt_hari_jul; 
                                                } else {
                                                    echo  $row->DEN_JUL;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->DEN_AGT == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->DEN_AGT / $tt_hari_agt; 
                                                } else {
                                                    echo  $row->DEN_AGT;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->DEN_SEP == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 2 && $no == 4) {
                                                    echo $row->DEN_SEP / $tt_hari_sep; 
                                                } else {
                                                    echo  $row->DEN_SEP;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($no == 2) {
                                                    $total = ($row->TOTAL_DEN_TW_I + $row->TOTAL_DEN_TW_II + $row->TOTAL_DEN_TW_III) / 9; 
                                                    echo round($total);
                                                } else if ($no == 4) {
                                                    $total =  ($row->TOTAL_DEN_TW_I + $row->TOTAL_DEN_TW_II + $row->TOTAL_DEN_TW_III); 
                                                    echo $total;
                                                } else {
                                                    echo ($row->TOTAL_DEN_TW_I + $row->TOTAL_DEN_TW_II + $row->TOTAL_DEN_TW_III); 
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