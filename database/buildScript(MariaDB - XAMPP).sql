-- MySQL Script generated by MySQL Workbench
-- Mon Apr  3 23:41:02 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema chessdb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema chessdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `chessdb` DEFAULT CHARACTER SET utf8 ;
USE `chessdb` ;

-- -----------------------------------------------------
-- Table `chessdb`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chessdb`.`Users` (
  `userID` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(64) CHARACTER SET 'big5' NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE INDEX `userID_UNIQUE` (`userID` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `chessdb`.`Friends`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `chessdb`.`Friends` (
  `relationID` INT NOT NULL AUTO_INCREMENT,
  `userID_1` INT NOT NULL,
  `userID_2` INT NOT NULL,
  PRIMARY KEY (`relationID`, `userID_1`, `userID_2`),
  INDEX `fk_Friends_Users_idx` (`userID_1` ASC),
  INDEX `fk_Friends_Users1_idx` (`userID_2` ASC),
  CONSTRAINT `fk_Friends_Users`
    FOREIGN KEY (`userID_1`)
    REFERENCES `chessdb`.`Users` (`userID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Friends_Users1`
    FOREIGN KEY (`userID_2`)
    REFERENCES `chessdb`.`Users` (`userID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
