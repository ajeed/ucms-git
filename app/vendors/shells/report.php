<?php
class ReportShell extends Shell {
	var $uses = array('Sales');
    function main() {

    	$month_ago = date('Y-m-d H:i:s',    strtotime('-1 month'));
    	$sales =    $this->Sales->find("all",array('conditions'=>"Sales.deliver_date >= '$month_ago'"));

    	foreach($sales as $sale) {
            $this->out('Order date:  ' .    $sale['Sales']['deliver_date'] . "\n");
            $this->out('Buyer Phone Noe' .    $sale['Sales']['buyer_tel'] . "\n");
            $this->out('----------------------------------------' .    "\n");

          //  $total += $order['Order']['amount'];
        }

        //Print out total for the selected orders
       // $this->out("Total: $" .    number_format($total, 2) . "\n");
    }
}
