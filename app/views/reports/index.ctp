<div class="reports index">
<h2><?php __($header);
	?></h2>
	
<div class="standard-block" style="width:800px;margin-bottom:20px;" align="center">
<h2>Summary Report for <?php echo $month?>,<?php echo $year?></h2>
<table cellspacing="0" cellpadding="10">
 <tr>
 	<td style="padding:15px"><table class="standard-table">
	<tr><td><h3>Total sale for this month</h3></td><td><?php echo $totalSale;?></td></tr>
	<tr><td><h3>Total buy-in for this month</h3></td><td><?php echo $totalBuy;?></td></tr>
	<tr><td><h3>Current Available</h3></td><td><?php echo $current;?></td></tr>
	</table></td>
 	<td style="padding:15px"><?php echo $this->Html->image("chart.png")?></td>
 </tr>
</table>

</div>


<div class="standard-block" style="width:800px;margin-bottom:20px;" align="center">
<h2>Summary report sales per month for <?php echo $year?></h2>
<table cellspacing="0" cellpadding="10">
 <tr>
 	<td style="padding:15px">
		<table cellspacing="0" cellpadding="0" class="standard-table">
		<thead>
		<tr><th>Month</th><th>Total</th></tr>
		</thead>
		<?php foreach($repSalesHistory as $month=>$total) : ?>
		<tr><td><?php echo date('F', mktime(0,0,0,$month,1))?></td><td><?php echo $total?></td></tr>
		<?php endforeach;?>
		</table>
	</td>
 	<td style="padding:15px"><?php echo $this->Html->image("chart.png")?></td>
 </tr>
</table>
</div>

<div class="standard-block" style="width:800px;margin-bottom:20px;" align="center">
<h2>Summary report buy-in per month for <?php echo $year?></h2>
<table cellspacing="0" cellpadding="10">
 <tr>
 	<td style="padding:15px">
		<table cellspacing="0" cellpadding="0" class="standard-table">
			<thead>
				<tr><th>Month</th><th>Total</th></tr>
			</thead>
			<?php foreach($repBuyHistory as $month=>$total) : ?>
			<tr><td><?php echo date('F', mktime(0,0,0,$month,1))?></td><td><?php echo $total?></td></tr>
			<?php endforeach;?>
		</table>
	</td>
 	<td style="padding:15px"><?php echo $this->Html->image("chart.png")?></td>
 </tr>
</table>
</div>

<div class="standard-block" style="width:800px;margin-bottom:20px;" align="center">
<h2>Summary report sales type</h2>
<table cellspacing="0" cellpadding="10">
 <tr>
 	<td style="padding:15px">
		<table cellspacing="0" cellpadding="0" class="standard-table">
			<thead>
				<tr><th>Type</th><th>Total</th></tr>
			</thead>
			<?php foreach($repSalesByType as $type=>$total) : ?>
			<tr><td><?php echo $type ?></td><td><?php echo $total?></td></tr>
			<?php endforeach;?>
		</table>
	</td>
 	<td style="padding:15px"><?php echo $this->Html->image("chart.png")?></td>
 </tr>
</table>
</div>

<div class="standard-block" style="width:800px;margin-bottom:20px;" align="center">
<h2>Summary report buy-in type per month</h2>
<table cellspacing="0" cellpadding="10">
 <tr>
 	<td style="padding:15px">
		<table cellspacing="0" cellpadding="0" class="standard-table">
			<thead>
				<tr><th>Type</th><th>Total</th></tr>
			</thead>
			<?php foreach($repBuyByType as $type=>$total) : ?>
			<tr><td><?php echo $type ?></td><td><?php echo $total?></td></tr>
			<?php endforeach;?>
		</table>
	</td>
 	<td style="padding:15px"><?php echo $this->Html->image("chart.png")?></td>
 </tr>
</table>
</div>

