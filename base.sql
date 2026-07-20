-- TABLES

CREATE TABLE user (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nom TEXT NOT NULL,
    pwd TEXT NOT NULL,
    type TEXT NOT NULL CHECK (type IN ('admin', 'user')),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE numero (
    id_client INT NOT NULL,
    num VARCHAR(100) NOT NULL UNIQUE,
    PRIMARY KEY (id_client, num),
    FOREIGN KEY (id_client) REFERENCES user(id) ON DELETE CASCADE
);

CREATE TABLE mouvement (
    id_mouv INTEGER AUTO_INCREMENT PRIMARY KEY,
    id_client INTEGER NOT NULL,
    type TEXT NOT NULL CHECK (type IN ('retrait', 'depot')),
    montant INTEGER NOT NULL CHECK (montant > 0),
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_client) REFERENCES user(id)
);

CREATE TABLE transfert (
    id_transfert INTEGER AUTO_INCREMENT PRIMARY KEY,
    id_client INTEGER NOT NULL,
    id_client_dest INTEGER NOT NULL,
    montant INTEGER NOT NULL CHECK (montant > 0),
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_client) REFERENCES user(id),
    FOREIGN KEY (id_client_dest) REFERENCES user(id),
    CHECK (id_client != id_client_dest)
);

-- VUES

CREATE VIEW v_user_numeros AS
SELECT 
    u.id AS user_id,
    u.nom AS user_nom,
    u.type AS user_type,
    n.num AS numero
FROM user u
JOIN numero n ON u.id = n.id_client;

CREATE VIEW v_transferts_emetteurs AS
SELECT 
    t.id_transfert,
    u.id AS emetteur_id,
    u.nom AS emetteur_nom,
    t.id_client_dest AS dest_id,
    t.montant,
    t.date
FROM transfert t
JOIN user u ON t.id_client = u.id;

CREATE VIEW v_transferts_destinataires AS
SELECT 
    t.id_transfert,
    t.id_client AS emetteur_id,
    u.id AS dest_id,
    u.nom AS dest_nom,
    t.montant,
    t.date
FROM transfert t
JOIN user u ON t.id_client_dest = u.id;

CREATE VIEW v_user_mouvements AS
SELECT 
    m.id_mouv,
    u.id AS user_id,
    u.nom AS user_nom,
    m.type AS type_mouvement,
    m.montant,
    m.date
FROM mouvement m
JOIN user u ON m.id_client = u.id;

-- DONNEES DE TEST

INSERT INTO user (nom, pwd, type) VALUES
('alice_admin', '$2y$10$e8T3Z1a7fX9gK0L2mN4oPOQ1R2S3T4U5V6W7X8Y9Z0a1b2c3d4e5f', 'admin'),
('bob_admin','$2y$10$e8T3Z1a7fX9gK0L2mN4oPOQ1R2S3T4U5V6W7X8Y9Z0a1b2c3d4e5f', 'admin'),
('jean_dupont','$2y$10$e8T3Z1a7fX9gK0L2mN4oPOQ1R2S3T4U5V6W7X8Y9Z0a1b2c3d4e5f', 'user'),
('marie_claire','$2y$10$e8T3Z1a7fX9gK0L2mN4oPOQ1R2S3T4U5V6W7X8Y9Z0a1b2c3d4e5f', 'user'),
('luc_martin','$2y$10$e8T3Z1a7fX9gK0L2mN4oPOQ1R2S3T4U5V6W7X8Y9Z0a1b2c3d4e5f', 'user');
INSERT INTO numero (id_client, num) VALUES
(3, '0320123457'),
(4, '0330987655'), 
(5, '0340556678');