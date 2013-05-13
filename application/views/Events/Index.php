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
				border: 1px solid #cccccc;
				float: left;
				margin-right: 20px;
				width: 200px;
				height: 200px;
			}
			input.name {
				font-size: 20pt;
				color: #24587A;
			}
			input.italic {
				font-style: italic;
			}
			input.time {
				width: 70px;
			}
			input.date {
			 	width: 120px;
			}
			input.address {
				width: 259px;
			}
			.editForm input.address {
				width: 222px;
			}
			input[type='file'] {
				position: absolute;
				left: 10px;
				top: 10px;
				width: 200px;
				height: 200px;
				opacity: 0;
			}



			.PopBox {
				border: 2px solid #03426A;
				background-color: #cacaca;
				width: 950px;
				box-shadow: 0px 0px 60px #888888;
			}
			.PopBox h1 {
				color: white;
				background-color: #03426A;
				margin: 0;
				padding: 4px 10px;
				cursor: move;
			}
			.PopBox .close {
				position: absolute;
				right: 3px;
				top: -2px;
				background-color: #a60000;
				color: white;
				text-decoration: none;
				padding: 2px 20px;
			}
			.PopBox .close:hover {
				background-color: red;
			}
		</style>
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/jquery-ui-timepicker-addon.css" />
<script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery-ui-timepicker-addon.js"></script>
<script>
	$(function() {
		$('.PopIt[name="edit"]').click(function() {
			var set = $(this).parent();
			$('.PopBox.edit input[name="id"]').val(set.children('.id').text());
			$('.PopBox.edit input[name="name"]').val(set.children('.name').text());
			$('.PopBox.edit input[name="startDate"]').val(set.children('.startDate').text());
			$('.PopBox.edit input[name="endDate"]').val(set.children('.endDate').text() == '' ? set.children('.startDate').text() : set.children('.endDate').text());
			$('.PopBox.edit input[name="startTime"]').val(set.children('.startTime').text());
			$('.PopBox.edit input[name="endTime"]').val(set.children('.endTime').text() == '' ? set.children('.startTime').text() : set.children('.endTime').text());
			$('.PopBox.edit input[name="address"]').val(set.children('.address').text());
			$('.PopBox.edit textarea[name="description"]').val(set.children('.description').text());
			$('.PopBox.edit img').attr('src', set.children('img').attr('src'));
		});
	});
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(input).parent().children('img')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>




<div class="PopBox edit">
	<h1>Edit</h1>
	<div class="event editForm">
		<form method="POST" action="/Church_KnightOfColumbus/index.php/Events/Edit">
			<input type='text' style='display: none;' name='id' />
			<img name='image' />
			<input type='text' class='name' name='name' placeholder='Event Name' />
			<br />
			<input type='text' class='italic date' name='startDate' placeholder='Start Date' /> -
			<input type='text' class='italic date' name='endDate' placeholder='End Date' />
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<input type='text' class='italic time' name='startTime' placeholder='Start Time' /> -
			<input type='text' class='italic time' name='endTime' placeholder='End Time' />
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<input type='text' class='italic address' name='address' placeholder='Address' />
			<br />
			<br />
			<textarea style="width: 75%; height: 110px;" name='description' placeholder='Description'></textarea>
			<br /><br />
			<input type='submit' value='Set' style="width: 100%;" />
		</form>
		<div class='clearboth'></div>
	</div>
	<a href="#" class="close">X</a>
</div>


