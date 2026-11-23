<?php
$host = "localhost";
$pengguna = "root";
$password = "";
$namaBasisData = "db_pwd_2611500021";

mysqli_report(MYSQLI_REPORT_OFF);

$koneksi = @mysqli_connect($host, $pengguna, $password, $namaBasisData);
if (!$koneksi) {
	error_log("Koneksi MySQL gagal: " . mysqli_connect_error());
	http_response_code(500);
	exit("Koneksi ke basis data gagal.");
}

if (!@mysqli_set_charset($koneksi, "utf8mb4")) {
	error_log("Gagal mengatur charset MySQL: " . mysqli_error($koneksi));
	http_response_code(500);
	exit("Koneksi ke basis data gagal.");
}
