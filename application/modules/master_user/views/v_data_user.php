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
                                <th><center>Nama</center></th>
                                <th><center>Username</center></th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no=1;
                                foreach ($data_user->result() as $row) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->USERNAME; ?></td>
                                <td><?php echo $row->USERNAME; ?></td>
                                <td>
                                    <center>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah-<?php echo $row->id_user; ?>">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-<?php echo $row->id_user; ?>">Hapus</button>
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

<?php foreach ($data_user->result() as $data) { ?>
    <div class="modal fade" id="ubah-<?php echo $data->id_user; ?>" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ubah User !</h4>
                </div>
                <form action="<?php echo base_url() ?>upload_dokument/edit_user/" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="<?php echo $data->USERNAME; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="username" value="<?php echo $data->USERNAME; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="password">
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $data->id_user; ?>">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-md btn-danger"> Ya, hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapus-<?php echo $data->id_user; ?>" role="dialog">
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
                            <label class="control-label" for="lokasi_folder">Apakah anda yakin akan menghapus user <?php echo $data->USERNAME; ?> ?
                            </label>

                            <input type="hidden" name="id" value="<?php echo $data->id_user; ?>">
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