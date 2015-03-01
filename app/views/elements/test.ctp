<div id="related-act-inner">
			
				<div class="left"><a href=""><?php echo $this->Html->image('forms/icon_plus.gif',array('width'=>21,'height'))?>
				</a></div>
				<div class="right">
					<h5>New Car Comes In!</h5>
					User to complete the form to add new car
					<ul class="greyarrow">
						<li><?php echo $this->Html->link('Add new entry here',array('controller'=>'stores','action'=>'add'))?></li> 
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				
				<div class="left"><a href=""><?php echo $this->Html->image('forms/icon_plus.gif',array('width'=>21,'height'))?>
				</a></div>
				<div class="right">
					<h5>Report</h5>
					Get latest available car in your store
					<ul class="greyarrow">
						<li><?php echo $this->Html->link('Available car',array('controller'=>'myviews','action'=>'viewPdf'),array('target' => '_blank'))?></li> 
					</ul>
				</div>
				
				<div class="clear"></div>
				<div class="lines-dotted-short"></div>
				
<!--				<div class="left"><a href=""><img src="images/forms/icon_minus.gif" width="21" height="21" alt="" /></a></div>-->
<!--				<div class="right">-->
<!--					<h5>Pending documents :</h5>-->
<!--					Car listed below is pending for some documents.-->
<!--					<ul class="greyarrow">-->
<!--						<li><a href="">Click here to visit</a></li> -->
<!--						<li><a href="">Click here to visit</a> </li>-->
<!--					</ul>-->
<!--				</div>-->
<!--				-->
<!--				<div class="clear"></div>-->
<!--				<div class="lines-dotted-short"></div>-->
				
				<div class="left"></div>
				<div class="right">
					<h5>Latest sales car :</h5>
				
					<ul class="greyarrow">
						<?php foreach($recentSales as $sale) : ?>
						<li><?php echo $this->Html->link($sale['Store']['reg_no'],array('controller'=>'stores','action'=>'view',$sale['Store']['id']))?></li> 
						<?php endforeach;?>
					</ul>
				</div>
				<div class="clear"></div>
				
			</div>