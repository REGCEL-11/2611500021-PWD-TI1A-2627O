<?php
session_start();
include "fungsi.php";

$daftarKategori = ["Akademik", "Organisasi", "Lomba", "Pengabdian"];
$jumlahKategori = count($daftarKategori);

// Rencana kegiatan: menyimpan data formulir ke dalam satu session array asosiatif.
if (isset($_POST["kirim_rencana"])) {
	$_SESSION["rencana"] = [
		"nama" => $_POST["nama_kegiatan"] ?? "",
		"kategori" => $_POST["kategori_kegiatan"] ?? "",
		"tanggal" => $_POST["tanggal_pelaksanaan"] ?? "",
		"lokasi" => $_POST["lokasi_kegiatan"] ?? "",
		"deskripsi" => $_POST["deskripsi_kegiatan"] ?? ""
	];

	header("Location: index.php#rencana-kegiatan");
	exit;
}

// P7: Memproses data formulir dan menyimpannya ke dalam session.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$nama = trim((string) ($_POST["nama"] ?? ""));
	$email = trim((string) ($_POST["email"] ?? ""));
	$semesterForm = trim((string) ($_POST["semester"] ?? ""));
	$tanggal = trim((string) ($_POST["tanggal"] ?? ""));
	$jenisPesan = trim((string) ($_POST["jenis_pesan"] ?? ""));
	$minat = $_POST["minat"] ?? [];
	$prodi = trim((string) ($_POST["prodi"] ?? ""));
	$pesan = trim((string) ($_POST["pesan"] ?? ""));

	// Checkbox dapat mengirimkan lebih dari satu nilai.
	if (!is_array($minat)) {
		$minat = [];
	}

	// Menyimpan seluruh nilai formulir ke dalam satu session array asosiatif.
	$_SESSION["form_data"] = [
		"nama" => $nama,
		"email" => $email,
		"semester" => $semesterForm,
		"tanggal" => $tanggal,
		"jenis_pesan" => $jenisPesan,
		"minat" => $minat,
		"prodi" => $prodi,
		"pesan" => $pesan
	];

	// PRG: mencegah pengiriman POST berulang ketika halaman dimuat ulang.
	header("Location: index.php#contact");
	exit;
}

// Mengamankan data sebelum ditampilkan kembali ke halaman HTML.
// P6: PHP dasar dan pemrograman sisi peladen
// Bagian 1: Variabel dan konstanta
$nim = "2611500019";
$namaMahasiswa = "Julian Hernandez";
$programStudi = "TI";
$tahunAkademik = "2026/2027";
$semester = 1;
$ipk = 3.75;
$statusAktif = true;
$catatanTambahan = null;

const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "2611500019-JulianHernandez";

// Bagian 2: Operator
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif) ? "Sesuai rentang" : "Perlu diperiksa";

// Bagian 3: Percabangan if-elseif-else
if ($semester < 3) {
	$keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
	$keteranganSemester = "Semester menengah";
} else {
	$keteranganSemester = "Semester akhir";
}

$namaProdi = ($programStudi == "SI") ? "Sistem Informasi" : (($programStudi == "TI") ? "Teknik Informatika" : "Lainnya");

