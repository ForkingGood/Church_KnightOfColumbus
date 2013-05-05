<article>
	<h1>List of All Members</h1>
	<?php 
	$this->table->set_heading('Id', 'First Name', 'Last Name', 'Date Joined', 'Rank', 'Description', 'Date of Birth', 'Priority');
	$tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
	$this->table->set_template($tmpl); 
	echo $this->table->generate($members_table); ?>
</article>