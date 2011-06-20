<?php
class Meanbee_S3QSA_Block_Adminhtml_Product_Edit_Js extends Mage_Core_Block_Template {
    /**
     * @return Meanbee_S3QSA_Helper_Config
     */
    protected function _getConfig() {
        return Mage::helper('S3QSA/config');
    }
}