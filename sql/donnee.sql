INSERT INTO users (firstname, lastname, password, sex, mail, birthday) VALUES
('Ashvin', 'Painiaye', SHA1('password'), 'masculin', 'contact@ashvinpainiaye.com', '1996-07-14'),
('Jane', 'Locataire', SHA1('password'), 'feminin', 'jane@doe.com', '1992-01-15'),
('John', 'Doe', SHA1('password'), 'masculin', 'john@doe.fr', '1956-05-12');


INSERT INTO type (name) VALUES
('voiture'), ('camionette'), ('camion');

INSERT INTO brand (name) VALUES
('Peugeot'), ('Renault'), ('Citroen'), ('Ford'), ('Opel'), ('Nissan'), ('Lamborghini'), ('Ferrari'), ('Bugatti'), ('BMW'), ('Audi'), ('Toyota');


INSERT INTO fuel (name) VALUES
('diesel'), ('essence'), ('électrique'), ('hybride');

INSERT INTO status (name) VALUES
('en cours de location'), ('terminée'), ('attente'), ('refuser');


INSERT INTO model (type_id, brand_id, name) VALUES
(1, 1, 106), (1, 1, 107), (1, 1, 108), (1, 1, 205), (1, 1, 206), (1, 1, 207), (1, 1, 208), (1, 1, 306), (1, 1, 307), (1, 1, 308), (1, 1, 3008), (1, 1, 5008),
(1,2, 'Clio 1'), (1,2, 'Clio 2'), (1,2, 'Clio 3'), (1,2, 'Clio 4'), (1,2, 'Megane 1'), (1,2, 'Megane 2'), (1,2, 'Megane 3'), (1,2, 'Megane 4'),
(1,3, 'DS3'), (1,3, 'DS4'), (1,3, 'DS5'), (1,3, 'C3'), (1,3, 'C4'), (1,3, 'C5'),
(1,4, 'Focus'), (1,4, 'Fiesta'),
(1,5, 'Corsa'), (1,5, 'Astra'),
(1,6, 'GTR 2017'),
(1,7, 'Aventador'), (1,7, 'Huracan'),
(1,8, 'La Ferrari'),
(1,9, 'Chiron'),
(1,10, 'M2'), (1,10, 'M3'), (1,10, 'M4'), (1,10, 'M5'), (1,10, 'M6'), (1,10, 'X1'), (1,10, 'X2'), (1,10, 'X3'), (1,10, 'X4'), (1,10, 'X5'), (1,10, 'X6'), (1,10,'I8'),
(1,11, 'RS3'), (1,11, 'RS4'), (1,11, 'RS5'), (1,11, 'RS6');



INSERT INTO cars (model_id, users_id, horse_power, engine, nb_place, etat, color, price, address, city, zip_code, visibility, photo, fuel_id) VALUES
(38, 1, 400, '2.0', 5, 'En super etat', 'blanc', 900, '15 rue des Saphirs Quartier Français', 'Sainte-Suzanne', '97441', 1, '1.jpg', 2),
(1, 3, 70, 'TDI', 5, 'Bon', 'rouge', 59, '35 rue Alphone', 'Saint-Denis', '97400', 1, '1.jpg', 1),
(47, 1, 400, '2.0', 2, 'Neuf', 'blanc', 1200, '15 rue des Saphirs Quartier Français', 'Sainte-Suzanne', '97441', 1, '1.jpg', 4);

INSERT INTO date_available (cars_id, `date`) VALUES
(1, '2017-06-04'),
(1, '2017-06-05'),
(1, '2017-06-06'),
(1, '2017-06-07'),
(1, '2017-06-08'),
(1, '2017-06-09'),
(1, '2017-06-10'),
(1, '2017-06-11'),
(2, '2017-01-05'),
(2, '2017-02-05'),
(2, '2017-03-05'),
(2, '2017-04-05'),
(2, '2017-05-05'),
(2, '2017-06-05'),
(2, '2017-07-05'),
(2, '2017-08-05');

INSERT INTO location (cars_id, users_id, status_id,	etat,	payment, date_start, date_end, `date`) VALUES
(2, 1, 2, 'Correct', 1, '2017-04-08', '2017-04-10', '2017-04-06 14:32'),
(1, 2, 1, 'Correct', 1, '2017-04-10', '2017-04-17', '2017-04-09 18:02');

INSERT INTO comment (users_id, location_id,	comment, `date`) VALUES
(2, 2, 'Superbe voiture !!!!', '2017-04-11 23:19');
