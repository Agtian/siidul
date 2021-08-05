<!-- page content -->
<div class="page-title">
    <div class="clearfix"></div>

    <?php echo $this->session->userdata('message') ?>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="x_panel">
        		<div class="x_title">
                    <h2>Filter Data Indikator</h2>
                    <div class="clearfix"></div>
                </div>
        		<div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Unit Ruang</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="id_ruang" required>
                                            <option value="" disabled=""> -- Pilih Ruang -- </option>
                                            <?php foreach ($list_ruang->result() as $dd) { ?>
                                                <option value="<?php echo $dd->ID; ?>"> <?php echo $dd->NAMA_RUANG; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-md btn-primary">Tampilkan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>