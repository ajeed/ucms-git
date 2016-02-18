<div class="receipts index">
	<h2><?php __('Receipts');?></h2>
	<table cellpadding="0" cellspacing="0" id="product-table">
	<tr>
		<th class="table-header-repeat line-left"><?php echo $this->Paginator->sort('Receipt ID','id');?></th>
		<th class="table-header-repeat line-left"><?php echo $this->Paginator->sort('Plate #','stores_id');?></th>
		<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('Items','lookup_id');?></th>
		<th class="table-header-repeat line-left"><?php echo $this->Paginator->sort('Receipent From','receipient');?></th>
		<th class="table-header-repeat line-left"><?php echo $this->Paginator->sort('Receipt Date','receipt_date');?></th>
		<th class="table-header-repeat line-left"><?php echo $this->Paginator->sort('Amount(RM)','amount');?></th>
		<th class="table-header-options line-left"><a href="#"><?php __('Options');?></a></th>
	</tr>
	<?php
	$i = 0;
	foreach ($receipts as $receipt):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
	<td><?php echo $this->Html->link($receipt['Receipt']['id'], array('controller' => 'receipts', 'action' => 'edit', $receipt['Receipt']['id'])); ?></td>
		<td>
			<?php 
			if(!empty($receipt['Store']['reg_no']))
			echo $this->Html->link($receipt['Store']['reg_no'], array('controller' => 'stores', 'action' => 'view', $receipt['Store']['id']));
			else echo "MISC" ?>
		</td>
		<td>
			<?php echo $this->Html->link($receipt['Lookup']['value'], array('controller' => 'lookups', 'action' => 'view', $receipt['Lookup']['id'])); ?>
		</td>

		<td><?php echo $receipt['Receipt']['receipient']; ?>&nbsp;</td>
		<td><?php echo $receipt['Receipt']['receipt_date']; ?>&nbsp;</td>
		<td><?php echo $receipt['Receipt']['amount']; ?>&nbsp;</td>
		<td class="options-width">
			<?php echo $this->Html->link(__('', true), array('action' => 'edit', $receipt['Receipt']['id']),array('class'=>'icon-1 info-tooltip')); ?>
			<?php echo $this->Html->link(__('', true), array('action' => 'delete', $receipt['Receipt']['id']),array('class'=>'icon-2 info-tooltip'), sprintf(__('Are you sure you want to delete payment receipt for # %s?', true), $receipt['Store']['reg_no'])); ?>
			
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Create Receipt', true), array('action' => 'add'),array('class' => 'btn')); ?></li>
		
	</ul>
</div>
