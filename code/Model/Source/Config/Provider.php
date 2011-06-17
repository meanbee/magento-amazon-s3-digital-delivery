<?php
class Meanbee_DigitalDelivery_Model_Source_Config_Provider {
    protected $_providers = array(
        "aws" => "Amazon Web Services (AWS)"
    );

    public function toOptionArray() {
        $providers = array();
        
        if (count($this->_providers) > 0) {
            foreach ($this->_providers as $value => $label) {
                $providers[] = array(
                    "value" => $value,
                    "label" => Mage::helper('mbdd')->__($label)
                );
            }
        }

        return $providers;
    }
}