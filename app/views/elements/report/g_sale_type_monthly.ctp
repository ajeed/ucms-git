    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Task');
        data.addColumn('number', 'Hours per Day');
        data.addRows(<?php echo count($repSalesByType);?>);
        <?php 
        $i = 0;
        foreach ($repSalesByType as $k=>$v) : 
        ?>
        data.setValue(<?php echo $i?>, 0,'<?php echo $k ?>');
        data.setValue(<?php echo $i?>, 1, <?php echo $v ?>);
        <?php 
        $i++;
        endforeach;?>

        
        var dataLastMonth = new google.visualization.DataTable();
        dataLastMonth.addColumn('string', 'Task');
        dataLastMonth.addColumn('number', 'Hours per Day');
        dataLastMonth.addRows(<?php echo count($repSalesByTypeLastMonth);?>);
        <?php 
        $i = 0;
        foreach ($repSalesByTypeLastMonth as $k=>$v) : 
        ?>
        dataLastMonth.setValue(<?php echo $i?>, 0,'<?php echo $k ?>');
        dataLastMonth.setValue(<?php echo $i?>, 1, <?php echo $v ?>);
        <?php 
        $i++;
        endforeach;?>

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 450, height: 300, title: 'Types of sales for this month'});
        
        var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
        chart.draw(dataLastMonth, {width: 450, height: 300, title: 'Types of sales for last month'});
				
      }
    </script>
    <table><tr><td><div id="chart_div"></div></td><td><div id="chart_div1"></div></td></tr></table>
    
	
    