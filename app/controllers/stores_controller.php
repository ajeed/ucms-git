<?php
class StoresController extends AppController {

	var $name = 'Stores';
	var $header = 'List Inventories';
	var $helpers = array('Time');

	
	function beforeFilter() {
		parent::beforeFilter ();
	}

	function index() {
                 //$this->Session->write('flash', array('Success: You have successfully logged in.','notice'));
		$form = $this->params ['form'];
		$this->Store->recursive = 0;
		$this->paginate = array('order'=>'Store.date DESC');
		if (isset ( $form ['search'] ) && ! empty ( $form ['search'] )) {
			if ($form ['type'] == 'make') {
				$this->paginate['conditions']['Make.name LIKE'] = "%" . $form ['search'] . "%";
			}else {
				$this->paginate['conditions']['Store.reg_no LIKE'] = "%" . $form ['search'] . "%";
			}
        }
        $conditions = null;
        if($this->params['pass'][0]==='available') {
        	$this->header = "List Available Cars";
        	$this->LogUtil->log(array('description'=>$this->header));
        	$conditions =  array('Store.in_store'=>1);
        }
		
		$this->set('stores', $this->paginate('Store',$conditions));
		$this->set('pendingDocs',$this->Store->getDocPending());
		$this->set('header',$this->header);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid store', true));
			$this->redirect(array('action' => 'index'));
		}
		$store = $this->Store->read(null, $id);
		$store['Document'] = $this->checkDocument($id);
		$this->set('store', $store);
		$this->Store->Sale->recursive = 1;
		$sale = $this->Store->Sale->find('first',array('conditions'=>array('Sale.stores_id'=>$id)));
		$this->set(compact('sale'));
	}
	

