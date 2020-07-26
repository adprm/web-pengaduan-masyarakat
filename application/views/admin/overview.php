<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

		<!-- Icon Cards-->
		<div class="row pt-5">
			<div class="col-xl-4 col-sm-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo base_url('assets/report.jpg') ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Data Laporan</p>
                        <a href="#" class="btn btn-primary">View Details <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-sm-8 mb-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-chart-area"></i>
                        Visitor Stats</div>
                        <div class="card-body">
                            <canvas id="myAreaChart" width="100%" height="35"></canvas>
                        </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
		    </div>
		</div>

		<!-- Area Chart Example-->

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
