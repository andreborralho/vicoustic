CREATE TABLE IF NOT EXISTS `#__accessories` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255)  NOT NULL ,

`ref` VARCHAR(20)  NOT NULL ,
`ean13` BIGINT(13)  NOT NULL ,
`hs_code` BIGINT(17)  NOT NULL ,

`family` VARCHAR(255)  NOT NULL ,
`recycle_coefficient` FLOAT(4,1)  NOT NULL ,

`units_per_box` VARCHAR(100)  NOT NULL ,
`box_length` DECIMAL(5,2)  NOT NULL ,
`box_width` DECIMAL(5,2)  NOT NULL ,
`box_height` DECIMAL(5,2)  NOT NULL ,
`box_volume` DECIMAL(5,3)  NOT NULL ,
`box_weight` DECIMAL(6,3)  NOT NULL ,
`box_msrp` DECIMAL(6,2)  NOT NULL ,

`description1` TEXT NOT NULL ,
`description2` TEXT NOT NULL ,

`catalog_page` VARCHAR(255)  NOT NULL ,
`installation_manual` VARCHAR(255)  NOT NULL ,
`sketchup` VARCHAR(255)  NOT NULL ,
`warranty` VARCHAR(255)  NOT NULL ,
`drawings` VARCHAR(255)  NOT NULL ,
`safety_data` VARCHAR(255)  NOT NULL ,

`video` VARCHAR(255)  NOT NULL ,
`photo_150px` VARCHAR(255)  NOT NULL ,
`photo_300px` VARCHAR(255)  NOT NULL ,
`photo_1024px` VARCHAR(255)  NOT NULL ,
`photo_detail1` VARCHAR(255)  NOT NULL ,
`photo_detail2` VARCHAR(255)  NOT NULL ,
`photo_detail3` VARCHAR(255)  NOT NULL ,
`photo_detail4` VARCHAR(255)  NOT NULL ,
`photo_detail5` VARCHAR(255)  NOT NULL ,
`portfolio_photo_id1` int(11) UNSIGNED NOT NULL,
`portfolio_photo_id2` int(11) UNSIGNED NOT NULL,

`music_broadcast` TINYINT(1)  NOT NULL DEFAULT '1',
`hifi_home_cinema` TINYINT(1)  NOT NULL DEFAULT '1',
`building_construction` TINYINT(1)  NOT NULL DEFAULT '1',

`state` TINYINT(1)  NOT NULL DEFAULT '1',
`state_featured` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

