<?php
/**
 * ScaleWorks Bitcoin
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category    ScaleWorks
 * @package     ScaleWorks_Bitcoin
 * @copyright   Copyright (c) 2011 Ticean Bennett (http://www.scaleworks.co)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Bitcoin Observer model
 *
 * @category   ScaleWorks
 * @package    ScaleWorks_Bitcoin
 * @author     Ticean Bennett <ticean@gmail.com>
 */
class ScaleWorks_Bitcoin_Model_Observer extends Mage_Core_Model_Observer
{

    /**
     * Crontab handler than fetches pending orders with bitcoin payment to update status.
     * @return void
     */
    public function fetchConfirmations() {
        // Get collections of orders that are pending of payment type bitcoin.
        $orders = Mage::getModel('sales/order')->getCollection()
                    ->addAttributeToFilter('status', 'pending')
                    ->addPaymentMethodToFilter('bitcoin')
                    ->load();

        // Address is a hash not a postal endpoint.
        foreach($orders as $order) {
            $id = $order->getId();
            $payment = $order->getPayment();
            $address = $payment->getBitcoinPaymentAddress();

            // Get confirmation count.
            $min_confirmations = (int)Mage::getStoreConfig('payment/bitcoin/minimum_confirmations');
            $bitcoin =  Mage::getModel('bitcoin/bitcoin');
            $received = Mage::getSingleton('bitcoin/bitcoin')->getReceivedByAddress($address, $min_confirmations);
            if($received >= $order->getGrandTotal()) {
                // Set to processing.
                $order->setState('processing', 'processing', 'Bitcoin payment confirmed.', false);
                $order->save();
            } 
        }
    }

}