<?php foreach($query as $row)
{
	$startDate = date('M d, Y', strtotime($row->start_datetime));
	$endDate = date('M d, Y', strtotime($row->end_datetime));
	$startTime = date('h:i a', strtotime($row->start_datetime));
	$endTime = date('h:i a', strtotime($row->end_datetime));

	print "<article class=\"event\">";
	print "<p style='display: none;' class='id'>".$row->id."</p>";
	print "<img src=\"".($row->image_path == null ? '" style="display: none;' : 'uploads/'.$row->image_path)."\" />";
	print "<h1 class='name'>".$row->name."</h1>";
	print "<i class='startDate'>".$startDate.( $startDate != $endDate ? '</i> - <i class="endDate">'.$endDate : '' )."</i>&nbsp;&nbsp;|&nbsp;&nbsp;<i class='startTime'>".$startTime.( $startTime != $endTime ? '</i> - <i class="endTime">'.$endTime : '' )."</i>&nbsp;&nbsp;|&nbsp;&nbsp;<i class='address'>".$row->address."</i>
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

	<article class="event addForm">
		<?php echo $addError;?>

		<?php echo form_open_multipart('Events/Add');?>
			<input type="file" name="userfile" size="20" onchange="readURL(this);" />
			<img />
			<input type='text' class='name' name='name' placeholder='Event Name' />
			<br />
			<input type='text' class='italic date' name='startDate' placeholder='Start Date' /> -
			<input type='text' class='italic date' name='endDate' placeholder='End Date' />
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<input type='text' class='italic time' name='startTime' placeholder='Start Time' /> -
			<input type='text' class='italic time' name='endTime' placeholder='End Time' />
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<input type='text' class='italic address' name='address' placeholder='Address' />
			<br />
			<br />
			<textarea style="width: 75%; height: 110px;" name='description' placeholder='Description'></textarea>
			<br /><br />
			<input type='submit' value='Add' style="width: 100%;" />
		</form>
		<div class='clearboth'></div>
	</article>








	<script>
		var startDateTextBox = $('.addForm input[name="startDate"]');
		var endDateTextBox = $('.addForm input[name="endDate"]');
		var startTimeTextBox = $('.addForm input[name="startTime"]');
		var endTimeTextBox = $('.addForm input[name="endTime"]');
		
		startDateTextBox.datepicker({
			dateFormat: 'MM d, yy',
			onClose: function(dateText, inst) {
				if (endDateTextBox.val() != '') {
					var testStartDate = startDateTextBox.datetimepicker('getDate');
					var testEndDate = endDateTextBox.datetimepicker('getDate');
					if (testStartDate > testEndDate)
						endDateTextBox.datetimepicker('setDate', testStartDate);
				}
				else {
					endDateTextBox.val(dateText);
				}
			},
			onSelect: function (selectedDateTime){
				endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
			}
		});
		endDateTextBox.datepicker({
			dateFormat: 'MM d, yy',
			onClose: function(dateText, inst) {
				if (startDateTextBox.val() != '') {
					var testStartDate = startDateTextBox.datetimepicker('getDate');
					var testEndDate = endDateTextBox.datetimepicker('getDate');
					if (testStartDate > testEndDate)
						startDateTextBox.datetimepicker('setDate', testEndDate);
				}
				else {
					startDateTextBox.val(dateText);
				}
			},
			onSelect: function (selectedDateTime){
				startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
			}
		});

		startTimeTextBox.timepicker({
			controlType: 'select',
			timeFormat: 'hh:mm tt',
			onClose: function(dateText, inst) {
				if (endTimeTextBox.val() != '') {
					var testStartTime = startTimeTextBox.datetimepicker('getDate');
					var testEndTime = endTimeTextBox.datetimepicker('getDate');
					if (testStartTime > testEndTime)
						endTimeTextBox.datetimepicker('setDate', testStartTime);
				}
				else {
					endTimeTextBox.val(dateText);
				}
			},
			onSelect: function (selectedDateTime){
				endTimeTextBox.datetimepicker('option', 'minDate', startTimeTextBox.datetimepicker('getDate') );
			}
		});
		endTimeTextBox.timepicker({
			controlType: 'select',
			timeFormat: 'hh:mm tt',
			onClose: function(dateText, inst) {
				if (startTimeTextBox.val() != '') {
					var testStartTime = startTimeTextBox.datetimepicker('getDate');
					var testEndTime = endTimeTextBox.datetimepicker('getDate');
					if (testStartTime > testEndTime)
						startTimeTextBox.datetimepicker('setDate', testEndTime);
				}
				else {
					startTimeTextBox.val(dateText);
				}
			},
			onSelect: function (selectedDateTime){
				startTimeTextBox.datetimepicker('option', 'maxDate', endTimeTextBox.datetimepicker('getDate') );
			}
		});

		$( ".PopBox" ).draggable({containment: "body"});
	</script>
<?php
}
