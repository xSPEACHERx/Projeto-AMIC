-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`aluno` (
  `matricula` TINYINT(16) NOT NULL,
  `al_curso` VARCHAR(20) NOT NULL,
  `al_periodo` VARCHAR(15) NOT NULL,
  `al_nome` VARCHAR(80) NOT NULL,
  `al_email` VARCHAR(50) NOT NULL,
  `al_senha` VARCHAR(10) NOT NULL,
  `al_login` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`matricula`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`funcionario` (
  `siape` TINYINT(8) NOT NULL,
  `fn_nome` VARCHAR(60) NOT NULL,
  `fn_email` VARCHAR(50) NOT NULL,
  `fn_senha` VARCHAR(10) NOT NULL,
  `fn_login` VARCHAR(10) NOT NULL,
  `fn_turno` VARCHAR(15) NOT NULL,
  `fn_isTec` TINYINT(1) NOT NULL,
  PRIMARY KEY (`siape`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`maquina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`maquina` (
  `idmaquina` TINYINT(8) NOT NULL,
  `maq_pro` VARCHAR(45) NOT NULL,
  `maq_mem` VARCHAR(10) NOT NULL,
  `maq_pla` VARCHAR(60) NOT NULL,
  `maq_obs` VARCHAR(200) NULL,
  `maq_lic` VARCHAR(60) NULL,
  `maq_lab` VARCHAR(45) NOT NULL,
  `maq_rel_pend` TINYINT NOT NULL,
  `maq_feedbacks` SMALLINT NOT NULL,
  `maq_status` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idmaquina`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`reportes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`reportes` (
  `idreportes` INT NOT NULL,
  `aluno_matricula` TINYINT(16) NOT NULL,
  `funcionario_siape` TINYINT(8) NOT NULL,
  `maquina_idmaquina` TINYINT(8) NOT NULL,
  `re_decricao` VARCHAR(200) NOT NULL,
  `re_titulo` VARCHAR(50) NOT NULL,
  `re_tipo` VARCHAR(20) NOT NULL,
  `re_data` DATETIME NOT NULL,
  PRIMARY KEY (`idreportes`, `aluno_matricula`, `funcionario_siape`, `maquina_idmaquina`),
  INDEX `fk_reportes_aluno1_idx` (`aluno_matricula` ASC) VISIBLE,
  INDEX `fk_reportes_funcionario1_idx` (`funcionario_siape` ASC) VISIBLE,
  INDEX `fk_reportes_maquina1_idx` (`maquina_idmaquina` ASC) VISIBLE,
  CONSTRAINT `fk_reportes_aluno1`
    FOREIGN KEY (`aluno_matricula`)
    REFERENCES `mydb`.`aluno` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reportes_funcionario1`
    FOREIGN KEY (`funcionario_siape`)
    REFERENCES `mydb`.`funcionario` (`siape`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reportes_maquina1`
    FOREIGN KEY (`maquina_idmaquina`)
    REFERENCES `mydb`.`maquina` (`idmaquina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`status` (
  `idstatus` INT NOT NULL,
  `reportes_idreportes` INT NOT NULL,
  `st_tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idstatus`, `reportes_idreportes`),
  INDEX `fk_status_reportes_idx` (`reportes_idreportes` ASC) VISIBLE,
  CONSTRAINT `fk_status_reportes`
    FOREIGN KEY (`reportes_idreportes`)
    REFERENCES `mydb`.`reportes` (`idreportes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
