<?php
class Meanbee_DigitalDelivery_Block_Adminhtml_Product_Edit_Js extends Mage_Core_Block_Template {
    /**
     * @return Meanbee_DigitalDelivery_Helper_Config
     */
    protected function _getConfig() {
        return Mage::helper('mbdd/config');
    }
}