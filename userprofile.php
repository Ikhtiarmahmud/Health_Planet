<?php include "include/header.php"?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $user = $userdata->userpost($_POST);
}
?>
<section id="maincontent">
    <div class="container-fluid">
        <div class="row">
            <div class="leftsidebar col-md-6">
                <?php
                /*$id = Session::get("userid");
                print_r($id);*/ /*Try to show , It work or not! */
                ?>
                <?php
                $id = Session::get("userid");  /*It's Not work*/
                $getdata = $userdata->getuserdata($id);
                if($getdata) {
                    while ($result = $getdata->fetch_assoc()) {
                        ?>
                        <h2 class="text-center pb-4">My Profile</h2>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo $result['image']?>" alt="Hi" class="img-fluid rounded-circle"
                                     width="180" height="180">
                            </div>
                            <div class="col-md-6">
                                <h4 class="mt-4"><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname']?></h4>
                                <h5><?php echo $result['address']?></h5>
                                <a class="text-center p-2 btn btn-info" href="edituserprofile.php?editid=<?php echo $result['id']?>">Edit Profile</a>
                            </div>
                        </div>
                        <div class="mt-4 mr-auto">
                            <span>Number&nbsp;:</span>
                            <p><?php echo $result['number']?></p><br>
                            <span>Date of Birth&nbsp;:</span>
                            <p><?php echo $result['bdate']?></p><br>
                            <span>Blood Group&nbsp;:</span>
                            <p><?php echo $result['blood']?></p><br>
                            <span>LastBloodDonate&nbsp;:</span>
                            <p><?php echo $result['lastblooddate']?></p><br>
                            <span>School&nbsp;:</span>
                            <p><?php echo $result['school']?></p><br>
                            <span>Versity&nbsp;:</span>
                            <p><?php echo $result['versity']?></p><br>
                            <span>Address&nbsp;:</span>
                            <p><?php echo $result['address']?></p><br>
                            <span>About&nbsp;:</span>
                            <p><?php echo $result['about']?></p>
                        </div>

                        <?php
                    }
                }
                ?>
            </div>
            <div class="middlecontent col-md-6 ">
                <h3 class="text-center"><a href="#"><i class="fab fa-blogger"></i>&nbsp;Write Your Post</a></h3>
                <?php
                if(isset($user)){
                    echo $user;
                }
                ?>
                <form action="" method="post">
                    <input type="text" class="form-control" placeholder="subject" name="title">
                    <textarea name="body" id="" cols="30" rows="10" class="form-control mt-3" placeholder="Your post"></textarea>
                    <input type="hidden" class="form-control" value="<?php echo Session::get("userfirstname")?>" name="firstname">
                    <input type="hidden" class="form-control" value="<?php echo Session::get("userlastname")?>" name="lastname">
                    <input type="submit" value="POST" name="submit" class="form-control mt-2">
                </form>
            </div>
        </div>
    </div>
</section>

<?php include "include/footer.php"?>
}