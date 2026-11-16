<?php
function bersihkan($teks) {
	return htmlspecialchars($teks ?? "", ENT_QUOTES, "UTF-8");
}

//Memformat teks menjadi tebal
function tebal($teks) {
	return "<strong>" . $teks . "</strong>";
}