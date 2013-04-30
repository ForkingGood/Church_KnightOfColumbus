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
		</style>

<?php foreach($query as $row)
{
	print "<article class=\"event\">";
	print "<img src=\"".$row->imgPath."\" />";
	print "<h1>".$row->title."</h1>";
	print "<i>".$row->date."&nbsp;&nbsp;|&nbsp;&nbsp;".$row->time."&nbsp;&nbsp;|&nbsp;&nbsp;".$row->address."</i>";
	print "<p>".$row->description."</p>";
	print "<div class=\"clearboth\"></div>";
	print "</article>";
}
?>