<?php
class Pfay_Test_Block_Contact extends Mage_Core_Block_Template{
	public function __construct(){
		parent::__construct();
		$collection = Mage::getModel('test/test')->getCollection();
		$this->setCollection($collection);
    }
}