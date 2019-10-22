CREATE DATABASE `xerp`;

CREATE TABLE `fabricante` (
    ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL
)

CREATE TABLE `mercadoria` (
    ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL,
    FabricanteID INT NOT NULL,
    Preco DECIMAL(18, 2) NOT NULL,
    CONSTRAINT FK_Mercadoria_FabricanteID FOREIGN KEY (FabricanteID) REFERENCES `fabricante`(ID)

)

INSERT
    INTO `fabricante`
        (Nome)
    VALUES
        ('Fabricante 1'),
        ('Fabricante 2');

INSERT
    INTO `mercadoria`
        (Nome, FabricanteID, Preco)
    VALUES
        ('Mercadoria 1', 1, 10),
        ('Mercadoria 2', 2, 10.5),
        ('Mercadoria 3', 2, 12.8);