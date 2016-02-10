<?php
class SaleDtlsController extends AppController {

	var $name = 'SaleDtls';
	var $header = "Purchasing Details";

	function beforeFilter() {
		parent::beforeFilter ();
	}

	function index() {
		$this->SaleDtl->recursive = 0;
		$this->set('saleDtls', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid sale dtl', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('saleDtl', $this->SaleDtl->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SaleDtl->create();
			if ($this->SaleDtl->save($this->data)) {
				$this->Session->setFlash(__('The sale dtl has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sale dtl could not be saved. Please, try again.', true));
			}
		}
		$sales = $this->SaleDtl->Sale->find('list');
		$items = $this->SaleDtl->Item->find('list');
		$this->set(compact('sales', 'items'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid sale dtl', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SaleDtl->save($this->data)) {
				$this->Session->setFlash(__('The sale dtl has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sale dtl could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SaleDtl->read(null, $id);
		}
		$sales = $this->SaleDtl->Sale->find('list');
		$items = $this->SaleDtl->Item->find('list');
		$this->set(compact('sales', 'items'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for sale dtl', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SaleDtl->delete($id)) {
			$this->Session->setFlash(__('Sale dtl deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Sale dtl was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>