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

    if(isset($nom)&&($nom!='') && isset($prenom)&&($prenom!='')
                               && isset($telephone)&&($telephone!='') )
   {
      
      $contact = Mage::getModel('test/test');
      $contact->setData('nom', $nom);
      $contact->setData('prenom', $prenom);
      $contact->setData('telephone', $telephone);
      $contact->save();
   }
    $this->_redirect('test/index/index/');
  }
}

