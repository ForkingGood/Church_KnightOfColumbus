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

			.PopBox {
				border: 2px solid #03426A;
				background-color: #cacaca;
				width: 900px;
				box-shadow: 0px 0px 60px #888888;
				border-radius: 8px;
			}
			.PopBox h1 {
				color: white;
				background-color: #03426A;
				margin: 0;
				padding: 4px 10px;
			}
			.PopBox .close {
				position: absolute;
				right: 3;
				top: 3;
				background-color: red;
				color: white;
				text-decoration: none;
				padding: 4px 8px;
				border-radius: 7px;
			}
		</style>

<script>
	$(function() {
		$('.PopIt[name="edit"]').click(function() {
			var set = $(this).parent();
			$('.PopBox.edit input[name="id"]').val(set.children('.id').text());
			$('.PopBox.edit input[name="title"]').val(set.children('.title').text());
			$('.PopBox.edit input[name="date"]').val(set.children('.date').text());
			$('.PopBox.edit input[name="time"]').val(set.children('.time').text());
			$('.PopBox.edit input[name="address"]').val(set.children('.address').text());
			$('.PopBox.edit textarea[name="description"]').val(set.children('.description').text());
		});
	});
</script>





<div class="PopBox edit">
	<h1>Edit</h1>
	<div class="event">
		<form method="POST" action="/Church_KnightOfColumbus/index.php/Events/Edit">
			<input type='text' style='display: none;' name='id' />
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
	</div>
	<a href="#" class="close">X</a>
</div>


<?php foreach($query as $row)
{
	print "<article class=\"event\">";
	print "<p style='display: none;' class='id'>".$row->id."</p>";
	print "<img src=\"".$row->imgPath."\" />";
	print "<h1 class='title'>".$row->title."</h1>";
	print "<i class='date'>".$row->date."</i>&nbsp;&nbsp;|&nbsp;&nbsp;<i class='time'>".$row->time."</i>&nbsp;&nbsp;|&nbsp;&nbsp;<i class='address'>".$row->address."</i>
	";
	print "<p class='description'>".$row->description."</p>";
	print "<div class=\"clearboth\"></div>";
	if ($loggedIn) {
		print "<a href='/Church_KnightOfColumbus/index.php/Events/Remove/".$row->id."' class='delete'>X</a>";
		print "<a href='#' class='PopIt edit' name='edit'>Edit</a>";
	}
	print "</article>";
}

if ($loggedIn) {
?>

	<article class="event">
		<form method="POST" action="/Church_KnightOfColumbus/index.php/Events/Add">
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