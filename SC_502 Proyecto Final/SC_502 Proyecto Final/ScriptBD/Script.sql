-- crear base de datos en MySQL como "lubricentro"

CREATE DATABASE lubricentro

CREATE TABLE users ( 
    `name` TEXT NOT NULL , 
    `surname` TEXT NOT NULL , 
    `user` VARCHAR(50) NOT NULL , 
    `email` VARCHAR(50) NOT NULL , 
    `pass` VARCHAR(50) NOT NULL ); 