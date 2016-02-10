<?php
/* SaleDtls Test cases generated on: 2016-01-28 04:01:21 : 1453950081*/
App::import('Controller', 'SaleDtls');

class TestSaleDtlsController extends SaleDtlsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SaleDtlsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.sale_dtl', 'app.sales', 'app.items');

	function startTest() {
		$this->SaleDtls =& new TestSaleDtlsController();
		$this->SaleDtls->constructClasses();
	}

	function endTest() {
		unset($this->SaleDtls);
		ClassRegistry::flush();
	}

}
?>