<!Doctype HTML>
<html>
	<head>
		<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/main.css" />
		<script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery-ui.min.js"></script>

		<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/PopBox.css" />
		<script type="text/javascript" src="<?php echo base_url() ?>asset/js/PopBox.js"></script>

		<style>
			.loginView {
				float: right;
				margin-top: -29px;
				color: white;
				background-color: #03426A;
				padding: 5px 10px;
				border-radius: 6px 6px 0 0;
				border: 1px solid #0570b4;
				border-bottom-color: transparent;
			}
			.loginView a {
				color: #65A6D1;
			}
			ul {
    			font-family: Arial, Verdana;
    			font-size: 14px;
    			margin: 0;
    			padding: 0;
    			list-style: none;
			}
			ul li {
    			display: block;
    			position: relative;
    			float: left;
			}
			li ul {
    			display: none;
			}
			ul li a {
    			display: block;
    			text-decoration: none;
    			color: #ffffff;
    			border-top: 1px solid #ffffff;
    			padding: 5px 15px 5px 15px;
    			background: #1e7c9a;
    			margin-left: 1px;
    			white-space: nowrap;
			}
			ul li a:hover {
				background: #3b3b3b;
			}
			li:hover ul {
    			display: block;
    			position: absolute;
			}
			li:hover li {
    			float: none;
    			font-size: 11px;
			}
			li:hover a { background: #3b3b3b; }
			li:hover li a:hover {
    			background: #1e7c9a;
			}
		</style>
	</head>
	<body>
		<div class="headerBG">
			<header>
				<h1 style="padding-top: 30px; color: white; font-size: 30pt;">WEBSITE TITLE</h1>
				<?php 
					if ($this->session->userdata('logged_in')) { 
				?>
						<div class='loginView'>
							Welcome <?php echo $this->session->userdata('logged_in')['username'].' ! ( '.anchor('Accounts/Logout', 'LogOut').' )'; ?>
						</div>
				<?php
					} 
				?>
			</header>
		</div>

		<div class="navBG">
			<nav>
				<?php 
					echo anchor('', 'Home', array('class' => 'start')); 
					echo anchor('Officers', 'Officers');
					echo anchor('Membership', 'Membership');
					echo anchor('Events', 'Events');
					echo anchor('Proclaimers', 'Proclaimers');
					echo anchor('Contact', 'Contact', array('class' => 'end'));
				?>
				<div class="clearboth"></div>
			</nav>
		</div>
		<div class="contentBG">
			<img class="contentBGImg" src="<?php echo base_url() ?>asset/images/cloudBG.jpg" />
			<section>
				<?php echo $content; ?>
			</section>
		</div>
		<div class="navBG">
			<nav>
				<?php 
					echo anchor('', 'Home', array('class' => 'start')); 
					echo anchor('Officers', 'Officers');
					echo anchor('Membership', 'Membership');
					echo anchor('Events', 'Events');
					echo anchor('Proclaimers', 'Proclaimers');
					echo anchor('Contact', 'Contact', array('class' => 'end'));
				?>
				<div class="clearboth"></div>
			</nav>
		</div>
		<div class="clearboth"></div>
		<div class="footerBG">
			<footer>
					<?php if (!$this->session->userdata('logged_in')) {  echo anchor('Accounts/Login', 'Login'); } ?>
				
			</footer>
		</div>
	</body>
</html>