<?php
/* Store Test cases generated on: 2011-03-07 04:03:02 : 1299467462*/
App::import('Model', 'Store');

class StoreTestCase extends CakeTestCase {
	var $fixtures = array('app.store', 'app.manufacture', 'app.document');

	function startTest() {
		$this->Store =& ClassRegistry::init('Store');
	}

	function endTest() {
		unset($this->Store);
		ClassRegistry::flush();
	}

}
?>