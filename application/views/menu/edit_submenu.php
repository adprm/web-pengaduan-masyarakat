<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-lg-7">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <div class="card col-lg-7 shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('menu/submenu') ?>"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $submenu['id']; ?>" />
                <div class="form-group">
                    <label for="menu">Nama Submenu</label>
                    <input class="form-control" type="text" name="title" placeholder="Nama menu" value="<?= $submenu['title'] ?>" />
                </div>
                <div class="form-group">
                    <label for="menu">Menu</label>
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="">Pilih Menu</option>
                        <?php foreach ($menu as $m) : ?>
                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu">Url Submenu</label>
                    <input class="form-control" type="text" name="url" placeholder="Nama menu" value="<?= $submenu['url'] ?>" />
                </div>
                <div class="form-group">
                    <label for="menu">Ikon Submenu</label>
                    <input class="form-control" type="text" name="icon" placeholder="Nama menu" value="<?= $submenu['icon'] ?>" />
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active">
                        <label class="form-check-label" for="is_active">
                            Active?
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