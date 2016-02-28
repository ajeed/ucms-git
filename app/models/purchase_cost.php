<?php
class PurchaseCost extends AppModel {
	var $name = 'PurchaseCost';
	var $displayField = 'amount';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'store_id',
			'conditions' => '',
			'fields' => array('Store.id','Store.reg_no'),
			'order' => ''
		),
		'Lookup' => array(
			'className' => 'Lookup',
			'foreignKey' => 'lookup_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function getTotalCostAmount($store_id){
		 $sum = $this->find('first', array(
    'conditions' =>array('store_id'=>$store_id),
    'fields' => array('sum(amount) as total_sum'
            )
        )
    );
		  return $sum[0];
            
	}
}
?>