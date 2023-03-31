<?php
 require "connect.php";
?>
<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Golden Dragon - Admin Page</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php 

//include 'dbconnect.php';

if(isset($_POST['btnInsert']))
{
	$rid = $_POST['txtroomid'];
	$rtype = $_POST['txtroomtype'];
	$rno = $_POST['txtroomno'];
	$hname = $_POST['txthotelname'];
	$rprice = $_POST['txtroomprice'];
	$avadate = $_POST['txtavadate'];

	$rimg = $_FILES['txtroomimg']['name'];
	move_uploaded_file($_FILES['txtroomimg']['tmp_name'], $rimg);

	//echo $uname.$uemail."<br>";
	mysqli_query($conn, "INSERT INTO hotel_room_tb VALUES('$rid','$rtype','$rno','$hname','$rprice','$avadate','$rimg')");
}

// Delete data
if(isset($_POST['btnDelete']))
{
	$rid = $_POST['txtroomid'];
	mysqli_query($conn, "DELETE FROM hotel_room_tb WHERE room_id='$rid'");
}

// Update data
if(isset($_POST['btnUpdate']))
{
	$rid = $_POST['txtroomid'];
	$rprice = $_POST['txtroomprice']; // new
	$ravadate = $_POST['txtavadate']; // new
	if($rprice == "")  // no data for name
	{
		mysqli_query($conn, "UPDATE hotel_room_tb SET avaliable_date = '$ravadate' WHERE room_id = '$rid'");
	}
	else if($ravadate == "")
	{
		mysqli_query($conn, "UPDATE hotel_room_tb SET room_price = '$rprice' WHERE room_id = '$rid'");
	}
	else {
		mysqli_query($conn, "UPDATE hotel_room_tb SET avaliable_date = '$ravadate', room_price='$rprice' WHERE room_id = '$rid'");
	}
}
?>

<div class="container">
	<h1 align="center">Admin Page for Golden Dragon Hotel Reservation System</h1>
	<div class="row">
		<table class="table">
			<tr>
				<th>Room ID</th>
				<th>Room Type</th>
				<th>Room Number</th>
				<th>Room image</th>
				<th>Hotel Name</th>
				<th>Room Price</th>
				<th>Avaliable Date</th>				
			</tr>

			<?php			
			$roomdata = mysqli_query($conn,"SELECT * FROM `hotel_room_tb` ");
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
			<tr>
				<td> <?php echo $rid; ?> </td>
				<td> <?php echo $rtype; ?> </td>
				<td> <?php echo $rno; ?> </td>
				<td> <?php echo $rimg; ?> </td>
				<td> <?php echo $hname; ?> </td>
				<td> <?php echo $rprice; ?> </td>
				<td> <?php echo $adate; ?> </td>
			</tr>
			<?php 
			}
			?>
		</table>
	</div>

	<div class="row">
		<div class="col-md-4">
			<h2 align="center">Insert Form</h2>
			<form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
			    <label for="email">Room ID:</label>
			    <input type="text" name="txtroomid" class="form-control" placeholder="Enter Room ID" id="email">
			  </div>
			  <div class="form-group">
			    <label for="email">Room Type:</label>
			    <input type="text" name="txtroomtype" class="form-control" placeholder="Enter Room Type" id="email">
			  </div>
			  <div class="form-group">
			    <label for="email">Room Number:</label>
			    <input type="text" name="txtroomno" class="form-control" placeholder="Enter Room Number" id="email">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Room Image:</label>
			    <input type="file" name="txtroomimg" class="form-control" placeholder="Image" id="pwd">
			  </div>
			   <div class="form-group">
			    <label for="pwd">Hotel Name:</label>
			    <input type="text" name="txthotelname" class="form-control" placeholder="Enter Hotel Name" id="pwd">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Room Price:</label>
			    <input type="text" name="txtroomprice" class="form-control" placeholder="Enter Room price" id="pwd">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Avaliable Date:</label>
			    <input type="text" name="txtavadate" class="form-control" placeholder="Enter Avaliable Date" id="pwd">
			  </div>			  
			  <button type="submit" name="btnInsert" class="btn btn-primary">Insert</button>
			</form>
		</div>

		<div class="col-md-4">
			<h1 align="center">Update Form</h1>
			<form action="<?php $_PHP_SELF ?>" method="post">
				<div class="form-group">
			    <label for="email">Room ID:</label>
			    <input type="text" name="txtroomid" class="form-control" placeholder="Enter Room ID" id="email">
			  </div>
			  	<div class="form-group">
			    <label for="email">New Room Price:</label>
			    <input type="text" name="txtroomprice" class="form-control" placeholder="Enter new price" id="email">
			  </div>
			  <div class="form-group">
			    <label for="email">New Avaliable Date:</label>
			    <input type="text" name="txtavadate" class="form-control" placeholder="Enter new date" id="email">
			  </div>		  
			  <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
			</form>
		</div>

		<div class="col-md-4">
			<h1 align="center">Delete Form</h1>
			<form action="<?php $_PHP_SELF ?>" method="post">
				<div class="form-group">
			    <label for="email">Room ID:</label>
			    <input type="text" name="txtroomid" class="form-control" placeholder="Enter Room ID" id="email">
			  </div>			  
			  <button type="submit" name="btnDelete" class="btn btn-primary">Delete</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>