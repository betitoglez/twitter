-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema twitter
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `twitter` ;

-- -----------------------------------------------------
-- Schema twitter
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `twitter` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `twitter` ;

-- -----------------------------------------------------
-- Table `twitter`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `twitter`.`users` ;

CREATE TABLE IF NOT EXISTS `twitter`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` BIGINT UNSIGNED NULL,
  `name` VARCHAR(120) NULL,
  `image` VARCHAR(255) NULL,
  `tweets` INT UNSIGNED NULL DEFAULT 0,
  `friends` INT UNSIGNED NULL DEFAULT 0,
  `screen` VARCHAR(120) NULL,
  `location` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_user_UNIQUE` (`id_user` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `twitter`.`tweets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `twitter`.`tweets` ;

CREATE TABLE IF NOT EXISTS `twitter`.`tweets` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_tweet` BIGINT UNSIGNED NULL,
  `text` VARCHAR(255) NULL,
  `retweeted` TINYINT(1) NULL DEFAULT 0,
  `created` DATETIME NULL,
  `id_user` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_idx` (`id_user` ASC),
  UNIQUE INDEX `id_tweet_UNIQUE` (`id_tweet` ASC),
  CONSTRAINT `fk_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `twitter`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

SET SQL_MODE = '';
GRANT USAGE ON *.* TO twitter;
 DROP USER twitter;
SET SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
CREATE USER 'twitter' IDENTIFIED BY 'Twitter2015';

GRANT ALL ON `twitter`.* TO 'twitter';
SET SQL_MODE = '';
GRANT USAGE ON *.* TO twitter_read;
 DROP USER twitter_read;
SET SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
CREATE USER 'twitter_read' IDENTIFIED BY 'Twitter2015';

GRANT SELECT ON TABLE `twitter`.* TO 'twitter_read';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
