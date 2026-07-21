-- TABLES

CREATE TABLE user (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    num TEXT NOT NULL UNIQUE,
    type TEXT NOT NULL CHECK (type IN ('admin', 'user')),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE mouvement (
    id_mouv INTEGER PRIMARY KEY AUTOINCREMENT,
    id_client INTEGER NOT NULL,
    type TEXT NOT NULL CHECK (type IN ('retrait', 'depot')),
    montant INTEGER NOT NULL CHECK (montant > 0),
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_client) REFERENCES user(id)
);

CREATE TABLE transfert (
    id_transfert INTEGER PRIMARY KEY AUTOINCREMENT,
    id_client INTEGER NOT NULL,
    id_client_dest INTEGER NOT NULL,
    montant INTEGER NOT NULL CHECK (montant > 0),
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_client) REFERENCES user(id),
    FOREIGN KEY (id_client_dest) REFERENCES user(id),
    CHECK (id_client != id_client_dest)
);

-- VUES

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
-- Admin
INSERT INTO user (nom, num, type) VALUES
('alice_admin', '0320123457', 'admin'),
('bob_admin', '0330987655', 'admin');
-- Client
INSERT INTO user (nom, num, type) VALUES
('jean_dupont', '0612345678', 'user'),
('marie_claire', '0698765432', 'user'),
('luc_martin', '0711223344', 'user');

-- Dépôts et Retraits pour Jean Dupont (id: 3)
-- Solde mouvements : +150 000 - 30 000 = +120 000 Ar
INSERT INTO mouvement (id_client, type, montant, date) VALUES
(3, 'depot', 100000, '2026-07-01 08:30:00'),
(3, 'depot', 50000, '2026-07-05 14:15:00'),
(3, 'retrait', 30000, '2026-07-10 11:00:00');

-- Dépôts et Retraits pour Marie Claire (id: 4)
-- Solde mouvements : +200 000 - 80 000 = +120 000 Ar
INSERT INTO mouvement (id_client, type, montant, date) VALUES
(4, 'depot', 200000, '2026-07-02 09:00:00'),
(4, 'retrait', 50000, '2026-07-08 16:45:00'),
(4, 'retrait', 30000, '2026-07-12 10:20:00');

-- Dépôts et Retraits pour Luc Martin (id: 5)
-- Solde mouvements : +80 000 - 20 000 = +60 000 Ar
INSERT INTO mouvement (id_client, type, montant, date) VALUES
(5, 'depot', 80000, '2026-07-03 10:00:00'),
(5, 'retrait', 20000, '2026-07-15 15:30:00');