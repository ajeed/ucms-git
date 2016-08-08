	<div id="page-heading"><h1>User Dashboard</h1></div>

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized">
		<?php echo $this->Html->image('shared/side_shadowleft.jpg',array('width'=>20,'height'=>300))?>
		</th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized">
		<?php echo $this->Html->image('shared/side_shadowright.jpg',array('width'=>20,'height'=>300))?>
		</th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start announcement -->
		<div class="announcement">
			<li>
				Total available  : <b><?php echo $this->Html->link($cntAvailable,array("controller"=>'Stores',"action"=>"index","available"));?></b>
			</li>
			<li>
				Total sales (monthly)  : <b><?php echo $cntSalesMonthly;?></b>
			</li>
			<li>
				Total incomplete document  : <b><?php echo $cntPendingDocs;?></b>
			</li>
		</div>
		<!-- end announcement -->	<!--  start content-table-inner -->
		<div id="content-table-inner">
		
		<table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tr valign="top">
		<td>
		<!--  start related-act-inner -->
	<?php //echo $this->element('report/g_sale_type_monthly');?>
	<!-- end related-act-inner -->
		<table cellspacing="0" cellpadding="0" border="0" width="100%" id="product-table">
					<tbody><tr>
						<th class="table-header-repeat line-left minwidth-1"><a href="">Plat Number</a>	</th>
						<th class="table-header-repeat line-left minwidth-1"><a href="">Type</a></th>
						<th class="table-header-repeat line-left"><a href="">Date Reg/Make</a></th>
						<!--th class="table-header-repeat line-left"><a href="">Selling Price</a></th-->
						<th class="table-header-repeat line-left"><a href="">Status</a></th>
						<th class="table-header-options line-left"><a href="">Date Buy</a></th>
					</tr>
					<?php foreach ($recentCar as $car) : 
							$pending = false;
						if(in_array($car['Store']['id'], $pendingDocs)) : 
							$pending = true;
						endif;
					?>
					<tr class='<?php echo ($pending) ? "alternate-row" : "";?>'>
						<td><?php echo $this->Html->link($car['Store']['reg_no'],array('controller'=>'stores','action'=>'view',$car['Store']['id'])); ?></td>
						<td><?php echo strtoupper($car['Make']['name']) ." ".strtoupper($car['Mod']['name'])." ". strtoupper($car['Store']['title']) .""; ?></td>
						<td><?php echo $car['Store']['year']; ?>&nbsp;</td>
						<!--td><?php echo "MYR " . number_format($car['Store']['price'], 2, '.', ','); ?></td-->
						<td><?php echo ($car['Store']['in_store']) ? "<span class='green'>AVAILABLE</span>" : "<span class='red'>SOLD</span>"; ?>&nbsp;</td>
						<td class="options-width">
						<?php echo date('M jS Y, g:i a', strtotime($car['Store']['date'])); ?></a>
						</td>
					</tr>
					<?php endforeach;?>
	</tbody></table>
		<!-- end id-form  -->

		</td>
		<td>

		<!--  start related-activities -->
		<div id="related-activities">
			
			<!--  start related-act-top -->
			<div id="related-act-top">
			<img src="img/forms/header_related_act.gif" width="271" height="43" alt="" />
			</div>
			<!-- end related-act-top -->
			
			<!--  start related-act-bottom -->
			<div id="related-act-bottom">
			
				<!--  start related-act-inner -->
				<?php echo $this->element('test');?>
				<!-- end related-act-inner -->
				<div class="clear"></div>
			
			</div>
			<!-- end related-act-bottom -->
		
		</div>
		<!-- end related-activities -->

	</td>
	</tr>
	<tr>
	<td>
	<?php echo $this->Html->image('blank.gif',array('width'=>695,'height'=>1))?>
	</td>
	<td></td>
	</tr>
	</table>
	 
	<div class="clear"></div>
	 

	</div>
	<!--  end content-table-inner  -->
	</td>
	<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>









	 





	<div class="clear">&nbsp;</div>