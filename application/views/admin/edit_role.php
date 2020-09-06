<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-lg-7">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="card col-lg-7 shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('admin/role') ?>"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $role['id']; ?>" />
                    <!-- edit title -->
                	<div class="form-group">
                		<label for="menu">Nama Wewenang</label>
                		<input class="form-control" type="text" name="role" placeholder="Nama wewenang" value="<?= $role['role'] ?>" />
                	</div>
                <!-- btn -->
                <input class="btn btn-success" type="submit" name="btn" value="Ubah" />
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->