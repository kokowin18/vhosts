<?php

/**
*News collection
*/

class Magentostudy_News_Model_Resource_Item_Colletion extends
Mage_Core_Model_Resource_Db_Collection_Abstract
{
	/**
	*Define collection model
	*@return void
	*/
	protected function _construct()
	{
		$this->_init('magentostudy_news/item');
	}
}