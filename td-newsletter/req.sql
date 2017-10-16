-- Se connecter à MySql

-- mysql -u root -p

-- Language SQL
-- Afficher les bases
SHOW DATABASES;

-- Créer une bases de donné
CREATE DATABASE newslatter_db;

-- Se placer dans la nouvelle db.php
USE newslatter_db;

-- Creation d'un table
CREATE TABLE user (
  id         INT          NOT NULL AUTO_INCREMENT,
  email      VARCHAR(255) NOT NULL,
  loggin     VARCHAR(255) NOT NULL,
  password   VARCHAR(255) NOT NULL,
  prenom     VARCHAR(255) NOT NULL,
  nom        VARCHAR(255) NOT NULL,
  is_admin   BOOLEAN      NOT NULL,
  created_at DATETIME     NOT NULL,
  CONSTRAINT user_pk PRIMARY KEY (id)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- Voir la structure d'une table

DESC user;