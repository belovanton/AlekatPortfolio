<?php
$installer = $this;
$installer->startSetup();


$installer->run("
    ALTER TABLE  {$this->getTable('alekatportfolio/data')} ADD  `object` varchar ( 1200 ) NOT NULL;
    ALTER TABLE  {$this->getTable('alekatportfolio/data')} ADD  `address` varchar ( 1200 ) NOT NULL;
    ALTER TABLE  {$this->getTable('alekatportfolio/data')} ADD  `mission` varchar ( 1200 ) NOT NULL;
    ALTER TABLE  {$this->getTable('alekatportfolio/data')} ADD  `cost` varchar ( 1200 ) NOT NULL;
    ALTER TABLE  {$this->getTable('alekatportfolio/data')} ADD  `comment` varchar ( 1200 ) NOT NULL;
");


$installer->endSetup();