<?php
    class JobsController extends AppController {

          var $name = 'Jobs';
          var $uses = array();
          
          function beforeRender() {
          }
          
          function smsBlast() {

            $Sale = ClassRegistry::init('Sale');
            $Common = ClassRegistry::init('Common');
            $todays_date = new DateTime();
            $calc_date = $todays_date;
            $thisMonth = $calc_date->format('m');
            $thisDay = $calc_date->format('d');

           
            
            
            $startYear = 2012;


            while ($startYear != $todays_date->format('Y')) {
              
              //Set the start date
              $startDate = $toDate = new DateTime();
              $strDtTo = $toDate->setDate($startYear,$thisMonth,$thisDay)->format('Y-m-d');

              $strDtFrom = $startDate->setDate($startYear,$thisMonth,$thisDay)->modify("-1 weeks")->format('Y-m-d');
              $listRcpt[$startYear] = $Sale->getSalesByRangeDate($strDtFrom,$strDtTo);
              
              $startYear++;

            }
                       
           $campaigns = array();
            $contents = array ();
            if($listRcpt != null) {
              foreach($listRcpt as $years){
                foreach($years as $rcpt) {
                if($rcpt['Sale']['buyer_tel'] != null OR $rcpt['Sale']['buyer_tel'] != "") {
                  $contents['msg'] = $this->content($rcpt['Store']['reg_no']);
                  $contents['phonenumber'] = $rcpt['Sale']['buyer_tel'];
                  $contents['deliverydate'] = $rcpt['Sale']['deliver_date'];
                  pr($contents);
                  array_push($campaigns, $contents);
                }
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
