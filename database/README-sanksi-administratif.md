# Sanksi Administratif

1. Pilih database aplikasi di phpMyAdmin atau klien MySQL.
2. Jalankan manual schema/20261010_create_lsbu_sanksi_administratif_sbu.sql.
   Skrip menambah dua tabel InnoDB; tidak menghapus data atau mengubah tabel lama.
3. Login sebagai admin pusat/pelaksana, buka
   survailen-insidental/sangsi-adminstrastif, lalu klik **Refresh Data**.

Token diambil dari Bu_model->token_api_siki(), dengan header token mengikuti
Dashboard. PHP memerlukan ekstensi curl (refresh), mbstring, dan zip (Excel).
Akses HTTPS ke SIKI harus tersedia; verifikasi sertifikat tetap aktif.

Snapshot memuat satu baris per entri API, termasuk ID izin berulang dan entri
identik. Daftar sebelumnya diganti menggunakan DELETE + INSERT dalam transaksi
hanya setelah seluruh respons valid. Tabel metadata mencatat refresh berhasil,
termasuk respons kosong yang sah. GET_LOCK mencegah refresh bersamaan pada
database yang sama.

Klien menerima daftar JSON langsung, data: [...], atau pagination Laravel
data: {data: [...], ...}. Pagination menggunakan current_page, last_page,
total, atau next_page_url/links.next yang menunjuk nomor halaman berikutnya.
Format pagination yang tidak dapat diverifikasi akan ditolak. Seluruh enam
kolom contoh API wajib berupa teks tidak kosong. Respons/format API sesungguhnya
belum diuji; tombol menampilkan kegagalan jika kontraknya berbeda, tanpa
mengganti snapshot. Batas refresh: 90 detik pengambilan, 100 halaman, 50.000 entri.

Pencarian diterapkan melalui tombol Cari. Ekspor XLSX memuat semua baris yang
sesuai pencarian tersebut, bukan hanya halaman tabel aktif.

Pengujian offline:

    php tests/sanksi_administratif_test.php
    php tests/survailen_insidental_bulk_test.php

SQL tidak dijalankan otomatis oleh aplikasi atau pengujian tersebut.
