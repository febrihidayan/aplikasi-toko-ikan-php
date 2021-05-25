<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.2/css/bulma.min.css' integrity='sha512-byErQdWdTqREz6DLAA9pCnLbdoGGhXfU6gm1c8bkf7F51JVmUBlayGe2A31VpXWQP+eiJ3ilTAZHCR3vmMyybA==' crossorigin='anonymous' />
    <style type="text/css" media="print">
        @page {
            size: landscape;
        }
    </style>
</head>

<body>
    <?php

    require_once __DIR__ . "/config/config.php";

    isAuth();

    middleware(['admin', 'owner']);

    ?>
    <div class="table-container">
        <table class="table is-hoverable is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pelanggan</th>
                    <th>Telepon/Hp</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Berat</th>
                    <th>Total</th>
                    <th>Tanggal Laporan</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM transaksi JOIN barang ON barang.id_barang_055 = transaksi.barang_id_055 JOIN users ON users.id_user_055 = transaksi.user_id_055";

                /**
                 * Jika salah satu search atau date ada kasih WHERE SQL
                 */
                $sql .= !empty($_GET['search']) || !empty($_GET['date']) ? " WHERE " : '';

                /**
                 * Akan mencari tanggal transaksi
                 */
                $sql .= !empty($_GET['date']) ? " transaksi.tanggal_transaksi_055 LIKE '{$_GET['date']}%'" : '';

                /**
                 * Jika search dan date ada kasih AND pada WHERE SQL-Nya
                 */
                $sql .= !empty($_GET['search']) && !empty($_GET['date']) ? " AND " : '';

                /**
                 * Akan mencari nama (pengguna, barang) dan nomor pengguna
                 */
                $sql .= !empty($_GET['search']) ? "(users.nama_user_055 LIKE '%{$_GET['search']}%' OR barang.nama_barang_055 LIKE '%{$_GET['search']}%')" : '';

                $sql .= " ORDER BY id_transaksi_055 DESC";

                $query = $conn->query($sql);

                $total = 0;

                while ($item = $query->fetch_object()) {

                    $total += $item->total_transaksi_055;

                ?>
                    <tr>
                        <td><?= $item->id_transaksi_055; ?></td>
                        <td><?= $item->nama_user_055; ?></td>
                        <td><?= $item->telepon_user_055; ?></td>
                        <td><?= $item->nama_barang_055; ?></td>
                        <td><?= money($item->harga_transaksi_055); ?></td>
                        <td><?= kilo($item->jumlah_transaksi_055); ?></td>
                        <td><?= money($item->total_transaksi_055); ?></td>
                        <td><?= dateTime($item->tanggal_transaksi_055); ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="6" class="has-text-right">Jumlah Total</td>
                    <td colspan="2"><?= money($total); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="is-pulled-right mr-6">
        <strong>Kampar, <?= date('d F Y'); ?></strong>
        <p class="py-5"></p>
        <strong><?= $_SESSION['name'] ?></strong>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>