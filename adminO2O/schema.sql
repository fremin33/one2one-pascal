SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `gestiono2o` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `gestiono2o` ;

-- -----------------------------------------------------
-- Table `gestiono2o`.`clients`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gestiono2o`.`clients` (
  `id` INT NOT NULL ,
  `nom` VARCHAR(45) NULL ,
  `prenom` VARCHAR(45) NULL ,
  `numCarte` VARCHAR(6) NULL ,
  `adresse` VARCHAR(100) NULL ,
  `tel` VARCHAR(10) NULL ,
  `email` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `numCarte_UNIQUE` (`numCarte` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestiono2o`.`formules`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gestiono2o`.`formules` (
  `id` INT NOT NULL ,
  `nom` VARCHAR(45) NULL ,
  `nombreSeances` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestiono2o`.`Abonnement`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gestiono2o`.`Abonnement` (
  `id` INT NOT NULL ,
  `idClient` INT NOT NULL ,
  `idFormules` INT NOT NULL ,
  `nbSeancesRestantes` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

USE `gestiono2o` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
