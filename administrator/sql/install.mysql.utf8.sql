CREATE TABLE IF NOT EXISTS `#__comet_observations` (
`comet_observations_id`  BIGINT(20)   UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
`comet_designation_id`   BIGINT(20)   UNSIGNED NOT NULL COMMENT 'Forgien Key to #__comet_designation table',
`comet_observatory_id`   BIGINT(20)   UNSIGNED NOT NULL COMMENT 'Forgien Key to #__comet_observatory table',

`observer`               BIGINT(20)   UNSIGNED NOT NULL COMMENT 'user ID of the observer',
`observer_Location`      VARCHAR(255)          NOT NULL COMMENT 'physical location of the observer during the observation',
`timestamp`              DATETIME(6)           NOT NULL DEFAULT '0000-00-00 00:00:00.000000' COMMENT 'timestamp of the observation with 6 decimal precision',
`M1`                     VARCHAR(10)           NOT NULL COMMENT 'Total absolute magnitude',
`M2`                     VARCHAR(10)           NOT NULL DEFAULT '' COMMENT 'Nuclear absolute magnitude',
`diameter`               VARCHAR(10)           NOT NULL,
`dc`                     VARCHAR(255)          NOT NULL COMMENT 'Degree Of Condensation',
`pa`                     VARCHAR(255)          NOT NULL COMMENT 'Position angle, the angle measured counterclockwise relative to the north celestial pole.',
`scope`                  VARCHAR(255)          NOT NULL COMMENT 'Scope used',
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
KEY `idx_comet_designation_id` (`comet_designation_id`),
KEY `idx_comet_observatory_id` (`comet_observatory_id`),
KEY `idx_locked` (`locked_by`),
KEY `idx_enabled` (`enabled`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__comet_designation` (
`comet_designation_id`  BIGINT(20)   UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
`designation`           VARCHAR(255)          NOT NULL COMMENT 'Comet designation given in a 7 or 12-character form with blanks',
`name`                  VARCHAR(255)          NOT NULL DEFAULT '' COMMENT 'Comet name if given',
`discription`           VARCHAR(255)          NOT NULL DEFAULT '' COMMENT 'General discription of Comet',

`access`                BIGINT(20)            NOT NULL DEFAULT '0',
`enabled`               TINYINT(1)            NOT NULL DEFAULT '1',
`ordering`              BIGINT(20)   UNSIGNED NOT NULL,
`created_on`            DATETIME              NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by`            BIGINT(20)   UNSIGNED NOT NULL DEFAULT '0',
`modified_on`           DATETIME              NOT NULL DEFAULT '0000-00-00 00:00:00',
`modified_by`           BIGINT(20)   UNSIGNED NOT NULL DEFAULT '0',
`locked_on`             DATETIME              NOT NULL DEFAULT '0000-00-00 00:00:00',
`locked_by`             BIGINT(20)   UNSIGNED NOT NULL DEFAULT '0',

PRIMARY KEY (`comet_designation_id`),
UNIQUE KEY (`designation`),
KEY `idx_locked` (`locked_by`),
KEY `idx_enabled` (`enabled`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__comet_observatory` (
`comet_observatory_id`  BIGINT(20)   UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
`observatory_id`        VARCHAR(4)            NOT NULL COMMENT 'observatory designation ID http://www.minorplanetcenter.net/iau/lists/ObsCodes.html',
`observatory_name`      VARCHAR(255)          NOT NULL COMMENT 'observatory name',
`observatory_location`  VARCHAR(255)          NOT NULL COMMENT 'observatory location',

`access`                BIGINT(20)            NOT NULL DEFAULT '0',
`enabled`               TINYINT(1)            NOT NULL DEFAULT '1',
`ordering`              BIGINT(20)   UNSIGNED NOT NULL,
`created_on`            DATETIME              NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by`            BIGINT(20)   UNSIGNED NOT NULL DEFAULT '0',
`modified_on`           DATETIME              NOT NULL DEFAULT '0000-00-00 00:00:00',
`modified_by`           BIGINT(20)   UNSIGNED NOT NULL DEFAULT '0',
`locked_on`             DATETIME              NOT NULL DEFAULT '0000-00-00 00:00:00',
`locked_by`             BIGINT(20)   UNSIGNED NOT NULL DEFAULT '0',

PRIMARY KEY (`comet_observatory_id`),
KEY `idx_locked` (`locked_by`),
KEY `idx_enabled` (`enabled`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;
