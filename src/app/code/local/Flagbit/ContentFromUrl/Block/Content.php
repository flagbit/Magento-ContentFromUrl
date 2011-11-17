<?php
class Flagbit_ContentFromUrl_Block_Content extends Mage_Core_Block_Abstract
{

    protected function _construct()
    {
        $this->setCacheKey(
              $this->getNameInLayout() . '_'
            . Mage::app()->getStore()->getCode()
        );
        $this->setCacheLifetime(86400);
    }    
    
	protected function _getUrl()
	{
	    $url = null;
	    $def = Mage::helper('flagbit_contentfromurl')->makeArrayFieldValue(Mage::getStoreConfig('design/options/contentfromurl'));
	    
	    if(isset($def[$this->getNameInLayout()])){
	        $url = $def[$this->getNameInLayout()]['url'];
	    }
	    return $url;
	}
	
	public function _toHtml()
    {
        $output = '';
        try{
            $client = new Zend_Http_Client();
            $client->setUri($this->_getUrl());
            $client->setConfig(array('maxredirects'=>0, 'timeout'=>2));
            $response = $client->request();
            if($response instanceof Zend_Http_Response){
                $output = $response->getBody();
            }
        }catch (Exception $e){
            $this->unsCacheLifetime();
        }
        return $output;
    }
 
    /**
     * Get Key for caching block content
     *
     * @return string
     */
    public function getCacheKey()
    {
        return $this->getNameInLayout() . '_' . Mage::app()->getStore()->getCode();
    }    

    
}