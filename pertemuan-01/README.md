Bukti Belajar P1

1. Konsep Dasar Pemrograman Web
Pemrograman Web: Proses membangun halaman dan aplikasi yang berjalan dalam lingkungan web dengan memanfaatkan teknologi pada sisi klien, sisi peladen, dan pengelolaan data
Halaman Web vs. Situs Web vs. Aplikasi Web:
Halaman Web: Satu dokumen individual yang ditampilkan melalui browser
Situs Web: Kumpulan halaman web dan sumber daya terkait yang saling berhubungan dan diakses melalui suatu domain
Aplikasi Web: Perangkat lunak berbasis web yang tidak hanya menyajikan informasi, tetapi menerima masukan pengguna, melakukan pemrosesan, dan menghasilkan keluaran atau aktivitas tertentu
Web Statis vs. Aplikasi Web Dinamis:
Web Statis: Konten utama tersedia langsung sebagai berkas tanpa memerlukan pemrosesan aplikasi di sisi peladen
Aplikasi Web Dinamis: Keluaran dihasilkan melalui pemrosesan logika pada sisi peladen dan dapat melibatkan basis data

2. Arsitektur Klien-Peladen
Klien (Client): Pihak yang meminta layanan atau sumber daya, yang dalam aplikasi web umumnya berupa browser
Peladen (Server): Pihak yang menerima permintaan, melakukan pemrosesan logika, berkomunikasi dengan basis data jika diperlukan, dan mengirimkan respons balik
Basis Data: Berperan menyimpan data aplikasi yang diakses oleh peladen saat proses memerlukan penyimpanan atau pengambilan data
Alur Komunikasi: Pengguna → Browser / Klien → Permintaan (Request) → Peladen (Server) (↔ Basis Data) → Respons → Browser / Klien → Pengguna

3. HTTP Request dan Response
HTTP Request: Permintaan yang dikirim oleh klien (browser) kepada peladen ketika pengguna melakukan aksi seperti membuka URL, mengklik tautan, atau mengirim formulir
HTTP Response: Respons atau balasan yang dikirim oleh peladen kepada klien setelah memproses permintaan
Siklus Request-Response:
Pengguna membuka URL di browser
Browser membuat dan mengirimkan HTTP Request ke peladen
Peladen menerima dan memproses HTTP Request (serta berkomunikasi dengan basis data jika diperlukan)
Peladen membuat dan mengirimkan HTTP Response ke browser
Browser menerima respons dan menampilkan hasilnya kepada pengguna

4. HTML, CSS, JavaScript, PHP, MySQL
Sisi Klien (Client-Side):
HTML: Menyusun struktur dan konten halaman web
CSS: Mengatur tampilan visual dan tata letak halaman web
JavaScript: Memberikan perilaku interaktif dan respons pada sisi klien/browser
Sisi Peladen (Server-Side):
PHP: Bahasa pemrograman pada sisi peladen untuk memproses logika aplikasi, mengolah data masukan, dan menghasilkan respons dinamis
Pengelolaan Basis Data:
MySQL: Menyimpan dan mengelola data aplikasi secara terstruktur

5. Hubungan Antarteknologi
Saling Melengkapi: Kelima teknologi bekerja secara bersinergi: HTML menyusun struktur → CSS mengatur tampilan → JavaScript memberikan interaksi klien → PHP memproses logika peladen → MySQL menyimpan/mengelola data
Kebutuhan Aplikasi: Tidak semua halaman web wajib menggunakan kelima teknologi sekaligus; penggunaannya disesuaikan dengan skala dan kebutuhan aplikasi (contohnya web statis cukup menggunakan HTML, CSS, dan JavaScript tanpa PHP dan MySQL)

HTML, CSS, JavaScript, PHP, dan MySQL saling berhubungan dalam pembuatan aplikasi web. HTML menjadi dasar untuk membuat struktur halaman, kemudian CSS mengatur tampilannya dan JavaScript menambahkan interaksi.
