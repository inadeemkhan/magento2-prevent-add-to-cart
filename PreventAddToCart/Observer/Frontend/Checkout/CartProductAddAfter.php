<?php
declare(strict_types=1);

namespace Nadeem\PreventAddToCart\Observer\Frontend\Checkout;

class CartProductAddAfter implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
        //Your observer code
    }
}

