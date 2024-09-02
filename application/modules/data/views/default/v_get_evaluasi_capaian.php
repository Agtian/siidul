<div class="card bg-light d-flex flex-fill">
    <div class="card-header border-bottom-0" style="font-size: x-large;font-weight: bold;">
        Hasil Capaian Evaluasi Bulan <?php echo $bulan . ' '.  $tahun; ?>
    </div>

    <div class="card-body pt-0">
        <div class="row">
            <div class="col-12">
                <table id="tabel" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Indikator</th>
                            <th>Nilai Standard</th>
                            <th>Faktor Pendorong</th>
                            <th>Faktor Penghambat</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        //date_default_timezone_set('asia/jakarta');
                        if (!empty($datas)) {
                            foreach ($datas as $data) {
                                // print_r($data['noKartu']);
                                // die();
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data->DETAIL_INDIKATOR; ?></td>
                                    <td><?php echo $data->NILAI_STANDAR; ?></td>
                                    <td><?php echo $data->FAKTOR_PENDORONG; ?></td>
                                    <td><?php echo $data->FAKTOR_PENGHAMBAT; ?></td>


                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
    </div>
</div>

<style>
    /* CSS */
    .dt-button {
        background-color: initial;
        background-image: linear-gradient(-180deg, #00D775, #00BD68);
        border-radius: 5px;
        box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-family: Inter, -apple-system, system-ui, Roboto, "Helvetica Neue", Arial, sans-serif;
        height: 44px;
        line-height: 44px;
        outline: 0;
        overflow: hidden;
        padding: 0 20px;
        pointer-events: auto;
        position: relative;
        text-align: center;
        touch-action: manipulation;
        user-select: none;
        -webkit-user-select: none;
        vertical-align: top;
        white-space: nowrap;
        z-index: 9;
        border: none;
    }

    .dt-button:hover {
        background: #00bd68;
    }

    .dt-button,
    .buttons.print:focus {
        border: none;
    }
</style>
<script type="text/javascript">
    $('#tabel9').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        dom: 'lBfrtip',
        buttons: [
            'excel', 'print'
        ]
    });

    $('#tabel').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        dom: 'lBfrtip',
        buttons: [
            'excel', 'print'
        ]
    });


    // ADDER FUNCTION TO ENABLE SORT NUMERIC
    jQuery.extend(jQuery.fn.dataTableExt.oSort, {
        "formatted-num-pre": function(a) {
            a = (a === "-" || a === "") ? 0 : a.replace(/[^\d\-\.]/g, "");
            return parseFloat(a);
        },

        "formatted-num-asc": function(a, b) {
            return a - b;
        },

        "formatted-num-desc": function(a, b) {
            return b - a;
        }
    });

    var ruang = '<?php echo $this->session->userdata("user_nama"); ?>';


    document.getElementById("titleWeb").text = "Hasil Capaian Bulan " + "<?php echo '# ' . $bulan; ?>" + "# Tahun " +
        "<?php echo '# ' . $tahun; ?>" + " Ruang " + ruang;
</script>