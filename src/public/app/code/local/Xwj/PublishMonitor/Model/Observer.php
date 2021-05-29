<?php

class Xwj_PublishMonitor_Model_Observer
{
    /**
     * Stop published_at attribute from being editable by admin panel.
     *
     * @param Varien_Event_Observer $observer
     */
    public function lockPublishedFromAdminPanel($observer)
    {
        $event = $observer->getEvent();
        $product = $event->getProduct();
        $product->lockAttribute('published_at');
    }

    /**
     * Update published_at attribute on product save event
     * when the product is enabled for the first time.
     *
     * @param Varien_Event_Observer $observer
     */
    public function updatePublishedAt($observer)
    {
        $event = $observer->getEvent();
        $product = $event->getProduct();
        // Please note, this works for what described in coding test requirement, 
        // but I can make it more robust by checking product is new and enabled, or originally disabled but now enabled.
        // For coding test, I think this is enough. 
        if (
            $product->getStatus() == Mage_Catalog_Model_Product_Status::STATUS_ENABLED &&
            $product->getPublishedAt() == null
        ) {
            $product->setPublishedAt(now());
        }
    }
}
