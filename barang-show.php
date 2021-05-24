<?php

$title = 'Lihat Barang';

require_once "template/theHeader.php";

isAuth();

middleware(['admin', 'waiter']);

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Lihat Barang</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="barang-edit.php?id=<?= $_GET['id'] ?>" class="button is-light">Edit</a>
        </div>
        <div class="level-item">
            <a href="barang.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['id'])) {
    $query = $conn->query(sprintf("SELECT * FROM barang WHERE id_barang_055 = %s", $_GET['id']));

    $item = $query->fetch_object();
} else {
    return header('Location:barang.php');
}

?>

<div class="field">
    <label class="label">Nama Barang</label>
    <pre><?= $item->nama_barang_055; ?></pre>
</div>
<div class="field">
    <label class="label">Harga</label>
    <pre><?= money($item->harga_barang_055); ?></pre>
</div>
<div class="field">
    <label class="label">Stok</label>
    <pre><?= kilo($item->stok_barang_055); ?></pre>
</div>

<?php

require_once "template/theFooter.php"

?>