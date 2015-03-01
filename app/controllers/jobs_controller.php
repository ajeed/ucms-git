<?php
    class JobsController extends AppController {

          var $name = 'Jobs';
          var $uses = array();
          
          function beforeRender() {
          }
          
          function smsBlast() {

            $Sale = ClassRegistry::init('Sale');
            $todays_date = new DateTime();
            $dtFrom = $todays_date->modify("-13 months");
            $strDtFrom = $dtFrom->format('Y-m-d');
            $dtTo = $dtFrom->modify("+1 weeks");

            //List all sales where 
            // Deliver month - 1
            // Year - 1
           
            $strDtTo = $dtTo->format('Y-m-d');


            $listRcpt = $Sale->getSalesByRangeDate($strDtFrom,$strDtTo);
            
           $campaigns = array();
            $contents = array ();
            if($listRcpt != null) {
              foreach($listRcpt as $rcpt) {
                if($rcpt['Sale']['buyer_tel'] != null OR $rcpt['Sale']['buyer_tel'] != "") {
                  $contents['msg'] = $this->content($rcpt['Store']['reg_no']);
                  $contents['phonenumber'] = $rcpt['Sale']['buyer_tel'];
                  $contents['deliverydate'] = 
                  array_push($campaigns, $contents);
                }
              }
            }

            return ($this->set('contents',$campaigns));
           
          }

          private function content ($platNumber) {

            $strContent = $platNumber.'-Insuran anda hampir tamat tempoh.Sila kunjungi atau hubungi SilverSpeed utk proses pembaharuan 03-89223958/0123761140.Beroperasi 7 hari seminggu';

             return($strContent);
          }

          function test() {
            smsBlast();
          }

          function constructMsg($listRcpt) {
            
          }
    }

?>
