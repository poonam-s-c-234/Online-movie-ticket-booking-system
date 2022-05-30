<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style1.css" />
    <title>Movie Seat Booking</title>
    <style>
     
    </style>
  </head>
  <body>
    <div class="movie-container">
      <label> Select a movie:</label>
      <select id="movie">
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

      </select>
    </div>

    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>Available</small>
      </li>
      <li>
        <div class="seat selected"></div>
        <small>Selected</small>
      </li>
      <li>
        <div class="seat sold"></div>
        <small>Sold</small>
      </li>
    </ul>
    <div class="container">
      <div class="screen"></div> 
      <div class="row">
        <p>A1</p> <div class="seat"></div><p>A2</p> 
        <div class="seat"></div> 
        <div class="seat"></div> <p>A3</p>
        <div class="seat"></div> <p>A4</p>
        <div class="seat"></div> <p>A5</p>
        <div class="seat"></div> <p>A6</p>
        <div class="seat"></div> <p>A7</p>
        <div class="seat"></div> <p>A8</p>
      </div>
	 
	 
	 
      <div class="row">
          <p>B1</p>  <div class="seat"></div>    <p>B2</p>
        <div class="seat"></div>  
        <div class="seat"></div>    <p>B3</p>
        <div class="seat sold"></div>    <p>B4</p>
        <div class="seat sold"></div>    <p>B5</p>
        <div class="seat"></div>    <p>B6</p>
        <div class="seat"></div>    <p>B7</p>
        <div class="seat"></div>    <p>B8</p>
      </div>

      <div class="row">
      <p>C1</p>   <div class="seat"></div>    <p>C2</p>
        <div class="seat"></div>   
        <div class="seat"></div>    <p>C3</p>
        <div class="seat"></div>    <p>C4</p>
        <div class="seat"></div>    <p>C5</p>
        <div class="seat"></div>    <p>C6</p>
        <div class="seat sold"></div>    <p>C7</p>
        <div class="seat sold"></div>    <p>C8</p>
      </div>
      <div class="row">
      <p>D1</p>   <div class="seat"></div>    <p>D2</p>
        <div class="seat"></div>   
        <div class="seat"></div>    <p>D3</p>
        <div class="seat"></div>    <p>D4</p>
        <div class="seat"></div>    <p>D5</p>
        <div class="seat"></div>    <p>D6</p>
        <div class="seat"></div>    <p>D7</p>
        <div class="seat"></div>    <p>D8</p>
      </div>
      <div class="row">
        <p>E1</p> <div class="seat"></div>    <p>E2</p>
        <div class="seat"></div>   
        <div class="seat"></div>    <p>E3</p>
        <div class="seat sold"></div>    <p>E4</p>
        <div class="seat sold"></div>    <p>E5</p>
        <div class="seat"></div>    <p>E6</p>
        <div class="seat"></div>    <p>E7</p>
        <div class="seat"></div>    <p>E8</p>
      </div>
      <div class="row">
        <p>F1</p> <div class="seat"></div>    <p>F2</p>
        <div class="seat"></div>   
        <div class="seat"></div>    <p>F3</p>
        <div class="seat"></div>    <p>F4</p>
        <div class="seat sold"></div>    <p>F5</p>
        <div class="seat sold"></div>    <p>F6</p>
        <div class="seat sold"></div>    <p>F7</p>
        <div class="seat"></div>    <p>F8</p>
      </div>
    </div>

    <p class="text">You have selected <span id="count">0</span> seat for a price of RS.<span id="total">0</span> </p>
<br>
<?php
    if(isset($_POST['seat']) && isset($_POST['total'])){
    include('connection.php');
    $seatno = $_POST['seat'];
    $total = $_POST['total'];

        //to prevent from mysqli injection
        $seatno = stripcslashes($seatno);
        $total = stripcslashes($total);

        $sql_query="INSERT INTO book (seatno,total)
    VALUES('$seatno','$total')";
    try{
    if(mysqli_query($con, $sql_query))
    {
        ?>
            <script type="text/JavaScript">
            window.location = "confirmbooking.php"
             </script>
        <?php
    }
    else
    {
        throw new Exception("Primary key breach");
    }
    }

    catch(Exception $e){
            echo'<script type="text/JavaScript">';
            echo 'alert("Already registered . Try login .")';
            echo'</script>';
    }
    mysqli_close($con);
   }
   else{

   }
 ?>
    
<button onclick="window.location.href='confirmbooking.php';"  class="btn btn-secondary" id="btn1"> Next</button>
   
    
    <script src="script1.js"></script>

  </div>
  </body>
</html>





