<?php
class Receipt extends AppModel {
	var $name = 'Receipt';
	var $displayField = 'lookup_id';
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
}
?>