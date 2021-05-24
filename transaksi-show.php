<?php

$title = 'Lihat Transaksi';

require_once "template/theHeader.php";

isAuth();

middleware(['admin', 'waiter']);

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Lihat Transaksi</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="transaksi.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['id'])) {
    $query = $conn->query(sprintf("SELECT * FROM transaksi JOIN barang ON barang.id_barang_055 = transaksi.barang_id_055 JOIN users ON users.id_user_055 = transaksi.user_id_055 WHERE id_transaksi_055 = %s", $_GET['id']));

    $item = $query->fetch_object();
} else {
    return header('Location:transaksi.php');
}

?>

<div class="field">
    <label class="label">Nama Pelanggan</label>
    <pre><?= $item->nama_user_055; ?></pre>
</div>

<div class="field">
    <label class="label">Nama Barang</label>
    <pre><?= $item->nama_barang_055; ?></pre>
</div>

<div class="field">
    <label class="label">Harga</label>
    <pre><?= money($item->harga_transaksi_055); ?></pre>
</div>

<div class="field">
    <label class="label">Jumlah Barang</label>
    <pre><?= $item->jumlah_transaksi_055 . 'Kg'; ?></pre>
</div>

<div class="field">
    <label class="label">Total</label>
    <pre><?= money($item->total_transaksi_055); ?></pre>
</div>

<div class="field">
    <label class="label">Tanggal Transaksi</label>
    <pre><?= $item->tanggal_transaksi_055; ?></pre>
</div>

<?php

require_once "template/theFooter.php"

?>