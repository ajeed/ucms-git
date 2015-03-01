<!-- Start: login-holder -->
<div id="login-holder"><!-- start logo -->
<div id="logo-login"></div>
<!-- end logo -->
<div class="clear"></div>

<!--  start loginbox ................................................................................. -->
<div id="loginbox"><!--  start login-inner -->
<div id="login-inner">
	<?php echo $this->Form->create('User', array('action' => 'change')); ?>
		<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<th></th>
		<td><?php echo $this->Session->flash(); ?></td>
	</tr>
	<tr>
		<th>Username</th>
		<td><?php echo $this->Form->input('username',array('class'=>"login-inp","label"=>false)); ?></td>
	</tr>
	<tr>
		<th>Password</th>
		<td><?php echo $this->Form->input('password',array('class'=>"login-inp","label"=>false));?></td>
	</tr>
	<tr>
		<th>Re-type Password</th>
		<td><?php echo $this->Form->input('retype',array('type'=>'password','class'=>"login-inp","label"=>false));?></td>
	</tr>
	<tr>
		<th></th>
		<td><?php 
		$options = array(
    		'label' => 'Submit','class'=>'submit-login');
		echo $this->Form->end ( $options );
		?>
	</tr>
</table>
</div>
<!--  end login-inner -->
<div class="clear"></div>
</div>
