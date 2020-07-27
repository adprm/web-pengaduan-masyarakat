<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">
    <!-- laod navbar -->
	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">
        <!-- load sidebar -->
		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">
			<div class="container-fluid">
                <!-- load breadcrumb -->
				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                <!-- notifikasi sukses -->
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/reports/') ?>"><i class="fas fa-arrow-left"></i>Back</a>
					</div>
					<div class="card-body">
						<form action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="report_id" value="<?php echo $report->report_id?>" />
                            <!-- NIK -->
							<div class="form-group">
								<label for="report_nik">NIK *</label>
								<input class="form-control <?php echo form_error('report_nik') ? 'is-invalid':'' ?>"
								 type="number" name="report_nik" placeholder="NIK" value="<?php echo $report->report_nik ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('report_nik') ?>
								</div>
							</div>
                            <!-- nama -->
                            <div class="form-group">
								<label for="report_name">Nama *</label>
								<input class="form-control <?php echo form_error('report_name') ? 'is-invalid':'' ?>"
								 type="text" name="report_name" placeholder="Nama " value="<?php echo $report->report_name ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('report_name') ?>
								</div>
							</div>
                            <!-- RTRW -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="report_rt">RT *</label>
                                    <input class="form-control <?php echo form_error('report_rt') ? 'is-invalid':'' ?>"
                                    type="number" name="report_rt" placeholder="RT " value="<?php echo $report->report_rt ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('report_rt') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="report_rw">RW *</label>
                                    <input class="form-control <?php echo form_error('report_rw') ? 'is-invalid':'' ?>"
                                    type="number" name="report_rw" placeholder="RW " value="<?php echo $report->report_rw ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('report_rw') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- title -->
                            <div class="form-group">
								<label for="report_title">Judul Laporan *</label>
								<input class="form-control <?php echo form_error('report_title') ? 'is-invalid':'' ?>"
								 type="text" name="report_title" placeholder="Judul Laporan " value="<?php echo $report->report_title ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('report_title') ?>
								</div>
							</div>
                            <!-- desc -->
                            <div class="form-group">
								<label for="name">Isi Laporan *</label>
								<textarea class="form-control <?php echo form_error('report_desc') ? 'is-invalid':'' ?>"
								 name="report_desc" placeholder="Isi Laporan"><?php echo $report->report_desc ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('report_desc') ?>
								</div>
							</div>
                            <!-- date -->
                            <div class="form-group">
								<label for="report_date">Tanggal *</label>
								<input class="form-control <?php echo form_error('report_date') ? 'is-invalid':'' ?>"
								 type="date" name="report_date" min="0" placeholder="Tanggal" value="<?php echo $career->report_date ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('report_date') ?>
								</div>
							</div>
                            <!-- input file -->
							<div class="form-group">
								<label for="name">Lampiran</label>
								<input class="form-control-file <?php echo form_error('report_file') ? 'is-invalid':'' ?>"
								 type="file" name="report_file" />
								<input type="hidden" name="old_file" value="<?php echo $report->report_file ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('report_file') ?>
								</div>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>
					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>
				</div>
				<!-- /.container-fluid -->
				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>
			</div>
			<!-- /.content-wrapper -->
		</div>
		<!-- /#wrapper -->
<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>