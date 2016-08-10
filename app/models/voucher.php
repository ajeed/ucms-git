<?php
class Voucher extends AppModel {
	var $name = 'Voucher';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Lookup' => array(
			'className' => 'Lookup',
			'foreignKey' => 'lookup_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'stores_id',
			'conditions' => '',
			'fields' => array('Store.id','Store.reg_no'),
			'order' => ''
		)
	);

	public function afterSave($opt_arrays = array()){


		//To auto save to purchase_cost if the voucher tie with store_id
		if($this->data['Voucher']['stores_id'] != null || $this->data['Voucher']['stores_id'] != "") {
			$PurchaseCost = ClassRegistry::init('PurchaseCost');
			$PurchaseCost->data['store_id'] = $this->data['Voucher']['stores_id'];
			$PurchaseCost->data['lookup_id'] = $this->data['Voucher']['lookup_id'];
			$PurchaseCost->data['amount'] = $this->data['Voucher']['amount'];
			$PurchaseCost->data['remarks'] = $this->data['Voucher']['issuance']. "-" .$this->data['Voucher']['remarks'];
			$PurchaseCost->data['receipt_no'] = $this->id;
			$PurchaseCost->save($PurchaseCost->data);
			
		}
	}	
}
?>