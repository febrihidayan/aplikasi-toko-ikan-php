<?php

$title = 'Semua Pelanggan';

require_once "template/theHeader.php";

isAuth();

middleware(['admin', 'waiter']);

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Semua Pelanggan</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="pelanggan-create.php" class="button is-light">Tambah</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['hapus'])) {

    $sql = sprintf("DELETE FROM users WHERE id_user_055 = %s", $_GET['hapus']);

    if ($conn->query($sql)) {
        return header('Location:pelanggan.php');
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
                <th>Nama Lengkap</th>
                <th>Nama Pengguna</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $query = $conn->query("SELECT * FROM users WHERE role_user_055 = 'customer' ORDER BY id_user_055 DESC");

            while ($item = $query->fetch_object()) {

            ?>
                <tr>
                    <td><?= $item->id_user_055; ?></td>
                    <td><?= $item->nama_user_055; ?></td>
                    <td><?= $item->username_user_055; ?></td>
                    <td><?= $item->telepon_user_055; ?></td>
                    <td><?= $item->alamat_user_055; ?></td>
                    <td>
                        <a href="pelanggan-show.php?id=<?= $item->id_user_055; ?>" class="button is-small is-rounded is-outlined is-primary">
                            Lihat
                        </a>
                        <a href="pelanggan-edit.php?id=<?= $item->id_user_055; ?>" class="button is-small is-rounded is-outlined is-info">
                            Ubah
                        </a>
                        <a href="?hapus=<?= $item->id_user_055; ?>" class="button is-small is-rounded is-outlined is-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?');">
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