<?php

class Pfay_Test_IndexController extends Mage_Core_Controller_Front_Action
{
  public function indexAction()
  {
     //echo "test index";
    $this->loadLayout();
    $this->renderLayout();
  }
  
  public function mamethodeAction()
  {
     echo 'test mymethod';
  }

  public function saveAction()
  {
    $nom = ''.$this->getRequest()->getPost('nom');
    $prenom = ''.$this->getRequest()->getPost('prenom');
    $telephone = ''.$this->getRequest()->getPost('telephone');

    $id = $this->getRequest()->getPost('id');

    if(isset($nom)&&($nom!='') && isset($prenom)&&($prenom!='')
                               && isset($telephone)&&($telephone!='') )
   {
      
      $contact = Mage::getModel('test/test');
      $contact->setId($id);
      $contact->setData('nom', $nom);
      $contact->setData('prenom', $prenom);
      $contact->setData('telephone', $telephone);
      $contact->save();
   }
    $this->_redirect('test/index/index/');
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
                    $this->_redirect('*/*/');
                 }
                 catch (Exception $e)
                  {
                           $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                  }
             }
            $this->_redirect('*/*/');
       }
}

