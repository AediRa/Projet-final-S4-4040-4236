CREATE DATABASE operateur_mobile;

USE operateur_mobile;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL UNIQUE,
    num VARCHAR(100) NOT NULL UNIQUE,
    pwd VARCHAR(255) NOT NULL,
    type ENUM('admin', 'user') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE numero (
    id_client INT NOT NULL FOREIGN KEY (id_client) REFERENCES user(id),
    num VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE mouvement (
    id_mouv INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL FOREIGN KEY (id_client) REFERENCES user(id),
    type ENUM('retrait', 'depot') NOT NULL,
    montant INT NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE transfert (
    id_transfert INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL FOREIGN KEY (id_client) REFERENCES user(id),
    id_client_dest INT NOT NULL FOREIGN KEY (id_client_dest) REFERENCES user(id),
    montant INT NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);