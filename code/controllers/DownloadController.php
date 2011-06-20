<?php
require_once "Mage/Downloadable/controllers/DownloadController.php";
class Meanbee_S3QSA_DownloadController extends Mage_Downloadable_DownloadController {
    protected function _processDownload($url, $resourceType) {
        $config = Mage::helper('S3QSA/config');
        $s3     = Mage::helper('S3QSA/S3');
        
        if ($config->isEnabled()) {
            if ($resourceType == Mage_Downloadable_Helper_Download::LINK_TYPE_URL) {
                if ($s3->isRelevantUrl($url)) {

                    $protected_url = $s3->generateSecureUrl($url);

                    $this->getResponse()
                    ->setHttpResponseCode(301)
                    ->setHeader("Location", $protected_url);

                    $this->getResponse()->clearBody();
                    $this->getResponse()->sendHeaders();

                    return;
                }
            }
        }

        return parent::_processDownload($url, $resourceType);
    }
}