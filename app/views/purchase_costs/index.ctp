<div class="purchaseCosts index">
	<h2><?php __('Purchase Costs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('store_id');?></th>
			<th><?php echo $this->Paginator->sort('lookup_id');?></th>
			<th><?php echo $this->Paginator->sort('amount');?></th>
			<th><?php echo $this->Paginator->sort('remarks');?></th>
			<th><?php echo $this->Paginator->sort('receipt_no');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($purchaseCosts as $purchaseCost):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $purchaseCost['PurchaseCost']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($purchaseCost['Store']['reg_no'], array('controller' => 'stores', 'action' => 'view', $purchaseCost['Store']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchaseCost['Lookup']['value'], array('controller' => 'lookups', 'action' => 'view', $purchaseCost['Lookup']['id'])); ?>
		</td>
		<td><?php echo $purchaseCost['PurchaseCost']['amount']; ?>&nbsp;</td>
		<td><?php echo $purchaseCost['PurchaseCost']['remarks']; ?>&nbsp;</td>
		<td><?php echo $purchaseCost['PurchaseCost']['receipt_no']; ?>&nbsp;</td>
		<td><?php echo $purchaseCost['PurchaseCost']['created']; ?>&nbsp;</td>
		<td><?php echo $purchaseCost['PurchaseCost']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $purchaseCost['PurchaseCost']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $purchaseCost['PurchaseCost']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $purchaseCost['PurchaseCost']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $purchaseCost['PurchaseCost']['id'])); ?>
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
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Purchase Cost', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Stores', true), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store', true), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lookups', true), array('controller' => 'lookups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lookup', true), array('controller' => 'lookups', 'action' => 'add')); ?> </li>
	</ul>
</div>