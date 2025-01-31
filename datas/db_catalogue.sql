-- MySQL Script generated by MySQL Workbench
-- Tue Oct 27 11:35:11 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema catalogue
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema catalogue
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `catalogue` DEFAULT CHARACTER SET utf8 ;
USE `catalogue` ;

-- -----------------------------------------------------
-- Table `catalogue`.`categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`categorie` (
  `idcategorie` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategorie`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `catalogue`.`produits`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`produits` (
  `idproduit` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `modele` VARCHAR(65) NOT NULL,
  `produit_evident` TINYINT(4) UNSIGNED NOT NULL,
  `marque` VARCHAR(45) NOT NULL,
  `descriptif` TEXT NOT NULL,
  `prix` DECIMAL(5,2) UNSIGNED NOT NULL,
  PRIMARY KEY (`idproduit`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `catalogue`.`images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`images` (
  `idimage` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `legend` VARCHAR(45) NOT NULL,
  `URL` VARCHAR(250) NOT NULL,
  `produits_idproduit` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idimage`),
  UNIQUE INDEX `idimage_UNIQUE` (`idimage` ASC),
  INDEX `fk_images_produits_idx` (`produits_idproduit` ASC),
  CONSTRAINT `fk_images_produits`
    FOREIGN KEY (`produits_idproduit`)
    REFERENCES `catalogue`.`produits` (`idproduit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `catalogue`.`magasin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`magasin` (
  `idMagasin` TINYINT(3) UNSIGNED NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `rue` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(10) NOT NULL,
  `codepostal` VARCHAR(4) NOT NULL,
  `ville` VARCHAR(45) NOT NULL,
  `longitude` VARCHAR(45) NOT NULL,
  `latitude` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idMagasin`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `catalogue`.`produits_has_categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`produits_has_categorie` (
  `produits_id` INT(10) UNSIGNED NOT NULL,
  `categorie_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`produits_id`, `categorie_id`),
  INDEX `fk_produits_has_categorie_categorie1_idx` (`categorie_id` ASC),
  INDEX `fk_produits_has_categorie_produits1_idx` (`produits_id` ASC),
  CONSTRAINT `fk_produits_has_categorie_categorie1`
    FOREIGN KEY (`categorie_id`)
    REFERENCES `catalogue`.`categorie` (`idcategorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produits_has_categorie_produits1`
    FOREIGN KEY (`produits_id`)
    REFERENCES `catalogue`.`produits` (`idproduit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `catalogue`.`promotion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`promotion` (
  `idPromotion` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reduction` TINYINT(3) UNSIGNED NOT NULL,
  `debut` DATETIME NOT NULL,
  `fin` DATETIME NOT NULL,
  `produits_idproduit` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idPromotion`),
  INDEX `fk_promotion_produits1_idx` (`produits_idproduit` ASC),
  CONSTRAINT `fk_promotion_produits1`
    FOREIGN KEY (`produits_idproduit`)
    REFERENCES `catalogue`.`produits` (`idproduit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `catalogue`.`utilisateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`utilisateurs` (
  `idUtilisateur` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `pseudo` VARCHAR(45) NOT NULL,
  `pwd` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idUtilisateur`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
