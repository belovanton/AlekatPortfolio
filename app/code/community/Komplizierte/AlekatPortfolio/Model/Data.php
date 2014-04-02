<?php

class Komplizierte_AlekatPortfolio_Model_Data extends Mage_Core_Model_Abstract
{

    protected function _construct()
    {
        parent::_construct();
        $this->_init('alekatportfolio/data');
    }

    protected $imagePath = 'portfolio';


    protected function _beforeSave()
    {
        if ($this->getData('photo1/delete')) {
            $this->unsImage('photo1');
        }
        if ($this->getData('photo2/delete')) {
            $this->unsImage('photo2');
        }
        if ($this->getData('photo3/delete')) {
            $this->unsImage('photo3');
        }
        if ($this->getData('photo4/delete')) {
            $this->unsImage('photo4');
        }
        if ($this->getData('photo5/delete')) {
            $this->unsImage('photo5');
        }
        if ($this->getData('photo6/delete')) {
            $this->unsImage('photo6');
        }
        try {
            $uploader = new Varien_File_Uploader('photo1');
            $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
            $uploader->setAllowRenameFiles(true);
            $this->setPhoto1($uploader);
        } catch (Exception $e) {
            // it means that we do not have files for uploading
        }
        try {
            $uploader = new Varien_File_Uploader('photo2');
            $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
            $uploader->setAllowRenameFiles(true);
            $this->setPhoto2($uploader);
        } catch (Exception $e) {
            // it means that we do not have files for uploading
        }
        try {
            $uploader = new Varien_File_Uploader('photo3');
            $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
            $uploader->setAllowRenameFiles(true);
            $this->setPhoto3($uploader);
        } catch (Exception $e) {
            // it means that we do not have files for uploading
        }
        try {
            $uploader = new Varien_File_Uploader('photo4');
            $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
            $uploader->setAllowRenameFiles(true);
            $this->setPhoto4($uploader);
        } catch (Exception $e) {
            // it means that we do not have files for uploading
        }
        try {
            $uploader = new Varien_File_Uploader('photo5');
            $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
            $uploader->setAllowRenameFiles(true);
            $this->setPhoto5($uploader);
        } catch (Exception $e) {
            // it means that we do not have files for uploading
        }
        try {
            $uploader = new Varien_File_Uploader('photo6');
            $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
            $uploader->setAllowRenameFiles(true);
            $this->setPhoto6($uploader);
        } catch (Exception $e) {
            // it means that we do not have files for uploading
        }

        return parent::_beforeSave();
    }

    public function getImagePath()
    {
        return Mage::getBaseDir('media') . DS . $this->imagePath . DS;
    }

    public function setPhoto1($image)
    {
        if ($image instanceof Varien_File_Uploader) {
            $image->save($this->getImagePath());
            $image = $image->getUploadedFileName();
        }
        $this->setData('photo1', $image);
        return $this;
    }

    public function setPhoto2($image)
    {
        if ($image instanceof Varien_File_Uploader) {
            $image->save($this->getImagePath());
            $image = $image->getUploadedFileName();
        }
        $this->setData('photo2', $image);
        return $this;
    }

    public function setPhoto3($image)
    {
        if ($image instanceof Varien_File_Uploader) {
            $image->save($this->getImagePath());
            $image = $image->getUploadedFileName();
        }
        $this->setData('photo3', $image);
        return $this;
    }

    public function setPhoto4($image)
    {
        if ($image instanceof Varien_File_Uploader) {
            $image->save($this->getImagePath());
            $image = $image->getUploadedFileName();
        }
        $this->setData('photo4', $image);
        return $this;
    }

    public function setPhoto5($image)
    {
        if ($image instanceof Varien_File_Uploader) {
            $image->save($this->getImagePath());
            $image = $image->getUploadedFileName();
        }
        $this->setData('photo5', $image);
        return $this;
    }

    public function setPhoto6($image)
    {
        if ($image instanceof Varien_File_Uploader) {
            $image->save($this->getImagePath());
            $image = $image->getUploadedFileName();
        }
        $this->setData('photo6', $image);
        return $this;
    }

    public function getPhoto1($path='web')
    {
        if ($path=='absolute'){
            if ($image = $this->getData('photo1')) {
                return Mage::getBaseDir('media') .DS. $this->imagePath . DS . $image;
            } else {
                return '';
            }
        }
        if ($image = $this->getData('photo1')) {
            return Mage::getBaseUrl('media') . $this->imagePath . DS . $image;
        } else {
            return '';
        }
    }

    public function getPhoto2($path='web')
    {
        if ($path=='absolute'){
            if ($image = $this->getData('photo2')) {
                return Mage::getBaseDir('media') . DS .$this->imagePath . DS . $image;
            } else {
                return '';
            }
        }
        if ($image = $this->getData('photo2')) {
            return Mage::getBaseUrl('media') . $this->imagePath . DS . $image;
        } else {
            return '';
        }
    }

    public function getPhoto3($path='web')
    {
        if ($path=='absolute'){
            if ($image = $this->getData('photo3')) {
                return Mage::getBaseDir('media') . DS .$this->imagePath . DS . $image;
            } else {
                return '';
            }
        }
        if ($image = $this->getData('photo3')) {
            return Mage::getBaseUrl('media') . $this->imagePath . DS . $image;
        } else {
            return '';
        }
    }

    public function getPhoto4($path='web')
    {
        if ($path=='absolute'){
            if ($image = $this->getData('photo4')) {
                return Mage::getBaseDir('media') . DS .$this->imagePath . DS . $image;
            } else {
                return '';
            }
        }
        if ($image = $this->getData('photo4')) {
            return Mage::getBaseUrl('media') . $this->imagePath . DS . $image;
        } else {
            return '';
        }
    }

    public function getPhoto5($path='web')
    {
        if ($path=='absolute'){
            if ($image = $this->getData('photo5')) {
                return Mage::getBaseDir('media') . DS .$this->imagePath . DS . $image;
            } else {
                return '';
            }
        }
        if ($image = $this->getData('photo5')) {
            return Mage::getBaseUrl('media') . $this->imagePath . DS . $image;
        } else {
            return '';
        }
    }

    public function getPhoto6($path='web')
    {
        if ($path=='absolute'){
            if ($image = $this->getData('photo6')) {
                return Mage::getBaseDir('media') . DS .$this->imagePath . DS . $image;
            } else {
                return '';
            }
        }
        if ($image = $this->getData('photo6')) {
            return Mage::getBaseUrl('media') . $this->imagePath . DS . $image;
        } else {
            return '';
        }
    }

    protected function prepareImageForDelete($name)
    {
        $image = $this->getData($name);
        return str_replace(Mage::getBaseUrl('media'), Mage::getBaseDir('media') . DS, $image['value']);
    }

    public function unsImage($name)
    {
        $image = $this->getData($name);
        if (is_array($image)) {
            $image = $this->prepareImageForDelete($name);
        } else {
            $image = $this->getImagePath() . $image;
        }

        if (file_exists($image)) {
            unlink($image);
        }
        $this->setData($name, '');
        return $this;
    }
}