function add() {
		 
		if (!empty($this->data)) {
			//validation
			//Preset data
			$this->data['Store']['year_of_made'] = array_shift($this->data['Store']['year_of_made']);
			$this->data['Store']['year_of_reg'] = array_shift($this->data['Store']['year_of_reg']);
			$this->data['Store']['reg_no'] =  strtoupper(str_replace(" ", "",$this->data['Store']['reg_no']));
			 
			$this->Store->recursive = 0;
			$obj_exist = $this->Store->find('first',
			array('conditions'=>
			array('Store.reg_no'=>$this->data['Store']['reg_no'])));

			
			//If the car is not yet sold, disallowed creating new car in store.
			//TODO : If the car sold, and afha buy again, the process is buying
			//       can be redundant, due to isSold return true.
			 
			
			if($obj_exist > 0) {
				if(!$this->Store->Sale->isSold($obj_exist['Store']['id'])){
					$this->Session->write('flash', array('Error: The car already inside your store.','failure'));
					$this->redirect(array('controller'=>'stores','action' => 'index'));
				}
			}

			$this->Store->create();
			$fileOK = $this->uploadFiles('img/car', $this->data['File']);
			$success = false;
			if(count($fileOK['errors']) < 1) {
				//setFileName
				$this->data['Store']['image'] = $fileOK['file']['name'];
				if ($this->Store->saveAll($this->data) && $fileOK) {
					$this->LogUtil->log(array('description'=>serialize($this->data)));
					$this->Session->write('flash', array('Car details has been saved!','success'));
					$this->redirect(array('controller'=>'stores','action' => 'index'));
				}else {
					$this->LogUtil->log(array('type'=>2,'description'=>serialize($this->data)));
				}
			}
			$this->Session->write('flash', array('Unable to save details has been saved!','failure'));
		}
		$manufactures = $this->Store->Manufacture->find('list',array('order'=>array('Manufacture.make'=>'ASC')));
		$this->set('names', $this->Store->Make->find('list'));
		$this->set(compact('manufactures'));
	}
	function edit($id = null) {
		/**
		 * EDIT function clash dengan search! please check!
		 */
		if (!$id && empty( $this->data )) {
			$this->Session->write ( 'flash', array ('Invalid car details', 'failure' ) );
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data)) {
			if(!empty($this->data['File']['image']['name'])) {
				$fileOK = $this->uploadFiles('img/car', $this->data['File']);
                    $success = false;
                    if(count($fileOK['errors']) < 1) {
                        //setFileName
                        $this->data['Store']['image'] = $fileOK['file']['name'];
                    }
			}
			$this->data ['Store'] ['year_of_made'] = array_shift ( $this->data ['Store'] ['year_of_made'] );
			$this->data ['Store'] ['year_of_reg'] = array_shift ( $this->data ['Store'] ['year_of_reg'] );
			$this->data ['Store'] ['reg_no'] = strtoupper ( str_replace ( " ", "", $this->data ['Store'] ['reg_no'] ) );
			$this->data['Store']['id'] = $id;
			$this->Store->Document->recursive = -1;
			$docs = $this->Store->Document->find('all',array('conditions'=>array('Document.store_id'=>$id)));
			$this->data['Document'][0]['id'] = $docs[0]['Document']['id'];
			$this->Store->Document->recursive = 2;
			if ($this->Store->saveAll($this->data)) {
				$this->LogUtil->log(array('description'=>serialize($this->data)));
				$this->Session->write('flash', array('Success:Car details has been saved','success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->LogUtil->log(array('type'=>2,'description'=>serialize($this->data)));
				$this->Session->write('flash', array('The car could not be saved. Please, try again.','failure'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Store->read(null, $id);
		}
		$manufactures = $this->Store->Manufacture->find('list');
		$stores = $this->Store->findAllById($id);
		$this->set('names', $this->Store->Make->find('list'));
		$this->set('stores',$stores[0]);
		$make = $this->Store->Make->find('first',array('conditions'=>array('id'=>$stores[0]['Store']['make_id'])));
		$this->set('mods',$make['Mod']);
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for store', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Store->delete($id)) {
			$this->LogUtil->log();
			$this->Session->write('flash', array('Car details has been deleted!','success'));
			$this->redirect(array('action'=>'index'));
		}
		$this->LogUtil->log(array('type'=>2,'description'=>serialize($this->data)));
		$this->Session->write('flash', array('Car details was not deleted!','failure'));
		$this->redirect(array('action' => 'index'));
	}

        /**
         * uploads files to the server
         * @params:
         * 		$folder 	= the folder to upload the files e.g. 'img/files'
         * 		$formdata 	= the array containing the form files
         * 		$itemId 	= id of the item (optional) will create a new sub folder
         * @return:
         * 		will return an array with the success of each file upload
         */
    function uploadFiles($folder, $formdata, $itemId = null) {
        // setup dir names absolute and relative
        $folder_url = WWW_ROOT . $folder;
        $rel_url = $folder;

        // create the folder if it does not exist
        if (!is_dir($folder_url)) {
            mkdir($folder_url);
        }

        // if itemId is set create an item folder
        if ($itemId) {
            // set new absolute folder
            $folder_url = WWW_ROOT . $folder . '/' . $itemId;
            // set new relative folder
            $rel_url = $folder . '/' . $itemId;
            // create directory
            if (!is_dir($folder_url)) {
                mkdir($folder_url);
            }
        }

        // list of permitted file types, this is only images but documents can be added
        $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');

        // loop through and deal with the files
        foreach ($formdata as $file) {
            // replace spaces with underscores
            $ext = end(explode('.', $file['name']));
            $filename = uniqid().".".$ext;
            // assume filetype is false
            $typeOK = false;
            // check filetype is ok
            foreach ($permitted as $type) {
                if ($type == $file['type']) {
                    $typeOK = true;
                    break;
                }
            }

            // if file type ok upload the file
            if ($typeOK) {
                // switch based on error code
                switch ($file['error']) {
                    case 0:
                        // check filename already exists
                        if (!file_exists($folder_url . '/' . $filename)) {
                            // create full filename
                            $full_url = $folder_url . '/' . $filename;
                            $url = $rel_url . '/' . $filename;
                            // upload the file
                            $success = move_uploaded_file($file['tmp_name'], $url);
                        } else {
                            // create unique filename and upload file
                            ini_set('date.timezone', 'Europe/London');
                            $now = date('Y-m-d-His');
                            $full_url = $folder_url . '/' . $now . $filename;
                            $url = $rel_url . '/' . $now . $filename;
                            $success = move_uploaded_file($file['tmp_name'], $url);
                        }
                        // if upload was successful
                        if ($success) {
                            // save the url of the file
                            $result['urls'][] = $url;
                            $result['file']['name'] = $filename;
                        } else {
                            $result['errors'][] = "Error uploaded $filename. Please try again.";
                        }
                        break;
                    case 3:
                        // an error occured
                        $result['errors'][] = "Error uploading $filename. Please try again.";
                        break;
                    default:
                        // an error occured
                        $result['errors'][] = "System error uploading $filename. Contact webmaster.";
                        break;
                }
            } elseif ($file['error'] == 4) {
                // no file was selected for upload
                $result['nofiles'][] = "No file Selected";
            } else {
                // unacceptable file type
                $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
            }
        }
        return $result;
    }
    
    function checkDocument($id) {
    	$this->Store->Document->recursive = - 1;
		$doc = $this->Store->Document->find ( 'first', array ('conditions' => array ('Document.store_id' => $id ) ) );
		if ($doc ['Document'] ['grant_ori'] == 0)
			$doc ['Document'] ['incomplete'] [] = "Geran Original";
		if ($doc ['Document'] ['seller_ic'] == 0)
			$doc ['Document'] ['incomplete'] [] = "Salinan IC customer";
		if ($doc ['Document']['auth_letter'] == 0) $doc['Document']['incomplete'][]="Authorization Letter";
    	return $doc;
    }
    

}
?>