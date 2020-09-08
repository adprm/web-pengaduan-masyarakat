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
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                        </thead>
                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach($user_member as $um) : ?>
                            <tr>
                                <td><?= $index; ?></td>
                                <td><?= $um['name']; ?></td>
                                <td><?= $um['email']; ?></td>
                                <td>
                                    <?php if ($um['is_active'] == 1) {
                                        echo 'Aktif';
                                    } else {
                                        echo 'Tidak Aktif';
                                    } 
                                    ?>
                                </td>
                                <td>
                                    <a class="badge badge-info" href="<?= site_url('admin/detailmember/'.$um['id']); ?>">Detail</a>
                                    <a class="badge badge-success" href="<?= site_url('admin/editmember/'.$um['id']); ?>">Ubah</a>
                                    <a class="badge badge-danger" href="#!" onclick="deleteConfirm('<?= site_url('admin/deletemember/'.$um['id']); ?>')">Hapus</a>
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

<!-- modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
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