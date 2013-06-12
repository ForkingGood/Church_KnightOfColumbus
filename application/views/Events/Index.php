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
				cursor: pointer;
			}
			.errorBox {
				color: red;
			}
		</style>
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/jquery-ui-timepicker-addon.css" />
<script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery-ui-timepicker-addon.js"></script>





<!------------------------------------------------------------------------------------------------------------------------------------>

<!------------------ POP BOXES  ------------------------------------------------------------------------------------------------------>

<!------------------------------------------------------------------------------------------------------------------------------------>

<div class="PopBox edit">
	<h1>Edit</h1>
	<div class="event editForm">
		<?php echo form_open_multipart('Events');?>
			<input type="hidden" name="action" value="edit" />
			<input type='text' style='display: none;' name='id' />
			<input type="file" name="userfile" size="20" accept="image/*" onchange="previewImg(this);" />
			<img />
			<input type='text' class='name' name='edit[name]' placeholder='Event Name' />
			<br />
			<input type='text' class='italic date' name='edit[startDate]' placeholder='Start Date' /> -
			<input type='text' class='italic date' name='edit[endDate]' placeholder='End Date' />
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<input type='text' class='italic time' name='edit[startTime]' placeholder='Start Time' /> -
			<input type='text' class='italic time' name='edit[endTime]' placeholder='End Time' />
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<input type='text' class='italic address' name='edit[address]' placeholder='Address' />
			<br />
			<br />
			<textarea style="width: 75%; height: 110px;" name='edit[description]' placeholder='Description'></textarea>
			<br /><br />
			<input type='submit' value='Set' style="width: 100%;" />
		</form>
		<div class='clearboth'></div>
	</div>
	<a href="#" class="close x">X</a>
</div>

<div class="PopBox delete">
	<h1>Delete</h1>
	<p class="aligncenter">Are you sure you want to delete event: '<b name="eventName">Event #1</b>' ?</p>
	<a href="#" class="halfColumns aligncenter button confirm">Confirm</a>
	<a href="#" class="halfColumns endColumns aligncenter button close">Cancel</a>
	<a href="#" class="close x">X</a>
</div>

<!------------------------------------------------------------------------------------------------------------------------------------>

<!------------------ DISPLAY FORM ---------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------------------------------------------------------>

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
		// print "<a href='/Church_KnightOfColumbus/index.php/Events/Remove/".$row->id."' class='delete'>X</a>";
		print "<a href='#' class='PopIt delete' name='delete'>X</a>";
		print "<a href='#' class='PopIt edit' name='edit'>Edit</a>";
	}
	print "</article>";
}


if ($loggedIn) {
?>

<!------------------------------------------------------------------------------------------------------------------------------------>

<!------------------ ADD FORM   ------------------------------------------------------------------------------------------------------>

<!------------------------------------------------------------------------------------------------------------------------------------>

	<article class="event addForm">
		<div class="errorBox">
			<?php echo form_error(''); ?>
			<?php echo validation_errors(); ?>
		</div>

		<?php echo form_open_multipart('Events');?>
			<input type="hidden" name="action" value="add" />
			<input type="file" name="userfile" size="20" accept="image/*" onchange="previewImg(this);" />
			<img />
			<input type='text' class='name' name='add[name]' placeholder='Event Name' value="<?php echo set_value('add[name]'); ?>" />

			<br />
			<input type='text' class='italic date' name='add[startDate]' placeholder='Start Date' value="<?php echo set_value('add[startDate]'); ?>" /> -
			<input type='text' class='italic date' name='add[endDate]' placeholder='End Date' value="<?php echo set_value('add[endDate]'); ?>" />
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<input type='text' class='italic time' name='add[startTime]' placeholder='Start Time' value="<?php echo set_value('add[startTime]'); ?>" /> -
			<input type='text' class='italic time' name='add[endTime]' placeholder='End Time' value="<?php echo set_value('add[endTime]'); ?>" />
			&nbsp;&nbsp;|&nbsp;&nbsp;
			<input type='text' class='italic address' name='add[address]' placeholder='Address' value="<?php echo set_value('add[address]'); ?>" />
			<br />
			<br />
			<textarea style="width: 75%; height: 110px;" name='add[description]' placeholder='Description'><?php echo set_value('add[description]'); ?></textarea>
			<br /><br />
			<input type='submit' value='Add' style="width: 100%;" />
		</form>
		<div class='clearboth'></div>
	</article>






<!------------------------------------------------------------------------------------------------------------------------------------>

<!------------------ JAVASCRIPT ------------------------------------------------------------------------------------------------------>

<!------------------------------------------------------------------------------------------------------------------------------------>



	<script>
		var startDateTextBox = $('.addForm input[name="add[startDate]"]');
		var endDateTextBox = $('.addForm input[name="add[endDate]"]');
		var startTimeTextBox = $('.addForm input[name="add[startTime]"]');
		var endTimeTextBox = $('.addForm input[name="add[endTime]"]');
		
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



		$(function() {
			$('.PopIt[name="edit"]').click(function() {
				var set = $(this).parent();
				$('.PopBox.edit input[name="id"]').val(set.children('.id').text());
				$('.PopBox.edit input[name="edit[name]"]').val(set.children('.name').text());
				$('.PopBox.edit input[name="edit[startDate]"]').val(set.children('.startDate').text());
				$('.PopBox.edit input[name="edit[endDate]"]').val(set.children('.endDate').text() == '' ? set.children('.startDate').text() : set.children('.endDate').text());
				$('.PopBox.edit input[name="edit[startTime]"]').val(set.children('.startTime').text());
				$('.PopBox.edit input[name="edit[endTime]"]').val(set.children('.endTime').text() == '' ? set.children('.startTime').text() : set.children('.endTime').text());
				$('.PopBox.edit input[name="edit[address]"]').val(set.children('.address').text());
				$('.PopBox.edit textarea[name="edit[description]"]').val(set.children('.description').text());
				$('.PopBox.edit img').attr('src', set.children('img').attr('src'));
			});
			$('.PopIt[name="delete"]').click(function() {
				$('.PopBox.delete a.confirm').attr('href', '/Church_KnightOfColumbus/index.php/Events/Remove/' + $(this).parent().children('p.id').html());
				$('.PopBox.delete b[name="eventName"]').html($(this).parent().children('.name').text());
			});
		});
		function previewImg(input) {
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
<?php
}
