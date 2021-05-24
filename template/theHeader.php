<?php

require_once __DIR__ . "/../config/config.php";

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Toko Buah' ?></title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.2/css/bulma.min.css' integrity='sha512-byErQdWdTqREz6DLAA9pCnLbdoGGhXfU6gm1c8bkf7F51JVmUBlayGe2A31VpXWQP+eiJ3ilTAZHCR3vmMyybA==' crossorigin='anonymous' />
</head>

<body>
    <nav class="navbar has-shadow">
        <div class="container">
            <div class="navbar-brand">
                <a href="index.php" class="navbar-item">Toko Ikan</a>

                <a class="navbar-burger" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div class="navbar-menu" id="navbarBasicExample">
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="navbar-start">

                        <?php if (isRole(['admin'])): ?>
                            <a href="users.php" class="navbar-item is-tab">Semua Pengguna</a>
                        <?php endif; ?>

                        <?php if (isRole(['admin', 'waiter'])): ?>
                            <a href="barang.php" class="navbar-item is-tab">Barang</a>
                        <?php endif; ?>

                        <?php if (isRole(['admin', 'waiter'])): ?>
                            <a href="pelanggan.php" class="navbar-item is-tab">Pelanggan</a>
                        <?php endif; ?>

                        <?php if (isRole(['admin', 'waiter'])): ?>
                            <a href="transaksi.php" class="navbar-item is-tab">Transaksi</a>
                        <?php endif; ?>

                        <?php if (isRole(['admin', 'owner'])): ?>
                            <a href="laporan.php" class="navbar-item is-tab">Laporan</a>
                        <?php endif; ?>

                    </div>
                    <div class="navbar-end">
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                <?= $_SESSION['name'] ?>
                            </a>

                            <div class="navbar-dropdown">
                                <a href="logout.php" class="navbar-item">
                                    Keluar
                                </a>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="navbar-end">
                        <a href="login.php" class="navbar-item is-tab">Masuk</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <section class="section">
        <div class="container">