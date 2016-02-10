<?php
class Sale extends AppModel {
	var $name = 'Sale';
	var $displayField = 'stores_id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $belongsTo = array(
		'Store' => array(
			'className' => 'Stores',
			'foreignKey' => 'stores_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Salestype' => array(
			'className' => 'Salestypes',
			'foreignKey' => 'salestype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'SaleDtl' => array(
			'className' => 'SaleDtl',
			'foreignKey' => 'sales_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
	
	function afterSave($created) {
		if($created === true) {
			$this->Store->updateAll(array('Store.in_store'=>'0'),array('Store.id'=>$this->data['Sale']['stores_id']));
		}
	}
	
	/**
	 * 
	 * Get total sales per year.Return array of total count per month
	 * Start from Jan to current month
	 * @param int $year
	 */
	public function getSalesRepByYear($year = 'Year(CURDATE())') {
		$sales = $this->find('all',array(
				'fields'=>array(
						'count(Sale.id) AS count',
						'MONTH(Sale.created)'),
				'group'=>'MONTH(Sale.created)',
				'conditions'=>array(
					'Year(Sale.created)'=>$year
		),));
		$arrSalesPerMonth = implode(',', Set::extract($sales, '{n}.0.count'));
		return $arrSalesPerMonth;
	}
	
	/**
	 * 
	 * Get total sales per year.Return array of total count per month
	 * Start from Jan to current month. Format is mm, yyyy
	 * @param int $month
	 */
	public function getSalesRepByType($month=null,$year=null) {
		$dt = new DateTime();
		$int = ($month == null && !empty($year)) ? "+1 years" : "+1 months"; 
		
		
		$month = ($month == null) ? $dt->format('m') : $month;
		$year = ($year == null) ? $dt->format('Y') : $year;
		$dt->setDate($year, $month, 1); //Get 1st date of given month given year
		
		$types = $this->Salestype->find('list');
		$rep = array();
		$this->recursive = -1;
		
		$first = $dt->format('Y-m-d');
		
		//DateInterval is not available until PHP>=5.3
//       	$interval = new DateInterval($int);
//       	$last = $dt->add($interval)->format('Y-m-d');

		$last = $dt->modify($int);
		$last = $dt->format('Y-m-d');

		//20140903 - Bai request instead of created date, set deliver_date
		$conditions = array('Sale.deliver_date >=' => $first, 'Sale.deliver_date <' => $last);
		foreach($types as $id=>$type) {
			$conditions['Sale.salestype_id'] = $id;
			$rep[$type] = $this->find('count',array('conditions'=>$conditions));
		}
		return $rep;
	}
	
	/**
	 * Function to return the status of cars, either sold yet or not.
	 * @param int $store_id
	 * @return boolean
	 */
	public function isSold($store_id) {
		$conditions = array('stores_id'=>$store_id);
		return($this->find('count',array('conditions'=>$conditions)));
	}

	/**
	* Get sales object by date range
	* @param date $dtFrom
	* @param date $dtTo
	* @return Sale Sales
	*
	*/

	public function getSalesByRangeDate ($dtFrom,$dtTo) {
		$conditions = array('Sale.deliver_date >=' => $dtFrom,'Sale.deliver_date <' => $dtTo);
		return($this->find('all',array('conditions'=>$conditions)));
	}
}
?>