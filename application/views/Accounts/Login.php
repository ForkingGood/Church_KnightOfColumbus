<article>
   <h1>Login</h1>
   <?php echo validation_errors(); ?>
   <?php //echo form_open('verifylogin'); ?>
   <form method="POST">
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username" autofocus="autofocus" />
     ( bob )
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     ( supersecret )
     <br/>
     <input type="submit" value="Login"/>
   </form>
</article>