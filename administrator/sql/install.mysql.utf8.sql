CREATE TABLE IF NOT EXISTS `#__comet_observations` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`modified_by` INT(11)  NOT NULL ,
`timestamp` DATETIME NOT NULL ,
`observer` INT(11)  NOT NULL ,
`location` VARCHAR(255)  NOT NULL ,
`desg` VARCHAR(255)  NOT NULL ,
`date` DATE NOT NULL ,
`m1` VARCHAR(8)  NOT NULL ,
`diam` VARCHAR(8)  NOT NULL ,
`dc` VARCHAR(255)  NOT NULL ,
`pa` VARCHAR(255)  NOT NULL ,
`scope` VARCHAR(255)  NOT NULL ,
`comments` TEXT NOT NULL ,
`image` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;


INSERT INTO `#__content_types` (`type_title`, `type_alias`, `table`, `content_history_options`)
SELECT * FROM ( SELECT 'Comet Observed','com_comets.cometobserved','{"special":{"dbtable":"#__comet_observations","key":"id","type":"Comet Observed","prefix":"ASO CometsTable"}}', '{"formFile":"administrator\/components\/com_comets\/models\/forms\/cometobserved.xml", "hideFields":["checked_out","checked_out_time","params","language" ,"comments"], "ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"group_id","targetTable":"#__usergroups","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}') AS tmp
WHERE NOT EXISTS (
	SELECT type_alias FROM `#__content_types` WHERE (`type_alias` = 'com_comets.cometobserved')
) LIMIT 1;
