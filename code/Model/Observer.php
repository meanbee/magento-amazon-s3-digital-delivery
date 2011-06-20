<?php
class Meanbee_S3QSA_Model_Observer {
    /**
     * Called when there is a configuration change related to the module.
     *
     * @param  Varien_Event_Observer $observer
     * @return void
     */
    public function observeConfigChange(Varien_Event_Observer $observer) {
        $config = Mage::helper('S3QSA/config');

        if (!$config->isConfigured() && $config->isEnabled()) {
            Mage::getSingleton('core/session')->addNotice(
                Mage::helper('S3QSA')->__("The Meanbee S3 Downloads module is enabled, but without the Amazon Access and Secret keys, the module will not work!")
            );
        }
    }
}