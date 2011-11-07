<?php
class Meanbee_S3QSA_Helper_Data extends Mage_Core_Helper_Abstract {
    public function log($message, $level = Zend_Log::DEBUG) {
        /** @var $config Meanbee_S3QSA_Helper_Config */
        $config = Mage::helper('S3QSA/config');
        
        $module_log_active = $config->isLogEnabled();
        Mage::log("[meanbee_s3qsa] $message", $level, $config->getLogLocation(), $module_log_active);
    }
}