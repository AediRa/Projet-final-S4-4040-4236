CREATE DATABASE operateur_mobile;

USE operateur_mobile;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    type ENUM('admin', 'user') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE numero (
    id_client INT NOT NULL,
    num VARCHAR(100) NOT NULL UNIQUE,
    FOREIGN KEY (id_client) REFERENCES user(id)
);

CREATE TABLE mouvement (
    id_mouv INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    type ENUM('retrait', 'depot') NOT NULL,
    montant INT NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_client) REFERENCES user(id)
);

CREATE TABLE transfert (
    id_transfert INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    id_client_dest INT NOT NULL,
    montant INT NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_client) REFERENCES user(id),
    FOREIGN KEY (id_client_dest) REFERENCES user(id)
);

-- DONNEES DE TEST

-- 1. Insertion des utilisateurs (Admins & Clients)
INSERT INTO user (nom, num, pwd, type) VALUES
('alice_admin', '0340011122', '$2y$10$e8T3Z1a7fX9gK0L2mN4oPOQ1R2S3T4U5V6W7X8Y9Z0a1b2c3d4e5f', 'admin'),
('bob_admin',   '0340033344', '$2y$10$e8T3Z1a7fX9gK0L2mN4oPOQ1R2S3T4U5V6W7X8Y9Z0a1b2c3d4e5f', 'admin'),
('jean_dupont', '0320123456', '$2y$10$e8T3Z1a7fX9gK0L2mN4oPOQ1R2S3T4U5V6W7X8Y9Z0a1b2c3d4e5f', 'user'),
('marie_claire','0330987654', '$2y$10$e8T3Z1a7fX9gK0L2mN4oPOQ1R2S3T4U5V6W7X8Y9Z0a1b2c3d4e5f', 'user'),
('luc_martin',  '0340556677', '$2y$10$e8T3Z1a7fX9gK0L2mN4oPOQ1R2S3T4U5V6W7X8Y9Z0a1b2c3d4e5f', 'user');

-- 2. Insertion des numéros supplémentaires (UNIQUEMENT pour les 'user', IDs 3, 4 et 5)
INSERT INTO numero (id_client, num) VALUES
(3, '0320123457'), -- Deuxième numéro pour jean_dupont (id = 3)
(3, '0320123458'), -- Troisième numéro pour jean_dupont
(4, '0330987655'), -- Deuxième numéro pour marie_claire (id = 4)
(5, '0340556678'); -- Deuxième numéro pour luc_martin (id = 5)