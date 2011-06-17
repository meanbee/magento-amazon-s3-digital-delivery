<?php
class Meanbee_DigitalDelivery_Model_Observer {
    /**
     * Called when downloadable_link_purchased_item_load_after is called.
     *
     * @param  Varien_Event_Observer $observer
     * @return void
     */
    public function observeLoad(Varien_Event_Observer $observer) {
        $event = $observer->getEvent();
        $object = $event->getDataObject();

        $original_url = $object->getData('link_url');
    }
}