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
                        <?php echo form_open('lap_rekap/bulanan', 'class="form-horizontal "'); ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">RUANG</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="id_sub_ruang" required>
                                    <?php foreach ($list_ruang->result() as $dd) { ?>
                                        <option value="<?php echo $dd->ID; ?>"> <?php echo $dd->NAMA_SUB_RUANG; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
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
                                <a class="btn btn-primary" target="_blank" href="<?php echo base_url('lap_rekap/export_bulanan/') . $id_ruang_sub . '/' . $bulan . '/' . $tahun; ?>">Export PDF</a>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // foreach ($data_indikator->result() as $row) {
        // $data = $this->Rekap_model->get_data_bulanan($row->ID, $bulan, $tahun);

        // echo "<pre>";
        // print_r($data->result());
        // echo "</pre>";

        // $get_nilai = array();
        // foreach ($data->result() as $key => $value) {
        // echo $key[0].' dan '.$value->NUM;
        //    array_push($get_nilai, $value);
        // }
        // echo "<br>";
        // echo $get_nilai[0]->NUM;
        // die;
        // }
        ?>

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
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th rowspan="2" width="5">
                                            <center>NO</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>INDIKATOR</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>SUB INDIKATOR</center>
                                        </th>
                                        <th colspan="<?php echo $total_hari; ?>">
                                            <center>TANGGAL</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>TOTAL</center>
                                        </th>
                                        <th rowspan="2">
                                            <center>PERSEN</center>
                                        </th>
                                    </tr>
                                    <tr class="bg-primary">
                                        <?php
                                        foreach ($get_date->result() as $date) {
                                            echo '<th><center> ' . $date->DATE . ' </center></th>';
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $tanggal        = $total_hari;
                                    $id_ruang_sub   = $id_ruang_sub;
                                    //print_r($id_ruang_sub); die();
                                    foreach ($data_indikator->result() as $row) {
                                        $id_indikator = $row->ID;
                                    ?>
                                        <tr>
                                            <td rowspan="2"><?php echo $no++; ?></td>
                                            <td rowspan="2"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                            <td rowspan="1"><?php echo $row->DETAIL_NUM; ?></td>


                                            <?php
                                            $total_num  = 0;
                                            $total_den  = 0;
                                            $data       = $this->Rekap_model->get_data_bulanan($id_indikator, $id_ruang_sub, $bulan, $tahun);
                                            if ($total_hari == $total_hari) {
                                                foreach ($data->result() as $key) {
                                                    if ($id_indikator == 10) {
                                                        $total_num += $key->NUM;
                                                        $total_den += $key->DEN;
                                                        echo '<td align="center"> ' . $key->NUM . ' </td>';
                                                    } else if ($id_indikator == 12) {
                                                        $total_num += $key->NUM;
                                                        $total_den += $key->DEN;
                                                        echo '<td align="center"> ' . $key->NUM . ' </td>';
                                                    } else {
                                                        echo '<td align="center"> ' . $key->NUM . ' </td>';
                                                        $total_num += $key->NUM;
                                                        $total_den += $key->DEN;
                                                    }
                                                }
                                            } else {

                                                $data = $this->Rekap_model->get_data_bulanan($id_indikator, $id_ruang_sub, $bulan, $tahun);
                                                foreach ($data->result() as $key) {
                                                    echo '<td align="center"> ' . $key->NUM . ' </td>';
                                                }
                                            }
                                            ?>
                                            <td align="center">
                                                <b>
                                                    <?php
                                                    $average_3 = $total_num / $total_hari;
                                                    if ($id_indikator == 10) {
                                                        if (empty($average_3)) {
                                                            echo "0";
                                                        } else {
                                                            echo $average_3;
                                                        }
                                                    } else {
                                                        if (empty($total_num)) {
                                                            echo "0";
                                                        } else {
                                                            echo $total_num;
                                                        }
                                                    }
                                                    ?>
                                                </b>
                                            </td>
                                            <td rowspan="2">
                                                <b>
                                                    <center>
                                                        <?php
                                                        if ($id_indikator == 10) {
                                                            if ($total_num == 0) {
                                                                echo "0";
                                                            } else {
                                                                $average_3 = $total_num / $total_hari;
                                                                echo $average_3;
                                                            }
                                                        } else if ($id_indikator == 12) {
                                                            if ($total_num == 0 || $total_den == 0) {
                                                                echo "0";
                                                                echo " %";
                                                            } else {
                                                                $persen = $total_num / $total_den;
                                                                echo round($persen, 2);
                                                                echo " %";
                                                            }
                                                        } else if ($id_indikator == 15) {
                                                            if ($total_num == 0 || $total_den == 0) {
                                                                echo "0" . ' permil';
                                                            } else {
                                                                $persen = ($total_num / $total_den) * 1000;
                                                                echo round($persen, 2) . " permil";
                                                            }
                                                        } else if ($id_indikator == 16) {
                                                            if ($total_den == 0) {
                                                                echo "0";
                                                                echo " %";
                                                            } else {
                                                                $persen = ($total_num / $total_den) * 100;
                                                                echo round($persen, 2);
                                                                echo " %";
                                                            }
                                                        } else {
                                                            if ($total_num == 0 || $total_den == 0) {
                                                                echo "0";
                                                                echo " %";
                                                            } else {
                                                                $persen = $total_num / $total_den * 100;
                                                                echo round($persen, 2);
                                                                echo " %";
                                                            }
                                                        }
                                                        ?>
                                                    </center>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $row->DETAIL_DEN; ?></td>
                                            <?php if ($total_hari == $total_hari) {
                                                $tanggal    = $total_hari;
                                                foreach ($data->result() as $key) {
                                                    echo '<td align="center"> ' . $key->DEN . ' </td>';
                                                }
                                                while ($total_hari < $total_hari) {
                                                    $tanggal++;
                                                    echo '<td align="center"> N/A </td>';
                                                }
                                            } else {
                                                foreach ($data->result() as $key) {
                                                    echo '<td align="center"> ' . $key->DEN . ' </td>';
                                                }
                                            } ?>
                                            <td align="center"> <b><?php echo $total_den; ?></b> </td>
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