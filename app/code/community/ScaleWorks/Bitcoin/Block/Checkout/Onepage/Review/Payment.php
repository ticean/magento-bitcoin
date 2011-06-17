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
 * to license@scaleworks.co so we can send you a copy immediately.
 *
 * @category    ScaleWorks
 * @package     ScaleWorks_Bitcoin
 * @copyright   Copyright (c) 2011 Ticean Bennett (http://www.scaleworks.co)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * One page checkout order review
 *
 * @category    ScaleWorks
 * @package     ScaleWorks_Bitcoin
 * @author      Ticean Bennett <ticean@gmail.com>
 */
class ScaleWorks_Bitcoin_Block_Checkout_Onepage_Review_Payment extends Mage_Sales_Block_Items_Abstract
{
    public function getBitcoinPaymentAddress()
    {
        return Mage::getSingleton('checkout/session')->getQuote()->getPayment()->getBitcoinPaymentAddress();
    }
}
