# Pertemuan 10 - Analisis Data dan MySQL Satu Tabel

Folder ini merupakan salinan proyek P9 untuk latihan analisis kebutuhan data
formulir Kontak dan perancangan satu tabel MySQL. Berkas
`fungsi.php`, `index.php`, `script.js`, dan `style.css` mempertahankan pola
PHP, validasi, serta tampilan baseline P9; P10 tidak meminta aplikasi
dihubungkan ke MySQL. Pengisian dan pemeriksaan data basis data dilakukan
melalui phpMyAdmin.

## Struktur Basis Data

- Basis data: `db_pwd_2611500021`
- Tabel: `tbl_kontak_2611500021`
- Berkas ekspor struktur dan data: `db_pwd_2611500021.sql`
- Primary key: `id` (`INT`, `AUTO_INCREMENT`)
- Data formulir yang disimpan:

| Atribut | Tipe | Sumber formulir |
| --- | --- | --- |
| `nama` | `VARCHAR(50)` | Nama lengkap |
| `email` | `VARCHAR(255)` | Email |
| `semester` | `TINYINT` | Semester |
| `tanggal` | `DATE` | Tanggal kunjungan |
| `jenis_pesan` | `VARCHAR(20)` | Jenis pesan |
| `minat` | `VARCHAR(50)` | Topik yang diminati |
| `prodi` | `VARCHAR(2)` | Program studi |
| `pesan` | `VARCHAR(300)` | Pesan |

Pilihan checkbox `minat[]` disimpan dalam satu kolom sebagai teks yang
dipisahkan koma, misalnya `HTML,CSS`, sesuai ruang lingkup latihan satu tabel.

## Menyiapkan dan Memeriksa Basis Data

1. Jalankan Apache dan MySQL melalui Laragon.
2. Buka `http://localhost/phpmyadmin/`, lalu buat basis data
   `db_pwd_2611500021`.
3. Pilih basis data tersebut dan impor `db_pwd_2611500021.sql`.
4. Pastikan tabel `tbl_kontak_2611500021` memiliki sembilan kolom, `id`
   menjadi primary key otomatis, dan data contoh berhasil dimuat.
5. Untuk memeriksa data, jalankan:

   ```sql
   SELECT * FROM tbl_kontak_2611500021;
   ```

Berkas SQL berisi definisi tabel dan data awal. Formulir pada `index.php`
tetap mengikuti baseline P9 dan menyimpan hasil pengiriman ke session; formulir
tersebut belum menulis langsung ke tabel MySQL.

## Menjalankan Halaman

Letakkan proyek di document root Laragon, jalankan Apache, lalu buka:

`http://localhost/PWD/2627o/ti1a/2611500021-PWD-TI1A-2627O/pertemuan-10/`

Jangan membuka `index.php` langsung sebagai berkas lokal karena halaman
menggunakan PHP.

## Pemeriksaan

Skema dan data awal pada berkas SQL telah diperiksa terhadap rancangan P10.
Pemeriksaan langsung melalui Laragon/phpMyAdmin perlu dijalankan pada
lingkungan lokal menggunakan langkah di atas; hasil runtime tidak diklaim
sebelum dijalankan.