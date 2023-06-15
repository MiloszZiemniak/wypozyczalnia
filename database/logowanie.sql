CREATE DATABASE login;

CREATE TABLE logowanie(
    id int PRIMARY KEY AUTO_INCREMENT,
    login text,
    password text,
    logindb text,
    passworddb text
);

INSERT INTO `logowanie`(`id`, `login`, `password`, `logindb`, `passworddb`) VALUES (NULL,'menadzer','menadzer','menadzerdb','menadzerdb');
INSERT INTO `logowanie`(`id`, `login`, `password`, `logindb`, `passworddb`) VALUES (NULL,'sekretarka','sekretarka','sekretarkadb','sekretarkadb');
INSERT INTO `logowanie`(`id`, `login`, `password`, `logindb`, `passworddb`) VALUES (NULL,'klient','klient','klientdb','klientdb');
