<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Session','LogUtil','RequestHandler');
	
	function beforeRender() {
		$this->layout="login";
	}
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
		$this->Auth->allow('change');
	}
	
	function login() {
		if($this->Auth->user('id')) {
				$this->LogUtil->log();
				$this->redirect(array('controller'=>'dashboard'));
			}
		if(empty($this->Session->Auth) && isset($this->data)) {
			$ip = $this->RequestHandler->getClientIP();
			$desc = "Wrong password for username: " . $this->data['User']['username'] . " ip: " . $ip;
			$this->LogUtil->log(array('type'=>1,'description'=>$desc));
		}
	}
	
	function logout() {
		$this->LogUtil->log();
		$this->redirect($this->Auth->logout());
	}
	
	
	function change() {
		if(!empty($this->data)) {
			if($this->data['User']['password'] === AuthComponent::password($this->data['User']['retype'])) {
				$user = $this->User->find('first',array('conditions'=>array('User.username'=>$this->data['User']['username'])));
				if(!empty($user)) {
					$this->User->id = $user['User']['id'];
					if($this->User->save($this->data)){
						$this->Session->setFlash("Please login using your new username and password");
						$this->LogUtil->log(array('description'=>"User id : " . $this->User->id));
						$this->redirect('login');
					}
				}else {
					$this->Session->setFlash("Users is not registered in the system");
				}
			}else {
				$this->Session->setFlash("Password retype is not correct.Please try again!");
			}
			
		}
	}

}
?>