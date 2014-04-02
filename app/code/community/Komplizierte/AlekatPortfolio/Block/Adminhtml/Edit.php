<?php
class Komplizierte_AlekatPortfolio_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'komplizierte_alekatportfolio';
        $this->_mode = 'edit';
        $this->_controller = 'adminhtml';

        $quote_id = (int)$this->getRequest()->getParam($this->_objectId);
        $quote = Mage::getModel('alekatportfolio/data')->load($quote_id);
        Mage::register('current_portfolio', $quote);
    }

    public function getHeaderText()
    {
        $quote = Mage::registry('current_portfolio');
        if ($quote->getId()) {
            return Mage::helper('komplizierte_alekatportfolio')->__("Edit portfolio '%s'", $this->escapeHtml($quote->getTitle()));
        } else {
            return Mage::helper('komplizierte_alekatportfolio')->__("Add new portfolio");
        }
    }
}