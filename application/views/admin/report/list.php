<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<!-- script modal -->
<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>

<body id="page-top">
    <!-- navbar -->
	<?php $this->load->view("admin/_partials/navbar.php") ?>

	<div id="wrapper">
        <!-- sidebar -->
		<?php $this->load->view("admin/_partials/sidebar.php") ?>
        <!-- content -->
		<div id="content-wrapper">
            <div class="container-fluid">
                <!-- url breadcrumb -->
				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						Daftar Data Laporan
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>NIK</th>
										<th>Nama</th>
										<th>Judul Laporan</th>
										<th>Tanggal</th>
                                        <th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($reports as $report): ?>
									<tr>
                                        <!-- NIK -->
										<td width="150">
											<?php echo $report->report_nik ?>
										</td>
                                        <!-- nama -->
                                        <td width="150">
											<?php echo $report->report_name ?>
										</td>
                                        <!-- judul -->
                                        <td width="150">
											<?php echo $report->report_title ?>
										</td>
                                        <!-- Tanggal -->
                                        <td width="150">
											<?php echo $report->report_date ?>
										</td>
                                        <!-- event -->
										<td width="250">
											<a href="<?php echo site_url('admin/reports/edit/'.$report->report_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/reports/delete/'.$report->report_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Delete</a>
                                            <a href="<?php echo site_url('admin/reports/detail/'.$report->report_id) ?>"
											class="btn btn-small text-success"><i class="fas fa-info-circle"></i> Detail</a>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
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
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>