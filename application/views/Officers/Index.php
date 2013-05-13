<style>
			.member {
				position: relative;
				padding: 10px;
			}
			.member:before {
				content: "";
				display: block;
				height: 0;
				clear: both;
			}
			.member h1 {
				margin: 2px;
			}
			.member img {
				float: left;
				margin-right: 20px;
				max-width: 150px;
				max-height: 150px;
			}
		</style>

<?php foreach($query as $row)
{
	print "<article class=\"member\">";
	print "<img src=\"".$row->image_path."\" />";
	print "<h1>".$row->first_name.' '.$row->last_name."</h1>";
	print "<i>".$row->rank."</i>";
	print "<p>".$row->description."</p>";
	print "</article>";
}
?>