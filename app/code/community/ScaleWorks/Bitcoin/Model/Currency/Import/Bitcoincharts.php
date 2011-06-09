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
 * @category    ScaleWorks
 * @package     ScaleWorks_Bitcoin
 * @copyright   Copyright (c) 2011 ScaleWorks, Ticean Bennett (http://scaleworks.co)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Currency rate import model (From www.bitcoincharts.com)
 * Provides for weighted prices, to minimize market fluctuations.
 * Also, will default back to the default Webservicex for unsupported currencies.
 *
 * @category   ScaleWorks
 * @package    ScaleWorks_Bitcoin
 * @author     Ticean Bennett <ticean@gmail.com>
 */
class ScaleWorks_Bitcoin_Model_Currency_Import_Bitcoincharts extends Mage_Directory_Model_Currency_Import_Abstract
{
    protected $_url = 'http://bitcoincharts.com/t/weighted_prices.json';
    protected $_messages = array();

     /**
     * HTTP client
     *
     * @var Varien_Http_Client
     */
    protected $_httpClient;

    public function __construct()
    {
        $this->_httpClient = new Varien_Http_Client();
    }

    /**
     *
     * @return array An array of currencies supported on Bitcoincharts.
     */
    public function getSupportedCurrencies() {
        return array("USD","RUB","GAU","SLL","GBP","PLN","EUR");
    }

    public function convert($currencyFrom, $currencyTo, $retry = 0) {
        return $this->_convert($currencyFrom, $currencyTo, 0);
    }

    protected function _convert($currencyFrom, $currencyTo, $retry=0)
    {
        $supported = $this->getSupportedCurrencies();
        if(!((in_array($currencyFrom, $supported) && $currencyTo == 'BIT') || ($currencyFrom == 'BIT' && in_array($currencyTo, $supported)))) {
            //$this->_messages[] = Mage::helper('bitcoin')->__('Conversion from %s to %s is not supported in Bitcoincharts.', $currencyFrom, $currencyTo);
            //return null;
            try {
                $default = Mage::getModel('directory/currency_import_webservicex');
                return $default->convert($currencyFrom, $currencyTo);
            }
            catch (Exception $e) {
                $this->_messages[] = $e->getMessage();
            }

        }

        try {
            $response = $this->_httpClient
                ->setUri($this->_url)
                ->setConfig(array('timeout' => Mage::getStoreConfig('currency/bitcoincharts/timeout')))
                ->request('GET')
                ->getBody();


            $prices = (array)json_decode($response);
            if( !$prices ) {
                $this->_messages[] = Mage::helper('directory')->__('Cannot retrieve rate from %s.', $this->_url);
                return null;
            }

            $altCurrency = ($currencyFrom == "BIT")? $currencyTo:$currencyFrom;

            // 24h, 7d, 30d
            // assume 24h
            $rate = (array)$prices[$altCurrency];
            if(!$rate) return null;
            if($currencyFrom == "BIT") {
                $result = (float)$rate["24h"];
            } else {
                $result = 1/(float)$rate["24h"];
            }
            return $result;
        }
        catch (Exception $e) {
            if( $retry == 0 ) {
                $this->_convert($currencyFrom, $currencyTo, 1);
            } else {
                $this->_messages[] = Mage::helper('directory')->__('Cannot retrieve rate from %s.', $url);
            }
        }
    }
}
