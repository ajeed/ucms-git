<?php
/* Vouchers Test cases generated on: 2016-01-31 08:01:14 : 1454224214*/
App::import('Controller', 'Vouchers');

class TestVouchersController extends VouchersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class VouchersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.voucher', 'app.lookup', 'app.stores');

	function startTest() {
		$this->Vouchers =& new TestVouchersController();
		$this->Vouchers->constructClasses();
	}

	function endTest() {
		unset($this->Vouchers);
		ClassRegistry::flush();
	}

}
?>