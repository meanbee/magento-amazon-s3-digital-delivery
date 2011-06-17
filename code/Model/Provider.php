<?php
class Meanbee_DigitalDelivery_Model_Provider {
    /**
     * Return the model of the currently selected provider
     *
     * @return Meanbee_DigitalDelivery_Model_Provider_Abstract
     */
    public function getProvider() {
        $provider = $this->_getConfig()->getProvider();

        if (!empty($provider)) {
            return Mage::getSingleton("mbdd/$provider");
        } else {
            Mage::exception(
                "Meanbee_DigitalDelivery",
                "Attempted to load provider object, but no provider specified in the configuration"
            );
        }
    }

    /**
     * @return Meanbee_DigitalDelivery_Helper_Config
     */
    protected function _getConfig() {
        return Mage::helper('mbdd/config');
    }
}