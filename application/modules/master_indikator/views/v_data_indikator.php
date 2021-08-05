<!-- page content -->
<div class="page-title">
    <div class="clearfix"></div>

    <?php echo $this->session->userdata('message') ?>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <a class="hiddenanchor" id="signup"></a>

                <div class="x_title">
                    <h2>Data User</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="30px"><center>No</center></th>
                                <th><center>RUANG</center></th>
                                <th><center>JENIS</center></th>
                                <th><center>DETAIL INDIKATOR</center></th>
                                <th><center>DETAIL NUMERATOR</center></th>
                                <th><center>DETAIL DENUMERATOR</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no=1;
                                foreach ($data_indikator->result() as $row) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->JENIS_INDIKATOR; ?></td>
                                <td><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                <td><?php echo $row->DETAIL_NUM; ?></td>
                                <td><?php echo $row->DETAIL_DEN; ?></td>
                                <td>
                                    <center>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah-<?php echo $row->ID; ?>">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-<?php echo $row->ID; ?>">Hapus</button>
                                    </center>
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

<?php foreach ($data_indikator->result() as $data) { ?>
    <div class="modal fade" id="ubah-<?php echo $data->ID; ?>" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ubah User !</h4>
                </div>
                <form action="<?php echo base_url() ?>upload_dokument/edit_user/" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Unit Ruang</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control" name="id_ruang" required>
                                            <option value="" disabled=""> -- Pilih Ruang -- </option>
                                            <?php foreach ($list_ruang->result() as $dd) { ?>
                                                <option value="<?php echo $dd->ID; ?>"> <?php echo $dd->NAMA_RUANG; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Jenis Indikator</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control" name="id_jenis_indikator" required>
                                            <option value="" disabled=""> -- Pilih Jenis Indikator -- </option>
                                            <?php foreach ($list_jenis_indikator->result() as $dd) { ?>
                                                <option value="<?php echo $dd->ID; ?>"> <?php echo $dd->JENIS_INDIKATOR; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Detail Indikator</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control" name="detail_indikator" rows="3" required><?php echo $data->DETAIL_INDIKATOR; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Detail Numerator</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control" name="detail_num" rows="3" required><?php echo $data->DETAIL_NUM; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Detail Denumerator</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control" name="detail_den" rows="3" required><?php echo $data->DETAIL_DEN; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Nilai Standar</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control" name="nilai_standar" value="<?php echo $data->NILAI_STANDAR; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Rumus Persen</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control" name="rumus_persen" value="<?php echo $data->RUMUS_PERSEN; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Rumus Numerator</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control" name="rumus_nume" value="<?php echo $data->RUMUS_NUM; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Rumus Denumerator</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control" name="rumus_den" value="<?php echo $data->RUMUS_DEN; ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $data->ID; ?>">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-md btn-danger"> Ya, hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapus-<?php echo $data->ID; ?>" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Perhatian !</h4>
                </div>
                <form action="<?php echo base_url() ?>upload_dokument/delete_user/" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="lokasi_folder">Apakah anda yakin akan menghapus / menonaktifkan indikator ini ?
                            </label>

                            <input type="hidden" name="id" value="<?php echo $data->ID; ?>">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-md btn-danger"> Ya, hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>