<?php
require_once "Mage/Downloadable/controllers/DownloadController.php";
class Meanbee_S3QSA_DownloadController extends Mage_Downloadable_DownloadController {
    protected function _processDownload($url, $resourceType) {
        $config = Mage::helper('S3QSA/config');
        $s3     = Mage::helper('S3QSA/S3');

        if ($config->isEnabled() && $config->isConfigured()) {
            if ($resourceType == Mage_Downloadable_Helper_Download::LINK_TYPE_URL) {
                if ($s3->isRelevantUrl($url)) {

                    $protected_url = $s3->generateSecureUrl($url);

                    if ($protected_url !== false) {

                        $this->_log("Generated protected URL for $url: $protected_url");

                        $this->getResponse()
                            // Temporary redirect to avoid caching
                            ->setHttpResponseCode(307)
                            ->setHeader("Location", $protected_url);

                        $this->getResponse()->clearBody();
                        $this->getResponse()->sendHeaders();

                        return;
                    } else {
                        $this->_log("Unable to generate protected URL from $url");
                    }
                }
            } else {
                $this->_log("Not intercepting the $url to download as it's not a remote file!");
            }
        } else {
            $this->_log("Not intercepting the $url download as we're either not enabled, or we're not fully configured");
        }

        return parent::_processDownload($url, $resourceType);
    }

    protected function _log($message, $level = Zend_Log::DEBUG) {
        /** @var $config Meanbee_S3QSA_Helper_Config */
        $config = Mage::helper('S3QSA/config');

        if ($config->isLogEnabled()) {
           Mage::log("[meanbee_s3qsa] $message", $level, $config->getLogLocation());
        }
    }
}
