<?php

class TestController extends AppController {
	
	var $name = 'Test';
	var $uses = array('Store','Make','Sale','Mod','PurchaseCost');
	var $helpers = array('Js' => 'Jquery'); 
	var $components = array('RequestHandler','Email');
	
	
	
	public function index() {
   		$this->set('names', $this->Make->find('list'));
 	}
 
	 public function get_models_ajax() {
		Configure::write ( 'debug', 0 );
		if ($this->RequestHandler->isAjax ()) {
			$this->set ( 'mods', $this->Make->Mod->find ( 'list', array (
			'conditions' => array (
			'Mod.make_id' => $this->params ['url'] ['makeId'] ),
			'recursive' => - 1 ) ) );
		}
	}
	
	public function viewPdf($id = null) {
		if (! $id) {
			$this->Session->setFlash ( 'Sorry, there was no property ID submitted.' );
			$this->redirect ( array ('action' => 'index' ), null, true );
		}
		
//		Configure::write('debug',0); // Otherwise we cannot use this method while developing 

        $id = intval($id); 
        $stores = $this->Store->find('all');
        $this->set(compact('stores'));
//        $this->viewPath('stores');
		
//        $property = $this->__view($id); // here the data is pulled from the database and set for the view 
//
//        if (empty($property)) 
//        { 
//            $this->Session->setFlash('Sorry, there is no property with the submitted ID.'); 
//            $this->redirect(array('action'=>'index'), null, true); 
//        } 
        $this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
	}
	
	function sendmail() {
		$this->Email->smtpOptions = array (
			'port' => '26', 
			'timeout' => '30', 
			'host' => 'mail.afha.com.my', 
			'username' => 'admin@afha.com.my', 
			'password' => '1234qwer' );
		/* Set delivery method */
		$this->Email->delivery = 'smtp';
//		$this->Email->delivery = 'debug';
		
		/* Check for SMTP errors. */
		$this->Email->from = 'No-Reply <no-reply@afha.com.my>';
		$this->Email->to = 'Somebody Else <hafidzi@gmail.com>';
		$this->Email->subject = 'Test';
		$this->Email->template = 'test';
		$this->Email->sendAs = 'text';
		$this->Email->send();
		$this->set('smtp_errors', $this->Email->smtpError);
	}
	
	public function testSales() {

		if(empty($this->data['rep']['month'])) $month = date('M');
		else {
			$dt = DateTime::createFromFormat('!m', $this->data['rep']['month']);
			$month = $dt->format('F');
		}

		if (empty($year)) $year = date('Y');

		$timestamp    = strtotime($month.$year);
		$start_date = date('Y-m-01', $timestamp);
		// pr($start_date);
		// exit;
		$this->paginate = array(
			'recursive' => -1,
	        'conditions' => array('Sale.deliver_date BETWEEN \''.$start_date.'\' AND DATE_ADD(\''.$start_date.'\', INTERVAL 30 DAY)'),
	        'fields' => array(
	        	 'Stores.id',	
	        	 'Stores.reg_no',
		    	 'Stores.price as PURCHASE_PRICE',
		    	 'Stores.make_id',
		    	 'Stores.mod_id',
		    	 'Stores.title',
		    	 'SUM(Purchase_costs.amount)AS TOTALCOST',
		    	 'Sale.price as SELLING_PRICE',
		    	 'Sale.stores_id',
		    	 'Sale.deliver_date',), 
	        'limit' => 100,
	        'joins' => array(
		        array(
		            'table' => 'Stores',
		            'alias' => 'Stores',
		            'type' => 'LEFT',
		            'conditions' => array(
		                'Stores.id = Sale.stores_id'
		            ),
		         ),
		        array(
		        	'table' => 'Purchase_costs',
		            'alias' => 'Purchase_costs',
		            'type' => 'LEFT',
		            'conditions' => array(
		                'Purchase_costs.store_id = Sale.stores_id'
		            	),
        			),
		        ),
	        'group' => 'Sale.stores_id'
	    	);
    	$data = $this->paginate('Sale');
		
		$this->set ('sales',$data);
		$this->set ( 'makes', $this->Make->find ( 'list' ) );
		$this->set ( 'mods', $this->Mod->find ( 'list' ) );
	}

	
}

