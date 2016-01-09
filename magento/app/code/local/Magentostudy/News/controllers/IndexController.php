<?php

/**
* News front-end controller
*/

class Magentostudy_News_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		// $this->loadLayout();
		// $this->renderLayout();
		/** @var $model Magentostudy_News_Model_Item */
		$model = Mage::getModel('magentostudy_news/item');
		$this->_output($model->getCollection()->getData());
	}
		/**
		* Test output for data
		* Just some simple debugging tool
		*
		* @param mixed $data
		*/
	protected function _output($data)
	{
		echo "<pre style=\"text-align:left\">";
		Zend_Debug::dump($data);
		echo "</pre>";
	}
}
