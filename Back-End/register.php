<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="CSS/navbar-footer.css">
    <link rel="stylesheet" href="CSS/login-register.css?v=1.1">

<?php
    include_once 'navbar.php';
?>
    
    <!-- register form  -->
    <div class="reg-form">
        <h1>Register</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Register</h2>
                    <form action="includes/register.inc.php" method="post">
                        <label for="fname">Name:</label>
                        <input type="text" name="name" placeholder="Name" required autofocus>
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" placeholder="E-mail address" required autofocus>
                        <label for="lname">Username:</label>
                        <input type="text" name="uid" placeholder="Username" required autofocus>
                        <label for="sPwd">Set Password:</label>
                        <input type="password" name="pwd" placeholder="New Password" required autofocus>
                        <label for="cPwd">Confirm Password:</label>
                        <input type="password" name="pwdrepeat" placeholder="Re-type Password" required autofocus>
                        <button class="btn" name="submit" type="submit">
                            Register
                        </button>
                    </form>
                    
                    <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyinput"){
                            echo '<div class="error">Fill in all fields!</div>';
                        } else if($_GET["error"] == "invaliduid"){
                            echo '<div class="error">Invalid Username!</div>';
                        } else if($_GET["error"] == "invalidemail"){
                            echo '<div class="error">Invalid Email Address!</div>';
                        } else if($_GET["error"] == "passwordsdontmatch"){
                            echo '<div class="error">Password not matching!</div>';
                        } else if($_GET["error"] == "stmtfailed"){
                            echo '<div class="error">Something went wrong!</div>';
                        } else if($_GET["error"] == "usernametaken"){
                            echo '<div class="error">Username / Email already in use!</div>';
                        } else if($_GET["error"] == "none"){
                            echo '<div class="success">Account Created Successfully!</div>';
                        }
                    }
                    ?>

                    <p class="account">Already Have an Account? <a href="./login.php">Login</a> </p>

                </div>
                <div class="form-img">
                    <img src="images/register.png" alt="">
                </div>
            </div>
        </div>
    </div>

<?php
    include_once 'footer.php';
?>