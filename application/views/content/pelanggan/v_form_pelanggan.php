<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Pelanggan</h4>
        </div>
        <div class="card-body">
            <form id="form-tambah-pelanggan" enctype="multipart/form-data" method="post"
                action="<?= site_url("pelanggan/proses_simpan") ?>">
                <div class="form-group">
                    <label for="kode-pelanggan">Kode Pelanggan</label>
                    <input required type="text" maxlength="20" name="kode" id="kode-pelanggan" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="nama-pelanggan">Nama Pelanggan</label>
                    <input required type="text" name="nama" id="nama-pelanggan" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="alamat-pelanggan">Alamat</label>
                    <input required type="text" name="alamat" id="alamat-pelanggan" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="no-telp">No. Telp</label>
                    <input required type="text" name="noHp" id="no-telp" class="form-control" />
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button id="btn-save-pelanggan" type="button" class="btn btn-success">
                <i class="fas fa-save"></i> Save
            </button>
        </div>
    </div>
</div>
<script>
$(function() {
    $("#btn-save-pelanggan").on("click", function() {
        let validate = $("#form-tambah-pelanggan").valid();
        if (validate) {
            $("#form-tambah-pelanggan").submit();
        }
    });
    $("#form-tambah-pelanggan").validate({
        rules: {
            kode: {
                alphanumeric: true
            },
            noHp: {
                digits: true
            },
        },
        messages: {
            kode: {
                alphanumeric: "Hanya Boleh Angka, Huruf dan Undescore"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>