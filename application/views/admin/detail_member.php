<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('admin/datamember') ?>"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
            </div>
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img" src="<?= base_url('assets/img/profile/'.$member['image']); ?>" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $member['name']; ?></h5>
                            <p>
                                <?php if($member['role_id'] == 2) : ?> <?= 'Member' ?>
                                <?php else : ?> <?= 'Admin' ?> <?php endif; ?> <br>
                                <?= $member['email']; ?> <br>
                                Status? 
                                <?php if($member['is_active'] == 1) : ?> <?= 'Aktif' ?>
                                <?php else : ?> <?= 'Tidak Aktif' ?> <?php endif; ?> <br>
                            </p>
                            <p class="card-text">
                            <small class="text-muted">Bergabung sejak <?= date('d F Y' , $member['date_created']); ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->