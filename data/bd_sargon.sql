
CREATE SCHEMA IF NOT EXISTS `sargon` DEFAULT CHARACTER SET utf8 ;
USE `sargon` ;

-- -----------------------------------------------------
-- Table `mydb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sargon`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `calle` VARCHAR(45) NOT NULL,
  `colonia` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `logo` VARCHAR(45) NULL,
  `maps_url` VARCHAR(45) NULL,
  `descripcion` TEXT NOT NULL,
  `telefono1` VARCHAR(45) NOT NULL,
  `telefono2` VARCHAR(45) NULL,
  `sitio_web` VARCHAR(45) NULL,
  `password` VARCHAR(45) NOT NULL,
  `banner` VARCHAR(45) NULL,
  `rol` VARCHAR(45) NOT NULL DEFAULT 'user',
  `categoria` VARCHAR(45) NOT NULL,
  `municipio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;




