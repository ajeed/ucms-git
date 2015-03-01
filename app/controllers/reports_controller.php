<?php

class ReportsController extends AppController {
	
	var $uses = array ('Store' );
	var $name = 'Reports';
	var $header = 'Reports';
	
	function beforeFilter() {
		parent::beforeFilter ();
	}
	function generateMonthly($month = null) {
		$date = new DateTime ();
		if ($month === null) {
		}
	}
	
	function generateRange($start_date, $end_date = null) {
		prd ( "calling range" );
	}
	
	function year($mode = null, $val = null) {
		$dt = new DateTime ();
		$year = $dt->format ( 'Y' );
		if (! empty ( $val )) {
			$year = $val;
		}
		switch ($mode) {
			case "sale" :
				$this->loadModel ( 'Sale' );
				$sales = $this->Store->Sale->find ();
			case "buy" :
				//generate buy for current year
				break;
			default :
				//generate both for current year
				break;
		}
	}
	
	function __call($method, $args) {
		$accepted_method = array ("generate" );
		prd ( "asdasd" );
		
		if (in_array ( $method, $accepted_method )) {
			if (count ( $args ) == 2) {
				$this->generateRange ( $args [0], $args [1] );
			}
		
		} else {
			trigger_error ( $method . " is unknown method", E_USER_ERROR );
		}
	
	}
	
	function index() {
		$this->LogUtil->log();
		$this->set ( 'header', $this->header );
		
		$dt = new DateTime ();
		$this->set ( 'month', $dt->format ( 'M' ) );
		$this->set ( 'year', $dt->format ( 'Y' ) );
		$this->set ( 'totalSale', $this->Store->getSalesMonthly () );
		$this->set ( 'totalBuy', $this->Store->getBuyMonthly () );
		$this->set ( 'current', $this->Store->getCountAvailable () );
		
		$m = ($dt->format ( 'm' )) - 1;
		
		$repSalesHistory = array ();
		$repBuyHistory = array ();
		while ( $m != 0 ) {
			$repSalesHistory [$m] = $this->Store->getSalesMonthly ( $m );
			$repBuyHistory [$m] = $this->Store->getBuyMonthly ( $m );
			-- $m;
		}
		
		$repSalesByType = $this->Store->Sale->getSalesRepByType ();
		$this->set ( compact ( 'repSalesByType' ) );
		$this->set ( compact ( 'repSalesHistory' ) );
		$this->set ( compact ( 'repBuyHistory' ) );
		
		$repBuyByType = $this->Store->getBuyRepByType ();
		$this->set ( compact ( 'repBuyByType' ) );
	
	}
}