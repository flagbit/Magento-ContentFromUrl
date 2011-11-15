<?php
class Flagbit_ContentFromUrl_Block_Content extends Mage_Core_Block_Abstract
{

	public function getCacheKeyInfo()
	{
	 	array_merge(parent::getCacheKeyInfo());
	 	//Zend_Http_Client::'';
	 	//to html
	 }
	 
	public function _toHtml()
	{
    }
}