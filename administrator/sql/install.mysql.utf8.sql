CREATE TABLE IF NOT EXISTS `#__comet_observations` (
`comet_observations_id`  BIGINT(20)   UNSIGNED NOT NULL AUTO_INCREMENT,,

`timestamp`              DATETIME              NOT NULL DEFAULT '0000-00-00 00:00:00',
`observer`               INT(11)               NOT NULL ,
`location`               VARCHAR(255)          NOT NULL ,
`desg`                   VARCHAR(255)          NOT NULL ,
`date`                   DATETIME              NOT NULL DEFAULT '0000-00-00 00:00:00',
`m1`                     VARCHAR(8)            NOT NULL ,
`diam`                   VARCHAR(8)            NOT NULL ,
`dc`                     VARCHAR(255)          NOT NULL ,
`pa`                     VARCHAR(255)          NOT NULL ,
`scope`                  VARCHAR(255)          NOT NULL ,
`comments`               TEXT                  NOT NULL ,
`image`                  VARCHAR(255)          NOT NULL ,

`access`                 INT(11)               NOT NULL DEFAULT '0',
`enabled`                TINYINT(1)            NOT NULL DEFAULT '1',
`ordering`               BIGINT(20)   UNSIGNED NOT NULL,
`created_on`             DATETIME              NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by`             BIGINT(20)   UNSIGNED NOT NULL DEFAULT '0',
`modified_on`            DATETIME              NOT NULL DEFAULT '0000-00-00 00:00:00',
`modified_by`            BIGINT(20)   UNSIGNED NOT NULL DEFAULT '0',
`locked_on`              DATETIME              NOT NULL DEFAULT '0000-00-00 00:00:00',
`locked_by`              BIGINT(20)   UNSIGNED NOT NULL DEFAULT '0',

PRIMARY KEY (`comet_observations_id`),
KEY `idx_locked` (`locked_by`),
KEY `idx_enabled` (`enabled`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;
