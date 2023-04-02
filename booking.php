<!DOCTYPE html>
<html lang="en">
<head>
<title>LoungeHotel | Booking</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.6.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Adamina_400.font.js"></script>
<script type="text/javascript" src="js/jquery.jqtransform.js" ></script>
<script type="text/javascript" src="js/script.js" ></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
<![endif]-->
</head>

<body id="page3">         
<div class="bg1">
  <div class="bg2">
    <div class="main container">
      <!-- header -->
      <header >
        <h1 class=""><a href="index.html" id="logo">LoungeHotel</a></h1>
        <div class="department"> 9863 - 9867 Mill Road, LA, MG09 99HT<br>
          <span>Freephone: &nbsp; +1 800 559 6580</span> </div>
      </header>
      <div class="box container">
        <nav>
          <ul id="menu" class="d-flex py-4  align-items-center justify-content-between">
            <li><a href="index.html">Home</a></li>
            <li><a href="services.html">Category</a></li>
            <li class="active"><a href="booking.html">Review</a></li> 
            <li><a href="rooms.php">Gallery</a></li>
            <li><a href="Promotion.html">Promotion</a></li>
            <li><a href="locations.html">Contact Us</a></li>
          </ul> 
        </nav>
        <!-- header end -->
        <!-- content -->
        <article id="container">
          <div class="row g-3 py-3">
              <!-- <form action="#" id="form1">
                <h2>Book a Room</h2>
                <fieldset>
                  <div class="row">
                    <input type="text" class="input">
                    Your Name: </div>
                  <div class="row">
                    <input type="text" class="input">
                    E-Mail Address: </div>
                  <div class="row">
                    <input type="text" class="input">
                    Home Phone: </div>
                  <div class="row">
                    <div class="select1">
                      <select>
                        <option>&nbsp;</option>
                        <option>...</option>
                      </select>
                    </div>
                    Length of Stay: </div>
                  <div class="row">
                    <div class="select1">
                      <select>
                        <option>&nbsp;</option>
                        <option>...</option>
                      </select>
                    </div>
                    Number in Party: </div>
                  <div class="row">
                    <div class="select2">
                      <select>
                        <option>&nbsp;</option>
                        <option>...</option>
                      </select>
                    </div>
                    <div class="select2">
                      <select>
                        <option>&nbsp;</option>
                        <option>...</option>
                      </select>
                    </div>
                    <div class="select2">
                      <select>
                        <option>&nbsp;</option>
                        <option>...</option>
                      </select>
                    </div>
                    Arrival Date: </div>
                  <div class="row_textarea"> Additional Comments:
                    <textarea cols="1" rows="1"></textarea>
                  </div>
                  <div class="wrapper"> <a href="#" class="button1">Send</a> <a href="#" class="button1">Clear</a> </div>
                </fieldset>
              </form> -->
              <!-- <div class="col2 pad">
                <h2><img src="images/title_marker1.jpg" alt="">Best Propositions of This Month</h2>
                <div class="wrapper line1">
                  <div class="col3">
                    <figure class="pad_bot3"><img src="images/page3_img1.jpg" alt=""></figure>
                    <p class="pad_bot1"><strong class="color3">Lorem ipsum dolor amet consectetur</strong></p>
                    <p>Adipisicing elito eiusmod tempor incididunt ut labore dolore magna.</p>
                    <ul class="list2">
                      <li><span>2</span>Rooms</li>
                      <li><span>4</span>Beds</li>
                    </ul>
                    <a href="#" class="button2">Book Room</a> </div>
                  <div class="col3 pad_left2">
                    <figure class="pad_bot3"><img src="images/page3_img4.jpg" alt=""></figure>
                    <p class="pad_bot1"><strong class="color3">Lorem ipsum dolor amet consectetur</strong></p>
                    <p>Ut enim ad minim veniam nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                    <ul class="list2">
                      <li><span>2</span>Rooms</li>
                      <li><span>4</span>Beds</li>
                    </ul>
                    <a href="#" class="button2">Book Room</a> </div>
                </div>
              </div> -->
              <?php		
              include("connect.php");
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
          <div class="col-4">
            <div class="card p-4">
              <div class=" d-flex h card-img justify-content-center" >
                <img class="h" src="<?php echo "$rimg";  ?>" alt="">
              </div>
              <div class="card-body p-0 mt-4">
                <span class="fs-4 fw-bold text-dark"><?php echo "$hname" ?></span>
                <p class=" fs-6 m-0 p-0 mt-2">
                  <?php echo "$hname" ?>
                </p> 
                <p class=" fs-6 m-0 p-0 mt-1">
                  <?php echo "$rtype" ?>
                </p> 
                <p class=" fs-6 m-0 p-0 mt-1">
                  <?php echo "$adate" ?>
                </p> 
              </div>
              <div class="d-flex justify-content-between mt-auto align-items-center">
                  <p class="fs-5 fw-bold my-auto py-0 text-dark">$ <?php echo "$rprice" ?></p>
                 <a href="roombooking.php?rid=<?php echo $rid;?>"> <button class="btn add btn-outline-primary">
                    Booking
                  </button></a>
              </div>
              <div class=""></div>
            </div>
          </div>

         <!-- card -->
			<?php 
			}
			?>
          </div>
          
          <div class="pad">
            <div class="wrapper line3">
              <div class="col2">
                <h2>About Booking</h2>
                <p class="pad_bot1"><strong class="color2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo</strong> </p>
                <p> Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enigm ipsam voluptatem nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <div class="wrapper">
                  <figure class="left marg_right1"><img src="images/page3_img3.jpg" alt=""></figure>
                  <p class="pad_bot1"><strong class="color2">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</strong></p>
                  <p class="pad_bot2"> Deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga harum quidem rerum facilis est et expedita.</p>
                </div>
                <div class="pad_bot2">
                  <div class="wrapper line2">
                    <div class="col1">
                      <ul class="list1">
                        <li><a href="#">Inventore veritatis et quasi architecto</a></li>
                        <li><a href="#">Beatae vitae dicta sunt explicabo</a></li>
                        <li><a href="#">Nemo enim ipsam voluptatem quivolupta</a></li>
                        <li><a href="#">Sit aspernatur aut odit aut fugit sed</a></li>
                      </ul>
                    </div>
                    <div class="col1 pad_left1">
                      <ul class="list1">
                        <li><a href="#">Neque porro quisquam est, qui dolorem</a></li>
                        <li><a href="#">Ipsum quia dolor amet consectetur</a></li>
                        <li><a href="#">Adipisci velit, sed quia non numquam</a></li>
                        <li><a href="#">Eius modi tempora incidunt ut</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <a href="#" class="button1">Read More</a> </div>
              <div class="col1 pad_left1">
                <h2>Booking Info</h2>
                <p class="pad_bot1"><strong class="color2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</strong></p>
                <p class="pad_bot1"> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                <ul class="list1 pad_bot2">
                  <li><a href="#">Neque porro quisquam est qui</a></li>
                  <li><a href="#">Dolorem ipsum quia dolor sit amet</a></li>
                  <li><a href="#">Consectetur adipisci velit sed</a></li>
                  <li><a href="#">Quia non numquam eius modi tempora</a></li>
                  <li><a href="#">Incidunt ut labore et dolore magnam</a></li>
                  <li><a href="#">Aliquam quaerat voluptatem</a></li>
                  <li><a href="#">Ut enim ad minima veniamquis nostrum</a></li>
                  <li><a href="#">Exercitationem ullam corporis</a></li>
                  <li><a href="#">Suscipit laboriosam, nisi ut aliquid</a></li>
                  <li><a href="#">Ex ea commodi consequatur</a></li>
                  <li><a href="#">Quis autem vel eum iure reprehenderit</a></li>
                </ul>
                <a href="#" class="button1">Read More</a> </div>
            </div>
          </div>
        </article>
        <!--content end-->
      </div>
    </div>
  </div>

 
