<?php

class Example_Dota_Block_Welcome extends Mage_Core_Block_Template{
	public function __construct(){
		parent::__construct();
		$this->setTemplate('dota/welcome.phtml');
	}
}