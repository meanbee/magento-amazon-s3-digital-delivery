<?php
abstract class Meanbee_S3QSA_Model_Provider_Abstract {
    /**
     * Do we have all of the credentials we required from the configuration section to attempt to "login" to the
     * service.
     *
     * @abstract
     * @return boolean
     */
    abstract public function isConfigured();

    /**
     * @return Meanbee_DigitalDelivery_Helper_Config
     */
    protected function _getConfig() {
        return Mage::helper('S3QSA/config');
    }
}