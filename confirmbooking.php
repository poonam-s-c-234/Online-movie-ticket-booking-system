<html lang="en">
<head>
    <title>Seat Booking</title>
    <style>

        body{
            
            background-color: #81ecec;
        }

        .container{
            background-color: whitesmoke;
            box-shadow: 1px 1px 2px 1px grey;
            padding: 50px 8px 20px 38px;
            width:30%;
            height: 140%;
            margin-left: 35%;
        }

        .txt{
            width: 90%;
            height: 5%;
            border: 1px solid brown;
            border-radius: 05px;
            padding: 20px 15px 20px 15px;
            margin: 10px 0px 15px 0px;
        }

        select{
            width: 90%;
            border: 1px solid brown;
            border-radius: 05px;
            box-shadow: 1px 1px 2px 1px grey;
            padding: 10px 15px 10px 15px;
        }


        .center {
  display: flex;
  justify-content: center;
  align-items: center;
 
}
        </style>
</head>
<body>
    <center> <h1>Booking Details</h1></center>
    <div class="container">
<form name="f1" action="" method="POST">
    <label> Username:</label>
    <input type="text" class="txt" name="username" placeholder="Enter Your Name"/><br>

    <label> Email-ID:</label>
    <input type="email" class="txt" name="email" placeholder="Enter Your Email-ID"/><br>

    <label> Phone No:</label>
    <input type="number" class="txt" name="phoneno" placeholder="Enter Your Phone No"><br>


    <label>Movie Name:</label>
    <input type="text" class="txt" name="moviename" placeholder="Enter Your Movie name"/><br>


    <label>Select Movie </label><br><br>
    <select name="ticketprice" id="ticketprice">
        <option value="">--select--</option>
        <option value="220">355 (RS.220)</option>
        <option value="200">Badava Rascal (RS.200)</option>
        <option value="190">DNA (RS.190)</option>
        <option value="250">James (RS.250)</option>
        <option value="200">Kashmir Flies (RS.200)</option>
        <option value="260">King Richard (RS.260)</option>
        <option value="230">Parvazz (RS.230)</option>
        <option value="260">PAW (RS.260)</option>
        <option value="240">Radhe Shyam (RS.240)</option>
        <option value="210">RRR (RS.210)</option>
        <option value="260">The King's Man (RS.260)</option>
        <option value="230">Vikrant Rona (RS.230)</option>
    </select><br><br>

    
    <label>Show Time & Date:</label>
    <input type="text" class="txt" id="showtime" name="showtime"  placeholder="Enter Show time"/><br>
    

    <label>No of Seats :</label>
    <input type="number" class="txt" id="noofseats" name="noofseats"  placeholder="Enter how many seats you booked"/><br>
    
    <label>Seat ID :</label>
    <input type="text" class="txt" id="seatid" name="seatid"  placeholder="Enter Seat ID's"/><br>

    <input type="button" onclick="myFunction()" value="---- total-----" align="center"> <br><br>

    <label>Total Price :</label>
    <input type="text" class="txt" id="totalprice"  placeholder="Total Ticket Price is:"/><br>

<input type="submit" class="txt" name="insert" value="INSERT DATA"/>
 
</form>
</div>
 
<br><br>
     <div class="center"> 
<button onclick="window.location.href='payment.html';"  class="btn btn-secondary" id="btn1" style="align-items:center";> Payment</button>
    </div> 


<script>
function myFunction() {
    var mp = document.f1.ticketprice.value;
  var p = document.f1.noofseats.value;
   /*var txt = document.getElementById("totalprice").value;*/
  var totalprice = mp*p;
  document.getElementById("totalprice").value = totalprice;
}
    </script>
</body>
</html>

<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'confirmbook');

if(isset($_POST['insert']))
{
    $username=$_POST['username'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $moviename = $_POST['moviename'];
    $ticketprice = $_POST['ticketprice'];
    $noofseats = $_POST['noofseats'];
    $seatid = $_POST['seatid'];
    $gsm = $ticketprice * $noofseats ;
   // $totalprice = $_POST['totalprice'];
    $showtime = $_POST['showtime'];
    

$query = "INSERT INTO `yourbooking`(`username`,`email`,`phoneno`,`moviename`,`ticketprice`,`noofseats`,`seatid`,`totalprice`,`showtime`) VALUES('$username','$email','$phoneno','$moviename','$ticketprice','$noofseats','$seatid','$gsm','$showtime')";
$query_run = mysqli_query($connection,$query);

if($query_run)
{
    echo ' <script type="text/javascript"> alert("Your Booking has been confirmed") </script>';
}

else
{
    echo ' <script type="text/javascript"> alert("data not saved") </script>';
}

}

?>


