<?php
class ReceiptsController extends AppController {

	var $name = 'Receipts';

	function index() {
		$this->Receipt->recursive = 1;
		$this->set('receipts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid receipt', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('receipt', $this->Receipt->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Receipt->create();
			if ($this->Receipt->save($this->data)) {
				$this->Session->setFlash(__('The receipt has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The receipt could not be saved. Please, try again.', true));
			}
		}
		$lookups = $this->Receipt->Lookup->find('list',array('conditions' => array('type' => 'receipt')));
		$stores = $this->Receipt->Store->find('list');
		$this->set(compact('lookups', 'stores'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid receipt', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Receipt->save($this->data)) {
				$this->Session->setFlash(__('The receipt has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The receipt could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Receipt->read(null, $id);
		}
		$lookups = $this->Receipt->Lookup->find('list',array('conditions' => array('type' => 'receipt')));
		$stores = $this->Receipt->Store->find('list');
		$this->set(compact('lookups', 'stores'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for receipt', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Receipt->delete($id)) {
			$this->Session->setFlash(__('Receipt deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Receipt was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>