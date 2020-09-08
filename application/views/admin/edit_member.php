<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-lg-7">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="card col-lg-7 shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('admin/datamember') ?>"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $member['id']; ?>" />
                    <!-- edit title -->
                	<div class="form-group">
                		<label for="name">Nama Pengguna</label>
                		<input class="form-control" type="text" name="name" value="<?= $member['name'] ?>" readonly/>
                	</div>
                	<div class="form-group">
                		<label for="email">Email Pengguna</label>
                		<input class="form-control" type="text" name="email" value="<?= $member['email'] ?>" readonly/>
                	</div>
                    <div class="form-group">
                        <label for="role_id">Wewenang Pengguna</label>
                        <select class="form-control" id="role_id" name="role_id">
                            <option value="2">
                            <?php
                                if ($member['role_id'] == 2) {
                                    echo 'Member';
                                } else {
                                    echo 'Admin';
                                }
                            ?>
                            </option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                		<label for="date_created">Bergabung Sejak</label>
                		<input class="form-control" type="text" name="date_created" value="<?= date('d F Y' , $member['date_created']); ?>" readonly/>
                	</div>
                    <div class="form-group">
                        <div class="form-check">
                            <?php if ($member['is_active'] == 1) : ?>
                                <?= '<input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>' ?>
                            <?php else : ?>
                                <?= '<input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active">' ?>
                            <?php endif; ?>
                            <label class="form-check-label" for="is_active">
                            Aktif?
                            </label>
                        </div>
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