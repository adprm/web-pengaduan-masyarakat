<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-3">
        <div class="card-header">
        	From Laporkan
        </div>

        <div class="card-body">
        	<form action="<?php echo site_url('report/addReport') ?>" method="post" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="title">Nama Pelapor*</label>
                    <input class="form-control" type="text" name="name" value="<?= $user['name']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nik">NIK Pelapor*</label>
                    <input class="form-control"
                    type="text" name="nik" placeholder="Masukkan NIK" value="<?= set_value('nik'); ?>">
                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rt">RT*</label>
                            <input class="form-control"
                            type="number" name="rt" placeholder="Masukkan RT" value="<?= set_value('rt'); ?>">
                            <?= form_error('rt', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rw">RW*</label>
                            <input class="form-control"
                            type="number" name="rw" placeholder="Masukkan RW" value="<?= set_value('rw'); ?>">
                            <?= form_error('rw', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="village">Desa*</label>
                            <input class="form-control"
                            type="text" name="village" placeholder="Desa" value="<?= set_value('village'); ?>">
                            <?= form_error('village', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>                    
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">Judul Laporan*</label>
                    <input class="form-control"
                    type="text" name="title" placeholder="Judul laporan" value="<?= set_value('title'); ?>">
                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi Laporan*</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Deskripsi laporan" rows="3"></textarea>
                    <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="type">Jenis Laporan</label>
                    <select class="form-control" id="type" name="type">
                        <option value="Corona Virus">Corona Virus</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Bantuan Pangan">Bantuan Pangan</option>
                        <option value="Perekonomian">Perekonomian</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Pertanian">Pertanian</option>
                        <option value="Narkoba">Narkoba</option>
                        <option value="Tindak Kriminal">Tindak Kriminal</option>
                        <option value="Pelecehan Seksual">Pelecehan Seksual</option>
                        <option value="Bencana Alam">Bencana Alama</option>
                    </select>
                </div>
                <div class="form-group">
                <label for="file">Lampiran</label>
                    <input class="form-control-file"
                    type="file" name="file" />
                    <div class="invalid-feedback">
                        <?php echo form_error('file') ?>
                    </div>
                </div>
                <!-- button save -->
                <input class="btn btn-primary" type="submit" name="btn" value="Laporkan!" />
            </form>
        </div>

        <div class="card-footer small text-muted">
            * harus diisi
        </div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->