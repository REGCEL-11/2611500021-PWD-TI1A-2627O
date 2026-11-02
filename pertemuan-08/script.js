const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

navToggle.addEventListener("click", () => {
  const isOpen = navMenu.classList.toggle("nav-open");

  navToggle.setAttribute("aria-expanded", isOpen);
  navToggle.setAttribute(
    "aria-label",
    isOpen ? "Tutup navigasi" : "Buka navigasi",
  );
});

const contactForm = document.getElementById("contactForm");
const formFeedback = document.getElementById("formFeedback");

const namaInput = document.getElementById("nama");
const emailInput = document.getElementById("email");
const semesterInput = document.getElementById("semester");
const tanggalInput = document.getElementById("tanggal");
const prodiInput = document.getElementById("prodi");
const pesanInput = document.getElementById("pesan");

contactForm.addEventListener("submit", (event) => {
  event.preventDefault();

  formFeedback.className = "form-feedback-error";

  const nama = namaInput.value.trim();
  if (nama.length < 3 || nama.length > 50) {
    formFeedback.textContent =
      "Nama lengkap harus diisi 3 sampai 50 karakter.";
    return;
  }

  const email = emailInput.value.trim();
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailPattern.test(email)) {
    formFeedback.textContent = "Masukkan alamat email yang valid.";
    return;
  }

  const semester = Number(semesterInput.value);
  if (semesterInput.value === "" || semester < 1 || semester > 14) {
    formFeedback.textContent =
      "Semester harus diisi dengan angka 1 sampai 14.";
    return;
  }

  if (tanggalInput.value === "") {
    formFeedback.textContent = "Tanggal kunjungan harus diisi.";
    return;
  }

  const jenisPesan = document.querySelector(
    'input[name="jenis_pesan"]:checked',
  );

  if (!jenisPesan) {
    formFeedback.textContent = "Pilih jenis pesan.";
    return;
  }

  const topikDipilih = document.querySelectorAll(
    'input[name="minat"]:checked, input[name="minat[]"]:checked',
  );

  if (topikDipilih.length === 0) {
    formFeedback.textContent =
      "Pilih minimal satu topik yang diminati.";
    return;
  }

  if (prodiInput.value === "") {
    formFeedback.textContent = "Pilih program studi.";
    return;
  }

  const pesan = pesanInput.value.trim();
  if (pesan.length === 0) {
    formFeedback.textContent = "Pesan harus diisi.";
    return;
  }

  if (pesan.length > 300) {
    formFeedback.textContent = "Pesan maksimal 300 karakter.";
    return;
  }

  formFeedback.textContent = "Form berhasil divalidasi.";
  formFeedback.className = "form-feedback-success";
  contactForm.submit();
});

contactForm.addEventListener("input", () => {
  formFeedback.textContent = "";
  formFeedback.className = "";
});

contactForm.addEventListener("reset", () => {
  formFeedback.textContent = "";
  formFeedback.className = "";
});

const rencanaKegiatanForm = document.getElementById("rencanaKegiatanForm");
const rencanaFeedback = document.getElementById("rencanaFeedback");

if (rencanaKegiatanForm && rencanaFeedback) {
  const fieldFor = (name) => rencanaKegiatanForm.elements.namedItem(name);

  const clearRencanaFeedback = () => {
    rencanaFeedback.textContent = "";
    rencanaFeedback.className = "form-feedback";
  };

  rencanaKegiatanForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const namaKegiatan = fieldFor("nama_kegiatan").value.trim();
    const kategoriKegiatan = fieldFor("kategori_kegiatan").value;
    const tanggalPelaksanaan = fieldFor("tanggal_pelaksanaan").value;
    const lokasiKegiatan = fieldFor("lokasi_kegiatan").value.trim();
    const deskripsiKegiatan = fieldFor("deskripsi_kegiatan").value.trim();

    let pesanKesalahan = "";

    if (namaKegiatan.length === 0 || namaKegiatan.length > 100) {
      pesanKesalahan = "Nama kegiatan wajib diisi (maksimal 100 karakter).";
    } else if (
      !["akademik", "organisasi", "sosial", "pribadi"].includes(
        kategoriKegiatan,
      )
    ) {
      pesanKesalahan = "Pilih kategori kegiatan yang tersedia.";
    } else if (tanggalPelaksanaan === "") {
      pesanKesalahan = "Tanggal pelaksanaan wajib diisi.";
    } else {
      const tanggal = new Date(`${tanggalPelaksanaan}T00:00:00Z`);
      if (
        Number.isNaN(tanggal.getTime()) ||
        tanggal.toISOString().slice(0, 10) !== tanggalPelaksanaan
      ) {
        pesanKesalahan = "Tanggal pelaksanaan tidak valid.";
      }
    }

    if (!pesanKesalahan && lokasiKegiatan.length === 0) {
      pesanKesalahan = "Lokasi kegiatan wajib diisi.";
    } else if (!pesanKesalahan && lokasiKegiatan.length > 100) {
      pesanKesalahan = "Lokasi kegiatan maksimal 100 karakter.";
    }

    if (!pesanKesalahan && deskripsiKegiatan.length === 0) {
      pesanKesalahan = "Deskripsi kegiatan wajib diisi.";
    } else if (!pesanKesalahan && deskripsiKegiatan.length > 500) {
      pesanKesalahan = "Deskripsi kegiatan maksimal 500 karakter.";
    }

    if (pesanKesalahan) {
      rencanaFeedback.textContent = pesanKesalahan;
      rencanaFeedback.className = "form-feedback-error";
      return;
    }

    rencanaKegiatanForm.submit();
  });

  rencanaKegiatanForm.addEventListener("input", clearRencanaFeedback);
  rencanaKegiatanForm.addEventListener("change", clearRencanaFeedback);
  rencanaKegiatanForm.addEventListener("reset", clearRencanaFeedback);
}