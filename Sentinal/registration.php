<!DOCTYPE html>
<html>
<head>
<title>Admin Registration</title>
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
        <h1 style="color: white; text-shadow: 1px 1px 8px black;">Sentinel Admin Registration</h1>
        <div class="header-main">
            <div class="main-icon">
                <span class="fa fa-user-plus"></span>
            </div>
            <div class="header-left-bottom">
                <form action="#" method="post">
                    <div class="icon1">
                     <span class="fa fa-id-badge"></span>
                     <input type="number" placeholder="Admin ID" name="admin_id" required=""/>
                    </div>
                    <div class="icon1">
                        <span class="fa fa-user"></span>
                        <input type="text" placeholder="Name" name="admin_name" required=""/>
                    </div>
                    <div class="icon1">
                        <span class="fa fa-envelope"></span>
                        <input type="email" placeholder="Email Address" name="admin_email" required=""/>
                    </div>
                    <div class="icon1">
                        <span class="fa fa-lock"></span>
                        <input type="password" placeholder="Password" name="admin_password" required=""/>
                    </div>
                    <div class="icon1">
                        <span class="fa fa-image"></span>
                        <input type="text" placeholder="Image URL" name="admin_image" required=""/>
                    </div>
                   
                    <div class="bottom">
                        <button class="btn" type="submit" name="submit" style="background-color:rgb(10, 20, 122); color: white; padding: 10px 20px; border: none; cursor: pointer;">Register</button>
                    </div>
                    <div class="links">
                    <p class="right"><a href="index.php">User Login Here</a></p>
                        <div class="links">
                        <p class="right"><a href="userreg.php">Register as User</a></p>
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
    $id = $_POST["admin_id"]; 
    $name = $_POST["admin_name"];
    $email = $_POST["admin_email"];
    $password = $_POST["admin_password"];
    $image = $_POST["admin_image"];

    $result = $func->insert('admin',array('admin_id','admin_name','admin_email','admin_password','admin_image'),array("'$id'", "'$name'","'$email'","'$password'","'$image'"));

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
