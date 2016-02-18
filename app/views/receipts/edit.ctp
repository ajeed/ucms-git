

<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
		<td width="500"><!--  start step-holder -->
		<div id="step-holder">
		<div class="step-no">1</div>
		<div class="step-dark-left"><a href="">Edit Receipt</a></div>
		<div class="clear"></div>
		</div>
<?php echo $this->Form->create('Receipt');?>
	<table border="0" cellpadding="0" cellspacing="0" id="id-form">
			<tr>
				<th valign="top">Item:</th>
				<td>
                        <?php echo $this->Form->input('lookup_id',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td></td>
			</tr>
			<tr>
				<th valign="top">Car Plate # :</th>
				<td>
				<div class="input select">

					<select id="combobox" name="data[Receipt][stores_id]" class="inp-form">
						<option value="" selected="selected">Select One</option>
						<option value="">N/A</option>
						<?php foreach ($stores as $k=>$v) : ?>
						<option value="<?=$k?>"><?=strtoupper($v)?>
						</option>
						<?php endforeach;?>
					</select>
				</div>
               </td>
				<td></td>
			</tr>
			<tr>
				<th valign="top">Receipt From: </th>
				<td>
                           <?php echo $this->Form->input('receipient',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td><!--div class="error-left"></div>
			<div class="error-inner">This field is required.</div--></td>
			</tr>

			<tr>
				<th valign="top">Total Amount (RM):</th>
				<td class="noheight">
				<?php echo $this->Form->input('amount',array('label' => false,'class'=>"inp-form")); ?>
				</td>
			<tr>
			<tr>
				<th valign="top">Select date of receipt:</th>
				<td class="noheight">
				<?php echo $this->Form->input('receipt_date',array('label' => false)); ?>
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
                      <?php echo $this->Form->end(array('class' => 'form-submit'));?>
		<?php
		echo $this->Html->link('','/receipts/index',array('class' => 'form-cancel'));
		?>
		</td>
		<td></td>
	</tr>
	<tr>
		<td>
    <?php echo $html->image('shared/blank.gif',array('width'=>"695",'height'=>"1",'alt'=>"blank")) ?>
</td>
		<td></td>
	</tr>

</table>

