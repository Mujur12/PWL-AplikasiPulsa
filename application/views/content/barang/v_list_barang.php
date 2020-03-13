<div class="card">
	<div class="card-header">
		<h4>Daftar Barang</h4>
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th>Kode</th>
				<th>Nama</th>
				<th>Harga</th>
				<th>Stock</th>
				<th>Gambar</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($barangs as $barang) {
				?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $barang->kode_barang ?></td>
					<td><?= $barang->nama_barang ?></td>
					<td><?= $barang->harga_barang ?></td>
					<td><?= $barang->stock_barang ?></td>
					<td><img src="" width="150" alt=Gambar_Barang"/></td>
					<td>
						<a href="<?= site_url("barang/update/$barang->id_barang") ?>" class="btn btn-sm btn-warning">
							<i class="fas fa-edit"></i>
						</a>
						<a href="#" class="btn btn-sm btn-danger btn-delete-barang"><i class="fas fa-trash"></i></a>
					</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<a href="<?= site_url("barang/tambah") ?>" class="btn btn-primary">
			<i class="fas fa-plus"></i> Tambah Barang
		</a>
	</div>
</div>
