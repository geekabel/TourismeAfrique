
DROP DATABASE IF EXISTS discover;
CREATE DATABASE IF NOT EXISTS discover;

USE discover;


CREATE TABLE tourisme(
  idTourisme int(4) auto_increment PRIMARY KEY,
  nom VARCHAR(50),
  prenom VARCHAR(50),
  civilite VARCHAR(1),
  photo VARCHAR(100),
  idGuide int(4)

);

CREATE TABLE guide(
  idGuide int(4) auto_increment PRIMARY KEY,
  nomGuide VARCHAR(100) NOT NULL,
  niveau VARCHAR(100) NOT NULL
  
);


  
CREATE TABLE utilisateur(
  iduser int(4) AUTO_INCREMENT PRIMARY KEY,
	login VARCHAR(100) NOT NULL,
	pwd VARCHAR(255) NOT NULL,
	role VARCHAR(50),
	email VARCHAR(255),
	etat INT(1)
	); 
ALTER TABLE tourisme add CONSTRAINT FOREIGN KEY(idGuide) REFERENCES guide(idGuide);

INSERT INTO guide(nomGuide,niveau) VALUES
	('sam','niveau4'),
	('leo','niveau3'),
	('christian','niveau0'),
	('meryle','niveau5'),
	('guillaume','niveau0');

	
  INSERT INTO utilisateur VALUES 
	(1,'admin',md5('123'),'ADMIN','koffigodwin96@gmail.com',1),
	(2,'user1',md5('123'),'VISITEUR','user1@gmail.com',0),
	(3,'user2',md5('123'),'VISITEUR','user2@gmail.com',1);


INSERT INTO tourisme(nom,prenom,civilite,photo,idGuide) VALUES
 
  ('Bondy','Clementine','F','User.png',1),
	('Goulet','Fortun','M','user_green.png',2),
	('Maheu','Bevis','F','User.png',3),
	('Parizeau','Danielle','F','user_green.png',4),
	('Leroy','Aleron','M','User.png',5),
	('Couet','Aubert','M','user_green.png',3),

	('Bondy','Clementine','F','User.png',1),
	('Goulet','Fortun','M','user_green.png',2),
	('Maheu','Bevis','F','User.png',3),
	('Parizeau','Danielle','F','user_green.png',4),
	('Leroy','Aleron','M','User.png',5),
	('Couet','Aubert','M','user_green.png',3), 

	('Bondy','Clementine','F','User.png',1),
	('Goulet','Fortun','M','user_green.png',2),
	('Maheu','Bevis','F','User.png',3),
	('Parizeau','Danielle','F','user_green.png',4),
	('Leroy','Aleron','M','User.png',5),
	('Couet','Aubert','M','user_green.png',3); 
  

 
	
	
SELECT * FROM tourisme;
SELECT * FROM guide;
SELECT * FROM utilisateur;
SELECT login,pwd FROM utilisateur

