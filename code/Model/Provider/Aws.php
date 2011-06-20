<?php
class Meanbee_S3QSA_Model_Provider_Aws extends Meanbee_DigitalDelivery_Model_Provider_Abstract {
    protected $_service = null;

    public function isConfigured() {
        $key_access = $this->_getConfig()->getAmazonAccessKey();
        $key_secret = $this->_getConfig()->getAmazonSecretKey();

        return !empty($key_access) && !empty($key_secret);
    }
}