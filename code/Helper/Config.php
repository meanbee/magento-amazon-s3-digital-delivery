<?php
class Meanbee_S3QSA_Helper_Config extends Mage_Core_Helper_Abstract {
    const XML_GENERAL_ENABLED   = 's3qsa/general/enabled';

    const XML_AMAZON_ACCESS     = 's3qsa/aws/access_key';
    const XML_AMAZON_SECRET     = 's3qsa/aws/secret_key';
    const XML_AMAZON_URLS       = 's3qsa/aws/urls';
    const XML_AMAZON_TIMEOUT    = 's3qsa/aws/request_timeout';

    const XML_DEVELOPER_LOG_ENABLED  = 's3qsa/developer/log_enabled';

    /**
     * Is the complete module enabled
     *
     * @return bool
     */
    public function isEnabled() {
        return $this->_getStoreConfigFlag(self::XML_GENERAL_ENABLED);
    }

    /**
     * @return bool
     */
    public function isConfigured() {
        return $this->getAmazonAccessKey() && $this->getAmazonSecretKey();
    }

    /**
     * @return string
     */
    public function getAmazonAccessKey() {
        return $this->_getStoreConfig(self::XML_AMAZON_ACCESS);
    }

    /**
     * @return string
     */
    public function getAmazonSecretKey() {
        return $this->_getStoreConfig(self::XML_AMAZON_SECRET);
    }

    /**
     * @return array
     */
    public function getAmazonUrls() {
        $urls = $this->_getStoreConfig(self::XML_AMAZON_URLS);

        if (!empty($urls)) {
            return explode(",", $urls);
        }

        return array();
    }

    /**
     * @return string
     */
    public function getAmazonRequestTimeout() {
        return $this->_getStoreConfig(self::XML_AMAZON_TIMEOUT);
    }

    /**
     * @return string
     */
    public function getLogLocation() {
        return "meanbee_s3qsa.log";
    }

    /**
     * @return bool
     */
    public function isLogEnabled() {
        return $this->_getStoreConfigFlag(self::XML_DEVELOPER_LOG_ENABLED);
    }

    /**
     * @param  $xml_path
     * @return string
     */
    protected function _getStoreConfig($xml_path) {
        return Mage::getStoreConfig($xml_path, Mage::app()->getStore()->getCode());
    }

    /**
     * @param  $xml_path
     * @return bool
     */
    protected function _getStoreConfigFlag($xml_path) {
        return Mage::getStoreConfigFlag($xml_path, Mage::app()->getStore()->getCode());
    }
}
