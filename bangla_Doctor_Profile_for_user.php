<?php include "include/bangla_header.php"?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $user = $doctordata->doctorpost($_POST);
}
?>
<?php
$p_id=mysqli_real_escape_string($db->link,$_GET['doctorid']);
if (!isset($p_id) || $p_id == NULL) {
    header("Location:404.php");
} else {
    $id = $p_id;
}
?>
<section id="maincontent">
    <div class="container-fluid">
        <div class="row">
            <div class="leftsidebar col-md-6 offset-md-3">
                <h2 class="text-center pb-4">প্রোফাইল</h2>
                <?php
                $query = "SELECT * FROM tbl_doctorlogin WHERE doctorid='$id'";
                $getpost = $db->select($query);
                if($getpost){
                    while ($result = $getpost->fetch_assoc()){
                        ?>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo $result['selfimage']?>" alt="Hi" class="img-fluid rounded-circle"
                                     width="180" height="180">
                            </div>
                            <div class="col-md-6">
                                <h4 class="mt-4"><?php echo $result['firstname']?><?php echo $result['lastname']?></h4>
                                <h5><?php echo $result['address']?></h5>
                                <a  class="text-center p-2 btn btn-info" href="bangla_editdoctorprofile.php?doctorid=<?php echo $result['doctorid']?>">সংশোধন করুন</a>
                            </div>
                            <div class="col-md-3">
                                <a href="inbox.php?inboxid=<?php echo $result['doctorid']?>"><span class="btn btn-info d-block">কন্টাক্ট</span></a>
                                <span class="btn btn-dark disabled d-block mt-2">কন্টাক্ট পে</span>
                                <?php   Session::set("inboxid",$result['doctorid'])?>
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
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php include "include/footer.php"?>
}