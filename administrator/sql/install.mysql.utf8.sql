CREATE TABLE IF NOT EXISTS `#__comet_observations` (
`comet_observations_id`  BIGINT(20)   UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',

`timestamp`              DATETIME(6)           NOT NULL DEFAULT '0000-00-00 00:00:00.000000' COMMENT 'timestamp of the observation with 6 decimal precision',
`observer`               BIGINT(20)   UNSIGNED NOT NULL COMMENT 'user ID of the observer',
`Observer_Location`      VARCHAR(255)          NOT NULL COMMENT 'physical location of the observer during the observation',
`designation`            VARCHAR(255)          NOT NULL COMMENT 'Comet designation given in a 7 or 12-character form with blanks',
`m1`                     VARCHAR(10)           NOT NULL COMMENT 'Total absolute magnitude',
`diameter`               VARCHAR(10)           NOT NULL,
`dc`                     VARCHAR(255)          NOT NULL COMMENT 'Degree Of Condensation',
`pa`                     VARCHAR(255)          NOT NULL,
`scope`                  VARCHAR(255)          NOT NULL,
`comments`               TEXT                  NOT NULL,
`image`                  VARCHAR(255)          NOT NULL COMMENT 'Image of the observed object',

`access`                 BIGINT(20)            NOT NULL DEFAULT '0',
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
