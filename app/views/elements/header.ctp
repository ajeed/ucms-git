<!-- Start: page-top-outer -->
<div id="page-top-outer">

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<?php 
echo $this->Html->link(
   	$this->Html->image('shared/logo.png',array('width'=>156,'height'=>40)),
    array('controller'=>'/'),
    array('escape' => false)
);

?>

	</div>
	<!-- end logo -->

	<!--  start top-search -->
	<div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td>
		<?php echo $this->Form->create(null, array('url' => '/stores/index')); ?>
		<input type="text" value="Search" name="search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		<select name="type" class="styledselect">
			<option value="plat"> Plat Number</option>
			<option value="make"> Manufactures</option>
<!--			<option value=""> Categories</option>-->
<!--			<option value="">Clients</option>-->
<!--			<option value="">News</option>-->
		</select>
		</td>
		<td>
                <?php
                $options = array('div'=>false,'name' => 'save');
                echo $form->end('shared/top_search_btn.gif',$options);
                ?>
		</td>
		</tr>
		</table>
	</div>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->