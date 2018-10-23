<?php include "include/header.php"?>
<?php
$login = Session::get("dlogin");
if($login==false){ ?>
    <script>window.location = "login.php"</script>
<?php }
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $user = $doctordata->doctorpost($_POST);
}
?>
<section id="maincontent">
    <div class="container-fluid">
        <div class="row">
            <div class="leftsidebar col-md-6">
                <h2 class="text-center pb-4">My Profile</h2>
                <?php
                $id = Session::get("doctorid");
                $getdata = $doctordata->getdoctordata($id);
                if($getdata) {
                    while ($result = $getdata->fetch_assoc()) {
                        ?>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo $result['selfimage']?>" alt="Hi" class="img-fluid rounded-circle"
                                     width="180" height="180">
                            </div>
                            <div class="col-md-6">
                                <h4 class="mt-4"><?php echo $result['firstname']?><?php echo $result['lastname']?></h4>
                                <h5><?php echo $result['address']?></h5>
                            </div>
                            <div class="col-md-3">
                                <a href="inbox.php?inboxid=<?php echo $result['doctorid']?>"><span class="btn btn-info d-block">Contact</span></a>
                                <?php   Session::set("inboxid",$result['doctorid'])?>
                                <span class="btn btn-dark disabled d-block mt-2">Contact Pay</span>
                            </div>
                        </div>
                        <div class="mt-4 pro">
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Email&nbsp;:</span>
                                    <p><?php echo $result['email']?></p><br>
                                </div>
                                <div class="col-md-6">
                                    <span>Date of Birth&nbsp;:</span>
                                    <p><?php echo $result['bdate']?></p><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Blood Group&nbsp;:</span>
                                    <p><?php echo $result['blood']?></p><br>
                                </div>
                                <div class="col-md-6">
                                    <span>School&nbsp;:</span>
                                    <p><?php echo $result['school']?></p><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Versity&nbsp;:</span>
                                    <p><?php echo $result['versity']?></p><br>
                                </div>
                                <div class="col-md-6">
                                    <span>Address&nbsp;:</span>
                                    <p><?php echo $result['address']?></p><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span>Other's Degree&nbsp;:</span>
                                    <p>MBBS Cambridge Versity</p>
                                </div>
                                <div class="col-md-6">
                                    <span>Achieve&nbsp;:</span>
                                    <p>Best Doctor In 2018</p>
                                </div>
                            </div>
                            <div>
                                <span>About&nbsp;:</span>
                                <p><?php echo $result['about']?></p>
                            </div>
                        </div>
                        <a  class="text-center p-2 btn btn-info" href="editdoctorprofile.php?doctorid=<?php echo $result['doctorid']?>">Edit Profile</a>
                        <?php
                    }
                }
                ?>
            </div>
            <?php
            $dlogin = Session::get("dlogin");
            if($dlogin==true){ ?>
            <div class="middlecontent col-md-6 ">
                <h3 class="text-center"><a href="#"><i class="fab fa-blogger"></i>&nbsp;Write Your Post</a></h3>
                <?php
                if(isset($user)){
                    echo $user;
                }
                ?>
                <form action="" method="post">
                    <input type="text" class="form-control" placeholder="subject" name="title">
                    <!--<input type="file" class="form-control mt-2">-->
                    <textarea name="body" id="" cols="30" rows="10" class="form-control mt-3" placeholder="Your post"></textarea>
                    <input type="hidden" class="form-control" value="<?php echo Session::get("doctorfirstname")?>" name="firstname">
                    <input type="hidden" class="form-control" value="<?php echo Session::get("doctorlastname")?>" name="lastname">
                    <input type="submit" value="POST" name="submit" class="form-control mt-2">
                </form>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<?php include "include/footer.php"?>
}