<!DOCTYPE html>
<html>
<head>
    <title> Sign up </title>
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
        *{
            margin: 10;
            padding: 0;
        }
        h1
        {
            text-align: center;
            font-size: 40px;
        }

        .Signup
        {
            text-align: center;
            max-width: 350px;
            border-radius: 20px;
            margin: auto;
            background:rgba(0,0,0,0.7);
            box-sizing: border-box;
            padding: 100px;
            color: black;
            margin-top: 60px;


        }
        .form
        {
            text-align: center;
            width: 100%;
            box-sizing: border-box;
            padding: 15px 6px;
            background: rgba(0,0,0,0.30);
            outline: none;
            border: none;
            border-bottom: 1px dotted #fff;
            border-radius: 5px;
            margin: 5px;
            font-weight: bold;
            font-size: 18px;
            opacity : 0.9;
            color: black;

        }

        .main{
            width: 400px;
            margin: 100px auto 0px auto
        }


        input[type=Submit]
        {
            width: 20%;
            box-sizing: border-box;
            padding: 10px 0;
            margin top: 30px;
            outline: none;
            border: none;
            background: Darkblue;
            opacity: 0.9;
            border-radius: 20px;
            font-size: 20px;
            color: #fff;

        }


    </style>

</head>
<body>
    <div class="main">
    <div class = "form">
        <h1>Sign Up here</h1>
        <form name="f1" action = "" onsubmit = "return validation() " method = "POST">
               <p>
                <label>First Name: </label>
                <input type = "text" id ="Fname" name  = "Fname" placeholder="Enter first name" />
               </p>
            <p>
                <label>Last Name: </label>
                <input type = "text" id ="Lname" name  = "Lname" placeholder="Enter last name" />
        </p><p>
                <label>Address: </label>
                <input type = "text" id ="addr" name  = "addr" placeholder="Enter Address" />
        </p><p>
                <label>Phone No: </label>
                <input type = "number" id ="phno" name  = "phno" placeholder="Enter Phone no" />
        </p><p>

                <label> Email: </label>
                <input type = "email" id ="email" name  = "email" placeholder="Enter a valid email" />
        </p><p>
                <label> Password: </label>
                <input type = "password" id ="pas" name  = "pas" placeholder="Enter password" />
        </p><p>
            <label> Confirm Password: </label>
                <input type = "password" id ="s" name  = "pa" placeholder="Enter password again" />
        </p>
            <p>
                <input type =  "submit" id = "btn" value = "Sign Up" />
            </p>
        </form>
    </div>
    </div>
    <script>
            function validation()
            {
                var fid=document.f1.Fname.value;
                var lid=document.f1.Lname.value;
                var aid=document.f1.addr.value;
                var phid=document.f1.phno.value;
                var eid=document.f1.email.value;
                var pid=document.f1.pas.value;
                var p=document.f1.pa.value;

                if(fid.length=="" && lid.length=="" && aid.length=="" && phid.length=="" && eid.length=="" && pid.length=="" && p.length=="") {
                    alert("Multiple fields are empty");
                    return false;
                }
                else
                {
                    if(fid.length=="") {
                        alert("First Name field is empty");
                        return false;
                    }
                    if(lid.length=="") {
                        alert("Last Name field is empty");
                        return false;
                    }
                    if(aid.length=="") {
                        alert("Address field is empty");
                        return false;
                    }
                    if(phid.length=="") {
                        alert("Phone no field is empty");
                        return false;
                    }
     
                    if(eid.length=="") {
                        alert("Email field is empty");
                        return false;

                    }
                    if (pid.length=="") {
                    alert("Password field is empty.");
                    return false;
                    }
                
                    if(p.length=="") {
                        alert("Confirm the password");
                        return false;
                    }
                }
            }
        </script>
<?php
    if(isset($_POST['email']) && isset($_POST['pas'])){
    include('connection.php');
    $email = $_POST['email'];
    $ps = $_POST['pas'];

        //to prevent from mysqli injection
        $email = stripcslashes($email);
        $ps = stripcslashes($ps);

        $sql_query="INSERT INTO data (email,ps)
    VALUES('$email','$ps')";
    try{
    if(mysqli_query($con, $sql_query))
    {
        ?>
            <script type="text/JavaScript">
            window.location = "home.html"
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
</body>
</html>