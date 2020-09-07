CREATE DATABASE webapp;

use webapp;

CREATE TABLE reviews (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    venuename VARCHAR(30) NOT NULL,
    location VARCHAR (30) NOT NULL,
    dateattended VARCHAR (8) NOT NULL,
    atmosphere VARCHAR (50) NOT NULL,
    menu VARCHAR (30),
    date TIMESTAMP
);
