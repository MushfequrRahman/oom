<style>
	.error {
		color: red;
	}

	em {
		color: red;
	}
</style>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="box box-danger">
									<div class="box-header with-border">
										<h3 class="box-title">Transit Mode Insert</h3>
										<div class="row">
											<div class="col-sm-12 col-md-12 col-lg-12">
												<?php if ($responce = $this->session->flashdata('Successfully')) : ?>
													<div class="text-center">
														<div class="alert alert-success text-center"><?php echo $responce; ?></div>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="box-body">
										<form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/transitmode_insert" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label>Transit type<em>*</em></label>
												<select class="form-control" name="ttid" id="ttid">
													<option value="">Select....</option>
													<?php
													foreach ($ul as $row) {
													?>
														<option value="<?php echo $row['ttid']; ?>"><?php echo $row['transittype']; ?></option>
													<?php
													}
													?>
												</select>
												<?php echo form_error('ttid', '<div class="error">', '</div>');  ?>
											</div>
											<div class="form-group">
												<label>Transit Mode<em>*</em></label>
												<input type="text" class="form-control" name="transitmode" placeholder="Enter Transit Mode">
												<?php echo form_error('transitmode', '<div class="error">', '</div>');  ?>
											</div>
											<div class="box-footer text-center">
												<input type="submit" class="btn btn-primary" name="submit" value="Submit" />
											</div>
									</div>


									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		</section>
	</div>
</body>

</html>