<h2 class="text-center mt-0">Isi Formulir Laporan</h2>
<hr class="divider my-4 bg-primary" />
<div class="container report">
    <form>
        <div class="form-group pt-4">
           <input type="number" class="form-control" id="inputNIK" placeholder="Ketik NIK Anda *">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="inputName" placeholder="Ketik Nama Anda *">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="number" class="form-control" id="inputRT" placeholder="RT *">
            </div>
            <div class="form-group col-md-6">
                <input type="number" class="form-control" id="inputPassword4" placeholder="RW *">
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="inputTitle"
                placeholder="ketik Judul Laporan Anda! *">
        </div>
        <div class="form-group">
            <textarea class="form-control" aria-label="With textarea" rows="6"
                placeholder="Ketik Isi Laporan Anda! *"></textarea>
        </div>
        <div class="form-group">
            <label for="inpuetDate" class="text-white">Pilih Tanggal Kejadian *</label>
            <input type="date" class="form-control" id="inputDate">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">File</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">MAX 2 MB</label>
            </div>
        </div>
        <button type="submit" class="btn btn-warning mb-4">Laporkan!</button>
    </form>
</div>

<style>
    .report {
        background-color: #32a1e8;
        border-radius: 10px;
        -webkit-box-shadow: 0px 0px 36px -13px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0px 0px 36px -13px rgba(0, 0, 0, 0.75);
        box-shadow: 0px 0px 36px -13px rgba(0, 0, 0, 0.75);
    }

    #reports {
        background-image: url('assets/bg-report.png');
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
    }
</style>