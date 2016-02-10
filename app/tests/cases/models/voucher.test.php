<?php
/* Voucher Test cases generated on: 2016-01-31 08:01:07 : 1454224207*/
App::import('Model', 'Voucher');

class VoucherTestCase extends CakeTestCase {
	var $fixtures = array('app.voucher', 'app.lookup', 'app.stores');

	function startTest() {
		$this->Voucher =& ClassRegistry::init('Voucher');
	}

	function endTest() {
		unset($this->Voucher);
		ClassRegistry::flush();
	}

}
?>