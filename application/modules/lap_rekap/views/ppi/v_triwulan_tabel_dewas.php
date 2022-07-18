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
                                            <option value="<?php echo $dd->ID_RUANG; ?>"> <?php echo $dd->NAMA_SUB_RUANG; ?> </option>
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
                                    <a class="btn btn-primary" target="_blank" href="<?php echo base_url('lap_rekap/export_triwulan_iii_form_dewas/').$id_ruang_sub.'/'.$tahun; ?>">Export PDF</a>
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
                        <h2>Tabel Data Triwulan III : <?php echo $tahun; ?> | Ruang : <?= $nama_ruang; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table id="" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th rowspan="2" width="30"><center>NO</center></th>
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
                                        <td rowspan="2" align="center"><?php echo $no++; ?></td>
                                        <td rowspan="2"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                        <td rowspan="1"><?php echo $row->DETAIL_NUM; ?></td>
                                        <td align="center"> <?php echo $row->NUM_JAN; ?> </td>
                                        <td align="center"> <?php echo $row->NUM_FEB; ?> </td>
                                        <td align="center"> <?php echo $row->NUM_MAR; ?> </td>
                                        <td align="center"> <?php echo $row->NUM_APR; ?> </td>
                                        <td align="center"> <?php echo $row->NUM_MEI; ?> </td>
                                        <td align="center"> <?php echo $row->NUM_JUN; ?> </td>
                                        <td align="center"> <?php echo $row->NUM_JUL; ?> </td>
                                        <td align="center"> <?php echo $row->NUM_AGT; ?> </td>
                                        <td align="center"> <?php echo $row->NUM_SEP; ?> </td>
                                        <td align="center">
                                            <b> 
                                                <?php 
                                                    if ($no == 3 || $no == 4 || $no == 7) {
                                                        if ($row->TOTAL_NUM_TW_I == 0 || $row->TOTAL_NUM_TW_II == 0) 
                                                        {
                                                            echo "0";
                                                        } else {
                                                            echo $row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III;
                                                        }
                                                    } else {
                                                        if ($row->TOTAL_NUM_TW_I == 0 || $row->TOTAL_NUM_TW_II == 0) 
                                                        {
                                                            echo "0";
                                                        } else {
                                                            echo $row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III;
                                                        }
                                                    }
                                                ?> 
                                            </b>
                                        </td>
                                        <td rowspan="2" align="center">
                                            <b> 
                                                <?php 
                                                    if ($no == 3 || $no == 4 || $no == 7) {
                                                        if ($row->TOTAL_NUM_TW_I == 0 || $row->TOTAL_NUM_TW_II == 0) 
                                                        {
                                                            echo "0";
                                                        } else {
                                                            $total_row = $row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III;
                                                            $total_den = $row->TOTAL_DEN_TW_I + $row->TOTAL_DEN_TW_II + $row->TOTAL_DEN_TW_III;
                                                            $time       = ($total_row / 9) / $total_den;
                                                            echo round($time, 2)." %";
                                                        }
                                                    } else {
                                                        if ($row->TOTAL_NUM_TW_I == 0 || $row->TOTAL_NUM_TW_II == 0) 
                                                        {
                                                            echo "0";
                                                        } else {
                                                            $total_row = $row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III;
                                                            $total_den = $row->TOTAL_DEN_TW_I + $row->TOTAL_DEN_TW_II + $row->TOTAL_DEN_TW_III;
                                                            echo round(($total_row / $total_den) * 100, 2);
                                                            echo " %";
                                                        }
                                                    }
                                                ?> 
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row->DETAIL_DEN; ?></td>
                                        <td align="center"> <?php echo $row->DEN_JAN; ?> </td>
                                        <td align="center"> <?php echo $row->DEN_FEB; ?> </td>
                                        <td align="center"> <?php echo $row->DEN_MAR; ?> </td>
                                        <td align="center"> <?php echo $row->DEN_APR; ?> </td>
                                        <td align="center"> <?php echo $row->DEN_MEI; ?> </td>
                                        <td align="center"> <?php echo $row->DEN_JUN; ?> </td>
                                        <td align="center"> <?php echo $row->DEN_JUL; ?> </td>
                                        <td align="center"> <?php echo $row->DEN_AGT; ?> </td>
                                        <td align="center"> <?php echo $row->DEN_SEP; ?> </td>
                                        <td align="center">
                                            <b> 
                                                <?php
                                                    if ($no == 3 || $no == 4 || $no == 7)
                                                    {
                                                        if ($row->TOTAL_DEN_TW_I == 0) 
                                                        {
                                                            echo "0";
                                                        } else {
                                                            $average = $row->TOTAL_DEN_TW_I + $row->TOTAL_DEN_TW_II + $row->TOTAL_DEN_TW_III / 9;
                                                            echo round($average, 2);
                                                        }
                                                    } else {
                                                        if ($row->TOTAL_DEN_TW_I == 0) 
                                                        {
                                                            echo "0";
                                                        } else {
                                                            echo $row->TOTAL_DEN_TW_I + $row->TOTAL_DEN_TW_II + $row->TOTAL_DEN_TW_III;
                                                        }
                                                    }
                                                ?> 
                                            </b>
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