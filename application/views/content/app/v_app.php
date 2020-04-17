<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header"><h5>Pilih Barang</h5></div>
			<div class="card-body">
				<div class="form-group">
					<label for="">Pilih Barang</label>
					<select name="" class="form-control" id="select-barang">
						<option value="" disabled selected>Pilih Barang</option>
						<?php
						foreach ($barangs as $b) {
							echo "<option data-nama='$b->nama_barang' "
								. "data-harga='$b->harga_barang' "
								. "data-stock='$b->stock_barang' "
								. "data-kode='$b->kode_barang' "
								. "value='$b->id_barang'> "
								. "$b->kode_barang / $b->nama_barang"
								. "</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="">Kode Barang</label>
					<input readonly type="text" id="kode-barang" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="">Nama Barang</label>
					<input readonly type="text" id="nama-barang" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="">Harga Barang</label>
					<input readonly type="text" id="harga-barang" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="">Jumlah Barang</label>
					<input type="text" id="jumlah-barang" class="form-control"/>
				</div>

			</div>
			<div class="card-footer">
				<button type="button" class="btn btn-primary float-right" id="btn-add-item"><i class="fas fa-plus"></i>
				</button>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-header"><h5>Item Transaksi</h5></div>
			<div class="card-body">
				<table class="table">
					<thead>
					<tr>
						<th>Kode</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Sub Total</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<div class="card-footer">

			</div>
		</div>
	</div>
</div>
<script>
    $(function () {
        $("#select-barang")
            .select2()
            .on("change", function () {
                var optionSelected = $(this).children("option:selected");
                $("#kode-barang").val(optionSelected.data("kode"));
                $("#nama-barang").val(optionSelected.data("nama"));
                $("#harga-barang").val(optionSelected.data("harga"));
                $("#jumlah-barang").val(1);
            });
    });
</script>
