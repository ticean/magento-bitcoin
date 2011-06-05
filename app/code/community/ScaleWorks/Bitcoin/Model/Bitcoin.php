<?php


class ScaleWorks_Bitcoin_Model_Bitcoin extends Varien_Object
{
    private $_client;
    protected $_debug;
    protected $_store;


    protected function getClient() {
        if(!$this->_client) {
            $this->_client = new Jsonrpcphp_Client('http://ticean:peppers22@127.0.0.1:8332/');
        }
        return $this->_client;
    }

    public function getStore(){

    }

    public function setStore() {

    }

    public function getInfo() {
        return $this->getClient()->getinfo();
    }

}