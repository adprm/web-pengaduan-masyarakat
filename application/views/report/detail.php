<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card col-md-8 shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('report') ?>"><i class="fas fa-arrow-left"></i> Kembali</a></h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama Pelapor</label>
                <input class="form-control" type="text" name="name" value="<?= $report['name']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input class="form-control" type="text" name="nik" value="<?= $report['nik']; ?>" readonly>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input class="form-control" type="text" name="rt" value="<?= $report['rt']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input class="form-control" type="text" name="rw" value="<?= $report['rw']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="village">Desa</label>
                <input class="form-control" type="text" name="village" value="<?= $report['village']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="title">Judul Laporan</label>
                <input class="form-control" type="text" name="title" value="<?= $report['title']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi Laporan*</label>
                <textarea class="form-control" id="description" name="description" rows="3" readonly><?= $report['description']; ?></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type">Jenis Laporan</label>
                        <input class="form-control" type="text" name="type" value="<?= $report['type']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_reported">Dilaporkan Pada</label>
                        <input class="form-control" type="text" name="date_reported" value="<?= date('d F Y' , $report['date_reported']); ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a target="_blank" class="badge badge-info" href="<?= base_url('assets/img/report/').$report['file']; ?>">Cek lampiran</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->