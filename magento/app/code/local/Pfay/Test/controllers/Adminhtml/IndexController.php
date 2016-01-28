<?php
class Pfay_Test_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()->_setActiveMenu('test/contact')
                ->_addBreadcrumb('test Manager','test Manager');
       return $this;
     }
      public function indexAction()
      {
        $this->_title($this->__('Address'))->_title($this->__('Address Book'));
      	//echo 'admin page';
        $this->_initAction();
        $this->_addContent($this->getLayout()->createBlock('test/adminhtml_grid'));
        $this->renderLayout();
      }

      public function gridAction(){
        $this->loadLayout();
        $this->getResponse()->setBody(
        $this->getLayout()->createBlock('test/adminhtml_test_edit_grid')->toHtml()
        );
      }
      public function editAction()
      {
           $testId = $this->getRequest()->getParam('id');
           $testModel = Mage::getModel('test/test')->load($testId);
           if ($testModel->getId() || $testId == 0)
           {
             Mage::register('test_data', $testModel);
             $this->loadLayout();
             $this->_setActiveMenu('test/contact');
             $this->_addBreadcrumb('test Manager', 'test Manager');
             $this->_addBreadcrumb('Test Description', 'Test Description');
             $this->getLayout()->getBlock('head')
                  ->setCanLoadExtJs(true);
             $this->_addContent($this->getLayout()
                  ->createBlock('test/adminhtml_test_edit'))
                  ->_addLeft($this->getLayout()
                  ->createBlock('test/adminhtml_test_edit_tabs')
              );
             $this->renderLayout();
           }
           else
           {
                 Mage::getSingleton('adminhtml/session')
                       ->addError('Test does not exist');
                 $this->_redirect('*/*/');
            }
       }
       public function newAction()
       {
          $this->_forward('edit');
       }
       public function saveAction()
       {
         if ($this->getRequest()->getPost())
         {
           try {
                 $postData = $this->getRequest()->getPost();
                 $testModel = Mage::getModel('test/test');
               if( $this->getRequest()->getParam('id') <= 0 )
                  $testModel->setCreatedTime(
                     Mage::getSingleton('core/date')
                            ->gmtDate()
                    );
                  $testModel
                    ->addData($postData)
                    ->setUpdateTime(
                             Mage::getSingleton('core/date')
                             ->gmtDate())
                    ->setId($this->getRequest()->getParam('id'))
                    ->save();
                 Mage::getSingleton('adminhtml/session')
                               ->addSuccess('successfully saved');
                 Mage::getSingleton('adminhtml/session')
                                ->settestData(false);
                 $this->_redirect('*/*/');
                return;
          } catch (Exception $e){
                Mage::getSingleton('adminhtml/session')
                                  ->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')
                 ->settestData($this->getRequest()
                                    ->getPost()
                );
                $this->_redirect('*/*/edit',
                            array('id' => $this->getRequest()
                                                ->getParam('id')));
                return;
                }
              }
              $this->_redirect('*/*/');
            }
          public function deleteAction()
          {
              if($this->getRequest()->getParam('id') > 0)
              {
                try
                {
                    $testModel = Mage::getModel('test/test');
                    $testModel->setId($this->getRequest()
                                        ->getParam('id'))
                              ->delete();
                    Mage::getSingleton('adminhtml/session')
                               ->addSuccess('successfully deleted');
                    $this->_redirect('*/*/');
                 }
                 catch (Exception $e)
                  {
                           Mage::getSingleton('adminhtml/session')
                                ->addError($e->getMessage());
                           $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                  }
             }
            $this->_redirect('*/*/');
       }
      public function massDeleteAction(){
            $testIds = $this->getRequest()->getParam('test');      // $this->getMassactionBlock()->setFormFieldName('test_id'); from Mage_Adminhtml_Block_Tax_Rate_Grid
            if(!is_array($testIds)) {
              Mage::getSingleton('adminhtml/session')->addError(Mage::helper('test')->__('Please select at least one contact!'));
            } 
            else {
              try {
                $rateModel = Mage::getModel('test/test');
                foreach ($testIds as $testId) {
                  $rateModel->load($testId)->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                  Mage::helper('test')->__('Total of %d record(s) were deleted.', count($testIds))
                );
              } catch (Exception $e) {
                  Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                }
            }
             
            $this->_redirect('*/*/index');
      }
}