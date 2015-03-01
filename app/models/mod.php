<?php
class Mod extends AppModel {
	var $name = 'Mod';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Make' => array(
			'className' => 'Make',
			'foreignKey' => 'make_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $hasMany = array(
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'mod_id',
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