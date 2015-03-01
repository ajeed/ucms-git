<?php
class Manufacture extends AppModel {
	var $name = 'Manufacture';
        var $virtualFields = array(
        'full_name_make' => 'CONCAT(Manufacture.make, " ", Manufacture.model, " ", " (", Manufacture.trans, ") ")'
    );

	var $displayField = 'full_name_make';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'manufacture_id',
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