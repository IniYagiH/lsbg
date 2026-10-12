-- Jalankan manual. Surat/riwayat tidak memiliki FK ke snapshot SIKI yang diganti saat refresh.
CREATE TABLE IF NOT EXISTS lsbu_surat_pembekuan (
 id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
 nib VARCHAR(30) NOT NULL,
 id_izin VARCHAR(100) NOT NULL,
 revisi INT UNSIGNED NOT NULL,
 tahun SMALLINT UNSIGNED NOT NULL,
 urutan INT UNSIGNED NOT NULL,
 nomor_surat VARCHAR(100) NOT NULL,
 tanggal_surat DATE NOT NULL,
 snapshot_json LONGTEXT NOT NULL,
 surat_json LONGTEXT NOT NULL,
 created_by VARCHAR(100) NOT NULL,
 created_at DATETIME NOT NULL,
 PRIMARY KEY (id),
 UNIQUE KEY uq_nomor (nomor_surat),
 UNIQUE KEY uq_urutan (tahun, urutan),
 UNIQUE KEY uq_revisi (nib, id_izin, revisi)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

CREATE TABLE IF NOT EXISTS lsbu_surat_pembekuan_email (
 id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
 surat_id BIGINT UNSIGNED NOT NULL,
 penerima VARCHAR(254) NOT NULL,
 is_test TINYINT UNSIGNED NOT NULL DEFAULT 1,
 status VARCHAR(20) NOT NULL,
 created_by VARCHAR(100) NOT NULL,
 created_at DATETIME NOT NULL,
 finished_at DATETIME NULL,
 PRIMARY KEY (id),
 KEY idx_surat_status (surat_id, status, id),
 CONSTRAINT fk_pembekuan_email_surat FOREIGN KEY (surat_id)
 REFERENCES lsbu_surat_pembekuan (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
