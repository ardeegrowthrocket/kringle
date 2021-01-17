<?php
    include("dashboard/connect.php");
    include("dashboard/function.php");

    if($_GET['id']==''){
        $cms = cmsdata(1);
    }else{
        $cms = cmsdata($_GET['id']);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<link rel="apple-touch-icon" sizes="57x57" href="fav/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="fav/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="fav/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="fav/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="fav/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="fav/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="fav/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="fav/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="fav/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="fav/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="fav/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
<link rel="manifest" href="fav/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="fav/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    <!-- Title -->
    <title>Kringle Cash Exchange - <?php echo $cms['pagetitle']; ?></title>

    <!-- Favicon -->

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <style>
.owl-stage a {
    color: white!important;
    text-decoration: underline;
}

    </style>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="top-header-content h-100 d-flex align-items-center justify-content-between">
                            <!-- Top Headline -->
                            <div class="top-headline">
                                <p>Welcome to <span>Kringle Cash Exchange</span></p>
                            </div>
                            <!-- Top Login & Faq & Earn Monery btn -->
                            <div class="login-faq-earn-money">
                                <a href="/dashboard/login.php">Login</a>
                                <a href="/dashboard/register.php">Register</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="cryptos-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="cryptosNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.php"><img src="img/logo.png" alt="" style="width:132px;"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>

                                    <?php
                                    $qx = mysql_query_md("SELECT * FROM `tbl_cms`");

                                        while( $row = mysql_fetch_md_array($qx)) {

           

                                    ?>
                                        <li><a href="index.php?id=<?php echo $row['id']; ?>"><?php echo $row['pagetitle']; ?></a></li>
                                    <?php
                                    }
                                    ?>

                                    
                                </ul>

                                <!-- Newsletter Form -->


                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <?php if($cms['id']==1) { ?>
    <section class="hero-area">
            <?php echo $cms['pagecontent']; ?>
    </section>
    <?php } else { ?>


    <div class="breadcumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md-6">
                    <div class="breadcumb-text">
                        <h2><?php echo $cms['pagetitle']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcumb Thumb Area -->
        <div class="breadcumb-thumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcumb-thumb">
                            <img src="img/IMG_3400.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="cryptos-feature-area section-padding-100-0">
            <?php echo $cms['pagecontent']; ?>
    </div>
    <?php } ?>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Course Area Start ##### -->
    <div class="cryptos-feature-area section-padding-100-0">
            <?php echo $cms['p1']; ?>
    </div>
    <!-- ##### Course Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="cryptos-about-area">
            <?php echo $cms['p2']; ?>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Currency Area End ##### -->

    <section class="cryptos-about-area">
            <?php echo $cms['p3']; ?>
    </section>




   <hr>
   <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row">


                <!-- Contact Form Area -->
                <div class="col-12 col-lg-12">
                    <h2>Contact Us</h2>
                    <div class="contact-form-area mb-100">
                        <form action="#" method="post">
                            <input type="text" class="form-control" id="name" placeholder="Name">
                            <input type="email" class="form-control" id="email" placeholder="E-mail">
                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                            <button class="btn cryptos-btn btn-2 mt-30" type="submit">Contact Us</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Main Footer Area -->

        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>