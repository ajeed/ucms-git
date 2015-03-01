<?php

class Content extends AppModel {

	public $useTable = false;

	public $schema => array {
		$message => array {
			'type' => 'string',
			'length' => 160,
			'null' => false
		},
		$sales_id => array {
			'type' => 'integer',
			'null' => false;
		},
		
	}
}