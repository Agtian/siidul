<!-- page content -->
<div class="page-title">
    <div class="clearfix"></div>

    <?php echo $this->session->userdata('message') ?>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="x_panel">
        		<div class="x_title">
                    <h2>Form Tambah Indikator</h2>
                    <div class="clearfix"></div>
                </div>
        		<div class="x_content">
                    <br>
                    
                    <?php echo form_open('master_indikator/create_indikator/', 'class="form-horizontal form-label-left"'); ?>
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
                                        <textarea class="form-control" name="detail_indikator" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Detail Numerator</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control" name="detail_num" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Detail Denumerator</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control" name="detail_den" rows="3" required></textarea>
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
                                        <input type="text" class="form-control" name="nilai_standar" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Rumus Persen</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control" name="rumus_persen" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Rumus Numerator</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control" name="rumus_num" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Rumus Denumerator</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control" name="rumus_den" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-md btn-primary"> Simpan</button>
                    <?php echo form_close(); ?>

                </div>
        	</div>
        </div>
    </div>
</div>