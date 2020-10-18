<div class="card">
    <div class="card-header">
        <h4>Tambah Pelanggan</h4>
    </div>
    <div class="card-body">
        <form id="form-update-pelanggan" enctype="multipart/form-data" method="post"
            action="<?= site_url("pelanggan/proses_update") ?>">
            <div class="form-group">
                <label for="kode-pelanggan">Kode Pelanggan</label>
                <input value="<?= $pelanggan->kode_pelanggan ?>" required type="text" maxlength="20" name="kode" id="kode-pelanggan" class="form-control" />
            </div>
            <div class="form-group">
                <label for="nama-pelanggan">Nama Pelanggan</label>
                <input value="<?= $pelanggan->nama_pelanggan ?>" required type="text" name="nama" id="nama-pelanggan" class="form-control" />
            </div>
            <div class="form-group">
                <label for="alamat-pelanggan">Alamat</label>
                <input value="<?= $pelanggan->alamat_pelanggan ?>" required type="text" name="alamat" id="alamat-pelanggan" class="form-control" />
            </div>
            <div class="form-group">
                <label for="no-telp">No. Telp</label>
                <input value="<?= $pelanggan->no_telp ?>" required type="text" name="noHp" id="no-telp" class="form-control" />
			</div>
			
            <input type="hidden" name="id" value="<?= $pelanggan->id_pelanggan ?>" />
        </form>
    </div>
    <div class="card-footer">
        <button id="btn-save-pelanggan" type="button" class="btn btn-success">
            <i class="fas fa-save"></i> Save
        </button>
    </div>
</div>
<script>
$(function() {
    $("#btn-save-pelanggan").on("click", function() {
        let validate = $("#form-update-pelanggan").valid();
        if (validate) {
            $("#form-update-pelanggan").submit();
        }
    });
    $("#form-update-pelanggan").validate({
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