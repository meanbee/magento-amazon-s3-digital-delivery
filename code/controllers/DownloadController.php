<?php
require_once "Mage/Downloadable/controllers/DownloadController.php";
class Meanbee_DigitalDelivery_DownloadController extends Mage_Downloadable_DownloadController {
    protected function _processDownload($url, $resourceType) {
        if ($resourceType == Mage_Downloadable_Helper_Download::LINK_TYPE_URL) {
            if (Mage::helper('mbdd')->isRelevantUrl($url)) {

                $protected_url = Mage::helper('mbdd')->generateSecureUrl($url);

                $this->getResponse()
                ->setHttpResponseCode(301)
                ->setHeader("Location", $protected_url);

                $this->getResponse()->clearBody();
                $this->getResponse()->sendHeaders();

                return;
            }
        }

        return parent::_processDownload($url, $resourceType);
    }
}