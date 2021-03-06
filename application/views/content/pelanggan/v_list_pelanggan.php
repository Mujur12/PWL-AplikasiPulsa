<div class="card">
    <div class="card-header">
        <h4>Daftar Pelanggan</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Nama</th>                    
                    <th>Alamat</th>
                    <th>No.Telp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
			$no = 1;
			foreach ($pelanggans as $pelanggan) {
				?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pelanggan->kode_pelanggan ?></td>
					<td><?= $pelanggan->nama_pelanggan ?></td>					
                    <td><?= $pelanggan->alamat_pelanggan ?></td>
                    <td><?= $pelanggan->no_telp ?></td>
                    <td>
                        <a href="<?= site_url("pelanggan/update/$pelanggan->id_pelanggan") ?>"
                            class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" data-id="<?= $pelanggan->id_pelanggan ?>"
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
        <a href="<?= site_url("pelanggan/tambah") ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pelanggan
        </a>
		<a href="<?= site_url("report/pelanggan") ?>" target="_blank" class="btn btn-success">
			<i class="fas fa-file-excel"></i> Report Pelanggan
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
<form id="form-delete" method="post" action="<?= site_url('pelanggan/proses_hapus') ?>">

</form>
<script>
$(function() {
    let idPelanggan = 0;
    $(".btn-delete-pelanggan").on("click", function() {
        idPelanggan = $(this).data("id");
        console.log(idPelanggan);
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
