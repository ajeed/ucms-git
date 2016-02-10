<div class="saleDtls index">
	<h2><?php __('Sale Dtls');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('sales_id');?></th>
			<th><?php echo $this->Paginator->sort('items_id');?></th>
			<th><?php echo $this->Paginator->sort('total_price');?></th>
			<th><?php echo $this->Paginator->sort('remarks');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($saleDtls as $saleDtl):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $saleDtl['SaleDtl']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($saleDtl['Sales']['id'], array('controller' => 'sales', 'action' => 'view', $saleDtl['Sales']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($saleDtl['Items']['id'], array('controller' => 'items', 'action' => 'view', $saleDtl['Items']['id'])); ?>
		</td>
		<td><?php echo $saleDtl['SaleDtl']['total_price']; ?>&nbsp;</td>
		<td><?php echo $saleDtl['SaleDtl']['remarks']; ?>&nbsp;</td>
		<td><?php echo $saleDtl['SaleDtl']['created']; ?>&nbsp;</td>
		<td><?php echo $saleDtl['SaleDtl']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $saleDtl['SaleDtl']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $saleDtl['SaleDtl']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $saleDtl['SaleDtl']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $saleDtl['SaleDtl']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Sale Dtl', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sales', true), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sales', true), array('controller' => 'sales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Items', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>