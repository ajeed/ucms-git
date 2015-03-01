
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
		<td width="500"><!--  start step-holder -->
		<div id="step-holder">
		<div class="step-no">1</div>
		<div class="step-dark-left"><a href="">Sales details</a></div>
		<div class="step-dark-right">&nbsp;</div>

		<div class="clear"></div>
		</div>
		<!--  end step-holder --> <!-- start id-form -->
                <?php echo $this->Form->create(null,array('url' => '/sales/add'));
                echo $this->Form->input('stores_id',array('type'=>'hidden','value'=>$stores['Store']['id']));
                ?>
                
		<table border="0" cellpadding="0" cellspacing="0" id="id-form">
			<tr>
				<th valign="top">Buyer Name:</th>
				<td>
                        <?php echo $this->Form->input('buyer_name',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td></td>
			</tr>
			<tr>
				<th valign="top">Buyer Contact No:</th>
				<td>
                        <?php echo $this->Form->input('buyer_tel',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td></td>
			</tr>
			<tr>
				<th valign="top">Buyer IC No:</th>
				<td>
                        <?php echo $this->Form->input('buyer_ic',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td></td>
			</tr>
			<tr>
				<th valign="top">Broker Name:</th>
				<td>
                        <?php echo $this->Form->input('broker_name',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td></td>
			</tr>
			<tr>
				<th valign="top">Broker Contact No:</th>
				<td>
                        <?php echo $this->Form->input('broker_tel',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td></td>
			</tr>
			
			<tr>
				<th valign="top">Date process:</th>
				<td>
                        <?php echo $this->Form->input('date',array('label' => false)); ?>
                        </td>
				<td></td>
			</tr>
			
			<tr>
				<th valign="top">Delivery Date:</th>
				<td>
                        <?php echo $this->Form->input('deliver_date',array('label' => false)); ?>
                        </td>
				<td></td>
			</tr>
			
			
			<tr>
				<th valign="top">Sales type:</th>
				<td>
                        <?php echo $this->Form->input('salestype_id',array('label' => false,'type'=>'select')); ?>
                        </td>
				<td></td>
			</tr>
			<tr>
				<th valign="top">Insurance:</th>
				<td>
                        <?php echo $this->Form->input('insurance',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td></td>
			</tr>
			<tr>
				<th valign="top">Remarks:</th>
				<td>
                        <?php echo $this->Form->input('remarks',array('label' => false,'class'=>"inp-form")); ?>
                        </td>
				<td></td>
			</tr>

		</table>

		<!-- end id-form  --></td>
		<td><!--  start related-activities -->
		</td>
	</tr>
	<tr>
		<td valign="top" align="center" colspan="2">
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

<div class="clear"></div>