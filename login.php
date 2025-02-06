<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch'
        href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="images/ikonn.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/bgicon.png" alt="">
                </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" style="color: white; font-weight: 500;"
                                href="index.php">Home
                                <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" style="color: white; font-weight: 500;"
                                href="restaurants.php">UMKM <span class="sr-only"></span></a> </li>
                        <?php
                        if (empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" style="color: white; font-weight: 500;"class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" style="color: white; font-weight: 500;" class="nav-link active">Register</a> </li>';
                        } else {
                            echo  '<li class="nav-item"><a href="your_orders.php" style="color: white; font-weight: 500;"class="nav-link active">My Orders</a> </li>';
                            echo  '<li class="nav-item"><a href="logout.php"style="color: white; font-weight: 500;" class="nav-link active">Logout</a> </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div style="background:#F2F1EB;background-image: url(images/bglogin2.gif), url(images/bglogin.gif);
background-repeat: no-repeat, space;
background-position:0px 130px , 105% 100px">

        <?php
        include("connection/connect.php");
        error_reporting(0);
        session_start();
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (!empty($_POST["submit"])) {
                $loginquery = "SELECT * FROM users WHERE username='$username' && password='" . md5($password) . "'"; //selecting matching records
                $result = mysqli_query($db, $loginquery); //executing
                $row = mysqli_fetch_array($result);

                if (is_array($row)) {
                    $_SESSION["user_id"] = $row['u_id'];
                    header("refresh:1;url=index.php");
                } else {
                    $message = "Invalid Username or Password!";
                }
            }
        }
        ?>


        <div class="pen-title">
            < </div>

                <div class="containerlog">
                    <div class="forms">
                        <div class="form login">
                            <span class="title">Login</span>
                            <br>
                            <span style="color: red;"><?php echo $message; ?></span>
                            <span style="color: green;"><?php echo $success; ?></span>
                            <form action="" method="post">
                                <div class="input-field">
                                    <input type="text" placeholder="Enter your username" name="username">
                                    <i class="uil uil-user"></i>
                                </div>
                                <div class="input-field">
                                    <input type="password" class="password" placeholder="Enter your password"
                                        name="password">
                                    <i class="uil uil-lock icon"></i>
                                    <i class="uil uil-eye-slash showHidePw"></i>
                                </div>
                                <div class="input-field button">
                                    <input type="submit" name="submit" value="Login">
                                </div>
                            </form>
                            <div class="login-signup">
                                <span class="text">Not registered?
                                    <a href="registration.php" class="text signup-link">Create account</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                <div class="container-fluid pt-3">
                    <p></p>
                </div>
                <footer class="footer">
                    <div class="container">
                        <div class="bottom-footer">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 payment-options color-gray">
                                    <h5>Payment Options</h5>
                                    <ul>
                                        <li>
                                            <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/dana.png" alt="Dana"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/gopay.png" alt="Gopay"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/ovo.png" alt="Ovo"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/spay.png" alt="Shopeepay"> </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 address color-gray">
                                    <h5>Address</h5>
                                    <p>Jl. Jend. Sudirman No. 48 Palembang</p>
                                    <h5>Phone: 8219345678</h5>
                                </div>
                                <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                    <h5>Addition informations</h5>
                                    <p>Join thousands of other umkm who benefit from having partnered with
                                        us.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <script src="js/login.js"></script>
</body>

</html>