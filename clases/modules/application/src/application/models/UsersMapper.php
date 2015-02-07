<?php
namespace application\models;

use \core\models\FrontController;

class UsersMapper 
{

    public $mapper = 'Users';
    public $config;

    public function __construct()
    {
        $fc = FrontController::getInstace();
        $this->setConfig($fc->getConfig());
    }
    /**
     * @return the $config
     */
    public function getConfig()
    {
        return $this->config;
    }

	/**
     * @param field_type $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    public function getGateway()
    {
        return 'application\\models\\Gateways\\'.
                $this->mapper.
                $this->getConfig()['adapter'];
    }
    
    public function getUsers()
    {
        $gatewayname = $this->getGateway();
        $gateway = new $gatewayname($this->getConfig());
        return $gateway->getUsers();
    }
    
    public function getUser($id)
    {
        $gatewayname = $this->getGateway();
        $gateway = new $gatewayname($this->getConfig());
        return $gateway->getUser($id);
    }
    
    public function deleteUser($id)
    {
        $gatewayname = $this->getGateway();
        $gateway = new $gatewayname($this->getConfig());
        return $gateway->deleteUser($id);
    }
    
    public function insertUser($data)
    {
        $gatewayname = $this->getGateway();
        $gateway = new $gatewayname($this->getConfig());
        return $gateway->insertUser($data);
    }
    
    public function updateUser($id, $data)
    {
        $gatewayname = $this->getGateway();
        $gateway = new $gatewayname($this->getConfig());
        return $gateway->updateUser($id, $data);
    }
    
    
    
}