		<style>
			.event {
				position: relative;
				padding: 10px;
			}
			.event:before {
				content: "";
				display: block;
				height: 0;
				clear: both;
			}
			.event h1 {
				margin: -2px 0 2px 0;
			}
			.event img {
				float: left;
				margin-right: 20px;
				width: 200px;
				height: 200px;
			}
			input.title {
				font-size: 20pt;
				color: #24587A;
			}
			input.italic {
				font-style: italic;
			}
		</style>

<?php foreach($query as $row)
{
	print "<article class=\"event\">";
	print "<img src=\"".$row->imgPath."\" />";
	print "<h1>".$row->title."</h1>";
	print "<i>".$row->date."&nbsp;&nbsp;|&nbsp;&nbsp;".$row->time."&nbsp;&nbsp;|&nbsp;&nbsp;".$row->address."</i>";
	print "<p>".$row->description."</p>";
	print "<div class=\"clearboth\"></div>";
	if ($loggedIn) {
		print "<a href='#' class='delete'>X</a>";
		print "<a href='#' class='edit'>Edit</a>";
	}
	print "</article>";
}

if ($loggedIn) {
?>

	<article class="event">
		<form method="POST">
			<img />
			<input type='text' class='title' name='title' placeholder='Title' />
			<br />
			<input type='text' class='italic' name='date' placeholder='Date' />
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<input type='text' class='italic' name='time' placeholder='Time' />
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<input type='text' class='italic' name='address' placeholder='Address' />
			<br />
			<br />
			<textarea style="width: 75%; height: 110px;" name='description' placeholder='Description'></textarea>
			<br /><br />
			<input type='submit' value='Add' style="width: 100%;" />
		</form>
		<div class='clearboth'></div>
	</article>
<?php
}
?>