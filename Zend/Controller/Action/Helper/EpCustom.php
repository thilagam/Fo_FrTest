<?php

require_once 'Zend/Session.php';

class Zend_Controller_Action_Helper_EpCustom extends Zend_Controller_Action_Helper_Abstract
{
	
	public function checksession()
    {
        $this->EP_Contrib_reg = Zend_Registry::get('EP_Contrib_reg');
		$redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');      
		
		//print_r($_SERVER);exit;
		
		if($this->EP_Contrib_reg->clientidentifier=="")
		{
			$redirector->gotoUrl("/contrib/index?target=".urlencode($_SERVER['REQUEST_URI']));
			return false;
            exit;
		}
        else
        {
            return true;
        }
    }
	public function checksessionclient()
    {
        
		$this->EP_Client = Zend_Registry::get('EP_Client');
		$redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('Redirector');      			
		
		if($this->EP_Client->clientidentifier=="")
		{			
			$redirector->gotoUrl("/client/index?target=".urlencode($_SERVER['REQUEST_URI']));
			return false;
            exit;
		}
        else
        {
            return true;
        }


    }
}