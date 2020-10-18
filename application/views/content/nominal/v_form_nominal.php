<div class="col-md-3">
    <div class="card-header">
        <h4>Tambah Nominal</h4>
    </div>
    <div class="card-body">
        <form id="form-tambah-nominal" enctype="multipart/form-data" method="post"
            action="<?= site_url("nominal/proses_simpan") ?>">
            <div class="form-group">
                <label for="kode-nominal">Kode Nominal</label>
                <input required type="text" maxlength="20" name="kode" id="kode-nominal" class="form-control" />
            </div>
            <div class="form-group">
                <label for="nominal">Nominal</label>
                <input required type="text" name="nominal" id="nominal" class="form-control" />
			</div>
			<div class="form-group">
                <label for="harga">Harga</label>
                <input required type="text" name="harga" id="harga" class="form-control" />
            </div>
			<div class="form-group">
                <label for="stock">Stock</label>
                <input required type="text" name="stock" id="stock" class="form-control" />
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button id="btn-save-nominal" type="button" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
        </button>
    </div>
</div>
<script>
$(function() {
    $("#btn-save-nominal").on("click", function() {
        let validate = $("#form-tambah-nominal").valid();
        if (validate) {
            $("#form-tambah-nominal").submit();
        }
    });
    $("#form-tambah-nominal").validate({
        rules: {
            kode: {
                alphanumeric: true
            },
            harga: {
                digits: true
            },
            nominal: {
                digits: true
            }
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
