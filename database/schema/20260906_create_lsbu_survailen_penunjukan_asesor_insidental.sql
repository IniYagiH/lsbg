CREATE TABLE IF NOT EXISTS lsbu_survailen_penunjukan_asesor_insidental (
    id bigint unsigned NOT NULL AUTO_INCREMENT,
    id_survailen_accidental bigint unsigned DEFAULT NULL,
    NIB varchar(20) NOT NULL,
    id_asesor varchar(30) NOT NULL,
    urutan_asesor tinyint unsigned NOT NULL,
    tgl_pelaksanaan date DEFAULT NULL,
    tgl_penunjukan datetime NOT NULL,
    user_penunjukan varchar(30) DEFAULT NULL,
    status enum('AKTIF','DIBATALKAN') NOT NULL DEFAULT 'AKTIF',
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_penunjukan_insidental_nib_status (NIB, status),
    KEY idx_penunjukan_insidental_accidental (id_survailen_accidental),
    KEY idx_penunjukan_insidental_asesor (id_asesor),
    CONSTRAINT fk_penunjukan_insidental_accidental
        FOREIGN KEY (id_survailen_accidental)
        REFERENCES lsbu_survailen_permohonan_accidental (id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;