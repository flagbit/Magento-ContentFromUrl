<?php

/**
 * Backend for serialized array data
 *
 */
class Flagbit_ContentFromUrl_Model_System_Config_Backend_Contentfromurl extends Mage_Core_Model_Config_Data
{
    /**
     * Process data after load
     */
    protected function _afterLoad()
    {
        $value = $this->getValue();
        $value = Mage::helper('cataloginventory/minsaleqty')->makeArrayFieldValue($value);
        $this->setValue($value);
    }

    /**
     * Prepare data before save
     */
    protected function _beforeSave()
    {
        $value = $this->getValue();
        $value = Mage::helper('cataloginventory/minsaleqty')->makeStorableArrayFieldValue($value);
        $this->setValue($value);
    }
}
