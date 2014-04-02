<?php
class Komplizierte_AlekatPortfolio_Adminhtml_PortfolioController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->_usedModuleName = 'alekatportfolio';
        $this->loadLayout()
            ->_setActiveMenu('alekatportfolio')
            ->_title($this->__('Portfolio Editor'))
            ->_addBreadcrumb($this->__('Portfolio editor'), $this->__('Portfolio editor'));
        return $this;
    }
    public function IndexAction()
    {
        $this->loadLayout();

        $this->renderLayout();
    }
    public function newAction()
    {
        $this->_title($this->__('Add new portfolio'));
        $this->loadLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
        $this->_setActiveMenu('freaks_quotes');
        $this->_addBreadcrumb(Mage::helper('komplizierte_alekatportfolio')->__('Add new portfolio'), Mage::helper('komplizierte_alekatportfolio')->__('Add new portfolio'));
        $this->renderLayout();
    }

    public function editAction()
    {
        $this->_title($this->__('Edit portfolio'));

        $this->loadLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
        $this->_setActiveMenu('freaks_quotes');
        $this->_addBreadcrumb(Mage::helper('komplizierte_alekatportfolio')->__('Edit quote'), Mage::helper('komplizierte_alekatportfolio')->__('Edit portfolio'));
        $this->renderLayout();
    }

    public function deleteAction()
    {
        $tipId = $this->getRequest()->getParam('id', false);

        try {


            $dir = Mage::getBaseDir('media') . DS . "portfolio" . DS;
            $dir = opendir($dir . DS . 'cache');
            $listDir = array();
            while($file = readdir($dir)) {
                if ($file != '.' && $file != '..') {
                    $listDir[] = $file;
                }
            }

            $model = Mage::getModel('alekatportfolio/images')->getCollection()->addFieldToFilter('portfolio_id', $tipId);
            foreach($model as $data) {
                foreach($listDir as $dir) {
                    $deleteCacheFile = $data->getImagePath() . "cache/" . $dir . DS . $dir . $data->getImage();
                    if(file_exists($deleteCacheFile)) {
                        @unlink($deleteCacheFile);
                    }
                }

                @unlink($data->getUrl(true));
            }

            Mage::getModel('alekatportfolio/data')->setId($tipId)->delete();

            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('komplizierte_alekatportfolio')->__('Portfolio successfully deleted'));

            return $this->_redirect('*/*/');
        } catch (Mage_Core_Exception $e){
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
        }

        $this->_redirectReferer();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();

        if (!empty($data)) {
            try {

                if(isset($data['deleteImage']) && is_array($data['deleteImage']) && count($data['deleteImage']) > 0) {
                    $dir = Mage::getBaseDir('media') . DS . "portfolio" . DS;
                    $dir = opendir($dir . DS . 'cache');
                    $listDir = array();
                    while($file = readdir($dir)) {
                        if ($file != '.' && $file != '..') {
                            $listDir[] = $file;
                        }
                    }

                    foreach($data['deleteImage'] as $imageDeleteId) {
                        $model = Mage::getModel('alekatportfolio/images')->load($imageDeleteId);
                        foreach($listDir as $dir) {
                            $deleteCacheFile = $model->getImagePath() . "cache/" . $dir . DS . $dir . $model->getImage();
                            if(file_exists($deleteCacheFile)) {
                                @unlink($deleteCacheFile);
                            }
                        }
                        @unlink($model->getImagePath() . $model->getImage());
                        $model->delete();
                    }
                }

                if(!is_dir($dir = Mage::getBaseDir('media') . DS . "portfolio" . DS)) {
                    mkdir($dir);
                    if(!is_dir($dir = $dir . 'cache' . DS)) {
                        mkdir($dir);
                        if(!is_dir($dir . '83' . DS)) {
                            mkdir($dir .DS . '83' . DS);
                        }
                        if(!is_dir($dir . '290' . DS)) {
                            mkdir($dir .DS . '290' . DS);
                        }
                    }
                }

                $images = array();
                if(isset($_FILES['images']['name'][0]) && $_FILES['images']['name'][0] != "") {
                    foreach($_FILES['images'] as $key => $name) {
                        foreach($name as $kk => $value) {
                            $images[$kk][$key] = $value;
                        }
                    }
                }



                $id = Mage::getModel('alekatportfolio/data')->setData($data)
                    ->save()->getId();

                foreach($images as $image) {
                    $dataImages = array(
                        "portfolio_id" => $id,
                        "image" => $image,
                    );
                    Mage::getModel('alekatportfolio/images')->setData($dataImages)->save();
                }

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('komplizierte_alekatportfolio')->__('Portfolio successfully saved'));
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            } catch (Exception $e) {
                Mage::logException($e);
                Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
            }
        }
        return $this->_redirect('*/*/');
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('komplizierte_alekatportfolio/adminhtml_portfolio_grid')->toHtml()
        );
    }

}