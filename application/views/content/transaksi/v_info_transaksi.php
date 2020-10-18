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
                </tr>
            </thead>
            <tbody>
                <?php
			$no = 1;
			foreach ($trans as $row) {
				?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->no_transaksi ?></td>
                    <td><?= $row->tanggal_transaksi ?></td>
                </tr>
                <?php
			}
			?>
            </tbody>
        </table>
    </div>
</div>
