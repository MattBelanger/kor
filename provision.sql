CREATE DATABASE IF NOT EXISTS kor;
USE kor;

CREATE TABLE IF NOT EXISTS test (
       id INT(11) AUTO_INCREMENT,
       `name` VARCHAR(20),
       PRIMARY KEY(id));

INSERT INTO test(name) VALUES ('Andrea'), ('Matt'), ('Owen'), ('Mia');
