<?php
class Komplizierte_AlekatPortfolio_Block_Adminhtml_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $quote = Mage::registry('current_portfolio');

        $form = new Varien_Data_Form(array(
            'enctype'=> 'multipart/form-data'
        ));
        $fieldset = $form->addFieldset('edit_portfolio', array(
            'legend' => Mage::helper('komplizierte_alekatportfolio')->__('Quote Details')
        ));

        if ($quote->getId()) {
            $fieldset->addField('id', 'hidden', array(
                'name'      => 'id',
                'required'  => true
            ));
        }

        $fieldset->addField('title', 'text', array(
            'name'      => 'title',
            'label'     => Mage::helper('komplizierte_alekatportfolio')->__('Title'),
            'maxlength' => '250',
            'required'  => true,
        ));
        $fieldset->addField('object', 'editor', array(
            'name'      => 'object',
            'label'     => Mage::helper('komplizierte_alekatportfolio')->__('Object'),
            'style'     => 'width:900px; height:200px;',
            'required'  => true,
        ));
        $fieldset->addField('address', 'editor', array(
            'name'      => 'address',
            'label'     => Mage::helper('komplizierte_alekatportfolio')->__('Address'),
            'style'     => 'width:900px; height:200px;',
            'required'  => true,
        ));
        $fieldset->addField('mission', 'editor', array(
            'name'      => 'mission',
            'label'     => Mage::helper('komplizierte_alekatportfolio')->__('Mission'),
            'style'     => 'width:900px; height:200px;',
            'required'  => true,
        ));
        $fieldset->addField('cost', 'editor', array(
            'name'      => 'cost',
            'label'     => Mage::helper('komplizierte_alekatportfolio')->__('Cost'),
            'style'     => 'width:900px; height:200px;',
            'required'  => true,
        ));
        $fieldset->addField('comment', 'editor', array(
            'name'      => 'comment',
            'label'     => Mage::helper('komplizierte_alekatportfolio')->__('Comment'),
            'style'     => 'width:900px; height:200px;',
            'required'  => true,
        ));

        $imageCollection = Mage::getModel('alekatportfolio/images')->getCollection()->addFieldToFilter('portfolio_id', $quote->getId());
        $images = array();
        foreach($imageCollection as $image) {
            $images[] = array('value'=>$image->getId(), 'label' => '<img src="' . $image->getImageUrl() . $image->getImage() . '" width="50" height="50" />');
        }

        if(count($images) > 0) {

            $fieldset->addField('deleteImage', 'checkboxes', array(
                'label'     => 'Images',
                'name'      => 'deleteImage[]',
                'values' => $images,
                'value'  => '1',
                'disabled' => false,
                'after_element_html' => '<small>Select for delete</small>',
                'tabindex' => 1
            ));
        }



        $fieldset->addType('image', 'Komplizierte_AlekatPortfolio_Block_Adminhtml_Edit_Helper_Image');
        $fieldset->addField('image', 'image', array(
            'name'      => 'images[]',
            'multiple'  => 'multiple',
            'mulitple'  =>  true,
            'label'     => Mage::helper('komplizierte_alekatportfolio')->__('Upload New Image')
        ));

        $fieldset->addField('label', 'label', array(
            'after_element_html'     => '<div style="padding: 10px; background: #fff; border: 1px solid #f5f5f5;"><b>Hint:</b> Please add string <font color="red">{{block type="komplizierte_alekatportfolio/index" name="komplizierte_alekatportfolio" template="alekatportfolio/view.phtml"}}</font> in Pages or Statick Blocks</div>'
        ));

        $form->setMethod('post');
        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));
        $data=$quote->getData();
        $form->setValues($data);

        $this->setForm($form);

    }
}