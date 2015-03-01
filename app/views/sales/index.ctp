<div class="sales index">
	<h2><?php __($header);
	?></h2>
	<table cellpadding="0" cellspacing="0" id="product-table">
	<tr>
            <th class="table-header-check"><a id="toggle-all" ></a></th>
            <th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('Store','store_id');?></th>
            <th class="table-header-repeat line-left minwidth-1"><?php //echo $this->Paginator->sort('Make','name');?></th>
            <th class="table-header-repeat line-left"><?php echo $this->Paginator->sort('delivery_date');?></th>
            <th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('SalesType','salestype_id');?></th>
            <th class="table-header-options line-left"><a href="#"><?php __('Options');?></a></th>
	</tr>
	<?php
	$i = 0;
	
	foreach ($sales as $sale):
		$class = null;
	?>
	<tr>
                <td><input  type="checkbox"/></td>
		<td>
		<?php echo $this->Html->link($sale['Store']['reg_no'],array('controller'=>'stores','action'=>'view',$sale['Store']['id']))?>
		</td>
        <td><?php echo strtoupper($makes[$sale['Store']['make_id']] ." ".$mods[$sale['Store']['mod_id']]." ".$sale['Store']['title'])?>&nbsp;</td>
		<td><?php echo $sale['Sale']['deliver_date']; ?>&nbsp;</td>
		<td><?php echo $sale['Salestype']['name'];?></td>
		<td class="options-width">
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


			<div class="clear"></div>