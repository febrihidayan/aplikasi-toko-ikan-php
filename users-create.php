<?php

$title = 'Tambah Pengguna';

require_once "template/theHeader.php";

isAuth();

middleware(['admin']);

?>

<div class="level">
    <div class="level-left">
        <div class="level-item">
            <h1 class="title is-4">Tambah Pengguna</h1>
        </div>
    </div>
    <div class="level-right">
        <div class="level-item">
            <a href="users.php" class="button is-light">Kembali</a>
        </div>
    </div>
</div>

<hr>

<?php

if (isset($_POST['simpan'])) {

    $fields = [
        'nama_user_055' => $_POST['nama'],
        'username_user_055' => $_POST['nama_pengguna'],
        'password_user_055' => password_hash($_POST['kata_sandi'], PASSWORD_ARGON2I),
        'role_user_055' => $_POST['peran'],
        'telepon_user_055' => $_POST['telepon'],
        'alamat_user_055' => $_POST['alamat'],
    ];

    if (insert('users', $fields)) {
        return header('Location:users.php');
    }

    hasMessage('Maaf!, tidak dapat menyimpan data.');
}

?>

<form action="" method="post">
    <div class="field">
        <label for="nama" class="label">Nama Lengkap</label>
        <div class="control">
            <input type="text" name="nama" id="nama" class="input" value="<?= old('nama') ?>" required>
        </div>
    </div>
    <div class="field">
        <label for="nama_pengguna" class="label">Nama Pengguna</label>
        <div class="control">
            <input type="text" name="nama_pengguna" id="nama_pengguna" class="input" value="<?= old('nama_pengguna') ?>" required>
        </div>
    </div>
    <div class="field">
        <label for="kata_sandi" class="label">Kata Sandi</label>
        <div class="control">
            <input type="password" name="kata_sandi" id="kata_sandi" class="input" value="<?= old('kata_sandi') ?>" required>
        </div>
    </div>
    <div class="field">
        <label for="peran" class="label">Peran</label>
        <div class="select">
            <select name="peran" id="peran" required>
                <option hidden>Pilih Peran</option>
                <optgroup label="Pilih Peran">
                    <?php
                    for ($i=0; $i < count(ROLES); $i++) { 
                    ?>
                        <option><?= ROLES[$i] ?></option>
                    <?php } ?>
                </optgroup>
            </select>
        </div>
    </div>
    <div class="field">
        <label for="telepon" class="label">Telepon/Hp</label>
        <div class="control">
            <input type="tel" name="telepon" id="telepon" class="input" value="<?= old('telepon') ?>" required>
        </div>
    </div>
    <div class="field">
        <label for="alamat" class="label">Alamat</label>
        <div class="control">
            <textarea name="alamat" id="alamat" cols="30" rows="10" class="textarea"><?= old('alamat') ?></textarea>
        </div>
    </div>
    <div class="field">
        <button name="simpan" class="button is-success">Simpan</button>
    </div>
</form>

<?php

require_once "template/theFooter.php"

?>