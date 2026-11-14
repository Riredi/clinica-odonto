-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema clinica_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema clinica_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `clinica_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `clinica_db` ;

-- -----------------------------------------------------
-- Table `clinica_db`.`pacientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinica_db`.`pacientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dni` VARCHAR(8) NOT NULL,
  `nombres` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(15) NULL DEFAULT NULL,
  `email` VARCHAR(150) NULL DEFAULT NULL,
  `fecha_nacimiento` DATE NULL DEFAULT NULL,
  `fecha_registro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `dni` (`dni` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `clinica_db`.`doctores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinica_db`.`doctores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cmp` VARCHAR(10) NOT NULL,
  `nombres` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `especialidad` VARCHAR(50) NOT NULL,
  `telefono` VARCHAR(15) NULL DEFAULT NULL,
  `email` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cmp` (`cmp` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `clinica_db`.`citas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clinica_db`.`citas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `paciente_id` INT NOT NULL,
  `doctor_id` INT NOT NULL,
  `fecha_cita` DATE NOT NULL,
  `hora_cita` TIME NOT NULL,
  `motivo` TEXT NULL DEFAULT NULL,
  `estado` ENUM('Pendiente', 'Atendida', 'Cancelada') NULL DEFAULT 'Pendiente',
  `fecha_registro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `paciente_id` (`paciente_id` ASC) VISIBLE,
  INDEX `doctor_id` (`doctor_id` ASC) VISIBLE,
  CONSTRAINT `citas_ibfk_1`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `clinica_db`.`pacientes` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `citas_ibfk_2`
    FOREIGN KEY (`doctor_id`)
    REFERENCES `clinica_db`.`doctores` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
