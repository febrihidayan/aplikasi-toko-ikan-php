<?php

$title = 'Masuk';

require_once "template/theHeader.php";

isGuest();

if (isset($_POST['login'])) {
    
    $sql = sprintf("SELECT * FROM users WHERE username_user_055 = '%s'", $_POST['username']);

    $query = $conn->query($sql);
    
    $user = $query->fetch_object();

    if ($user) {

        if (password_verify($_POST['password'], $user->password_user_055)) {
            $_SESSION['name'] = $user->nama_user_055;
            $_SESSION['username'] = $_POST['username'];
            
            return header('Location:index.php');
        } else {
            hasMessage('Maaf!, kata sandi Anda salah.');
        }
        
    }
    else {
        hasMessage('Maaf!, nama pengguna belum terdaftar.');
    }
}

?>

<div class="columns is-centered">
    <div class="column is-6">
        <div class="card">
            <div class="card-content">
                <h1 class="title is-4">Masuk</h1>

                <form action="" method="post">
                    <div class="field">
                        <label for="username" class="label">Nama Pengguna</label>
                        <div class="control">
                            <input type="text" name="username" id="username" value="<?= old('username') ?>" class="input" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="password" class="label">Kata Sandi</label>
                        <div class="control">
                            <input type="password" name="password" id="password" class="input" required>
                        </div>
                    </div>
                    <div class="field">
                        <button type="submit" name="login" class="button is-primary">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

require_once "template/theFooter.php";

?>