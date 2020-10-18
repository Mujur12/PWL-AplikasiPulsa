<div class="col-md-3">
    <div class="card-header">
        <h4>Update Nominal</h4>
    </div>
    <div class="card-body">
        <form id="form-update-nominal" enctype="multipart/form-data" method="post"
            action="<?= site_url("nominal/proses_update") ?>">
            <div class="form-group">
                <label for="kode-nominal">Kode Nominal</label>
                <input value="<?= $nominal->kode_nominal_pulsa ?>" required type="text" maxlength="20" name="kode"
                    id="kode-nominal" class="form-control" />
            </div>
            <div class="form-group">
                <label for="nominal">Nominal</label>
                <input value="<?= $nominal->nominal_pulsa ?>" required type="text" name="nominal" id="nominal"
                    class="form-control" />
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input value="<?= $nominal->harga_pulsa ?>" required type="text" name="harga" id="harga"
                    class="form-control" />
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input value="<?= $nominal->stock_pulsa ?>" required type="text" name="stock" id="stock" class="form-control" />
            </div>


            <input type="hidden" name="id" value="<?= $nominal->id_nominal ?>" />
        </form>
    </div>
    <div class="card-footer">
        <button id="btn-update-nominal" type="button" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
        </button>
    </div>
</div>
<script>
$(function() {
    $("#btn-update-nominal").on("click", function() {
        let validate = $("#form-update-nominal").valid();
        if (validate) {
            $("#form-update-nominal").submit();
        }
    });
    $("#form-update-nominal").validate({
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
