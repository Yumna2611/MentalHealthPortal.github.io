<?php   
$count=1;
session_start(); 
if(isset($_POST['user'])){    
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "mental_health";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

        $username = $_POST['user'];  
        $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from user where username = '$username' and password = '$password'"; 
        $_SESSION["fname"] = 
        $result = mysqli_query($con, $sql);
        if($result){
            $row = mysqli_num_rows($result);
            if($row==1){
                while($row = mysqli_fetch_assoc($result)) {
                    $_SESSION["fname"] = $row["fname"];
                    $_SESSION["lname"] = $row["lname"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["dob"] = $row["dob"];
        
                    $_SESSION["disability"] = $row["disability"];
                    $_SESSION["address"] = $row["address"];
                    $_SESSION["phone"] = $row["phone"];
                    $_SESSION["gender"] = $row["gender"];
        
        
        
                    echo "id: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
                  }
                $con->close(); 
                //idhar welcome daalna hoga
                header("Location:home.html");
                echo "hurray";
            }
            else
                {$count=0;
                $message="Invalid";
             }
        }
      
  
 }       
         
 {
  ?> 

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Font Awesome -->   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style_2.css">
    <link rel='stylesheet' type="text/css" href="style_user_prof.css">
    <title>Login page</title>
  </head>
  <body>
  <header>
  <img src = "images/icon.jpg"  height="60px" width ="60px" alt="">
            <a href="#" class="logo">Mental-Help<span>!</span></a>
            <div class = "menuToggle" onclick="toggleMenu(); "></div>
            <ul class="navigation">
                <li><a href="queries.html">Queries</a></li>
                <li><a href="user_add.php">Register</a></li>
          
           </ul>
          </header>
          <br><br><br>
    <!-----------Main-body-------->
    <center><h1 style="color:#3aaf9f">Good to see you again!</h1></center>
    <div class="wrapper" style="max-width: 500px;">
  <div class="title">
    Login
</div>
<center><img id="user" src="https://static.vecteezy.com/system/resources/thumbnails/000/550/980/small/user_icon_001.jpg" alt="user"></center>
<hr>
<!- -->
<form onsubmit = "return validation()" method = "POST">
 <div class="form">
  <div class="column1">
   <div class="input_field">
      <input type="text" placeholder="Username" class="input" name  = "user">
   </div>
 <div class="input_field">
      <input type="password" placeholder="Password" class="input" id ="pass" name  = "pass" >
   </div>
 </div>
   <div style="display: flex;">
      <input type="submit" name="submit" class="btn" value="Login" id="btn">
   </div>
<div>
    <a href="forgot.php">Forgot Password</a>
</div>
<div><?php 
 
   if($count==0){
   echo "<p id='message>Invalid";
    }
    
    ?>

</div>
 </div>
</form>
 <?php
  }
  ?>
</div>


<!---------FOOTER----------->
<footer class="footer">
    <div class="footer-container">
     <div class="row">
       <div class="footer-col">
         <h4><b>ADDRESS</b></h4>
         <ul>
           <li><a href="#">Lorem Ipsum dolor, 234
             1200 Consecteur
             Adipiscing</a></li>
         </ul>
       </div>
       <div class="footer-col">
         <h4><b>FOLLOW US</b></h4>
         <div class="social-links">
          <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-instagram"></i>
          <i class="fa fa-youtube"></i>
          <p>© 2022, Mental-Help</p>
        </div>
       </div>
       <div class="footer-col">
         <h4><b>CONTACT US</b></h4>
         <ul>
           <li><a href="#">+123 456 789</a></li>
           <li><a href="#">mental_health@skype</a></li>
           <li><a href="#">enquiry@mentalhealth.com</a></li>
         </ul>
       </div>
     </div>
    </div>
  </footer>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>  
            function validation()  
            {  
                var id=document.getElementByName("username").value;  
                var ps=document.getElementById("password").value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            } 
            
    // Sticky navbar 
window.addEventListener('scroll', function() {
   const header = document.querySelector('header');
   header.classList.toggle("sticky", window.scrollY > 0);
});

// Responsive navbar
function toggleMenu() {
   const menuToggle = document.querySelector('.menuToggle');
   const navigation = document.querySelector('.navigation');
   menuToggle.classList.toggle('active');
   navigation.classList.toggle('active');
}
            
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

  </body>
</html>
