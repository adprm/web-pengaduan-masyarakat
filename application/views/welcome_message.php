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
            <?php $this->load->view("_includes/form.php") ?>
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

</html>