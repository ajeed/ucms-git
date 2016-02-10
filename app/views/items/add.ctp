<div class="items form">
<?php echo $this->Form->create('Item');?>
	<fieldset>
 		<legend><?php __('Add Item'); ?></legend>
	<?php
		echo $this->Form->input('value');
		echo $this->Form->input('ppu');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Items', true), array('action' => 'index'));?></li>
	</ul>
</div>