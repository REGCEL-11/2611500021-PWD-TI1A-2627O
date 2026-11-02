# UTS PWD - Rencana Kegiatan Mahasiswa

- Nama: REGEN SAPTA PRAWIRA
- NIM: 2611500021
- Kelompok: TI1A
- Tahun ajaran: 2026/2027 Gasal

## Menjalankan Aplikasi

- Dari folder `pertemuan-08`, jalankan server bawaan PHP: `php -S 127.0.0.1:8000`.
- Buka `http://127.0.0.1:8000/`.

## Fitur UTS

- Menambahkan menu dan section **Rencana Kegiatan Mahasiswa** sebelum section Kontak.
- Formulir mengirim Nama Kegiatan, Kategori Kegiatan, Tanggal Pelaksanaan, Lokasi Kegiatan, dan Deskripsi Kegiatan dengan metode POST.
- Validasi berjalan di JavaScript dan PHP; data dinormalisasi, keluaran di-escape, dan hasil dipertahankan menggunakan session serta pola PRG.

## Riwayat Pengerjaan

- **Tahap 1 - Baseline:** mempertahankan halaman profil, navigasi responsif, formulir Kontak, contoh GET, dan fitur PHP yang sudah tersedia sebelum mengerjakan fitur UTS.
- **Tahap 2 - Antarmuka:** menambahkan tautan navigasi dan formulir Rencana Kegiatan sebelum Kontak, termasuk lima field, layout responsif, dan validasi awal di browser.
- **Tahap 3 - Pemrosesan PHP:** menambahkan validasi sisi peladen, normalisasi teks, escaping keluaran, penyimpanan session, dan redirect PRG; proses formulir UTS dipisahkan dari Kontak.
- **Tahap 4 - Verifikasi:** pemeriksaan editor tidak menemukan error pada `index.php`, `script.js`, dan `style.css`; `git diff --check -- pertemuan-08` bersih. Uji sintaks dan alur POST/PRG belum dapat dijalankan karena PHP CLI tidak tersedia pada lingkungan ini (`php` tidak dikenali).
