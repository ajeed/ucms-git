<?php
// pr($sales);
// exit;
?>
<div class="sales index">

	<form id="StoreTestSalesForm" method="post" action="/ucms/sales/saleDetails" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>

	<table>
		<tr>
			<td>
				<?php
	 				echo $this->Form->month('rep',date('M'),array('class'=>'styledselect_form_1','style'=>'display: none'));
	 			?>
			</td>
			<td>
				<?php
				echo $this->Form->year('rep',2010,date('Y'),date('Y'),array('class'=>'styledselect_form_1','style'=>'display: none'));
				?>
			</td>
			<td>
			<div class="submit"><input type="submit" value="Submit" class="form-submit"></div></td>
		</tr>
	</table>
	</form>


	<h2><?php __($header);
	?></h2>
	<table cellpadding="0" cellspacing="0" id="product-table">
		<tr>
				<th class="table-header-check">#</th>
	            <th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('Plate No','name');?></th>
	            <th class="table-header-repeat line-left "><?php echo $this->Paginator->sort('Title');?></th>
	            <th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('Purchase Price','price');?></th>
	            <th class="table-header-repeat line-left minwidth-1"><a href="#"><?php echo $this->Paginator->sort('Selling Price','SELLING_PRICE');?></th>
	            <th class="table-header-repeat line-left minwidth-1"><a href="#"><?php echo $this->Paginator->sort('Total Cost','TOTALCOST');?></th>
	            <th class="table-header-repeat line-left minwidth-1"><a href="#"><?php echo $this->Paginator->sort('P&L','salestype_id');?></th>
		</tr>
		<?php
		$count = 0;
		$totalCost = 0;
		$totalSales = 0;
		$totalPurchase = 0;
		$totalPnl = 0;
		foreach ($sales as $sale):
			$count++;
			$class = null;
			
			$pl = number_format($sale['Sale']['SELLING_PRICE'] - ($sale['Stores']['PURCHASE_PRICE'] + $sale[0]['TOTALCOST']), 2, '.', ',');
			$color = ($pl > 0 ) ? "black" : "red";
		?>
				<tr>
					<td><?php echo $count?></td>
					<td>
					<?php echo $this->Html->link($sale['Stores']['reg_no'],array('controller'=>'stores','action'=>'view',$sale['Stores']['id']))?>
					</td>
			        <td><?php echo strtoupper($makes[$sale['Stores']['make_id']] ." ".$mods[$sale['Stores']['mod_id']]." ".$sale['Stores']['title'])?>&nbsp;</td>
					<td><?php echo number_format($sale['Stores']['PURCHASE_PRICE'], 2, '.', ','); ?>&nbsp;</td>
					<td><?php echo number_format($sale['Sale']['SELLING_PRICE'], 2, '.', ','); ?></td>
					<td><?php echo number_format($sale[0]['TOTALCOST'], 2, '.', ','); ?></td>
					<td><?php echo '<span style="color:'.$color.'">'.$pl.'</span>'; ?></td>
				</tr>
		<?php 
		$totalCost += $sale[0]['TOTALCOST'];
		$totalSales += $sale['Sale']['SELLING_PRICE'];
		$totalPurchase += $sale['Stores']['PURCHASE_PRICE'];

		endforeach; ?>
		<tr>
					<td colspan="3">
					TOTAL 
					</td>
			        <td><?php echo "<b>".number_format($totalPurchase, 2, '.', ',')."</b>"; ?></td>
					<td><?php echo "<b>".number_format($totalSales, 2, '.', ',')."</ + $totalPurchase)>"; ?></td>
					<td><?php echo "<b>".number_format($totalCost, 2, '.', ',')."</b>"; ?></td>
					<td><?php echo "<b>".number_format($totalSales-($totalPurchase + $totalCost), 2, '.', ',')."</b>"; ?></td>
				</tr>

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