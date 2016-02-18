<?php
class VouchersController extends AppController {

	var $name = 'Vouchers';

	function index() {
		$this->Voucher->recursive = 1;
		$this->set('vouchers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid voucher', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('voucher', $this->Voucher->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Voucher->create();
			if ($this->Voucher->save($this->data)) {
				$this->Session->setFlash(__('The voucher has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voucher could not be saved. Please, try again.', true));
			}
		}
		$lookups = $this->Voucher->Lookup->find('list',array('conditions' => array('type' => 'voucher')));
		$stores = $this->Voucher->Store->find('list');
		$this->set(compact('lookups', 'stores'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid voucher', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Voucher->save($this->data)) {
				$this->Session->setFlash(__('The voucher has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voucher could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Voucher->read(null, $id);
		}
		$lookups = $this->Voucher->Lookup->find('list',array('conditions' => array('type' => 'voucher')));
		$stores = $this->Voucher->Store->find('list');
		$this->set(compact('lookups', 'stores'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for voucher', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Voucher->delete($id)) {
			$this->Session->setFlash(__('Voucher deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Voucher was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>