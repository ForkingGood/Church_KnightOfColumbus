<html>
	<head>
		<style>
			body {
				margin: 0;
			}
			.headerBG {
				background-color: #24587A;
				border-bottom: 1px solid #183c53;
			}
			.navBG {
				background-color: #03426A;
				border-top: 1px solid #0570b4;
				border-bottom: 1px solid #022338;
			}
			.contentBG {
				position: relative;
				background-color: white;
				padding-top: 30px;
			}
				.contentBG .contentBGImg {
					position: absolute;
					top: 0;
					left: 0;
					right: 0;
					bottom: 0;
					width: 100%;
				}
			.footerBG {
				background-color: #24587A;
			}
			header, nav, article, footer {
				width: 1000px;
				margin: 0 auto;
			}
			header {

			}
			nav a {
				position: relative;
				display: block;
				float: left;
				color: #65A6D1;
				text-decoration: none;
				padding: 10px 20px;
				border-left: 1px solid #0570b4;
				border-right: 1px solid #022338;
			}
				nav a.start:before {
					position: absolute;
					left: -4px;
					top: 0px;
					border-right: 1px solid #022338;
					padding: 20px 1px;
					content: " ";
				}
				nav a.end:after {
					position: absolute;
					right: -4px;
					top: 0px;
					border-left: 1px solid #0570b4;
					padding: 20px 1px;
					content: " ";
				}
				nav a:hover {
					text-decoration: underline;
				}
				nav a:active {
					border-color: transparent;
				}
			article {
				position: relative;
				min-height: 300px;
				background-color: white;
				opacity: 0.7;
				margin-bottom: 30px;
			}
			.clearboth {
				clear: both;
			}
		</style>
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
				fg
			</footer>
		</div>
	</body>
</html>