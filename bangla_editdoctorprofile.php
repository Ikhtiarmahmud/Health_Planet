<?php include "include/bangla_header.php"?>
<?php
$login = Session::get("dlogin");
if($login==false){ ?>
    <script>window.location = "login.php"</script>
<?php }
?>
<section id="edituser">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="text-center">Edit Profile!</h3>
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
                    $user = $doctordata->doctorupdateprofile($_POST,$_FILES);
                }
                ?>
                <?php
                if(isset($user)){
                    echo $user;
                }
                ?>
                <?php
                $id = Session::get("doctorid");
                $getdata = $doctordata->getdoctordata($id);
                if($getdata) {
                    while ($result = $getdata->fetch_assoc()) {
                        ?>
                        <form action="" method="post" enctype="multipart/form-data" class="mt-4">
                            <div>
                                <input type="hidden" name="doctorid" value="<?php echo $result['doctorid']?>">
                            </div>
                            <div>
                                <input type="text" name="firstname" class="form-control" value="<?php echo $result['firstname']?>">
                            </div>
                            <div>
                                <input type="text" name="lastname" class="form-control" value="<?php echo $result['lastname']?>">
                            </div>
                            <div>
                                <input type="email" name="email" class="form-control" value="<?php echo $result['email']?>">
                            </div>
                            <div>
                                <input type="text" name="address" class="form-control" value="<?php echo $result['address']?>">
                            </div>
                            <div>
                                <input type="text" name="bdate" class="form-control" value="<?php echo $result['bdate']?>">
                            </div>
                            <div>
                                <input type="text" name="blood" class="form-control" value="<?php echo $result['blood']?>">
                            </div>
                            <div>
                                <input type="text" name="school" class="form-control" value="<?php echo $result['school']?>">
                            </div>
                            <div>
                                <input type="text" name="versity" class="form-control" value="<?php echo $result['versity']?>">
                            </div>
                            <div>
                                <input type="text" name="about" class="form-control" value="<?php echo $result['about']?>">
                            </div>
                            <div>
                                <label for="" class="d-block">Upload your image</label>
                                <img src="<?php echo $result['selfimage']?>" alt="" width="100" height="100">
                                <input type="file" name="selfimage" class="form-control">
                            </div>
                            <div>
                                <input type="submit" value="submit" name="submit"
                                       class="btn btn-danger btn-block text-uppercase">
                            </div>
                        </form>
                        <?php
                    }
                }
                 ?>
            </div>
        </div>
    </div>
</section>

<?php include "include/footer.php"?>