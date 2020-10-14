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
  `idcategorie` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategorie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogue`.`produits`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`produits` (
  `idproduit` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_du_produit` VARCHAR(65) NOT NULL,
  `top_vente` TINYINT NOT NULL,
  `marque` VARCHAR(45) NOT NULL,
  `descriptif` TEXT(5000) NOT NULL,
  `prix` DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (`idproduit`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogue`.`images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`images` (
  `idimage` INT NOT NULL,
  `legend` VARCHAR(45) NOT NULL,
  `URL` VARCHAR(250) NOT NULL,
  `produits_idproduit` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idimage`),
  UNIQUE INDEX `idimage_UNIQUE` (`idimage` ASC),
  INDEX `fk_images_produits_idx` (`produits_idproduit` ASC),
  CONSTRAINT `fk_images_produits`
    FOREIGN KEY (`produits_idproduit`)
    REFERENCES `catalogue`.`produits` (`idproduit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogue`.`point_de_vente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`point_de_vente` (
  `id` TINYINT(3) UNSIGNED NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `rue` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(10) NOT NULL,
  `codepostal` VARCHAR(4) NOT NULL,
  `ville` VARCHAR(45) NOT NULL,
  `coordonnee` VARCHAR(65) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogue`.`utlisateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`utlisateurs` (
  `id` TINYINT(3) UNSIGNED NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `pseudo` VARCHAR(45) NOT NULL,
  `pwd` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogue`.`promotion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`promotion` (
  `id` TINYINT(3) UNSIGNED NOT NULL,
  `reduction` TINYINT(3) NOT NULL,
  `debut` DATETIME NOT NULL,
  `fin` DATETIME NOT NULL,
  `produits_idproduit` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_promotion_produits1_idx` (`produits_idproduit` ASC),
  CONSTRAINT `fk_promotion_produits1`
    FOREIGN KEY (`produits_idproduit`)
    REFERENCES `catalogue`.`produits` (`idproduit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogue`.`produits_has_categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `catalogue`.`produits_has_categorie` (
  `produits_idproduit` INT UNSIGNED NOT NULL,
  `categorie_idcategorie` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`produits_idproduit`, `categorie_idcategorie`),
  INDEX `fk_produits_has_categorie_categorie1_idx` (`categorie_idcategorie` ASC),
  INDEX `fk_produits_has_categorie_produits1_idx` (`produits_idproduit` ASC),
  CONSTRAINT `fk_produits_has_categorie_produits1`
    FOREIGN KEY (`produits_idproduit`)
    REFERENCES `catalogue`.`produits` (`idproduit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produits_has_categorie_categorie1`
    FOREIGN KEY (`categorie_idcategorie`)
    REFERENCES `catalogue`.`categorie` (`idcategorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
