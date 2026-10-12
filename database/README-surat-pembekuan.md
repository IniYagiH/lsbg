# Surat pembekuan permanen

## Aktivasi
Jalankan manual database/schema/20261012_create_surat_pembekuan.sql di database aplikasi sebelum memakai penerbitan/email.
Kode tidak menjalankan migrasi. Tabel snapshot SIKI tetap dipakai sebagai sumber daftar, bukan arsip surat.

## Alur
- Surat Pembekuan membuka PDF arsip terbaru berdasarkan NIB + ID izin. Jika belum ada, muncul form nomor/tanggal SP II yang sebenarnya.
- POST Terbitkan Surat menyimpan snapshot identitas dan isian surat, tanggal Asia/Jakarta, serta nomor urut tahunan mulai 001.
- Nomor berbentuk 001/REK-PB/LSBU-GI/X/2026. Nomor SP II berasal dari isian, bukan urutan rekomendasi.
- Nomor/revisi dialokasikan dalam transaksi InnoDB dengan GET_LOCK; indeks unik melindungi nomor, tahun/urutan, dan pasangan NIB/izin/revisi.
- Form menyertakan versi snapshot dan ID surat terbaru. Submit form lama/duplikat ditolak.
- Cetak ulang dan kirim ulang memakai surat yang sama. Terbitkan Surat Baru membuat revisi dan nomor baru secara eksplisit; arsip lama tidak ditimpa.
- Refresh SIKI tidak menghapus atau mengubah dua tabel arsip ini.
- Snapshot berisi nilai surat, bukan berkas PDF biner; desain PDF mengikuti template aplikasi.

## Email
Penerima tetap yagihagiyansyah99@gmail.com, tanpa CC/BCC. Jangan mengartikan status uji sebagai pengiriman ke badan usaha.
Riwayat menyimpan penerima, user, waktu mulai/selesai, is_test dan status PENDING/SENT/FAILED.
PENDING juga berarti belum terkonfirmasi jika proses terputus atau hasil tidak berhasil dicatat.
Pencatatan awal wajib berhasil sebelum SMTP dipanggil. SMTP dan database tidak dapat di-commit sebagai satu transaksi:
periksa kotak masuk sebelum mengulang pengiriman dengan hasil yang belum terkonfirmasi.
SENT berarti library SMTP melaporkan keberhasilan, bukan bukti penerima membaca atau inbox menerima email.
Daftar menampilkan nomor terbaru dan keberhasilan terakhir per NIB + ID izin, termasuk keberhasilan revisi terdahulu, serta kegagalan terbaru.
Pengiriman gagal tidak menghapus keberhasilan sebelumnya.

## Tautan dan transisi
Token AES-256-GCM berlaku 7 hari dan mengikat ID serta fingerprint arsip permanen.
Refresh snapshot tidak memengaruhi token; nomor/tanggal dan isi data tidak mengikuti tanggal klik lagi.
Token versi snapshot lama tidak diterima oleh endpoint arsip: kirim ulang email setelah menerbitkan surat.
Riwayat pengiriman sebelum fitur arsip tidak dapat direkonstruksi otomatis.
Nomor lama yang hanya dibentuk dari ID snapshot tidak dimigrasikan otomatis. Jika nomor tersebut sudah menjadi arsip resmi,
sesuaikan data awal/urutan bersama pengelola arsip sebelum penerbitan pertama.
Jangan menghapus arsip tahunan atau mereset data surat: tabel ini adalah sumber urutan permanen.
Siapa pun yang memegang tautan valid dapat membukanya tanpa login.

## Validasi
php tests/surat_pembekuan_archive_test.php
Pengujian memakai SQLite in-memory dan SMTP/PDF doubles. Tidak mengakses DB proyek, API SIKI atau SMTP nyata.
Sintaks dan rollback diuji; penjadwalan GET_LOCK MySQL, UI browser dan render Dompdf di server tetap perlu diuji.
