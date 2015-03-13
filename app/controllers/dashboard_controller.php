<?php
    class DashboardController extends AppController {

          var $name = 'Dashboard';
          var $uses = array();
          
          function beforeRender() {
          }
          function index () {

              $Store = ClassRegistry::init('Store');
              $this->set('listAvailable',$Store->find('all',array('conditions'=>array('Store.in_store' > 0))));
              $this->set('recentCar',$Store->getRecentBuy());
              $this->set('recentSales',$Store->getRecentSales());
              $this->set('pendingDocs',$Store->getDocPending());
              $this->set('cntAvailable',$Store->getCountAvailable());
              $this->set('cntSalesMonthly',$Store->getSalesMonthly());
              $this->set('cntPendingDocs',count($Store->getDocPending()));

			  $this->set('repSalesByType',$Store->Sale->getSalesRepByType());
			  $date = mktime(0,0,0,date('m')-1,date('d'),date('Y'));
			  $month = date("m",strtotime($date));
			  $this->set('repSalesByTypeLastMonth',$Store->Sale->getSalesRepByType($month));
        
          }
    }

?>
