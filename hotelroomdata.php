<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hotel room Data</title>
	<style type="text/css">
		.col {
			width: 30%;
			height: 300px;
			margin: 2.5%;
			float: left;
			background-color: lightblue;
		}
	</style>
</head>
<body>

<div class="row">
	<?php 
	$conn = mysqli_connect("localhost","root","","hotel_booking_hys_db");
	$roomdata = mysqli_query($conn,"SELECT * FROM hotel_room_tb");
			while($roomarr = mysqli_fetch_array($roomdata))
			{
				//echo $userarr['user_id'];
				$rid = $roomarr['room_id'];
				$rtype = $roomarr['room_type'];
				$rno = $roomarr['room_number'];
				$hname = $roomarr['hotel_name'];
				$rprice = $roomarr['room_price'];			
				$adate = $roomarr['avaliable_date'];			
				$rimg = $roomarr['room_img'];
	?>

	<div class="col">
		<img src="<?php echo $rimg; ?>" width="100%" height="60%">
		<h3><?php echo $rno; ?></h3>
		<h3><?php echo $rtype; ?></h3>
		<p><?php echo $rprice; ?></p>
		<a href="roombooking.php?rid=<?php echo $rid;?>">Book Now</a>
	</div>
	<?php 
	}
	?>
</div>
</body>
</html>