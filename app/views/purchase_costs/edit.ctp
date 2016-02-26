<div class="purchaseCosts form">
<?php echo $this->Form->create('PurchaseCost');?>
	<fieldset>
 		<legend><?php __('Edit Purchase Cost'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('store_id');
		echo $this->Form->input('lookup_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('remarks');
		echo $this->Form->input('receipt_no');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PurchaseCost.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PurchaseCost.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Purchase Costs', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Stores', true), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store', true), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lookups', true), array('controller' => 'lookups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lookup', true), array('controller' => 'lookups', 'action' => 'add')); ?> </li>
	</ul>
</div>