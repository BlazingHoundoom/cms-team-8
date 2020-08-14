CREATE DATABASE IF NOT EXISTS Content;

use Content;

CREATE TABLE IF NOT EXISTS  Users(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FName VARCHAR(25) NOT NULL,
    LName VARCHAR(25) NOT NULL,
    UName VARCHAR(25) NOT NULL,
    Email VARCHAR(40) NOT null,
    Pswd VARCHAR(25) NOT NULL,
    IsAdmin INT,
    IsActive INT
);

CREATE TABLE IF NOT EXISTS WebDocs (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(25) NOT NULL,
    Header VARCHAR(25) NOT NULL,
    PageText VARCHAR(1000) NOT NULL,
    ParentPage INT DEFAULT 0,
    PageOrder INT DEFAULT 2,
    IsActive INT,
    picture BLOB
);

-- admistrators
INSERT INTO Users (id, FName, LName, UName, Email, Pswd, IsAdmin, IsActive)
VALUES (1, 'Wesley', 'Monk', 'wesmon', 'weslay34@gmail.com', '123', 1, 1)
ON DUPLICATE KEY UPDATE
FName = 'Wesley', LName = 'Monk', UName = 'wesmon', Email = 'weslay34@gmail.com', Pswd = '1234', IsAdmin = 1, IsActive = 1;

INSERT INTO Users (id, FName, LName, UName, Email, Pswd, IsAdmin, IsActive)
VALUES (2, 'Matthew', 'Guernsey', 'matguer', 'matthew99@gmail.com', '456', 1, 1)
ON DUPLICATE KEY UPDATE
FName = 'Matthew', LName = 'Guernsey', UName = 'matguer', Email = 'matthew99@gmail.com', Pswd = '456', IsAdmin = 1, IsActive = 1;

INSERT INTO Users (id, FName, LName, UName, Email, Pswd, IsAdmin, IsActive)
VALUES (3, 'Mariela', 'Cisneros', 'CisHer', 'marielahdz@gmail.com', '789', 1, 1)
ON DUPLICATE KEY UPDATE
FName = 'Mariela', LName = 'Cisneros', UName = 'CisHer', Email = 'marielahdz@gmail.com', Pswd = '789', IsAdmin = 1, IsActive = 1;
-- user
INSERT INTO Users (id, FName, LName, UName, Email, Pswd, IsAdmin, IsActive)
VALUES (4, 'Manuel', 'Zavala', 'manny', 'manny23@gmail.com', 'abc2', 0, 1)
ON DUPLICATE KEY UPDATE
FName = 'Manuel', LName = 'Zavala', UName = 'manny', Email = 'manny23@gmail.com', Pswd = 'abc2', IsAdmin = 0, IsActive = 1;

-- PAGES
INSERT INTO WebDocs (id, Title, Header, PageText, PageOrder, IsActive)
VALUES (1, 'Home', 'Home', "Welcome to WmMGMc pets store!!!", 0, 1)
ON DUPLICATE KEY UPDATE
Title = 'Home', Header = 'Home', PageText = "Welcome to WmMgMc pets store!!!", PageOrder = 0, IsActive = 1;

INSERT INTO WebDocs (id, Title, Header, PageText, PageOrder, IsActive)
VALUES (2, 'About Us', 'About Us', "", 2, 1)
ON DUPLICATE KEY UPDATE
Title = 'About Us', Header = 'About Us', PageText = "", PageOrder = 2, IsActive = 1;

INSERT INTO WebDocs (id, Title, Header, PageText, PageOrder, IsActive)
VALUES (3, 'Contact', 'Contact', "Contact!!!!!", 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'Contact', Header = 'Contact', PageText = "Contact!!!!!", PageOrder = 3, IsActive = 1;

-- SUB PAGES
INSERT INTO WebDocs (id, Title, Header, PageText, ParentPage, PageOrder, IsActive)
VALUES (4, 'History', 'History', "WmMgMc is a family business that start on 1990 when the grandmother start collection many pets that found on the streets and don't want that they be alone and have a bad health. ", 2, 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'History', Header = 'History', PageText = "WmMgMc is a family business that start on 1990 when the grandmother start collection many pets that found on the streets and don't want that they be alone and have a bad health. ", ParentPage = 2, PageOrder = 3, IsActive = 1;

INSERT INTO WebDocs (id, Title, Header, PageText, ParentPage, PageOrder, IsActive)
VALUES (5, 'Mission', 'Mission', "Our mission is that every pet have a home where to live, a family to play with a family to play with, someone who takes care of them and above all who gives them the love they need.", 2, 4, 1)
ON DUPLICATE KEY UPDATE
Title = 'Mission', Header = 'Mission', PageText = "Our mission is that every pet have a home where to live, a family to play with a family to play with, someone who takes care of them and above all who gives them the love they need.", ParentPage = 2, PageOrder = 4, IsActive = 1;

INSERT INTO WebDocs (id, Title, Header, PageText, ParentPage, PageOrder, IsActive)
VALUES (6, 'Locations', 'Locations', "9941 North Newbridge Ave. Chicago Heights, IL 60411", 3, 3, 1)
ON DUPLICATE KEY UPDATE
Title = ' History', Header = 'History', PageText = "9941 North Newbridge Ave. Chicago Heights, IL 60411", ParentPage = 2, PageOrder = 3, IsActive = 1;

INSERT INTO WebDocs (id, Title, Header, PageText, ParentPage, PageOrder, IsActive)
VALUES (7, 'Email', 'Email', "marielahdz@gmail.com weslay34@gmail.com matthew99@gmail.com", 3, 4, 1)
ON DUPLICATE KEY UPDATE
Title = 'Email', Header = 'Email', PageText = "marielahdz@gmail.com weslay34@gmail.com matthew99@gmail.com", ParentPage = 2, PageOrder = 4, IsActive = 1;


-- UPDATE WebDocs INNER JOIN Users  
-- SET WebDocs.PageText = Users.Email where WebDocs.id = 7;