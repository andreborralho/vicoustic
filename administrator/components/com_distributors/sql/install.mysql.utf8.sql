CREATE TABLE IF NOT EXISTS `#__distributors` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`name` VARCHAR(100)  NOT NULL ,
`address` VARCHAR(400)  NOT NULL ,
`zippostalcode` VARCHAR(100)  NOT NULL ,
`city` VARCHAR(200)  NOT NULL ,
`telephone` VARCHAR(150)  NOT NULL ,
`country` VARCHAR(100)  NOT NULL ,
`email` VARCHAR(200)  NOT NULL ,
`website` VARCHAR(200)  NOT NULL ,
`facebook` VARCHAR(200)  NOT NULL ,
`category` VARCHAR(40)  NOT NULL DEFAULT 'Distributor',
`image` VARCHAR(255)  NOT NULL ,


`music_broadcast` TINYINT(1)  NOT NULL DEFAULT '1',
`hifi_home_cinema` TINYINT(1)  NOT NULL DEFAULT '1',
`building_construction` TINYINT(1)  NOT NULL DEFAULT '1',

`state` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

