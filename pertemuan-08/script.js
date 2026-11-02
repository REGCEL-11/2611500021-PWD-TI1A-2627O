// Navigasi responsif.
const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

if (navToggle && navMenu) {
  navToggle.addEventListener("click", () => {
    const isOpen = navMenu.classList.toggle("nav-open");
    navToggle.setAttribute("aria-expanded", String(isOpen));
    navToggle.setAttribute(
      "aria-label",
      isOpen ? "Tutup navigasi" : "Buka navigasi",
    );
  });
}

// Validasi formulir Kontak.
// Selector menggunakan atribut/class, bukan ID formulir tertentu,
// sehingga formulir lain dapat ditambahkan dengan ID yang berbeda.
const contactForms = document.querySelectorAll(
  'form[data-validation="contact"]',
);

contactForms.forEach((contactForm) => {
  const formFeedback = contactForm.querySelector("[data-form-feedback]");

  const ambilInput = (nama) => contactForm.elements.namedItem(nama);

  contactForm.addEventListener("submit", (event) => {
    // Mencegah pengiriman otomatis sebelum seluruh validasi selesai.
    event.preventDefault();

    const namaInput = ambilInput("nama");
    const emailInput = ambilInput("email");
    const semesterInput = ambilInput("semester");
    const tanggalInput = ambilInput("tanggal");
    const prodiInput = ambilInput("prodi");
    const pesanInput = ambilInput("pesan");
    const jenisPesan = contactForm.querySelector(
      'input[name="jenis_pesan"]:checked',
    );
    const topikDipilih = contactForm.querySelectorAll(
      'input[name="minat[]"]:checked',
    );

    const nama = namaInput.value.trim();
    const email = emailInput.value.trim();
    const semester = Number(semesterInput.value);
    const tanggal = tanggalInput.value;
    const prodi = prodiInput.value;
    const pesan = pesanInput.value.trim();

    const tampilkanKesalahan = (pesanKesalahan) => {
      if (formFeedback) {
        formFeedback.textContent = pesanKesalahan;
        formFeedback.className = "form-feedback-error";
      }
    };

    if (formFeedback) {
      formFeedback.textContent = "";
      formFeedback.className = "form-feedback";
    }

    if (nama.length < 3 || nama.length > 50) {
      tampilkanKesalahan("Nama lengkap harus diisi 3 sampai 50 karakter.");
      return;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      tampilkanKesalahan("Masukkan alamat email yang valid.");
      return;
    }

    if (
      semesterInput.value.trim() === "" ||
      !Number.isInteger(semester) ||
      semester < 1 ||
      semester > 14
    ) {
      tampilkanKesalahan("Semester harus diisi dengan angka 1 sampai 14.");
      return;
    }

    if (tanggal === "") {
      tampilkanKesalahan("Tanggal kunjungan harus diisi.");
      return;
    }

    if (!jenisPesan) {
      tampilkanKesalahan("Pilih jenis pesan.");
      return;
    }

    if (topikDipilih.length === 0) {
      tampilkanKesalahan("Pilih minimal satu topik yang diminati.");
      return;
    }

    if (prodi === "") {
      tampilkanKesalahan("Pilih program studi.");
      return;
    }

    if (pesan.length === 0 || pesan.length > 300) {
      tampilkanKesalahan("Pesan harus diisi dan maksimal 300 karakter.");
      return;
    }

    // Mengirim formulir setelah seluruh validasi JavaScript berhasil.
    // HTMLFormElement.submit() tidak memicu event submit kembali.
    contactForm.submit();
  });

  contactForm.addEventListener("reset", () => {
    if (formFeedback) {
      formFeedback.textContent = "";
      formFeedback.className = "form-feedback";
    }
  });

  contactForm.addEventListener("input", () => {
    if (formFeedback) {
      formFeedback.textContent = "";
      formFeedback.className = "form-feedback";
    }
  });
});

const activityForm = document.getElementById("rencanaKegiatanForm");

if (activityForm) {
  const activityFeedback = activityForm.querySelector(
    "[data-activity-feedback]",
  );
  const fieldFor = (name) => activityForm.elements.namedItem(name);

  const clearActivityFeedback = () => {
    if (activityFeedback) {
      activityFeedback.textContent = "";
      activityFeedback.className = "form-feedback";
    }
  };

  activityForm.addEventListener("submit", (event) => {
    event.preventDefault();
    clearActivityFeedback();

    const activityName = fieldFor("nama_kegiatan").value.trim();
    const category = fieldFor("kategori_kegiatan").value;
    const dateValue = fieldFor("tanggal_pelaksanaan").value;
    const location = fieldFor("lokasi_kegiatan").value.trim();
    const description = fieldFor("deskripsi_kegiatan").value.trim();
    let error = "";

    if (activityName.length === 0 || activityName.length > 100) {
      error = "Nama kegiatan wajib diisi (maksimal 100 karakter).";
    } else if (
      !["akademik", "organisasi", "sosial", "pribadi"].includes(category)
    ) {
      error = "Pilih kategori kegiatan yang tersedia.";
    } else if (dateValue === "") {
      error = "Tanggal pelaksanaan wajib diisi.";
    } else {
      const date = new Date(`${dateValue}T00:00:00Z`);
      if (
        Number.isNaN(date.getTime()) ||
        date.toISOString().slice(0, 10) !== dateValue
      ) {
        error = "Tanggal pelaksanaan tidak valid.";
      }
    }

    if (!error && (location.length === 0 || location.length > 100)) {
      error = "Lokasi kegiatan wajib diisi (maksimal 100 karakter).";
    }

    if (!error && (description.length === 0 || description.length > 500)) {
      error = "Deskripsi kegiatan wajib diisi (maksimal 500 karakter).";
    }

    if (error) {
      if (activityFeedback) {
        activityFeedback.textContent = error;
        activityFeedback.className = "form-feedback-error";
      }
      return;
    }

    activityForm.submit();
  });

  activityForm.addEventListener("input", clearActivityFeedback);
  activityForm.addEventListener("change", clearActivityFeedback);
  activityForm.addEventListener("reset", clearActivityFeedback);
}
