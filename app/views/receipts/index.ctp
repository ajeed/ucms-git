<div class="receipts index">
	<h2><?php __('Receipts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('lookup_id');?></th>
			<th><?php echo $this->Paginator->sort('stores_id');?></th>
			<th><?php echo $this->Paginator->sort('issuance');?></th>
			<th><?php echo $this->Paginator->sort('issuance_date');?></th>
			<th><?php echo $this->Paginator->sort('remarks');?></th>
			<th><?php echo $this->Paginator->sort('amount');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
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
		<td><?php echo $receipt['Receipt']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($receipt['Lookup']['value'], array('controller' => 'lookups', 'action' => 'view', $receipt['Lookup']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($receipt['Stores']['title'], array('controller' => 'stores', 'action' => 'view', $receipt['Stores']['id'])); ?>
		</td>
		<td><?php echo $receipt['Receipt']['issuance']; ?>&nbsp;</td>
		<td><?php echo $receipt['Receipt']['issuance_date']; ?>&nbsp;</td>
		<td><?php echo $receipt['Receipt']['remarks']; ?>&nbsp;</td>
		<td><?php echo $receipt['Receipt']['amount']; ?>&nbsp;</td>
		<td><?php echo $receipt['Receipt']['created']; ?>&nbsp;</td>
		<td><?php echo $receipt['Receipt']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $receipt['Receipt']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $receipt['Receipt']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $receipt['Receipt']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $receipt['Receipt']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Receipt', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Lookups', true), array('controller' => 'lookups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lookup', true), array('controller' => 'lookups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores', true), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stores', true), array('controller' => 'stores', 'action' => 'add')); ?> </li>
	</ul>
</div>