<?php

/**
*News item model
*/

class Magentostudy_News_Model_Item extends Mage_Core_Model_Abstract
{
	/**
	*Define resource model
	*/
	protected function _construct()
	{
		$this->_init('magentostudy_news/item');
	}
}