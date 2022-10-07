<?php
require "googlelogin/config.php";
session_start();
if (!isset($_SESSION['showNoAccount']) || !isset($_SESSION['passwordError']) || !isset($_SESSION['passwordChanged']) || !isset($_SESSION['emailexistsGoogle']) || !isset($_SESSION['emailexistsSignup']) || !isset($_SESSION['showEmailError'])) {
    $_SESSION['showEmailError'] = false;
    $_SESSION['showNoAccount'] = false;
    $_SESSION['passwordError'] = false;
    $_SESSION['passwordChanged'] = false;
    $_SESSION['emailexistsGoogle'] = false;
    $_SESSION['emailexistsSignup'] = false;
}
else if($_SESSION['showNoAccount'] == true) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> No account exists with the given credentials. Please try again.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  unset($_SESSION['showNoAccount']);
}
else if ($_SESSION['passwordError'] == true) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  unset($_SESSION['passwordError']);
}
else if($_SESSION['passwordChanged'] == true){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Password has been changed successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  unset($_SESSION['passwordChanged']);
}
else if($_SESSION['emailexistsGoogle'] == true) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Account already exists with this email address. Please login with Google.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';  
  unset($_SESSION['emailexistsGoogle']);
}
else if($_SESSION['showEmailError'] == true){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Email ID  is already in use. Please try logging in or use a different email address.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  unset($_SESSION['showEmailError']);
}
else if($_SESSION['emailexistsSignup'] == true){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Account already exists with this email address. Please login with your credentials.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  unset($_SESSION['emailexistsSignup']);
}
$loginURL = $client -> createAuthUrl();   
?>
<!-- <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet" type="text/css">
    <title>Login</title>
    
</head>

<body>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row">
                           <a href="index.php"> <img src="img/Capture.JPG" class="logo"></a>
                        </div>
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                            <img src="img/transeparendt/pht (1).png" class="image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3">
                            <h6 class="mb-0 mr-4 mt-2">Sign in with</h6>
                            <div class="facebook text-center mr-3">
                                <div class="fa fa-facebook"></div>
                            </div>
                            <div class="twitter text-center mr-3">
                                <div class="fa fa-twitter"></div>
                            </div>
                            <div class="google text-center mr-3">
                                <a href="<?php echo $loginURL; ?>">
                                <div class="fa fa-google"></div>
                            </a>
                            </div>
                        </div>
                        <div class="row px-3 mb-4">
                            <div class="line"></div>
                            <small class="or text-center">Or</small>
                            <div class="line"></div>
                        </div>
                        <form action="partials/_handleLogin.php" method="post">
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Email Address</h6>
                                </label>
                                <input class="mb-4" type="email" name="email" placeholder="Enter a valid email address" required>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label>
                                <input type="password" name="password" placeholder="Enter password" required>
                            </div>
                            <div class="row px-3 mb-4">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input id="chk1" type="checkbox" name="chk" class="custom-control-input">
                                    <label for="chk1" class="custom-control-label text-sm">Remember me</label>
                                </div>
                                <a href="forgot_password.php" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                            </div>
                            <div class="row mb-3 px-3">
                                <button type="submit" class="btn btn-blue text-center">Login</button>
                            </div>
                            <div class="row mb-4 px-3">
                                <small class="font-weight-bold">Don't have an account? <a
                                        class="text-danger" href="sign-up.php">Register</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3">
                <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2022 by Ekalakaar. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto">
                    <span class="fa fa-facebook mr-4 text-sm"></span>
                    <span class="fa fa-google-plus mr-4 text-sm"></span>
                    <span class="fa fa-linkedin mr-4 text-sm"></span>
                    <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://use.fontawesome.com/fa9660ba79.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</body>

</html> -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="new.css">
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link rel="stylesheet" href="animation.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fruktur&family=Irish+Grover&family=Lobster&family=Yesteryear&family=Zen+Kurenaido&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">



</head>

<body>

    <div class="">
        <nav class="navbar bg-light fixed-top" style="background-color: white;">
            <div class="container-fluid">
                <a class="navbar-brand " style="margin-left: 70px;" href="index.html">
                    <Span class="text-danger text"> <strong>ekala</strong></Span>kaar
                </a>


            </div>
        </nav>
        <div class="">
          
            <section class="  text-white">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="img/user-bg2.png" class="w-100" style="height:100vh;" alt="...">
                        </div>


                        <div class="carousel-caption mt-4  text-white" style=" margin-bottom:100px;">

                            <h1 class="text-center  " style="font-weight:bold; letter-spacing:10px;">WELCOME BACK!</h1>
                            <h3 class="text-center">login to Continue</h3>
                            
                            <div class="row">
                                <div class="col-5" style="margin: auto;">
                                    <form class="mt-4  text-start">

                                        <div class="mb-3 ">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" class="form-control shadow-lg  mb-2 bg-body rounded"
                                                id="exampleInputEmail1" aria-describedby="emailHelp">

                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control shadow-lg mb-2 bg-body rounded"
                                                id="exampleInputPassword1">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>

                                        </div> <a href="index.html" class=" btn btn-danger ">Sign-in</a><span> <a
                                                href="index.html" class=" btn btn-danger ">Register</a></span>
                                </div>
                                </form>

                            </div>
                            <div class="col-4 mt-4" style="margin: auto;">
                                <h3 class="text-center ">login with</h3>
                                <p class="soicals" style="letter-spacing:10px">
                                    <i class="bi bi-twitter  mx-1"></i>
                                    <i class="bi bi-facebook  mx-1"></i>
                                    <i class="bi bi-whatsapp  mx-1"></i>
                                    <i class="bi bi-instagram  mx-1"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>


    </div>
    </div>
    </section>


    </div>


    </div>

    <footer id="Contact" class="" style="padding-bottom:50px;background-color: black;">
        <div class="container">

            <div class="container text-center">
                <h2 class="text-white " style="padding-top: 20px;"><span class="text-danger">ekala</span>kar</h2>
                <p class="soicals mt-4" style="letter-spacing: 15px;">
                    <a href="https://www.linkedin.com/company/ekalakaaropportunies"> <i
                            class="bi bi-linkedin text-white mx-1"></i></a>
                    <a href="https://www.instagram.com/ekalakaar/"><i class="bi bi-instagram text-white mx-1"></i></a>


                    <a href="https://www.facebook.com/profile.php?id=100084854050118"><i
                            class="bi bi-facebook text-danger mx-1"></i></a>
                    <i class="bi bi-whatsapp text-white mx-1"></i>


                </p>


            </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>