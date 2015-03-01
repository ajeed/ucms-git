<STYLE type="text/css">
	.tableTd {
	   	border-width: 0.5pt; 
		border: solid; 
	}
	.tableTdContent{
		border-width: 0.5pt; 
		border: solid;
	}
	#titles{
		font-weight: bolder;
	}
   
</STYLE>
<table>
	<tr>
		<td><b>List of all cars available in Afha<b></td>
	</tr>
	<tr>
		<td><b>Date:</b></td>
		<td><?php echo date("F j, Y, g:i a"); ?></td>
	</tr>
	<tr>
		<td><b>Number of cars:</b></td>
		<td style="text-align:left"><?php echo count($rows);?></td>
	</tr>
	<tr>
		<td></td>
	</tr>
		<tr id="titles">
			<td class="tableTd">Title</td>
			<td class="tableTd">Year</td>
			<td class="tableTd">Buying Price</td>
			<td class="tableTd">Reg No</td>
			<td class="tableTd">Date</td>
			
		</tr>		
		<?php 
		$i = 0;
		foreach($rows as $row):
			echo '<tr>';
			echo '<td class="tableTdContent">'.strtoupper($row['Make']['name']). " " .strtoupper($row['Mod']['name']). " " . strtoupper($row['Store']['title']).'</td>';
			echo '<td class="tableTdContent">'.$row['Store']['year'].'</td>';
			echo '<td class="tableTdContent">'.$this->Number->format($row['Store']['price'], array('places'=>2,'before'=>'MYR','decimals'=>'.','thousands'=>',')).'</td>';
			echo '<td class="tableTdContent">'.$row['Store']['reg_no'].'</td>';
			echo '<td class="tableTdContent">'.date('Y-m-d',strtotime($row['Store']['date'])).'</td>';
			echo '</tr>';
			endforeach;
		?>
</table>

