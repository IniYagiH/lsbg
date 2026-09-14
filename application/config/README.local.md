# Konfigurasi lokal

Berkas berikut sengaja tidak disimpan di Git karena pada instalasi ini berisi kredensial atau secret:

- `config.php`
- `database.php`
- `email.php`
- `email_survailen.php`

Saat menyiapkan clone baru, buat berkas tersebut dari konfigurasi CodeIgniter 3 yang sesuai, lalu isi URL aplikasi, encryption key, koneksi database, dan akun SMTP untuk environment tujuan. Jangan commit nilai produksinya.

## Email penilaian Survailen Insidental

Setiap submit penilaian yang berhasil di-commit, baik dari admin/pelaksana maupun verifikator, mengirim email ulang meskipun isinya sama. Penerima berasal dari email biodata badan usaha. Pengirim dan CC mengikuti Survailen reguler; konfigurasi SMTP memakai email.php. Kegagalan email tidak membatalkan penilaian yang sudah tersimpan dan ditampilkan sebagai peringatan.

Tombol email membuka PDF melalui survailen-insidental/dokumen-survailen/{token_nib}?signature={hmac}. Tautan dapat dibuka pemohon tanpa login dan menampilkan penilaian insidental terbaru per NIB. Signature memakai encryption_key pada config.php; kunci wajib diisi dan pergantian kunci membuat tautan email sebelumnya tidak berlaku. Token NIB tanpa signature yang valid ditolak.

PDF insidental memakai library Pdfgenerator (Dompdf), sama seperti survailen reguler, dengan ukuran A4 landscape. Endpoint ini tidak lagi menggunakan Survailen_insidental_pdf maupun cache mpdf-insidental. Data, template laporan, dan signature tautan tetap khusus insidental. Gambar PDF dibaca dari aset lokal. Dompdf bawaan sebelumnya mengalami error kompatibilitas pada PHP 8.3 lokal; render perlu diverifikasi pada environment server yang menjalankan PDF reguler.

Pengujian terisolasi dari root proyek (tanpa SMTP, HTTP, atau database proyek):

    php tests/survailen_insidental_notification_test.php

Tambahkan --render-pdf untuk memeriksa render PDF menggunakan dependency Composer terpasang dan gambar lokal:

    php tests/survailen_insidental_notification_test.php --render-pdf
