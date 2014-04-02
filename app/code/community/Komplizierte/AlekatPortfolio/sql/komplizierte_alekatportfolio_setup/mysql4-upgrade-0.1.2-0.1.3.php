<?php
$installer = $this;
$installer->startSetup();


$installer->run("
    CREATE TABLE IF NOT EXISTS {$this->getTable('alekatportfolio/images')} (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `portfolio_id` int(11) NOT NULL,
      `image` varchar(512) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=UTF8;
    ALTER TABLE  {$this->getTable('alekatportfolio/data')} DROP  `photo1`;
    ALTER TABLE  {$this->getTable('alekatportfolio/data')} DROP  `photo2`;
    ALTER TABLE  {$this->getTable('alekatportfolio/data')} DROP  `photo3`;
    ALTER TABLE  {$this->getTable('alekatportfolio/data')} DROP  `photo4`;
    ALTER TABLE  {$this->getTable('alekatportfolio/data')} DROP  `photo5`;
    ALTER TABLE  {$this->getTable('alekatportfolio/data')} DROP  `photo6`;
");


$installer->endSetup();