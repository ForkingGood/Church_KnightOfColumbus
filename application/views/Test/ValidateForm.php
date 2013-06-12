<html>
<head>
<title>My Form</title>
<style>
	.error {
		color: red;
	}
</style>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('Test/validateThis'); ?>

<h5>Username</h5>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
<?php echo form_error('username'); ?>

<h5>Password</h5>
<input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" />
<?php echo form_error('password'); ?>

<h5>Password Confirm</h5>
<input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />
<?php echo form_error('passconf'); ?>

<h5>Email Address</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />
<?php echo form_error('email'); ?>

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>
