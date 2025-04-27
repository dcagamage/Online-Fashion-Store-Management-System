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

    <!-- footer -->
    <footer>
        <div class="row">
            <div class="footer-col company-info">
                <img src="https://t3.ftcdn.net/jpg/03/24/75/46/360_F_324754632_LRC1yH2prRSccyk3gyEF3W8ptZxSElCP.jpg"
                 alt="Company Logo" class="company-logo">
                <div class="company-text">
                    <h3>Vogue Vista</h3>
                    <p>"Lorem ipsum dolor sit amet"</p>
                </div>
            </div>
            <div class="footer-col about">
                <h3>About Us</h3>
                <p class="about">Lorem, ipsum dolor sit amet illo tio consectetur adipisicing elit. 
                    Dolore illo recusandae assumenda lorem ipsum dolor sit amet.</p>
            </div>
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul class="menu">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Services</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Contact Info:</h3>
                <ul>
                    <li><a href="">Phone: (+94) 777022022</a></li>
                    <li><a href="">E-mail: voguevista@gmail.com</a></li>
                </ul>
            </div>
        </div>
        <div class="socials">
            <h3>Follow Us</h3>
            <ul class="social_icon">
                <li><a href=""><ion-icon name="logo-facebook"></ion-icon></a></li>
                <li><a href=""><ion-icon name="logo-twitter"></ion-icon></a></li>
                <li><a href=""><ion-icon name="logo-linkedin"></ion-icon></a></li>
                <li><a href=""><ion-icon name="logo-instagram"></ion-icon></a></li>
            </ul>
        </div>
        <div class="copyright">
            <hr>
            <p>© 2025 Vogue Vista | All Rights Reserved</p>  
        </div>
    </footer>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="JS/script.js"></script>
</body>

</html>