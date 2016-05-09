<?php
class PurchaseCostsController extends AppController {

	var $name = 'PurchaseCosts';

	function index() {
		$this->PurchaseCost->recursive = 1;
		$this->set('purchaseCosts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid purchase cost', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('purchaseCost', $this->PurchaseCost->read(null, $id));
	}

	function add($id = null) {
		
		if (!empty($this->data)) {
			$this->PurchaseCost->create();
			if ($this->PurchaseCost->save($this->data)) {
				$this->Session->setFlash(__('The purchase cost has been saved', true));
				$this->redirect(array('controller'=>'stores','action' => 'view',$this->data['PurchaseCost']['store_id']));
			} else {
				exit;
				$this->Session->setFlash(__('The purchase cost could not be saved. Please, try again.', true));
			}
		}
		if($id == null) $this->redirect(array('controller'=>'stores','action' => 'index'));
		$stores = $this->PurchaseCost->Store->findById($id);
		$lookups = $this->PurchaseCost->Lookup->find('list',array('conditions' => array('type' => 'voucher')));
		$this->set(compact('stores', 'lookups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid purchase cost', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$item = $this->PurchaseCost->findById($id);
			if ($this->PurchaseCost->save($this->data)) {
				$this->Session->setFlash(__('The purchase cost has been saved', true));
				$this->redirect(array('controller'=>'stores','action' => 'view',$item['Store']['id']));
			} else {
				$this->Session->setFlash(__('The purchase cost could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PurchaseCost->read(null, $id);
		}
		$stores = $this->PurchaseCost->Store->find('list');
		$lookups = $this->PurchaseCost->Lookup->find('list');
		$this->set(compact('stores', 'lookups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for purchase cost', true));
			$this->redirect(array('action'=>'index'));
		}
		$item = $this->PurchaseCost->findById($id);

		if ($this->PurchaseCost->delete($id)) {
			$this->Session->setFlash(__('Purchase cost deleted', true));
			$this->redirect(array('controller'=>'stores','action' => 'view',$item['Store']['id']));
		}
		$this->Session->setFlash(__('Purchase cost was not deleted', true));
		$this->redirect(array('controller'=>'stores','action' => 'view',$item['Store']['id']));
	}
}
?>