<?php
class Flagbit_ContentFromUrl_Block_Adminhtml_Form_Field_Urls extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
	
    /**
     * @var Flagbit_ContentFromUrl_Block_Adminhtml_Form_Field_Storeview
     */
    protected $_storeviewRenderer;

    /**
     * Retrieve group column renderer
     *
     * @return Flagbit_ContentFromUrl_Block_Adminhtml_Form_Field_Storeview
     */
    protected function _getStoreviewRenderer()
    {
        if (!$this->_storeviewRenderer) {
            $this->_storeviewRenderer = $this->getLayout()->createBlock(
                'flagbit_contentfromurl/adminhtml_form_field_storeview', '',
                array('is_render_to_js_template' => true)
            );
            $this->_storeviewRenderer->setClass('storeview_select');
            $this->_storeviewRenderer->setExtraParams('style="width:120px"');
        }
        return $this->_storeviewRenderer;
    }

    /**
     * Prepare to render
     */
    protected function _prepareToRender()
    {
        $this->addColumn('blockname', array(
            'label' => Mage::helper('flagbit_contentfromurl')->__('Block Name'),
            'style' => 'width:100px'
        ));        ;
        $this->addColumn('url', array(
            'label' => Mage::helper('flagbit_contentfromurl')->__('Url'),
            'style' => 'width:100px',
        ));
        
        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('flagbit_contentfromurl')->__('Add URL');
    }

    /**
     * Prepare existing row data object
     *
     * @param Varien_Object
     */
    protected function _prepareArrayRow(Varien_Object $row)
    {
        $row->setData(
            'option_extra_attr_' . $this->_getStoreviewRenderer()->calcOptionHash($row->getData('storeview_id')),
            'selected="selected"'
        );
    }    
    
}