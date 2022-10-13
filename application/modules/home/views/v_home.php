<div class="right_col" role="main">
	<div class="page-title">
	    <div class="clearfix"></div>

	    <?php echo $this->session->userdata('message') ?>

        <div class="x_content">
			
			<div class="row">
				<!-- <div class="col-md-6">
					<div class="panel panel-body">
						<div class="x_title">
	                    	<h4></h4>
	                  	</div>

						<div class="x_content">
							<form class="form-label-left input_mask">
								<div class="form-group row">
									<label class="col-form-label col-md-3 col-sm-3 ">Operator Input</label>
									<div class="col-md-9 col-sm-9 ">
										<input type="text" class="form-control" name="operator_input" value="" placeholder="Ketik nama lengkap dan gelarnya">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-md-3 col-sm-3 ">Kepala Ruang</label>
									<div class="col-md-9 col-sm-9 ">
										<input type="text" class="form-control" name="kepala_ruang" value="" placeholder="Ketik nama lengkap dan gelarnya">
									</div>
								</div>
								<div class="ln_solid"></div>
								<div class="form-group row">
									<div class="col-md-9 col-sm-9  offset-md-3">
										<button type="submit" class="btn btn-success">Simpan</button>
									</div>
								</div>
							</form>
							
						</div>
					</div>
				</div> -->

				<!-- <div class="col-md-6">
					<div class="panel panel-body">
						<div class="x_title">
	                    	<h4></h4>
	                  	</div>

						<div class="x_content">
							<div class="dashboard-widget-content">
								<ul class="list-unstyled timeline widget">
									<li>
										<div class="block">
											<div class="block_content">
												<h2 class="title">
													<a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
												</h2>
												<div class="byline">
													<span>13 hours ago</span> by <a>Jane Smith</a>
												</div>
												<p class="excerpt">Film festivals used to be do-or-die moments</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div> -->

              	<div class="col-md-12">
	                <div class="panel panel-body">
	                  	<div class="x_title">
	                    	<h4>Chart tahun <?= date('Y'); ?></h4>
	                  	</div>

	                  	<p>Chart progres inputan data SIIDUL tiap bulannya di tahun  <?= date('Y'); ?>.</p>
	                  	<div class="row">
		                    <div class="col-xs-2">
		                    	<p><center><b>Januari</b></center></p>
			                      <center>
			                      	<span class="chart" data-percent="<?= $jan; ?>">
			                        	<span class="percent"></span>
			                      	</span>
			                    </center>
		                    </div>
		                    <div class="col-xs-2">
		                    	<p><center><b>Februari</b></center></p>
			                    <center>
			                    	<span class="chart" data-percent="<?= $feb; ?>">
			                            <span class="percent"></span>
			                      	</span>
			                    </center>
		                    </div>
		                    <div class="col-xs-2">
		                    	<p><center><b>Maret</b></center></p>
			                    <center>
			                    	<span class="chart" data-percent="<?= $mar; ?>">
			                            <span class="percent"></span>
			                      	</span>
			                    </center>
		                    </div>
		                    <div class="col-xs-2">
		                    	<p><center><b>April</b></center></p>
			                    <center>
			                    	<span class="chart" data-percent="<?= $apr; ?>">
			                            <span class="percent"></span>
			                      	</span>
			                    </center>
		                    </div>
		                    <div class="col-xs-2">
		                    	<p><center><b>Mei</b></center></p>
			                    <center>
			                    	<span class="chart" data-percent="<?= $mei; ?>">
			                            <span class="percent"></span>
			                      	</span>
			                    </center>
		                    </div>
		                    <div class="col-xs-2">
		                    	<p><center><b>Juni</b></center></p>
			                    <center>
			                    	<span class="chart" data-percent="<?= $jun; ?>">
			                            <span class="percent"></span>
			                      	</span>
			                    </center>
		                    </div>
		                </div>
		                <hr>
		               	<div class="row">
		                    <div class="col-xs-2">
		                    	<p><center><b>Juli</b></center></p>
			                    <center>
			                    	<span class="chart" data-percent="<?= $jul; ?>">
			                            <span class="percent"></span>
			                      	</span>
			                    </center>
		                    </div>
		                    <div class="col-xs-2">
		                    	<p><center><b>Agustus</b></center></p>
			                    <center>
			                    	<span class="chart" data-percent="<?= $agt; ?>">
			                            <span class="percent"></span>
			                      	</span>
			                    </center>
		                    </div>
		                    <div class="col-xs-2">
		                    	<p><center><b>September</b></center></p>
			                    <center>
			                    	<span class="chart" data-percent="<?= $sep; ?>">
			                            <span class="percent"></span>
			                      	</span>
			                    </center>
		                    </div>
		                    <div class="col-xs-2">
		                    	<p><center><b>Oktober</b></center></p>
			                    <center>
			                    	<span class="chart" data-percent="<?= $okt; ?>">
			                            <span class="percent"></span>
			                      	</span>
			                    </center>
		                    </div>
		                    <div class="col-xs-2">
		                    	<p><center><b>November</b></center></p>
			                    <center>
			                    	<span class="chart" data-percent="<?= $nov; ?>">
			                            <span class="percent"></span>
			                      	</span>
			                    </center>
		                    </div>
		                    <div class="col-xs-2">
		                    	<p><center><b>Desember</b></center></p>
			                    <center>
			                    	<span class="chart" data-percent="<?= $des; ?>">
			                            <span class="percent"></span>
			                      	</span>
			                    </center>
		                    </div>
		                    <div class="clearfix"></div>
		                </div>
	                </div>
	            </div>
	        </div>
        </div>
	</div>
</div>