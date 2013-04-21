SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `cryptota_luum` ;
CREATE SCHEMA IF NOT EXISTS `cryptota_luum` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `cryptota_luum` ;

-- -----------------------------------------------------
-- Table `cryptota_luum`.`team`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`team` (
  `id` INT NOT NULL ,
  `name` VARCHAR(100) NULL ,
  `activo` TINYINT(1) NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`prefix`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`prefix` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `active` TINYINT(1) NULL DEFAULT 1 ,
  `created_at` TIMESTAMP NULL DEFAULT now() ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`roles` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `active` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`persons`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`persons` (
  `id` INT NOT NULL ,
  `firstname` VARCHAR(100) NULL ,
  `lastname` VARCHAR(100) NULL ,
  `email` VARCHAR(45) NULL ,
  `mobile` VARCHAR(20) NULL ,
  `active` TINYINT(1) NULL ,
  `created_at` TIMESTAMP NULL DEFAULT now() ,
  `team_id` INT NOT NULL ,
  `saludations_id` INT NOT NULL ,
  `roles_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `mobile_UNIQUE` (`mobile` ASC) ,
  INDEX `fk_persons_team1_idx` (`team_id` ASC) ,
  INDEX `fk_persons_saludations1_idx` (`saludations_id` ASC) ,
  INDEX `fk_persons_roles1_idx` (`roles_id` ASC) ,
  CONSTRAINT `fk_persons_team1`
    FOREIGN KEY (`team_id` )
    REFERENCES `cryptota_luum`.`team` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_persons_saludations1`
    FOREIGN KEY (`saludations_id` )
    REFERENCES `cryptota_luum`.`prefix` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_persons_roles1`
    FOREIGN KEY (`roles_id` )
    REFERENCES `cryptota_luum`.`roles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`grant`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`grant` (
  `id` INT NOT NULL ,
  `login` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  `created_at` TIMESTAMP NULL DEFAULT now() ,
  `persons_id` INT NOT NULL ,
  `active` TINYINT(1) NULL DEFAULT 1 ,
  `sessionid` VARCHAR(60) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  INDEX `fk_grant_persons_idx` (`persons_id` ASC) ,
  CONSTRAINT `fk_grant_persons`
    FOREIGN KEY (`persons_id` )
    REFERENCES `cryptota_luum`.`persons` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`metals`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`metals` (
  `id` INT NOT NULL ,
  `name` VARCHAR(50) NULL ,
  `active` TINYINT(1) NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`humitidies`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`humitidies` (
  `id` INT NOT NULL ,
  `name` VARCHAR(50) NULL ,
  `active` TINYINT(1) NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`auditing`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`auditing` (
  `id` INT NOT NULL ,
  `name` VARCHAR(100) NULL ,
  `active` TINYINT(1) NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`status_projects`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`status_projects` (
  `id` INT NOT NULL ,
  ` created_at` TIMESTAMP NULL DEFAULT now() ,
  `updated_at` TIMESTAMP NULL  ,
  `auditing_id` INT NOT NULL ,
  `persons_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_status_projects_auditing1_idx` (`auditing_id` ASC) ,
  INDEX `fk_status_projects_persons1_idx` (`persons_id` ASC) ,
  CONSTRAINT `fk_status_projects_auditing1`
    FOREIGN KEY (`auditing_id` )
    REFERENCES `cryptota_luum`.`auditing` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_status_projects_persons1`
    FOREIGN KEY (`persons_id` )
    REFERENCES `cryptota_luum`.`persons` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`projects`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`projects` (
  `id` INT NOT NULL ,
  `name` VARCHAR(150) NULL ,
  `photo01` VARCHAR(150) NULL ,
  `photo02` VARCHAR(150) NULL ,
  `barcode` VARCHAR(30) NULL ,
  `qrcode` VARCHAR(30) NULL ,
  `lat` FLOAT NULL ,
  `long` FLOAT NULL ,
  `surface` VARCHAR(45) NULL ,
  `description` MEDIUMTEXT NULL ,
  `showDashBoard` TINYINT(1) NULL DEFAULT 0 ,
  `created_at` TIMESTAMP NULL DEFAULT now() ,
  `metals_id` INT NOT NULL ,
  `humities_id` INT NOT NULL ,
  `status_projects_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) ,
  INDEX `fk_projects_metals1_idx` (`metals_id` ASC) ,
  INDEX `fk_projects_humities1_idx` (`humities_id` ASC) ,
  INDEX `fk_projects_status_projects1_idx` (`status_projects_id` ASC) ,
  CONSTRAINT `fk_projects_metals1`
    FOREIGN KEY (`metals_id` )
    REFERENCES `cryptota_luum`.`metals` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_humities1`
    FOREIGN KEY (`humities_id` )
    REFERENCES `cryptota_luum`.`humitidies` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_status_projects1`
    FOREIGN KEY (`status_projects_id` )
    REFERENCES `cryptota_luum`.`status_projects` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`notification`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`notification` (
  `id` INT NOT NULL ,
  `message` TEXT NULL ,
  `typeofservice` TINYINT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `status_projects_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_notification_status_projects1_idx` (`status_projects_id` ASC) ,
  CONSTRAINT `fk_notification_status_projects1`
    FOREIGN KEY (`status_projects_id` )
    REFERENCES `cryptota_luum`.`status_projects` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`tests`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`tests` (
  `id` INT NOT NULL ,
  `name` VARCHAR(100) NULL ,
  `typeofdata` TINYINT NULL ,
  `active` TINYINT(1) NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`typeprices`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`typeprices` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `active` TINYINT(1) NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`prizes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`prizes` (
  `id` INT NOT NULL ,
  `description` TEXT NULL ,
  `award_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `typeprices_id` INT NOT NULL ,
  `projects_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_prizes_typeprices1_idx` (`typeprices_id` ASC) ,
  INDEX `fk_prizes_projects1_idx` (`projects_id` ASC) ,
  CONSTRAINT `fk_prizes_typeprices1`
    FOREIGN KEY (`typeprices_id` )
    REFERENCES `cryptota_luum`.`typeprices` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prizes_projects1`
    FOREIGN KEY (`projects_id` )
    REFERENCES `cryptota_luum`.`projects` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`raiting`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`raiting` (
  `id` INT NOT NULL ,
  `value` TINYINT NULL DEFAULT 0 ,
  `active` TINYINT(1) NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `value_UNIQUE` (`value` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cryptota_luum`.`commentaries`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cryptota_luum`.`commentaries` (
  `id` INT NOT NULL ,
  `commentary` TEXT NULL ,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `projects_id` INT NOT NULL ,
  `persons_id` INT NOT NULL ,
  `raiting_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_commentaries_projects1_idx` (`projects_id` ASC) ,
  INDEX `fk_commentaries_persons1_idx` (`persons_id` ASC) ,
  INDEX `fk_commentaries_raiting1_idx` (`raiting_id` ASC) ,
  CONSTRAINT `fk_commentaries_projects1`
    FOREIGN KEY (`projects_id` )
    REFERENCES `cryptota_luum`.`projects` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_commentaries_persons1`
    FOREIGN KEY (`persons_id` )
    REFERENCES `cryptota_luum`.`persons` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_commentaries_raiting1`
    FOREIGN KEY (`raiting_id` )
    REFERENCES `cryptota_luum`.`raiting` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `cryptota_luum` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `cryptota_luum`.`team`
-- -----------------------------------------------------
START TRANSACTION;
USE `cryptota_luum`;
INSERT INTO `cryptota_luum`.`team` (`id`, `name`, `activo`) VALUES (1, 'public', 1);
INSERT INTO `cryptota_luum`.`team` (`id`, `name`, `activo`) VALUES (2, 'nasa 001', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `cryptota_luum`.`prefix`
-- -----------------------------------------------------
START TRANSACTION;
USE `cryptota_luum`;
INSERT INTO `cryptota_luum`.`prefix` (`id`, `name`, `active`, `created_at`) VALUES (1, 'Jr', 1, NULL);
INSERT INTO `cryptota_luum`.`prefix` (`id`, `name`, `active`, `created_at`) VALUES (2, 'Mr', 1, NULL);
INSERT INTO `cryptota_luum`.`prefix` (`id`, `name`, `active`, `created_at`) VALUES (3, 'Mrs', 1, NULL);
INSERT INTO `cryptota_luum`.`prefix` (`id`, `name`, `active`, `created_at`) VALUES (4, 'PhD', 1, NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `cryptota_luum`.`roles`
-- -----------------------------------------------------
START TRANSACTION;
USE `cryptota_luum`;
INSERT INTO `cryptota_luum`.`roles` (`id`, `name`, `active`) VALUES (1, 'Public', 1);
INSERT INTO `cryptota_luum`.`roles` (`id`, `name`, `active`) VALUES (2, 'Student', 1);
INSERT INTO `cryptota_luum`.`roles` (`id`, `name`, `active`) VALUES (3, 'Professor', 1);
INSERT INTO `cryptota_luum`.`roles` (`id`, `name`, `active`) VALUES (4, 'Teacher', 1);
INSERT INTO `cryptota_luum`.`roles` (`id`, `name`, `active`) VALUES (5, 'Reseacher', 1);
INSERT INTO `cryptota_luum`.`roles` (`id`, `name`, `active`) VALUES (6, 'Austrounat', 1);
INSERT INTO `cryptota_luum`.`roles` (`id`, `name`, `active`) VALUES (7, 'Pilot', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `cryptota_luum`.`metals`
-- -----------------------------------------------------
START TRANSACTION;
USE `cryptota_luum`;
INSERT INTO `cryptota_luum`.`metals` (`id`, `name`, `active`) VALUES (1, 'Stone', 1);
INSERT INTO `cryptota_luum`.`metals` (`id`, `name`, `active`) VALUES (2, 'Plastic', 1);
INSERT INTO `cryptota_luum`.`metals` (`id`, `name`, `active`) VALUES (3, 'Glass', 1);
INSERT INTO `cryptota_luum`.`metals` (`id`, `name`, `active`) VALUES (4, 'Wood', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `cryptota_luum`.`humitidies`
-- -----------------------------------------------------
START TRANSACTION;
USE `cryptota_luum`;
INSERT INTO `cryptota_luum`.`humitidies` (`id`, `name`, `active`) VALUES (1, 'Dry', 1);
INSERT INTO `cryptota_luum`.`humitidies` (`id`, `name`, `active`) VALUES (2, 'Damp', 1);
INSERT INTO `cryptota_luum`.`humitidies` (`id`, `name`, `active`) VALUES (3, 'Wet', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `cryptota_luum`.`auditing`
-- -----------------------------------------------------
START TRANSACTION;
USE `cryptota_luum`;
INSERT INTO `cryptota_luum`.`auditing` (`id`, `name`, `active`) VALUES (1, 'It is received by our lab', 1);
INSERT INTO `cryptota_luum`.`auditing` (`id`, `name`, `active`) VALUES (2, 'it is checked for damage', 1);
INSERT INTO `cryptota_luum`.`auditing` (`id`, `name`, `active`) VALUES (3, 'sequencing machine', 1);
INSERT INTO `cryptota_luum`.`auditing` (`id`, `name`, `active`) VALUES (4, 'the sequencing is completed', 1);
INSERT INTO `cryptota_luum`.`auditing` (`id`, `name`, `active`) VALUES (5, 'we do our initial checks to verify that the sample was sequenced correctly', 1);
INSERT INTO `cryptota_luum`.`auditing` (`id`, `name`, `active`) VALUES (6, 'it moves into our statistical analysis', 1);
INSERT INTO `cryptota_luum`.`auditing` (`id`, `name`, `active`) VALUES (7, 'Not sent', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `cryptota_luum`.`typeprices`
-- -----------------------------------------------------
START TRANSACTION;
USE `cryptota_luum`;
INSERT INTO `cryptota_luum`.`typeprices` (`id`, `name`, `active`) VALUES (1, 'Best Science Fair Entry', 1);
INSERT INTO `cryptota_luum`.`typeprices` (`id`, `name`, `active`) VALUES (2, 'Best Graphic', 1);
INSERT INTO `cryptota_luum`.`typeprices` (`id`, `name`, `active`) VALUES (3, 'Best Diagram', 1);
INSERT INTO `cryptota_luum`.`typeprices` (`id`, `name`, `active`) VALUES (4, 'Best Overall Analysis', 1);
INSERT INTO `cryptota_luum`.`typeprices` (`id`, `name`, `active`) VALUES (5, 'Best Essay', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `cryptota_luum`.`raiting`
-- -----------------------------------------------------
START TRANSACTION;
USE `cryptota_luum`;
INSERT INTO `cryptota_luum`.`raiting` (`id`, `value`, `active`) VALUES (1, 1, 1);
INSERT INTO `cryptota_luum`.`raiting` (`id`, `value`, `active`) VALUES (2, 2, 1);
INSERT INTO `cryptota_luum`.`raiting` (`id`, `value`, `active`) VALUES (3, 3, 1);
INSERT INTO `cryptota_luum`.`raiting` (`id`, `value`, `active`) VALUES (4, 4, 1);
INSERT INTO `cryptota_luum`.`raiting` (`id`, `value`, `active`) VALUES (5, 5, 1);


COMMIT;
