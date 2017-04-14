CREATE TABLE IF NOT EXISTS `brand` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(30) NOT NULL)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `type` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(20) NOT NULL)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `model` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `type_id` INT NOT NULL,
  `brand_id` INT NOT NULL,
  `name` VARCHAR(20) NOT NULL,
  CONSTRAINT fk_model_type_id
    FOREIGN KEY (type_id)
    REFERENCES type(id),
  CONSTRAINT fk_model_brand_id
    FOREIGN KEY (brand_id)
    REFERENCES brand(id))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `firstname` VARCHAR(50) NOT NULL,
  `lastname` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `sex` VARCHAR(10) NOT NULL,
  `mail` VARCHAR(100) NOT NULL,
  `birthday` DATE NOT NULL)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `fuel` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(20) NOT NULL)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `cars` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `model_id` INT NOT NULL,
  `users_id` INT NOT NULL,
  `horse_power` INT NOT NULL,
  `nb_place` INT NOT NULL,
  `etat` VARCHAR(100) NOT NULL,
  `color` VARCHAR(20) NOT NULL,
  `price` FLOAT NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `city` VARCHAR(150) NOT NULL,
  `zip_code` INT(5) NOT NULL,
  `visibility` TINYINT NOT NULL,
  `photo` VARCHAR(255) NOT NULL,
  `fuel_id` INT NOT NULL,
  `engine` VARCHAR(20) NOT NULL,
  CONSTRAINT fk_cars_model_id
    FOREIGN KEY (model_id)
    REFERENCES model(id),
  CONSTRAINT fk_cars_users_id
    FOREIGN KEY (users_id)
    REFERENCES users(id),
  CONSTRAINT fk_cars_fuel_id
    FOREIGN KEY (fuel_id)
    REFERENCES fuel(id))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `date_available` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cars_id` INT NOT NULL,
  `date` DATE NOT NULL,
  CONSTRAINT fk_date_available_cars_id
    FOREIGN KEY (cars_id)
    REFERENCES cars(id))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `status` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(50) NOT NULL)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `location` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cars_id` INT NOT NULL,
  `price` FLOAT NOT NULL,
  `users_id` INT NOT NULL,
  `status_id` INT NOT NULL,
  `etat` VARCHAR(100) NOT NULL COMMENT 'Etat du vehicule par le locataire',
  `payment` TINYINT NOT NULL,
  `date_start` DATE NOT NULL,
  `date_end` DATE NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `city` VARCHAR(150) NOT NULL,
  `zip_code` INT(5) NOT NULL,
  `date` DATETIME NOT NULL COMMENT 'Date à laquelle la demande a été effectuée',
  CONSTRAINT fk_location_cars_id
    FOREIGN KEY (cars_id)
    REFERENCES cars(id),
  CONSTRAINT fk_location_users_id
    FOREIGN KEY (users_id)
    REFERENCES users(id),
  CONSTRAINT fk_location_status_id
    FOREIGN KEY (`status_id`)
    REFERENCES `status`(id))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `comment` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `users_id` INT NOT NULL,
  `location_id` INT NOT NULL,
  `comment` TEXT NOT NULL,
  `date` DATETIME NOT NULL,
  CONSTRAINT fk_comment_users_id
    FOREIGN KEY (users_id)
    REFERENCES users(id),
  CONSTRAINT fk_comment_location_id
    FOREIGN KEY (location_id)
    REFERENCES location(id))
ENGINE = InnoDB;
