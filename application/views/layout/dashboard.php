<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
		<div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <a href="<?= site_url("dashboard") ?>">
                            <?php
					$sum=0;
					foreach ($totals as $t){
					}
					?>
                        </a>
                        <h3><?php echo $t ?></h3>
                        <p>Total Pelanggan</p>
                    </div>
                    <div class="icon">
                        <i><a href="<?= site_url("pelanggan/tambah") ?>" class="ion ion-person-add"></a></i>
                    </div>

                    <a href="<?= site_url("pelanggan/info") ?>" class="small-box-footer">More info<i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <a href="<?= site_url("dashboard") ?>">
                            <?php
					$sum=0;
					foreach ($transaksi as $t){
					}
					?>
                        </a>
                        <h3><?php echo $t ?></h3>
                        <p>Total Transaksi</p>
                    </div>
                    <div class="icon">
                        <i><a href="<?= site_url("aplikasi") ?>" class="ion ion-bag"></a></i>
                    </div>

                    <a href="<?= site_url("transaksi/info") ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <a href="<?= site_url("dashboard") ?>">
                            <?php
					$sum=0;
					foreach ($penghasilan as $p){
					}
					?>
                        </a>
                        <h3>Rp. <?php echo $p ?></h3>
                        <p>Total Penghasilan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-12 col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Transaksi Terakhir</h4>
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
			foreach ($v as $row) {
				?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->no_transaksi ?></td>
                                    <td><?= $row->tanggal_transaksi ?></td>
                                    <td>
                                        <a href="<?= site_url("transaksi/detail/$row->id_transaksi") ?>"
                                            class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <?php
			}
			?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
