drop database if exists teststage;
create database teststage;
use teststage;

CREATE TABLE utilisateurs (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(55) NOT NULL,
    password VARCHAR(55) NOT NULL
);

INSERT INTO utilisateurs (username, password) VALUES ('utilisateur1', 'motdepasse1');
INSERT INTO utilisateurs (username, password) VALUES ('utilisateur2', 'motdepasse2');
