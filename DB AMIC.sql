
DROP SCHEMA IF EXISTS `amic` ;
CREATE SCHEMA IF NOT EXISTS `amic` DEFAULT CHARACTER SET utf8 ;
USE `amic` ;
 
-- -----------------------------------------------------
-- Table `amic`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amic`.`usuario` (
  `matricula` BIGINT UNSIGNED NOT NULL,
  `us_curso` VARCHAR(20) NOT NULL,
  `us_periodo` VARCHAR(15) NOT NULL,
  `us_nome` VARCHAR(80) NOT NULL,
  `us_email` VARCHAR(50) NOT NULL,
  `us_senha` VARCHAR(32) NOT NULL,
  `us_login` VARCHAR(10) NOT NULL,
   CONSTRAINT pk_usuario PRIMARY KEY (`matricula`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `amic`.`tecnico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amic`.`tecnico` (
  `siape` INT(8) UNSIGNED NOT NULL,
  `tec_nome` VARCHAR(60) NOT NULL,
  `tec_email` VARCHAR(50) NOT NULL,
  `tec_senha` VARCHAR(32) NOT NULL,
  `tec_login` VARCHAR(10) NOT NULL,
  `tec_isTec` TINYINT(1) NOT NULL,
  CONSTRAINT pk_tecnico PRIMARY KEY (`siape`))
ENGINE = InnoDB;

ALTER TABLE tecnico
modify column tec_senha VARCHAR(32);


-- -----------------------------------------------------
-- Table `amic`.`maquina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amic`.`maquina` (
  `idmaquina` INT(8) UNSIGNED NOT NULL,
  `maq_pro` VARCHAR(70) NOT NULL,
  `maq_mem` VARCHAR(70) NOT NULL,
  `maq_pla` VARCHAR(70) NOT NULL,
  `maq_obs` VARCHAR(200) NULL,
  `maq_lic` VARCHAR(60) NULL,
  `maq_lab` VARCHAR(45) NOT NULL,
  `maq_rel_pend` TINYINT NOT NULL,
  `maq_feedbacks` SMALLINT NOT NULL,
  `maq_status` VARCHAR(20) NOT NULL,
  CONSTRAINT pk_maquina PRIMARY KEY (`idmaquina`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amic`.`reportes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amic`.`reportes` (
  `idreportes` INT NOT NULL,
  `usuario_matricula` BIGINT UNSIGNED NOT NULL,
  `tecnico_siape` INT(8) UNSIGNED NOT NULL,
  `maquina_idmaquina` INT(8) UNSIGNED NOT NULL,
  `re_decricao` VARCHAR(200) NOT NULL,
  `re_titulo` VARCHAR(50) NOT NULL,
  `re_tipo` VARCHAR(20) NOT NULL,
  `re_data` DATETIME NOT NULL,
  CONSTRAINT pk_reportes PRIMARY KEY (`idreportes`, `usuario_matricula`, `tecnico_siape`, `maquina_idmaquina`),
  CONSTRAINT `fk_reportes_usuario`
    FOREIGN KEY (`usuario_matricula`)
    REFERENCES `amic`.`usuario` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reportes_tecnico`
    FOREIGN KEY (`tecnico_siape`)
    REFERENCES `amic`.`tecnico` (`siape`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reportes_maquina`
    FOREIGN KEY (`maquina_idmaquina`)
    REFERENCES `amic`.`maquina` (`idmaquina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `amic`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `amic`.`status` (
  `idstatus` INT NOT NULL,
  `reportes_idreportes` INT NOT NULL,
  `st_tipo` VARCHAR(45) NOT NULL,
  CONSTRAINT pk_status PRIMARY KEY (`idstatus`, `reportes_idreportes`),
  CONSTRAINT `fk_status_reportes`
    FOREIGN KEY (`reportes_idreportes`)
    REFERENCES `amic`.`reportes` (`idreportes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


