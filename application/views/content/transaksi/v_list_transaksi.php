<div class="card">
    <div class="card-header">
        <h4>Daftar Transaksi</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No Transaksi</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
			$no = 1;
			foreach ($transaksi as $row) {
				?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->no_transaksi ?></td>
                    <td><?= $row->tanggal_transaksi ?></td>
                    <td>
                        <a href="<?= site_url("transaksi/detail/$row->id_transaksi") ?>" class="btn btn-sm btn-info"><i
                                class="fas fa-edit"></i></a>
                    </td>
                </tr>
                <?php
			}
			?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Transaction Detail</h4>
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span arie-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>ID Transaksi</th>
                            <td><span id="id_transaksi"></span></td>
                        </tr>
                        <tr>
                            <th>No Transaksi</th>
                            <td><span id="no_transaksi"></span></td>
                        </tr>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <td><span id="tanggal_Transaksi"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(document).on('click', '#detail', function() {
        var noTransaksi = $(this).data('no_transaksi');
        var tanggalTransaksi = $(this).data('tanggal_transaksi');
        var idTransaksi = $(this).data('id_transaksi');
        $('#id_transaksi').text(idTransaksi);
        $('#no_transaksi').text(noTransaksi);
        $('#tanggal_transaksi').text(tanggalTransaksi);
    })
})
</script>