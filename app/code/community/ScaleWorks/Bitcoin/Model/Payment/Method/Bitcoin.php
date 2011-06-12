<?php
/**
 * Magento
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
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Payment
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


class ScaleWorks_Bitcoin_Model_Payment_Method_Bitcoin extends Mage_Payment_Model_Method_Abstract
{
    /**
     * XML Pathes for configuration constants
     */
    const XML_PATH_PAYMENT_BITCOIN_ACTIVE = 'payment/bitcoin/active';
    const XML_PATH_PAYMENT_BITCOIN_ORDER_STATUS = 'payment/bitcoin/order_status';
    const XML_PATH_PAYMENT_BITCOIN_PAYMENT_ACTION = 'payment/bitcoin/payment_action';

    /**
     * Payment code name
     * @var string
     */
    protected $_code = 'bitcoin';
    protected $_formBlockType = 'bitcoin/payment_form_bitcoin';
    protected $_infoBlockType = 'bitcoin/payment_info_bitcoin';
    protected $_bitcoin;
    protected $_canUseCheckout = true;

    public function __construct() {
        $called = true;
        parent::__construct();
    }

    public function getBitcoinInstance() {
        if(!$this->_bitcoin) {
            $this->_bitcoin = Mage::getModel('bitcoin/bitcoin');
        }
        return $this->_bitcoin;
    }

    /**
     * Assign data to info model instance
     *
     * @param   mixed $data
     * @return  Mage_Payment_Model_Method_Purchaseorder
     */
    public function assignData($data)
    {
        $infoInstance = $this->getInfoInstance();

        if (is_array($data)) {
            $infoInstance->addData($data);
        }
        elseif ($data instanceof Varien_Object) {
            $infoInstance->addData($data->getData());
        }

        // TODO: Configurable format for bitcoin $account.
        $account = null;
        if($customer = Mage::helper('customer')->getCurrentCustomer()) {
            $account = $customer->getEmail();
        }
        if(!$this->getInfoInstance()->getBitcoinPaymentAddress()) {
            $this->getInfoInstance()->setBitcoinPaymentAddress($this->getBitcoinInstance()->getNewAddress($account));
        }

        return $this;
    }



    /**
     * Check whether method is available
     *
     * @param Mage_Sales_Model_Quote $quote
     * @return bool
     */
    public function isAvailable($quote = null)
    {
        return true;
    }

    /**
     * Check method for processing with base currency
     *
     * @param string $currencyCode
     * @return boolean
     */
    public function canUseForCurrency($currencyCode)
    {
        return true;
        //return ($currencyCode == 'BTC')? true:false;
    }
}
