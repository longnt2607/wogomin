<?php 
    if(!isset($_SESSION['user'])){
        header("Location: .home/login");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title><?php $data["page"] ?></title>

    <!-- Fontfaces CSS-->

    <link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/fontawesome-free/css/font-awesome.min.css">

    <link href="/wogomin/public/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="/wogomin/public/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Vendor CSS-->
    <!-- <link href="./public/vendor/animsition/animsition.min.css" rel="stylesheet" media="all"> -->
    <link href="/wogomin/public/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/wogomin/public/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/wogomin/public/css/admin/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="./dashboard" style="margin: auto;">
                        <img src="/wogomin/public/images/admin/icon/logo.jpg" alt="Wogomin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                        
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">

                        <li>
                            <a href="./dashboard">
                                <i class="fa fa-tachometer"></i><b>Dashboard</b></a>
                                
                        </li>
                        
                        <li>
                            <a href="./chatroom">
                                <i class="fa fa-comments"></i><b>Chat rooms</b></a>

                        </li>

                        <li>
                            <a href="./users">
                                <i class="fa fa-users"></i><b>Users</b></a>
                        </li>
                        <li>
                            <a href="./contentchat">
                                <i class="fa fa-comment"></i><b>Content chat</b></a>

                        </li>
                        <li>
                            <a href="./logout">
                                <i class="fa fa-sign-out"></i><b>Log out</b></a>

                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="./dashboard">
                    <img src="/wogomin/public/images/admin/icon/logo.jpg" alt="Wogomin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">

                        <li>
                            <a href="./dashboard">
                                <i class="fa fa-tachometer"></i><b>Dashboard</b></a>
                                
                        </li>
                        <li>
                            <a href="./chatroom">
                                <i class="fa fa-comments"></i><b>Chat rooms</b></a>

                        </li>

                        <li>
                            <a href="./users">
                                <i class="fa fa-users"></i><b>Users</b></a>
                        </li>
                        <li>
                            <a href="./contentchat">
                                <i class="fa fa-comment"></i><b>Content chat</b></a>

                        </li>
                        <li>
                            <a href="./login">
                                <i class="fa fa-sign-out"></i><b>Log out</b></a>

                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                           
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                        <span>Hello </span>
                                            <a class="js-acc-btn" href=""><?php echo $_SESSION['user']; ?></a>
                                        </div>
                                        <!-- <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['user']; ?></a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    
                        <?php
                        
                        require_once "./mvc/admin/views/includes/" . $data["page"] . ".php";
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2021 IntelliNiche. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="/wogomin/public/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap JS-->

    <script src="/wogomin/public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/wogomin/public/vendor/slick/slick.min.js">
    </script>
    <script src="/wogomin/public/vendor/wow/wow.min.js"></script>
    <script src="/wogomin/public/vendor/animsition/animsition.min.js"></script>
    <script src="/wogomin/public/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/wogomin/public/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/wogomin/public/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/wogomin/public/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/wogomin/public/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/wogomin/public/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/wogomin/public/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="/wogomin/public/js/admin/main-inpage.js"></script>

</body>

</html>
<!-- end document-->