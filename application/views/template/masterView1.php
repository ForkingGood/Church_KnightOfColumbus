<html>
	<head>
		<link rel="stylesheet" href="/Church_KnightOfColumbus/asset/css/main.css" />
		<script type="text/javascript" src="/Church_KnightOfColumbus/asset/js/jquery-1.9.1.min.js"></script>


		<link rel="stylesheet" href="/Church_KnightOfColumbus/asset/css/PopBox.css" />
		<script type="text/javascript" src="/Church_KnightOfColumbus/asset/js/PopBox.js"></script>

		<style>
			.loginView {
				float: right;
				margin-top: -30px;
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
							Welcome <?php echo $this->session->userdata('logged_in')['username']; ?> ! ( <a href='/Church_KnightOfColumbus/index.php/Accounts/Logout/'>LogOut</a> )
						</div>
				<?php
					} 
				?>
			</header>
		</div>
		<div class="navBG">
			<nav>
				<a href="/Church_KnightOfColumbus/" class="start selected">Home</a>
				<a href="/Church_KnightOfColumbus/index.php/Officers/">Officers</a>
				<a href="/Church_KnightOfColumbus/index.php/Membership/">Membership</a>
				<a href="/Church_KnightOfColumbus/index.php/Events/">Events</a>
				<a href="/Church_KnightOfColumbus/index.php/Proclaimers/">Proclaimers</a>
				<a href="/Church_KnightOfColumbus/index.php/Contact/" class="end">Contact</a>
				<div class="clearboth"></div>
			</nav>
		</div>
		<div class="contentBG">
			<img class="contentBGImg" src="/Church_KnightOfColumbus/asset/images/cloudBG.jpg" />
			<section>
				<?php echo $content; ?>
			</section>
		</div>
		<div class="navBG">
			<nav>
				<a href="#" class="start selected">Home</a>
				<a href="#">Officers</a>
				<a href="#">Membership</a>
				<a href="#">Events</a>
				<a href="#">Proclaimers</a>
				<a href="#" class="end">Contact</a>
				<div class="clearboth"></div>
			</nav>
		</div>
		<div class="clearboth"></div>
		<div class="footerBG">
			<footer>
					<?php if (!$this->session->userdata('logged_in')) {  ?>
						<a href='/Church_KnightOfColumbus/index.php/Accounts/Login'>Login</a>
					<?php } ?>
				
			</footer>
		</div>
	</body>
</html>