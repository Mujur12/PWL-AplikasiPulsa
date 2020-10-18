<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5>Pilih Pelanggan</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Pilih Pelanggan</label>
                    <select name="" class="form-control" id="select-pelanggan">
                        <option value="" disabled selected><i>pilih pelanggan</i></option>
                        <?php
						foreach ($pelanggans as $n) {
							echo "<option data-nama='$n->nama_pelanggan' "
								. "data-alamat='$n->alamat_pelanggan' "
								. "data-kode='$n->kode_pelanggan' "
								. "data-telp='$n->no_telp' "
								. "value='$n->id_pelanggan'> "
								. "$n->kode_pelanggan / $n->nama_pelanggan"
								. "</option>";
						}
						?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">No. Telp</label>
                    <input readonly type="text" id="no-telp" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input readonly type="text" id="nama-pelanggan" class="form-control" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                <h5>Pilih Nominal</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Pilih Nominal</label>
                    <select name="" class="form-control" id="select-nominal">
                        <option value="" disabled selected><i>pilih nominal</i></option>
                        <?php
						foreach ($nominals as $n) {
							echo "<option data-nominal='$n->nominal_pulsa' "
								. "data-harga='$n->harga_pulsa' "
								. "data-kode='$n->kode_nominal_pulsa' "
								. "value='$n->id_nominal'> "
								. "$n->kode_nominal_pulsa / $n->nominal_pulsa"
								. "</option>";
						}
						?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kode Nominal</label>
                    <input readonly type="text" id="kode-nominal" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="">Nominal Pulsa</label>
                    <input readonly type="text" id="nominal-pulsa" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="">Harga Pulsa</label>
                    <input readonly type="text" id="harga-pulsa" class="form-control" />
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary float-right" id="btn-add-item">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Item Transaksi</h5>
            </div>
            <div class="card-body">
                <table id="table-item" class="table">
                    <thead>
                        <tr>
                            <th>No. Telp</th>
                            <th>Nama Pelanggan</th>
                            <th>Kode</th>
                            <th>Nominal</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <button type="button" id="btn-save-transaksi" class="btn btn-primary float-right">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>
<script>
$(function() {
    let pelanggan;
    let nominal;
    $("#select-nominal")
        .select2()
        .on("change", function() {
            var optionSelected = $(this).children("option:selected");
            $("#kode-nominal").val(optionSelected.data("kode"));
            $("#nominal-pulsa").val(optionSelected.data("nominal"));
            $("#harga-pulsa").val(optionSelected.data("harga"));
        });
    $("#select-pelanggan")
        .select2()
        .on("change", function() {
            var optionSelected = $(this).children("option:selected");
            $("#no-telp").val(optionSelected.data("telp"));
            $("#nama-pelanggan").val(optionSelected.data("nama"));
        });


    $("#btn-add-item").on("click", function() {
        let id = $("#select-nominal").val();
        let noTelp = $("#no-telp").val();
        let noPelanggan = $("#nama-pelanggan").val();
        let kodeNominal = $("#kode-nominal").val();
        let nominalPulsa = $("#nominal-pulsa").val();
        let hargaPulsa = $("#harga-pulsa").val();

        if (kodeNominal != "") {
            let tr = `<tr data-id="${id}">`;
            tr += `<td>${noTelp}</td>`;
            tr += `<td>${noPelanggan}</td>`;
            tr += `<td>${kodeNominal}</td>`;
            tr += `<td>${nominalPulsa}</td>`;
            tr += `<td>${hargaPulsa}</td>`;
            tr += `<td>`;
            tr +=
                `<button class="btn btn-xs btn-del-item btn-danger"> <i class="fas fa-trash"></i></button>`;
            tr += `</td>`;
            tr += `</tr>`;
            $("#table-item tbody").append(tr);
            $("#select-nominal").val("").trigger("change");
            $("#select-pelanggan").val("").trigger("change");
            $("#kode-nominal").val();
            $("#nominal-pulsa").val();
            $("#harga-pulsa").val();
            $(".btn-del-item").on("click", function() {
                $(this).parent().parent().remove();
            });
        }
    });
    $("#btn-save-transaksi").on("click", function() {
        $.LoadingOverlay("show");
        let rows = $("#table-item tbody tr");
        let itemTransaksi = [];
        rows.each(function() {
            let row = $(this);
            let item = {
                id_nominal: row.data("id"),
                nominal_item_transaksi: row.children().eq(3).text(),
                harga_item_transaksi: row.children().eq(4).text(),
            };
            itemTransaksi.push(item);
        });
        let dataKirim = JSON.stringify(itemTransaksi);
        $.ajax({
            url: window.base_url + "aplikasi/proses_transaksi",
            type: "POST",
            data: {
                item_transaksi: dataKirim
            },
            success: function(result) {
                if (parseInt(result) > 0) {
                    //success
                    window.location.replace(window.base_url + "aplikasi");
                } else {
                    //error
                }
                $.LoadingOverlay("hide");
            }
        });
    });
});
</script>