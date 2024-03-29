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
                        <?php echo form_open('rekap/capaian', 'class="form-horizontal "'); ?>
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
                                <a class="btn btn-primary" target="_blank" href="<?php echo base_url('rekap/export_capaian/') . $id_ruang_sub . '/' . $tahun; ?>">Export PDF</a>
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
                        <h2>Tabel Data Capaian Tahunan <?php echo $tahun; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table id="" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th rowspan="2" width="5">
                                            <center>NO</center>
                                        </th>
                                        <th rowspan="2" width="250">
                                            <center>INDIKATOR</center>
                                        </th>
                                        <th rowspan="2">
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
                                        $id_indikator = $row->ID;

                                    ?>
                                        <tr>
                                            <td rowspan="1" align="center"><?php echo $no++; ?></td>
                                            <td rowspan="1"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                            <td align="center"><b> <?php echo $row->NILAI_STANDAR; ?> </b></td>
                                            <td align="center">
                                                <?php
                                                if ($id_indikator == 50) {
                                                    if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_JAN / $row->DEN_JAN, 2);
                                                    }
                                                } else if ($id_indikator == 52) {
                                                    if ($row->NUM_JAN == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_JAN / $row->NUM_JAN, 2);
                                                    }
                                                } else if ($id_indikator == 53) {
                                                    if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) {
                                                        echo "00:00:00";
                                                    } else {
                                                        $average = $row->NUM_JAN / $tt_hari_jan;
                                                        $time    = $average / $row->DEN_JAN;
                                                        echo gmdate('H:i:s', floor($time * 86400));
                                                    }
                                                } else if ($id_indikator == 55) {
                                                    if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) {
                                                        echo "0";
                                                    } else {
                                                        $num_jan = $row->NUM_JAN;
                                                        $den_jan = $row->DEN_JAN;
                                                        echo round(($num_jan / $den_jan) * 1000, 2). ' permil';
                                                    }
                                                } else {
                                                    if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) {
                                                        echo "0  %";
                                                    } else {
                                                        echo substr($row->NUM_JAN / $row->DEN_JAN * 100, 0, 5) . " %";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($id_indikator == 50) {
                                                    if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_FEB / $row->DEN_FEB, 2);
                                                    }
                                                } else if ($id_indikator == 52) {
                                                    if ($row->NUM_FEB == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_FEB / $row->NUM_FEB, 2);
                                                    }
                                                } else if ($id_indikator == 53) {
                                                    if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) {
                                                        echo "00:00:00";
                                                    } else {
                                                        $average = $row->NUM_FEB / $tt_hari_feb;
                                                        $time    = $average / $row->DEN_FEB;
                                                        echo gmdate('H:i:s', floor($time * 86400));
                                                    }
                                                } else if ($id_indikator == 55) {
                                                    if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) {
                                                        echo "0";
                                                    } else {
                                                        $num_feb = $row->NUM_FEB;
                                                        $den_feb = $row->DEN_FEB;
                                                        echo round(($num_feb / $den_feb) * 1000, 2). ' permil';
                                                    }
                                                } else {
                                                    if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) {
                                                        echo "0  %";
                                                    } else {
                                                        echo substr($row->NUM_FEB / $row->DEN_FEB * 100, 0, 5) . " %";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($id_indikator == 50) {
                                                    if ($row->NUM_MAR == 0 || $row->DEN_MAR == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_MAR / $row->DEN_MAR, 2);
                                                    }
                                                } else if ($id_indikator == 52) {
                                                    if ($row->NUM_MAR == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_MAR / $row->NUM_MAR, 2);
                                                    }
                                                } else if ($id_indikator == 53) {
                                                    if ($row->NUM_MAR == 0 || $row->NUM_MAR == 0) {
                                                        echo "00:00:00";
                                                    } else {
                                                        $average = $row->NUM_MAR / $tt_hari_mar;
                                                        $time    = $average / $row->NUM_MAR;
                                                        echo gmdate('H:i:s', floor($time * 86400));
                                                    }
                                                } else if ($id_indikator == 55) {
                                                    if ($row->NUM_MAR == 0 || $row->NUM_MAR == 0) {
                                                        echo "0";
                                                    } else {
                                                        $num_mar = $row->NUM_MAR;
                                                        $den_mar = $row->DEN_MAR;
                                                        echo round(($num_mar / $den_mar) * 1000, 2). ' permil';
                                                    }
                                                } else {
                                                    if ($row->NUM_MAR == 0 || $row->NUM_MAR == 0) {
                                                        echo "0  %";
                                                    } else {
                                                        echo substr($row->NUM_MAR / $row->DEN_MAR * 100, 0, 5) . " %";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($id_indikator == 50) {
                                                    if ($row->NUM_APR == 0 || $row->DEN_APR == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_APR / $row->DEN_APR, 2);
                                                    }
                                                } else if ($id_indikator == 52) {
                                                    if ($row->NUM_APR == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_APR / $row->NUM_APR, 2);
                                                    }
                                                } else if ($id_indikator == 53) {
                                                    if ($row->NUM_APR == 0 || $row->NUM_APR == 0) {
                                                        echo "00:00:00";
                                                    } else {
                                                        $average = $row->NUM_APR / $tt_hari_apr;
                                                        $time    = $average / $row->NUM_APR;
                                                        echo gmdate('H:i:s', floor($time * 86400));
                                                    }
                                                } else if ($id_indikator == 55) {
                                                    if ($row->NUM_APR == 0 || $row->NUM_APR == 0) {
                                                        echo "0";
                                                    } else {
                                                        $num_apr = $row->NUM_APR;
                                                        $den_apr = $row->DEN_APR;
                                                        echo round(($num_apr / $den_apr) * 1000, 2). ' permil';
                                                    }
                                                } else {
                                                    if ($row->NUM_APR == 0 || $row->NUM_APR == 0) {
                                                        echo "0  %";
                                                    } else {
                                                        echo substr($row->NUM_APR / $row->DEN_APR * 100, 0, 5) . " %";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($id_indikator == 50) {
                                                    if ($row->NUM_MEI == 0 || $row->DEN_MEI == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_MEI / $row->DEN_MEI, 2);
                                                    }
                                                } else if ($id_indikator == 52) {
                                                    if ($row->NUM_MEI == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_MEI / $row->NUM_MEI, 2);
                                                    }
                                                } else if ($id_indikator == 53) {
                                                    if ($row->NUM_MEI == 0 || $row->NUM_MEI == 0) {
                                                        echo "00:00:00";
                                                    } else {
                                                        $average = $row->NUM_MEI / $tt_hari_mei;
                                                        $time    = $average / $row->NUM_MEI;
                                                        echo gmdate('H:i:s', floor($time * 86400));
                                                    }
                                                } else if ($id_indikator == 55) {
                                                    if ($row->NUM_MEI == 0 || $row->NUM_MEI == 0) {
                                                        echo "0";
                                                    } else {
                                                        $num_mei = $row->NUM_MEI;
                                                        $den_mei = $row->DEN_MEI;
                                                        echo round(($num_mei / $den_mei) * 1000, 2). ' permil';
                                                    }
                                                } else {
                                                    if ($row->NUM_MEI == 0 || $row->DEN_MEI == 0) {
                                                        echo "0  %";
                                                    } else {
                                                        echo substr($row->NUM_MEI / $row->DEN_MEI * 100, 0, 5) . " %";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($id_indikator == 50) {
                                                    if ($row->NUM_JUN == 0 || $row->DEN_JUN == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_JUN / $row->DEN_JUN, 2);
                                                    }
                                                } else if ($id_indikator == 52) {
                                                    if ($row->NUM_JUN == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_JUN / $row->NUM_JUN, 2);
                                                    }
                                                } else if ($id_indikator == 53) {
                                                    if ($row->NUM_JUN == 0 || $row->NUM_JUN == 0) {
                                                        echo "00:00:00";
                                                    } else {
                                                        $average = $row->NUM_JUN / $tt_hari_jun;
                                                        $time    = $average / $row->NUM_JUN;
                                                        echo gmdate('H:i:s', floor($time * 86400));
                                                    }
                                                } else if ($id_indikator == 55) {
                                                    if ($row->NUM_JUN == 0 || $row->NUM_JUN == 0) {
                                                        echo "0";
                                                    } else {
                                                        $num_jun = $row->NUM_JUN;
                                                        $den_jun = $row->DEN_JUN;
                                                        echo round(($num_jun / $den_jun) * 1000, 2). ' permil';
                                                    }
                                                } else {
                                                    if ($row->NUM_JUN == 0 || $row->NUM_JUN == 0) {
                                                        echo "0  %";
                                                    } else {
                                                        echo substr($row->NUM_JUN / $row->DEN_JUN * 100, 0, 5) . " %";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($id_indikator == 50) {
                                                    if ($row->NUM_JUL == 0 || $row->DEN_JUL == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_JUL / $row->DEN_JUL, 2);
                                                    }
                                                } else if ($id_indikator == 52) {
                                                    if ($row->NUM_JUL == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_JUL / $row->NUM_JUL, 2);
                                                    }
                                                } else if ($id_indikator == 53) {
                                                    if ($row->NUM_JUL == 0 || $row->NUM_JUL == 0) {
                                                        echo "00:00:00";
                                                    } else {
                                                        $average = $row->NUM_JUL / $tt_hari_jul;
                                                        $time    = $average / $row->NUM_JUL;
                                                        echo gmdate('H:i:s', floor($time * 86400));
                                                    }
                                                } else if ($id_indikator == 55) {
                                                    if ($row->NUM_JUL == 0 || $row->NUM_JUL == 0) {
                                                        echo "0";
                                                    } else {
                                                        $num_jul = $row->NUM_JUL;
                                                        $den_jul = $row->DEN_JUL;
                                                        echo round(($num_jul / $den_jul) * 1000, 2). ' permil';
                                                    }
                                                } else {
                                                    if ($row->NUM_JUL == 0 || $row->NUM_JUL == 0) {
                                                        echo "0  %";
                                                    } else {
                                                        echo substr($row->NUM_JUL / $row->DEN_JUL * 100, 0, 5) . " %";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($id_indikator == 50) {
                                                    if ($row->NUM_AGT == 0 || $row->DEN_AGT == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_AGT / $row->DEN_AGT, 2);
                                                    }
                                                } else if ($id_indikator == 52) {
                                                    if ($row->NUM_AGT == 0 || $row->NUM_AGT == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_AGT / $row->NUM_AGT, 2);
                                                    }
                                                } else if ($id_indikator == 53) {
                                                    if ($row->NUM_AGT == 0 || $row->NUM_AGT == 0) {
                                                        echo "00:00:00";
                                                    } else {
                                                        $average = $row->NUM_AGT / $tt_hari_agt;
                                                        $time    = $average / $row->NUM_AGT;
                                                        echo gmdate('H:i:s', floor($time * 86400));
                                                    }
                                                } else if ($id_indikator == 55) {
                                                    if ($row->NUM_AGT == 0 || $row->NUM_AGT == 0) {
                                                        echo "0";
                                                    } else {
                                                        $num_agt = $row->NUM_AGT;
                                                        $den_agt = $row->DEN_AGT;
                                                        echo round(($num_agt / $den_agt) * 1000, 2). ' permil';
                                                    }
                                                } else {
                                                    if ($row->NUM_AGT == 0 || $row->DEN_AGT == 0) {
                                                        echo "0  %";
                                                    } else {
                                                        echo substr($row->NUM_AGT / $row->DEN_AGT * 100, 0, 5) . " %";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($id_indikator == 50) {
                                                    if ($row->NUM_SEP == 0 || $row->DEN_SEP == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_SEP / $row->DEN_SEP, 2);
                                                    }
                                                } else if ($id_indikator == 52) {
                                                    if ($row->NUM_SEP == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_SEP / $row->NUM_SEP, 2);
                                                    }
                                                } else if ($id_indikator == 53) {
                                                    if ($row->NUM_SEP == 0 || $row->NUM_SEP == 0) {
                                                        echo "00:00:00";
                                                    } else {
                                                        $average = $row->NUM_SEP / $tt_hari_sep;
                                                        $time    = $average / $row->NUM_SEP;
                                                        echo gmdate('H:i:s', floor($time * 86400));
                                                    }
                                                } else if ($id_indikator == 55) {
                                                    if ($row->NUM_SEP == 0 || $row->NUM_SEP == 0) {
                                                        echo "0";
                                                    } else {
                                                        $num_sep = $row->NUM_SEP;
                                                        $den_sep = $row->DEN_SEP;
                                                        echo round(($num_sep / $den_sep) * 1000, 2). ' permil';
                                                    }
                                                } else {
                                                    if ($row->NUM_SEP == 0 || $row->DEN_SEP == 0) {
                                                        echo "0  %";
                                                    } else {
                                                        echo substr($row->NUM_SEP / $row->DEN_SEP * 100, 0, 5) . " %";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($id_indikator == 50) {
                                                    if ($row->NUM_OKT == 0 || $row->DEN_OKT == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_OKT / $row->DEN_OKT, 2);
                                                    }
                                                } else if ($id_indikator == 52) {
                                                    if ($row->NUM_OKT == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_OKT / $row->NUM_OKT, 2);
                                                    }
                                                } else if ($id_indikator == 53) {
                                                    if ($row->NUM_OKT == 0 || $row->NUM_OKT == 0) {
                                                        echo "00:00:00";
                                                    } else {
                                                        $average = $row->NUM_OKT / $tt_hari_okt;
                                                        $time    = $average / $row->NUM_OKT;
                                                        echo gmdate('H:i:s', floor($time * 86400));
                                                    }
                                                } else if ($id_indikator == 55) {
                                                    if ($row->NUM_OKT == 0 || $row->NUM_OKT == 0) {
                                                        echo "0";
                                                    } else {
                                                        $num_okt = $row->NUM_OKT;
                                                        $den_okt = $row->DEN_OKT;
                                                        echo round(($num_okt / $den_okt) * 1000, 2). ' permil';
                                                    }
                                                } else {
                                                    if ($row->NUM_OKT == 0 || $row->DEN_OKT == 0) {
                                                        echo "0  %";
                                                    } else {
                                                        echo substr($row->NUM_OKT / $row->DEN_OKT * 100, 0, 5) . " %";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($id_indikator == 50) {
                                                    if ($row->NUM_NOV == 0 || $row->DEN_NOV == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_NOV / $row->DEN_NOV, 2);
                                                    }
                                                } else if ($id_indikator == 52) {
                                                    if ($row->NUM_NOV == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_NOV / $row->NUM_NOV, 2);
                                                    }
                                                } else if ($id_indikator == 53) {
                                                    if ($row->NUM_NOV == 0 || $row->NUM_NOV == 0) {
                                                        echo "00:00:00";
                                                    } else {
                                                        $average = $row->NUM_NOV / $tt_hari_nov;
                                                        $time    = $average / $row->NUM_NOV;
                                                        echo gmdate('H:i:s', floor($time * 86400));
                                                    }
                                                } else if ($id_indikator == 55) {
                                                    if ($row->NUM_NOV == 0 || $row->DEN_NOV == 0) {
                                                        echo "0";
                                                    } else {
                                                        $num_nov = $row->NUM_NOV;
                                                        $den_nov = $row->DEN_NOV;
                                                        echo round(($num_nov / $den_nov) * 1000, 2). ' permil';
                                                    }
                                                } else {
                                                    if ($row->NUM_NOV == 0 || $row->DEN_NOV == 0) {
                                                        echo "0  %";
                                                    } else {
                                                        echo substr($row->NUM_NOV / $row->DEN_NOV * 100, 0, 5) . " %";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <?php
                                                if ($id_indikator == 50) {
                                                    if ($row->NUM_DES == 0 || $row->DEN_DES == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_DES / $row->DEN_DES, 2);
                                                    }
                                                } else if ($id_indikator == 52) {
                                                    if ($row->NUM_DES == 0) {
                                                        echo "0";
                                                    } else {
                                                        echo round($row->NUM_DES / $row->NUM_DES, 2);
                                                    }
                                                } else if ($id_indikator == 53) {
                                                    if ($row->NUM_DES == 0 || $row->NUM_DES == 0) {
                                                        echo "00:00:00";
                                                    } else {
                                                        $average = $row->NUM_DES / $tt_hari_des;
                                                        $time    = $average / $row->NUM_DES;
                                                        echo gmdate('H:i:s', floor($time * 86400));
                                                    }
                                                } else if ($id_indikator == 55) {
                                                    if ($row->NUM_DES == 0 || $row->DEN_DES == 0) {
                                                        echo "0";
                                                    } else {
                                                        $num_des = $row->NUM_DES;
                                                        $den_des = $row->DEN_DES;
                                                        echo round(($num_des / $den_des) * 1000, 2). ' permil';
                                                    }
                                                } else {
                                                    if ($row->NUM_DES == 0 || $row->DEN_DES == 0) {
                                                        echo "0  %";
                                                    } else {
                                                        echo substr($row->NUM_DES / $row->DEN_DES * 100, 0, 5) . " %";
                                                    }
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