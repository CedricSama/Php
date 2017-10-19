# mysql -u root -p

SHOW DATABASES;

CREATE DATABASE todolist_db;

USE todolist_db;

CREATE TABLE user (
  id_user    INT          NOT NULL AUTO_INCREMENT,
  login      VARCHAR(255) NOT NULL,
  email      VARCHAR(255) NOT NULL,
  password   VARCHAR(255) NOT NULL,
  nom        VARCHAR(255) NOT NULL,
  prenom     VARCHAR(255) NOT NULL,
  is_admin   BOOLEAN      NOT NULL,
  created_at DATETIME     NOT NULL,
  updated_at DATETIME     NOT NULL,
  CONSTRAINT pk_id_user PRIMARY KEY (id_user)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE statut (
  id_statut INT          NOT NULL AUTO_INCREMENT,
  libelle   VARCHAR(255) NOT NULL,
  CONSTRAINT pk_id_statut PRIMARY KEY (id_statut)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE task (
  id_task    INT          NOT NULL AUTO_INCREMENT,
  titre      VARCHAR(255) NOT NULL,
  resume     VARCHAR(255) NOT NULL,
  content    TEXT         NOT NULL,
  created_at DATETIME     NOT NULL,
  updated_at DATETIME     NOT NULL,
  id_statut  INT          NOT NULL,
  id_user    INT          NOT NULL,
  CONSTRAINT pk_id_task PRIMARY KEY (id_task),
  CONSTRAINT fk_id_statut FOREIGN KEY (id_statut) REFERENCES statut (id_statut),
  CONSTRAINT fk_id_user FOREIGN KEY (id_user) REFERENCES user (id_user)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;