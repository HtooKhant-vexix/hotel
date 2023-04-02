<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Room Booking</title>
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" >
	<style type="text/css">
		.col1 {
			width: 45%;
			height: 400px;
			float: left;
		}
		.col2 {
			width: 45%;
			height: 400px;
			float: right;
		}
	</style>
</head>
<body>
	<?php 
	include ("connect.php");
	$rid = $_GET['rid'];
	// $rid = 2;
	
	$conn = mysqli_connect("localhost","root","","hotel_booking_sth_db");
	$roomdata = mysqli_query($conn,"SELECT * FROM hotel_room_tb WHERE room_id=$rid");
	$roomarr = mysqli_fetch_array($roomdata);
	$rid = $roomarr['room_id'];
	$rtype = $roomarr['room_type'];
	$rno = $roomarr['room_number'];
	$hname = $roomarr['hotel_name'];
	$rprice = $roomarr['room_price'];			
	$adate = $roomarr['avaliable_date'];			
	$rimg = $roomarr['room_img'];

	if(isset($_POST['btnBooking']))
	{
		$custname = $_POST['txtcname'];
		$noofdays = $_POST['txtnoday'];
		$qty = $_POST['txtqty'];
		$totcost = $rprice * $noofdays * $qty;

		mysqli_query($conn,"INSERT INTO booking_tb(customer_name,room_id,no_of_day,qty,total_cost) VALUES('$custname',$rid,$noofdays,$qty,$totcost)");
		// mysqli_query($conn,"INSERT INTO booking_tb(customer_name,room_id,no_of_day,qty,total_cost) VALUES('$custname',$rid,$noofdays,$qty,$totcost)");
		header("Location: booking.php");
	}
	?>
<!-- <div class="row">
	<div class="col1">
		<img src="<?php echo $rimg; ?>">
	</div>
	<div class="col2">
		<form method="post" action="<?php $_PHP_SELF ?>">
			Room Type: <?php echo $rtype; ?>
			<br>
			Hotel Name: <?php echo $hname; ?>
			<br>
			Room Price: <?php echo $rprice; ?>
			<br>
			Customer Name: <input type="text" name="txtcname">
			<br>
			No. of Day: <input type="number" name="txtnoday" value="1">
			<br>
			Room Quantity: <input type="number" name="txtqty" value="1">
			<br>
			<input type="submit" name="btnBooking" value="Book Now">
		</form>
	</div>
</div> -->
<div class="container">
	<div class="row justify-content-center align-items-center min-vh-100">
		<div class="col-6">
			<div class="card">
				<div class="card-header">
					<h3>Room Booking</h3>
				</div>
				<div class="card-body">
					<form method="post" action="<?php $_PHP_SELF ?>">
		Room Type: <?php echo $rtype; ?>
			<br>
			Hotel Name: <?php echo $hname; ?>
			<br>
			Room Price: <?php echo $rprice; ?>
			<br>
			<br>
			<div class="mb-3 row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Customer name</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" name="txtcname" id="inputPassword">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputPassword" class="col-sm-2 col-form-label">No. of Day</label>
				<div class="col-sm-10">
				<input type="number" name="txtnoday" value="1" class="form-control" id="inputPassword">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Room Quantity</label>
				<div class="col-sm-10">
				<input type="number" name="txtqty" value="1" class="form-control" id="inputPassword">
				</div>
			</div>
			<input type="submit" name="btnBooking" value="Book Now">
	</form>
				</div>
			</div>
	
	</div>
		<div class="col-4 p-3">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.1262595229887!2d96.12943871417976!3d16.820091323346524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb4aabd3fc11%3A0x415652183cd73011!2sNovotel%20Yangon%20Max%20Hotel!5e0!3m2!1sen!2ssg!4v1679634540614!5m2!1sen!2ssg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
</div>


</body>
</html>