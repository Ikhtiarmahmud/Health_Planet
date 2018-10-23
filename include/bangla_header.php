<?php
$filepath = realpath(dirname(__FILE__));
include ($filepath.'/../lib/Session.php');
Session::cheaksession();    /*If i use it for check session ,I can't access index page.It redirect me login page.*/
include_once "lib/Database.php";
include_once "healper/Format.php";



spl_autoload_register(function($class){
    include_once "classes/".$class.".php";
});

$db = new Database();
$fm = new Format();
$register = new Register();
$userdata = new UserData();
$doctordata = new DoctorData();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>Health Planet</title><!--Writr Your Website Title Between Title Tag-->

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--  CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=676634169386791&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!--=============Header Starts============-->



<header id="header" class="fixed-top">
    <div class="container">
        <!--navbar start-->
        <nav class="navbar navbar-expand-lg">
            <!--Your Logo-->
            <a class="navbar-brand" href="index.php">Health Planet</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar"
                    aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fas fa-align-justify" style="color:white"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="navbar-nav ml-auto">
                    <?php
                    $login = Session::get("login");
                    if($login==true){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="bangla_index.php">হোম <span class="sr-only">(current)</span></a>
                        </li>
                    <?php
                    }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="bangla_doctor_index.php">হোম <span class="sr-only">(current)</span></a>
                        </li>
                    <?php

                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="bangla_bloodbank.php">ব্লাড ব্যাংক</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bangla_calori.php">ক্যালরি</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bangla_emergency.php">ইমার্জেন্সি নাম্বার</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" href="" >ভাষা</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php
                            $login = Session::get("login");
                            if($login==true){
                            ?>
                            <li class="dropdown-item"><a class="nav-link" href="bangla_index.php">বাংলা</a></li>
                                <?php
                            }else{ ?>
                            <li class="dropdown-item"><a class="nav-link" href="bangla_doctor_index.php">বাংলা</a></li>
                                <?php
                            }
                            ?>
                            <?php
                            $login = Session::get("login");
                            if($login==true){
                                ?>
                                <li class="dropdown-item"><a class="nav-link" href="index.php">English</a></li>
                                <?php
                            }else{ ?>
                                <li class="dropdown-item"><a class="nav-link" href="doctor_index.php">English</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    if(isset($_GET['action']) && $_GET['action'] == "logout"){
                        Session::destroy();
                        header("Location:login.php");
                    }
                    ?>
                    <li class="nav-item">
                        <a style="color:#71ff05" class="nav-link" href="?action=logout">লগ আউট</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>


<!--=============Header End===============-->


