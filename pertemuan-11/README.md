# Pertemuan 11 - Integrasi PHP dan MySQL dengan MySQLi

P11 melanjutkan proyek P10 dengan menghubungkan PHP ke basis data MySQL,
mengambil data kontak menggunakan `SELECT`, lalu menampilkannya pada halaman
utama. Ruang lingkup pertemuan ini adalah operasi **READ**; data formulir tidak
ditambahkan, diubah, atau dihapus dari basis data.

## Struktur Berkas

- `index.php`: halaman profil dan formulir Kontak, serta pengambilan dan
  penyajian data kontak dari MySQL.
- `koneksi.php`: konfigurasi dan koneksi MySQLi.
- `fungsi.php`: fungsi sanitasi keluaran HTML.
- `db_pwd_2611500021.sql`: struktur dan data awal P10.
- `script.js`, `style.css`, dan `img/foto-profil.jpg`: aset baseline P10.

Bagian Rencana Kegiatan dari baseline P10 tidak disertakan di halaman P11.
Profil, formulir Kontak, dan penyajian data kontak dari basis data tetap
tersedia.

## Menyiapkan Basis Data

1. Jalankan Apache dan MySQL melalui Laragon.
2. Buka `http://localhost/phpmyadmin/` dan pastikan basis data
   `db_pwd_2611500021` serta tabel `tbl_kontak_2611500021` tersedia.
3. Jika basis data atau tabel belum tersedia, buat basis datanya lalu impor
   `db_pwd_2611500021.sql` melalui phpMyAdmin.
4. Konfigurasi lokal di `koneksi.php` menggunakan host `localhost`, pengguna
   `root`, kata sandi kosong, dan basis data `db_pwd_2611500021`. Sesuaikan
   parameter tersebut bila konfigurasi MySQL lokal berbeda.

## Mengekspor Berkas SQL

1. Buka phpMyAdmin dan pilih basis data `db_pwd_2611500021`.
2. Pilih tab **Export**, gunakan metode **Quick** dan format **SQL**, lalu
   jalankan ekspor.
3. Simpan hasilnya di folder `pertemuan-11` dengan nama
   `db_pwd_2611500021.sql`.
4. Periksa berkas hasil ekspor: pastikan definisi tabel
   `tbl_kontak_2611500021` dan perintah `INSERT` untuk data kontak ikut
   tercantum.

## Menjalankan dan Memeriksa Aplikasi

Buka:

`http://localhost/PWD/2627o/ti1a/2611500021-PWD-TI1A-2627O/pertemuan-11/`

Halaman menjalankan kueri berikut dan menampilkan setiap baris kontak:

```sql
SELECT * FROM tbl_kontak_2611500021;
```

Nilai dari basis data dilewatkan ke `bersihkan()` sebelum ditampilkan sebagai
HTML. Jika kueri tidak dapat dijalankan, detail kesalahan dicatat pada log PHP
dan halaman memberikan pesan umum. Jika tabel kosong, halaman menampilkan
“Belum ada data kontak yang tersimpan.”

Penyimpanan formulir P10 ke session masih dipertahankan sebagai baseline,
tetapi formulir belum menulis ke MySQL. Data pada bagian “Data Kontak dari
Basis Data” hanya berasal dari tabel; operasi tulis berada di luar cakupan P11.

## Hasil Pemeriksaan

- Basis data `db_pwd_2611500021` dan tabel `tbl_kontak_2611500021` tersedia
  pada MySQL lokal dengan dua baris data.
- Berkas SQL P11 memuat definisi tabel dan dua baris data yang sesuai dengan
  basis data lokal.
- Halaman P11 berhasil dibuka dan menampilkan kedua baris dari basis data.
- Kondisi tabel kosong diuji dengan kueri sementara `WHERE 1 = 0`; pesan
  “Belum ada data kontak yang tersimpan.” tampil. Kueri aplikasi kemudian
  dikembalikan ke `SELECT * FROM tbl_kontak_2611500021`.
- Kegagalan koneksi diuji dengan nama basis data yang tidak tersedia, dan
  kegagalan kueri diuji dengan nama tabel yang tidak tersedia. Keduanya
  menghasilkan pesan umum tanpa menampilkan detail server pada halaman.
- Setelah pengujian, konfigurasi koneksi dan kueri dikembalikan ke nilai yang
  benar dan halaman kembali menampilkan dua baris.

Pengujian tabel kosong dan kegagalan dilakukan tanpa mengubah isi basis data.