<?php include "include/header.php"?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $login = $userdata->inboxdata($_POST);
}
?>
<?php
/*$p_id=mysqli_real_escape_string($db->link,$_GET['inboxid']);
if (!isset($p_id) || $p_id == NULL) {
    */?><!--
    <script>window.location="404.php"</script>--><?php
/*} else {
    $inboxid = $p_id;
}*/
$inboxid = Session::get("inboxid");
?>
                    <section id="maincontent">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="leftsidebar col-md-4 offset-md-1">
                                    <h2 class="text-center pb-4">Lets's Chat&nbsp;<i class="fab fa-facebook-messenger"></i></h2>
                                    <div class="row">
                                        <?php
                                        $query = "SELECT * FROM tbl_doctorlogin WHERE doctorid='$inboxid'";
                                        $getpost = $db->select($query);
                                        if($getpost) {
                                        while ($result = $getpost->fetch_assoc()) {
                                    ?>
                            <div class="col-md-3">
                                <img src="<?php echo $result['selfimage']?>" alt="Hi" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-md-8">
                                <h4><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname']?></h4>
                                <h5><?php echo $result['address']?></h5>
                                <?php
                                Session::set("doctorinboxid",$result['doctorid']);
                                ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="col-md-12">
                        <form action="" method="post">
                            <label for=""></label>
                            <input type="text" placeholder="Aa" class="form-control" name="messege">
                            <?php
                            $userlogin = Session::get("login");
                            if($userlogin==true){
                            ?>
                            <input type="hidden" value="<?php echo Session::get("userfirstname")?>" name="name" class="form-control">
                            <?php } else { ?>
                            <input type="hidden" value="<?php echo Session::get("doctorfirstname")?>" name="name" class="form-control">
                            <?php } ?>
                            <input type="hidden" value="<?php echo Session::get("doctorinboxid")?>" name="doctorinboxid" class="form-control">
                            <input type="hidden" value="<?php echo Session::get("")?>" name="userinboxid" class="form-control">
                            <input type="submit" name="submit" value="Send" class="btn btn-primary mt-2">
                        </form>
                        <div class="float-right mt-3">
                            <?php
                            $getdata = $userdata->getinboxdata();
                            if($getdata){
                                while($result = $getdata->fetch_assoc()){
                                    ?>
                                    <i class="fas fa-envelope"></i> &nbsp;<span><?php echo $result['name']?></span>&nbsp;
                                    <p><?php echo $result['messege']?></p>
                                <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="middlecontent col-md-5">
                <h3 class="text-center"><a href="userpost.php">Talk With Scypy <i class="fas fa-video"></i></a></h3>

            </div>
        </div>
    </div>
</section>


<!--===============Footer section starts==========-->

<footer>
    <div class="container">
        <h5>&copy;Copyright By Awesomecoder</h5>
    </div>
</footer>

<!--===============Footer section Ends==========-->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-1.8.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>




<!--wow js-->
<script src="js/wow.min.js"></script>
<script>
    wow = new WOW(
            {
                boxClass: 'wow',      // default
                animateClass: 'animated', // default
                offset: 0,          // default
                mobile: true,       // default
                live: true        // default
            }
    )
    new WOW().init();
</script>
</body>
</html>