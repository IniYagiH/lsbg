# Konfigurasi lokal

Berkas berikut sengaja tidak disimpan di Git karena pada instalasi ini berisi kredensial atau secret:

- `config.php`
- `database.php`
- `email.php`
- `email_survailen.php`

Saat menyiapkan clone baru, buat berkas tersebut dari konfigurasi CodeIgniter 3 yang sesuai, lalu isi URL aplikasi, encryption key, koneksi database, dan akun SMTP untuk environment tujuan. Jangan commit nilai produksinya.
