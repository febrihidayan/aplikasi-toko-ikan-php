<?php

$title = 'Semua Transaksi';

require_once "template/theHeader.php";

isAuth();

middleware(['admin', 'waiter']);

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Semua Transaksi</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="transaksi-create.php" class="button is-light">Tambah</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['hapus'])) {
    $query = $conn->query(sprintf("SELECT * FROM barang WHERE id_barang_055 = '%s'", $_GET['id_barang_055']));
    $barang = $query->fetch_object();

    $stok = $barang->stok_barang_055 + $_GET['stok'];
    $conn->query(sprintf("UPDATE barang SET stok_barang_055 = '%s' WHERE id_barang_055 = '%s'", $stok, $_GET['id_barang_055']));
    
    $sql = sprintf("DELETE FROM transaksi WHERE id_transaksi_055 = %s", $_GET['hapus']);

    if ($conn->query($sql)) {
        return header('Location:transaksi.php');
    } else {
        $message = 'Maaf!, Tidak bisa menghapus data tersebut.';
    }
}

hasMessage();

?>

<div class="table-container">
    <table class="table is-hoverable is-striped is-fullwidth">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pelanggan</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Berat</th>
                <th>Total</th>
                <th>Tanggal Transaksi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM transaksi JOIN barang ON barang.id_barang_055 = transaksi.barang_id_055 JOIN users ON users.id_user_055 = transaksi.user_id_055 ORDER BY id_transaksi_055 DESC";

            $query = $conn->query($sql);

            while ($item = $query->fetch_object()) {

            ?>
                <tr>
                    <td><?= $item->id_transaksi_055; ?></td>
                    <td><?= $item->nama_user_055; ?></td>
                    <td><?= $item->nama_barang_055; ?></td>
                    <td><?= money($item->harga_transaksi_055); ?></td>
                    <td><?= kilo($item->jumlah_transaksi_055); ?></td>
                    <td><?= money($item->total_transaksi_055); ?></td>
                    <td><?= dateTime($item->tanggal_transaksi_055); ?></td>
                    <td>
                        <a href="transaksi-show.php?id=<?= $item->id_transaksi_055; ?>" class="button is-small is-rounded is-outlined is-primary">
                            Lihat
                        </a>
                        <?php if (oldTime($item->tanggal_transaksi_055)) { ?>
                            <a href="transaksi-edit.php?id=<?= $item->id_transaksi_055; ?>" class="button is-small is-rounded is-outlined is-info">
                                Ubah
                            </a>
                            <a href="?hapus=<?= $item->id_transaksi_055; ?>&id_barang_055=<?= $item->barang_id_055; ?>&stok=<?= $item->jumlah_transaksi_055; ?>" class="button is-small is-rounded is-outlined is-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?');">
                                Hapus
                            </a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php

require_once "template/theFooter.php"

?>