<!-- page content -->
<div class="page-title">
    <div class="clearfix"></div>

    <?php echo $this->session->userdata('message') ?>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="x_panel">
        		<div class="x_title">
                    <h2>Form Tambah User</h2>
                    <div class="clearfix"></div>
                </div>
        		<div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left">

                      	<div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit Ruang</label>
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
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
	                        <div class="col-md-9 col-sm-9 col-xs-12">
	                          	<input type="text" class="form-control" name="nama" required>
                        	</div>
                        </div>
                        <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
	                        <div class="col-md-9 col-sm-9 col-xs-12">
	                          	<input type="text" class="form-control" required>
                        	</div>
                        </div>
                        <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
	                        <div class="col-md-9 col-sm-9 col-xs-12">
	                          	<input type="text" class="form-control" required>
                        	</div>
                        </div>
                        <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Akses</label>
	                        <div class="col-md-9 col-sm-9 col-xs-12">
	                          	<select class="form-control" name="id_ruang" required>
	                          		<option value="" disabled=""> -- Pilih Akses -- </option>
	                          		<?php foreach ($list_akses->result() as $dd) { ?>
	                          			<option value="<?php echo $dd->ID; ?>"> <?php echo $dd->AKSES; ?> </option>
	                          		<?php } ?>
	                          	</select>
                        	</div>
                        </div>
                    </form>
                </div>
        	</div>
        </div>
    </div>
</div>