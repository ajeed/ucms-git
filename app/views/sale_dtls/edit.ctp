<div class="saleDtls form">
<?php echo $this->Form->create('SaleDtl');?>
	<fieldset>
 		<legend><?php __('Edit Sale Dtl'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('sales_id');
		echo $this->Form->input('items_id');
		echo $this->Form->input('total_price');
		echo $this->Form->input('remarks');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<div id="padding">
 <?php 
  echo $this->Form->create('SaleDtl');
  echo $this->Form->input('id');
 ?>

<table align="center" cellspacing="0" id="mytable">
  <tbody><tr>
    <th colspan="3" scope="col" class="main"><div align="center">SALES PRICE BREAKDOWN FOR [PLAT NUMBER]
    </div></th>
  </tr>
  <tr>
    <td width="3%" class="specalt" scope="row">NO&nbsp;</td>
    <td width="45%" class="specalt" scope="row">ITEMS&nbsp;</td>
    <td width="15%" class="specalt" scope="row">AMOUNT</td>
  </tr>
  <?php
  $count = 1;
  foreach($items as $item) :;
  ?>
  <tr>
    <td class="spec"><?=$count++?></td>
    <td class="specrow" scope="row"><?=$item?></td>
    <td class="specrow"><?=$this->Form->input('total_price',array('label' => false,'style'=>'width:100px'));?></td>
  </tr>
  <?php 
  endforeach;
  ?>
  <tr colspan="5" scope="col" class="main"><div align="center">
    <td></td>
    <td align="right">TOTAL AMOUNT</td>
    <td class="spec"><b><u>RM490.00</u></b></td>
  </tr>
 </tbody></table>
 <?php echo $this->Form->end(array('class' => 'form-submit'));?>
 <input type="reset" value="" class="form-reset" />