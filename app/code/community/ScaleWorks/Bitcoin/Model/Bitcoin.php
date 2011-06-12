<?php


class ScaleWorks_Bitcoin_Model_Bitcoin extends Varien_Object
{
    private $_client;
    protected $_debug = false;
    protected $_store;

    protected function getServiceUrl() {
        $protocol = Mage::getStoreConfig('payment/bitcoin/bitcoind_https', $this->getStore())? 'https':'http';
        $username = Mage::getStoreConfig('payment/bitcoin/bitcoind_username', $this->getStore());
        $password = Mage::getStoreConfig('payment/bitcoin/bitcoind_password', $this->getStore());
        $host = Mage::getStoreConfig('payment/bitcoin/bitcoind_host', $this->getStore());
        $port = Mage::getStoreConfig('payment/bitcoin/bitcoind_port', $this->getStore());
        $url = $protocol.'://'.$username.':'.$password.'@'.$host.':'.$port.'/';
        return $url;
    }

    protected function getClient() {
        if(!$this->_client) {
            $this->_client = new Jsonrpcphp_Client($this->getServiceUrl(), $this->getDebug());
        }
        return $this->_client;
    }

    public function getStore(){
        // todo: implement.
        return false;
    }

    public function setStore($store) {
        $this->_store = $store;
    }

    public function getDebug() {
        return $this->_debug;
    }

    public function getInfo() {
        return $this->getClient()->getinfo();
    }

    /**
     * Returns the account associated with the given address.
     *
     * @param string $address
     * @return string Account
     * @throws ScaleWorks_Bitcoin_Exception
     * @since 0.3.17
     */
    public function getAccount($address) {
    if (!$address || empty($address))
      throw Mage::exception('ScaleWorks_Bitcoin', 'Bitcount address was not provided.');
    return $this->getClient()->getaccount($address);
    }

    /**
     * Returns a new bitcoin address for receiving payments.
     *
     * If $account is specified (recommended), it is added to the address book so
     * payments received with the address will be credited to $account.
     *
     * @param string $account Label to apply to the new address
     * @return string Bitcoin address
     * @throws ScaleWorks_Bitcoin_Exception
     */
    public function getNewAddress($account = null) {
      if (!$account || empty($account)) {
        return $this->getClient()->getnewaddress();
      }
      return $this->getClient()->getnewaddress($account);
    }


    /**
     * Returns the total amount received by $address in transactions with at least $minconf confirmations.
     *
     * @param string $address Bitcoin address
     * @param integer $minconf Minimum number of confirmations for transactions to be counted
     * @return float Total amount recieved by the Bitcoin address.
     * @throws BitcoinClientException
     */
    public function getReceivedByAddress($address, $minconf = 5) {
        if (!is_numeric($minconf) || $minconf < 0) {
            Mage::exception('ScaleWorks_Bitcoin', 'Minimum confirmations param $minconf must be >= 0');
        }
        if (!$address || empty($address)) {
            Mage::exception('ScaleWorks_Bitcoin', 'A bitcoin address must be provided.');
        }
        return $this->getClient()->getreceivedbyaddress($address, $minconf);
    }

    /**
     * Assigns an address to an account.
     * $account may be omitted to remove an account from an address.
     *
     * @param string $address
     * @param string $account
     * @return NULL
     * @throws BitcoinClientException
     * @since 0.3.17
     */
    public function setAccount($address, $account = "") {
      if (!$address || empty($address)) {
        Mage::exception('ScaleWorks_Bitcoin', "Address is required to setAccount.");
      }

      return $this->getClient()->setaccount($address, $account);
    }


}