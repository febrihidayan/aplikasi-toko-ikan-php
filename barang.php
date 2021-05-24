<?php

$title = 'Semua Barang';

require_once "template/theHeader.php";

isAuth();

middleware(['admin', 'waiter']);

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Semua Barang</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="barang-create.php" class="button is-light">Tambah</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['hapus'])) {
    $sql = sprintf("DELETE FROM barang WHERE id_barang_055 = %s", $_GET['hapus']);
    $query = $conn->prepare($sql);

    if ($query->execute()) {
        return header('Location:barang.php');
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
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $query = $conn->query("SELECT * FROM barang ORDER BY id_barang_055 DESC");

            while ($item = $query->fetch_object()) {

            ?>
                <tr>
                    <td><?= $item->id_barang_055; ?></td>
                    <td><?= $item->nama_barang_055; ?></td>
                    <td><?= money($item->harga_barang_055); ?></td>
                    <td><?= kilo($item->stok_barang_055); ?></td>
                    <td>
                        <a href="barang-show.php?id=<?= $item->id_barang_055; ?>" class="button is-small is-rounded is-outlined is-primary">
                            Lihat
                        </a>
                        <a href="barang-edit.php?id=<?= $item->id_barang_055; ?>" class="button is-small is-rounded is-outlined is-info">
                            Ubah
                        </a>
                        <a href="?hapus=<?= $item->id_barang_055; ?>" class="button is-small is-rounded is-outlined is-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?');">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php

require_once "template/theFooter.php"

?>