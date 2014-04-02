<?php

class Komplizierte_AlekatPortfolio_Model_Images extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('alekatportfolio/images');
    }

    public $imagePath = 'portfolio';

    protected function _beforeSave()
    {
        $image = $this->_getData('image');

        $musor = preg_split("/[\.]+/si", $image['name']);
        $extensionFile = $musor[count($musor) - 1];

        $fileName =   rand(9999999,99999999) . "." . $extensionFile;
        $absImagePath = $this->getImagePath() . $fileName;

        if($extensionFile == "jpg" || $extensionFile == "png" || $extensionFile = "bmp" || $extensionFile = "gif") {

            if (move_uploaded_file($image['tmp_name'], $absImagePath)) {
                 $this->setData('image', $fileName);
            }
        }

        return parent::_beforeSave();
    }

    public function getImageUrl(){
        return Mage::getBaseUrl('media') . $this->imagePath . DS;
    }

    public function getUrl($abs = false) {
        if($abs == false)
            return $this->getImageUrl() . $this->getImage();
        return $this->getImagePath() . $this->getImage();
    }

    public function getImagePath()
    {
        return Mage::getBaseDir('media') . DS . $this->imagePath . DS;
    }
}