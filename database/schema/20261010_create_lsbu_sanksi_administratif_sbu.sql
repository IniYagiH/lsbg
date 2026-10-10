-- Jalankan manual pada database aplikasi. Tidak mengubah tabel survailen lama.
CREATE TABLE IF NOT EXISTS lsbu_sanksi_administratif_sbu (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    id_izin VARCHAR(100) NOT NULL,
    nib VARCHAR(30) NOT NULL,
    nama_bu VARCHAR(255) NOT NULL,
    kode_subklasifikasi VARCHAR(30) NOT NULL,
    id_kualifikasi VARCHAR(30) NOT NULL,
    keterangan TEXT NOT NULL,
    synced_at DATETIME NOT NULL,
    PRIMARY KEY (id),
    KEY idx_sanksi_nib (nib),
    KEY idx_sanksi_id_izin (id_izin)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Metadata tetap tersedia ketika snapshot API yang sah kosong.
CREATE TABLE IF NOT EXISTS lsbu_sanksi_administratif_sync (
    id TINYINT UNSIGNED NOT NULL,
    synced_at DATETIME NOT NULL,
    row_count INT UNSIGNED NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
