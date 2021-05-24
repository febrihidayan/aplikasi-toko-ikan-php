<?php

$title = 'Lihat Pengguna';

require_once "template/theHeader.php";

isAuth();

middleware(['admin']);

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Lihat Pengguna</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="users-edit.php?id=<?= $_GET['id'] ?>" class="button is-light">Edit</a>
        </div>
        <div class="level-item">
            <a href="users.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_GET['id'])) {
    $query = $conn->query(sprintf("SELECT * FROM users WHERE id_user_055 = %s", $_GET['id']));

    $item = $query->fetch_object();
} else {
    return header('Location:users.php');
}

?>

<div class="field">
    <label class="label">Nama Lengkap</label>
    <pre><?= $item->nama_user_055; ?></pre>
</div>
<div class="field">
    <label class="label">Nama Pengguna</label>
    <pre><?= $item->username_user_055; ?></pre>
</div>
<div class="field">
    <label class="label">Peran</label>
    <pre><?= $item->role_user_055; ?></pre>
</div>
<div class="field">
    <label class="label">Telepon/Hp</label>
    <pre><?= $item->telepon_user_055; ?></pre>
</div>
<div class="field">
    <label class="label">Alamat</label>
    <pre><?= $item->alamat_user_055; ?></pre>
</div>

<?php

require_once "template/theFooter.php"

?>