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

        echo $scripts_for_layout;
 ?>
<!--[if IE]>
<?php echo $this->Html->css('pro_dropline_ie'); ?>
<![endif]-->

</head>
<body id="login-bg"> 
 <?php echo $content_for_layout; ?>
</body>
</html>