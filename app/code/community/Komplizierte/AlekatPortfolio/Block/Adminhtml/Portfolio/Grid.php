<?php
class Komplizierte_AlekatPortfolio_Block_Adminhtml_Portfolio_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _construct()
    {
        $this->setId('alekatportfolioGrid');
        $this->_controller = 'adminhtml_portfolio';
        $this->setUseAjax(true);

        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('alekatportfolio/data')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header'        => Mage::helper('komplizierte_alekatportfolio')->__('ID'),
            'align'         => 'right',
            'width'         => '20px',
            'filter_index'  => 'id',
            'index'         => 'id'
        ));

        $this->addColumn('title', array(
            'header'        => Mage::helper('komplizierte_alekatportfolio')->__('Title'),
            'align'         => 'left',
            'filter_index'  => 'title',
            'index'         => 'title',
            'type'          => 'text',
            'truncate'      => 50,
            'escape'        => true,
        ));


        return parent::_prepareColumns();
    }

    public function getRowUrl($quote)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $quote->getId(),
        ));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}