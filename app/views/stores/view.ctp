<div id="padding">
<table align="center" cellspacing="0" id="mytable" width="100%">
  <tbody><tr>
    <th colspan="4" scope="col" class="main"><div align="center">CAR INFORMATION&nbsp;
        <?php 
        	echo $this->Html->link($this->Html->image("edit.png",array('height'=>15,'width'=>15)),array('action'=>'edit',$store['Store']['id']), array('escape' => false));
        ?> 
        </div></th>
  </tr>
  <tr>
    <td width="15%" class="spec" scope="row">REGISTRATION NO&nbsp;</td>
    <td width="35%" class="specrow"><?php echo $store['Store']['reg_no']; ?>&nbsp;</td>
    <td width="15%" class="spec1">MODEL&nbsp;</td>
    <td width="35%" class="specrow"><?php echo strtoupper($store['Make']['name']) . strtoupper($store['Mod']['name']) . " " . strtoupper($store['Store']['title']); ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="specalt" scope="row">YEAR MADE&nbsp;</td>
    <td class="alt"><?php echo $store['Store']['year_of_made']; ?>&nbsp;</td>
    <td class="specalt1">YEAR REGISTER&nbsp;</td>
    <td class="alt"><?php echo $store['Store']['year_of_reg']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="spec" scope="row">OWNER NAME</td>
    <td class="specrow" colspan="3"><?php echo strtoupper($store['Store']['seller_name']); ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="specalt" scope="row">OWNER PHONE NO&nbsp;</td>
    <td class="alt"><?php echo $store['Store']['seller_tel']; ?>&nbsp;</td>
    <td class="specalt1">OWNER IC&nbsp;</td>
    <td class="alt"><?php echo $store['Store']['seller_ic']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="spec" scope="row">BROKER NAME</td>
    <td class="specrow"><?php echo strtoupper($store['Store']['broker_name']); ?>&nbsp;</td>
    <td class="spec1">BROKER PHONE NO&nbsp;</td>
    <td class="specrow"><?php echo $store['Store']['broker_tel']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="specalt" scope="row">WALK-IN&nbsp;</td>
    <td class="alt"><?php echo ($store['Store']['walk_in']) ? "YES" : "NO" ?>&nbsp;</td>
    <td class="specalt1">PRICE&nbsp;</td>
    <td class="alt"><?php echo $this->Number->format($store['Store']['price'],array('places'=>2,'before'=>'MYR')); ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="spec" scope="row">DATE PURCHASED&nbsp;</td>
    <td class="specrow"><?php echo $this->Time->format( $format = 'd-m-Y', $store['Store']['date']); ?>&nbsp;</td>
    <?php
      $role = $this->Session->read('Auth.User.role');
      if($role == 9999) : 
        $pnl = $sale['Sale']['price'] - ($store['Store']['price'] + $purchaseCostsAmt['total_sum']) ;
        $formatedPnL = $this->Number->format($pnl,array('places'=>2,'before'=>'MYR'));
      endif;
     ?>

    <td class="spec1"><?php echo ($role == 9999)?"PROFIT & LOSS" : ""?></td>
    <td class="specrow"><?php echo ($role == 9999)?$formatedPnL : ""?></td>
  </tr>
  <tr>
    <td class="specalt" scope="row">DESCRIPTION&nbsp;</td>
    <td class="alt" colspan="3"><?php echo $store['Store']['remarks']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="spec" scope="row">REMARKS&nbsp;</td>
    <td class="specrow" colspan="3">
    <?php 
		if($store['Document']['Document']['incomplete'] != null) :?>
		<span class="red">DOCUMENT IS NOT COMPLETED</span>
		<br />
		<div id="list5">
		 <ol>
		<?php 
		foreach($store['Document']['Document']['incomplete'] as $doc):
		?>
		      <li><p><em><?php echo $doc;?></em></li>
		<?php endforeach;?>
		 </ol>
		 </div>
		<?php else:?>
		DOCUMENT IS COMPLETE
		<?php endif;?>
	</td>
  </tr>
</tbody></table>
<br />
<br />
<table align="center" cellspacing="0" id="mytable">
  <tbody><tr>
    <th colspan="5" scope="col" class="main"><div align="center">PURCHASING COSTS INCURRED&nbsp;
     <?php 
          echo $this->Html->link($this->Html->image("edit.png",array('height'=>15,'width'=>15)),array('controller'=>'purchaseCosts','action'=>'add',$store['Store']['id']), array('escape' => false));
      ?> 
        </div></th>
  </tr>

  <tr>
    <th width="10%" class="main" scope="row">NO&nbsp;</th>
    <th width="45%" class="main" scope="row">ITEMS&nbsp;</th>
    <th width="15%" class="main" scope="row">RECEIPT NO&nbsp;</th>
    <th width="15%" class="main" scope="row">TOTAL PRICE&nbsp;</th>
    <th width="15%" class="main" scope="row">ACTION&nbsp;</th>
  </tr>
    <?php
    $i = 0;
    $amount = 0;
