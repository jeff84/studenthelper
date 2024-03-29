CREATE TABLE user (id INT NOT NULL AUTO_INCREMENT, nick VARCHAR(20) NOT NULL, email VARCHAR(30) NOT NULL, pass VARCHAR(32) NOT NULL, hochschulid INT, name VARCHAR(30), vorname VARCHAR(30), PRIMARY KEY(id));
CREATE TABLE nachrichten (id INT NOT NULL AUTO_INCREMENT, uservid INT NOT NULL, useraid INT NOT NULL, datetime VARCHAR(19) NOT NULL, betreff VARCHAR(30) NOT NULL, text VARCHAR(300) NOT NULL, gelesen TINYINT(1) NOT NULL, PRIMARY KEY(id));
CREATE TABLE nachhilfe (id INT NOT NULL AUTO_INCREMENT, userid INT NOT NULL, ortid INT NOT NULL, datetime VARCHAR(19) NOT NULL, fach VARCHAR(30) NOT NULL, zeitraum VARCHAR(30) NOT NULL, tage VARCHAR(30) NOT NULL, text VARCHAR(300) NOT NULL, typ TINYINT(1) NOT NULL, erledigt TINYINT(1) NOT NULL, PRIMARY KEY(id));
CREATE TABLE hochschule (id INT NOT NULL AUTO_INCREMENT, ortid INT NOT NULL, name VARCHAR(30) NOT NULL, typ TINYINT(1) NOT NULL, PRIMARY KEY (id));
CREATE TABLE ort (id INT NOT NULL AUTO_INCREMENT, name VARCHAR(30) NOT NULL, xcoords VARCHAR(9) NOT NULL, ycoords VARCHAR(9) NOT NULL, PRIMARY KEY (id));

