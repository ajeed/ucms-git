<?php
class Store extends AppModel {
	var $name = 'Store';
	var $displayField = 'reg_no';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

    var $virtualFields = array(
    	'year' => 'CONCAT(Store.year_of_made, " / ", Store.year_of_reg)',
    	'full_title' => 'CONCAT(Make.name, " ",Mod.name," ",Store.title)'
    );

	var $belongsTo = array(
		'Manufacture' => array(
			'className' => 'Manufacture',
			'foreignKey' => 'manufacture_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Mod' => array(
			'className' => 'Mod',
			'foreignKey' => 'mod_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Make' => array(
			'className' => 'Make',
			'foreignKey' => 'make_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	

	var $hasMany = array(
		'Document' => array(
			'className' => 'Document',
			'foreignKey' => 'store_id',
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
		'Sale' => array(
			'className' => 'Sale',
			'foreignKey' => 'stores_id',
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
		'PurchaseCost' => array(
			'className' => 'PurchaseCost',
			'foreignKey' => 'store_id',
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
	
	
        public function getRecentBuy() {
        	return $this->find('all',array('limit'=>5,'order'=>array('date'=>'DESC')));
        }
        
		public function getRecentSales() {
            return $this->find('all',array('limit'=>5,'conditions'=>array('Store.in_store'=>null),'order'=>array('Store.modified'=>'DESC')));
        }

        public function getDocPending($cond = false) {
        	
            $conditions = array('conditions'=>array("OR"=>array('Document.grant_ori'=>0,
            										'Document.seller_ic'=>0,
            										'Document.auth_letter'=>0)),
            					'fields'=>array('Document.id','Document.store_id'));
            $this->Document->recursive = -1;
            return($this->Document->find('list',$conditions))	;
            
        }
        
       public function getCountAvailable() {
       		$this->recursive = -1;
       		return $this->find('count',array('conditions'=>array('in_store'=>1)));
       }
       
       /**
        * 
        * Get total sale permonth.
        * @return int totalSale
        */
       public function getSalesMonthly($month = null) {
       	
       	$today = getdate();
       	$this->Sale->recursive = -1;
       	if($month === null) {
       		$first = date('Y-m-d', mktime(0, 0, 0,$today['mon'], 1, $today['year']));
       		//20140903 - Bai request change sale dat instead of date created to delivery_date
       		$condition = array("Sale.deliver_date >='$first'");
       	}else {
       		$dt = new DateTime();
       		$dt->setDate($today['year'], $month, 1);
       		$first = $dt->format('Y-m-d');
//       		$interval = new DateInterval('P1M');
//       		$last = $dt->add($interval)->format('Y-m-d');
			$last = $dt->modify("+1 months");
			$last = $dt->format('Y-m-d');
       		$condition = array("Sale.created >='$first'","Sale.created <'$last'");
       	}
       		return $this->Sale->find('count',array('conditions'=>$condition));
		
		
		//20120720 - Change sale report based on sale's date instead of date created
	/*	$today = getdate();
       	$this->Sale->recursive = -1;
       	if($month === null) {
       		$first = date('Y-m-d', mktime(0, 0, 0,$today['mon'], 1, $today['year']));
       		$condition = array("Sale.date >='$first'");
       	}else {
       		$dt = new DateTime();
       		$dt->setDate($today['year'], $month, 1);
       		$first = $dt->format('Y-m-d');
			$last = $dt->modify("+1 months")->format('Y-m-d');
       		$condition = array("Sale.date >='$first'","Sale.date <'$last'");
       	}
       		return $this->Sale->find('count',array('conditions'=>$condition));
       		*/
       }
       
       public function getBuyMonthly($month=null) {
       		$today = getdate();
       		$this->recursive = -1;
       		
       		if($month === null) {
	       		$first = date('Y-m-d', mktime(0, 0, 0,$today['mon'], 1, $today['year']));
	       		$condition = array("Store.date >='$first'");
       		}else {
       			$dt = new DateTime();
	       		$dt->setDate($today['year'], $month, 1);
	       		$first = $dt->format('Y-m-d');
//	       		$interval = new DateInterval('P1M');
//	       		$last = $dt->add($interval)->format('Y-m-d');
				$last = $dt->modify("+1 months");
				$last = $dt->format('Y-m-d');
	       		$condition = array("Store.date >='$first'","Store.date <'$last'");
       		}
       		return $this->find('count',array('conditions'=>$condition));
       }
        
		public function getBuyRepByType($month=null,$year=null) {
			$month = 5;
			$dt = new DateTime();
//			$int = ($month === null && !empty($year)) ? "P1Y" : "P1M";
			$int = ($month === null && !empty($year)) ? "+1 years" : "+1 months";  
			
			
			$month = ($month === null) ? $dt->format('m') : $month;
			$year = ($year === null) ? $dt->format('Y') : $year;
			$dt->setDate($year, $month, 1); //Get 1st date of given month given year
			$rep = array();
			$this->recursive = -1;
			
			$first = $dt->format('Y-m-d');
//	       	$interval = new DateInterval($int);
//	       	$last = $dt->add($interval)->format('Y-m-d');
			$last = $dt->modify($int);
			$last = $dt->format('Y-m-d');
			$conditions = array('Store.date >=' => $first, 'Store.date <' => $last);
			$types = array('walk-in'=>1,'broker'=>0);
			foreach($types as $type=>$val) {
				$conditions['Store.walk_in'] = $val;
				$rep[$type] = $this->find('count',array('conditions'=>$conditions));
			}
			return $rep;
		}  
}
?>