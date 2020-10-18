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
                </tr>
            </thead>
            <tbody>
                <?php
			$no = 1;
			foreach ($pelanggans as $p) {
				?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p->kode_pelanggan ?></td>
                    <td><?= $p->nama_pelanggan ?></td>
                    <td><?= $p->alamat_pelanggan ?></td>
                    <td><?= $p->no_telp ?></td>
                </tr>
                <?php
			}
			?>
            </tbody>
        </table>
    </div>
</div>
