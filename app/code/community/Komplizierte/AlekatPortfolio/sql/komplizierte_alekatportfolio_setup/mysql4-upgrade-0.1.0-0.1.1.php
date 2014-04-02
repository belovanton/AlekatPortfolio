<?php
$installer = $this;
$installer->startSetup();


$installer->run("
    CREATE TABLE IF NOT EXISTS {$this->getTable('alekatportfolio/data')} (
        `id` int(11) NOT NULL auto_increment,
		`title` varchar(255) NOT NULL ,
		`text`  text NOT NULL ,
		`photo1` varchar(255) NOT NULL ,
		`photo2` varchar(255) NOT NULL ,
		`photo3` varchar(255) NOT NULL ,
		`photo4` varchar(255) NOT NULL ,
		`photo5` varchar(255) NOT NULL ,
		`photo6` varchar(255) NOT NULL ,
        `updated_at` TIMESTAMP NULL,
        `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=UTF8;
");


$installer->endSetup();