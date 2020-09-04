<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-lg-7">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $menu['id']; ?>" />
                    <!-- edit title -->
                	<div class="form-group">
                		<label for="menu">Name menu</label>
                		<input class="form-control" type="text" name="menu" placeholder="Name menu" value="<?= $menu['menu'] ?>" />
                	</div>
                <!-- btn -->
                <input class="btn btn-success" type="submit" name="btn" value="Update" />
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->