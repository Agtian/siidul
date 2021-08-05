<div class="right_col" role="main">
    <div class="page-title">
        <div class="clearfix"></div>

        <?php echo $this->session->userdata('message') ?>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <a class="hiddenanchor" id="signup"></a>

                    <div class="x_title">
                        <h2>Data Ruang</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="30px"><center>No</center></th>
                                    <th><center>Ruang</center></th>
                                    <th><center>Nama Kepala Ruang</center></th>
                                    <th><center>Aksi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($data_ruang->result() as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->NAMA_RUANG; ?></td>
                                    <td><?php echo $row->NAMA_KEPALA_RUANG; ?></td>
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

    <?php foreach ($data_ruang->result() as $data) { ?>
        <div class="modal fade" id="ubah-<?php echo $data->ID; ?>" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ubah Ruang </h4>
                    </div>
                    <form action="<?php echo base_url() ?>upload_dokument/edit_user/" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ruang<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="nama_ruang" value="<?php echo $data->NAMA_RUANG; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kepala Ruang <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="nama_kepala_ruang" value="<?php echo $data->NAMA_KEPALA_RUANG; ?>">
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
                                <label class="control-label" for="lokasi_folder">Apakah anda yakin akan menghapus ruang <?php echo $data->NAMA_RUANG; ?> ?
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
</div>