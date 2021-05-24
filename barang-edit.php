<?php

$title = 'Edit Barang';

require_once "template/theHeader.php";

isAuth();

middleware(['admin', 'waiter']);

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Edit Barang</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="barang-show.php?id=<?= $_GET['id'] ?>" class="button is-light">Lihat</a>
        </div>
        <div class="level-item">
            <a href="barang.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_POST['simpan'])) {

    $fields = [
        'nama_barang_055' => $_POST['nama'],
        'harga_barang_055' => $_POST['harga'],
        'stok_barang_055' => $_POST['stok'],
    ];

    if (update('barang', $fields, 'id_barang_055', $_POST['id'])) {
        return header('Location:barang.php');
    }

    hasMessage('Maaf!, tidak dapat menyimpan data.');
}

if (isset($_GET['id'])) {
    $query = $conn->query(sprintf("SELECT * FROM barang WHERE id_barang_055 = %s", $_GET['id']));

    $item = $query->fetch_object();
} else {
    return header('Location:barang.php');
}

?>

<form action="" method="post">

    <input type="hidden" name="id" value="<?= $item->id_barang_055; ?>">

    <div class="field">
        <label for="nama" class="label">Nama Barang</label>
        <div class="control">
            <input type="text" name="nama" id="nama" class="input" value="<?= old('nama', $item->nama_barang_055); ?>" required>
        </div>
    </div>
    <div class="field">
        <label for="harga" class="label">Harga</label>
        <div class="control">
            <input type="number" name="harga" id="harga" class="input" value="<?= old('harga', $item->harga_barang_055); ?>" required>
        </div>
    </div>
    <div class="field">
        <label for="stok" class="label">Stok</label>
        <div class="control">
            <input type="number" name="stok" id="stok" class="input" value="<?= old('stok', $item->stok_barang_055) ?>" required>
        </div>
    </div>
    <div class="field">
        <button name="simpan" class="button is-success">Perbarui</button>
    </div>
</form>

<?php

require_once "template/theFooter.php"

?>