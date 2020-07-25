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
        <?php $this->load->view("_includes/form.php") ?>
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
  </body>
    <script>
        $('.toast').toast('show');
        AOS.init();
	</script>
</body>

</html>