foreach($purchaseCosts as $cost) :
++$i;
$amount += $cost['PurchaseCost']['amount'];
  ?>

  <tr>
    <td class=<?php echo ($i%2 == 1)?'"spec"' : '"specalt"'?>><?=$i?></td>
    <td class=<?php echo ($i%2 == 1)?'"specrow"' : '"alt"'?> scope="row"><?=strtoupper($cost['Lookup']['value'])?>
    <?php echo ($cost['PurchaseCost']['remarks'] == "") ? "" : "- ".$cost['PurchaseCost']['remarks'] ?></td>
    <td class=<?php echo ($i%2 == 1)?'"specrow"' : '"alt"'?>><?=$cost['PurchaseCost']['receipt_no']?></td>
    <td class=<?php echo ($i%2 == 1)?'"specrow"' : '"alt"'?>><?=$this->Number->format($cost['PurchaseCost']['amount'],array('places'=>2,'before'=>'MYR')); ?></td>
    <td class=<?php echo ($i%2 == 1)?'"specrow"' : '"alt"'?>>
    <?php echo $this->Html->link(__('', true), array('controller'=>'purchaseCosts','action' => 'edit', $cost['PurchaseCost']['id']),array('class'=>'icon-1 info-tooltip')); ?>
      <?php echo $this->Html->link(__('', true), array('controller'=>'purchaseCosts','action' => 'delete', $cost['PurchaseCost']['id']),array('class'=>'icon-2 info-tooltip'), sprintf(__('Are you sure you want to delete # %s?', true), $store['Store']['reg_no'])); ?>
    </td>
    </td>
  </tr>
  <?php endforeach; ?>
  <tr colspan="5" scope="col" class="main"><div align="center">
    <td></td>
    <td></td>
    <td></td>

    <td class=<?php echo ($i%2 == 1)?'"specalt"' : '"spec"'?>><b><u><?=$this->Number->format($amount,array('places'=>2,'before'=>'MYR')); ?></u></b></td>
  </tr>
</tbody></table>

<br />
<?php if($sale) :?>
<table align="center" cellspacing="0" id="mytable">
  <tbody><tr>
    <th colspan="4" scope="col" class="main"><div align="center">SALES INFORMATION&nbsp;
     <?php 
        	echo $this->Html->link($this->Html->image("edit.png",array('height'=>15,'width'=>15)),array('controller'=>'sales','action'=>'edit',$store['Sale'][0]['id']), array('escape' => false));
      ?> 
        </div></th>
  </tr>
  <tr>
    <td width="15%" class="spec" scope="row">SELLING PRICE&nbsp;</td>
    <td width="35%" class="specrow"><?php echo $this->Number->format($sale['Sale']['price'],array('places'=>2,'before'=>'MYR')); ?>&nbsp;</td>
    <td width="15%" class="spec1">BUYER NAME&nbsp;</td>
    <td width="35%" class="specrow"><?php echo strtoupper($sale['Sale']['buyer_name']); ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="specalt" scope="row">DELIVERED DATE&nbsp;</td>
    <td class="alt"><?php echo $this->Time->format("d-m-Y h:m:s",$sale['Sale']['deliver_date']); ?>&nbsp;</td>
    <td class="specalt1">BUYER CONTACT NO&nbsp;</td>
    <td class="alt"><?php echo $sale['Sale']['buyer_tel']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="spec" scope="row">BUYER IC</td>
    <td class="specrow" colspan="3"><?php echo $sale['Sale']['buyer_ic']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="specalt" scope="row">BROKER NAME&nbsp;</td>
    <td class="alt"><?php echo  strtoupper($sale['Sale']['broker_name']); ?>&nbsp;</td>
    <td class="specalt1">BROKER CONTACT NO&nbsp;</td>
    <td class="alt"> <?php echo $sale['Sale']['broker_tel']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="spec" scope="row">SALES TYPE</td>
    <td class="specrow">             <?php echo $sale['Salestype']['name']; ?>&nbsp;</td>
    <td class="spec1">INSURANCE&nbsp;</td>
    <td class="specrow"><?php echo $sale['Sale']['insurance']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td class="specalt" scope="row">REMARKS&nbsp;</td>
    <td class="alt" colspan="3"><?php echo $sale['Sale']['remarks']; ?>&nbsp;</td>
  </tr>
</tbody></table>

<!--Sales Details information -->



<?php endif;?>
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td width="300">
	<!--  start related-activities -->
	<?php 
	if($store['Store']['image'] == '' || $store['Store']['image'] == null) {
			$image = 'no_photo.jpg';
	}
	else {
		$image = 'car/'.$store['Store']['image'];
	}
	?>
		<?php //echo $this->Html->image($image,array('width'=>300))?>
	<!-- end related-activities -->
	</td>
	<td>

	</td>
</tr>
<tr>
<!-- td>
    <?php echo $html->image('shared/blank.gif',array('width'=>"695",'height'=>"1",'alt'=>"blank")) ?>
</td -->
<td></td>
</tr>
</table>
</div>
<div class="clear"></div>

