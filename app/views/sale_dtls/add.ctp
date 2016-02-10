<div class="saleDtls form">
<?php echo $this->Form->create('SaleDtl');?>
	<fieldset>
 		<legend><?php __('Add Sale Dtl'); ?></legend>
	<?php
		echo $this->Form->input('sales_id');
		echo $this->Form->input('items_id');
		echo $this->Form->input('total_price');
		echo $this->Form->input('remarks');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sale Dtls', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Sales', true), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sales', true), array('controller' => 'sales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Items', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>