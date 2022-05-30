<!DOCTYPE html>
<html>
<head>
    <title>Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <style type="text/css">
        body
        {
            background-image:url(movie-ticketing.jpg);
            background-size: cover;
            background-repeat: no-repeat;
  			background-attachment: fixed;
            font-family: Times New Roman;
        }
        h1
        {
            text-align: center;
            font-size: 40px;
        }

        .Login
        {
            text-align: center;
            max-width: 450px;
            border-radius: 20px;
            margin: auto;
            /*background:rgba(0,0,0,0.7);*/
            background:rgb(0, 115, 230);
            box-sizing: border-box;
            padding: 50px;
            color: white;
            margin-top: 60px;


        }
        .form
        {
            text-align: center;
            width: 100%;
            box-sizing: border-box;
            padding: 15px 6px;
            background: rgba(0,0,0,0.10);
            outline: none;
            border: none;
            border-bottom: 1px dotted #fff;
            border-radius: 5px;
            margin: 5px;
            font-weight: bold;
            font-size: 18px;
            color: black;
            opacity : 0.9;

        }
        .main{
            width: 400px;
            margin: 100px auto 0px auto
        }
        input[type=Submit]
        {
            width: 50%;
            box-sizing: border-box;
            padding: 10px 0;
            margin top: 30px;
            outline: none;
            border: none;
            background: Darkblue;
            opacity: 0.7;
            border-radius: 20px;
            font-size: 20px;
            color: #fff;

        }


    </style>
</head>
<body>
    <div class = "main">
        <div class ="form">
        <h1>Login here</h1>
        <form name="f1" action ="" onsubmit = "return validation()" method = "POST">
            <p>
                <label> UserName: </label>
                <input type = "email" id ="email" name  = "email" placeholder="Enter registered email"/>
            </p>
            <p>
                <label> Password: </label>
                <input type = "password" id ="ps" name  = "ps" placeholder="Enter password"/>
            </p>
            <p>
                <input type =  "submit" id = "btn" value = "Login" />
            </p>
            New user? <a href="Signup.php">Try sign in </a>
        </form>
        </div>
    </div>

    <script>
            function validation()
            {
                var id=document.f1.email.value;
                var pas=document.f1.ps.value;
                if(id.length=="" && pas.length=="") {
                    alert("User Name and Password fields are empty");
                 return false;
                }
                else
                {
                    if(id.length=="") {
                        alert("User Name is empty");
                      return false;
                    }
                    if (pas.length=="") {
                    alert("Password field is empty");
                 return false;
                    }
                   
                }
            }
        </script>
<?php
    if(isset($_POST['email']) && isset($_POST['ps'])){
    include('connection.php');
    $email = $_POST['email'];
    $p = $_POST['ps'];

        //to prevent from mysqli injection
        $email = stripcslashes($email);
        $p = stripcslashes($p);
        $email = mysqli_real_escape_string($con, $email);
        $p = mysqli_real_escape_string($con, $p);

        $sql = "select * from data where email = '$email' and ps = '$p'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $c=3;
        if($count == 1){
        ?>
            <script type="text/JavaScript">
            window.location = "home.html"
             </script>
        <?php
        }
        else{
            echo'<script type="text/JavaScript">';
            echo 'alert("Login failed. Invalid username or password.")';
            echo'</script>';
            $c--;
        }

        if($c == 0)
        {
        echo"<h1> Page Locked .</h1>";
        }}
?>
</body>
</html>