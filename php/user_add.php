<?php      
if(isset($_POST['fname'])){    
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "mental_health";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
    $fname = $_POST['fname'];   
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];   
    $disability = $_POST['disability'];  
    $address = $_POST['address']; 
    $phone = $_POST['phone'];      
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $gender = $_POST['gender'];  
     
       
        //to prevent from mysqli injection  
        $fname = stripcslashes($fname); 
        $lname = stripcslashes($lname);  
        $email = stripcslashes($email);  
        $dob = stripcslashes($dob);
        $disability = stripcslashes($disability);
        $address = stripcslashes($address);
        $phone = stripcslashes($phone);
        $username = stripcslashes($username);  
        $password1 = stripcslashes($password1);  
        $gender = stripcslashes($gender);     

        $fname =  mysqli_real_escape_string($con,$fname);  
        $lname =  mysqli_real_escape_string($con,$lname);  
        $email =  mysqli_real_escape_string($con, $email); 
        $dob =  mysqli_real_escape_string($con,$dob);  
        $disability =  mysqli_real_escape_string($con,$disability);  
        $address =  mysqli_real_escape_string($con,$address);
        $phone =  mysqli_real_escape_string($con,$phone);  
        $username =  mysqli_real_escape_string($con, $username);  
        $password1 =  mysqli_real_escape_string($con, $password1);  
        $gender =  mysqli_real_escape_string($con, $gender);   
        //fname, lname, email, dob, disability, address, phone, username, password1, genders  
        if($password1==$password2){
          $check = true;
        

        // if($gender=="" || $age==""){
        //     $sql = "INSERT into user (fname, email, username, password) values('$name', '$email', '$username', '$password1')";
        //     if($con->query($sql) == true){
        //         //header("Location:Login.php");  
        //    echo "successfull";
        //      }
        //       else{ 
        //     // header("Location:Register.php");
        //     echo "oops age wala";
        //         }
        // } 
            $sql = "INSERT into user (fname, lname, email, dob, disability, address, phone, username, password, gender)  values('$fname', '$lname', '$email','$dob', '$disability', '$address', '$phone', '$username', '$password1', '$gender')";


            if (mysqli_query($con, $sql)) {
              header("Location:login.php");
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
       
    }
    else
            // header("Location:Register.php");
            echo "oops bahar";

            mysqli_close($con); 
}   
?>
       

<!DOCTYPE html>
<html>
<head>

    <head>
    <!-- <style type="text/css">
    @media screen and (max-width: 900px){
  .container-fluid{
    background: darkslategrey;}}

    </style> -->
    <title>Registration</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>
    <header>
  <img src = "images/icon.jpg"  height="60px" width ="60px" alt="">
            <a href="#" class="logo">Mental-Help<span>!</span></a>
            <div class = "menuToggle" onclick="toggleMenu(); "></div>
            <ul class="navigation">
                <li><a href="queries.html">Queries</a></li>
           </ul>
    </header>
    <br><br><br><br>
    <!-----------Main-Content---------><br><br>
    <center><h1 style="color:#3aaf9f">Thank you for choosing us!</h1></center>
<div class="wrapper" style="box-shadow: 5px 5px #E8E8E8">
    <div class="title">
        Register Here
    </div>
<hr>
<form method="POST">
    <center><img id="user" src="https://static.vecteezy.com/system/resources/thumbnails/000/550/980/small/user_icon_001.jpg" alt="user"></center>
 <div class="form" style="column-count: 2; column-gap: 40px;">
    <div class="column1">
   <div class="input_field">
      <input type="text" placeholder="First Name" class="input" id="fname" required name="fname">
   </div>
   <div class="input_field">
      <input type="text" placeholder="Last Name" class="input" id="lname" required name="lname">
   </div>
   <div class="input_field">
      <input type="text" placeholder="Email" class="input" id="email" required name="email">
   </div>
   <div class="input_field">
      <input type="date"  class="input" id="dob" required name="dob"> 
   </div>

   <div class="input_field">
      <input type="text"  class="input" placeholder="Eg. Bay Area, San Francisco, CA" id="address" required name="address">
   </div>
   <div class="input_field">
      <input type="text"  class="input" placeholder="Disability" id="disability" required name="disability">
   </div>
   <div class="input_field">
   <input type="tel" class="input" id="phone" name="phone"  placeholder="Enter phone number">
  </div>
   <div class="input_field">
      <input type="text" placeholder="Username" class="input" required name="username">
   </div>
     <div class="input_field">
          <input type="password" placeholder="Password" class="input" id="password1" maxlength="15" minlength="8" required name="password1" onkeyup="check()">
    </div>
    <div class="input_field">
    <span id="strength">Strength</span>
 </div>
   <div class="input_field">
    <p id="p1" style="font-size:11px;"></p>
   </div>
    <div class="input_field">
          <input type="password" placeholder="Confirm Password" class="input" id="password2" required name="password2">
    </div>

   <div class="input_field">
    <label><b>Gender</b></label><br>
      <input type="radio" name="gender" value="Male">
      <label>Male</label>
      <input type="radio"  name="gender" value="Female">
      <label> Female</label>
      <input type="radio" name="gender" value="Other">
      <label> Other</label>
   </div>
</div>
<!-- <div class="column2">

 </div> -->
 </div>
 <div >
      <center><input type="submit" name="submit" class="btn"></center>
   </div>
  </form>
</div><br><br><br><br><br><br>

<!---------FOOTER----------->

<footer class="footer">
    <div class="footer-container">
     <div class="f-row">
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
  
    <script type="text/javascript">
   function submitpage(){
password1=document.getElementById("password1").value;
password2=document.getElementById("password2").value;
if(password1!=password2)
{alert("Password didn't match");
return false;
}
}


function check(){
var pp=document.getElementById("p1").value
var a=document.getElementById("password1").value;
b=document.getElementById("password2").value;
var st = document.getElementById('strength');
num=/[0-9]/; uplet=/[A-Z]/; lowlet=/[a-z]/; spch=/[!@#$%^&*]/;
if(!uplet.test(a) || !num.test(a) || !lowlet.test(a) || !spch.test(a) || a.length<8)
{      p1.innerHTML="Password must contain atleast one uppercase letter, one lowercase letter, one special charachter and one numeric value"

        st.innerHTML = '<span style="color:red">Weak</span>';
    }
else
{
    st.innerHTML = '<span style="color:green">Strong!</span>';
    p1.innerHTML="Accepted"
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
</body>
</html>
