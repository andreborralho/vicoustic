CREATE TABLE IF NOT EXISTS `#__isolation_solutions` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`name` VARCHAR(255)  NOT NULL ,
`ref` VARCHAR(255)  NOT NULL ,
`rw` INT(4)  NOT NULL ,
`stc` INT(4)  NOT NULL ,
`price` FLOAT(6,2)  NOT NULL ,
`graph` VARCHAR(255)  NOT NULL ,
`solution_image` VARCHAR(255)  NOT NULL ,

`solution_data_sheet` VARCHAR(255)  NOT NULL ,
`technical_file1` VARCHAR(255)  NOT NULL ,
`technical_file2` VARCHAR(255)  NOT NULL ,
`technical_file3` VARCHAR(255)  NOT NULL ,
`technical_file4` VARCHAR(255)  NOT NULL ,
`technical_file5` VARCHAR(255)  NOT NULL ,

`blanket_id1` int(11) UNSIGNED NOT NULL,
`antivibratic_id1` int(11) UNSIGNED NOT NULL,
`blanket_id2` int(11) UNSIGNED NOT NULL,
`antivibratic_id2` int(11) UNSIGNED NOT NULL,
`blanket_id3` int(11) UNSIGNED NOT NULL,
`antivibratic_id3` int(11) UNSIGNED NOT NULL,
`blanket_id4` int(11) UNSIGNED NOT NULL,
`antivibratic_id4` int(11) UNSIGNED NOT NULL,
`blanket_id5` int(11) UNSIGNED NOT NULL,
`antivibratic_id5` int(11) UNSIGNED NOT NULL,

`category_id` INT(11) UNSIGNED NOT NULL,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`),
KEY `idx_category_id` (`category_id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__isolation_solution_categories` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(140)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__isolation_solution_currencies` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(140)  NOT NULL ,
`exchange_rate` FLOAT(5,3)  NOT NULL ,
`symbol` VARCHAR(140)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__isolation_solution_units` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(140)  NOT NULL ,
`exchange_rate` FLOAT(5,3)  NOT NULL ,
`symbol` VARCHAR(140)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`created_by` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;