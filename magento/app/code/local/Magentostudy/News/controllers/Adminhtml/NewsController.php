<?php

/**
* News back-end controller
*/

class Magentostudy_News_Adminhtml_NewsController extends Mage_Adminhtml_Controller_Action
{
	public functon indexAction()
	{
		$this->loadLayout();
		return $this->renderLayout();
	}
}
