CREATE TABLE IF NOT EXISTS lsbu_survailen_penilaian_insidental (
    NIB varchar(20) NOT NULL,
    id_survailen_accidental bigint unsigned DEFAULT NULL,
    id_asesor varchar(30) DEFAULT NULL,
    tgl_pelaksanaan date DEFAULT NULL,
    tempat_pelaksanaan text,
    ketidaksesuaian text,
    referensi text,
    rencana_perbaikan text,
    tgl_selesai date DEFAULT NULL,
    jenis_temuan tinyint(1) DEFAULT NULL COMMENT '1=Sesuai, 0=Tidak Sesuai',
    hasil_akhir tinyint(1) DEFAULT NULL COMMENT '1=Sesuai, 0=Perlu Perbaikan',
    hasil_tindak_lanjut tinyint(1) DEFAULT NULL COMMENT '1=Memenuhi, 0=Tidak Memenuhi',
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (NIB),
    KEY idx_penilaian_insidental_accidental (id_survailen_accidental),
    KEY idx_penilaian_insidental_asesor (id_asesor),
    CONSTRAINT fk_penilaian_insidental_accidental
        FOREIGN KEY (id_survailen_accidental)
        REFERENCES lsbu_survailen_permohonan_accidental (id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;