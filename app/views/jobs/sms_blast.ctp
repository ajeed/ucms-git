
<table cellspacing="0" cellpadding="0" border="0" width="50%" id="product-table">
	<?php
	foreach ($contents as $content) :
echo "<tr>";
echo "<td>";
echo "<h2>Sending to</h2>" . $content['phonenumber'];
echo "<br />";
echo "<h2>Message : </h2>" . $content['msg'];
echo "<br />";
echo "</td>";
echo "</tr>";
endforeach;
?>
</table>




