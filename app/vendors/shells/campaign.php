<?php
class CampaignShell extends Shell {

	public $tasks = array('Sms');


    function main() {
        $this->out('Use the command: cake foo sendTestMail');
    }


    function blastCampaignSms() {
        $campaigns = $this->insuranceCampaign();
        foreach($campaigns as $campaign) {
           $msg = $campaign['msg'];
           $phonenumber = self::filterPhoneNumber($campaign['phonenumber']);
           $response = $this->Sms->send($phonenumber,$msg);
           if($response == "" || $response = '2000') {
            echo "success";
           }else {
            echo "failed >>" . $response;
           }
        }
       

    }

    private function insuranceCampaign() {
        $Sale = ClassRegistry::init('Sale');
        $Sale = ClassRegistry::init('Sale');
        $Common = ClassRegistry::init('Common');
        $todays_date = new DateTime();
        $calc_date = $todays_date;
        $thisMonth = $calc_date->format('m');
        $thisDay = $calc_date->format('d');
        $lastMonth = $calc_date->modify("-1 months")->format('m');

        $startYear = 2012;


        while ($startYear != $todays_date->format('Y')) {
          
          //Set the start date
          $startDate = $toDate = new DateTime();
          $strDtTo = $toDate->setDate($startYear,$lastMonth,$thisDay)->format('Y-m-d');

          $strDtFrom = $startDate->setDate($startYear,$lastMonth,$thisDay)->modify("-1 weeks")->format('Y-m-d');
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
              array_push($campaigns, $contents);
            }
          }

          }
        }

        return $campaigns;
    }

     private function content ($platNumber) {

        $strContent = $platNumber.'-Insuran anda hampir tamat tempoh.Sila kunjungi atau hubungi SilverSpeed utk proses pembaharuan 03-87361140/012-3761140.Beroperasi 7 hari seminggu';

         return($strContent);
      }

      private function filterPhoneNumber($number) {

            return $number;
      }

}
