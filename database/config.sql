CREATE DATABASE wypozyczalnia;

CREATE TABLE klient (
    id int PRIMARY KEY AUTO_INCREMENT,
    pesel text NOT NULL,
    imie text NOT NULL,
    nazwisko text NOT NULL,
    ulica varchar(255) NOT NULL,
    miejscowosc text NOT NULL,
    kod_pocztowy varchar(255) NOT NULL,
    telefon int(9) NOT NULL
);
CREATE TABLE pracownik (
    id int PRIMARY KEY AUTO_INCREMENT,
    pesel text NOT NULL,
    imie text NOT NULL,
    nazwisko text NOT NULL,
    ulica varchar(255) NOT NULL,
    miejscowosc text NOT NULL,
    kod_pocztowy varchar(255) NOT NULL,
    telefon int(9) NOT NULL,
    stanowisko text NOT NULL,
    wynagrodzenie float NOT NULL
);
CREATE TABLE samochod (
    id int PRIMARY KEY AUTO_INCREMENT,
    marka text NOT NULL,
    model text NOT NULL,
    rocznik int(4) NOT NULL,
    kolor text NOT NULL,
    silnik text NOT NULL,
    numer_rej text NOT NULL,
    cena_za_dobe float NOT NULL,
    do_wypozyczenia float NOT NULL
);
CREATE TABLE wypozyczenia (
    id int PRIMARY KEY AUTO_INCREMENT,
    id_klienta int NOT NULL,
    id_samochodu int NOT NULL,
    id_pracownika int NOT NULL,
    data_wypo date NOT NULL,
    data_zwrot date NOT NULL,
    koszt_wypo float NOT NULL
);

ALTER TABLE `wypozyczenia` ADD CONSTRAINT `wypo_fk0` FOREIGN KEY (`id_klienta`) REFERENCES `klient`(`id`);
ALTER TABLE `wypozyczenia` ADD CONSTRAINT `wypo_fk1` FOREIGN KEY (`id_samochodu`) REFERENCES `samochod`(`id`);
ALTER TABLE `wypozyczenia` ADD CONSTRAINT `wypo_fk2` FOREIGN KEY (`id_pracownika`) REFERENCES `pracownik`(`id`);

-- wprowadzanie danych do tabel
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('12345678901', 'Jan', 'Kowalski', 'Aleja Kwiatowa 5', 'Warszawa', '00-001', '123456789');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('98765432109', 'Anna', 'Nowak', 'Ul. Słoneczna 10', 'Kraków', '30-010', '987654321');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('56789012345', 'Piotr', 'Wiśniewski', 'Plac Ratuszowy 7', 'Gdańsk', '80-001', '567890123');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('23456789012', 'Marta', 'Lisowska', 'Ul. Lipowa 15', 'Wrocław', '50-500', '234567890');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('90123456789', 'Tomasz', 'Nowicki', 'Rynek 1', 'Poznań', '60-600', '901234567');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('34567890123', 'Ewa', 'Malinowska', 'Pl. Grunwaldzki 3', 'Lublin', '20-200', '345678901');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('67890123456', 'Michał', 'Kaczmarek', 'Ul. Polna 20', 'Katowice', '40-400', '678901234');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('89012345678', 'Magdalena', 'Jankowska', 'Pl. Kościuszki 9', 'Łódź', '90-900', '890123456');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('01234567890', 'Adam', 'Szymański', 'Al. Piłsudskiego 12', 'Gdynia', '70-700', '312345678');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('65432109876', 'Katarzyna', 'Dąbrowska', 'Ul. Ogrodowa 8', 'Szczecin', '80-800', '654321098');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('09876543210', 'Robert', 'Wójcik', 'Pl. Zamkowy 4', 'Bydgoszcz', '10-100', '598765432');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('43210987654', 'Alicja', 'Kwiatkowska', 'Ul. Długa 6', 'Lublin', '20-300', '432109876');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('76543210987', 'Wojciech', 'Witkowski', 'Rynek 2', 'Poznań', '60-700', '765432109');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('10987654321', 'Marzena', 'Pawlak', 'Pl. Wolności 1', 'Wrocław', '50-600', '109876543');
INSERT INTO klient (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon) VALUES ('54321098765', 'Grzegorz', 'Lewandowski', 'Ul. Kwiatowa 3', 'Gdańsk', '80-200', '543210987');

INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('Mercedes', 'S-Class', '2022', 'Czarny', 'V8', 'XYZ 1234', '500', 0);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('BMW', '7 Series', '2021', 'Biały', 'V6', 'ABC 5678', '450', 1);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('Audi', 'A8', '2023', 'Srebrny', 'V6', 'DEF 9012', '480', 1);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('Lexus', 'LS', '2022', 'Czerwony', 'V8', 'GHI 3456', '550', 1);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('Jaguar', 'XF', '2023', 'Czarny', 'V6', 'JKL 7890', '420', 0);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('Porsche', 'Panamera', '2021', 'Biały', 'V8', 'MNO 1234', '800', 0);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('Bentley', 'Continental GT', '2022', 'Niebieski', 'V12', 'PQR 5678', '1800', 1);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('Rolls-Royce', 'Phantom', '2021', 'Czarny', 'V12', 'STU 9012', '1600', 1);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('Ferrari', '488 GTB', '2022', 'Czerwony', 'V8', 'VWX 3456', '2500', 1);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('Lamborghini', 'Aventador', '2023', 'Żółty', 'V12', 'YZA 7890', '2200', 0);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('Maserati', 'Quattroporte', '2021', 'Srebrny', 'V8', 'BCD 1234', '1200', 0);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('Aston Martin', 'DB11', '2022', 'Czarny', 'V12', 'EFG 5678', '1500', 0);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('Bugatti', 'Chiron', '2023', 'Niebieski', 'W16', 'HIJ 9012', '3500', 0);
INSERT INTO samochod (marka, model, rocznik, kolor, silnik, numer_rej, cena_za_dobe, do_wypozyczenia) VALUES ('McLaren', '720S', '2021', 'Czerwony', 'V8', 'KLM 3456', '2900', 1);

INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('12345678901', 'Jan', 'Kowalski', 'Aleja Kwiatowa 5', 'Warszawa', '00-001', '123456789', 'Pracownik obsługi klienta', '3500');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('98765432109', 'Anna', 'Nowak', 'Ul. Słoneczna 10', 'Kraków', '30-010', '987654321', 'Doradca ds. wypożyczeń', '4000');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('56789012345', 'Piotr', 'Wiśniewski', 'Plac Ratuszowy 7', 'Gdańsk', '80-001', '567890123', 'Kierownik filii', '5500');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('23456789012', 'Marta', 'Lisowska', 'Ul. Lipowa 15', 'Wrocław', '50-500', '234567890', 'Specjalista ds. umów', '4200');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('90123456789', 'Tomasz', 'Nowicki', 'Rynek 1', 'Poznań', '60-600', '901234567', 'Pracownik administracyjny', '3200');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('34567890123', 'Ewa', 'Malinowska', 'Pl. Grunwaldzki 3', 'Lublin', '20-200', '345678901', 'Specjalista ds. obsługi floty', '4700');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('67890123456', 'Michał', 'Kaczmarek', 'Ul. Polna 20', 'Katowice', '40-400', '678901234', 'Doradca ds. klientów biznesowych', '5000');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('45678901234', 'Katarzyna', 'Jaworska', 'Aleja Górna 8', 'Łódź', '90-090', '456789012', 'Kierownik działu sprzedaży', '6000');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('78901234567', 'Marcin', 'Kowalczyk', 'Ul. Sportowa 2', 'Szczecin', '70-070', '789012345', 'Specjalista ds. obsługi klienta', '3800');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('01234567890', 'Magda', 'Wójcik', 'Pl. Zamkowy 4', 'Bydgoszcz', '10-100', '012345678', 'Pracownik ds. marketingu', '4500');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('89012345678', 'Adam', 'Kwiatkowski', 'Ul. Długa 6', 'Lublin', '20-300', '890123456', 'Doradca ds. klientów VIP', '5500');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('12345678901', 'Monika', 'Witkowska', 'Rynek 2', 'Poznań', '60-700', '123456789', 'Specjalista ds. obsługi floty', '4700');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('98765432109', 'Tadeusz', 'Pawlak', 'Pl. Wolności 1', 'Wrocław', '50-600', '987654321', 'Pracownik administracyjny', '3200');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('56789012345', 'Karolina', 'Lewandowska', 'Ul. Kwiatowa 3', 'Gdańsk', '80-200', '567890123', 'Doradca ds. obsługi klienta', '3800');
INSERT INTO pracownik (pesel, imie, nazwisko, ulica, miejscowosc, kod_pocztowy, telefon, stanowisko, wynagrodzenie) VALUES ('23456789012', 'Robert', 'Kaczmarek', 'Ul. Wąska 7', 'Kraków', '30-300', '234567890', 'Kierownik filii', '5500');