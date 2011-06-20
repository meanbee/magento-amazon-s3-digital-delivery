<?php
class Meanbee_S3QSA_Helper_S3 extends Mage_Core_Helper_Abstract {
    public function isRelevantUrl($url) {
        preg_match_all("/^http:\/\/(.*)\.s3\.amazonaws\.com\/(.*)$/", $url, $matches);

        return count($matches) > 0;
    }

    public function generateSecureUrl($url) {
        $secret = Mage::helper('S3QSA/config')->getAmazonSecretKey();
        $expires = $this->_getExpiryTime();

        preg_match_all("/^http:\/\/(.*)\.s3\.amazonaws\.com\/(.*)$/", $url, $matches);

        if ($matches) {
            list($full_url, $bucket, $filename) = $matches;

            $string_to_sign = "GET\n\n\n$expires\n/" . $bucket[0] . "/" . $filename[0];

            $parameters =  array(
                "AWSAccessKeyId" => Mage::helper('S3QSA/config')->getAmazonAccessKey(),
                "Expires"        => $expires,
                "Signature"      => urlencode(base64_encode(hash_hmac('sha1', utf8_encode($string_to_sign), $secret, true)))
            );

            $parameter_string = "?";
            foreach ($parameters as $key => $value) {
                $parameter_string .= "$key=$value&";
            }

            return $url.$parameter_string;
        }
    }

    /**
     * A timestamp denoting the point at which the URL will become invalid.
     *
     * @return int
     */
    protected function _getExpiryTime() {
        $expiry = Mage::helper('S3QSA/config')->getAmazonRequestTimeout();

        if ($expiry < 1) {
            $expiry = ;
        }

        return time() + $expiry;
    }
}