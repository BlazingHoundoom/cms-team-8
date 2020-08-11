CREATE DATABASE IF NOT EXISTS Content;

use Content;

CREATE TABLE IF NOT EXISTS  Users(
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FName VARCHAR(25) NOT NULL,
    LName VARCHAR(25) NOT NULL,
    UName VARCHAR(25) NOT NULL,
    Email VARCHAR(40) not null,
    Pswd VARCHAR(25) NOT NULL,
    IsAdmin INT,
    IsActive INT
);

CREATE TABLE IF NOT EXISTS WebDocs {
    ID int not null AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(25) NOT NULL,
    Header VARCHAR(25) not NULL,
    ParentPage INT DEFAULT 0,
    Order INT DEFAULT 2,
    IsActive INT
};

-- admistrators
INSERT INTO Users (ID, FName, LName, UName, Email, Pswd, IsAdmin, IsActive)
VALUES (1, 'Wesley', 'Monk', 'wesmon', 'weslay34@gmail.com', '123', 1, 1)
ON DUPLICATES KEY UPDATE
FName = 'Wesley', LName = 'Monk', UName = 'wesmon', Email = 'weslay34@gmail.com', Pswd = '1234', IsAdmin = 1, IsActive = 1;

INSERT INTO Users (ID, FName, LName, UName, Email, Pswd, IsAdmin, IsActive)
VALUES (2, 'Matthew', 'Guernsey', 'matguer', 'matthew99@gmail.com', '456', 1, 1)
ON DUPLICATES KEY UPDATE
FName = 'Matthew', LName = 'Guernsey', UName = 'matguer', Email = 'matthew99@gmail.com', Pswd = '456', IsAdmin = 1, IsActive = 1;

INSERT INTO Users (ID, FName, LName, UName, Email, Pswd, IsAdmin, IsActive)
VALUES (3, 'Mariela', 'Cisneros', 'CisHer', 'marielahdz@gmail.com', '789', 1, 1)
ON DUPLICATES KEY UPDATE
FName = 'Mariela', LName = 'Cisneros', UName = 'CisHer', Email = 'marielahdz@gmail.com', Pswd = '789', IsAdmin = 1, IsActive = 1;
-- user
INSERT INTO Users (ID, FName, LName, UName, Email, Pswd, IsAdmin, IsActive)
VALUES (4, 'Manuel', 'Zavala', 'manny', 'manny23@gmail.com', 'abc2', 0, 1)
ON DUPLICATES KEY UPDATE
FName = 'Manuel', LName = 'Zavala', UName = 'manny', Email = 'manny23@gmail.com', Pswd = 'abc2', IsAdmin = 0, IsActive = 1;

-- PAGES
INSERT INTO WebDocs (ID, Title, Header, Order, IsActive)
VALUES (1, 'Home', 'Home', 0, 1)
ON DUPLICATES KEY UPDATE
Title = 'Home', Header = 'Home', Order = 0, IsActive = 1;

INSERT INTO WebDocs (ID, Title, Header, Order, IsActive)
VALUES (2, 'About Us', 'Abou Us', 2, 1)
ON DUPLICATES KEY UPDATE
Title = 'About Us', Header = 'About Us', Order = 2, IsActive = 1;

-- SUB PAGES
INSERT INTO WebDocs (ID, Title, Header, ParentPage, Order, IsActive)
VALUES (3, 'Home 1', 'Home 1', 1, 3, 1)
ON DUPLICATES KEY UPDATE
Title = 'Home 1', Header = 'Home 1', ParentPage = 1, Order = 3, IsActive = 1;

INSERT INTO WebDocs (ID, Title, Header, ParentPage, Order, IsActive)
VALUES (4, 'Home 2', 'Home 2', 1, 4, 1)
ON DUPLICATES KEY UPDATE
Title = 'Home 2', Header = 'Home 2', ParentPage = 1, Order = 4, IsActive = 1;