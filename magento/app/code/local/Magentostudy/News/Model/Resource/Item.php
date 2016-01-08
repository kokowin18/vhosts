<?php

/**
* News item resource model
*/

class Magentostudy_News_Model_Resource_Item extends Mage_Core_Model_Resource_Db_Abstract
{
	/**
	*Initialize connection and define main table and primary key
	*
	*@return void
	*/
	protected function _construct()
	{
		$this->_init('magentostudy_news/item', 'item_id');
	}
}