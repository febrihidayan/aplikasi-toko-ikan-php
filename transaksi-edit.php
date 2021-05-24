<?php

$title = 'Edit Transaksi';

require_once "template/theHeader.php";

isAuth();

middleware(['admin', 'waiter']);

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Edit Transaksi</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="transaksi-show.php?id=<?= $_GET['id'] ?>" class="button is-light">Lihat</a>
        </div>
        <div class="level-item">
            <a href="transaksi.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['id'])) {
    $query = $conn->query(sprintf("SELECT * FROM transaksi JOIN barang ON barang.id_barang_055 = transaksi.barang_id_055 JOIN users ON users.id_user_055 = transaksi.user_id_055 WHERE id_transaksi_055 = %s", $_GET['id']));

    $transaksi = $query->fetch_object();

    if (!oldTime($transaksi->tanggal_transaksi_055)) {
        return header('Location:transaksi.php');
    }
} else {
    return header('Location:transaksi.php');
}

if (isset($_POST['simpan'])) {
    $query = $conn->query(sprintf("SELECT * FROM barang WHERE id_barang_055 = '%s'", $_POST['barang']));
    $barang = $query->fetch_object();

    $stok = $transaksi->jumlah_transaksi_055 + $barang->stok_barang_055;

    if ($stok >= $_POST['jumlah']) {

        $total = $barang->harga_barang_055 * $_POST['jumlah'];

        $stok -= $_POST['jumlah'];
        update('barang', ['stok_barang_055' => $stok], 'id_barang_055', $_POST['barang']);

        $fields = [
            'harga_transaksi_055' => $barang->harga_barang_055,
            'total_transaksi_055' => $total,
            'jumlah_transaksi_055' => $_POST['jumlah'],
            'user_id_055' => $_POST['pelanggan'],
            'barang_id_055' => $_POST['barang'],
        ];

        if (update('transaksi', $fields, 'id_transaksi_055', $_POST['id'])) {
            return header('Location:transaksi.php');
        }

        hasMessage('Maaf!, tidak dapat menyimpan data.');
    }

    hasMessage("Maaf!, stok barang hanya tersisa {$stok}Kg lagi.");
}

?>

<form action="" method="post">

    <input type="hidden" name="id" value="<?= $transaksi->id_transaksi_055; ?>">

    <div class="field">
        <label for="pelanggan" class="label">Nama Pelanggan</label>
        <div class="select">
            <select name="pelanggan" id="pelanggan" required>
                <option hidden value="<?= $transaksi->id_user_055 ?>"><?= $transaksi->nama_user_055 ?></option>
                <optgroup label="Pilih Nama Pelanggan">
                    <?php
                    $query = $conn->query("SELECT * FROM users WHERE role_user_055 = 'customer'");

                    while ($item = $query->fetch_object()) {
                    ?>
                        <option value="<?= $item->id_user_055 ?>"><?= $item->nama_user_055 ?></option>
                    <?php } ?>
                </optgroup>
            </select>
        </div>
    </div>
    <div class="field">
        <label for="barang" class="label">Nama Barang</label>
        <div class="select">
            <select name="barang" id="barang" required>
                <option hidden value="<?= $transaksi->id_barang_055 ?>"><?= $transaksi->nama_barang_055 ?></option>
                <optgroup label="Pilih Nama Barang">
                    <?php
                    $query = $conn->query("SELECT * FROM barang");

                    while ($item = $query->fetch_object()) {
                    ?>
                        <option value="<?= $item->id_barang_055 ?>"><?= $item->nama_barang_055 ?></option>
                    <?php } ?>
                </optgroup>
            </select>
        </div>
    </div>
    <div class="field">
        <label for="jumlah" class="label">Jumlah Berat</label>
        <div class="control">
            <input type="number" name="jumlah" id="jumlah" class="input" value="<?= old('jumlah', $transaksi->jumlah_transaksi_055); ?>" placeholder="tulis dengan angka (Kg)" required>
        </div>
    </div>
    <div class="field">
        <button name="simpan" class="button is-success" onclick="return confirm('Apakah Anda yakin ingin memperbarui data transaksi ini?');">Perbarui</button>
    </div>
</form>

<?php

require_once "template/theFooter.php"

?>