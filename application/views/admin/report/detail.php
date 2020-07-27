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
								<label for="report_nik">NIK</label>
								<input class="form-control"
								 type="number" name="report_nik" placeholder="NIK" value="<?php echo $report->report_nik ?>" disabled />
							</div>
                            <!-- nama -->
                            <div class="form-group">
								<label for="report_name">Nama</label>
								<input class="form-control"
								 type="text" name="report_name" placeholder="Nama " value="<?php echo $report->report_name ?>" disabled />
							</div>
                            <!-- RTRW -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="report_rt">RT</label>
                                    <input class="form-control"
                                    type="number" name="report_rt" placeholder="RT " value="<?php echo $report->report_rt ?>" disabled />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="report_rw">RW</label>
                                    <input class="form-control"
                                    type="number" name="report_rw" placeholder="RW " value="<?php echo $report->report_rw ?>" disabled />
                                </div>
                            </div>
                            <!-- title -->
                            <div class="form-group">
								<label for="report_title">Judul Laporan</label>
								<input class="form-control"
								 type="text" name="report_title" placeholder="Judul Laporan " value="<?php echo $report->report_title ?>" disabled />
							</div>
                            <!-- desc -->
                            <div class="form-group">
								<label for="name">Isi Laporan</label>
								<textarea class="form-control"
								 name="report_desc" disabled placeholder="Isi Laporan"><?php echo $report->report_desc ?></textarea>
							</div>
                            <!-- date -->
                            <div class="form-group">
								<label for="report_date">Tanggal</label>
								<input class="form-control"
								 type="date" name="report_date" min="0" placeholder="Tanggal" value="<?php echo $report->report_date ?>" disabled />
							</div>
                            <!-- file -->
                            <div class="form-group">
                                <label for="report_file">Lampiran <label>
                                <img src="<?php echo base_url('upload/report/'.$report->report_file) ?>" width="64" />
                            </div>
						</form>
					</div>

					<div class="card-footer small text-muted">
					 required fields
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