</div>
<div class="main">
  <!-- footer -->
  <footer>
    <div class="col2">Copyright &copy; <a href="#">Domain Name</a> All Rights Reserved | Design by <a target="_blank" href="http://www.templatemonster.com/">TemplateMonster.com</a>
      <nav>
        <ul id="footer_menu">
          <li><a href="index.html">About Us</a></li>
          <li><a href="services.html">Services</a></li>
          <li class="active"><a href="booking.html">Booking</a></li>
          <li><a href="rooms.html">Rooms</a></li>
          <li class="last"><a href="locations.html">Locations</a></li>
        </ul>
      </nav>
    </div>
    <div class="col1 pad_left1">
      <ul id="icons">
        <li><a href="#" class="normaltip"><img src="images/icon1.jpg" alt=""></a></li>
        <li><a href="#" class="normaltip"><img src="images/icon2.jpg" alt=""></a></li>
        <li><a href="#" class="normaltip"><img src="images/icon3.jpg" alt=""></a></li>
        <li><a href="#" class="normaltip"><img src="images/icon4.jpg" alt=""></a></li>
      </ul>
    </div>
    <!-- {%FOOTER_LINK} -->
  </footer>
  <!-- footer end -->
</div>
<script type="text/javascript">Cufon.now();</script>

</body>
</html>