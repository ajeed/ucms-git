<?php
class Document extends AppModel {
	var $name = 'Document';
	var $displayField = 'store_id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'store_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>