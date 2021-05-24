<?php

$title = 'Semua Laporan';

require_once "template/theHeader.php";

isAuth();

if (isset($_GET['clear'])) {
    return header('Location:laporan.php');
}

middleware(['admin', 'owner']);

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Semua Laporan</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="laporan-print.php?<?= $_SERVER['QUERY_STRING'] ?? '' ?>" target="_blank" rel="noopener noreferrer" class="button is-light">Print</a>
        </div>
    </div>
</div>

<hr>

<form class="mb-4" method="GET">
    <div class="field is-grouped">
        <p class="control">
            <input type="search" name="search" class="input" placeholder="Cari..." value="<?= old('search', isset($_GET['search']) ? $_GET['search'] : '') ?>">
        </p>
        <p class="control">
            <input type="date" name="date" class="input" value="<?= old('date', isset($_GET['date']) ? $_GET['date'] : '') ?>">
        </p>
        <p class="control">
            <button type="submit" class="button">Cari</button>
        </p>
        <p class="control">
            <button type="submit" name="clear" class="button">Bersikan</button>
        </p>
    </div>
</form>

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

            while ($item = $query->fetch_object()) {

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
        </tbody>
    </table>
</div>

<?php

require_once "template/theFooter.php"

?>