<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<script>
    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">

</head>
<body>

<div class="w3layouts-main"> 
    <div class="bg-layer">
        <h1 style="color: white; text-shadow: 1px 1px 8px black;">Sentinel User Registration</h1>
        <div class="header-main">
            <div class="main-icon">
                <span class="fa fa-user-plus"></span>
            </div>
            <div class="header-left-bottom">
                <form action="#" method="post">
                    <div class="icon1">
                     <span class="fa fa-id-badge"></span>
                     <input type="number" placeholder="User ID" name="user_id" required=""/>
                    </div>
                    <div class="icon1">
                        <span class="fa fa-user"></span>
                        <input type="text" placeholder="First Name" name="user_fname" required=""/>
                    </div>
                    <div class="icon1">
                        <span class="fa fa-user"></span>
                        <input type="text" placeholder="Last Name" name="user_lname" required=""/>
                    </div>

                    <div class="icon1">
                        <span class="fa fa-envelope"></span>
                        <input type="email" placeholder="Email" name="user_email" required=""/>
                    </div>

                    <div class="icon1">
                        <span class="fa fa-lock"></span>
                        <input type="password" placeholder="Password" name="user_password" required=""/>
                    </div>

                    <div class="icon1">
                        <span class="fa fa-user"></span>
                        <input type="text" placeholder="Gender" name="user_gender" required=""/>
                    </div>

                    <div class="icon1">
                        <span class="fa fa-image"></span>
                        <input type="text" placeholder="Image" name="user_image" required=""/>
                    </div>
                   
                    <div class="bottom">
                        <button class="btn" type="submit" name="submit" style="background-color:rgb(10, 20, 122); color: white; padding: 10px 20px; border: none; cursor: pointer;">Register</button>
                    </div>
                    <div class="links">
                    <p class="right"><a href="index.php">Home</a></p>
                        <div class="clear"></div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>  

<?php
session_start();
require 'Classes/init.php';
$func = new Operation();

if (isset($_POST['submit'])) {
    $id = $_POST["user_id"]; 
    $fname = $_POST["user_fname"];
    $lname = $_POST["user_lname"];
    $email = $_POST["user_email"];
    $password = $_POST["user_password"];
    $status=0;
    $gender = $_POST["user_gender"];
    $image = $_POST["user_image"];

    $result = $func->insert('user',array('user_id','user_fname','user_lname','user_email','user_password','user_status','user_gender','user_image'),array("'$id'", "'$fname'","'$lname'","'$email'","'$password'","'$status'","'$gender'","'$image'"));

    if ($result) {
        $message = "Registration Successful!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $message = "Error in Registration!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>
</body>
</html>
