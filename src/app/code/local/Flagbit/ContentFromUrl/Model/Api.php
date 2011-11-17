<?php

class Flagbit_ContentFromUrl_Model_Api extends Mage_Api_Model_Resource_Abstract
{


    public function clearcache($storeCode, $blockname)
    {
        try{
            Mage::app()->removeCache($blockname.'_'.$storeCode);
        }catch (Exception $e){
            return $e->getMessage();
        }
    }


} 
