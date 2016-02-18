<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?>
<?php echo $javascript->link('jquery-1.4.2.min');?>
<title>
        <?php __('Afha Used Car Management System : '); ?>
        <?php echo $title_for_layout; ?>
</title>
<?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('screen');
		echo $this->Html->css('table');

        echo $scripts_for_layout;
 ?>
<!--[if IE]>
<?php echo $this->Html->css('pro_dropline_ie'); ?>
<![endif]-->

<!--  jquery core -->
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/jquery-1.4.1.min.js') ?>"></script>

<!--  checkbox styling script -->
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/ui.core.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/ui.checkbox.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/jquery.bind.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/jquery.bind.js') ?>"></script>

<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/jquery.selectbox-0.5.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>


<![endif]>

<!--  styled select box script version 2 -->
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/jquery.selectbox-0.5_style_2.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 -->
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/jquery.selectbox-0.5_style_2.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script -->
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/jquery.filestyle.js') ?>"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({
          image: "../img/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/custom_jquery.js') ?>"></script>

<!-- Tooltips -->
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/jquery.tooltip.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/jquery.dimensions.js') ?>"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true,
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script>


<!--  date picker script -->
<?php echo $this->Html->css('datePicker');?>
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/date.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/jquery.datePicker.js') ?>"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);

var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script type="text/javascript" src="<?php echo $this->Html->url('/js/jquery/jquery.pngFix.pack.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>

<?php 
if($this->params['controller'] == 'reports') :
	echo $this->Html->css('report');
endif;?>

</head>
<body>
<!-- Start: page-top-outer -->
<?php echo $this->element('header'); ?>
<!-- End: page-top-outer -->

<div class="clear">&nbsp;</div>
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat">
<!--  start nav-outer -->
<div class="nav-outer">

		<!-- start nav-right -->
		<div id="nav-right">

			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><?=$this->Html->image('shared/nav/nav_myaccount.gif',array('width'=>93,'height'=>14))?></div>
			<div class="nav-divider">&nbsp;</div>
			<?php echo $this->Html->link($this->Html->image('shared/nav/nav_logout.gif'),array('controller'=>'users','action'=>'logout'),array('escape'=>false,'width'=>64,'height'=>14,'id'=>'logout'));?>
			<div class="clear">&nbsp;</div>

			<!--  start account-content -->
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Sales details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Report & Statistics</a>
			</div>
			</div>
			<!--  end account-content -->

		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		<ul class="<?php echo($title_for_layout == 'Dashboard') ? "current" : "select" ?>"><li><a href="<?php echo $this->base?>"><b>Dashboard</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!-- div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Dashboard Details 1</a></li>
				<li><a href="#nogo">Dashboard Details 2</a></li>
				<li><a href="#nogo">Dashboard Details 3</a></li>
			</ul>
		</div-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>

		<ul class="<?php echo($title_for_layout == 'Store') ? "current" : "select" ?>"><li><a href="#nogo"><b>Inventory</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub show">
			<ul class="sub">
				<li><?php echo $this->Html->link("View available",array('controller'=>'stores','action'=>'index','available'))?></li>
				<li><?php echo $this->Html->link("View all cars",array('controller'=>'stores','action'=>'index'))?></li>
				<li class="sub_show"><?php echo $this->Html->link("Add car",array('controller'=>'stores','action'=>'add'))?></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>

		<ul class="<?php echo($title_for_layout == 'Sales') ? "current" : "select" ?>"><li><a href="#nogo"><b>Sales</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><?php echo $this->Html->link("Sales Details",array('controller'=>'sales','action'=>'index'))?></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>

		<ul class="<?php echo($title_for_layout == 'Report') ? "current" : "select" ?>"><li><a href="<?php echo $this->base . "/reports/"?>"><b>Reports</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!-- div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Dashboard Details 1</a></li>
				<li><a href="#nogo">Dashboard Details 2</a></li>
				<li><a href="#nogo">Dashboard Details 3</a></li>
			</ul>
		</div-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<div class="nav-divider">&nbsp;</div>

		<!-- Start of Cash Flow -->
		<ul class="<?php echo($title_for_layout == 'Store') ? "current" : "select" ?>"><li><a href="#nogo"><b>Cash Flow</b><!--[if IE 7]><!--></a><!--<![endif]-->
				<!--[if lte IE 6]><table><tr><td><![endif]-->
				<div class="select_sub show">
					<ul class="sub">
						<li><?php echo $this->Html->link("Vouchers",array('controller'=>'vouchers','action'=>'index','available'))?></li>
						<li><?php echo $this->Html->link("Receipt",array('controller'=>'receipts','action'=>'index'))?></li>
					</ul>
				</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>

		<!-- End of Cash Flow -->
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>

<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1></h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized">
                    <?php echo $this->Html->image('shared/side_shadowleft.jpg',array('width'=>20,'height'=>300));?>
                </th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized">
                    <?php echo $this->Html->image('shared/side_shadowright.jpg',array('width'=>20,'height'=>300));?>
                </th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
                <?php echo $this->Message->flash(); ?>
			<!--  start table-content  -->
			<div id="table-content">
                               <!--  start message -->
                             
				<!--  end message -->


				<!--  start product-table ..................................................................................... -->
                                <?php echo $content_for_layout; ?>
				<!--  end product-table................................... -->
			</div>
			<!--  end content-table  -->

			

		</div>
		<!--  end content-table-inner ............................................END  -->
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

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->
<div class="clear">&nbsp;</div>

<!-- start footer -->
<div id="footer">
	<!--  start footer-left -->
	<div id="footer-left">
	<?php echo $this->element('sql_dump'); ?>
	Cilok by Ajeed!. <span id="spanYear"></span> <a href=""></a>. All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
</body>
</html>