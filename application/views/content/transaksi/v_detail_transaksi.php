<div class='row'>
    <div class='col-md-6'>
        <div class='card'>
            <div class='card-header separator'>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Transaksi</th>
                                <th>Nominal Transaksi</th>
                                <th>Harga Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $no = 1;
                        {
                            ?>
                            <tr>
                                <td><?= $transaksi->id_transaksi?></td>
                                <td><?= $transaksi->nominal_pulsa?></td>
                                <td><?= $transaksi->harga_pulsa?></td>
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
