
<div class="stores index">
	<h2><?php __($header);
	?></h2>
	<table cellpadding="0" cellspacing="0" id="product-table">
	<tr>
            <th class="table-header-check"><a id="toggle-all" ></a></th>
            <th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('reg_no');?></th>
            <th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('Model','manufacture_id');?></th>
            <th class="table-header-repeat line-left"><?php echo $this->Paginator->sort('Year','year_of_made');?></th>
            <th class="table-header-repeat line-left"><?php echo $this->Paginator->sort('Selling Price','price');?></th>
            <th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('In Stock','in_store');?></th>
            <th class="table-header-options line-left"><a href="#"><?php __('Options');?></a></th>
	</tr>
	<?php
	$i = 0;
	foreach ($stores as $store):
		$class = null;
		$pending = false;
		if(in_array($store['Store']['id'], $pendingDocs)) : 
			$pending = true;
		endif;
	?>
	<tr class='<?php echo ($pending) ? "alternate-row" : "";?>'>
                <td><input  type="checkbox"/></td>
		<td>
		<?php echo $this->Html->link($store['Store']['reg_no'],array('action'=>'view',$store['Store']['id']))?>
		</td>
       <!-- <td><?php echo $store['Manufacture']['make'] ." ".$store['Manufacture']['model']." (".(($store['Manufacture']['trans']) ? "MT" : "AT") .")"; ?>&nbsp;</td> -->
       <td><?php echo strtoupper($store['Make']['name'] ." ".$store['Mod']['name']." ".$store['Store']['title'])?>&nbsp;</td>
		<td><?php echo $store['Store']['year']; ?>&nbsp;</td>
		<td><?php echo "MYR " . number_format($store['Store']['price'], 2, '.', ','); ?>&nbsp;</td>
                <td><?php echo ($store['Store']['in_store']) ? "<span class='green'>AVAILABLE</span>" : "<span class='red'>SOLD</span>"; ?>&nbsp;</td>
		<td class="options-width">
		<?php if($store['Store']['in_store']) :?>
			<?php echo $this->Html->link(__('', true), array('controller'=>'sales','action' => 'process', $store['Store']['id']),array('class'=>'icon-4 info-tooltip')); ?>
		<?php endif;?>
			<?php echo $this->Html->link(__('', true), array('action' => 'edit', $store['Store']['id']),array('class'=>'icon-1 info-tooltip')); ?>
			<?php echo $this->Html->link(__('', true), array('action' => 'delete', $store['Store']['id']),array('class'=>'icon-2 info-tooltip'), sprintf(__('Are you sure you want to delete # %s?', true), $store['Store']['reg_no'])); ?>
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
<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->

			<!--  start paging..................................................... -->
<!--			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">-->
<!--			<tr>-->
<!--			<td>-->
<!--				<a href="" class="page-far-left"></a>-->
<!--				<a href="" class="page-left"></a>-->
<!--				<div id="page-info">Page <strong>1</strong> / 15</div>-->
<!--				<a href="" class="page-right"></a>-->
<!--				<a href="" class="page-far-right"></a>-->
<!--			</td>-->
<!--			<td>-->
<!--			<select  class="styledselect_pages">-->
<!--				<option value="">Number of rows</option>-->
<!--				<option value="">1</option>-->
<!--				<option value="">2</option>-->
<!--				<option value="">3</option>-->
<!--			</select>-->
<!--			</td>-->
<!--			</tr>-->
<!--			</table>-->
			<!--  end paging................ -->

			<div class="clear"></div>