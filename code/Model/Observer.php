<?php
class Meanbee_S3QSA_Model_Observer {
    /**
     * Called when there is a configuration change related to the module.
     *
     * @param  Varien_Event_Observer $observer
     * @return void
     */
    public function observeConfigChange(Varien_Event_Observer $observer) {
        /** @var $config Meanbee_S3QSA_Helper_Config */
        $config = Mage::helper('S3QSA/config');

        if (!$config->isConfigured() && $config->isEnabled()) {
            Mage::getSingleton('core/session')->addNotice(
                Mage::helper('S3QSA')->__("The Meanbee S3 Downloads module is enabled, but without the Amazon Access and Secret keys, the module will not work!")
            );
        }

        if ($config->isLogEnabled()) {
            Mage::getSingleton('core/session')->addNotice(
                Mage::helper('S3QSA')->__("Logging is now enabled.")
            );

            Mage::log("[meanbee_s3qsa] Logging is enabled.", Zend_Log::DEBUG, $config->getLogLocation());
        } else {
            Mage::log("[meanbee_s3qsa] Logging is disabled.  A log message to tell you that logging is disabled.. ingenious, right?", Zend_Log::DEBUG, $config->getLogLocation());
        }
    }
}
