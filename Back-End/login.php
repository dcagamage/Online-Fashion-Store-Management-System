<?php
    include_once 'header.php';
?>

    <link rel="stylesheet" href="CSS/navbar-footer.css">
    <link rel="stylesheet" href="CSS/login-register.css?v=1.1">

<?php
    include_once 'navbar.php';
?>

    <!-- login form  -->
    <div class="login-form">
        <h1>Login</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Log In</h2>

                    <form action="includes/login.inc.php" method="post">
                        <input type="text" name="uid" placeholder="User Name or User E-mail" required autofocus>
                        <input type="password" name="pwd" placeholder="User Password" required autofocus>
                        <button class="btn" name="submit" type="submit">
                            Login
                        </button>
                    </form>

                    <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyinput"){
                            echo '<div class="error">Fill in all fields!</div>';
                        } else if($_GET["error"] == "wronglogin"){
                            echo '<div class="error">Invalid Details!</div>';
                        } else if($_GET["error"] == "wrongpassword"){
                            echo '<div class="error">Invalid Password!</div>';
                        } else if($_GET["error"] == "stmtfailed"){
                            echo '<div class="error">Something went wrong!</div>';
                        } else if($_GET["error"] == "none"){
                            echo '<div class="success">Account Created Successfully!</div>';
                        }
                    }
                    ?>

                    <p class="account">Don't Have an Account? <a href="register.php">Register</a> </p>

                </div>
                <div class="form-img">
                    <img src="images/login.png" alt="">
                </div>
            </div>
        </div>
    </div>

<?php
    include_once 'footer.php';
?>