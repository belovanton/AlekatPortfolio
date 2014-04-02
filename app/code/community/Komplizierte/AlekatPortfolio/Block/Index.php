<?php

class Komplizierte_AlekatPortfolio_Block_Index extends Mage_Core_Block_Template
{
    public function getPortfolios()
    {
        return Mage::getModel('alekatportfolio/data')->getCollection();
    }

    public function getImages()
    {
        return Mage::getModel('alekatportfolio/images')->getCollection();
    }

    public function getPhotos($portfolio, $images)
    {
        $block = Mage::app()->getLayout()->createBlock('core/template');
        $block->setTemplate('alekatportfolio/photos.phtml');
        $block->setData('portfolio', $portfolio);
        $block->setData('images', $images);
        return $block->toHtml();
    }

}