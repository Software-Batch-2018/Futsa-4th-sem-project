<?php

session_start();
if(isset($_SESSION['email'])){
    header('Location: /futsa/index.php');
}
?>

<html>

<head>
<link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link type="text/css" href="userRegister.css" rel="stylesheet">
    <link type="text/css" href="../../src/css/ui.css" rel="stylesheet">
</head>

<body>
    <div class="form-container">
        <div class="inside-form-container">
            <form action="userRegisterBack.php" method="POST">
                <!-- <?php //include("../../error.php"); ?>  -->
                <div class='images-logo'><a href="../../index.php"><img src="../../src/images/logo.png" /></a> </div>
                <div class="header">
                    <h2>Create your account</h2>
                </div><br>
                <input type="Text" name="fullName" placeholder="Full Name" required /> <br />
                <input type="text" name="email" placeholder="Email address" required /><br />
                <input type="password" name="password" placeholder="Password" required /><br />
                <input type="text" name="address" placeholder="Address" required /><br />
                <input type="text" name="phonenum" placeholder="Phone Number" required /><br />
                <input class="button-success" type="submit" name="register"><br /> <br />
                <a href="../../login/userLogin/userLoginView.php"><i>Already Have an Account ?</i></a><br />
                <a href="../RegisterAdmin/adminRegisterView.php"><i>Register as Futsal Owner</i></a><br />

                <a href="#"><i>Forgotten Password ?</i></a>
        </div>
        </form>
    </div>
    </div>
</body>
</html>