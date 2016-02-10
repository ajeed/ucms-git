<?php
class Lookup extends AppModel {
	var $name = 'Lookup';
	var $useTable = 'lookup';
	var $displayField = 'value';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Voucher' => array(
			'className' => 'Voucher',
			'foreignKey' => 'lookup_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>