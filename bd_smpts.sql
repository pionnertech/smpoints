SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `SM_usr10000` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `SM_usr10000` ;

-- -----------------------------------------------------
-- Table `SM_usr10000`.`PRO`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SM_usr10000`.`PRO` (
  `PRO_ID` INT NOT NULL AUTO_INCREMENT ,
  `PRO_CODE` VARCHAR(45) NULL ,
  `PRO_CANT_VAL` VARCHAR(45) NULL ,
  `PRO_DESCRIP` TEXT NULL ,
  `PRO_DATE` VARCHAR(45) NULL ,
  `PRO_FAC` INT(10) NULL ,
  PRIMARY KEY (`PRO_ID`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `SM_usr10000`.`FAC`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SM_usr10000`.`FAC` (
  `FAC_ID` INT NOT NULL AUTO_INCREMENT ,
  `FAC_CODE` VARCHAR(45) NULL ,
  `FAC_AUX_USER` VARCHAR(45) NULL ,
  `FAC_AUX_PASS` VARCHAR(45) NULL ,
  `FAC_USR` VARCHAR(45) NULL ,
  `FAC_PASS` VARCHAR(45) NULL ,
  `FAC_NAME` TEXT NULL ,
  `FAC_CUSTOM_NAME` VARCHAR(45) NULL ,
  `FAC_CUSTOM_SURNAME` VARCHAR(45) NULL ,
  `FAC_EST` VARCHAR(45) NULL ,
  PRIMARY KEY (`FAC_ID`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `SM_usr10000`.`QR`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SM_usr10000`.`QR` (
  `QR_ID` INT NOT NULL AUTO_INCREMENT ,
  `QR_VAL` VARCHAR(14) NULL ,
  `QR_KEY` VARCHAR(45) NULL ,
  `QR_EST` VARCHAR(45) NULL ,
  PRIMARY KEY (`QR_ID`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `SM_usr10000`.`RULES`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SM_usr10000`.`RULES` (
  `RULE_ID` INT NOT NULL AUTO_INCREMENT ,
  `RULE_EXP_PROMO` VARCHAR(45) NULL ,
  `RULE_CANT_SCORE` VARCHAR(45) NULL ,
  `RULE_SCORE_VISITOR` VARCHAR(45) NULL ,
  `RULE_FAC_CODE` VARCHAR(45) NULL ,
  `RULEScol` VARCHAR(45) NULL ,
  PRIMARY KEY (`RULE_ID`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `SM_usr10000`.`STORAGE`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SM_usr10000`.`STORAGE` (
  `STR_ID` INT NOT NULL AUTO_INCREMENT ,
  `STR_USR_QR` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL ,
  `STR_USR_BA_SCORE` VARCHAR(45) NULL ,
  `STR_FAC_CODE` VARCHAR(45) NULL ,
  PRIMARY KEY (`STR_ID`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `SM_usr10000`.`TRAFFIC`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SM_usr10000`.`TRAFFIC` (
  `TRF_ID` INT NOT NULL AUTO_INCREMENT ,
  `TRF_FAC_CODE` VARCHAR(45) NULL ,
  `TRF_TICKET` VARCHAR(45) NULL ,
  `TRF_USR_QR` VARCHAR(45) NULL ,
  `TRF_DATE` TIMESTAMP NULL ,
  `TRF_BA_SCORE_WL` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL ,
  `TRF_PROMO` VARCHAR(45) NULL ,
  `TRF_PRO_STATE` VARCHAR(45) NULL ,
  `TRF_TABLE` VARCHAR(45) NULL ,
  `TRF_TOTAL_ASSETS` VARCHAR(45) NULL ,
  `TRF_GAR` VARCHAR(45) NULL ,
  PRIMARY KEY (`TRF_ID`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `SM_usr10000`.`PERSONAL`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SM_usr10000`.`PERSONAL` (
  `PER_ID` INT NOT NULL AUTO_INCREMENT ,
  `PER_NAME` VARCHAR(45) NULL ,
  `PER_SURNAME` VARCHAR(45) NULL ,
  `PER_FAC_CODE` VARCHAR(45) NULL ,
  `PER_PASS` VARCHAR(45) NULL ,
  `PER_AUX_USER` VARCHAR(45) NULL ,
  `PER_DATE` VARCHAR(45) NULL ,
  `PER_LAST_LOGIN` TIMESTAMP NULL ,
  PRIMARY KEY (`PER_ID`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `SM_usr10000`.`USER`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `SM_usr10000`.`USER` (
  `USR_ID` INT NOT NULL AUTO_INCREMENT ,
  `USR_NAME` VARCHAR(45) NULL ,
  `USR_EMAIL` VARCHAR(200) NULL ,
  `USR_QR` VARCHAR(50) NULL ,
  `USR_DATE_ING` TIMESTAMP NULL ,
  PRIMARY KEY (`USR_ID`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
