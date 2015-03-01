<?php
class MyviewsController extends AppController {

	var $name = 'Myview';
	var $uses = 'Store';

	// ...
	// Some code and methods
	// ... 
	function viewPdf() {
		Configure::write('debug',2);
		$this->LogUtil->log();
		$this->Myview->recursive = 1;
		$data = $this->Store->find('all',array('conditions'=>array('Store.in_store'=>1)));
		$this->set('rows',$data);
		$this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 

	}
	// ...
	// Some code and methods
	// ...
}
?>