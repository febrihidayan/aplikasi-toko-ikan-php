<?php

$title = 'Tambah Barang';

require_once "template/theHeader.php";

isAuth();

middleware(['admin', 'waiter']);

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Tambah Barang</h1>
        </div>
    </div>
    <div class="level-right">
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

    if (insert('barang', $fields)) {
        return header('Location:barang.php');
    }

    hasMessage('Maaf!, tidak dapat menyimpan data.');

}

?>

<form action="" method="post">
    <div class="field">
        <label for="nama" class="label">Nama Barang</label>
        <div class="control">
            <input type="text" name="nama" id="nama" class="input" value="<?= old('nama') ?>" required>
        </div>
    </div>
    <div class="field">
        <label for="harga" class="label">Harga</label>
        <div class="control">
            <input type="number" name="harga" id="harga" class="input" value="<?= old('harga') ?>" required>
        </div>
    </div>
    <div class="field">
        <label for="stok" class="label">Stok</label>
        <div class="control">
            <input type="number" name="stok" id="stok" class="input" value="<?= old('stok') ?>" required>
        </div>
    </div>
    <div class="field">
        <button name="simpan" class="button is-success">Simpan</button>
    </div>
</form>

<?php

require_once "template/theFooter.php"

?>