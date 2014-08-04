CREATE TABLE IF NOT EXISTS `#__portfolios` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`title` VARCHAR(255)  NOT NULL ,
`icon` VARCHAR(255) NOT NULL ,
`country` VARCHAR(255)  NOT NULL ,
`category_education` VARCHAR(255)  NOT NULL ,
`category_healthcare` VARCHAR(255)  NOT NULL ,
`category_transports` VARCHAR(255)  NOT NULL ,
`category_retail_leisure` VARCHAR(255)  NOT NULL ,
`category_office` VARCHAR(255)  NOT NULL ,
`category_hifi_home_cinema` VARCHAR(255)  NOT NULL ,
`category_theatre` VARCHAR(255)  NOT NULL ,
`category_outdoor` VARCHAR(255)  NOT NULL ,
`description` TEXT NOT NULL ,
`panel_id1` int(11) UNSIGNED NOT NULL,
`panel_id2` int(11) UNSIGNED NOT NULL,
`panel_id3` int(11) UNSIGNED NOT NULL,
`panel_id4` int(11) UNSIGNED NOT NULL,
`panel_id5` int(11) UNSIGNED NOT NULL,
`panel_id6` int(11) UNSIGNED NOT NULL,
`panel_id7` int(11) UNSIGNED NOT NULL,
`panel_id8` int(11) UNSIGNED NOT NULL,
`door_id` int(11) UNSIGNED NOT NULL,
`blanket_id` int(11) UNSIGNED NOT NULL,
`antivibratic_id1` int(11) UNSIGNED NOT NULL,
`antivibratic_id2` int(11) UNSIGNED NOT NULL,


`music_broadcast` TINYINT(1)  NOT NULL DEFAULT '1',
`hifi_home_cinema` TINYINT(1)  NOT NULL DEFAULT '1',
`building_construction` TINYINT(1)  NOT NULL DEFAULT '1',

`state` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`),
KEY `idx_panel_id1` (`panel_id1`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__portfolio_photos` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`portfolio_id` int(11) UNSIGNED NOT NULL,
`photo` VARCHAR(255)  NOT NULL ,
`thumbnail` VARCHAR(255) NOT NULL ,
`label` VARCHAR(255)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`),
KEY `idx_portfolio_id` (`portfolio_id`)
) DEFAULT COLLATE=utf8_general_ci;