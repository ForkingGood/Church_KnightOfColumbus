<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/church_styles.css" />
	</head>
	<body>
		<div class="headerBG">
			<header>
				<h1 style="padding-top: 30px; color: white; font-size: 30pt;">Knights of Columbus</h1>
			</header>
		</div>
		<div class="navBG">
			<nav>
				<a href="#" class="start">Home</a>
				<a href="#">Officers</a>
				<a href="#">Membership</a>
				<a href="#">Events</a>
				<a href="#">Proclaimers</a>
				<a href="#" class="end">Contact</a>
				<div class="clearboth"></div>
			</nav>
		</div>
		<div class="contentBG">
			

			<img class="contentBGImg" src="images/cloudBG.jpg" />
			<article>
				<?php foreach($query as $row)
				{
    				print $row->Name;
    				print $my_member->id;
    				print "<br>";
				}
				?>
			</article>
			<article>

			</article>
		</div>
		<div class="navBG">
			<nav>
				<a href="#" class="start">Home</a>
				<a href="#">Officers</a>
				<a href="#">Membership</a>
				<a href="#">Events</a>
				<a href="#">Proclaimers</a>
				<a href="#" class="end">Contact</a>
				<div class="clearboth"></div>
			</nav>
		</div>
		<div class="footerBG">
			<footer>
				
			</footer>
		</div>
	</body>
</html>