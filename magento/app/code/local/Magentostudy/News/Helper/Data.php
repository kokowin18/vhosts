<?php
/**
* Default News helper
*
* @author Magento
*/
class Magentostudy_News_Helper_Data extends Mage_Core_Helper_Data
{
	/**
	* Checks whether news can be displayed in the frontend
	*
	* @return boolean
	*/
	public function isEnabled()
	{
		// For now it's always enabled
		return true;
	}
	
	/**
	* Return the number of items per page
	*
	* @return int
	*/
	public function getNewsPerPage()
	{
		// For now it's always 15
		return 15;
	}
}