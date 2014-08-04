CREATE TABLE IF NOT EXISTS `#__acoustic_solutions_mb` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`name` VARCHAR(255)  NOT NULL ,
`ref` VARCHAR(255)  NOT NULL ,
`area_min` FLOAT(4,1)  NOT NULL ,
`area_max` FLOAT(4,1)  NOT NULL ,

`description` TEXT NOT NULL ,

`icon` VARCHAR(255)  NOT NULL ,
`image1` VARCHAR(255)  NOT NULL ,
`image2` VARCHAR(255)  NOT NULL ,
`image3` VARCHAR(255)  NOT NULL ,
`technical_file` VARCHAR(255)  NOT NULL ,

`panel_id1` INT(11) UNSIGNED NOT NULL,
`panel_id2` INT(11) UNSIGNED NOT NULL,
`panel_id3` INT(11) UNSIGNED NOT NULL,
`panel_id4` INT(11) UNSIGNED NOT NULL,

`panel1_boxes` INT(11) UNSIGNED NOT NULL,
`panel2_boxes` INT(11) UNSIGNED NOT NULL,
`panel3_boxes` INT(11) UNSIGNED NOT NULL,
`panel4_boxes` INT(11) UNSIGNED NOT NULL,

`line_id` INT(11) UNSIGNED NOT NULL,
`room_id` INT(11) UNSIGNED NOT NULL,

`state` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;


CREATE TABLE IF NOT EXISTS `#__acoustic_solutions_options` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`name` VARCHAR(255)  NOT NULL ,
`ref` VARCHAR(255)  NOT NULL ,
`icon` VARCHAR(255)  NOT NULL ,
`image` VARCHAR(255)  NOT NULL ,

`solution_id` INT(11) UNSIGNED NOT NULL,
`panel_id1` INT(11) UNSIGNED NOT NULL,
`panel_id2` INT(11) UNSIGNED NOT NULL,

`state` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__acoustic_solution_lines` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`name` VARCHAR(255)  NOT NULL ,

`state` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;


CREATE TABLE IF NOT EXISTS `#__acoustic_solutions_bc` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ref` VARCHAR(255)  NOT NULL ,
`description` TEXT NOT NULL ,

`icon` VARCHAR(255)  NOT NULL ,
`image1` VARCHAR(255)  NOT NULL ,
`image2` VARCHAR(255)  NOT NULL ,
`image3` VARCHAR(255)  NOT NULL ,
`technical_file` VARCHAR(255)  NOT NULL ,

`room_id` INT(11) UNSIGNED NOT NULL,

`panel_id1` INT(11) UNSIGNED NOT NULL,
`panel_id2` INT(11) UNSIGNED NOT NULL,
`panel_id3` INT(11) UNSIGNED NOT NULL,
`panel_id4` INT(11) UNSIGNED NOT NULL,
`panel_id5` INT(11) UNSIGNED NOT NULL,
`panel_id6` INT(11) UNSIGNED NOT NULL,
`panel_id7` INT(11) UNSIGNED NOT NULL,
`panel_id8` INT(11) UNSIGNED NOT NULL,
`panel_id9` INT(11) UNSIGNED NOT NULL,
`panel_id10` INT(11) UNSIGNED NOT NULL,
`panel_id11` INT(11) UNSIGNED NOT NULL,
`panel_id12` INT(11) UNSIGNED NOT NULL,

`panel1_percentage` FLOAT(3,1)  NOT NULL ,
`panel2_percentage` FLOAT(3,1)  NOT NULL ,
`panel3_percentage` FLOAT(3,1)  NOT NULL ,
`panel4_percentage` FLOAT(3,1)  NOT NULL ,
`panel5_percentage` FLOAT(3,1)  NOT NULL ,
`panel6_percentage` FLOAT(3,1)  NOT NULL ,
`panel7_percentage` FLOAT(3,1)  NOT NULL ,
`panel8_percentage` FLOAT(3,1)  NOT NULL ,
`panel9_percentage` FLOAT(3,1)  NOT NULL ,
`panel10_percentage` FLOAT(3,1)  NOT NULL ,
`panel11_percentage` FLOAT(3,1)  NOT NULL ,
`panel12_percentage` FLOAT(3,1)  NOT NULL ,

`state` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;



CREATE TABLE IF NOT EXISTS `#__acoustic_solution_rooms` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`name` VARCHAR(255)  NOT NULL ,

`music_broadcast` TINYINT(1)  NOT NULL DEFAULT '1',
`hifi_home_cinema` TINYINT(1)  NOT NULL DEFAULT '1',
`building_construction` TINYINT(1)  NOT NULL DEFAULT '1',

`state` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;
