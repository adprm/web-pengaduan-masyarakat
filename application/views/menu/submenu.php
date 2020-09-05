<script>
    function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php if (validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
    </div>
    <?php endif; ?>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="" data-toggle="modal" data-target="#newSubmenuModal"><i class="fas fa-plus"></i> Tambah Submenu</a></h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul Submenu</th>
                                    <th>Menu</th>
                                    <th>url</th>
                                    <th>Ikon</th>
                                    <th>Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                        </thead>
                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach($submenu as $sm) : ?>
                            <tr>
                                <td><?= $index; ?></td>
                                <td><?= $sm['title']; ?></td>
                                <td><?= $sm['menu']; ?></td>
                                <td><?= $sm['url']; ?></td>
                                <td><?= $sm['icon']; ?></td>
                                <td><?= $sm['is_active']; ?></td>
                                <td>
                                    <a class="badge badge-success" href="<?= site_url('menu/editSubMenu/'.$sm['id']); ?>">Ubah</a>
                                    <a class="badge badge-danger" href="#!" onclick="deleteConfirm('<?= site_url('menu/deleteSubMenu/'.$sm['id']); ?>')">Hapus</a>
                                </td>
                            </tr>
                        <?php $index++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal add new submenu-->
<div class="modal fade" id="newSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubmenuModalLabel">Tambah Menu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- form -->
      <form action="<?= site_url('menu/addSubMenu'); ?>" method="post">
        <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Judul Submenu">
            </div>
            <div class="form-group">
                <select name="menu_id" id="menu_id" class="form-control">
                    <option value="">Pilih Menu</option>
                    <?php foreach($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="Url Submenu">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Ikon Submenu">
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                <label class="form-check-label" for="is_active">
                  Aktif?
                </label>
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-left-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apa Anda Yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang sudah dihapus tidak dapat dikembalikan!</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>