<div class="card">
    <div class="card-header">
        <h4>Daftar Nominal</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode</th>
					<th>Nominal</th>
					<th>Harga</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
			$no = 1;
			foreach ($nominals as $nominal) {
				?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $nominal->kode_nominal_pulsa ?></td>
					<td><?= $nominal->nominal_pulsa ?></td>
					<td><?= $nominal->harga_pulsa ?></td>
                    <td><?= $nominal->stock_pulsa ?></td>
                    <td>
                        <a href="<?= site_url("nominal/update/$nominal->id_nominal") ?>"
                            class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" data-id="<?= $nominal->id_nominal ?>"
                            class="btn btn-sm btn-danger btn-delete-pelanggan"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php
			}
			?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="<?= site_url("nominal/tambah") ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Nominal
		</a>
		
    </div>
</div>

<div class="modal fade" id="modal-confirm-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Anda Yakin Hapus data ini?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger" id="btn-delete">Hapus</button>
            </div>
        </div>
    </div>
</div>
<form id="form-delete" method="post" action="<?= site_url('nominal/proses_hapus') ?>">

</form>
<script>
$(function() {
    let idNominal = 0;
    $(".btn-delete-nominal").on("click", function() {
        idNominal = $(this).data("id");
        console.log(idNominal);
        $("#modal-confirm-delete").modal("show");
    });
    $("#btn-delete").on("click", function() {
        //panggil url untuk hapus data
        let inputId = $("<input>")
            .attr("type", "hidden")
            .attr("name", "id")
            .val(idPelanggan);
        let formDelete = $("#form-delete");
        formDelete.empty().append(inputId);
        formDelete.submit();
        $("#modal-confirm-delete").modal("hide");
    });
});
</script>
