<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_includes/head.php") ?>
</head>

<body id="page-top">
    <!-- Navigation-->
    <?php $this->load->view("_includes/navbar.php") ?>
    <!-- Masthead-->
    <?php $this->load->view("_includes/toast.php") ?>
    <?php $this->load->view("_includes/header.php") ?>
    <!-- form report-->
    <section class="page-section" id="reports">
        <div class="container">
            <h2 class="text-center mt-0">Isi Formulir Laporan</h2>
            <hr class="divider my-4 bg-primary" />
            <div class="container report">
                <form action="<?php echo site_url('welcome/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-row pt-4">
                        <!-- nik -->
                        <div class="form-group col-md-6">
                            <input type="number" class="form-control <?php echo form_error('report_nik') ? 'is-invalid':'' ?>" 
                            name="report_nik" placeholder="Ketik NIK Anda *">
                            <div class="invalid-feedback">
						        <?php echo form_error('report_nik') ?>
					        </div>
                        </div>
                        <!-- name -->
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control <?php echo form_error('report_name') ? 'is-invalid':'' ?>" 
                            name="report_name" placeholder="Ketik Nama Anda *">
                            <div class="invalid-feedback">
						        <?php echo form_error('report_name') ?>
						    </div>
                        </div>
                    </div>
                    <!-- RT RW -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="number" class="form-control <?php echo form_error('report_rt') ? 'is-invalid':'' ?>" 
                            name="report_rt" placeholder="RT *">
                            <div class="invalid-feedback">
								<?php echo form_error('report_rt') ?>
							</div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="number" class="form-control <?php echo form_error('report_rw') ? 'is-invalid':'' ?>" 
                            name="report_rw" placeholder="RW *">
                            <div class="invalid-feedback">
								<?php echo form_error('report_rw') ?>
							</div>
                        </div>
                    </div>
                    <!-- title -->
                    <div class="form-group">
                        <input type="text" class="form-control <?php echo form_error('report_title') ? 'is-invalid':'' ?>" 
                        name="report_title" placeholder="Ketik Judul Laporan *">
                        <div class="invalid-feedback">
							<?php echo form_error('report_title') ?>
						</div>
                    </div>
                    <!-- desc -->
                    <div class="form-group">
                        <textarea class="form-control <?php echo form_error('report_desc') ? 'is-invalid':'' ?>"
                        name="report_desc" rows="6" placeholder="Ketik Isi Laporan Anda... *"></textarea>
                        <div class="invalid-feedback">
                        	<?php echo form_error('report_desc') ?>
                        </div>
                    </div>
                    <!-- date -->
                    <div class="form-group">
                        <label for="report_date" class="text-white">Pilih Tanggal Kejadian *</label>
                        <input class="form-control <?php echo form_error('report_date') ? 'is-invalid':'' ?>"
                         type="date" name="report_date" min="0" placeholder="Tanggal Kejadian" />
                        <div class="invalid-feedback">
                        	<?php echo form_error('report_date') ?>
                        </div>
                    </div>
                    <!-- file -->
                    <div class="form-group text-white">
                        <label for="report_file">Lampiran (Opsional)</label>
                        <input class="form-control-file <?php echo form_error('report_file') ? 'is-invalid':'' ?>"
                         type="file" name="report_file" />
                        <div class="invalid-feedback">
                        	<?php echo form_error('report_file') ?>
                        </div>
		            </div>
                    <input class="btn btn-warning mb-4" type="submit" name="btn" value="Laporkan!" />
                </form>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="page-section bg-info" id="contact">
        <div class="container">
            <?php $this->load->view("_includes/contact.php") ?>
        </div>
    </section>
    <!-- Footer-->
    <?php $this->load->view("_includes/footer.php") ?>
	<!-- js -->
    <?php $this->load->view("_includes/js.php") ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
    <script>
		$('.toast').toast('show');
	</script>
</body>

<style>
    .report {
        background-color: #32a1e8;
        border-radius: 10px;
        -webkit-box-shadow: 0px 0px 36px -13px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0px 0px 36px -13px rgba(0, 0, 0, 0.75);
        box-shadow: 0px 0px 36px -13px rgba(0, 0, 0, 0.75);
    }

    #reports {
        background-image: url('assets/bg-report.png');
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
    }
</style>

</html>