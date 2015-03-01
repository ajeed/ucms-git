<div id="centre1">
			<!--table cellspacing=0 cellpadding=0>
			<?php foreach ($types as $type) : ?>
				<tr>
					<td><?php echo $type['Type']['fullname']; ?></td><td><?php echo $html->link(__('Answer', true), array('action' => 'view', $type['Type']['id'])); ?></td>
				</tr>
			<?php endforeach; ?>
			</table-->
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		      <tr>
		        <td rowspan="5"><?=$html->image('centre1.png',array('alt'=>'hescar','width'=>76,'height'=>321))?></td>
		        <td><?=$html->image('centre3.png',array('width'=>618,'height'=>42))?></td>
		        <td rowspan="5"><?=$html->image('centre2.png',array('width'=>68,'height'=>321))?></td>
		      </tr>
		      <tr>
		        <td>
		        <?=
		        $html->link($html->image(
										'button01.png',
										array('name'=>"Image8",
										'width'=>"618",
										'height'=>"85",
										'border'=>"0",
										'onmouseover'=>"MM_swapImage('Image8','','".$html->webroot."/img/button01effect.png',1)",
										'onmouseout'=>"MM_swapImgRestore()",
										'id'=>"Image8")),
										'/types/view/1',
										array('escape'=>false));?>
		      </tr>
		      <tr>
		        <td>
		        <?=
		        $html->link($html->image(
										'button02.png',
										array('name'=>"Image9",
										'width'=>"618",
										'height'=>"51",
										'border'=>"0",
										'onmouseover'=>"MM_swapImage('Image9','','".$html->webroot."/img/button02effect.png',1)",
										'onmouseout'=>"MM_swapImgRestore()",
										'id'=>"Image9")),
										'#',
										array('escape'=>false));?>
		      </tr>
		      <tr>
		        <td>
		        <?=
		        $html->link($html->image(
										'button3.png',
										array('name'=>"Image10",
										'width'=>"618",
										'height'=>"95",
										'border'=>"0",
										'onmouseover'=>"MM_swapImage('Image10','','".$html->webroot."/img/button3effect.png',1)",
										'onmouseout'=>"MM_swapImgRestore()",
										'id'=>"Image10")),
										'#',
										array('escape'=>false));?>
		      </tr>
		      <tr>
		        <td><?= $html->image('centre4.png',array('width'=>618,'height'=>48))?>
		       </td>
		      </tr>
		    </table>
</div>
<div id="bottom"><?=$html->image('buttom.png')?></div>

