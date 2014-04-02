<?php
/**
 * Created by PhpStorm.
 * User: belov_ab
 * Date: 13.02.14
 * Time: 14:16
 */
class Komplizierte_AlekatPortfolio_Block_Adminhtml_Portfolio extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        $this->_addButtonLabel = Mage::helper('komplizierte_alekatportfolio')->__('Add New Portfolio');

        $this->_blockGroup = 'komplizierte_alekatportfolio';
        $this->_controller = 'adminhtml_portfolio';
        $this->_headerText = Mage::helper('komplizierte_alekatportfolio')->__('Portfolios');
    }
}