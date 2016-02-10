<?php

App::import('Core', 'Controller'); 
App::import('Component', 'Sms'); 

class SmsTask extends Shell {
	
	private $Controller;

	private $Sms;


	/** 
	* Startup for the SmsTask 
	* 
	*/ 
	public function __construct(&$dispatch) {
    $this->Controller =& new Controller();
        $this->Sms =& new SmsComponent(null);
        $this->Sms->Controller = $this->Controller;
        parent::__construct($dispatch);
    }
	/** 
	* Send an sms useing the SmsComponent 
	* 
	* @param array $settings 
	* @return boolean 
	*/ 
	 function test() {
	 	$this->Sms->test();
	 }

	 function send($dest,$msg) {
	 	$response = $this->Sms->postSms($dest,$msg);
	 	return $response;
	 }

}