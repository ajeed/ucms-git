<?php
class SalesController extends AppController {
	
	var $name = 'Sales';
	var $uses = array ('Sale', 'Make', 'Mod' );
	var $header = "List Sold Cars";
	
	function index() {
		
		$this->Sale->recursive = 1;
		$this->paginate = array ('order' => array ('Sale.deliver_date' => 'DESC' ) );
		$this->set('sales', $this->paginate());
		$this->set ( 'makes', $this->Make->find ( 'list' ) );
		$this->set ( 'mods', $this->Mod->find ( 'list' ) );
		$this->set('header',$this->header);
	}
	
	function process($id) {
		
		if (! empty ( $id )) {
			$this->set ( 'car', $this->Sale->Store->find ( 'all', array ('conditions' => array ('Store.id' => $id ) ) ) );
		}
		$stores = $this->Sale->Store->find ( 'first', array ('conditions' => array ('Store.id' => $id ) ) );
		$this->set ( compact ( 'stores' ) );
		$salestypes = $this->Sale->Salestype->find ( 'list' );
		$this->set ( compact ( 'salestypes' ) );
	}
	
	private function sold($id) {
		if (! empty ( $id )) {
			$this->data ['Sale'] ['stores_id'] = $id;
			$this->data ['Store'] ['id'] = $id;
			$this->data ['Store'] ['in_store'] = 0;
			$this->Sale->Store->save ( $this->data ['Store'] );
			
			$this->Sale->create ();
			if ($this->Sale->save ( $this->data )) {
				$this->Session->write ( 'flash', array ('Success: The sale has been made.', 'success' ) );
				$this->redirect ( array ('controller' => 'stores', 'action' => 'index' ) );
			} else {
				$this->Session->write ( 'flash', array ('Notice: Invalid item to sold.', 'notice' ) );
				$this->redirect ( array ('controller' => 'stores', 'action' => 'index' ) );
			}
		} else {
			$this->Session->write ( 'flash', array ('Notice: Invalid item to sold.', 'notice' ) );
			$this->redirect ( array ('controller' => 'stores', 'action' => 'index' ) );
		}
	}
	
	function view($id = null) {
		if (! $id) {
			$this->Session->setFlash ( __ ( 'Invalid sale', true ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		$this->set ( 'sale', $this->Sale->read ( null, $id ) );
	}
	
	function add() {
		if (! empty ( $this->data )) {
			$this->Sale->create ();
			if ($this->Sale->save ( $this->data )) {
				$this->Session->setFlash ( __ ( 'The sale has been saved', true ) );
				$this->redirect ( array ('controller' => 'stores', 'action' => 'index' ) );
			} else {
				$this->Session->setFlash ( __ ( 'The sale could not be saved. Please, try again.', true ) );
			}
		}
		$stores = $this->Sale->Store->find ( 'list', array ('fields' => 'Store.reg_no' ) );
		$this->set ( compact ( 'stores' ) );
		$salestypes = $this->Sale->Salestype->find ( 'list' );
		$this->set ( compact ( 'salestypes' ) );
	}
	
	function edit($id = null) {
		if (! $id && empty ( $this->data )) {
			$this->Session->setFlash ( __ ( 'Invalid sale', true ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		if (! empty ( $this->data )) {
			if ($this->Sale->save ( $this->data )) {
				$this->Session->write ( 'flash', array ('Sales details has been saved', 'success' ) );
				$this->redirect ( array ('controller' => 'stores', 'action' => 'view', $this->data ['Sale'] ['stores_id'] ) );
			} else {
				$this->Session->setFlash ( __ ( 'The sale could not be saved. Please, try again.', true ) );
			}
		}
		if (empty ( $this->data )) {
			$this->data = $this->Sale->read ( null, $id );
		}
		$stores = $this->Sale->Store->find ( 'list' );
		$this->set ( compact ( 'stores' ) );
		$salestypes = $this->Sale->Salestype->find ( 'list' );
		$this->set ( compact ( 'salestypes' ) );
	}
	
	function delete($id = null) {
		if (! $id) {
			$this->Session->setFlash ( __ ( 'Invalid id for sale', true ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		if ($this->Sale->delete ( $id )) {
			$this->Session->setFlash ( __ ( 'Sale deleted', true ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		$this->Session->setFlash ( __ ( 'Sale was not deleted', true ) );
		$this->redirect ( array ('action' => 'index' ) );
	}

}
?>