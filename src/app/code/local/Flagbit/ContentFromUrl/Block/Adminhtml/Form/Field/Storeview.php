<?php

class Flagbit_ContentFromUrl_Block_Adminhtml_Form_Field_Storeview extends Mage_Core_Block_Html_Select
{
    /**
     * Storeviews cache
     *
     * @var array
     */
    private $_storeviews;

    /**
     * Retrieve allowed Storeviews
     *
     * @param int $storeId  return name by storeview id
     * @return array|string
     */
    protected function _getStoreviews($storeId = null)
    {
        if (is_null($this->_storeviews)) {
            $this->_storeviews = array();
            $collection = Mage::getModel('core/store')->getCollection();
            foreach ($collection as $item) {
                /* @var $item Mage_Core_Model_Store */
                $this->_storeviews[$item->getId()] = $item->getName();
            }
        }
        if (!is_null($storeId)) {
            return isset($this->_storeviews[$storeId]) ? $this->_storeviews[$storeId] : null;
        }
        return $this->_storeviews;
    }

    public function setInputName($value)
    {
        return $this->setName($value);
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    public function _toHtml()
    {
        if (!$this->getOptions()) {
            foreach ($this->_getStoreviews() as $id => $label) {
                $this->addOption($id, addslashes($label));
            }
        }
        return parent::_toHtml();
    }
}
