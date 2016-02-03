<?php
class Pfay_Test_Block_Adminhtml_Test_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
   public function __construct()
   {
       parent::__construct();
       $this->setId('contactGrid');
       $this->setDefaultSort('id_pfay_test');
       $this->setDefaultDir('DESC');
       $this->setSaveParametersInSession(true);
   }
   protected function _prepareCollection()
   {
      $collection = Mage::getModel('test/test')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
    }
   protected function _prepareColumns()
   {
       $this->addColumn('id_pfay_test',
             array(
                    'header' => 'ID',
                    'align' =>'right',
                    'width' => '50px',
                    'index' => 'id_pfay_test',
               ));
       $this->addColumn('nom',
               array(
                    'header' => 'First',
                    'align' =>'left',
                    'index' => 'nom',
              ));
       $this->addColumn('prenom', array(
                    'header' => 'Last',
                    'align' =>'left',
                    'index' => 'prenom',
             ));
        $this->addColumn('telephone', array(
                     'header' => 'Telephone',
                     'align' =>'left',
                     'index' => 'telephone',
          ));
         $this->addColumn('status', array(
                     'header' => 'Status',
                     'align' =>'left',
                     'index' => 'status',
                     'type' => 'options',
                     'options' => array(
                      1=>'Enabled',
                      2=>'Disabled')
          ));
         return parent::_prepareColumns();
    }
    public function getRowUrl($row)
    {
         return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
    protected function _prepareMassaction()
    {
      $this->setMassactionIdField('test_id');
      $this->getMassactionBlock()->setFormFieldName('test');
      $this->getMassactionBlock()->addItem('update', array(
      'label'=> Mage::helper('test')->__('Update'),
      'url'  => $this->getUrl('*/*/massUpdate', array('' => '')),        // public function massUpdateAction() in Mage_Adminhtml_Tax_RateController
      'confirm' => Mage::helper('test')->__('Are you sure?')
      ));
      $this->getMassactionBlock()->addItem('delete', array(
      'label'=> Mage::helper('test')->__('Delete'),
      'url'  => $this->getUrl('*/*/massDelete', array('' => '')),        // public function massDeleteAction() in Mage_Adminhtml_Tax_RateController
      'confirm' => Mage::helper('test')->__('Are you sure?')
      ));
      return $this;
    }

}