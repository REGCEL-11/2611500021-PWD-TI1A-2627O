# UTS PWD - Formulir Rencana Kegiatan Mahasiswa

- Nama: REGEN SAPTA PRAWIRA
- NIM: 2611500021
- Kelompok: TI1A
- Tahun ajaran: 2026/2027 Gasal

## Menjalankan Aplikasi

- Buka folder `pertemuan-08` di Laragon atau jalankan server bawaan PHP dari folder tersebut: `php -S 127.0.0.1:8000`.
- Buka `http://127.0.0.1:8000/`.

## Fitur UTS

- Navigasi **Rencana Kegiatan** mengarah ke section baru sebelum section Kontak.
- Formulir memakai metode POST dan memuat Nama Kegiatan, Kategori Kegiatan, Tanggal Pelaksanaan, Lokasi Kegiatan, dan Deskripsi Kegiatan.
- Validasi JavaScript dan PHP memeriksa field wajib, panjang teks, kategori, dan tanggal.
- PHP menormalisasi teks, meng-escape keluaran dengan `htmlspecialchars()`, menampilkan data yang valid, serta menggunakan session dan pola Post-Redirect-Get (PRG).
- Form Kontak, menu responsif, profil, dan contoh GET dari bahan starter tetap disertakan.

## Riwayat dan Pengujian

- **Tahap 1 - Baseline:** mengekstrak seluruh isi `bahan-pertemuan-08.zip` ke folder ini.
- **Tahap 2 - Antarmuka:** menambahkan menu, section, lima field, dan tata letak responsif.
- **Tahap 3 - Pemrosesan:** menambahkan validasi sisi klien dan peladen, sanitasi, session, PRG, serta tampilan hasil.
- **Tahap 4 - Verifikasi:** hasil akhir `index.php` berjumlah 426 baris (starter ZIP: 289 baris). Uji browser memastikan kelima field wajib ditolak jika kosong, batas 100/500 karakter diterapkan, form valid mengirim POST, dan tombol Batal membersihkan pesan. Pemeriksaan editor tidak menemukan error pada PHP/JavaScript/CSS, dan `git diff --check -- pertemuan-08` bersih. Uji PHP end-to-end belum dapat dijalankan karena PHP CLI tidak tersedia pada PATH lingkungan ini.