// Bagian 4: Percabangan switch-case-default
switch ($programStudi) {
	case "SI":
		$fokusProgramStudi = "Sistem informasi dan proses bisnis";
		break;
	case "TI":
		$fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
		break;
	default:
		$fokusProgramStudi = "Belum ditentukan";
}
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Mahasiswa</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <div class="header-top">
            <h1>Profil Mahasiswa</h1>

            <button class="nav-toggle" id="navToggle" type="button" aria-label="Buka navigasi" aria-controls="navMenu"
                aria-expanded="false">
                &#9776;
            </button>
        </div>

        <nav>
            <ul id="navMenu">
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#rencana-kegiatan">Rencana Kegiatan</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <h2>Selamat Datang</h2>
            <p>Halo, saya <strong><?php echo $namaMahasiswa; ?></strong>. Saya sedang mempelajari matakuliah
                <strong><?php print NAMA_MATA_KULIAH; ?></strong> pada tahun akademik <?php echo $tahunAkademik; ?>.</p>

            <img src="img/foto-profil.jpg" alt="Foto profil Nama Mahasiswa" />
        </section>

        <section id="about">
            <h2>Tentang Saya</h2>

            <article>
                <h3>Profil Singkat</h3>
                <p>Program Studi: <?php echo $namaProdi . " (" . $programStudi . ")"; ?></p>
                <p>Fokus program studi: <?php echo $fokusProgramStudi; ?></p>
                <p>Status mahasiswa: <?php echo $statusAktif ? "Aktif" : "Tidak aktif"; ?></p>
                <p>Semester: <?php echo $semester . " (" . $keteranganSemester . ")"; ?></p>
                <p>Sisa semester hingga batas: <?php echo $sisaSemester; ?></p>
                <p>Pemeriksaan rentang semester: <?php echo $statusSemester; ?></p>
                <p>IPK: <?php echo number_format($ipk, 2, ',', '.'); ?></p>
                <p>Catatan tambahan: <?php echo $catatanTambahan === null ? "Belum ada" : $catatanTambahan; ?></p>

                <h3>Target Belajar (Perulangan for)</h3>
                <ol>
                    <?php
					// Perulangan for tanpa array; materi larik dibahas pada P9.
					for ($i = 1; $i <= 5; $i++) {
						echo "<li>Target belajar ke-" . $i . ": ";
						switch ($i) {
							case 1:
								echo "Memahami sintaks dasar PHP.";
								break;
							case 2:
								echo "Menggunakan variabel dan konstanta.";
								break;
							case 3:
								echo "Menerapkan operator dan percabangan.";
								break;
							case 4:
								echo "Menggunakan perulangan for dan while.";
								break;
							default:
								echo "Belum dipetakan";
								break;
						}
						echo "</li>";
					}
					?>
                </ol>

                <h3>Semester (Perulangan while):</h3>
                <ol>
                    <?php
					$nomorSemester = 1;
					while ($nomorSemester <= 3) {
						echo "<li>Semester " . $nomorSemester . "</li>";
						$nomorSemester++; // operator penugasan
					}
					?>
                </ol>
            </article>
        </section>

        <section id="rencana-kegiatan" class="contact">
            <h2>Rencana Kegiatan Mahasiswa</h2>
            <p>Tambahkan rencana kegiatan yang akan dilaksanakan.</p>
            <p>Tersedia <?= $jumlahKategori ?> kategori kegiatan.</p>
            <p>Kategori pertama (indeks 0): <?= bersihkan($daftarKategori[0]) ?></p>
            <p>Kategori terakhir (indeks <?= $jumlahKategori - 1 ?>):
                <?= bersihkan($daftarKategori[$jumlahKategori - 1]) ?></p>

            <form action="index.php#rencana-kegiatan" method="post">
                <div class="form-group">
                    <label for="nama_kegiatan">Nama Kegiatan</label><br />

                    <input class="input-form" type="text" id="nama_kegiatan" name="nama_kegiatan"
                        placeholder="Masukkan nama kegiatan" maxlength="100" required />
                </div>

                <div class="form-group">
                    <label for="kategori_kegiatan">Kategori Kegiatan</label><br />

                    <select class="input-form" id="kategori_kegiatan" name="kategori_kegiatan" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($daftarKategori as $kategori): ?>
                        <option value="<?= bersihkan($kategori) ?>"><?= bersihkan($kategori) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label><br />

                    <input class="input-form" type="date" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan"
                        required />
                </div>

                <div class="form-group">
                    <label for="lokasi_kegiatan">Lokasi Kegiatan</label><br />

                    <input class="input-form" type="text" id="lokasi_kegiatan" name="lokasi_kegiatan"
                        placeholder="Masukkan lokasi kegiatan" maxlength="100" required />
                </div>

                <div class="form-group">
                    <label for="deskripsi_kegiatan">Deskripsi Kegiatan</label><br />

                    <textarea class="input-form" id="deskripsi_kegiatan" name="deskripsi_kegiatan" maxlength="300"
                        placeholder="Tulis deskripsi kegiatan" required></textarea>
                </div>

                <button type="submit" name="kirim_rencana">Kirim</button>
                <button type="reset">Batal</button>
            </form>

            <?php $rencana = $_SESSION["rencana"] ?? null; ?>
            <?php if ($rencana): ?>
            <article id="hasilRencana" class="submission-result" aria-live="polite">
                <h3>Data Rencana Kegiatan yang Dikirim</h3>
                <?php
					$labelRencana = [
						"nama" => "Nama Kegiatan",
						"kategori" => "Kategori Kegiatan",
						"tanggal" => "Tanggal Pelaksanaan",
						"lokasi" => "Lokasi Kegiatan",
						"deskripsi" => "Deskripsi Kegiatan"
					];

					foreach ($labelRencana as $kunci => $label) {
						$hasil = bersihkan($rencana[$kunci] ?? "");
						if ($kunci === "deskripsi") {
							$hasil = nl2br($hasil);
						}
						echo "<p><strong>" . $label . ":</strong> " . $hasil . "</p>";
					}
					?>
            </article>
            <?php endif; ?>
        </section>

        <section id="contact">
            <h2>Kontak</h2>

            <p>
                Kunjungi
                <a target="_blank" href="https://github.com/<?= PROFIL_GITHUB ?>">profil GitHub saya</a>.
            </p>

            <form id="contactForm" class="js-contact-form" data-validation="contact" action="index.php" method="post"
                novalidate>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label><br />

                    <input class="input-form" type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap"
                        minlength="3" maxlength="50" required />
                </div>

                <div class="form-group">
                    <label for="email">Email</label><br />

                    <input class="input-form" type="email" id="email" name="email" placeholder="nama@email.com"
                        required />
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label><br />

                    <input class="input-form" type="number" id="semester" name="semester" min="1" max="14" required />
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal Kunjungan</label><br />

                    <input class="input-form" type="date" id="tanggal" name="tanggal" required />
                </div>

                <div class="form-group">
                    <p>Jenis Pesan</p>

                    <input type="radio" id="pertanyaan" name="jenis_pesan" value="pertanyaan" required />
                    <label for="pertanyaan">Pertanyaan</label>

                    <input type="radio" id="saran" name="jenis_pesan" value="saran" />
                    <label for="saran">Saran</label>
                </div>

                <div class="form-group">
                    <p>Topik yang Diminati</p>

                    <input type="checkbox" id="minat-html" name="minat[]" value="HTML" />
                    <label for="minat-html">HTML</label>

                    <input type="checkbox" id="minat-css" name="minat[]" value="CSS" />
                    <label for="minat-css">CSS</label>
                </div>

                <div class="form-group">
                    <label for="prodi">Program Studi</label><br />

                    <select class="input-form" id="prodi" name="prodi" required>
                        <option value="">-- Pilih Program Studi --</option>
                        <option value="SI">Sistem Informasi</option>
                        <option value="TI">Teknik Informatika</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pesan">Pesan</label><br />

                    <textarea class="input-form" id="pesan" name="pesan" maxlength="300" placeholder="Tulis pesan Anda"
                        required></textarea>
                </div>

                <button type="submit">Kirim</button>
                <button type="reset">Batal</button>
                <p class="form-feedback" data-form-feedback aria-live="polite"></p>
            </form>

            <?php if (isset($_SESSION["form_data"])): ?>
            <article id="hasilKontak" class="submission-result" aria-live="polite">
                <h3>Data Formulir yang Dikirim</h3>
                <?php
					$labelForm = [
						"nama" => "Nama Lengkap",
						"email" => "Email",
						"semester" => "Semester",
						"tanggal" => "Tanggal Kunjungan",
						"jenis_pesan" => "Jenis Pesan",
						"minat" => "Topik yang Diminati",
						"prodi" => "Program Studi",
						"pesan" => "Pesan"
					];

					foreach ($labelForm as $kunci => $label) {
						$nilai = $_SESSION["form_data"][$kunci] ?? "";
						if (is_array($nilai)) {
							$nilai = implode(", ", $nilai);
						}

						$hasil = bersihkan($nilai);
						if ($kunci === "pesan") {
							$hasil = nl2br($hasil);
						}
						echo "<p>" . tebal($label . ":") . " " . $hasil . "</p>";
					}
					?>
            </article>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; <?= date("Y") ?> <?php echo $namaMahasiswa; ?> [<?= $nim ?>]</p>
    </footer>
    <script src="script.js"></script>
</body>

</html>