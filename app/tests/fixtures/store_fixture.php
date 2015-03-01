<?php
/* Store Fixture generated on: 2011-03-07 04:03:02 : 1299467462 */
class StoreFixture extends CakeTestFixture {
	var $name = 'Store';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'reg_no' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 10),
		'manufacture_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'year_of_made' => array('type' => 'text', 'null' => true, 'default' => NULL, 'length' => 4),
		'year_of_reg' => array('type' => 'text', 'null' => true, 'default' => NULL, 'length' => 4),
		'seller_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'seller_tel' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'broker_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'broker_tel' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'walk_in' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'price' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'image' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'remarks' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'in_store' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'reg_no' => 'Lorem ip',
			'manufacture_id' => 1,
			'year_of_made' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'year_of_reg' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'seller_name' => 'Lorem ipsum dolor sit amet',
			'seller_tel' => 'Lorem ipsum dolor sit amet',
			'broker_name' => 'Lorem ipsum dolor sit amet',
			'broker_tel' => 'Lorem ipsum dolor sit amet',
			'walk_in' => 1,
			'price' => 1,
			'date' => '2011-03-07 04:11:02',
			'image' => 'Lorem ipsum dolor sit amet',
			'remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'in_store' => 1,
			'created' => '2011-03-07 04:11:02',
			'modified' => '2011-03-07 04:11:02'
		),
	);
}
?>