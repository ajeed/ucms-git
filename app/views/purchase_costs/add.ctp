<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
		<td width="500"><!--  start step-holder -->
		<div id="step-holder">
		<div class="step-no">1</div>
		<div class="step-dark-left"><a href="">Costing <?=$stores['Store']['reg_no']?></a></div>
		<div class="clear"></div>
		</div>
		<?php echo $this->Form->create('PurchaseCost');?>
	<table border="0" cellpadding="0" cellspacing="0" id="id-form">
			<tr>
				<th valign="top">Item:</th>
				<td>
                        <?php echo $this->Form->input('lookup_id',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td></td>
			</tr>
			<tr>
				<th valign="top">Total Amount (RM):</th>
				<td class="noheight">
				<?php echo $this->Form->input('amount',array('label' => false,'class'=>"inp-form")); ?>
				</td>
			<tr>
			<tr>
				<th valign="top">Receipt No:</th>
				<td class="noheight">
				<?php echo $this->Form->input('receipt_no',array('label' => false,'class'=>"inp-form")); ?>
				</td>
			<tr>
			
			<tr>
				<tr>
				<th valign="top">Description:</th>
				<td>
                    <?php echo $this->Form->input('remarks',array('label' => false,'class'=>"form-textarea")); ?>
                </td>
				<td></td>
			</tr>


	</table>
	</tr>
	<tr>
		<td valign="top" align="center" colspan="2">
					  <?php echo $this->Form->hidden('store_id',array('value'=>$stores['Store']['id'])); ?>
                      <?php echo $this->Form->end(array('class' => 'form-submit'));?>
			<input type="reset" value="" class="form-reset" /></td>
		<td></td>
	</tr>
	<tr>
		<td>
    <?php echo $html->image('shared/blank.gif',array('width'=>"695",'height'=>"1",'alt'=>"blank")) ?>
</td>
		<td></td>
	</tr>

</table>

