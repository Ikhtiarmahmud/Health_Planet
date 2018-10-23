<?php
include "config/config.php";
include_once "classes/Register.php";
$register = new Register();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DP-login</title>
    <!--  CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background-image: url("image/unnamed-52.jpg");
        }
        #contact {
            background-image: none;
        }
        #contact > .container > .row > div:first-child {
            background-color: white;
            padding: 50px;
            opacity: 0.9;
            height: 350px;
        }
        #contact > .container > .row > div:last-child {
            background-color: white;
            padding: 50px;
            opacity: 0.9;
        }
        #contact form div:nth-child(4) .form-control {
            border-bottom: 1px solid #e6d9d9;
        }
    </style>
</head>
<body>
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Sign Up!</h3>
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])){
                    $login = $register->Login($_POST);
                }
                ?>
                <?php
                if(isset($login)){
                    echo $login;
                }
                ?>
                <form action="" method="post">
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                    <div>
                        <input type="submit" value="Sign In" name="signin" class="btn btn-danger btn-block text-uppercase">
                    </div>
                </form>
            </div>
            <div class="col-md-7" id="accordion">
                <h3>Register Now!</h3>
                <a href="#onnokichu"  class="btn btn-outline-info d-inline" data-toggle="collapse">User Register</a>&nbsp;&nbsp;
                <a href="#colltwo" class="btn btn-outline-info d-inline" data-toggle="collapse" data-target="#">Become a Doctor</a>
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
                    $user = $register->userregister($_POST,$_FILES);
                }
                ?>
                <?php
                if(isset($user)){
                    echo $user;
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data" class="mt-4 collapse.show" id="onnokichu" data-parent="#accordion">
                    <h5>User Registration form!</h5>
                    <div>
                        <input type="text" name="firstname" class="form-control" placeholder="First Name">
                    </div>
                    <div>
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                    </div>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div> 
                    <div>
                        <input type="text" name="number" class="form-control" placeholder="Number">
                    </div>
                    <div>
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div>
                        <input type="text" name="bdate" class="form-control" placeholder="Birth date">
                    </div>
                    <div>
                        <input type="text" name="blood" class="form-control" placeholder="Blood Group">
                    </div>
                    <div>
                        <input type="text" name="lastblooddate" class="form-control" placeholder="Enter Your Last donate blood date">
                    </div>
                    <div>
                        <input type="text" name="school" class="form-control" placeholder="School">
                    </div>
                    <div>
                        <input type="text" name="versity" class="form-control" placeholder="Versity">
                    </div>
                    <div>
                        <input type="text" name="about" class="form-control" placeholder="About Yourself">
                    </div>
                    <div>
                        <label for="">Upload your image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div>
                        <input type="submit" value="submit" name="submit" class="btn btn-danger btn-block text-uppercase">
                    </div>
                </form>

                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
                    $user = $register->doctorregister($_POST,$_FILES);
                }
                ?>
                <?php
                if(isset($user)){
                    echo $user;
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data" class="mt-4 collapse" id="colltwo" data-parent="#accordion">
                    <h5>Doctor Registration form!</h5>
                    <div>
                        <input type="text" name="firstname" class="form-control" placeholder="First Name">
                    </div>
                    <div>
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                    </div>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div>
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>
                    <div>
                        <input type="text" name="bdate" class="form-control" placeholder="Birth date">
                    </div>
                    <div>
                        <input type="text" name="blood" class="form-control" placeholder="Blood Group">
                    </div>
                    <div>
                        <input type="text" name="school" class="form-control" placeholder="School">
                    </div>
                    <div>
                        <input type="text" name="versity" class="form-control" placeholder="versity">
                    </div>
                    <div>
                        <input type="text" name="about" class="form-control" placeholder="About Yourself">
                    </div>
                    <div>
                        <select name="category" class="form-control">
                            <option value="Pathology">Pathology</option>
                            <option value="Surjury">Surjury</option>
                            <option value="Medicine">Medicine</option>
                        </select>
                    </div>
                    <div>
                        <input type="text" name="chamber" class="form-control" placeholder="Chamber Address">
                    </div>
                    <div>
                        <label for="">Upload your image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                 <!--<div>
                        <label for="">Upload your SSC Certificate</label>
                        <input type="file" name="sscimage" class="form-control">
                    </div>-->
                    <!--
                   <div>
                       <label for="">Upload your HSC Certificate</label>
                       <input type="file" name="hscimage" class="form-control">
                   </div>
                   <div>
                       <label for="">Upload your M.B.B.S Certificate</label>
                       <input type="file" name="mbbsimage" class="form-control">
                   </div>
                   <div>
                       <label for="">Upload your Other's Certificate</label>
                       <input type="file" name="otherimage" class="form-control">
                   </div>
                   <div>
                       <label for="">Upload your National Id Card</label>
                       <input type="file" name="nidimage" class="form-control">
                   </div>-->
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                    <div>
                        <input type="submit" value="submit" name="register" class="btn btn-danger btn-block text-uppercase">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>