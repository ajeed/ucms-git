<?php
/* Voucher Fixture generated on: 2016-01-31 08:01:07 : 1454224207 */
class VoucherFixture extends CakeTestFixture {
	var $name = 'Voucher';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'lookup_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'stores_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'issuance' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 250),
		'issuance_date' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'remarks' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'amount' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '10,2'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'lookup_id' => 1,
			'stores_id' => 1,
			'issuance' => 'Lorem ipsum dolor sit amet',
			'issuance_date' => '2016-01-31',
			'remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'amount' => 1,
			'created' => '2016-01-31 08:10:07',
			'modified' => '2016-01-31 08:10:07'
		),
	);
}
?>