CREATE DATABASE IF NOT EXISTS 'DB_gsmlin';
USE DB_gsmlin;

DROP TABLE IF EXISTS 'Users';
CREATE TABLE IF NOT EXISTS 'Users' (
  'ID_user' INT(11) NOT NULL AUTO_INCREMENT,
  'User_name', VARCHAR(255) NOT NULL,
  'Nick_name' VARCHAR(255) NOT NULL,
  'Password' VARCHAR(255) NOT NULL,
  PRIMARY KEY ('ID_user')
);

INSERT INTO Users(User_name, Nick_name, Password) VALUES
  ('Misael Lin', 'Mi-Lin', 'MyLindo');

DROP TABLE IF EXISTS 'Devices';
CREATE TABLE IF NOT EXISTS 'Devices' (
  'ID_Device'  INT(11) NOT NULL AUTO_INCREMENT,
  'Brand' VARCHAR(255) NOT NULL,
  'Device_name' VARCHAR(255) NOT NULL,
  'Lauch_date' DATE NOT NULL,
  'Spesifies' TEXT NOT NULL,
  PRIMARY KEY ('ID_Device')
);

INSERT INTO Devices(Brand, Device_name, Lauch_date, Spesifies) VALUES
  ('Motorola', 'Moto G7 Plus', '2018/03/23', 'blablablablablabla'),
  ('Samsung', 'Galaxy S8 Edge', '2018/04/28', 'blablablablablabla'),
  ('Apple', 'iPhone X', '2018/02/14', 'blablablablablabla'),
  ('Hawei', 'Mate 3', '2018/05/12', 'blablablablablabla');

DROP TABLE IF EXISTS 'Reviews';
CREATE TABLE IF NOT EXISTS 'Reviews' (
  'Folio' INT(11) NOT NULL AUTO_INCREMENT,
  'ID_User' INT(11) DEFAULT,
  'ID_Device' INT(11) DEFAULT,
  'Review_name' VARCHAR(255) NOT NULL,
  'Content' TEXT NOT NULL,

  PRIMARY KEY ('Folio'),

  KEY 'FK_User_Review' ('ID_User'),
  CONSTRAINT 'FK_User_Review' FOREIGN KEY ('ID_User') REFERENCES 'Users' ('ID_User'),

  KEY 'FK_Device_Review' ('ID_Device'),
  CONSTRAINT 'FK_Device_Review' FOREIGN KEY ('ID_Device') REFERENCES 'Devices' ('ID_Device')
);

INSERT INTO Reviews(Review_name, Content) VALUES
  ('Best Motorola Performance', 'BlaBlaBlaBlaBlaBlaBla'),
  ('The Sweet Edge', 'BlaBlaBlaBlaBlaBlaBla'),
  ('The Luxory Apple', 'BlaBlaBlaBlaBlaBlaBla'),
  ('WTF!', 'BlaBlaBlaBlaBlaBlaBla');
