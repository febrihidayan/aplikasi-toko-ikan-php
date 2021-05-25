# Aplikasi Toko Ikan Dengan PHP
Aplikasi Toko Ikan Dengan PHP adalah langkah awal untuk membuat projek kecil-kecilan.

# Penulis Utama
- [Febri Hidayan](https://github.com/febrihidayan)
  - Situs https://febrihidayan.github.io

## Cara Masuk Ke Aplikasi
Buat nama basis data dengan nama `tokoikan` lalu lakukan import di PHPMyAdmin dengan berkas `tokoikan.sql` sebagaimana pada direktori utama projek ini.

Gunakan pengguna ini untuk masuk dan berdasarkan peran masing-masing. Gunakan kata sandi `pass` untuk semua pengguna.

- admin (Admin)
- waiter (Waiter)
- owner (Owner)
- febrihidayan (Customer)

>Catatan: Harus terhubung ke internet agar skrip CDN Bulma dapat dimuat.

## Laporan
Berikut ini adalah fitur filter yang mana akan mencari data berdasarkan percarian baik dari teks dan tanggal.

### Apa Yang Di Cari?
Pada kolom pencarian teks akan mencari nama pengguna dan nama barang, sedangkan untuk tanggal akan mencari tanggal berdasarkan tanggal transaksi. Hal ini cukup bagus untuk diterapkan karena apabila transaksi pada tanggal 6 misalnya yang terdapat 40 transaksi, maka bisa dicari lagi secara speksifik dengan mencari nama pengguna atau barang.

### Bagaimana Menggunakannya?
Berikut ini adalah cara menggunakan filter berdasarkan data nyata pada gambar dibawah ini:

![gambar](gambar/Semua%20Laporan.png)

#### **Menggunakan filter tanggal**

![gambar](gambar/Semua%20Laporan%20-%20Tanggal.png)

#### **Menggunakan filter pencarian teks**

![gambar](gambar/Semua%20Laporan%20-%20Teks.png)

#### **Menggunakan filter semuanya**

![gambar](gambar/Semua%20Laporan%20-%20Keduanya.png)

## Referensi
- [Aplikasi Toko Buah Dengan PHP (Source Code)](https://github.com/sekolahprogram/aplikasi-toko-buah-dengan-php)
- [Aplikasi Toko Buah Dengan PHP (Tutorial)](https://sekolahprogram.com/kelas/aplikasi-toko-buah-dengan-php)