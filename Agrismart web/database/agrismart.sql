-- ============================================================
-- AgriSmart - Base de données MySQL / MariaDB
-- Import : phpMyAdmin > onglet Importer, ou  mysql -u root < database/agrismart.sql
-- ============================================================
CREATE DATABASE IF NOT EXISTS agrismart CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE agrismart;

DROP TABLE IF EXISTS tentative_connexion;
DROP TABLE IF EXISTS parcelle;
DROP TABLE IF EXISTS exploitation;
DROP TABLE IF EXISTS utilisateur;

-- ------------------------------------------------------------
-- Utilisateurs (Agriculteur + Administrateur dans la même table, colonne "role")
-- Le rôle n'est JAMAIS choisi par le visiteur : forcé à 'agriculteur' à l'inscription.
-- ------------------------------------------------------------
CREATE TABLE utilisateur (
    id                 INT AUTO_INCREMENT PRIMARY KEY,
    nom                VARCHAR(100) NOT NULL,
    email              VARCHAR(150) NOT NULL UNIQUE,
    mot_de_passe       VARCHAR(255) NOT NULL,              -- hachage password_hash() (bcrypt)
    role               ENUM('agriculteur','administrateur') NOT NULL DEFAULT 'agriculteur',
    telephone          VARCHAR(20)  NOT NULL DEFAULT '',
    adresse            VARCHAR(255) NOT NULL DEFAULT '',
    region             VARCHAR(60)  NOT NULL DEFAULT '',
    niveau_acces       TINYINT      NOT NULL DEFAULT 1,    -- utilisé par les administrateurs
    actif              TINYINT(1)   NOT NULL DEFAULT 1,    -- 0 = compte bloqué par un admin
    derniere_connexion DATETIME NULL,
    created_at         TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_role (role)
) ENGINE=InnoDB;

CREATE TABLE exploitation (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    agriculteur_id  INT NOT NULL,
    nom             VARCHAR(100) NOT NULL,
    localisation    VARCHAR(150) NOT NULL,
    created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_exploitation_user FOREIGN KEY (agriculteur_id) REFERENCES utilisateur(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE parcelle (
    id               INT AUTO_INCREMENT PRIMARY KEY,
    exploitation_id  INT NOT NULL,
    nom              VARCHAR(100) NOT NULL,
    surface          DECIMAL(8,2) NOT NULL,                 -- hectares
    type_sol         ENUM('Argileux','Sablonneux','Limoneux','Calcaire') NOT NULL,
    CONSTRAINT fk_parcelle_exploitation FOREIGN KEY (exploitation_id) REFERENCES exploitation(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Protection contre la force brute sur la connexion (voir UserController::login)
CREATE TABLE tentative_connexion (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    email       VARCHAR(150) NOT NULL,
    ip          VARCHAR(45)  NOT NULL,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_ip (ip)
) ENGINE=InnoDB;

-- ------------------------------------------------------------
-- Données de démonstration
--   Administrateur : admin@agrismart.tn / Admin@1234
--   Agriculteurs   : ahmed@agrismart.tn, fatma@agrismart.tn, mohamed@agrismart.tn / demo1234
-- ------------------------------------------------------------
INSERT INTO utilisateur (id, nom, email, mot_de_passe, role, telephone, adresse, region, niveau_acces) VALUES
(1, 'Ahmed Ben Salah', 'ahmed@agrismart.tn',   '$2y$12$TiqTxL6rFVbf9iENBpU8MOtCIkrrU0etwJPmsAitVfkdCuoEFX5MG', 'agriculteur',   '+216 98 123 456', 'Rue de la Liberté, Sidi Bouzid',      'Sidi Bouzid', 1),
(2, 'Fatma Trabelsi',  'fatma@agrismart.tn',   '$2y$12$TiqTxL6rFVbf9iENBpU8MOtCIkrrU0etwJPmsAitVfkdCuoEFX5MG', 'agriculteur',   '+216 97 654 321', 'Route de Sousse, Kairouan',           'Kairouan',    1),
(3, 'Mohamed Gharbi',  'mohamed@agrismart.tn', '$2y$12$TiqTxL6rFVbf9iENBpU8MOtCIkrrU0etwJPmsAitVfkdCuoEFX5MG', 'agriculteur',   '+216 55 222 111', 'Avenue Habib Bourguiba, Nabeul',      'Nabeul',      1),
(4, 'Admin AgriSmart', 'admin@agrismart.tn',   '$2y$12$rsAidkOcP5YdetFQ8FRLWu3bt6KePXWBVGD/p5FyG9aMz/g6Z27Qa', 'administrateur','',                '',                                '',            1);

INSERT INTO exploitation (id, agriculteur_id, nom, localisation) VALUES
(1, 1, 'Ferme El Baraka',   'Sidi Bouzid'),
(2, 1, 'Verger Ben Salah',  'Regueb'),
(3, 2, 'Domaine Trabelsi',  'Kairouan'),
(4, 3, 'Serres du Cap Bon', 'Nabeul');

INSERT INTO parcelle (exploitation_id, nom, surface, type_sol) VALUES
(1, 'Parcelle Nord',  4.50, 'Argileux'),
(1, 'Parcelle Sud',   3.00, 'Sablonneux'),
(2, 'Oliveraie',      6.20, 'Calcaire'),
(3, 'Champ de blé',   8.00, 'Limoneux'),
(4, 'Serre tomates',  1.20, 'Limoneux'),
(4, 'Serre poivrons', 0.90, 'Sablonneux');
